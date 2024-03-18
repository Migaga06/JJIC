<?php


class Home extends Controller
{
    public function index()
    {

        $user = new User();
        $data = $user->delete('1');
        show($data);

        $user = new User();
        $row = $user->findAll($user);
        show($row);

        $this->view('home');
    }
}