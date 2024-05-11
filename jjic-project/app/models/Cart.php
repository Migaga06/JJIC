<?php

class Cart extends Model
{
    protected $allowedColumns = [
        'user_id',
        'product_name',
        'product_price',
        'product_description',
        'product_qty',
        'product_type',
        'product_id',
        'image'
    ];

    protected $beforeInsert = [
        'make_cart_id'
    ];

    public function make_cart_id($data){
        $data['cart_id'] = random_string(60);
        return $data;
    }
}