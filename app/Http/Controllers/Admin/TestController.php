<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\TestRequirement;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $tests = new Test();
        $test_requirement = TestRequirement::all();

        $totalCount = $tests->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $tests = $tests->paginate(20);
        
        return view('admin.test.index', compact('tests', 'totalCount', 'page', 'lastPage', 'test_requirement'));
    }

    public function show(Request $request, $id)
    {
        $test = Test::find($id);

        return view('admin.test.show', compact('test', 'id'));
    }

    public function create()
    {
        return view('admin.test.create');
    }

    public function store(Request $request)
    {
        Test::create([
            'name' => $request->post('name'),
        ]);

        return redirect(route('admin.test.index'));
    }

    public function update(Request $request, $id)
    {
        $test = Test::find($id);
        $test->update([
            'name' => $request->post('name'),
        ]);
        return redirect(route('admin.test.show', ['test' => $id]));
    }

    public function delete(Request $request)
    {
        foreach ($request->post('tests') as $id) {
            Test::destroy($id);
        }
        return redirect(route('admin.test.index'));
    }
}
