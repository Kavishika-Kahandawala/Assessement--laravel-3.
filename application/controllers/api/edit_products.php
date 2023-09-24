<?php

class Api_Edit_Products_Controller extends Base_Controller
{
    public $restful = true;
    
    public function put_index($id)
    // return Response::json(array('error' => 'An error occurred while processing the request'), 500);
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

            // Find the product by ID
            $product = Product::find($id);

            if (!$product) {
                // If the product with the given ID doesn't exist, return an error
                return Response::json(array('error' => 'Product not found'), 404);
            }

            // Update product data
            $product->pname = $input->pname;  // Use -> to access object properties
            $product->pcat = $input->pcat;
            $product->quantity = $input->quantity;
            $product->price = $input->price;
            $product->save();

            // Return a success response
            return Response::json(array('message' => 'Product updated successfully'), 200);
        } catch (Exception $e) {
            // Handle exceptions
            // Log::write('error', $e->getMessage());
            // Log::write('info', json_encode($input));

            // Return an error response
            return Response::json(array('error' => 'An error occurred while processing the request'), 500);
        }
    }
}
