<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 01.12.2017
 * Time: 12:03
 */

namespace App;



use Illuminate\Database\Eloquent\Model;

/**
 * App\Articles
 *
 * @mixin \Eloquent
 */

class Articles extends Model
{

    protected $guarded = [];

    protected $table = 'articles';


}