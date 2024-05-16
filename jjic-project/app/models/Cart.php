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

    public function merge_exist($data){
        $cart = new Cart();

        $conditions = [
            'product_id' => $data['product_id'],
            'user_id' => $data['user_id']
        ];

        $checker = $cart->whereMultiple($conditions);

        if($checker){
            $data['product_qty'] = $checker[0]->product_qty + $data['product_qty'];
            $data['cart_id'] = $checker[0]->cart_id;
            echo "<pre>"; print_r($checker[0]);
            echo "<pre>"; print_r($data);
            $cart->updateWhereDouble($data['product_id'], $data['user_id'], $data);
        }else if(!$checker){
            $cart->insert($_POST);
        }
    }
}