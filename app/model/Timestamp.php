<?php
/**
 * Example model
 *
 * @author Joubert <eu@redrat.com.br>
 */

namespace Fox\Model;

class Timestamp
{
    /**
     * Timestamp
     *
     * @var int
     */
    private $timestamp;

    /**
     * Constructor log
     *
     * @return void
     */
    public function __construct()
    {
        $this->timestamp = time();
    }

    /**
     * Get timestamp
     *
     * @return int
     */
    public function get()
    {
        return $this->timestamp;
    }
}
