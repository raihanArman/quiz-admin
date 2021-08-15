<?php

namespace App\Http\Controllers;

use App\Http\Requests\PathRequest;
use App\Models\Category;
use App\Models\Path;
use Illuminate\Http\Request;

class PathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $path = Path::with(['category'])->paginate(10);

        return view('path.index', [
            'path' => $path
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
        $category = Category::all();
        // var_dump($category);
        // die();
        return view('path.create', [
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PathRequest $request)
    {
        //
        
        $data = $request->all();

        $data['image'] = $request->file('image')->store('assets/path', 'public');
        Path::create($data);

        return redirect()->route('paths.index');
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
        
        $item = Path::find($id);
        $category = Category::all();
        return view('path.edit', compact('category','item'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Path $path)
    {
        //
        
        $data = $request->all();
        
        if($request->file('image')){
            $data['image'] = $request->file('image')->store('assets/path', 'public');
        }

        $path->update($data);
        
        return redirect()->route('paths.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Path $path)
    {
        //
        $path->delete();

        return redirect()->route('paths.index');
    }
}
