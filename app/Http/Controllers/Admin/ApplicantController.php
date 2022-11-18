<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Division;

use App\Models\SubjectGrade;
use App\Models\TestScore;


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
            ->where('school_year', '=', $filter_year);
        }
        else if($filter_division != 'all' && $filter_year == 'all'){
            $applicants = Applicant::where('division_id', '=', $filter_division);
        } 
        else if($filter_division == 'all' && $filter_year != 'all'){
            $applicants = Applicant::where('school_year', '=', $filter_year);
        }


       
        $totalCount = $applicants->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $applicants = $applicants->paginate(20);

        $subjectGrades = [];
        foreach($applicants as $applicant){
            $applicant_points = 0;
            foreach(
                SubjectGrade::where('applicant_id', '=', $applicant->id)->pluck('points')
                as $grade_points
            ){
                $applicant_points += $grade_points;
            }
            foreach(
                TestScore::where('applicant_id', '=', $applicant->id)->pluck('score')
                as $score_points
            ){
                $applicant_points += $score_points;
            }

            array_push($subjectGrades, [
                'applicant_id' => $applicant->id,
                'points' =>  $applicant_points
            ]);
        }  

        sort($subjectGrades);

        return view('admin.applicant.index',
         compact(
            'applicants', 
            'totalCount', 
            'page', 
            'lastPage', 
            'divisions', 
            'filter_division', 
            'filter_year',
            'subjectGrades'
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


    public function create()
    {

        return view('admin.applicant.create');
    }

   /* public function store(Request $request)
    {
        Applicant::create([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
            'content' => $request->post('content'),
            'visibility' => $request->boolean('visibility'),
            'category_id' => $request->post('category_id'),
        ]);
        
        return redirect(route('admin.applicant.show'));
    }
    */
    
    public function update(Request $request, $id)
    {
        $applicant = Applicant::find($id);
        $applicant->update([
            'first_name' => $request->post('first_name'),
            'last_name' => $request->post('last_name'),
            'division_id' =>  $request->post('division_id'),
            'school_year' => $request->post('school_year'),
            'date_of_birth' =>  $request->post('date_of_birth'),
            'email' => $applicant_cookies->email,
            'status' => 'pending'
        ]);

         return redirect(route('admin.applicant.show', ['applicant' => $id]));
    }

    
    public function filter(Request $request)
    {
        $year = $request->post('year');
        $divisionID = $request->post('division');
        $order_by_points = $request->post('order_by_points');

        return redirect(route('admin.applicant.index',
         ['year' => $year, 'division' => $divisionID, "order" => $order_by_points]));
    }

    public function action(Request $request)
    {
        $action = $request->post('action');
        if ($action) {
            switch ($action) {
                case 'delete':
                    foreach ($request->post('applicant') as $id) {
                        Applicant::destroy($id);
                    }
                    return redirect(route('admin.applicant.index'));
                case 'filter':
                default:
                    return redirect(route('admin.applicant.index'))->withErrors(['action' => '123']);
            }
        }
        return redirect(route('admin.applicant.index'))->withErrors(['action' => '1243']);
    }

}
