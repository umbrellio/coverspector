<?php

declare(strict_types=1);

use Coverspector\Coverspector;
use PHPUnit\Framework\TestCase;

class CoverspectorTest extends TestCase
{
    /**
     * @test
     */
    public function passed()
    {
        $path = __DIR__ . '/fixtures/passed.txt';
        $checker = new Coverspector(file_get_contents($path));
        $this->assertSame(100.0, $checker->getCoverage());
        $this->assertSame([], $checker->getUncovered());
    }

    /**
     * @test
     */
    public function failed()
    {
        $path = __DIR__ . '/fixtures/failed.txt';
        $checker = new Coverspector(file_get_contents($path));
        $this->assertSame(88.92, $checker->getCoverage());
        $this->assertSame([
            '\App\Console::App\Console\Kernel1
  Methods: 100.00% ( 1/ 1)   Lines: 88.92% (  2/  2)',
            '\App\Console::App\Console\Kernel3
  Methods: 100.00% ( 1/ 1)   Lines: 0.00% (  2/  2)',
        ], $checker->getUncovered());
    }
}
