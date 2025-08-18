<?php


namespace NovaTech\Inc\Traits;


trait Singleton
{
    public function __construct() {}

    public function __clone() {}

    final public static function get_instance()
    {
        static $instances = [];

        $calledClass = get_called_class();

        if (! isset($instances[$calledClass])) {
            $instances[$calledClass] = new $calledClass();

            do_action("nova_tech_singleton_init_$calledClass");
        }

        return $instances[$calledClass];
    }
}
