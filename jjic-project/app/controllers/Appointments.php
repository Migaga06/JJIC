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
    $showQuantityExceededMessage = false;


    if(count($_POST) > 0){
      if($appoint->validate($_POST)){
        $checker = $appoint->checkerAppointment($_POST['user_id']);
        if($checker){
          $showQuantityExceededMessage = true;

        } else
        if(!$checker){
          $appoint->insertAppointment($_POST);
          header("refresh:0;url=profile/".$_SESSION['USER']->user_id."?tab=appointments");
        }
      } else {
        $errors = $appoint->errors;
      }
    }

    $this->view('appointments',[
      'errors'=>$errors,
      'showQuantityExceededMessage'=>$showQuantityExceededMessage
    ]);
  }
}