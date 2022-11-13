<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ResultController extends Controller
{
    public function index()
    {
      
        return view('client.login.personal');
    }

    public function store(Request $request)
    {
      
      $getData = array(
        "first_name" => $request->post('first_name'), 
        "last_name" => $request->post('last_name'),
        "date_of_birth" => $request->post('date_of_birth'),
        "email" => $request->post('email'),
      );

      Cookie::queue('personal', json_encode($getData), 120);
      

      return redirect(route('login.personal.index'));
    }

}
