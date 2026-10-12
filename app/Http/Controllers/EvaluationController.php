<?php

namespace App\Http\Controllers;
use App\Models\Service;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController
{
    



public function store(Request $request)
{
    $request->validate([
        'service_id' => 'required|exists:services,id',
        'rate' => 'required|integer|min:1|max:5',
        'comment' => 'nullable|string|max:1000',
    ]);

    Evaluation::create([
        'service_id' => $request->service_id,
        'rate' => $request->rate,
        'comment' => $request->comment,
    ]);

    return back();
}

}
