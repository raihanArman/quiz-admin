<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Path;
use App\Models\Quiz;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    //
    public function addHistory(Request $request){

        $user = User::find($request->user_id);
        $data['last_score'] = $request->score;
        $data['total_quiz'] = $user->total_quiz+1;
        $user->update($data);

        $quiz = Quiz::find($request->quiz_id);
        $path = Path::find($quiz->path_id);
        
        $student = Student::where('user_id', '=', $request->user_id)
            ->where('path_id', '=', $quiz->path_id)
            ->first();
        if($student === null){
            Student::create([
                'user_id' => $request->user_id,
                'path_id' => $quiz->path_id
            ]);
            $dataPath['student'] = $path->student+1;
            $path->update($dataPath);
        }
        

        $historySave = History::create([
            'user_id' => $request->user_id,
            'quiz_id' => $request->quiz_id,
            'score' => $request->score,
            'correct' => $request->correct,
            'incorrect' => $request->incorrect,
            'not_answered' => $request->not_answered
        ]);

        $historyData = History::with(['quiz'])
            ->find($historySave->id);

        return ResponseFormatter::success(
            $historyData,
            'Data list history berhasil di ambil'
        );
    }

    public function byUser($id){
        $history = History::with(['quiz'])
            ->where('user_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return ResponseFormatter::success(
            $history,
            'Data list history berhasil di ambil'
        );
    }
    

}
