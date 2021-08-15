<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Path;
use Illuminate\Http\Request;

class PathController extends Controller
{
    //
    public function popular(){
        $path = Path::orderBy('student', 'DESC')->get();
        return ResponseFormatter::success(
            $path,
            'Data list path berhasil di ambil'
        );
    }

    public function all(){
        $path = Path::orderBy('created_at', 'DESC')->get();
        return ResponseFormatter::success(
            $path,
            'Data list path berhasil di ambil'
        );
    }

    public function byCategory($id){
        $path = Path::where('category_id', $id)->orderBy('created_at', 'DESC')->get();
        return ResponseFormatter::success(
            $path,
            'Data list path berhasil di ambil'
        );
    }

}
