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
			else{}
		
			}
		
		$data=DB::table('chat')->get();
	return view('list')->with('data',$data);
	}
}
