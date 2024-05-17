<?php

class Appointments extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $errors = [];
    $appoint = new Appointment();

    if(count($_POST) > 0){
      if($appoint->validate($_POST)){
        $appoint->insertAppoint($_POST);
        header("refresh:0.25;url=profile/".$_SESSION['USER']->user_id."?tab=appointments");
      } else {
        $errors = $appoint->errors;
      }
    }

    $this->view('appointments',[
      'errors'=>$errors
    ]);
  }
}