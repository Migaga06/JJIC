<?php


class Home extends Controller
{
    public function index()
    {

        $user = new User();
        $data = $user->findAll($user);
        show($data);

        $this->view('home');
    }
}