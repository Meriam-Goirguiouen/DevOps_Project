<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     *
     * @var array<string, mixed>
     */
    public $default = [
        'DSN'      => '',
        'hostname' => '127.0.0.1',  // Utilise l'IP de ton conteneur Docker MySQL
        'username' => 'root',
        'password' => '',
        'database' => 'devops_tp',
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => (ENVIRONMENT !== 'production'),
        'cacheOn'  => false,
        'encrypt'  => false,
        'compress' => false,
        'stricton' => false,
        'failover' => [],
        'charset'  => 'utf8mb4',
        'save_queries' => true,
    ];

    public array $tests = [
        'DSN'          => '',
        'hostname'     => '127.0.0.1',  
        'username'     => 'root',
        'password'     => '',
        'database'     => 'devops_tp',
        'DBDriver'     => 'MySQLi',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_general_ci',
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => false,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => false,
        'charset'  => 'utf8mb4',
        'foundRows'    => false,
        'dateFormat'   => [
            'date'     => 'Y-m-d',
            'datetime' => 'Y-m-d H:i:s',
            'time'     => 'H:i:s',
        ],
    ];
    
    public function __construct()
    {
        parent::__construct();

        // Ensure the database group switches to 'tests' if testing
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
