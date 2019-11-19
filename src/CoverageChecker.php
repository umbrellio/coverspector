<?php

declare(strict_types=1);

namespace CoverageChecker;

class CoverageChecker
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

        if (count($matches) < 2) {
            throw new \RuntimeException("Couldn't find matches with regexp $regexp in the coverage report");
        }

        if (count($matches) > 2) {
            throw new \RuntimeException("Too many matches with regexp $regexp in the coverage report");
        }

        return (float) $matches[1];
    }
}
