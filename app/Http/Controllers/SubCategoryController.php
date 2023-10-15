<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{

    public function index()
    {
        $subcategories = SubCategory::all();

        if ($subcategories->count() > 0) {
            return response()->json([
                'subcategories' => $subcategories

            ], 200);
        } else {

            return response()->json([
                'subcategories' => 'No Record Here'

            ], 404);
        }
    }


    public function store(Request $request)
    {    
        
        $validator = Validator::make(
            $request->all(),
            [
                'category_id'=>'required',
                'name' => 'required|string|unique:sub_categories'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()

            ]);
        } else {

            $subcategory = SubCategory::create([
                'category_id'=>$request->category_id,
                'name' => $request->name


            ], 200);
        }

        if ($subcategory) {
            return response()->json([

                'message' => 'SubCategory Successfully Saved'
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
    
            $subcategories = SubCategory::find($id);
    
            if ($subcategories) {
                return response()->json([
                    'subcategories' => $subcategories
    
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
    
            $subcategories = SubCategory::find($id);
    
            if ($subcategories) {
                return response()->json([
                    'categories' => $subcategories
    
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
                    'category_id'=>'required',
                    'name' => 'required|string|unique:sub_categories'
                ]
            );
    
            if ($validator->fails()) {
                return response()->json([
                    'error' => $validator->messages()
    
                ]);
            } 
            
    
           
    
            $subcategory = SubCategory::find($id);
    
            if($subcategory){

                $subcategory->category_id = $request->category_id;
                $subcategory->name = $request->name;

                $subcategory->update();
    
    
    
                return response()->json([
    
                    'message' => 'subcategory Successfully Saved'
                ],200);
    
            }
            else{
    
                return response()->json([
    
                    'message' => 'No subcategory Found'
                ],404);
            }
    
        }

        public function delete($id)
    {

        $subcategory = SubCategory::find($id);
        if($subcategory)
        {
            $subcategory->delete();

            return response()->json([

                'message' => 'subcategory Delete'
            ],200);

        }

        else
        {
            return response()->json([

                'message' => 'subcategory Not Found'
            ],404);
        }

    }
}
