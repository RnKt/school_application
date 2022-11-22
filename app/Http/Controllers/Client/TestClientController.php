<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestClientController extends Controller
{
    public function index()
    {
        return view('client.testclient.testclient');
    }
}