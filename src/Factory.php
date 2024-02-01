<?php

declare(strict_types=1);

namespace Airlst\PhpCsFixerConfig;

use PhpCsFixer\Config;

class Factory
{
    public static function create(
        array $directories,
        ?string $phpVersion = null,
    ): Config {
        $ruleSet = new AirlstRuleset($phpVersion);

        $config = new Config($ruleSet->getName());

        $config->setRules($ruleSet->getRules())
            ->setRiskyAllowed(true)
            ->setUsingCache(true);

        $config->getFinder()
            ->in($directories)
            ->name('*.php')
            ->notName('*.blade.php')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true);

        return $config;
    }
}
