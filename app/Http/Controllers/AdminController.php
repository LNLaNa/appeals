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
        $appeals = Appeal::query()->orderBy('status')->orderByDesc('created_at')->paginate(4);
        return view('admin.index',compact('appeals'));
    }

    public function addAnswer(Appeal $appeal, Request $request): RedirectResponse
    {
        $request->validate([
            'answer' => 'required',
        ]);

        $appeal->update([
            'answer' => $request->answer,
            'status' => StatusEnum::TRUE->name,
            'isFixed' => isset($request->isFixed)
        ]);
        return redirect()->route('appeal.show',$appeal);
    }

    public function showAppeal(Appeal $appeal): View
    {
        return view('admin.showAppeal',compact('appeal'));
    }

    public function deleteAppeal(Appeal $appeal): RedirectResponse
    {
        $appeal->delete();
        return redirect()->route('admin');
    }
}
