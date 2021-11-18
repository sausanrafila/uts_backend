<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\covid;

class CovidController extends Controller
{
    public function index ()
    {
        $covids = covid::all();
        
        if(count($covids)==0){
            $response = [
                'message' => 'Data is empty'
            ];

            return response()->json($response, 200);
        }
        else{
            $response = [
                'message' => 'Get all resouce',
                'data'=> $covids,
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
        $covids = covid::create($request->all());

        $response = [
            'message'=>'Resource is added succesfully',
            'data'=> $covids,
        ];
        return response()->json($response, 201);
    }
    public function show($id) {
        $covids = covid::find($id);

        if ($covids){
            $response = [
                'message'=>'Get detail resource',
                'data'=> $covids
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
        $covids = covid::find($id);
        if($covids){
            $covids->update($request->all());
            $response = [
                'message'=>'resource is update succesully',
                'data'=>$covids
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
        $covids = covid::find($id);
        if ($covids){
            $covids->delete($id);
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
        $covids = covid::where('Name', 'like', '%' . $Name . '%')->get();
        if($covids){
            $response = [
                'message'=>'get searched resource',
                'data'=> $covids
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
        $covids = covid::where('status','like','%' . $status . '%')->get();
        if ($covids){
            $response = [
            'message'=> 'Get'.' '.$status.' '.'reource',
            'data'=>$covids
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