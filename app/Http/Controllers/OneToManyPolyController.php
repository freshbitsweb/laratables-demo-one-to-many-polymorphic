<?php

namespace App\Http\Controllers;

use App\Post;
use Freshbitsweb\Laratables\Laratables;

class OneToManyPolyController extends Controller
{
    /**
     *  Show Table Header column
     *
     *
      * @return Illuminate\Http\Response
    **/
    public function index()
    {
        return view('oneToManyPoly');
    }

    /**
     * return data of the One To Many Polymorphic Relationship datatables.
     *
     *
     * @return Jason
    **/
    public function oneToManyPolyData()
    {
        return Laratables::recordsOf(Post::class);
    }
}
