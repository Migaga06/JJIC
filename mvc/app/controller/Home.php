<?php

class Home extends Controller
{
    public function index()
    {
        $model = new Model();
        $data = $model->findAll();
        show($data);
        
     $this->view('home');
    }
}