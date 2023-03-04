<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExamCategory;
use App\Models\Exam;

class ExamCategoryController extends Controller
{
    public function index(Request $request)
    {
        $exam_categories = new ExamCategory();
        $exams = Exam::all();

        $totalCount = $exam_categories->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $exam_categories = $exam_categories->paginate(20);
        
        return view('admin.examCategory.index', compact('exam_categories', 'exams', 'totalCount', 'page', 'lastPage'));
    }

    public function show(Request $request, $id)
    {
        $exam_category = ExamCategory::find($id);

        return view('admin.examCategory.show', compact('exam_category', 'id'));
    }

    public function create()
    {
        return view('admin.examCategory.create');
    }

    public function store(Request $request)
    {
        $request ->validate([
            'name' => 'required'
        ]);

        ExamCategory::create([
            'name' => $request->post('name'),
        ]);

        return redirect(route('admin.examCategory.index'));
    }

    public function update(Request $request, $id)
    {
        $request ->validate([
            'name' => 'required'
        ]);

        $exam_category = ExamCategory::find($id);
        $exam_category->update([
            'name' => $request->post('name'),
        ]);
        return redirect(route('admin.examCategory.show', ['examCategory' => $id]));
    }

    public function delete(Request $request)
    {   
        $request ->validate([
            'exam_categories' => 'required'
        ]);
        foreach ($request->post('exam_categories') as $id) {
            ExamCategory::destroy($id);
        }
        return redirect(route('admin.examCategory.index'));
    }
}
