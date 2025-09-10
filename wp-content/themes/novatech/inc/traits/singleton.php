<?php


namespace NovaTech\Inc\Traits;


trait Singleton
{
    public function __construct() {}

    public function __clone() {}

    final public static function get_instance()
    {
        static $instances = [];

        $called_class = get_called_class();

        if (! isset($instances[$called_class])) {
            $instances[$called_class] = new $called_class();

            do_action("nova_tech_singleton_init_$called_class");
        }

        return $instances[$called_class];
    }
}
