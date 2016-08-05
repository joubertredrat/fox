<?php
/**
 * Simple PDO manager
 *
 * @author Joubert <eu+fot@redrat.com.br>
 * @license: MIT
 * @see https://github.com/joubertredrat/fox/
 */

namespace Fox;

use \PDO;

class Database
{
    /**
     * Connection with database
     *
     * @var PDO
     */
    private static $dbh;

    /**
     * Construtor does nothing
     *
     * @return void
     */
    private function __construct()
    {

    }

    /**
     * Request PDO instance
     *
     * @return PDO
     */
    public static function getInstance()
    {
        if (!self::isInstantiated()) {
            self::setInstance(
                self::buildInstance(
                    \Fox\Config::getValue('DB_NAME'),
                    \Fox\Config::getValue('DB_USER'),
                    \Fox\Config::getValue('DB_PASS'),
                    \Fox\Config::getValue('DB_HOST'),
                    \Fox\Config::getValue('DB_PORT')
                )
            );
        }
        return self::$dbh;
    }

    /**
     * Request PDO instance outside singleton mode
     *
     * @param string $db_name
     * @param string $db_user
     * @param string $db_pass
     * @param string $db_host
     * @param int $db_port
     * @return PDO
     */
    public static function getNewPdo($db_name, $db_user, $db_pass, $db_host = 'localhost', $db_port = 3306)
    {
        return self::buildInstance($db_name, $db_user, $db_pass, $db_host, $db_port);
    }

    /**
     * Test connection
     *
     * @param string $db_name
     * @param string $db_user
     * @param string $db_pass
     * @param string $db_host
     * @param int $db_port
     * @return bool
     */
    public static function testConnection($db_name, $db_user, $db_pass, $db_host = 'localhost', $db_port = 3306)
    {
        $dbh = self::getNewPdo($db_name, $db_user, $db_pass, $db_host, $db_port);
        return $dbh instanceof \PDO;
    }

    /**
     * Define PDO on singleton
     *
     * @param PDO $dbh
     * @return void
     */
    private static function setInstance(PDO $dbh)
    {
        self::$dbh = $dbh;
    }

    /**
     * Verify if exists on PDO instance on singleton.
     *
     * @return bool
     */
    public static function isInstantiated()
    {
        return self::$dbh instanceof PDO;
    }

    /**
     * Create new PDO
     *
     * @param string $db_name
     * @param string $db_user
     * @param string $db_pass
     * @param string $db_host
     * @param int $db_port
     * @return PDO
     */
    private static function buildInstance($db_name, $db_user, $db_pass, $db_host = 'localhost', $db_port = 3306)
    {
        try {
            $dbh = new PDO(
                'mysql:host='.$db_host.';port='.$db_port.';dbname='.$db_name.';charset=utf8',
                $db_user,
                $db_pass
            );
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $dbh->exec("SET CHARACTER SET utf8");
            $dbh->exec("SET NAMES utf8");

            return $dbh;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
