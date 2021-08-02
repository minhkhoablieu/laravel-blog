<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Resources\PageResource;
use App\Models\Slug;
use Filament\Resources\Pages\EditRecord;

class EditPage extends EditRecord
{
    public static $resource = PageResource::class;

    protected function beforeDelete()
    {
        $page = $this->record;

        $slug = Slug::whereReferenceId($page->id)
            ->whereReferenceType(self::$resource::getModel())->first();
        $slug->delete();
    }
}
