<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property User|null $author
 * @property Comment[]|null $comments
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Post extends Model
{
    protected $table = 'posts';

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
