<?php

class Reservation extends Controller
{
  public function index()
  {
    $reserve = new Reserve();

    $rows = $reserve->viewReserve();

    $rows_c = $reserve->viewConfirmReserve();

    if(count($_POST) > 0){
      if(isset($_POST['mergeRes'])){
        if (isset($_POST['reserve_id']) && !empty($_POST['reserve_id'])){
          $ids = $_POST['reserve_id'];
          $reserve->mergeReserve($ids);
        }
      } else
      if(isset($_POST['btnConfirm'])){
        showD($_POST);
      }
    }

    $this->view('reservation', [
      'rows'=>$rows,
      'rows_c'=>$rows_c,
    ]);
  }
}