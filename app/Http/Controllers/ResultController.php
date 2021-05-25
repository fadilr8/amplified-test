<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;

class ResultController extends Controller
{
    public function result(Request $request)
    {
        $point = $request->score;

        if ($point > 0 && $point <= 20) {
            $index = 1;
        } elseif ($point >= 21 && $point <= 37) {
            $index = 2;
        } else {
            $index = 3;
        }

        $result = Result::find($index);

        return json_encode(['data' => $result]);
    }
}
