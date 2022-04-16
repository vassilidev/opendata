<?php

namespace App\Http\Livewire;

use App\Models\Publication;
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

final class PublicationTable extends PowerGridComponent
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
    * @return  \Illuminate\Database\Eloquent\Builder<\App\Models\Publication>|null
    */
    public function datasource(): ?Builder
    {
        return Publication::query();
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
            ->addColumn('typeIdentifiantNational')
            ->addColumn('denomination')
            ->addColumn('publierMonAdressePhysique')
            ->addColumn('codePostal')
            ->addColumn('ville')
            ->addColumn('pays')
            ->addColumn('publierMonAdresseEmail')
            ->addColumn('publierMonTelephoneDeContact')
            ->addColumn('lienSiteWeb')
            ->addColumn('lienPageTwitter')
            ->addColumn('lienPageFacebook')
            ->addColumn('lienPageLinkedin')
            ->addColumn('declarationTiers')
            ->addColumn('declarationOrgaAppartenance')
            ->addColumn('isActivitesPubliees')
            ->addColumn('identifiantNational')
            ->addColumn('datePremierePublication_formatted', function(Publication $model) { 
                return Carbon::parse($model->datePremierePublication)->format('d/m/Y H:i:s');
            })
            ->addColumn('dateCreation_formatted', function(Publication $model) { 
                return Carbon::parse($model->dateCreation)->format('d/m/Y H:i:s');
            })
            ->addColumn('dateDernierePublicationActivite_formatted', function(Publication $model) { 
                return Carbon::parse($model->dateDernierePublicationActivite)->format('d/m/Y H:i:s');
            });
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
                ->title('TYPEIDENTIFIANTNATIONAL')
                ->field('typeIdentifiantNational')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('DENOMINATION')
                ->field('denomination')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('PUBLIERMONADRESSEPHYSIQUE')
                ->field('publierMonAdressePhysique')
                ->toggleable(),

            Column::add()
                ->title('CODEPOSTAL')
                ->field('codePostal')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('VILLE')
                ->field('ville')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('PAYS')
                ->field('pays')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('PUBLIERMONADRESSEEMAIL')
                ->field('publierMonAdresseEmail')
                ->toggleable(),

            Column::add()
                ->title('PUBLIERMONTELEPHONEDECONTACT')
                ->field('publierMonTelephoneDeContact')
                ->toggleable(),

            Column::add()
                ->title('LIENSITEWEB')
                ->field('lienSiteWeb')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('LIENPAGETWITTER')
                ->field('lienPageTwitter')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('LIENPAGEFACEBOOK')
                ->field('lienPageFacebook')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('LIENPAGELINKEDIN')
                ->field('lienPageLinkedin')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('DECLARATIONTIERS')
                ->field('declarationTiers')
                ->toggleable(),

            Column::add()
                ->title('DECLARATIONORGAAPPARTENANCE')
                ->field('declarationOrgaAppartenance')
                ->toggleable(),

            Column::add()
                ->title('ISACTIVITESPUBLIEES')
                ->field('isActivitesPubliees')
                ->toggleable(),

            Column::add()
                ->title('IDENTIFIANTNATIONAL')
                ->field('identifiantNational')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::add()
                ->title('DATEPREMIEREPUBLICATION')
                ->field('datePremierePublication_formatted', 'datePremierePublication')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('datePremierePublication'),

            Column::add()
                ->title('DATECREATION')
                ->field('dateCreation_formatted', 'dateCreation')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('dateCreation'),

            Column::add()
                ->title('DATEDERNIEREPUBLICATIONACTIVITE')
                ->field('dateDernierePublicationActivite_formatted', 'dateDernierePublicationActivite')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker('dateDernierePublicationActivite'),

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
     * PowerGrid Publication Action Buttons.
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
               ->route('publication.edit', ['publication' => 'id']),

           Button::add('destroy')
               ->caption('Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('publication.destroy', ['publication' => 'id'])
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
     * PowerGrid Publication Action Rules.
     *
     * @return array<int, \PowerComponents\LivewirePowerGrid\Rules\RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [
           
           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($publication) => $publication->id === 1)
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
     * PowerGrid Publication Update.
     *
     * @param array<string,string> $data
     */

    /*
    public function update(array $data ): bool
    {
       try {
           $updated = Publication::query()->findOrFail($data['id'])
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
