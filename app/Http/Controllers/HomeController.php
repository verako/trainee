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
        return view('home');
         // foreach ($request->file() as $file) {
         //        foreach ($file as $f) {
         //            $f->move(storage_path('images'), time().'_'.$f->getClientOriginalName());
         //            echo $f;
         //        }
         //    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('messages.create',['message'=>new MessageModel()]);//добавляем пустую переменнуб message
        if($request->hasFile('file')) {
            $file = $request->file('file');
            $file->move(public_path() . '/path','filename.file');
        }
           
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
            'filepath'=>$request->file('file')->move(public_path() . '/path',$file->getClientOriginalName()),
            'done'=>$request->get('done'),
        ]);
        
        return redirect('/message');

   }

   
}
