<?php

class Users extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $x = new User();
    $rows = $x->findAll();

    

    if(Auth::access('Super Admin')){

      $crumbs[] = ['Home', "./"];
      $crumbs[] = ['Users', "users/"];

      $this->view('users/index', [
        'crumbs'=>$crumbs,
        'users'=>$rows
      ]);
    }else{
      $this->view('access-denied');
    }
  }

  public function create()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $errors = [];
    $user = new User();

    $crumbs[] = ['Home', "/"];
    $crumbs[] = ['Users', "users"];
    $crumbs[] = ['Create', "users/create"];

    if(Auth::access('Super Admin')){
      if (count($_POST) > 0) {
        if ($user->validate($_POST)) {
          if (count($_FILES) > 0) {

          $allowed[] = 'image/png';
          $allowed[] = 'image/jpeg';

          if ($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed)) {

            $folder = 'assets/images/';
            if (!file_exists($folder)) {
              mkdir($folder, 0777, true);
            }
            $destination = $folder . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            $_POST['image'] = $destination;
            }
          }

          $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $_POST['user_id'] = random_string(60);

          $user->insert($_POST);

          redirect('users');

        } else {
          $errors = $user->errors;
        }
      }
    }

    if(Auth::access('Super Admin')){
      $this->view('users/create', [
        'crumbs'=>$crumbs,
        'errors' => $errors
      ]);
    }else{
      $this->view('access-denied');
    }
  }

  public function edit($id = null)
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $x = new User();
    $row = $x->where('user_id', $id);

    if(Auth::access('Super Admin')){
      if (count($_POST) > 0) {
        if (count($_FILES) > 0) {


          $allowed[] = 'image/png';
          $allowed[] = 'image/jpeg';

          if ($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed)) {

            $folder = 'assets/images/';
            if (!file_exists($folder)) {
              mkdir($folder, 0777, true);
            }
            $destination = $folder . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            $_POST['image'] = $destination;
            }
          }
        echo "<pre>"; print_r($_FILES); 
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        
        
        $x->update($id, $_POST, 'user_id');
        
        redirect('users');
      }
    }

    $crumbs[] = ['Home', "../"];
    $crumbs[] = ['Users', "users/"];
    $crumbs[] = ['Edit', "users/edit"];

    if(Auth::access('Super Admin')){
      $this->view('users/edit', [
        'row'=> $row,
        'crumbs'=>$crumbs
      ]);
    }else{
      $this->view('access-denied');
    }
  }

  public function delete($id = null)
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    
    $x = new User();
    $row = $x->where('user_id', $id);

    if(Auth::access('Super Admin')){
      if (count($_POST) > 0) {

        $x->delete($id, 'user_id');

        redirect('users');
      }
    }
    
    if(Auth::access('Super Admin')){
      $this->view('users/delete', [
        'row' => $row
      ]);
    }else{
      $this->view('access-denied');
    }
    
  }
}