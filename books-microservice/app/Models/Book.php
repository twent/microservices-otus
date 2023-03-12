<?php

namespace App\Models;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $author
 * @property int $release_date
 * @property int $pages_count
 * @property string $description
 * @property CarbonImmutable $created_at
 * @property CarbonImmutable $updated_at
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'release_year',
        'pages_count',
        'description',
        'created_at',
        'updated_at',
    ];
}
