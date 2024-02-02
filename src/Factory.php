<?php

declare(strict_types=1);

namespace Airlst\PhpCsFixerConfig;

use PhpCsFixer\Config;

class Factory
{
    private string $phpVersion = '8.3';

    /** @var array<string, array<string, mixed>|bool> */
    private array $customRules = [];

    /** @param array<string> $directories */
    public function __construct(private readonly array $directories) {}

    public function php82(): self
    {
        $this->phpVersion = '8.2';

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

        $config->setRules($rules)
            ->setRiskyAllowed(true)
            ->setUsingCache(true);

        $config->getFinder()
            ->in($this->directories)
            ->name('*.php')
            ->notName('*.blade.php')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true);

        return $config;
    }
}
