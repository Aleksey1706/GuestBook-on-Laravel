<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable=[
        'id', 'name', 'email', 'text', 'created_at', 'updated_at'
    ];
}