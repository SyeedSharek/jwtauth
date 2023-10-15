<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Validator;



class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        if ($brands->count() > 0) {
            return response()->json([
                'brands' => $brands

            ], 200);
        } else {

            return response()->json([
                'brands' => 'No Record Here'

            ], 404);
        }
    }



    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|unique:brands'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()

            ]);
        } else {

            $brand = Brand::create([

                'name' => $request->name


            ], 200);
        }

        if ($brand) {
            return response()->json([

                'message' => 'brand Successfully Saved'
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

        $brands = Brand::find($id);

        if ($brands) {
            return response()->json([
                'brands' => $brands

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

        $brands = Brand::find($id);

        if ($brands) {
            return response()->json([
                'brands' => $brands

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
                'name' => 'required|string|unique:brands'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()

            ]);
        } 
        

       

        $brand = Brand::find($id);

        if($brand){
            
           $brand->name = $request->name;
            $brand->update();



            return response()->json([

                'message' => 'brand Successfully Saved'
            ],200);

        }
        else{

            return response()->json([

                'message' => 'No brand Found'
            ],404);
        }

    }


    public function delete($id)
    {

        $brand = Brand::find($id);
        if($brand)
        {
            $brand->delete();

            return response()->json([

                'message' => 'brand Delete'
            ],200);

        }

        else
        {
            return response()->json([

                'message' => 'brand Not Found'
            ],404);
        }

    }
}
