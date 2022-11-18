<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

use App\Models\Applicant;
use App\Models\SubjectRequirement;
use App\Models\TestRequirement;
use App\Models\SubjectGrade;
use App\Models\TestScore;

class ResultController extends Controller
{
    public function index()
    {

      $subjectRequirements = SubjectRequirement::
      join('subject', 'subject_requirement.subject_id', '=', 'subject.id')
      ->where('division_id', '=', intval(json_decode(Cookie::get('personal'))->division_id))
      ->get();

      $testRequirements = TestRequirement::
      join('test', 'test_requirement.test_id', '=', 'test.id')
      ->where('division_id', '=', intval(json_decode(Cookie::get('personal'))->division_id))
      ->get();
     

        return view('client.login.result', compact('subjectRequirements', 'testRequirements'));
    }

    public function store(Request $request)
    {
      $applicant_cookies = json_decode(Cookie::get('personal'));

      $applicant = Applicant::create([
        'first_name' => $applicant_cookies->first_name,
        'last_name' => $applicant_cookies->last_name,
        'division_id' =>  intval($applicant_cookies->division_id),
        'school_year' => date("Y"),
        'date_of_birth' =>  date($applicant_cookies->date_of_birth),
        'email' => $applicant_cookies->email,
        'status' => 'pending'
      ]);


      $division_subject = SubjectRequirement::
      join('subject', 'subject_requirement.subject_id', '=', 'subject.id')
      ->where('division_id', '=', intval($applicant_cookies->division_id))
      ->get(); 

      foreach ($division_subject as $subject){
        $get_grade = $request->post('subject_'. $subject->subject_id);
        SubjectGrade::create([
          'subject_id' => $subject->subject_id,
          'applicant_id' => $applicant->id,
          'grade' =>  $get_grade,
          'points' => 20 
        ]);
      }

      $division_test = TestRequirement::
      join('test', 'test_requirement.test_id', '=', 'test.id')
      ->where('division_id', '=', intval($applicant_cookies->division_id))
      ->get();

      foreach ($division_test as $test){
        $get_score = $request->post('test_'. $test->test_id);
        TestScore::create([
          'test_id' => $test->test_id,
          'applicant_id' => $applicant->id,
          'score' =>  $get_score,
          'points' => 70 
        ]);
      }

      return redirect(route('login.personal.index'));
    }

}
