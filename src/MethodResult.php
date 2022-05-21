<?php declare( strict_types = 1 );

namespace PhpRandomTest;

class MethodResult
{
    /**
     * Percent of repeated words per generation
     * @var float[]
     */
    private $generations = [];

    public function setRepeatedWords(int $generation, int $repeated, int $total_words): self
    {
        $this->generations[$generation] = $repeated === 0 ? 0 : ($repeated / $total_words * 100);

        return $this;
    }

    public function getTotalPercent(): float
    {
        return array_sum($this->generations) / count($this->generations);
    }
}