<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    const PUBLISHED = 1;
    const UNPUBLISHED = 2;
    const DRAFT = 3;

    protected $fillable = [
        'name',
        'description',
        'image',
        'content',
        'user_id'
    ];



    public static function listStatus()
    {
        return [
            self::PUBLISHED     =>   "Published",
            self::UNPUBLISHED   =>   "Unpublished",
            self::DRAFT         =>   "Draft"
        ];
    }

    public function user(){
        return $this->belongsTo(\Filament\Models\User::class, 'user_id');
    }
}
