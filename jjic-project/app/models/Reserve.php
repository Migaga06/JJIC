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
        'reserve_status',
        'image'
    ];

    protected $beforeInsert = [
        'make_reserve_id',
        'make_reserve_date',
        'make_confirm_date'
    ];

    public function make_reserve_id($data){
        $data['reserve_id'] = random_string(60);
        return $data;
    }

    public function make_reserve_date($data){
        $data['reserve_date'] = date("Y-m-d H:i:s");
        return $data;
    }

    public function make_confirm_date($data){
        $data['confirm_due'] = date("Y-m-d H:i:s");
        return $data;
    }

    public function productRes($data){

        $prod = new Product();
        $res = new Reserve();
        $row = $prod->where('product_id', $data['product_id']);
        $getCur = $row[0]->product_qty;
        $data['product_price'] = $data['product_qty'] * $data['product_price'];
        $valQty = $getCur - $data['product_qty'];

        if($valQty >= 0 ){

            $prod->updateQty('product_qty', $valQty, $data['product_id']);
            $res->insert($data);

            include(views_path("partials/pop-message-res"));

        } else {
            include(views_path("partials/pop-message-resc"));
        }
    }

    public function cancelRes($data){
        $rese = new Reserve();
        $prod = new Product();

        $row_rese = $rese->where('reserve_id', $data);
        $getProdID = $row_rese[0]->product_id;
        $getReseQty = $row_rese[0]->product_qty;
        $row_prod = $prod->where('product_id', $getProdID);
        $getProdQty = $row_prod[0]->product_qty;
        $backQty = $getProdQty + $getReseQty;
        $prod->updateQty('product_qty', $backQty, $getProdID);
        $rese->delete($data, 'reserve_id');

        include(views_path("partials/pop-message-success"));
        header("refresh:0.25;url=profile/".$_SESSION['USER']->user_id."?tab=reserves");
    }
}