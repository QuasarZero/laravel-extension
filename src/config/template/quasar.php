<?php
    return [
        'database' => [
            /*
             *----------------------------------
             * Specify the handler of the database message resolver
             *----------------------------------
             */
            'message_resolve_handler' => [
                'mysql'      => null,
                'postgresql' => null,
                'sqlite'     => null,
                'sqlserver'  => null,
            ],
            'migrate'                 => [
                /*
                 *----------------------------------
                 * Specify the library of schema
                 *----------------------------------
                 */
                'schema' => Quasar\Extension\Laravel\Console\MigrationCreator::SCHEMA
            ]
        ],
        'console'  => [
            'make' => [
                /*
                 *----------------------------------
                 * Custom your template creator name
                 *----------------------------------
                 */
                '_creator' => 'Quasar',
                'service'  => [
                    /*
                     *----------------------------------
                     * Custom your parent class
                     *
                     * Such as
                     * \App\Service\CoreService
                     *----------------------------------
                     */
                    'parent_class' => ''
                ]
            ]
        ]
    ];