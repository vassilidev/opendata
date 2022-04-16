<?php

namespace App\Console\Commands;

use App\Models\Activite;
use App\Models\CategorieOrganisation;
use App\Models\Client;
use App\Models\Collaborateur;
use App\Models\Dirigeant;
use App\Models\Exercice;
use App\Models\ListNiveauIntervention;
use App\Models\ListSecteursActivite;
use App\Models\Publication;
use Artisan;
use Illuminate\Console\Command;
use Str;

class ParseOpendata extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'opendata:parse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse the opendata file into the database';

    /**
     * The list of model to fill.
     *
     * @var array
     */
    protected $models = [
        Publication::class,
        Activite::class,
        Exercice::class,
        ListNiveauIntervention::class,
        ListSecteursActivite::class,
        Client::class,
        CategorieOrganisation::class,
        Dirigeant::class,
        Collaborateur::class,
    ];

    /**
     * The fillable property for each model.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    private function handleFile()
    {
        if (!file_exists(storage_path('app/opendata.json'))) {
            $this->info('Opendata file does not exist !');
            Artisan::call('opendata:download');
        }
    }

    private function handleModelProperty()
    {
        foreach ($this->models as $model) {
            $model = new $model;
            $table = $model->getTable();
            $this->fillable[$table] = $model->getFillable();
        }
    }

    private function deleteSubObject(array $array, string $model): array
    {
        return array_intersect_key($array, array_flip($this->fillable[Str::snake($model)]));
    }

    private function handleParsing()
    {
        $this->info('Start Parsing data...');
        $this->call('migrate:fresh');

        $opendata = json_decode(file_get_contents(storage_path('app/opendata.json')), true);

        foreach ($opendata['publications'] as $p) {
            $publication = Publication::create($this->deleteSubObject($p, 'publications'));

            $publication->categorieOrganisation()->create($p['categorieOrganisation']);

            foreach (['dirigeants', 'collaborateurs', 'clients'] as $type) {
                foreach ($p[$type] as $data) {
                    $publication->$type()->create($this->deleteSubObject($data, $type));
                }
            }

            foreach ($p['activites'] as $type => $activite) {
                $type = Str::plural($type);
                foreach ($activite as $typeActivite) {
                    $publication->$type()->create($this->deleteSubObject($typeActivite, $type));
                }
            }

            foreach ($p['exercices'] as $ex) {
                $ex = $ex['publicationCourante'];
                $exercice = $publication->exercices()->create($this->deleteSubObject($ex, 'exercices'));
                if (!empty($ex['activites'])) {
                    foreach ($ex['activites'] as $activite) {
                        $act = $activite['publicationCourante'];

                        $activite = $exercice->activites()->create($this->deleteSubObject($act, 'activites'));

                        if (is_array($act['domainesIntervention'])) {
                            foreach ($act['domainesIntervention'] as $domaine) {
                                $activite->domainesInterventions()->create([
                                    'domaine' => $domaine,
                                ]);
                            }
                        }

                        if (is_array($act['actionsRepresentationInteret'])) {
                            foreach ($act['actionsRepresentationInteret'] as $actionRepresentation) {
                                foreach (['reponsablesPublics', 'decisionsConcernees', 'actionsMenees', 'tiers'] as $type) {
                                    if (!empty($actionRepresentation[$type])) {
                                        foreach ($actionRepresentation[$type] as $value) {
                                            $activite->$type()->create([
                                                'text' => $value,
                                            ]);
                                        }
                                    }
                                }
                            }
                        }

                    }
                }
            }
        }

        $this->info('Parsing successfully executed !');
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->handleFile();
        $this->handleModelProperty();
        $this->handleParsing();
    }
}
