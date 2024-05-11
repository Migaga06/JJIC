<?php

class Product extends Model
{
    protected $allowedColumns = [
        'product_name',
        'product_price',
        'product_description',
        'product_qty',
        'product_type',
        'image'
    ];

    protected $beforeInsert = [
        'make_user_id',
        'make_product_id'
    ];

    protected $afterSelect = [
        'get_user'
    ];

    public function validate_product($data)
    {
        $this->errors = [];

        if (empty($data['product_name'])) {
        $this->errors['product_name'] = "Product name is required.";
        }

        if (empty($data['product_description'])) {
            $this->errors['product_description'] = "Product description is required.";
            }

        if (empty($data['product_price'])) {
        $this->errors['product_price'] = "Product price is required.";
        }

        if (empty($data['product_qty'])) {
        $this->errors['product_qty'] = "Product quantity is required.";
        }

        if (empty($data['product_type'])) {
            $this->errors['product_type'] = "Product type is required.";
            }

        if (count($this->errors) == 0) {
        return true;
        } else {
        return false;
        }
    }

    public function make_product_id($data){
        $data['product_id'] = random_string(60);
        return $data;
    }

    public function make_user_id($data){
        $user = new User();
        $arr['id'] = $_SESSION['USER']->id;
        $row = $user->first($arr);
        if($row){
            $getUser = $row->user_id;

            if(isset($_SESSION['USER']->id)){
                $data['make_user_id'] = $getUser; // Assuming $getUser is the value you want to add
            }
        }
        return $data;
    }

    public function get_user($data){
        $user = new User();
        foreach ($data as $key => $row) {
            // Check if 'make_user_id' property is set and not null
            if(isset($row->make_user_id) && $row->make_user_id !== null) {
                // Retrieve user information based on 'make_user_id'
                $user_info = $user->where('user_id', $row->make_user_id);
                // If user information is found, assign it to the 'user' property
                if($user_info) {
                    $data[$key]->user = is_array($user_info) ? $user_info[0] : false;
                } else {
                        // If user information is not found, set 'user' property to null or handle it differently
                    $data[$key]->user = null;
                }
            }
        }
        return $data;
    }
}