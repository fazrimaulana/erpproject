<?php

namespace App\Helpers;

use App\User;
use Auth;

class ApiHelper
{
	public static function cekLogin($api_token)
	{
		$data = User::where('api_token', $api_token)->first();
		if($data):
			Self::autoLogin($data->id);
		endif;
	}

	public static function autoLogin($id)
	{
		Auth::loginUsingId($id);
	}

}