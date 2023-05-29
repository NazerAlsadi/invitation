<?php

namespace App\Http\Controllers;

use App\Models\InternamlInvetation;
use App\Models\category;
use App\Models\prefix;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\veifyMail;
use Validator;
class InternamlInvetationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inInvites = InternamlInvetation::all();
        return view('Ininvetation.index' , compact('inInvites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prefixes = prefix::all();
        $categories = category::all();
        return view('Ininvetation.create' , compact('prefixes' , 'categories'));
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
                 'category_id' => 'required',
                ];
       $messages = [
           'prefix_id.required' => 'prefix_id feild is required',
           'fullName.max' => 'fullName should not be more than 150 char',
           'fullName.required' => 'fullName feild is required',
           'email.required' => 'email feild is required',
           'mobile.required' => 'mobile feild is required',
           'mobile.numeric' => 'mobile feild should be number',
           'mobile.starts_with' => 'mobile feild should be started with 966',
       ];
       $validator = Validator::make($request->all() , $rules , $messages);
       if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
       }
       InternamlInvetation::create($request->all());

       $last_entry = InternamlInvetation::latest()->first();
      
        Mail::to($request->email)->send(new veifyMail($last_entry->id) );
        return redirect('/internalInvetation')->with('message' , 'created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InternamlInvetation  $internamlInvetation
     * @return \Illuminate\Http\Response
     */
    public function show(InternamlInvetation $inInvit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InternamlInvetation  $internamlInvetation
     * @return \Illuminate\Http\Response
     */
    public function edit(InternamlInvetation $inInvit)
    {
        $prefixes = prefix::all();
        $categories = category::all();
        return view('Ininvetation.edit',  compact('prefixes','categories','inInvit') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InternamlInvetation  $internamlInvetation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InternamlInvetation $inInvit)
    {
       
        $rules = ['prefix_id' => 'required',
                  'fullName' =>'required |max:150 ',
                  'email'    => 'required  ',
                  'mobile'   => 'required | numeric |starts_with:966',
                  'category_id' => 'required',
                 ];
        $messages = [
            'prefix_id.required' => 'prefix_id feild is required',
            'fullName.max' => 'fullName should not be more than 150 char',
            'fullName.required' => 'fullName feild is required',
            'email.required' => 'email feild is required',
            'mobile.required' => 'mobile feild is required',
            'mobile.numeric' => 'mobile feild should be number',
            'mobile.starts_with' => 'mobile feild should be started with 966',
        ];
        $validator = Validator::make($request->all() , $rules , $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $inInvit->update([
            'prefix_id' => $request->prefix_id,
            'fullName' => $request->fullName,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'category_id' => $request->category_id,
        ]);
        return redirect('/internalInvetation')->with('message' , 'update');
     
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InternamlInvetation  $internamlInvetation
     * @return \Illuminate\Http\Response
     */
    public function destroy(InternamlInvetation $inInvit)
    {
        $inInvit->delete();
        return redirect('/internalInvetation');
    }

    public function verify(InternamlInvetation $inInvit){
        $inInvit->email_verify = true;
        $inInvit->update();
        return 'Done ,Dear M.r' .$inInvit->fullName .' your invitation is verified'; 
    }
}
