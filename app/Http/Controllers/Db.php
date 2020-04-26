<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Db extends Controller
{
    function submit(Request $req)
	{
		$req->validate([
		"msg"=>required
		]);
		return $req->input();
	}
}
