<?php

class Api_Delete_Product_Controller extends Base_Controller
{
    public $restful = true;

    public function delete_product($id)
    {
        try {
            // Find the product by its ID
            $product = Product::find($id);

            if (!$product) {
                return Response::json(array('error' => 'Product not found'), 404);
            }

            // Delete the product
            $product->delete();

            // Return a success response
            return Response::json(array('message' => 'Product deleted successfully'), 200);
        } catch (Exception $e) {
            // Handle exceptions
            Log::write('error', $e->getMessage());

            // Return an error response
            return Response::json(array('error' => 'An error occurred while processing the request'), 500);
        }
    }
}
