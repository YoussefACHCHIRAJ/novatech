<?php

namespace WPMailSMTP\Vendor\Aws\Api\Parser;

use WPMailSMTP\Vendor\Aws\Api\Operation;
use WPMailSMTP\Vendor\Aws\Api\StructureShape;
use WPMailSMTP\Vendor\Aws\Api\Service;
use WPMailSMTP\Vendor\Aws\Result;
use WPMailSMTP\Vendor\Aws\CommandInterface;
use WPMailSMTP\Vendor\Psr\Http\Message\ResponseInterface;
use WPMailSMTP\Vendor\Psr\Http\Message\StreamInterface;
/**
 * @internal Implements JSON-RPC parsing (e.g., DynamoDB)
 */
class JsonRpcParser extends \WPMailSMTP\Vendor\Aws\Api\Parser\AbstractParser
{
    use PayloadParserTrait;
    /**
     * @param Service    $api    Service description
     * @param JsonParser $parser JSON body builder
     */
    public function __construct(\WPMailSMTP\Vendor\Aws\Api\Service $api, ?\WPMailSMTP\Vendor\Aws\Api\Parser\JsonParser $parser = null)
    {
        parent::__construct($api);
        $this->parser = $parser ?: new \WPMailSMTP\Vendor\Aws\Api\Parser\JsonParser();
    }
    public function __invoke(\WPMailSMTP\Vendor\Aws\CommandInterface $command, \WPMailSMTP\Vendor\Psr\Http\Message\ResponseInterface $response)
    {
        $operation = $this->api->getOperation($command->getName());
        return $this->parseResponse($response, $operation);
    }
    /**
     * This method parses a response based on JSON RPC protocol.
     *
     * @param ResponseInterface $response the response to parse.
     * @param Operation $operation the operation which holds information for
     *        parsing the response.
     *
     * @return Result
     */
    private function parseResponse(\WPMailSMTP\Vendor\Psr\Http\Message\ResponseInterface $response, \WPMailSMTP\Vendor\Aws\Api\Operation $operation)
    {
        if (null === $operation['output']) {
            return new \WPMailSMTP\Vendor\Aws\Result([]);
        }
        $outputShape = $operation->getOutput();
        foreach ($outputShape->getMembers() as $memberName => $memberProps) {
            if (!empty($memberProps['eventstream'])) {
                return new \WPMailSMTP\Vendor\Aws\Result([$memberName => new \WPMailSMTP\Vendor\Aws\Api\Parser\EventParsingIterator($response->getBody(), $outputShape->getMember($memberName), $this)]);
            }
        }
        $result = $this->parseMemberFromStream($response->getBody(), $operation->getOutput(), $response);
        return new \WPMailSMTP\Vendor\Aws\Result(\is_null($result) ? [] : $result);
    }
    public function parseMemberFromStream(\WPMailSMTP\Vendor\Psr\Http\Message\StreamInterface $stream, \WPMailSMTP\Vendor\Aws\Api\StructureShape $member, $response)
    {
        return $this->parser->parse($member, $this->parseJson($stream, $response));
    }
}
