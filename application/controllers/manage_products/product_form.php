<?php

class Manage_Products_Product_Form_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index()
    {
        return View::make('manage_products.add_product');
    }
}