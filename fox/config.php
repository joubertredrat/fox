<?php
/**
 * Load and request application environment variables
 *
 * @author Joubert <eu+fot@redrat.com.br>
 * @license: MIT
 * @see https://github.com/joubertredrat/fox/
 */

namespace Fox;

class Config
{
    /**
     * environment variables filename
     */
    const ENVFILE = '.env';

    /**
     * Load environment variables
     *
     * @return void
     */
    public static function loadEnv()
    {
        if (self::envExist()) {
            $envfile = file(getValidPath(CONFIG_PATH, self::ENVFILE));

            foreach ($envfile as $line) {
                putenv(trim($line));
            }
        }
    }

    /**
     * Check if environment variables file exists
     *
     * @return void
     */
    public static function envExist()
    {
        return file_exists(getValidPath(CONFIG_PATH, self::ENVFILE));
    }

    /**
     * Request environment variable's value
     *
     * @param string $arg
     * @return mixed
     */
    public static function getValue($var)
    {
        return getenv($var);
    }

    /**
     * Write new environment variables file
     *
     * @param array $values
     * @return void
     */
    public static function writeEnv(Array $values)
    {
        if (!self::envExist()) {
            file_put_contents(getValidPath(CONFIG_PATH, self::ENVFILE, implode(PHP_EOL, $values)));
        }
    }
}
