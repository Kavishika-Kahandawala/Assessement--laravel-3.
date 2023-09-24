<?php

class Manage_Products_Edit_Product_Form_Controller extends Base_Controller
{
    public $restful = true;

    public function get_index()
    {
        return View::make('manage_products.edit_product');
    }
}