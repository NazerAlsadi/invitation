<?php

namespace App\Http\Controllers;

use App\Models\prefix;
use Illuminate\Http\Request;
use Validator;

class PrefixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prefixes= prefix::all();
        return view('prefix.index',compact('prefixes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prefix.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = ['name' => 'required | max:100',];
        $messages = [
            'name.max' => 'title should not be less than 100 char',
            'name.required' => 'this feild is required'
        ];
        $validator = Validator::make($request->all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        prefix::create($request->all());
        return redirect('/prefixes')->with('message' , 'created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\prefix  $prefix
     * @return \Illuminate\Http\Response
     */
    public function show(prefix $prefix)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\prefix  $prefix
     * @return \Illuminate\Http\Response
     */
    public function edit(prefix $prefix)
    {
        return view('prefix.edit', compact('prefix'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\prefix  $prefix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, prefix $prefix)
    {
        $rules = ['name' => 'required | max:255','languge' => 'required'];
        $messages = [
            'name.max' => 'title should not be less than 255 char',
            'name.required' => 'name feild is required',
            'languge.required' => 'languge feild is required',
        ];
        $validator = Validator::make($request->all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $prefix->update([
            'name' => $request->name ,
            'languge' => $request->languge 
        ]);
        return redirect('/prefixes')->with('message' , 'updated');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\prefix  $prefix
     * @return \Illuminate\Http\Response
     */
    public function destroy(prefix $prefix)
    {
        $prefix->delete();
        return redirect('/prefixes')->with('message' , 'deleted');
    }
}
