<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Post Model
 * 
 * @author Han Kyung Sung <han.sung@evotrux.com>
 */
class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content', 'status'
    ];
    
    /**
     * Relationship for user and post. Post belongs to user.
     */
    public function user()
    {
        return $this->belongsTo('\App\User');
    }

    /**
     * Relationship for post and comments. Post has many comments.
     */
    public function comments()
    {
        return $this->hasMany('\App\Comment')->where('status', '=', 'active')->orderBy('id');
    }
}
