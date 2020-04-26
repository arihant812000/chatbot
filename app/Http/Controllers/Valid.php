<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Valid extends Controller
{
    function submit(Request $req)
	{
		$message=$req->msg;
		if($message!=null){
		$user=DB::table('chatbot')
		->where('question',$message)
		->count();
		$userget=DB::table('chatbot')
		->where('question',$message)
		->get();
		if($user>=1)
		{
			foreach($userget as $item)
			{
			$userinsert=DB::table('chat')
		->insert([
			'chatbot'=>$item->response,
			'user'=>$message
		]);
			}
		}
		else
		{
			$userinsert=DB::table('chat')
		->insert([
			'chatbot'=>'sorry but i didnot understand what you are searching for',
			'user'=>$message
		]);
			
		}
		}
		else{}
		$data=DB::table('chat')->get();
	 return view('list1')->with('data',$data);
		
	}
	
	function track(Request $req)
	{
		$message=$req->msg;
		if($message!=null)
		{
		$data1=DB::table('complaint_track')
		->where('id',$message)
		->count();
		if($data1!=0)
		{
			$data=DB::table('complaint_track')
		->where('id',$message)
		->get();
		foreach($data as $item)
		 {
			if(($item->status)=='submit'){
		 $userinsert=DB::table('chat')
		 ->insert([
		 'chatbot'=>'your complaint has been submitted successfully. we will get you  soon.press hey to continue chat',
		 'user'=>$message
		]);
		}
		else{}
		 }
		
		}
		else
		{
			$userinsert=DB::table('chat')
		 ->insert([
		 'chatbot'=>'no complaint found.please check your comlaint id and try again.press hey to continue chat',
		 'user'=>$message
		]);
		}
		}
		else{}
		$data=DB::table('chat')->get();
	 return view('list1')->with('data',$data);
	}
}
