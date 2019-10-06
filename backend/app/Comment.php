<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Comment Model
 * 
 * @author Han Kyung Sung <han.sung@evotrux.com>
 */
class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment', 'post_id', 'user_id'
    ];

    /**
     * Relationship: comment belongs to user.
     * 
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('\App\User');
    }
    
    /**
     * Relationship: comment belongs to post.
     * 
     * @return void
     */
    public function post()
    {
        return $this->belongsTo('\App\Post');
    }
}
