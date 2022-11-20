<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use App\Models\Division;


class PersonalController extends Controller
{
    public function index()
    {
        $divisions = Division::all();

        return view('client.login.personal', compact('divisions'));
    }

    public function store(Request $request)
    {
      $getData = array(
        "division_id" => $request->post('division'),
        "first_name" => $request->post('first_name'), 
        "last_name" => $request->post('last_name'),
        "date_of_birth" => $request->post('date_of_birth'),
        "email" => $request->post('email'),
      );

      Cookie::queue('personal', json_encode($getData), 120);
      

      return redirect(route('login.result.index'));
    }

}
