<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Result;

class ResultController extends Controller
{
    public static function getResult($userId)
    {
        $result = DB::table('results')->where('id', $userId)->first()->result;
        return $result;
    }
    public static function sendResult($data, $userId)
    {
        // $id = Result::findOrFail($userId);
        // $id->update(['result' => $data]);
        // die();

        // print_r(json_encode($data['result']));
        // die();
        $json_data = json_encode($data['result']);
        // print_r($json_data);
        // die();
        $oldResult = DB::table('results')->select('result')->where('id', $userId)->first(); //->first();
        // var_dump();
        // die();
        // $newItem = 
        // var_dump($newItem);
        // die();
        // die();
        if ($oldResult) {
            $oldData = array(json_decode($oldResult->result, true));
            array_push($oldData, json_decode($json_data, true));

            // print_r($oldData);
            // die();
        }
        // $oldResultArray = array_merge(json_decode($oldResult->result, true)['resultData'], json_decode($json_data, true)['resultData']);
        else
            $oldData =  $json_data; //json_decode($json_data, true);

        // print_r($oldResultArray);
        // die();
        // die();
        $conditions = ['id' => $userId];
        $affected = DB::table('results')->updateOrInsert($conditions, ['result' => $oldData],);
        // var_dump(json_decode($oldResult->result, true)['resultData']);
        // var_dump(;
        // ->updateOrInsert([
        //     'result' => $oldResultArray,
        //     'updated_at' => time()
        // ]);
        // var_dump($affected->first());
        return 1;
        // print_r($affected);
        // die();
    }
}
