<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\MessageModel;
use App\User;
use App\Mail\Test;

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
      // return view('home');86400
        $messages=MessageModel::all();
        $user_id= User::find(\Auth::user()->id);
        $user_id=$user_id['id'];
        $message_user=MessageModel::find($user_id);
        if ($message_user->count()) {
            $last_message=MessageModel::where('user_id', '=', $user_id)->orderBy('created_at', 'desc')->first();
            $last_message_time=strtotime($last_message['created_at']);
            $time=time();
            $time=$time-$last_message_time;
            if ($time<5) {
               return redirect('/message');
            }
        }
              
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

     /**
     * Ship the given order.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function send(Request $request)
    {
        //$message = MessageModel::findOrFail($id);
        $message=$request->message;


        // Ship order...$request->user()

        Mail::to('vera.kopylchuk@gmail.com')->send(new Test($message));
    }

  
    // public function send(Request $request){

    //     $teme=$request->teme;
    //     $message=$request->message;

    //     $mail_admin=env('MAIL_ADMIN'); 
    //     //$data=['text'=>$request->get('message')];
    //    \Mail::to($mail_admin)->send(Test($teme,$message));
    //     // \Mail::send('emails.test', $data, function($message) use ($request){
    //     //     $message->from($data['email'],$data['name']);
    //     //     $message->to($mail_admin)->subject($request->get('subject'));});
    // }



   // protected function validator(messagearray $data){
   //      return \Validator::make($data,[
   //          'teme'=>'required|max:128|min:2',
   //          'message'=>'required|min:2',
   //          'email'=>'required|email|max:256|unique:users'
   //          ]);
   //  }

   
}
