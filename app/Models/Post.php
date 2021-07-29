<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class Post extends Model
{
    use HasFactory, SoftDeletes;


    const PUBLISHED = 1;
    const UNPUBLISHED = 2;
    const DRAFT = 3;

    protected $fillable = [
        'name',
        'description',
        'image',
        'content',
        'category_id',
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(\Filament\Models\User::class, 'user_id');
    }


    public function scopePublished($query)
    {
        return $query->where('status', '=', self::PUBLISHED)
                        ->where('published_at', '<=', Carbon::now());
    }


    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value;

        if (empty($value) && $this->attributes['status'] == 1) {
            $this->attributes['published_at'] = Carbon::now();
        }
    }

}
