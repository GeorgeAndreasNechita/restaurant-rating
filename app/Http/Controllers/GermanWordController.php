<?php

namespace App\Http\Controllers;

use App\Models\GermanWord;
use Illuminate\Http\Request;

class GermanWordController extends Controller
{
    // app/Http/Controllers/GermanWordController.php
public function updateCorrect(Request $request, $id)
{
    $germanWord = GermanWord::findOrFail($id);
    $germanWord->update(['correct' => $request->correct]);

    return response()->json(['message' => 'Correct status updated successfully']);
}

}
