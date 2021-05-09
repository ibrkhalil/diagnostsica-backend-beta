<?php

namespace App\Http\Controllers;

use App\Result;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function show(Request $request, $userId)
    {
        $user = User::find($userId);

        if ($user) {
            return response()->json($user);
        }

        return response()->json(['message' => 'User not found!'], 404);
    }
    public function showResults(Request $request, $userId)
    {
        // echo 'hi';
        // die();
        $results = ResultController::getResult($userId);

        if ($results) {
            return response()->json($results);
        }

        return response()->json(['message' => 'No Results!'], 404);
    }

    public  function sendResults(Request $request, $userId)
    {

        $dataBody = ["result" => $request->result, "id" => $request->id];


        if (ResultController::sendResult($dataBody, $userId)) {

            return response()->json(['message' => 'data sent successfully!']);
        }


        return response()->json(['message' => 'an error has occurred!']);
    }
}
