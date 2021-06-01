<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;

class ResultController extends Controller
{
    public $res;

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
        $this->res = $result;

        return json_encode(['data' => $result]);
    }

    public function sendMail(Request $request) {
        // dd($request->re);
        $email = $request->email;
        $result = Result::find($request->result);
        
        \Mail::to($email)->send(new \App\Mail\ResultMail($result));

        return json_encode(['message' => 'Mail sent!']);
    }
}
