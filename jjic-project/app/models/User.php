<?php

class User extends Model
{
  public function validate($data)
  {
    $this->errors = [];

    if (empty($data['firstname'])) {
      $this->errors['firstname'] = "First name is required.";
    }

    if (empty($data['lastname'])) {
      $this->errors['lastname'] = "Last name is required.";
    }

    if (empty($data['username'])) {
      $this->errors['username'] = "Username is required.";
    }

    if($this->check('username', $data['username'])){
      $this->errors['username'] = "Username is already used.";
    }

    if (empty($data['email'])) {
      $this->errors['email'] = "Email is required.";
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
      $this->errors['email'] = "Email is not valid.";
    }

    if($this->check('email', $data['email'])){
      $this->errors['email'] = "Email is already used.";
    }

    if (empty($data['password'])) {
      $this->errors['password'] = "Password is required.";
    } else if (strlen($data['password']) < 6) {
      $this->errors['password'] = "Password must be atleast 6 characters long.";
    }

    if (count($this->errors) == 0) {
      return true;
    } else {
      return false;
    }
  }
}