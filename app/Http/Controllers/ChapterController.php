<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChapterRequest;
use App\Models\Chapter;
use App\Models\Path;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $path = Chapter::with(['path'])->paginate(10);

        return view('chapter.index', [
            'chapter' => $path
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
        //
        $path = Path::all();
        // var_dump($category);
        // die();
        return view('chapter.create', [
            'path' => $path
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChapterRequest $request)
    {
        //
        $data = $request->all();

        if($request->file('image')){
            $data['image'] = $request->file('image')->store('assets/chapter', 'public');
        }

        Chapter::create($data);

        return redirect()->route('chapters.index');
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
        
        $item = Chapter::find($id);
        $path = Path::all();
        return view('chapter.edit', compact('path','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChapterRequest $request, Chapter $chapter)
    {
        //
        
        $data = $request->all();
        
        if($request->file('image')){
            $data['image'] = $request->file('image')->store('assets/chapter', 'public');
        }

        $chapter->update($data);
        
        return redirect()->route('chapters.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        //
        $chapter->delete();

        return redirect()->route('chapters.index');
    }
}
