<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function register (Request $request){

        $fields = $request->validate([
            'name' => 'required|string',
            'proficiency' => 'required|string',
            'phone_number' => 'required|string'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'proficiency' => $fields['proficiency'],
            'phone_number' => $fields['phone_number']
        ]);

        $response =[
            'user' => $user->id
            
        ];

        return response($response,200);

    }
}
