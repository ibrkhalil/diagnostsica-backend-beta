<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public static function getResult($userId)
    {
        $result = DB::table('results')->where('id', $userId)->first()->result;
        return $result;
    }
    public static function sendResult($data, $userId)
    {
        // print_r(json_encode($data['result'][0]));
        // die();
        $json_data = json_encode($data['result']);
        // print_r($json_data);
        // die();
        $affected = DB::table('results')
            ->where('id', $userId)
            ->update(['result' => $json_data]);
        return 1;
        // print_r($affected);
        // die();
    }
}
