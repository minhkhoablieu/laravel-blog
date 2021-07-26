<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Forms\HasForm;
use Filament\Pages\Page;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;

class Settings extends Page
{
    use HasForm;

    public static $icon = 'heroicon-o-document-text';

    public static $view = 'filament.pages.settings';

    public static $saveButtonLabel = 'Update';

    public $record;

    public function submit()
    {
        Setting::set($this->record);

        $this->notify('Saved');
    }


    public function getForm(): Form
    {
        $form = app(Form::class);

        $form->livewire(Setting::getAll());

        return $form->schema([
            Components\Tabs::make('Label')
                ->tabs([
                    Components\Tab::make(
                        'General',
                        [
                            Components\TextInput::make('title')->autofocus()->required(),
                            Components\TextInput::make('description')->autofocus()->required(),
                            Components\TextInput::make('keyword')->autofocus()->required(),
                            Components\TextInput::make('footer')->autofocus()->required(),
                        ],
                    ),
                    Components\Tab::make(
                        'Seo',
                        [
                            Components\Textarea::make('google_analytics')->autofocus(),

                        ],
                    ),
                ]),
        ]);

    }

    public function mount()
    {
        $this->record = Setting::getAll()->toArray();
    }

    protected function layoutData(): array
    {
        return [
           'form' => $this->getForm()
        ];
    }

    protected function viewData(): array
    {
        return [];
    }
}
