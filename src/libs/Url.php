<?php
namespace devskyfly\php56\libs;

use devskyfly\php56\types\Vrbl;
use devskyfly\php56\types\Str;

class Url
{
    const URL_SCHEME=PHP_URL_SCHEME;
    const URL_HOST=PHP_URL_HOST;
    const URL_PORT=PHP_URL_PORT;
    const URL_USER=PHP_URL_USER;
    const URL_PASS=PHP_URL_PASS;
    const URL_PATH=PHP_URL_PATH;
    const URL_QUERY=PHP_URL_QUERY;
    const URL_FRAGMENT=PHP_URL_FRAGMENT;
    const QUERY_RFC1738=PHP_QUERY_RFC3986;       

    /**
     * Return url query representation of array
     *
     * @link https://www.php.net/manual/en/function.http-build-query.php
     * @param array $data
     * @param string $prefix
     * @param string $separartor
     * @throws \InvalidArgumentException
     * @return string
     */
    public static function generateQuery($data, $prefix="", $separartor="")
    {
        if ((!Vrbl::isEmpty($prefix))
            && (Vrbl::isEmpty($separartor))
        ) {
            if (!Str::isString($prefix)) {
                throw new \InvalidArgumentException('Param $prefix is not string type.');
            }
            return http_build_query($data, $prefix);
        }

        if (!Vrbl::isEmpty($separartor)) {
            if (!Str::isString($prefix)) {
                throw new \InvalidArgumentException('Param $prefix is not string type.');
            }
            if (!Str::isString($separartor)) {
                throw new \InvalidArgumentException('Param $separartor is not string type.');
            }
            return http_build_query($data, $prefix, $separartor);
        }

        return http_build_query($data);
    }
    
    /**
     * Return parsed url
     *
     * 
     * @param string $url
     * @throws \Exception
     * @return mixed
     */
    public static function parseQuery($url)
    {
        $result=parse_url($url);
        if ($result===false) {
            throw new \Exception('Url parse error.');
        }
        return $result;
    }
    
    /**
     * Return encoded string like application/x-www-form-urlencoded
     *
     * @todo test
     * @param string $str
     * @return string
     */
    public static function encodeString($str)
    {
        return urlencode($str);
    }
    
    /**
     * Return decode urlencoded string
     *
     * @todo test
     * @param string $str
     * @return string
     */
    public static function decodeString($str)
    {
        return urldecode($str);
    }

    /**
     * Return encoded string by RFC 3986
     *
     * @todo test
     * @param $str
     * @return string
     */
    public static function encodeRaw($str)
    {
        return rawurlencode($str);
    }
    
    /**
     * Return decoded string by RFC 3986
     *
     * @todo test
     * @param $str
     * @return string
     */
    public static function decodeRaw($str)
    {
        return rawurldecode($str);
    }
}
