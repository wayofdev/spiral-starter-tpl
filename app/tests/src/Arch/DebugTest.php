<?php

declare(strict_types=1);

arch('do not forget dumps in your production code')
    ->expect(['trap', 'dd', 'dump', 'exit', 'die', 'print_r', 'var_dump', 'echo', 'print'])
    ->not
    ->toBeUsed();

arch('do not use compact() in your code')
    ->expect(['compact'])
    ->not
    ->toBeUsed();
