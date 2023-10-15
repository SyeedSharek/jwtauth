<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        if ($locations->count() > 0) {
            return response()->json([
                'locations' => $locations

            ], 200);
        } else {

            return response()->json([
                'locations' => 'No Record Here'

            ], 404);
        }
    }



    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|unique:locations'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()

            ]);
        } else {

            $location = Location::create([

                'name' => $request->name


            ], 200);
        }

        if ($location) {
            return response()->json([

                'message' => 'location Successfully Saved'
            ]);
        } else {

            return response()->json([

                'error' => 'Insert Fail'
            ]);
        }
    }


    // Search Method---------

    public function show($id)
    {

        $locations = Location::find($id);

        if ($locations) {
            return response()->json([
                'locations' => $locations

            ], 200);
        } else {

            return response()->json([
                'error' => 'Data Not Found'

            ], 404);
        }
    }

    //--------------

    public function edit_index($id)
    {

        $locations = Location::find($id);

        if ($locations) {
            return response()->json([
                'locations' => $locations

            ], 200);
        } else {

            return response()->json([
                'error' => 'Data Not Found'

            ], 404);
        }
    }



    

    public function update(Request $request, $id){

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|unique:locations'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()

            ]);
        } 
        

       

        $location = Location::find($id);

        if($location){
            
            $location->name = $request->name;
            $location->update();



            return response()->json([

                'message' => 'location Successfully Saved'
            ],200);

        }
        else{

            return response()->json([

                'message' => 'No location Found'
            ],404);
        }

    }


    public function delete($id)
    {

        $location = Location::find($id);
        if($location)
        {
            $location->delete();

            return response()->json([

                'message' => 'location Delete'
            ],200);

        }

        else
        {
            return response()->json([

                'message' => 'location Not Found'
            ],404);
        }

    }
}
