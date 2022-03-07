<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Message;
//use Illuminate\Support\Facades\Mail;
//use App\Mail\MessageReceived;

class MessageController extends Controller
{
   public function create()
   {
      return view('messages.create');
   }

   public function edit($id)
   {
      $mensaje=Message::where('id',$id)->first();
      return view('messages.edit',compact('mensaje'));
   }

   public function index()
   {
      $mensajes=Message::all();
      return view('messages.index',compact('mensajes'));
   }

   public function store(Request $request)
   {
      $message= Message::create($request->all());

      if(auth()->check())
      {
        auth()->user()->messages()->save($message);
      }

      return redirect()->route('messages.create')->with('info','Hemos recibido tu mensaje');

        /*
         $message = request()->validate([
        'name'=>'required',
        'email'=>'required|email',
        'subject'=>'required',
        'content'=>'required|min:3',
        ],[
        'name.required'=> __('I need your name')
        ]);

        //Mail::to('uliseseg93@hotmail.com')->send(new MessageReceived ($message));
        return back()->with('status','Recibimos tu mensaje, te responderemos en menos de 24 horas.');
        */
     }
  }
