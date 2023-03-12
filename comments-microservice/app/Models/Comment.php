<?php

namespace App\Models;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $entity_type
 * @property int $entity_id
 * @property string $author
 * @property string $text
 * @property CarbonImmutable $created_at
 * @property CarbonImmutable $updated_at
 */
class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'entity_type',
        'entity_id',
        'author',
        'text',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
