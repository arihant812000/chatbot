<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Cross extends Controller
{
    function cross(Request $req)
	{
		
		$userget=DB::table('chat')
		->get();
		foreach($userget as $item)
			{
			if(($item->id)!=1)
			{
				
				$delete=DB::table('chat')
				->where('id','>','1')
				->delete();
			}
			else{
				$reset=DB::table('chat')
			->update(['input'=>'<input id = "msg" name="msg" type="text" maxlength="1000" autocomplete="off">']);
			}
		
			}
		
		$data=DB::table('chat')->get();
	return view('list')->with('data',$data);
	}
}
