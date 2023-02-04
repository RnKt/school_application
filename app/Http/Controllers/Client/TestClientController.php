<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ExamCategory;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Answer;


class TestClientController extends Controller
{
    public function index()
    {
        $test_categories = ExamCategory::all();
        $tests = Exam::all();

        return view('client.testclient.testclient', compact('test_categories', 'tests'));
    }
    public function show(Request $request, $id)
    {
        $exam = Exam::find($id);

        $questions = Question::
        where('question.exam_id', '=', $id)
        ->get();
        $answers = Answer::all();

        return view('client.testclient.test', compact('exam', 'id', 'questions', 'answers'));
    }
    public function correct(Request $request)
    {
        $id = $request->post('exam');
        $exam = Exam::find($id);

        $questions = Question::
        where('question.exam_id', '=', $id)
        ->get();
        $answers = Answer::all();

        $my_answers = $request->post('answers');

        return view('client.testclient.correct', compact('exam', 'id', 'questions', 'answers', 'my_answers'));
    }
}