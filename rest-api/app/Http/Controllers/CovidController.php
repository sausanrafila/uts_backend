<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Covid;

class CovidController extends Controller
{
    public function index ()
    {
        $Covids = Covid::all();
        
        if(count($Covids)==0){
            $response = [
                'message' => 'Data is empty'
            ];

            return response()->json($response, 200);
        }
        else{
            $response = [
                'message' => 'Get all resouce',
                'data'=> $Covids,
            ];
            return response()->json($response,200);
        }
    }
    public function store(Request $request) {
        $request->validate([
            'Name'=>'required',
            'phone'=>'required',
            'addres' => 'required',
            'status'=> 'required'
        ]);
        $Covids = Covid::create($request->all());

        $response = [
            'message'=>'Resource is added succesfully',
            'data'=> $Covids,
        ];
        return response()->json($response, 201);
    }
    public function show($id) {
        $Covids = covid::find($id);

        if ($Covids){
            $response = [
                'message'=>'Get detail resource',
                'data'=> $Covids
            ];
            return response()->json($response,200);
        }
        else {
            $response = [
                'message' => 'Resource not found'
            ];
            return response()->json($response,404);
        }
    }
    public function update(request $request, $id){
        $Covids = Covid::find($id);
        if($Covids){
            $Covids->update($request->all());
            $response = [
                'message'=>'resource is update succesully',
                'data'=>$Covids
                ];
                return response()->json($request,200);
        }
        else {
            $response = [
                'message'=>'resource not found'
            ];
            return response()->json($response, 404);
        }
    }
    public function destroy($id){
        $Covids = Covid::find($id);
        if ($Covids){
            $Covids->delete($id);
            $response = [
                'message'=>'resource is delete succesfully'
            ];
        }
        else {
            $response = [
                'message'=> 'resource not found'
            ];
            return response()->json($response,404);
        }
    }
    public function search($Name){
        $Covids = Covid::where('Name', 'like', '%' . $Name . '%')->get();
        if($Covids){
            $response = [
                'message'=>'get searched resource',
                'data'=> $Covids
            ];
            return response()->json($response, 200);
        }
        else{
            $response = [
                'message'=>'resource not found'
            ];
            return response()->json($response,404);
        }
    }
    public function searchstatus($status)
    {
        $Covids = Covid::where('status','like','%' . $status . '%')->get();
        if ($covids){
            $response = [
            'message'=> 'Get'.' '.$status.' '.'reource',
            'data'=>$Covids
            ];
            return response()->json($response,200);
        }
        else{
            $response=[
                'message'=>'resource not found'
            ];
            return response()->json($response,404);
        }
    }
}
