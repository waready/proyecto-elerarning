<?php

namespace App\Http\Controllers;

use App\Role;
use App\Teacher;
use Illuminate\Http\Request;

class SolicitudeController extends Controller
{
    public function teacher (Request $request) {
		
		// $datosVideo=request()->all();
		// $datosVideo=request()->except('_token');
		// $datosVideo= array(
			
		// );
		
		
    	$user = auth()->user();
    	if ( ! $user->teacher) {
    		try {
			    \DB::beginTransaction();
			    $user->role_id = Role::TEACHER;
			    Teacher::create([
					'user_id' => $user->id,
					// 'title' => $request->title,
					// 'biography' =>$request->biography,
					// 'website_url' => $request->website_url
				]);
					// Teacher::update([
					// 	'title' => $request->title,
					// 	'biography' =>$request->biography,
					// 	'website_url' => $request->website_url
					// ]);
					Teacher::where('user_id', $user->id)->update([
					'title' => $request->title,
					'biography' =>$request->biography,
					'website_url' => $request->website_url]);
				
				
			    $success = true;
		    } catch (\Exception $exception) {
    			\DB::rollBack();
    			$success = $exception->getMessage();
		    }

		    if ($success === true) {
    			\DB::commit();
    			auth()->logout();
    			auth()->loginUsingId($user->id);
				return back()->with('message', ['success', __("Felicidades, ya eres instructor en la plataforma")]);
				// return $user;
		    }

		    return back()->with('message', ['danger', $success]);
	    }
	    return back()->with('message', ['danger', __("Algo ha fallado")]);
    }
}
