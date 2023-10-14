<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\returnSelf;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        if ($categories->count() > 0) {
            return response()->json([
                'categories' => $categories

            ], 200);
        } else {

            return response()->json([
                'categories' => 'No Record Here'

            ], 404);
        }
    }



    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|unique:categories'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->messages()

            ]);
        } else {

            $category = Category::create([

                'name' => $request->name


            ], 200);
        }

        if ($category) {
            return response()->json([

                'message' => 'Category Successfully Saved'
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

        $categories = Category::find($id);

        if ($categories) {
            return response()->json([
                'categories' => $categories

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

        $categories = Category::find($id);

        if ($categories) {
            return response()->json([
                'categories' => $categories

            ], 200);
        } else {

            return response()->json([
                'error' => 'Data Not Found'

            ], 404);
        }
    }



    public function update(Request $request, int $id)
    {

        $validator = Validator::make(
            $request->all(),
            [

                'name' => 'required|string|unique:categories'
            ]
        );


        if ($validator->fails()) {
            return response()->json([

                'error' => $validator->messages()

            ]);
        } else {

            $category = Category::find($id);

            if ($category) {

                $category->update([

                    'name' => $request->name


                ], 200);

                return response()->json([

                    'message' => 'Category Successfully Update'
                ]);
            } else {
                return response()->json([

                    'error' => 'Update Fail'
                ]);
            }
        }
    }
}
