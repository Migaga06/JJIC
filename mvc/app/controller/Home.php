<?php

class Home extends Controller
{
    public function index()
    {
<<<<<<< HEAD
     $model = new Model();
     $arr['firstname'] = 'John Bren';
     $arr2['lastname'] = 'Urbano';
     $data = $model->where($arr, $arr2);
     show($data);

     $this->view('home');
=======
        $model = new Model();
        $arr['firstname'] = 'Bren';
        $arr2['lastname'] = 'Bding';
        $data = $model->where($arr, $arr2);
        show($data);

        $this->view('home');
>>>>>>> 1b1d742ef3d1b7e7b6bd49a236a5d6925aff0dd7
    }
}