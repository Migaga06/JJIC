<?php


class Home extends Controller
{
    public function index()
    {
     $model = new User();
     $arr['firstname'] = 'John Bren';
     $arr2['lastname'] = 'Urbano';
     $data = $model->where($arr, $arr2);
     show($data);

     $this->view('home');
    }
}