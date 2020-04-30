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
			$reset=DB::table('chat')
			->update(['input'=>'']);
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
			'user'=>$message,
			'input'=>$item->input
		]);
			}
		}
		else
		{
			$userinsert=DB::table('chat')
		->insert([
			'chatbot'=>'sorry but i didnot understand what you are searching for',
			'user'=>$message,
			'input'=>'<input id = "msg" name="msg" type="text" maxlength="1000" autocomplete="off">'
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
			$reset=DB::table('chat')
			->update(['input'=>'']);
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
		 'user'=>$message,
		 'input'=>'<input id = "msg" name="msg" type="text" maxlength="1000" autocomplete="off">'
		]);
		}
		elseif(($item->status)=='reject')
		{
			$userinsert=DB::table('chat')
		 ->insert([
		 'chatbot'=>'your complaint has been rejected.press hey to continue chat',
		 'user'=>$message,
		 'input'=>'<input id = "msg" name="msg" type="text" maxlength="1000" autocomplete="off">'
		]);
		}
		 }
		
		}
		else
		{
			$userinsert=DB::table('chat')
		 ->insert([
		 'chatbot'=>'no complaint found.please check your comlaint id and try again.press hey to continue chat',
		 'user'=>$message,
		 'input'=>'<input id = "msg" name="msg" type="text" maxlength="1000" autocomplete="off">'
		]);
		}
		}
		else{}
		$data=DB::table('chat')->get();
	 return view('list1')->with('data',$data);
	}
}
