<?php

class Api_Add_Products_Controller extends Base_Controller
{
    public $restful = true;

    public function post_index()
    {
        try {
            $input = Input::json();

            // Validate the input data
            $rules = array(
                'pname' => 'required',
                'pcat' => 'required',
                'quantity' => 'required|integer',
                'price' => 'required|numeric',
            );

            $validation = Validator::make((array) $input, $rules);  // Cast $input to an array

            if ($validation->fails()) {
                // Handle validation errors for API requests
                return Response::json(array('errors' => $validation->errors), 400);
            }

            // Insert data into the 'products' table for API requests
            $product = new Product;
            $product->pname = $input->pname;  // Use -> to access object properties
            $product->pcat = $input->pcat;
            $product->quantity = $input->quantity;
            $product->price = $input->price;
            $product->save();

            // Return a success response
            return Response::json(array('message' => 'Product added successfully'), 201);
        } catch (Exception $e) {
            // Handle exceptions
            // Log::write('error', $e->getMessage());
            // Log::write('info', json_encode($input));


            // Return an error response
            return Response::json(array('error' => 'An error occurred while processing the request'), 500);

            // return Response::json(array('error' => 'An error occurred while processing the request'), 500);
        }
    }
}
