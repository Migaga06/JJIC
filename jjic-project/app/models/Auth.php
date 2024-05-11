<?php

class Auth
{
  public static function authenticate($row)
  {
    $_SESSION['USER'] = $row;
  }

  public static function logout()
  {
    if (isset($_SESSION['USER'])) {
      unset($_SESSION['USER']);
    }
  }

  public static function logged_in()
  {
    if (isset($_SESSION['USER'])) {
      return true;
    } else {
      return false;
    }
  }

  public static function getUser_id(){
    $user = new User();
    $arr['id'] = $_SESSION['USER']->id;
    $row = $user->first($arr);
    if($row){
      $getID = $row->user_id;
      return $getID;
    }
  }

  public static function access($role = 'User')
  {
    if (!isset($_SESSION['USER'])) {
      return false;
    } 

    $logged_in_rank = $_SESSION['USER']->role;

    $ROLE['Super Admin'] = ['Super Admin', 'Admin', 'User'];
    $ROLE['Admin'] = ['Admin', 'User'];
    $ROLE['User'] = ['User'];

    if(!isset($ROLE[$logged_in_rank])){
      return false;
    }

    if(in_array($role, $ROLE[$logged_in_rank])){
      return true;
    }

    return false;
  }
}