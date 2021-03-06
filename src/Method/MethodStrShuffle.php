<?php declare( strict_types = 1 );

namespace PhpRandomTest\Method;

use PhpRandomTest\MethodAbstract;
use PhpRandomTest\MethodInterface;
use PhpRandomTest\MethodResult;

/**
 * @package PhpRandomTest\Method
 */
class MethodStrShuffle extends MethodAbstract implements MethodInterface
{
    /**
     * @param int $generations 
     * @param int $words_per_generation 
     * @param int $word_length 
     * @return MethodResult 
     */
    public function calculate(int $generations = 4, int $words_per_generation = 10000, int $word_length = 3): MethodResult
    {
        return $this->_calculate($generations, $words_per_generation, $word_length, function(int $word_length) :string {
            return str_shuffle(substr(md5(random_bytes(255)), 0, $word_length));
        });
    }
}