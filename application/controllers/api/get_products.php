<?php

class Api_Get_Products_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index()
    {
        try {
            // Fetch data from the 'products' table
            $products = Product::all(); // Assuming you have a "Product" model

            // Return the product data as a JSON response
            return Response::json($products, 200);
        } catch (Exception $e) {
            // Handle exceptions
            Log::write('error', $e->getMessage());

            // Return an error response
            return Response::json(array('error' => 'An error occurred while processing the request'), 500);
        }
    }
}