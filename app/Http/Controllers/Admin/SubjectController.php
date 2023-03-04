<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SubjectRequirement;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $subjects = new Subject();
        $subject_requirement = SubjectRequirement::all();


        $totalCount = $subjects->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $subjects = $subjects->paginate(20);
        
        return view('admin.subject.index', compact('subjects', 'totalCount', 'page', 'lastPage', 'subject_requirement'));
    }

    public function show(Request $request, $id)
    {
        $subject = Subject::find($id);
       
        return view('admin.subject.show', compact('subject', 'id'));
    }

    public function create()
    {

        return view('admin.subject.create');
    }

    public function store(Request $request)
    {   
        $request ->validate([
            'name' => 'required'
        ]);

        Subject::create([
            'name' => $request->post('name'),
        ]);

        return redirect(route('admin.subject.index'));
    }

    public function update(Request $request, $id)
    {
        $request ->validate([
            'name' => 'required'
        ]);

        $subject = Subject::find($id);
        $subject->update([
            'name' => $request->post('name'),
        ]);
        return redirect(route('admin.subject.show', ['subject' => $id]));
    }

    public function delete(Request $request)
    {
        $request ->validate([
            'subjects' => 'required'
        ]);

        foreach ($request->post('subjects') as $id) {
            Subject::destroy($id);
        }
        return redirect(route('admin.subject.index'));
    }
}
