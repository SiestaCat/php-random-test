<?php declare( strict_types = 1 );

namespace PhpRandomTest;

interface MethodInterface
{

    public function calculate(int $generations = 4, int $words_per_generation = 10000, int $word_length = 3): MethodResult;
}