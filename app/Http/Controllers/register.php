<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class Register extends Controller
{
	
     function register(Request $req)
	{
		
		$message=$req->msg;
		$id=DB::table('registration_data')
		->count();
		
		$data1=DB::table('registration_ques')
		->where('id',$id+1)
		->get();
		if($message!=null){
		$id=$id+1;
		
		$userinsert=DB::table('registration_data')
		->insert([
		'id'=>$id,
		'answer'=>$message
		]);
		$data=DB::table('registration_ques')
		->where('id',$id)
		->get();
		foreach($data as $item)
			{
		$userinsert=DB::table('chat')
		->insert([
			'chatbot'=>$item->ques,
			'user'=>$message
		]);
			}
		}
		else
		{
			
		}
		$data=DB::table('chat')->get();

	 return view('list2')->with('data',$data);
	}

	 function reg($id)
	{
		$id1=DB::table('registration_data')
		->count();
		
		
		if($id!=null)
		{
		$id1=$id1+1;
		
		$userinsert=DB::table('registration_data')
		->insert([
		'id'=>$id1,
		'answer'=>$id
		]);
		$data=DB::table('registration_ques')
		->where('id',$id1)
		->get();
		
		 foreach($data as $item)
		 {
		 $userinsert=DB::table('chat')
		 ->insert([
		 'chatbot'=>$item->ques,
		 'user'=>$id
		]);
			 }
		}
		else{}
$data=DB::table('chat')->get();
	 return Redirect('/list2');
	}
	
	
	function complaint()
	{
		$array=[];
		$result=DB::table('registration_data')->get();
		foreach($result as $item)
		{
			array_push($array,$item->answer);
		}
		$fid=DB::table('complaints')
		->count();
		$userinsert=DB::table('complaints')
		 ->insert([
		 'id'=>$fid+10001,
		 'name'=>$array[0],
		 'contact_number'=>$array[1],
		 'date'=>$array[2],
		 'crime_type'=>$array[3],
		 'complaint_detail'=>$array[4],
		 'witness'=>$array[5],
		 'location'=>$array[6],
		 'attachment'=>$array[7],
		 'suspect'=>$array[8],
		]);
		
		$data1=DB::table('complaints')
		->where('contact_number',$array[1])
		->get();	

		 foreach($data1 as $item)
		 {
			 $data="this is your comlaint id:".$item->id." keep this for your future reference and press hey to continue";
		 $userinsert=DB::table('chat')
		 ->insert([
		 'chatbot'=>$data,
		 'user'=>"Submit"
		]);
		$insert=DB::table('complaint_track')
		->insert([
		'id'=>$item->id,
		'status'=>'submit'
		]);
		 }
		 
			 $delete=DB::table('registration_data')
			 ->where('id','>=','1')
			 ->delete();	
		$data=DB::table('chat')->get();
	 return view('list1')->with('data',$data);
	}
	function cancel()
	{
		$name=DB::table('registration_data')
		->get();
		$array=[];
		foreach($name as $item)
			{
	 array_push($array,$item->answer);
	 
			}
		$ur=$array[7];
		 $url=explode('storage/',$ur,2);
		 Storage::delete($url);
		$delete=DB::table('registration_data')
				->where('id','>=','1')
				->delete();	
		$userinsert=DB::table('chat')
		 ->insert([
		 'chatbot'=>"type hey to continue ",
		 'user'=>"cancel"
		]);		
				
		$data=DB::table('chat')->get();
	 return view('list1')->with('data',$data);
	}
	function upload(Request $req)
	{
		$message=$req->file;
		$extn= $message->getClientOriginalExtension();
		$id=DB::table('registration_data')
		->count();
		
		$data1=DB::table('registration_ques')
		->where('id',$id+1)
		->get();
		
		$name=DB::table('registration_data')
		->get();
		$array=[];
		foreach($name as $item)
			{
	 array_push($array,$item->answer);
	 
			}
			$d_name=$array[0]."".$array[3].".".$extn;
			$save=$message->storeAs('.',$d_name);
	  $url=Storage::url($d_name);
		if($message!=null){
		$id=$id+1;
		
		$userinsert=DB::table('registration_data')
		->insert([
		'id'=>$id,
		'answer'=>$url
		]);
		$data=DB::table('registration_ques')
		->where('id',$id)
		->get();
		foreach($data as $item)
			{
		$userinsert=DB::table('chat')
		->insert([
			'chatbot'=>$item->ques,
			'user'=>'yes'
		]);
			}
		}
		else
		{
			
		}
		$data=DB::table('chat')->get();

	return view('list2')->with('data',$data);
	}
}
