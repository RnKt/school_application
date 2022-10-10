<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Subject;
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
       // $division = Division::find($id);

        //return view('admin.division.show', compact('division', 'id'));
        return view('admin.division.show');
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
        Division::create([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
            'student_count' => $request->post('student_count'),
        ]);
        
        return redirect(route('admin.home'));
    }

    public function update(Request $request, $id)
    {
        $division = Division::find($id);
        $division->update([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
            'content' => $request->post('content'),
            'visibility' => $request->boolean('visibility'),
            'category_id' => $request->post('category_id'),
        ]);
        return redirect(route('admin.blog.show', ['blog' => $id]));
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
