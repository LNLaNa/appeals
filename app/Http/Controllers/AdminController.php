<?php

namespace App\Http\Controllers;

use App\Models\Appeal;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $appeals = Appeal::query()->orderByDesc('status')->orderByDesc('created_at')->get();
        return view('admin.index',compact('appeals'));
    }

}
