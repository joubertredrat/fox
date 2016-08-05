<?php
/**
 * Framework functions class
 *
 * @author Joubert <eu+fot@redrat.com.br>
 * @license: MIT
 * @see https://github.com/joubertredrat/fox/
 */

namespace Fox;

class Functions
{
    /**
     * Validate value types
     *
     * @param mixed $value
     * @param string $type
     * @return bool
     */
    public static function validateType($value, $type)
    {
        switch ($type) {
            case 'string':
                $return = is_string($value);
                break;
            case 'integer':
                $return = filter_var($value, FILTER_VALIDATE_INT) !== false;
                break;
            case 'float':
                $return = filter_var($value, FILTER_VALIDATE_FLOAT) !== false;
                break;
            case 'boolean':
                $return = is_bool($value);
                break;
            case 'datetime':
                if (self::validateType(substr($value, 0, 4), 'datetime_year')) {
                    \DateTime::createFromFormat('Y-m-d H:i:s', $value);
                    $validate = DateTime::getLastErrors();
                    $return = ($validate['warning_count'] == 0 && $validate['error_count'] == 0);
                } else {
                    $return = false;
                }
                break;
            case 'datetime_year':
                if ($value == '0000') {
                    $return = true;
                } else {
                    $return = filter_var(
                        (int) $value,
                        FILTER_VALIDATE_INT,
                        ['options' => ['min_range' => 1000, 'max_range' => 9999]]
                    ) !== false;
                }
                break;
            case 'datetime_date':
                if ($value === '0000-00-00') {
                    $return = true;
                } else {
                    $return = self::validateType($value.' '.date('H:i:s'), 'datetime');
                }
                break;
            case 'datetime_time':
                if ($value === '00:00:00') {
                    $return = true;
                } else {
                    $return = self::validateType(date('Y-m-d').' '.$value, 'datetime');
                }
                break;
            case 'datetime_timestamp':
                $return = filter_var(
                    (int) $value,
                    FILTER_VALIDATE_INT,
                    ['options' => ['min_range' => -2147483647, 'max_range' => 2147483647]]
                ) !== false;
                break;
            default:
                $return = false;
                break;
        }
        return $return;
    }

    /**
     * Request app url
     *
     * @param string $uri
     * @return string
     */
    public static function getAppUrl($uri = null)
    {
        $url = [];
        $url[] = $_SERVER['REQUEST_SCHEME'];
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $url[] = 's';
        }
        $url[] = '://'.$_SERVER['HTTP_HOST'];
        if ($_SERVER['SERVER_PORT'] != '80') {
            $url[] = ':'.$_SERVER['SERVER_PORT'].'/';
        }
        $url[] = str_replace($_SERVER['QUERY_STRING'] ? $_SERVER['QUERY_STRING'] : '', '', $_SERVER['REQUEST_URI']);
        // $url[] = '/';
        if ($uri) {
            $url[] = $uri;
        }

        return implode('', $url);
    }
}
