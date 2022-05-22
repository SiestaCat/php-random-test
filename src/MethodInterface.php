<?php declare( strict_types = 1 );

namespace PhpRandomTest;

/**
 * Interface of methods
 * @package PhpRandomTest
 */
interface MethodInterface
{

    /**
     * Calculate repetition percentage
     * @param int $generations 
     * @param int $words_per_generation 
     * @param int $word_length 
     * @return MethodResult 
     */
    public function calculate(int $generations = 4, int $words_per_generation = 10000, int $word_length = 3): MethodResult;
}