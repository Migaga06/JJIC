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

          if ($_FILES['user_image']['error'] == 0 && in_array($_FILES['user_image']['type'], $allowed)) {

            $folder = 'assets/images/';
            if (!file_exists($folder)) {
              mkdir($folder, 0777, true);
            }
            $destination = $folder . $_FILES['user_image']['name'];
            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);

            $_POST['user_image'] = $destination;
          }
        }

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['user_id'] = random_string(60);

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