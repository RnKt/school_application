<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamCategory;

class ExamController extends Controller
{
    public function index(Request $request)
    {
        $exams = new Exam();

        $totalCount = $exams->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $exams = $exams->paginate(20);
        
        return view('admin.exam.index', compact('exams', 'totalCount', 'page', 'lastPage', ));
    }

    public function show(Request $request, $id)
    {
        $exam = Exam::find($id);

        return view('admin.exam.show', compact('exam', 'id'));
    }

    public function create()
    {
        $exam_categories = ExamCategory::all();

        return view('admin.exam.create', compact('exam_categories'));
    }

    public function store(Request $request)
    {
        Exam::create([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
        ]);

        return redirect(route('admin.exam.index'));
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::find($id);
        $exam->update([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
        ]);
        return redirect(route('admin.exam.show', ['exam' => $id]));
    }

    public function delete(Request $request)
    {
        foreach ($request->post('exams') as $id) {
            Test::destroy($id);
        }
        return redirect(route('admin.exam.index'));
    }
}
