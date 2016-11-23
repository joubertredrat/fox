<?php
/**
 * Framework exception
 *
 * @author Joubert <eu+fot@redrat.com.br>
 * @license: MIT
 * @see https://github.com/joubertredrat/fox/
 */

namespace Fox;

class Exception extends \Exception
{
    /**
     * Construtor
     *
     * @param string $msg
     * @return void
     */
    public function __construct($msg)
    {
        file_put_contents(
            getValidPath(LOG_PATH, 'error.log'),
            date('Y-m-d H:i:s').' - '.trim($msg).PHP_EOL,
            FILE_APPEND
        );
        parent::__construct($msg);
    }
}
