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

    public function provideFailed(): Generator
    {
        yield 'standard' => [
            'file' => 'failed1.txt',
            'coverage' => 99.92,
            'expected' => [
                '\App\Console::App\Console\Kernel1
  Methods: 90.00% ( 0/ 1)   Lines: 88.92% (  1/  2)',
                '\App\Console::App\Console\Kernel3
  Methods: 100.00% ( 0/ 1)   Lines: 0.00% (  0/  2)',
            ]
        ];
        yield 'rare' => [
            'file' => 'failed2.txt',
            'coverage' => 95.76,
            'expected' => [],
        ];
    }

    /**
     * @test
     * @dataProvider provideFailed
     */
    public function failed(string $file, float $coverage, array $expected)
    {
        $path = __DIR__ . '/fixtures/' . $file;
        $checker = new Coverspector(file_get_contents($path));
        $this->assertSame($coverage, $checker->getCoverage());
        $this->assertSame($expected, $checker->getUncovered());
    }
}
