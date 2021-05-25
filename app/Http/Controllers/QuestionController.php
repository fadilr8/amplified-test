<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function questions() {
        $questions = Question::select('id', 'question')->get();
        
        return json_encode(['data' => $questions]);
    } 
}
