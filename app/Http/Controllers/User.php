<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class User extends Controller
{
   function dbCheck()
   {
	 $data=DB::table('chat')->get();
	 return view('list',['data'=>$data]);
   }
    function Check()
   {
	 $data=DB::table('chat')->get();
	 return view('list2',['data'=>$data]);
   }
   
   function reg()
   {
	   $userinsert=DB::table('chat')
		->insert([
			'chatbot'=>'please enter your name',
			'user'=>'crime registration'
			]);
			$data=DB::table('chat')->get();
	 return view('list2',['data'=>$data]);
   }
   function track()
   {
	   $userinsert=DB::table('chat')
		->insert([
			'chatbot'=>'please the complaint id to track',
			'user'=>'complaint  tracking'
			]);
			$data=DB::table('chat')->get();
	 return view('track',['data'=>$data]);
   }
}
