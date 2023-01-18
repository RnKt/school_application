<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ExamCategory;
use App\Models\Exam;


class TestClientController extends Controller
{
    public function index()
    {
        $test_categories = ExamCategory::all();
        $tests = Exam::all();

        return view('client.testclient.testclient', compact('test_categories', 'tests'));
    }
}