<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Test;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $tests = new Test();

        $totalCount = $tests->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $tests = $tests->paginate(20);
        
        return view('admin.test.index', compact('tests', 'totalCount', 'page', 'lastPage'));
    }

    public function show(Request $request, $id)
    {
       // $subject = Test::find($id);

        //return view('admin.tests.show', compact('test', 'id'));
        return view('admin.test.show');
    }

    public function create()
    {

        return view('admin.test.create');
    }

    public function store(Request $request)
    {
        Test::create([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
        ]);

        return redirect(route('admin.test.index'));
    }

    public function update(Request $request, $id)
    {
        $test = Test::find($id);
        $test->update([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
        ]);
        return redirect(route('admin.test.show', ['test' => $id]));
    }

    public function action(Request $request)
    {
        $action = $request->post('action');
        if ($action) {
            switch ($action) {
                case 'delete':
                    foreach ($request->post('test') as $id) {
                        Test::destroy($id);
                    }
                    return redirect(route('admin.test.index'));
                default:
                    return redirect(route('admin.test.index'))->withErrors(['action' => '123']);
            }
        }
        return redirect(route('admin.test.index'))->withErrors(['action' => '1243']);
    }
}
