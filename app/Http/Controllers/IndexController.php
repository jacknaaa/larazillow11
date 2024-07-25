<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function index()
    {
        //dd(Listing::all());
        //dd(Listing::where('beds', '>', 4))->get();
        return inertia('Index/Index',
            [
                'message' => 'Hello from Laravel!',
            ]
        );
    }
    public function show()
    {
        return inertia('Index/Show');
    }
}
