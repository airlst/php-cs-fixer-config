<?php

declare(strict_types=1);

namespace Airlst\PhpCsFixerConfig;

use PhpCsFixer\Config;

class Factory
{
    public static function create(
        ?array $directories = null,
        ?string $phpVersion = null,
    ): Config {
        $defaultRuleSet = new AirlstRuleset($phpVersion);

        $config = new Config($defaultRuleSet->getName());

        $config->setRules($defaultRuleSet->getRules())
            ->setRiskyAllowed(true)
            ->setUsingCache(true);

        $config->getFinder()
            ->in($directories ?? ['app', 'config', 'database', 'routes', 'tests'])
            ->name('*.php')
            ->notName('*.blade.php')
            ->ignoreDotFiles(true)
            ->ignoreVCS(true);

        return $config;
    }
}
