<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\Slug;
use Illuminate\Support\Str;

class CreatePage extends CreateRecord
{
    public static $resource = PageResource::class;


    protected function beforeFill()
    {
        $this->record['user_id'] = Auth::id();
    }


    protected function afterCreate()
    {
        $post = $this->record;


        Slug::create([
            'reference_type' => self::$resource::getModel(),
            'key' => Str::slug($post->name),
            'reference_id' =>  $post->id
        ]);

    }
}
