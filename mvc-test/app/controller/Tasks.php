<?php

class Tasks extends Controller
{
    public function index()
    {
        $x = new Task();
        $rows = $x->findAll();

        $this->view('tasks/index', [
            'tasks' => $rows
        ]);
    }

    public function create()
    {
        $x = new Task();

        if(isset($_POST['create']))
        {
            $arr['task_name'] = $_POST['name'];
            $arr['task_description'] = $_POST['description'];
            $arr['task_status'] = $_POST['status'];
            $arr['task_due'] = $_POST['due'];

            $x->insert($arr);

            redirect('tasks');
        }

        $this->view('tasks/create');
    }

    public function update($id)
    {
        $x = new Task();

        $arr['id'] = $id;
        $row = $x->where($arr);

        $this->view('tasks/update', [
            'tasks' => $row
        ]);

        if(isset($_POST['update']))
        {
            $arr1['task_name'] = $_POST['name'];
            $arr1['task_description'] = $_POST['description'];
            $arr1['task_status'] = $_POST['status'];
            $arr1['task_due'] = $_POST['due'];

            $x->update($id,$arr1);

            redirect('tasks');
        }
    }

    public function delete($id)
    {
        $x = new Task();
        $arr['id'] = $id;
        $row = $x->delete($id);
    }
}