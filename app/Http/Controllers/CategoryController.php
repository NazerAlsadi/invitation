<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Validator;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = category::all();
        return view('category.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required | max:100', 'color' => 'required'];
        $messages = [
            'name.max' => 'title should not be less than 100 char',
            'name.required' => 'name feild is required',
            'color.required' => 'color feild is required',
        ];
        $validator = Validator::make($request->all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        category::create($request->all());
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(category $category)
    {

        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, category $category)
    {
        $rules = ['name' => 'required | max:255','color' => 'required'];
        $messages = [
            'name.max' => 'title should not be less than 255 char',
            'name.required' => 'name feild is required',
            'color.required' => 'color feild is required',
        ];
        $validator = Validator::make($request->all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $category->update([
            'name' => $request->name ,
            'color' => $request->color, 
        ]);
        return redirect('/categories')->with('message' , 'updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(category $category)
    {
        $category->delete();
        return redirect('/categories');
    }
}
