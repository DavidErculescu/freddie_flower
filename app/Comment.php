<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property User|null $author
 * @property Post[]|null $post
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Comment extends Model
{
    protected $table = 'comments';

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post() {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
