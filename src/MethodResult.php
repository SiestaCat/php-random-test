<?php declare( strict_types = 1 );

namespace PhpRandomTest;

/**
 * Store a result of a method
 * @package PhpRandomTest
 */
class MethodResult
{
    /**
     * Percent of repeated words per generation
     * @var float[]
     */
    private $generations = [];

    /**
     * 
     * @param int $generation 
     * @param int $repeated 
     * @param int $total_words 
     * @return MethodResult 
     */
    public function setRepeatedWords(int $generation, int $repeated, int $total_words): self
    {
        $this->generations[$generation] = $repeated === 0 ? 0 : ($repeated / $total_words * 100);

        return $this;
    }

    /**
     * Repetition percentage
     * @return float 
     */
    public function getTotalPercent(): float
    {
        return array_sum($this->generations) / count($this->generations);
    }
}