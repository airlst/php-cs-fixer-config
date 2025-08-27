<?php

declare(strict_types=1);

namespace Airlst\PhpCsFixerConfig;

use PhpCsFixer\Config;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

class Factory
{
    private string $phpVersion = '8.3';

    /** @var array<string> */
    private array $excludeDirectories = [];

    /** @var array<string, array<string, mixed>|bool> */
    private array $customRules = [];

    /** @param array<string> $directories */
    public function __construct(private readonly array $directories) {}

    /** @param array<string> $directories */
    public function excludeDirectories(array $directories): static
    {
        $this->excludeDirectories = $directories;

        return $this;
    }

    public function php82(): self
    {
        $this->phpVersion = '8.2';

        return $this;
    }

    public function php83(): self
    {
        $this->phpVersion = '8.3';

        return $this;
    }

    /** @param array<string, array<string, mixed>|bool> $customRules */
    public function customRules(array $customRules): self
    {
        $this->customRules = $customRules;

        return $this;
    }

    public function create(): Config
    {
        $ruleset = new AirlstRuleset($this->phpVersion);

        $rules = [
            ...$ruleset->getRules(),
            ...$this->customRules,
        ];

        $config = new Config($ruleset->getName());

        $config
            ->setParallelConfig(ParallelConfigFactory::detect())
            ->setRules($rules)
            ->setRiskyAllowed(true)
            ->setUsingCache(true);

        $config->getFinder()
            ->in($this->directories)
            ->name('*.php')
            ->notName('*.blade.php')
            ->notPath($this->excludeDirectories)
            ->ignoreDotFiles(true)
            ->ignoreVCS(true);

        return $config;
    }
}
