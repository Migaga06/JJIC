<?php

class Register extends Controller
{
  public function index()
  {
    $errors = [];
    $user = new User();

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
        $_POST['token'] = random_string(60);

        $user->insert($_POST);

        redirect('login');

      } else {
        $errors = $user->errors;
      }
    }

    $this->view('register', [
      'errors' => $errors
    ]);
  }
}