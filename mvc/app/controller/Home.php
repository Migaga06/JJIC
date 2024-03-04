<?php


class Home extends Controller
{
    public function index()
    {

        $model = new Model();
        $arr['user_fname'] = 'Lorraine';
        $arr2['user_lname'] = 'Quina';
        $data = $model->where($arr, $arr2);
        show($data);

        $this->view('home');
    }
}