<?php

namespace App\Http\Livewire;

use App\Models\Exercice;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\Rule;

final class ExerciceTable extends PowerGridComponent
{
    use ActionButton;

    //Messages informing success/error data is updated.
    public bool $showUpdateMessages = true;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): void
    {
        $this->showCheckBox()
            ->showPerPage()
            ->showSearchInput()
            ->showExportOption('download', ['excel', 'csv']);
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\Exercice>|null
    */
    public function datasource(): ?Builder
    {
        return Exercice::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): ?PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('publication_id')
            ->addColumn('publicationDate_formatted', function(Exercice $model) { 
                return Carbon::parse($model->publicationDate)->format('d/m/Y H:i:s');
            })
            ->addColumn('dateDebut_formatted', function(Exercice $model) { 
                return Carbon::parse($model->dateDebut)->format('d/m/Y');
            })
            ->addColumn('dateFin_formatted', function(Exercice $model) { 
                return Carbon::parse($model->dateFin)->format('d/m/Y');
            })
            ->addColumn('chiffreAffaire')
            ->addColumn('hasNotChiffreAffaire')
            ->addColumn('montantDepense')
            ->addColumn('nombreSalaries')
            ->addColumn('exerciceId')
            ->addColumn('noActivite')
            ->addColumn('nombreActivite')
            ->addColumn('defautDeclaration');
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::add()
                ->title('ID')
                ->field('id')
                ->makeInputRange(),

            Column::add()
                ->title('PUBLICATION ID')
                ->field('publication_id')
                ->makeInputRange(),

            Column::add()
                ->title('PUBLICATIONDATE')
                ->field('publicationDate_formatted', 'publicationDate')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('publicationDate'),

            Column::add()
                ->title('DATEDEBUT')
                ->field('dateDebut_formatted', 'dateDebut')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('dateDebut'),

            Column::add()
                ->title('DATEFIN')
                ->field('dateFin_formatted', 'dateFin')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('dateFin'),

            Column::add()
                ->title('CHIFFREAFFAIRE')
                ->field('chiffreAffaire')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('HASNOTCHIFFREAFFAIRE')
                ->field('hasNotChiffreAffaire')
                ->toggleable(),

            Column::add()
                ->title('MONTANTDEPENSE')
                ->field('montantDepense')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('NOMBRESALARIES')
                ->field('nombreSalaries')
                ->makeInputRange(),

            Column::add()
                ->title('EXERCICEID')
                ->field('exerciceId')
                ->makeInputRange(),

            Column::add()
                ->title('NOACTIVITE')
                ->field('noActivite')
                ->toggleable(),

            Column::add()
                ->title('NOMBREACTIVITE')
                ->field('nombreActivite')
                ->makeInputRange(),

            Column::add()
                ->title('DEFAUTDECLARATION')
                ->field('defautDeclaration')
                ->toggleable(),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Exercice Action Buttons.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::add('edit')
               ->caption('Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('exercice.edit', ['exercice' => 'id']),

           Button::add('destroy')
               ->caption('Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('exercice.destroy', ['exercice' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Exercice Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [
           
           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($exercice) => $exercice->id === 1)
                ->hide(),
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Edit Method
    |--------------------------------------------------------------------------
    | Enable the method below to use editOnClick() or toggleable() methods.
    | Data must be validated and treated (see "Update Data" in PowerGrid doc).
    |
    */

     /**
     * PowerGrid Exercice Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Exercice::query()->findOrFail($data['id'])
                ->update([
                    $data['field'] => $data['value'],
                ]);
       } catch (QueryException $exception) {
           $updated = false;
       }
       return $updated;
    }

    public function updateMessages(string $status = 'error', string $field = '_default_message'): string
    {
        $updateMessages = [
            'success'   => [
                '_default_message' => __('Data has been updated successfully!'),
                //'custom_field'   => __('Custom Field updated successfully!'),
            ],
            'error' => [
                '_default_message' => __('Error updating the data.'),
                //'custom_field'   => __('Error updating custom field.'),
            ]
        ];

        $message = ($updateMessages[$status][$field] ?? $updateMessages[$status]['_default_message']);

        return (is_string($message)) ? $message : 'Error!';
    }
    */
}
