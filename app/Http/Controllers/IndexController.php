<?php

namespace App\Http\Controllers;

use App\Articles;


class IndexController extends Controller
{
    public function index(){

        $news = Articles::paginate(2);
        $pagination = $news->links('pagination.paginaton');
       /* dd($news);*/
        return view('main',[

            'articles'=>$news, 'pagination'=>$pagination
        ]);
    }
}
