<?php

namespace App\Http\Controllers;

use App\Models\Path;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    //

    public function index(){
        $path = Path::orderBy('student', 'DESC')->get();
        return view('result.index', [
            'result' => $path
        ]);
    }

}
