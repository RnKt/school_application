<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use App\Models\SubjectRequirement;
use App\Models\TestRequirement;

class ResultController extends Controller
{
    public function index()
    {

        $subjectRequirements = SubjectRequirement::where('division_id', '=', 
        json_decode(Cookie::get('personal'))->division_id);
       
        

        return view('client.login.result', compact('subjectRequirements'));
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
