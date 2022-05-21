<?php declare( strict_types = 1 );

use PhpRandomTest\Method\MethodRandomBytes;
use PhpRandomTest\Method\MethodStrShuffle;
use PhpRandomTest\Method\MethodBix2Hex;
use PhpRandomTest\Method\MethodCustom1;

return (object) [
    'random_bytes' => MethodRandomBytes::class,
    'str_shuffle' => MethodStrShuffle::class,
    'bin2hex' => MethodBix2Hex::class,
    'custom1' => MethodCustom1::class,
];