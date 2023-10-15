<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Area;
use Illuminate\Support\Facades\Validator;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();

        if ($areas->count() > 0) {
            return response()->json([
                'areas' => $areas

            ], 200);
        } else {

            return response()->json([
                'areas' => 'No Record Here'

            ], 404);
        }
    }


    public function store(Request $request)
    {    
        
        $validator = Validator::make(
            $request->all(),
            [
                'location_id'=>'required',
                'name' => 'required|string|unique:areas'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()

            ]);
        } else {

            $area = Area::create([
                'location_id'=>$request->location_id,
                'name' => $request->name


            ], 200);
        }

        if ($area) {
            return response()->json([

                'message' => 'Area Successfully Saved'
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
    
            $areas = Area::find($id);
    
            if ($areas) {
                return response()->json([
                    'areas' => $areas
    
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
    
            $areas = Area::find($id);
    
            if ($areas) {
                return response()->json([
                    'areas' => $areas
    
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
                    'location_id'=>'required',
                    'name' => 'required|string|unique:sub_categories'
                ]
            );
    
            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->erorrs()
    
                ]);
            } 
            
    
           
    
            $area = Area::find($id);
    
            if($area){

                $area->location_id = $request->location_id;
                $area->name = $request->name;

                $area->update();
    
    
    
                return response()->json([
    
                    'message' => 'Area Successfully Saved'
                ],200);
    
            }
            else{
    
                return response()->json([
    
                    'message' => 'No area Found'
                ],404);
            }
    
        }

        public function delete($id)
    {

        $area = Area::find($id);
        if($area)
        {
            $area->delete();

            return response()->json([

                'message' => 'Area Delete'
            ],200);

        }

        else
        {
            return response()->json([

                'message' => 'Area Not Found'
            ],404);
        }

    }
}
