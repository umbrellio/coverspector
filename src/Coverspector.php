<?php

declare(strict_types=1);

namespace Coverspector;

class Coverspector
{
    private $report;

    public function __construct(string $report)
    {
        $this->report = $report;
    }

    public function getCoverage(): float
    {
        $regexp = '/(Classes|Methods|Lines)\:\s+[\d]+\.[\d]+%\s+\(([\d]+)\/([\d]+)\)/m';
        preg_match_all($regexp, $this->report, $matches);

        $totals = 0;
        foreach ($matches[2] as $index => $metrics) {
            $totals += $metrics / $matches[3][$index];
        }

        return round($totals / count($matches[2]) * 100, 2);
    }

    public function getUncovered(): array
    {
        $regexp = '/.*\n.*Methods:.*Lines:\s*\d{1,2}\.\d+\%.*/';
        preg_match_all($regexp, $this->report, $matches);
        return $matches[0];
    }
}
