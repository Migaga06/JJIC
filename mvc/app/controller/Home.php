<?php

class Home extends Controller
{
    public function index()
    {
        $model = new Model();
        $arr['firstname'] = 'Bren';
        $arr2['lastname'] = 'Bding';
        $data = $model->where($arr, $arr2);
        show($data);

        $this->view('home');
    }
}