import eslint from '@eslint/js';
import prettier from 'eslint-plugin-prettier/recommended';
import tseslint from 'typescript-eslint';
import prettierConfig from 'eslint-config-prettier';
import stylistic from '@stylistic/eslint-plugin';

export default tseslint.config(
    {
        ignores: [
            "dump/**",
            "dist/**",
            "scripts/**",
            "**.js",
            "src/ts/types/melvor/**",
            "eslint.config.mjs",
        ],
    },
    eslint.configs.recommended,
    ...tseslint.configs.strictTypeChecked,
    ...tseslint.configs.stylisticTypeChecked,
    {
        languageOptions: {
            parserOptions: {
                projectService: true,
                tsconfigRootDir: import.meta.dirname,
            },
        },
        files: ['**/*.ts', '**/*.tsx'],
        plugins: {
            '@stylistic': stylistic,
        },
        rules: {
            // Need this for petitevue shenanigans
            '@typescript-eslint/no-non-null-assertion': 'off',
            '@typescript-eslint/no-this-alias': 'off',
            '@typescript-eslint/no-confusing-void-expression': 'off',
            '@typescript-eslint/no-unnecessary-type-parameters': 'off',
            '@typescript-eslint/no-inferrable-types': 'off',
            '@typescript-eslint/no-empty-object-type': ['error', {
                allowInterfaces: 'with-single-extends',
            }],
            '@typescript-eslint/restrict-template-expressions': ['error', {
                allowNumber: true,
            }],
            "@typescript-eslint/no-unused-vars": ['error', {
                'args': 'all',
                'argsIgnorePattern': '^_',
                'caughtErrors': 'all',
                'caughtErrorsIgnorePattern': '^_',
                'destructuredArrayIgnorePattern': '^_',
                'varsIgnorePattern': '^_',
                'ignoreRestSiblings': true
            }],
            '@stylistic/comma-dangle': ['error', 'always-multiline'],
            '@stylistic/semi': ['error', 'always'],
        }
    },
    // prettier,
);
[{
    parser: '@typescript-eslint/parser',
    plugins: [
        '@typescript-eslint',
        'prettier'
    ],
    extends: [
        'eslint:recommended',
        'plugin:@typescript-eslint/eslint-recommended',
        'plugin:@typescript-eslint/recommended',
        'prettier'
    ],
    rules: {
        'no-console': 0, // Means warning
        'prettier/prettier': 2, // Means error  }
        '@typescript-eslint/no-explicit-any': 0,
        '@typescript-eslint/no-this-alias': 0,
        '@typescript-eslint/ban-ts-comment': 0,
        '@typescript-eslint/comma-dangle': 'always',
        'no-unused-vars': 'off',
        '@typescript-eslint/no-unused-vars': [
            'warn',
            {
                'varsIgnorePattern': '^_',
                'argsIgnorePattern': '^_',
                'caughtErrorsIgnorePattern': '^_'
            }
        ]
    },
    ignorePatterns: [
        'webpack.config.*',
        'node_modules',
        'dist'
    ]
}];
