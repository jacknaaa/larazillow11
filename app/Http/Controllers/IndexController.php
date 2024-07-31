<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        // dd(
        //     Hash::make('password'),
        //     '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        //     Hash::check('password', '$2y$12$IdPi65bNxy6nnEpiZXwlPOM2D/ChAb25rPljbXAE7LIZX8S8Cr.6e')
        // );
        // dd(Auth::check());
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
