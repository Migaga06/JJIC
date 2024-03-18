<?php


class Home extends Controller
{
    public function index()
    {

        $user = new User();
        $arr['user_fname'] = "Joseph";
        $arr['user_lname'] = "Urbano";
        $arr['user_email'] = "josephurbano0904@gmail.com";
        $arr['user_pass'] = "@jurbano04"; 
        $data = $user->insert($arr);
        show($data);

        $this->view('home');
    }
}