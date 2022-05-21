<?php declare( strict_types = 1 );

namespace PhpRandomTest\Method;

use PhpRandomTest\MethodAbstract;
use PhpRandomTest\MethodInterface;
use PhpRandomTest\MethodResult;

class MethodCustom1 extends MethodAbstract implements MethodInterface
{

    const RANDOM_STRING_CHARSET = '1sABWhiUmaqOfnD6gJN2xTFYK7X9GeMQ0bCduPwc8pHRtv3loZzSrVjE4LIky5';

    public function calculate(int $generations = 4, int $words_per_generation = 10000, int $word_length = 3): MethodResult
    {
        return $this->_calculate($generations, $words_per_generation, $word_length, function(int $word_length) :string {
            return self::generateRandom($word_length);
        });
    }

    private static function generateRandom(int $length, string $charset = self::RANDOM_STRING_CHARSET) :string {
        return substr(self::string_walk_recursive($charset, 'str_shuffle', rand(5,35)),0, $length);
    }

    private static function string_walk_recursive(string $str, string $func, int $amount, int $index = 1) {
        $walk_func = call_user_func($func, $str);
        return $index >= $amount ? $walk_func : self::string_walk_recursive($walk_func, $func, $amount, $index + 1);
    }
}