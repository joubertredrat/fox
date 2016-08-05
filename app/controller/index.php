<?php
/**
 * Controller das galerias do app
 *
 * @author Joubert <eu@redrat.com.br>
 */

namespace Fox\Controller;

class Index
{
    /**
     * Construtor
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Controller index
     *
     * @return void
     */
    public function index()
    {
        \Fox\View::call('index');
    }

    /**
     * Timstamp call
     *
     * @return void
     */
    public function seeMore()
    {
        $Timestamp = new \Fox\Model\Timestamp();

        \Fox\View::call(
            'timestamp',
            ['Timestamp' => $Timestamp]
        );
    }
}
