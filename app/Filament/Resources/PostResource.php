<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use App\Filament\Resources\Forms\Components as CustomComponent;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;

class PostResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                //
                Components\TextInput::make('name')->autofocus()->required(),
                Components\Textarea::make('description')->autofocus()->required(),
                Components\BelongsToSelect::make('category_id')->relationship('category', 'name')->preload(),
                Components\FileUpload::make('image')
                                        ->image()
                                        ->directory('post')
                                        ->visibility('public'),
                CustomComponent\Ckeditor::make('content')->required(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                //
                Columns\Text::make('name')->searchable()->primary(),
                Columns\Text::make('category.name'),
                Columns\Text::make('user.name')
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
            Pages\ListPosts::routeTo('/', 'index'),
            Pages\CreatePost::routeTo('/create', 'create'),
            Pages\EditPost::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
