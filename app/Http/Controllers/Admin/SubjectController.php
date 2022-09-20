<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        $subjects = new Subject();

        $totalCount = $subjects->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $subjects = $subjects->paginate(20);
        
        return view('admin.subject.index', compact('subjects', 'totalCount', 'page', 'lastPage'));
    }

    public function show(Request $request, $id)
    {
       // $subject = Subject::find($id);

        //return view('admin.subjects.show', compact('subject', 'id'));
        return view('admin.subject.show');
    }

    public function create()
    {

        return view('admin.subject.create');
    }

    public function store(Request $request)
    {
        Subject::create([
            'name' => $request->post('name'),
        ]);

        return redirect(route('admin.subject.index'));
    }

    public function update(Request $request, $id)
    {
        $subject = Subject::find($id);
        $subject->update([
            'name' => $request->post('name'),
        ]);
        return redirect(route('admin.subject.show', ['subject' => $id]));
    }

    public function action(Request $request)
    {
        $action = $request->post('action');
        if ($action) {
            switch ($action) {
                case 'delete':
                    foreach ($request->post('subject') as $id) {
                        Subject::destroy($id);
                    }
                    return redirect(route('admin.subject.index'));
                default:
                    return redirect(route('admin.subjects.index'))->withErrors(['action' => '123']);
            }
        }
        return redirect(route('admin.subjects.index'))->withErrors(['action' => '1243']);
    }
}
