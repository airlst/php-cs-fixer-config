<?php

declare(strict_types=1);

namespace Airlst\PhpCsFixerConfig;

use PhpCsFixer\RuleSet\RuleSetDescriptionInterface;

readonly class AirlstRuleset implements RuleSetDescriptionInterface
{
    private string $phpMigration;

    public function __construct(?string $phpVersion = null)
    {
        $this->phpMigration = match ($phpVersion) {
            '8.2' => '@PHP82Migration',
            '8.3' => '@PHP83Migration',
            default => '@PHP84Migration',
        };
    }

    public function getRules(): array
    {
        return [
            $this->phpMigration => true,
            '@PHP82Migration:risky' => true,
            '@PSR12:risky' => true,
            '@PHPUnit100Migration:risky' => true,

            // start: psr-12 with modifications
            '@PSR12' => true,
            'binary_operator_spaces' => [
                'default' => 'single_space',
            ],
            'ordered_imports' => [
                'sort_algorithm' => 'alpha',
            ],
            'method_argument_space' => [
                'keep_multiple_spaces_after_comma' => true,
                'on_multiline' => 'ensure_fully_multiline',
            ],
            'spaces_inside_parentheses' => [
                'space' => 'none',
            ],
            'braces_position' => true,
            'single_import_per_statement' => true,

            'no_whitespace_before_comma_in_array' => true,
            'trailing_comma_in_multiline' => true,
            // end: psr-12 with modifications

            // start: cs-fixer with modifications
            '@PhpCsFixer' => true,
            'fully_qualified_strict_types' => [
                'import_symbols' => false,
            ],
            'multiline_whitespace_before_semicolons' => [
                'strategy' => 'no_multi_line',
            ],
            'no_extra_blank_lines' => [
                'tokens' => [
                    'attribute',
                    'extra',
                    'break',
                    'continue',
                    'throw',
                    'use',
                    'switch',
                    'case',
                    'default',
                    'curly_brace_block',
                    'parenthesis_brace_block',
                ],
            ],
            'ordered_types' => [
                'null_adjustment' => 'always_last',
                'sort_algorithm' => 'none',
            ],
            'single_line_comment_style' => [
                'comment_types' => ['hash'],
            ],
            'concat_space' => [
                'spacing' => 'one',
            ],
            'increment_style' => [
                'style' => 'post',
            ],
            'class_attributes_separation' => [
                'elements' => [
                    'method' => 'one',
                    'trait_import' => 'none',
                ],
            ],
            'new_with_parentheses' => [
                'anonymous_class' => false,
            ],
            'ordered_class_elements' => [
                'order' => [
                    'use_trait',
                    'case',
                    'constant_public',
                    'constant_protected',
                    'constant_private',
                    'property_public',
                    'property_protected',
                    'property_private',
                    'construct',
                    'magic',
                    'method_abstract',
                    'method_public',
                    'method_protected',
                    'method_private',
                    'destruct',
                    'phpunit',
                ],
            ],
            // end: cs-fixer with modifications

            // start: cs-fixer risky with modifications
            '@PhpCsFixer:risky' => true,
            'get_class_to_class_keyword' => true,
            'modernize_strpos' => true,
            'global_namespace_import' => [
                'import_classes' => true,
                'import_constants' => false,
                'import_functions' => true,
            ],
            'phpdoc_types_order' => [
                'null_adjustment' => 'always_last',
                'sort_algorithm' => 'none',
            ],
            'php_unit_test_case_static_method_calls' => [
                'call_type' => 'this',
            ],
            // end: cs-fixer risky with modifications

            // extras
            'not_operator_with_successor_space' => true,
            'simplified_null_return' => true,

            // disabled rules
            'comment_to_phpdoc' => false,
            'static_lambda' => false,
            'yoda_style' => false,
            'is_null' => false,
            'phpdoc_to_comment' => false,
            'phpdoc_no_alias_tag' => false,
            'php_unit_test_class_requires_covers' => false,
            'non_printable_character' => false,
        ];
    }

    public function getName(): string
    {
        return 'airlst';
    }

    public function getDescription(): string
    {
        return 'Ruleset for Airlst projects.';
    }

    public function isRisky(): bool
    {
        return true;
    }
}
