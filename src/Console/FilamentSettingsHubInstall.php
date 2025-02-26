<?php

namespace TomatoPHP\FilamentSettingsHub\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;

class FilamentSettingsHubInstall extends Command
{
    use RunCommand;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'filament-settings-hub:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install package and publish assets';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Publish Vendor Assets');
        // Register migrations
        if (! class_exists('SitesSettings')) {
            $stubPath = __DIR__ . '/../../database/migrations/sites_settings.php.stub';
            $databasePath = database_path('migrations/' . date('Y_m_d_His', time()) . '_sites_settings.php');

            File::copy($stubPath, $databasePath);
        }
        $this->callSilent('optimize:clear');
        $this->artisanCommand(['migrate']);
        $this->artisanCommand(['optimize:clear']);
        $this->info('Filament Settings Hub installed successfully.');
    }
}
