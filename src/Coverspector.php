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
        $regexp = '/^\s*Lines:\s*(\d+.\d+)\%/m';
        preg_match($regexp, $this->report, $matches);
        return (float) $matches[1];
    }

    public function getUncovered(): array
    {
        $regexp = '/.*\n.*Methods:.*Lines:\s*\d{1,2}\.\d+\%.*/';
        preg_match_all($regexp, $this->report, $matches);
        return $matches[0];
    }
}
