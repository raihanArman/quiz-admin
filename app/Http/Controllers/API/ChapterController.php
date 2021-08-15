<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    //
    public function byPath($id){
        $chapter = Chapter::where('path_id', $id)->get();
        return ResponseFormatter::success(
            $chapter,
            'Data list chapter berhasil di ambil'
        );
    }

    public function byId($id){
        $chapter = Chapter::find($id);
        return ResponseFormatter::success(
            $chapter,
            'Data chapter berhasil di ambil'
        );
    }
}
