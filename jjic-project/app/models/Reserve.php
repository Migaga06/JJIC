<?php

class Reserve extends Model
{
    protected $allowedColumns = [
        'user_id',
        'product_name',
        'product_price',
        'product_description',
        'product_qty',
        'product_type',
        'product_id',
        'reserve_date',
        'image'
    ];

    protected $beforeInsert = [
        'make_reserve_id',
        'make_reserve_date'
    ];

    public function make_reserve_id($data){
        $data['reserve_id'] = random_string(60);
        return $data;
    }

    public function make_reserve_date($data){
        $data['reserve_date'] = date("Y-m-d H:i:S");
        return $data;
    }

    public function productRes($data){
        $prod = new Product();
        $res = new Reserve();
        $row = $prod->where('product_id', $data['product_id']);
        $getCur = $row[0]->product_qty;
        $data['product_price'] = $data['product_qty'] * $data['product_price'];
        $valQty = $getCur - $data['product_qty'];

        $prod->updateQty('product_qty', $valQty, $data['product_id']);
        $res->insert($data);
    }
}