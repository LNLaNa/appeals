<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Http\Requests\AppealRequest;
use App\Models\Appeal;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppealController extends Controller
{
    public function index(): View
    {
        $appeals = Appeal::query()->where('status', StatusEnum::TRUE->name)->orderByDesc('isFixed')->orderByDesc('updated_at')->get();
        return view('index',compact('appeals'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'question' => 'required',
        ]);

        Appeal::query()->create([
            'userName' => $request->userName??'Аноним',
            'question' => $request->question,
        ]);
        return redirect('/');
    }
}
