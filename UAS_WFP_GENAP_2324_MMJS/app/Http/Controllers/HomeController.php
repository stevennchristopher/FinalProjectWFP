<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Hotel;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hotel = Hotel::all();

        foreach($hotel as $r)
        {
            $directory = public_path('images/hotel/'.$r->id);
            if(File::exists($directory))
            {
                $files = File::files($directory);
                $filenames = [];
                foreach ($files as $file) {
                    $filenames[] = $file->getFilename();
                }
                $r['filenames']=$filenames;
            }
        }

        return view('frontend.index', compact('hotel'));
    }
}
