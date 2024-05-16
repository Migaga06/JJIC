<?php

class Users extends Controller
{
    public function index()
    {
        $x = new User();
        $rows = $x->findALl();

        $this->view('users/index', [
            'users' => $rows
        ]);
    }

    public function create()
    {
        $x = new User();

        if(isset($_POST['create']))
        {
            $arr['firstname'] = $_POST['firstname'];
            $arr['lastname'] = $_POST['lastname'];
            $arr['email'] = $_POST['email'];
            $arr['password'] = $_POST['password'];

            $x->insert($arr);

            redirect('users');
        }

        $this->view('users/create');
    }

    public function edit($id)
    {
        $x = new User();

        $arr['id'] = $id;
        $row = $x->first($arr);

        $this->view('users/edit', [
            'user' => $row
        ]);
    }
}