<?php


class Home extends Controller
{
    public function index()
    {

        $model = new Model();
        $arr['user_fname'] = 'Lorraine';
        
        $data = $model->where($arr);
        show($data);

        $this->view('home');
    }
}