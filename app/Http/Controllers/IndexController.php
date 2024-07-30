<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        // dd(Auth::user());
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
