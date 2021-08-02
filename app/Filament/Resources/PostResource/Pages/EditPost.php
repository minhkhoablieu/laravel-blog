<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\EditRecord;
use App\Models\Slug;
class EditPost extends EditRecord
{
    public static $resource = PostResource::class;

    protected function beforeDelete()
    {
        $post = $this->record;

        $slug = Slug::whereReferenceId($post->id)
                        ->whereReferenceType(self::$resource::getModel())->first();
        $slug->delete();
    }
}
