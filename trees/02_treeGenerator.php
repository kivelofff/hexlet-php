<?php
/**
 * еализуйте функцию generator(), которая создает такую файловую систему:

# Обратите внимание на метаданные



php-package # директория (метаданные: ['hidden' => true])

├── Makefile # файл

├── README.md # файл

├── dist # пустая директория

├── tests # директория

│   └── test.php # файл (метаданные: ['type' => 'text/php'])

|── src #директория

|   └── index.php # файл (метаданные: ['type' => 'text/php'])

├── phpunit.xml # файл (метаданные: ['type' => 'text/xml'])

└── assets # директория (метаданные: ['owner' => 'root', 'hidden' => false])

└── util # директория

└── cli # директория

└── LICENSE # файл
 */

function generator(): array
{
    return [
        'name' => 'php-package',
        'type' => 'directory',
        'meta' => ['hidden' => true],
        'children' => [
            [
                'name' => 'Makefile',
                'type' => 'file',
                'meta' => []
            ],
            [
                'name' => 'README.md',
                'type' => 'file',
                'meta' => []
            ],
            [
                'name' => 'dist',
                'type' => 'directory',
                'meta' => [],
                'children' => []
            ],
            [
                'name' => 'tests',
                'type' => 'directory',
                'meta' => [],
                'children' => [
                    [
                        'name' => 'test.php',
                        'type' => 'file',
                        'meta' => ['type' => 'text/php']
                    ]
                ]
            ],
            [
                'name' => 'src',
                'type' => 'directory',
                'meta' => [],
                'children' => [
                    [
                        'name' => 'index.php',
                        'type' => 'file',
                        'meta' => ['type' => 'text/php']
                    ]
                ]
            ],
            [
                'name' => 'phpunit.xml',
                'type' => 'file',
                'meta' => ['type' => 'text/xml']
            ],
            [
                'name' => 'assets',
                'type' => 'directory',
                'meta' => ['owner' => 'root', 'hidden' => false],
                'children' => [
                    [
                        'name' => 'util',
                        'type' => 'directory',
                        'meta' => [],
                        'children' => [
                            [
                                'name' => 'cli',
                                'type' => 'directory',
                                'meta' => [],
                                'children' => [
                                    [
                                        'name' => 'LICENSE',
                                        'type' => 'file',
                                        'meta' => []
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ];
}

