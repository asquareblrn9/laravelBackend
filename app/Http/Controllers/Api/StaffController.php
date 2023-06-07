<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Staffs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    //
     //get all staff
     public function index()
     {
         //get all staff
         $staff = Staffs::all();
 
         //check if staff is more than zero
         if ($staff->count() > 0) {
 
             return $staff;
 
         } else {
             return response()->json([
                 'status' => 400,
                 'staff' => 'No staff found',
             ], 400);
         }
 
     }
 
     public function store(Request $request)
     {
         // validating inputs
         $validate = Validator::make($request->all(), [
             'firstName' => 'required|string|max:255',
             'lastName' => 'required|string|max:255',
             'position' => 'required|string|max:255',
             'email' => 'required|string|max:255', 
         ]);
 
         //check if validator fails
         if($validate->fails()){
             return response()->json([
                 'status' => 403,
                 'error' => $validate->messages()
             ], 403);
 
         }else{
             //create staff
             $staff = Staffs::create([
             'firstName' => $request->firstName,
             'lastName' => $request->lastName,
             'position' => $request->position,
             'email' => $request->email,
            
             ]);
             if($staff){
                 return response()->json([
                     'status' => 201,
                     'message' => "Staff created successfully"
                 ], 201); 
             }else{
                 return response()->json([
                     'status' => 500,
                     'error' => "something went wrong, please try again later"
                 ], 500);
             }
             
         }
     }
}
