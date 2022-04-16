<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class DownloadOpendata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'opendata:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download the opendata file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return
     */
    public function handle()
    {
        $this->info('Downloading The Agora OpenData Repertoire From HATVP...');
        $json = file_get_contents('https://www.hatvp.fr/agora/opendata/agora_repertoire_opendata.json');
        Storage::disk('local')->put('opendata.json', $json);
        $this->info('Done !');
    }
}
