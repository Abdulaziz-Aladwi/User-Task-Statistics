<?php

namespace App\Console\Commands;

use App\Services\Database\DatabaseConfigurationService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Psr\Log\LoggerInterface;

class DatabaseCreateCommand extends Command
{

    /** @var DatabaseConfigurationService  */
    protected $databaseConfigurationService;

    /** @var LoggerInterface  */
    protected $logger;    

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:create {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @param DatabaseConfigurationService
     */
    public function __construct(DatabaseConfigurationService $databaseConfigurationService, LoggerInterface $logger)
    {
        parent::__construct();
        $this->databaseConfigurationService = $databaseConfigurationService;
        $this->logger = $logger;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $schemaName = $this->argument('name');
            $dbConfigurations = $this->databaseConfigurationService->getDatabaseCharacteristics($schemaName);
            $query = $this->databaseConfigurationService->prepareQuery($dbConfigurations);
            $this->databaseConfigurationService->executeQuery($query);

            $this->info("Database {$dbConfigurations['schemaName']} has been created successfully");
        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage(), $exception->getTrace());
            $this->error("Something went wrong, please check logs");
        }

    }

}
