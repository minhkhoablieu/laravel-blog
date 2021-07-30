<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


/**
 * App\Models\Slug
 *
 * @property int $id
 * @property string $key
 * @property int $reference_id
 * @property string $reference_type
 * @property string|null $prefix
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Slug newModelQuery()
 * @method static Builder|Slug newQuery()
 * @method static Builder|Slug query()
 * @method static Builder|Slug whereCreatedAt($value)
 * @method static Builder|Slug whereId($value)
 * @method static Builder|Slug whereKey($value)
 * @method static Builder|Slug wherePrefix($value)
 * @method static Builder|Slug whereReferenceId($value)
 * @method static Builder|Slug whereReferenceType($value)
 * @method static Builder|Slug whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Slug extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference_type',
        'key',
        'reference_id',
    ];
}
