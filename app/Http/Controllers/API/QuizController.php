<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Path;
use App\Models\Quiz;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    //
    public function byPath($id){
        $quiz = Quiz::where('path_id', $id)->orderBy('created_at', 'DESC')->get();
        return ResponseFormatter::success(
            $quiz,
            'Data list quiz berhasil di ambil'
        );
    }

    public function search(Request $request){
        $keyword=  $request->search;

        $quiz = DB::table('quizzes')
                    ->join('paths', 'quizzes.path_id', '=', 'paths.id')
                    ->select('quizzes.*', 'paths.name as path_name')
                    ->where('quizzes.name', 'like', '%'.$keyword.'%')
                    ->get();

        // $quiz = Quiz::where('name', 'like', '%'.$keyword.'%')->get();
        return ResponseFormatter::success(
            $quiz,
            'Data list quiz berhasil di ambil'
        );
    }

    public function check(Request $request){
        $quiz = Quiz::find($request->quiz_id);
        
        $student = Student::where('user_id', '=', $request->user_id)
            ->where('path_id', '=', $quiz->path_id)
            ->first();
        if($student === null){
          $data['start_quiz'] = true;  
        }else{
          $data['start_quiz'] = false;
        }

        return ResponseFormatter::success(
            $data,
            'Data check berhasil di ambil'
        );
    }

}
