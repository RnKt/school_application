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
        $questions = Question::all();
        $totalCount = $exams->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);
        $exams = $exams->paginate(20);
        
        return view('admin.exam.index', compact('exams', 'totalCount', 'page', 'lastPage', 'questions'));
    }

    public function show(Request $request, $id)
    {
        $exam = Exam::find($id);

        $questions = Question::
        where('question.exam_id', '=', $id)
        ->get();
        $answers = Answer::all();

        return view('admin.exam.show', compact('exam', 'id', 'questions', 'answers'));
    }

    public function create()
    {
        $exam_categories = ExamCategory::all();

        return view('admin.exam.create', compact('exam_categories'));
    }

    public function store(Request $request)
    {   
        $request ->validate([
            'name' => 'required',
            'exam_category' => 'required'
        ]);

        $exam = Exam::create([
            'name' => $request->post('name'),
            'exam_category' => $request->post('exam_category')
        ]);

        return redirect(route('admin.exam.show', ['exam' => $exam->id]));
    }

    public function update(Request $request, $id)
    {
        $request ->validate([
            'question' => 'required',
        ]);

        $question = Question::create([
            'exam_id' => $id,
            'question' => $request->post('question')
        ]);
        
        foreach ($request->post('answers') as $key => $answer) {
           Answer::create([
                'answer' => $answer,
                'question_id' => $question->id,
                'isTrue' => $request->post('iscorrect')[$key] == 0 ? false : true
            ]);   
        }

        return redirect(route('admin.exam.show', ['exam' => $id]));
    }

    public function delete(Request $request)
    {
        $request ->validate([
            'exams' => 'required',
        ]);

        foreach ($request->post('exams') as $id) {
            Exam::destroy($id);
        }
        return redirect(route('admin.exam.index'));
    }

    public function delete_question(Request $request)
    {
        Question::destroy($request->post('question'));
        
        return redirect(route('admin.exam.show', ['exam' => $request->post('exam')]));
    }
}
