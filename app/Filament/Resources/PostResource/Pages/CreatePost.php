<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePost extends CreateRecord
{
    public static $resource = PostResource::class;
    protected function beforeFill()
    {
        // Runs before the form fields are saved to the database.
        $this->record['user_id'] = Auth::id();
    }
}
