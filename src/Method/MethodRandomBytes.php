<?php declare( strict_types = 1 );

namespace PhpRandomTest\Method;

use PhpRandomTest\MethodAbstract;
use PhpRandomTest\MethodInterface;
use PhpRandomTest\MethodResult;

class MethodRandomBytes extends MethodAbstract implements MethodInterface
{
    public function calculate(int $generations = 4, int $words_per_generation = 10000, int $word_length = 3): MethodResult
    {
        return $this->_calculate($generations, $words_per_generation, $word_length, function(int $word_length) :string {
            return random_bytes($word_length);
        });
    }
}