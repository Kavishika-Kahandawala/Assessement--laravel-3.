<?php

class Api_Add_Category_Controller extends Base_Controller
{
    public $restful = true;

    public function post_index()
    {
        try {
            $input = Input::json();

            // Validate the input data
            $rules = array(
                'pcat' => 'required|unique:categories,cat_name',
            );

            $validation = Validator::make((array) $input, $rules);  // Cast $input to an array

            if ($validation->fails()) {
                // Handle validation errors for API requests
                return Response::json(array('errors' => $validation->errors), 400);
            }

            // Insert data into the 'categories' table for API requests
            $category = new Category;
            $category->cat_name = $input->pcat;
            $category->save();

            // Return a success response
            return Response::json(array('message' => 'Category added successfully'), 201);
        } catch (Exception $e) {
            // Handle exceptions
            Log::write('error', $e->getMessage());
            Log::write('info', json_encode($input));

            // Return an error response
            return Response::json(array('error' => $e->getMessage()), 500);
        }
    }
}
