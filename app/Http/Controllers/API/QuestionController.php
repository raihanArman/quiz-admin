<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function byQuiz($id){
        $que = Question::where('quiz_id', $id)->get();
        return ResponseFormatter::success(
            $que,
            'Data list question berhasil di ambil'
        );
    }
}
