<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Subject;
use App\Models\SubjectRequirement;
use App\Models\TestRequirement;
use App\Models\Test;

class DivisionController extends Controller
{
    public function index(Request $request)
    {
        $divisions = new Division();

        $totalCount = $divisions->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $divisions = $divisions->paginate(20);
        
        return view('admin.division.index', compact('divisions', 'totalCount', 'page', 'lastPage'));
    }

    public function show(Request $request, $id)
    {
       $division = Division::find($id);
       $subjects = Subject::all();
       $tests = Test::all();
       $required_subjects = array();
       $required_tests = array();

       foreach (SubjectRequirement::where('division_id', '=', $id)->get() as $subject){
        array_push($required_subjects, $subject->subject_id);
       }
       $required_subjects = implode(',', $required_subjects);

       foreach (TestRequirement::where('division_id', '=', $id)->get() as $test){
        array_push($required_tests, $test->test_id);
       }
       $required_tests = implode(',', $required_tests);


        return view('admin.division.show', 
            compact('division', 'id', 'subjects', 'tests', 'required_subjects', 'required_tests'));
    }

    public function create()
    {
        $divisions = Division::all();
        $subjects = Subject::all();
        $tests = Test::all();

        return view('admin.division.create', compact('divisions', 'subjects', 'tests'));
    }

    public function store(Request $request)
    {
        $division = Division::create([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
            'student_count' => $request->post('student_count'),
        ]);

        if($request->post('subject_hidden'))
        {
            foreach (explode(',', $request->post('subject_hidden'))  as $subject){
                SubjectRequirement::create([
                    'division_id' => $division->id,
                    'subject_id' => $subject
                ]);
            }
        }

        if($request->post('test_hidden'))
        {
            foreach (explode(',', $request->post('test_hidden'))  as $test){
                TestRequirement::create([
                    'division_id' => $division->id,
                    'test_id' => $test
                ]);
            }
        }     
        return redirect(route('admin.home'));
    }

    public function update(Request $request, $id)
    {
        $division = Division::find($id);

        $division->update([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
            'student_count' => $request->post('student_count'),
        ]);


        foreach (SubjectRequirement::where('division_id', '=', $division->id)->get() as $subject){
            SubjectRequirement::destroy($subject->id);
        }
        if($request->post('subject_hidden'))
        {
            foreach (explode(',', $request->post('subject_hidden'))  as $subject){
                SubjectRequirement::create([
                    'division_id' => $division->id,
                    'subject_id' => $subject
                ]);
            }
        }


        foreach (TestRequirement::where('division_id', '=', $division->id)->get() as $test){
            TestRequirement::destroy($test->id);
        }
        if($request->post('test_hidden'))
        {
            foreach (explode(',', $request->post('test_hidden'))  as $test){
                TestRequirement::create([
                    'division_id' => $division->id,
                    'test_id' => $test
                ]);
            }
        } 
           
        



       
        return redirect(route('admin.division.show', ['division' => $id]));
    }

    public function action(Request $request)
    {
        $action = $request->post('action');
        if ($action) {
            switch ($action) {
                case 'delete':
                    foreach ($request->post('division') as $id) {
                        Division::destroy($id);
                    }
                    return redirect(route('admin.division.index'));
                default:
                    return redirect(route('admin.division.index'))->withErrors(['action' => '123']);
            }
        }
        return redirect(route('admin.division.index'))->withErrors(['action' => '1243']);
    }
}
