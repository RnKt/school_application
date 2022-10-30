<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Division;

class ApplicantController extends Controller
{
    public function index(Request $request, $data = null)
    {
        $applicants = new Applicant();
        $divisions = Division::all();
        
        // $applicants = Applicant::where('division_id', '=', $divisionID )->where('school_year', '=', $division_id);

       
        $totalCount = $applicants->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $applicants = $applicants->paginate(20);
        
        return view('admin.applicant.index', compact('applicants', 'totalCount', 'page', 'lastPage', 'divisions', 'data'));
    }

    public function show(Request $request, $id)
    {
        $applicant = Applicant::find($id);

        return view('admin.applicant.show', compact('applicant', 'id'));
    }

    public function create()
    {

        return view('admin.applicant.create');
    }

    public function store(Request $request)
    {
        Applicant::create([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
            'content' => $request->post('content'),
            'visibility' => $request->boolean('visibility'),
            'category_id' => $request->post('category_id'),
        ]);
        return redirect(route('admin.applicant.index'));
    }

    public function update(Request $request, $id)
    {
        $applicant = Applicant::find($id);
        $applicant->update([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
            'content' => $request->post('content'),
            'visibility' => $request->boolean('visibility'),
            'category_id' => $request->post('category_id'),
        ]);
        return redirect(route('admin.applicant.show', ['applicant' => $id]));
    }

    
    public function filter(Request $request)
    {
        $year = $request->post('year');
        $divisionID = $request->post('division');

        return redirect(route('admin.applicant.index', ['year' => $year, 'division_id' => "$divisionID"]));
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
