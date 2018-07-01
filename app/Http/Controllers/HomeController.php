<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MessageModel;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // return view('home');

        $messages=MessageModel::all();
        
       //$messages= User::find(\Auth::user()->id+1)->messages()->paginate(5);
        
       return view('home',[ 'messages'  => $messages ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('messages.create',['message'=>new MessageModel()]);//добавляем пустую переменнуб message
           
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        $message=MessageModel::create([
            'user_id'=>\Auth::user()->id,
            'teme'=>$request->get('teme'),
            'message'=>$request->get('message'),
            'filepath'=>$request->file('file')->move(public_path() . '/storage',$file->getClientOriginalName()),
            'done'=>$request->get('done'),
        ]);
        
        return redirect('/message');

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
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $result = MessageModel::find($id);
        $result['done']=$request->get('done');
        $result->save();
        return redirect('/home');
        
    }


   // protected function validator(array $data){
   //      return \Validator::make($data,[
   //          'first_name'=>'required|max:128|min:2',
   //          'last_name'=>'required|max:128|min:2',
   //          'email'=>'required|email|max:256|unique:subscribers'
   //          ]);
   //  }

   
}
