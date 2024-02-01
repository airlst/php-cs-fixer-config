<?php

declare(strict_types=1);

namespace Airlst\PhpCsFixerConfig;

use PhpCsFixer\Config;

class Factory
{
    private string $phpVersion = '8.3';

    public function __construct(private array $directories) {}

    public function php82(): self
    {
        $this->phpVersion = '8.2';

        return $this;
    }

    public function create(): Config
    {
        $ruleSet = new AirlstRuleset($this->phpVersion);

        $config = new Config($ruleSet->getName());

        $config->setRules($ruleSet->getRules())
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
