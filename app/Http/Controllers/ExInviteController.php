<?php

namespace App\Http\Controllers;

use App\Models\exInvite;
use Illuminate\Http\Request;
use App\Models\prefix;
use App\Models\status;
use Validator;

class ExInviteController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exInvites = exInvite::all();
        $statuses = status::all();
        return view('exInvetation.index' , compact('exInvites' , 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prefixes = prefix::all();
        $statuses = status::all();
        return view('exInvetation.create' , compact('prefixes' , 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['prefix_id' => 'required',
                  'fullName' =>'required |max:150 ',
                  'email'    => 'required  ',
                  'mobile'   => 'required | numeric |starts_with:966',
                  'company'  => 'required',
                  'jobfunction' => 'required',           
        ];
        $messages = [
            'prefix_id.required' => 'prefix_id feild is required',
            'fullName.max' => 'fullName should not be more than 150 char',
            'fullName.required' => 'fullName feild is required',
            'email.required' => 'email feild is required',
            'mobile.required' => 'mobile feild is required',
            'mobile.numeric' => 'mobile feild should be number',
            'mobile.starts_with' => 'mobile feild should be started with 966',
            'company.required' => 'company feild is required',
            'jobfunction.required' => 'jobfunction feild is required',
            
        ];
        $validator = Validator::make($request->all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        exInvite::create($request->all());
      
        return redirect('/exInvetation')->with('message' , 'created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\exInvite  $exInvite
     * @return \Illuminate\Http\Response
     */
    public function show(exInvite $exInvit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\exInvite  $exInvite
     * @return \Illuminate\Http\Response
     */
    public function edit(exInvite $exInvit)
    {
        $prefixes = prefix::all();
        $statuses = status::All();
        $prefixes = prefix::all();
        return view('exInvetation.edit' , compact('exInvit','statuses','prefixes'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\exInvite  $exInvite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, exInvite $exInvit)
    {
        $rules = ['prefix_id' => 'required',
                  'fullName' =>'required |max:150 ',
                  'email'    => 'required  ',
                  'mobile'   => 'required | numeric |starts_with:966',
                  'company'  => 'required',
                  'jobfunction' => 'required', 
                  'status_id' => 'required',
                 ];
        $messages = [
            'prefix_id.required' => 'prefix_id feild is required',
            'fullName.max' => 'fullName should not be more than 150 char',
            'fullName.required' => 'fullName feild is required',
            'email.required' => 'email feild is required',
            'mobile.required' => 'mobile feild is required',
            'mobile.numeric' => 'mobile feild should be number',
            'mobile.starts_with' => 'mobile feild should be started with 966',
            'company.required' => 'company feild is required',
            'jobfunction.required' => 'jobfunction feild is required',
            'status_id.required' => 'status_id feild is required',
        ];
        $validator = Validator::make($request->all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $exInvit->update([
            'prefix_id' => $request->prefix_id,
            'fullName' => $request->fullName,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'company' => $request->company,
            'jobfunction' =>$request->jobfunction,
            'status_id' => $request->status_id,
        ]);
      
        return redirect('/exInvetation')->with('message' , 'created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\exInvite  $exInvite
     * @return \Illuminate\Http\Response
     */
    public function destroy(exInvite $exInvit)
    {
        $exInvit->delete();
        return redirect('/exInvetation')->with('message' , 'deleted');
    }
}
