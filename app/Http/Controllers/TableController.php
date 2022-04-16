<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Str;

class TableController extends Controller
{
    public $tables = [
        'publication',
        'actionMenees',
        'activites',
        'categorieOrganisations',
        'clients',
        'collaborateurs',
        'decisionConcernees',
        'dirigeants',
        'domainesInterventions',
        'exercices',
        'listNiveauInterventions',
        'listSecteursActivites',
        'responsablePublics',
        'tiers',
    ];

    /**
     * Handle the incoming request.
     *
     * @param string $type
     * @return View
     */
    public function __invoke(string $type)
    {
        if (!in_array($type, $this->tables)) {
            abort(404);
        }

        $table = Str::kebab(Str::singular($type));

        return view('pages.table', compact('table'));
    }
}
