<?php

namespace App\Models;

use Database\Factories\PageFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $image
 * @property string $content
 * @property string|null $published_at
 * @property int $status
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Filament\Models\User $user
 * @method static PageFactory factory(...$parameters)
 * @method static Builder|Page newModelQuery()
 * @method static Builder|Page newQuery()
 * @method static Builder|Page query()
 * @method static Builder|Page whereContent($value)
 * @method static Builder|Page whereCreatedAt($value)
 * @method static Builder|Page whereDeletedAt($value)
 * @method static Builder|Page whereDescription($value)
 * @method static Builder|Page whereId($value)
 * @method static Builder|Page whereImage($value)
 * @method static Builder|Page whereName($value)
 * @method static Builder|Page wherePublishedAt($value)
 * @method static Builder|Page whereStatus($value)
 * @method static Builder|Page whereUpdatedAt($value)
 * @method static Builder|Page whereUserId($value)
 * @mixin Eloquent
 */
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



    public static function listStatus(): array
    {
        return [
            self::PUBLISHED     =>   "Published",
            self::UNPUBLISHED   =>   "Unpublished",
            self::DRAFT         =>   "Draft"
        ];
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\Filament\Models\User::class, 'user_id');
    }

    public function slug(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(Slug::class, 'reference_id');
    }
}
