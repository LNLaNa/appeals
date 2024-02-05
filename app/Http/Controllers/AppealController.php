<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Http\Requests\AppealRequest;
use App\Models\Appeal;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppealController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $appeals = Appeal::query()->where('status', StatusEnum::TRUE->name)->orderByDesc('created_at')->get();
        return view('index',compact('appeals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AppealRequest $request)
    {
        Appeal::query()->create([
           'userName' => $request->userName??'Аноним',
           'question' => $request->question,
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appeal $appeal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appeal $appeal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appeal $appeal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appeal $appeal)
    {
        //
    }
}
