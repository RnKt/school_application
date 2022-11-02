<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Applicant;
use App\Models\ExamCategory;

class ExamController extends Controller
{
    public function index(Request $request)
    {
        $exams = new Exam();
        $questions = Question::where('exam_id', '=', 1);
        
        dd($questions);

        $totalCount = $exams->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $exams = $exams->paginate(20);
        
        return view('admin.exam.index', compact('exams', 'totalCount', 'page', 'lastPage'));
    }

    public function show(Request $request, $id)
    {
        $exam = Exam::find($id);
        $questions = new Question();

        $questions = Question::where('exam_id', '=', $id);
        $answers = [];

        foreach($questions as $question){
            if($question == $id){
                array_push($answers, $question->id);
            }
        }

        return view('admin.exam.show', compact('exam', 'id', 'questions'));
    }

    public function create()
    {
        $exam_categories = ExamCategory::all();

        return view('admin.exam.create', compact('exam_categories'));
    }

    public function store(Request $request)
    {
        $exam = Exam::create([
            'name' => $request->post('name'),
            'exam_category' => $request->post('exam_category')
        ]);

        return redirect(route('admin.exam.show', ['exam' => $exam->id]));
    }

    public function update(Request $request, $id)
    {
        $exam = Exam::find($id);
        $exam->update([
            'name' => $request->post('name'),
            'slug' => $request->post('slug'),
        ]);

        $exam_categories = ExamCategory::all();

        return redirect(route('admin.exam.show', ['exam' => $id], compact('exam_categories')));
    }

    public function delete(Request $request)
    {
        foreach ($request->post('exams') as $id) {
            Exam::destroy($id);
        }
        return redirect(route('admin.exam.index'));
    }
}
