<?php

namespace App\Services\Database;

use Illuminate\Support\Facades\DB;

class DatabaseConfigurationService
{

    /**
     * Get Database Characteristics
     * 
     * @param string|null $schemaName 
     *
     * @return array
     */
    public function getDatabaseCharacteristics($schemaName = null): array
    {
        return [
            'schemaName' => $schemaName ?? config("database.connections.mysql.database"),
            'charset' => config("database.connections.mysql.charset",'utf8mb4'),
            'collation' => config("database.connections.mysql.collation",'utf8mb4_unicode_ci')
        ];

    }

    /**
     * Reset Database Name
     *
     * @return void
     */
    public function resetDatabaseName(): void
    {
        config(["database.connections.mysql.database" => null]);
    }

    /**
     * Prepare query that will be executed to create Database
     *
     * @param array $dbConfiguration
     * @return string
     */
    public function prepareQuery($dbConfiguration): string
    {
        $query = "CREATE DATABASE IF NOT EXISTS {$dbConfiguration['schemaName']} 
                    CHARACTER SET {$dbConfiguration['charset']}
                    COLLATE {$dbConfiguration['collation']};";
        
        return $query;
    }

    /**
     * Execute Query
     */
    public function executeQuery($query)
    {
        DB::statement($query);
    }

    /**
     * Set Database name in config file
     *
     * @param string $schemaName
     * @return void
     */
    public function setDatabaseName($schemaName): void
    {
        config(["database.connections.mysql.database" => $schemaName]);
    }
}