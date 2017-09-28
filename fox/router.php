<?php
/**
 * Route engine
 *
 * @author Joubert <eu+fot@redrat.com.br>
 * @license: MIT
 * @see https://github.com/joubertredrat/fox/
 */

namespace Fox;

class Router
{
    /**
     * Process uri from url
     *
     * @return string
     */
    public static function getUri()
    {
        if (!isset($_SERVER['QUERY_STRING']) || $_SERVER['QUERY_STRING'] == "") {
            return 'index';
        }

        $uri = substr($_SERVER['QUERY_STRING'], 1);

        if (substr($uri, strlen($uri) - 1) == '/') {
            $uri = substr($uri, 0, strlen($uri) - 1);
        }

        return $uri;
    }

    /**
     * Get uri and call corresponding controller
     *
     * @return void
     */
    public static function run()
    {
        $route = self::getUri();

        $uri = explode('/', $route);

        switch (count($uri)) {
            case 1:
                $class = $uri[0];
                $method = 'index';
                $args = null;
                break;
            case 2:
                $class = $uri[0];
                $method = $uri[1];
                $args = null;
                break;
            case 3:
            case 4:
            case 5:
                $class = $uri[0];
                $method = $uri[1];
                unset($uri[0]);
                unset($uri[1]);
                $args = array_values($uri);
                break;
            default:
                exit('Unknown route');
                break;
        }

        if(!file_exists(getValidPath(CONTROLLER_PATH, $class.'.php')))
		{
			trigger_error("Controller does not exist");
		}

		require(getValidPath(CONTROLLER_PATH, $class.'.php'));
        self::formatClassCall($class);
        self::formatMethodCall($method);

        $Controller = new $class();
        if ($args) {
            switch (count($args)) {
                case 1:
                    $Controller->$method($args[0]);
                    break;
                case 2:
                    $Controller->$method($args[0], $args[1]);
                    break;
                case 3:
                    $Controller->$method($args[0], $args[1], $args[2]);
                    break;
            }
        } else {
			if(!method_exists($Controller, $method))
			{
				trigger_error("Page not found");
			}
            $Controller->$method();
        }
    }

    /**
     * Format controller class call
     *
     * @param string &$class
     */
    private static function formatClassCall(&$class)
    {
        $class = "\Fox\\Controller\\".ucfirst($class);
    }

    /**
     * Format controller class method call
     *
     * @param string &$method
     */
    private static function formatMethodCall(&$method)
    {
        $array = explode('-', $method);
        if (count($array) == 1) {
            return $method;
        }

        $first = array_shift($array);

        $array = array_map('ucfirst', $array);
        $method = $first.implode('', $array);
    }
}
