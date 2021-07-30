<?php
namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Roles;
use Filament\Resources\Forms\Components;
use App\Filament\Resources\Forms\Components as CustomComponent;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Filter;
use Filament\Resources\Tables\Table;
use App\Models\Post;
use Carbon\Carbon;
class PostResource extends Resource
{
    public static $icon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Components\Grid::make([
                    Components\TextInput::make('name')
                                            ->autofocus()
                                            ->required(),

                    Components\BelongsToSelect::make('category_id')
                                                ->relationship('category', 'name')
                                                ->required()
                                                ->preload(),

                    Components\Select::make('status')
                                        ->required()
                                        ->placeholder('Select a status')
                                        ->options(Post::listStatus()),

                    Components\DateTimePicker::make('published_at')
                                        ->displayFormat('D-m-Y H:i')
                                        ->required()
                                        ->withoutSeconds(),
                ])->columns(2),

                Components\Textarea::make('description')->required(),

                Components\FileUpload::make('image')
                                        ->image()
                                        ->directory('post')
                                        ->visibility('public'),

                CustomComponent\Ckeditor::make('content')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Columns\Text::make('id')->sortable()->primary(),
                Columns\Text::make('name')->searchable(),
                Columns\Text::make('category.name'),
                Columns\Text::make('user.name'),
                Columns\Text::make('status')->sortable()->options(Post::listStatus()),
                Columns\Text::make('published_at')->dateTime('D-m H:i'),
            ])
            ->filters([
                //
            ]);
    }

    public static function relations(): array
    {
        return [
            //
        ];
    }

    public static function routes(): array
    {
        return [
            Pages\ListPosts::routeTo('/', 'index'),
            Pages\CreatePost::routeTo('/create', 'create'),
            Pages\EditPost::routeTo('/{record}/edit', 'edit'),
        ];
    }


    public static function authorization(): array
    {
        return [
            Roles\Editor::allow(),
        ];
    }
}
