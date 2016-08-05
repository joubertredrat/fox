<?php
/**
 * This class only load env vars and start application
 *
 * @author Joubert <eu+fox@redrat.com.br>
 */

namespace Fox;

class Lets
{
    /**
     * Fox, let's go!
     *
     * @return void
     */
    public static function go()
    {
        \Fox\Config::loadEnv();
        \Fox\Router::run();
    }
}
