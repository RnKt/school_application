<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\Division;

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
            $applicants = Applicant::where('division_id', '=', $filter_division)->where('school_year', '=', $filter_year);
        }
        else if($filter_division != 'all' && $filter_year == 'all'){
            $applicants = Applicant::where('division_id', '=', $filter_division);
        } 
        else if($filter_division == 'all' && $filter_year != 'all'){
            $applicants = Applicant::where('schooly_ear', '=', $filter_year);
        }

       
        $totalCount = $applicants->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $applicants = $applicants->paginate(20);
        
        return view('admin.applicant.index',
         compact('applicants', 'totalCount', 'page', 'lastPage', 'divisions', 'filter_division', 'filter_year'));
    }

    public function show(Request $request, $id)
    {
        $applicant = Applicant::find($id);
        $divisions = Division::all();

        if($request->get('type') == 'show'){
            return view('admin.applicant.show', compact('applicant', 'id', 'divisions'));
        }
        else if($request->get('type') == 'edit'){
            return view('admin.applicant.edit', compact('applicant', 'id', 'divisions'));
        }   
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

        return redirect(route('admin.applicant.index', ['year' => $year, 'division' => "$divisionID"]));
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
