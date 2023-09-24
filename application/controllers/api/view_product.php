<?php

class Api_View_Product_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index($id)
    {
        try {
            // Find the product by ID
            $product = Product::find($id);

            if (!$product) {
                // If the product with the given ID doesn't exist, return an error
                return Response::json(array('error' => 'Product not found'), 404);
            }

            // Return the product data
            return Response::json($product, 200);
        } catch (Exception $e) {
            // Handle exceptions
            // Log::write('error', $e->getMessage());

            // Return an error response
            return Response::json(array('error' => 'An error occurred while processing the request'), 500);
        }
    }
}
