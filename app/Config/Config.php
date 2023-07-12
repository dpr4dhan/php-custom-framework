<?php

namespace App\Config;

/**
 * @property-read ?array $db
 */
class Config
{
    protected array $config = [];

    public function __construct(array $env){
        $this->config = [
            'db' => [
                        'host' => $_ENV['DB_HOST'],
                        'user' => $_ENV['DB_USER'],
                        'pass' => $_ENV['DB_PASSWORD'],
                        'database' => $_ENV['DB_NAME'],
                        'driver' => $_ENV['DB_DRIVER'] ?? 'mysql'
                    ]
        ];
    }

    public function __get($name) : array|null
    {
        return $this->config[$name] ?? null;
    }
}