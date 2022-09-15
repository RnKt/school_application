<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Applicant;

class ApplicantController extends Controller
{
    public function index(Request $request)
    {
        $applicant = new Applicant();

        $totalCount = $applicant->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $applicant = $applicant->paginate(20);
        
        return view('admin.applicant.index', compact('applicant', 'totalCount', 'page', 'lastPage'));
    }

    // public function show(Request $request, $id)
    // {
    //     $applicant = Applicant::find($id);

    //     return view('admin.applicant.show', compact('applicant', 'id'));
    // }

    // public function create()
    // {

    //     return view('admin.applicant.create');
    // }

    // public function store(Request $request)
    // {
    //     Applicant::create([
    //         'name' => $request->post('name'),
    //         'slug' => $request->post('slug'),
    //         'content' => $request->post('content'),
    //         'visibility' => $request->boolean('visibility'),
    //         'category_id' => $request->post('category_id'),
    //     ]);
    //     return redirect(route('admin.applicant.index'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $applicant = Applicant::find($id);
    //     $applicant->update([
    //         'name' => $request->post('name'),
    //         'slug' => $request->post('slug'),
    //         'content' => $request->post('content'),
    //         'visibility' => $request->boolean('visibility'),
    //         'category_id' => $request->post('category_id'),
    //     ]);
    //     return redirect(route('admin.blog.show', ['blog' => $id]));
    // }

    // public function action(Request $request)
    // {
    //     $action = $request->post('action');
    //     if ($action) {
    //         switch ($action) {
    //             case 'delete':
    //                 foreach ($request->post('applicant') as $id) {
    //                     Applicant::destroy($id);
    //                 }
    //                 return redirect(route('admin.applicant.index'));
    //             default:
    //                 return redirect(route('admin.applicant.index'))->withErrors(['action' => '123']);
    //         }
    //     }
    //     return redirect(route('admin.applicant.index'))->withErrors(['action' => '1243']);
    // }
}
