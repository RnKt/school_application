<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;

class OverviewController extends Controller
{
    public function index(Request $request)
    {
        $divisions = new Division();

        $totalCount = $divisions->count();
        $page = $request->get('page') ? $request->get('page') : 1;
        $lastPage = ceil($totalCount / 20);

        $divisions = $divisions->paginate(20);
        
        return view('admin.index', compact('divisions', 'totalCount', 'page', 'lastPage'));
 
    }
}
