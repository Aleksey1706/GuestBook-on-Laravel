<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 01.12.2017
 * Time: 19:33
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'id', 'comment', 'article_id', 'user_id', 'created_at', 'updated_at'
    ];

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function article() {
        return $this->belongsTo('App\Articles');
    }
}