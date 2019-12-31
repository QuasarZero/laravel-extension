<?php
    return [
        'database' => [
            # Specify the handler of the database message resolver
            'message_resolve_handler' => [
                'mysql'      => null,
                'postgresql' => null,
                'sqlite'     => null,
                'sqlserver'  => null,
            ],
            'migrate'=>[
                # Specify the library of schema
                'schema'=>Quasar\Extension\Laravel\Console\MigrationCreator::SCHEMA
            ]
        ]
    ];