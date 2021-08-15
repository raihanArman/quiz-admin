<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizRequest;
use App\Models\Path;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        // $quiz = Quiz::with(['path'])->paginate(10);
        $quiz = Quiz::select('quizzes.*', DB::raw('coalesce(SUM(questions.id),0) As total_que'))
         ->leftJoin('questions', 'questions.quiz_id', '=', 'quizzes.id')
         ->groupBy('quizzes.id')
         ->paginate(10);

        return view('quiz.index', [
            'quiz' => $quiz
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $path = Path::all();
        // var_dump($category);
        // die();
        return view('quiz.create', [
            'path' => $path
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizRequest $request)
    {
        //
        
        $data = $request->all();

        Quiz::create($data);

        return redirect()->route('quizzes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $item = Quiz::find($id);
        $path = Path::all();
        return view('quiz.edit', compact('path','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizRequest $request, Quiz $quiz)
    {
        //
        $data = $request->all();
        

        $quiz->update($data);
        
        return redirect()->route('quizzes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
