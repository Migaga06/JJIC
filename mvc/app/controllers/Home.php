<?php

class Home extends Controller
{
    public function index()
    {
        $user = new User();
        $arr['f_name'] = 'Luke';
        $arr['l_name'] = 'Mateo';
        $arr['e_mail'] = 'Luke@gmail.com';
        $arr['pass_word'] = 'Luke';
        $data = $user->insert($arr);
        show($data);

        $user = new User();
        $rows = $user->findAll();
        show($rows);

       
        $this->view('home');
    }               
} 