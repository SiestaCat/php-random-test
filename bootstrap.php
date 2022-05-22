<?php declare( strict_types = 1 );

use PhpRandomTest\MethodInterface;
use jc21\CliTable;

require_once 'vendor/autoload.php';
/**
 * @var string[]
 */
$methods = require 'methods.php';

set_time_limit(0);

$generations = isset($argv[1]) ? intval($argv[1]) : 10;

$words_per_generation = isset($argv[2]) ? intval($argv[2]) : 10000;

$word_length = isset($argv[3]) ? intval($argv[3]) : 4;


$results = [];

foreach($methods as $method_name => $method_class)
{
    /**
     * @var MethodInterface
     */
    $method_instance = new $method_class;

    $result = $method_instance->calculate($generations, $words_per_generation, $word_length);

    $hResult =
    [
        'name' => $method_name,
        'percent' => $result->getTotalPercent()
    ];

    $results[] = $hResult;
}

$table = new CliTable;
$table->setTableColor('red');
$table->setHeaderColor('red');
$table->addField('Generations', 'generations');
$table->addField('Words per generation', 'words_per_generation');
$table->addField('Total words', 'total_words');
$table->addField('Word length', 'word_length');
$table->injectData
(
    [
        [
            'generations' => $generations,
            'words_per_generation' => $words_per_generation,
            'total_words' => $generations * $words_per_generation,
            'word_length' => $word_length
        ]
    ]
);
$table->display();

$table = new CliTable;
$table->setTableColor('blue');
$table->setHeaderColor('cyan');
$table->addField('Method', 'name');
$table->addField('Repeat percent %', 'percent');
$table->injectData($results);
$table->display();

$champion = null;

$less_percent = null;

foreach($results as $result)
{
    if($less_percent === null || $less_percent > $result['percent'])
    {
        $less_percent = $result['percent'];
        $champion = $result['name'];
    }
}

$table = new CliTable;
$table->setTableColor('yellow');
$table->setHeaderColor('yellow');
$table->addField('The champions is', 'name');
$table->injectData
(
    [
        [
            'name' => ($champion === null ? 'no one' : $champion)
        ]
    ]
);
$table->display();