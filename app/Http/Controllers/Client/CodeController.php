<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Code;
use App\Models\Applicant;

use App\Models\SubjectGrade;
use App\Models\TestScore;

class CodeController extends Controller
{
    public function index()
    {

      return view('client.login.code');
    }

    public function store(Request $request)
    {
      $codes = Code::all();
      $applicant = new Applicant();

      foreach($codes as $code){
        if (Hash::check($request->post('code'), $code->code)) {
          $applicant = Applicant::find($code->applicant_id);
        }
      }
      
      $applicant_points = 0;
      foreach(
          SubjectGrade::where('applicant_id', '=', $applicant->id)->pluck('points')
          as $grade_points
      ){
          $applicant_points += $grade_points;
      }
      foreach(
          TestScore::where('applicant_id', '=', $applicant->id)->pluck('score')
          as $test_points
      ){
          $applicant_points += $test_points;
      }


      
      return view('client.login.code', compact('applicant', 'applicant_points'));
    }

}
