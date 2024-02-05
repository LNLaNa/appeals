<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Models\Appeal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        $appeals = Appeal::query()->orderBy('status')->orderByDesc('created_at')->get();
        return view('admin.index',compact('appeals'));
    }

    public function addAnswer(Appeal $appeal, Request $request): RedirectResponse
    {
        $appeal->update([
            'answer' => $request->answer,
            'status' => StatusEnum::TRUE->name,
        ]);
        return redirect()->route('admin');
    }

    public function deleteAppeal(Appeal $appeal): RedirectResponse
    {
        $appeal->delete();
        return redirect()->route('admin');
    }
}
