<?php

namespace App\Filament\Pages;

use App\Filament\Roles\Editor;
use App\Models\Setting;
use Filament\Forms\HasForm;
use Filament\Pages\Page;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;

class Settings extends Page
{
    use HasForm;

    public static $icon = 'heroicon-o-cog';

    public static $view = 'filament.pages.settings';

    public static $navigationSort = 2;

    public static string $saveButtonLabel = 'Update';

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
                            Components\TextInput::make('app_name'),
                            Components\TextInput::make('footer_text'),
                        ],
                    ),
                    Components\Tab::make(
                        'Email',
                        [
                            Components\TextInput::make('email'),
                        ],
                    ),
                    Components\Tab::make(
                        'Social Profiles',
                        [
                            Components\TextInput::make('facebook_url'),
                            Components\TextInput::make('twitter_url'),
                            Components\TextInput::make('instagram_url'),
                            Components\TextInput::make('linkedin_url'),
                            Components\TextInput::make('youtube_url'),
                        ],
                    ),
                    Components\Tab::make(
                        'Meta',
                        [
                            Components\TextInput::make('meta_site_name'),
                            Components\TextInput::make('meta_description'),
                            Components\TextInput::make('meta_keyword'),
                        ],
                    ),
                    Components\Tab::make(
                        'Analytics',
                        [
                            Components\TextInput::make('google_analytics'),

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

    public static function authorization(): array
    {
        return [
            Editor::deny(),
        ];
    }
}
