<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Division;

use App\Models\SubjectGrade;
use App\Models\TestScore;
use App\Models\Code;

class ApplicantController extends Controller
{
    public function index(Request $request)
    {
        $applicants = new Applicant();
        $divisions = Division::all();

        $filter_division = $request->get('division');
        $filter_year = $request->get('year');
       
        if($filter_division == null){$filter_division = 'all';}
        if($filter_year == null){$filter_year = 'all';}

        if($filter_division != 'all' && $filter_year != 'all'){
            $applicants = Applicant::where('division_id', '=', $filter_division)
            ->where('school_year', '=', $filter_year)
            ->orderBy('points', 'DESC');
        }
        else if($filter_division != 'all' && $filter_year == 'all'){
            $applicants = Applicant::where('division_id', '=', $filter_division)
            ->orderBy('points', 'DESC');
        } 
        else if($filter_division == 'all' && $filter_year != 'all'){
            $applicants = Applicant::where('school_year', '=', $filter_year)
            ->orderBy('points', 'DESC');
        }
 
   
        $totalCount = $applicants->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $applicants = $applicants->paginate(20);

        $divisions->where('division_id', '=', $filter_division);

        return view('admin.applicant.index',
         compact(
            'applicants', 
            'totalCount', 
            'page', 
            'lastPage', 
            'divisions', 
            'filter_division', 
            'filter_year',
        ));
    }

    public function show(Request $request, $id)
    {
        $applicant = Applicant::find($id);
        $divisions = Division::all();
        $applicant_grades = SubjectGrade::
        join('subject', 'applicant_subject_grades.subject_id', '=', 'subject.id')
        ->where('applicant_id', '=', $applicant->id)
        ->get();
        
        $applicant_scores = TestScore::
        join('test', 'applicant_test_score.test_id', '=', 'test.id')
        ->where('applicant_id', '=', $applicant->id)
        ->get();

        if($request->get('type') == 'show'){
            return view('admin.applicant.show', 
            compact('applicant', 'id', 'divisions', 'applicant_grades', 'applicant_scores'));
        }
        else if($request->get('type') == 'edit'){
            return view('admin.applicant.edit', compact('applicant', 'id', 'divisions'));
        }   
    }

    public function update(Request $request, $id){
        $applicant = Applicant::find($id);

        $applicant->update([
            'status' => $request->post('status')
        ]);

        return redirect(route('admin.applicant.show', ['applicant' => $id, 'type' => 'show']));
    }


    
    public function filter(Request $request)
    {
        $year = $request->post('year');
        $divisionID = $request->post('division');

        return redirect(route('admin.applicant.index',
         ['year' => $year, 'division' => $divisionID]));
    }


    public function delete(Request $request)
    {
        if($request->post('applicants'))
        {
            foreach ($request->post('applicants') as $id) {
                Applicant::destroy($id);
            }
        }
     
        return redirect(route('admin.applicant.index'));
    }

    public function summary(Request $request)
    {
        $filter_division = (int)$request->get('division_id');
        $filter_year = Intval($request->get('year'));
        $division = Division::find($filter_division);


        $applicants_to_accept = Applicant::where('division_id', '=', $filter_division)
        ->where('school_year', '=', $filter_year)
        ->orderBy('points', 'DESC')
        ->take($division->student_count)
        ->get();

        $count = Applicant::where('division_id', '=', $filter_division)->count();
        $applicants_to_decline = Applicant::where('division_id', '=', $filter_division)
        ->where('school_year', '=', $filter_year)
        ->orderBy('points', 'DESC')
        ->skip($division->student_count)
        ->take($count - $division->student_count)
        ->get();

       
        foreach($applicants_to_accept as $applicant){
            $applicant->update([
                'status' => 'accepted'
            ]);
        }
        foreach($applicants_to_decline as $applicant){
            $applicant->update([
                'status' => 'declined'
            ]);
        }

        return redirect(route('admin.applicant.index',
         ['year' => $filter_year, 'division' =>  $filter_division]));
    }
    

}
