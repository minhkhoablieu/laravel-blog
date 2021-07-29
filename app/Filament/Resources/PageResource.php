<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Filament\Resources\PageResource\RelationManagers;
use App\Filament\Roles;
use App\Filament\Resources\Forms\Components as CustomComponent;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;
use App\Models\Page;
class PageResource extends Resource
{
    public static $icon = 'heroicon-o-collection';
    public static $navigationSort = 1;
    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\Grid::make([
                    Components\TextInput::make('name')
                                            ->autofocus()
                                            ->required(),


                    Components\Select::make('status')
                                        ->required()
                                        ->placeholder('Select a status')
                                        ->options(Page::listStatus()),

                    Components\DateTimePicker::make('published_at')
                                        ->displayFormat('D-m-Y H:i')
                                        ->required()
                                        ->withoutSeconds(),
                ])->columns(2),

                Components\Textarea::make('description')->required(),

                Components\FileUpload::make('image')
                                        ->image()
                                        ->directory('page')
                                        ->visibility('public'),

                CustomComponent\Ckeditor::make('content')->required(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                //
                Columns\Text::make('id')->sortable()->primary(),
                Columns\Text::make('name')->searchable(),
                Columns\Text::make('user.name'),
                Columns\Text::make('status')->sortable()->options(Page::listStatus()),
                Columns\Text::make('published_at')->dateTime('D-m H:i'),
            ])
            ->filters([
                //
            ]);
    }

    public static function relations()
    {
        return [
            //
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListPages::routeTo('/', 'index'),
            Pages\CreatePage::routeTo('/create', 'create'),
            Pages\EditPage::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
