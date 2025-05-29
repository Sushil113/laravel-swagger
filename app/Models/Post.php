<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 * @OA\Schema(
 *     schema="Post",
 *     type="object",
 *     title="Post",
 *     description="Post model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Sample Post Title"),
 *     @OA\Property(property="content", type="string", example="This is the content of the sample post."),
 *     @OA\Property(property="author", type="integer", example=1),
 *     @OA\Property(property="status", type="string", example="published"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-05-14T12:34:56Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-05-14T12:34:56Z")
 * )
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
