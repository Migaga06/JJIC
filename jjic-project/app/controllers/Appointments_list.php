<?php

class Appointments_list extends Controller
{
  public function index(){
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $appoint = new Appointment();
    $user = new User();

    $rows = $appoint->viewAppoint();
    $rows_c = $appoint->viewConfirmAppoint();
    $rows_o = $appoint->viewOverdueAppoint();
    $rows_d = $appoint->viewDoneAppoint();
    if(Auth::access('Staff')){
    $page_tab = isset($_GET['tab']) ? $_GET['tab'] : 'confirms';

    if($page_tab == 'confirms' && count($_POST) > 0){

      if(isset($_POST['btnConfirm'])){
        $appoint->confirmAppoint($_POST['btnConfirm']);
        header("refresh:0;url=appointments_list?tab=confirmeds");
      } else
      if(isset($_POST['cancelRes'])){

        if(isset($_POST['appoint_id']) &&!empty($_POST['appoint_id'])){

          $ids = $_POST['appoint_id'];
          foreach($ids as $id){
            $appoint->cancelAppoint($id);
          }
          header("refresh:0;url=appointments_list?tab=confirms");

        }

      }

    } else
    if($page_tab == 'confirmeds' && count($_POST) > 0){

      if(isset($_POST['doneAppoint'])){

        if(isset($_POST['appoint_id']) &&!empty($_POST['appoint_id'])){

          $ids = $_POST['appoint_id'];
          foreach($ids as $id){
            $appoint->doneAppoint($id);
          }

          header("refresh:0;url=appointments_list?tab=dones");

        }

      } else
      if(isset($_POST['confirmRemove'])){

        if(isset($_POST['appoint_id']) &&!empty($_POST['appoint_id'])){

          $ids = $_POST['appoint_id'];
          foreach($ids as $id){
            $appoint->confirmRemoveAppoint($id);
          }

          header("refresh:0;url=appointments_list?tab=confirms");

        }
      }

    }

    $this->view('appointments_list', [
      'page_tab'=>$page_tab,
      'rows'=>$rows,
      'rows_c'=>$rows_c,
      'rows_o'=>$rows_o,
      'rows_d'=>$rows_d,
    ]);
    } else if(Auth::access('Admin')){

    $page_tab = isset($_GET['tab']) ? $_GET['tab'] : 'confirms';

    if($page_tab == 'overdues' && count($_POST) > 0){

      if(isset($_POST['banUser'])){

          $id = $_POST['banUser'];
          $date = date("Y-m-d H:i:s", strtotime($_POST['confirm_date']));
          $user->bannedUser($id, $date);
          header("refresh:0;url=users");

      } else
      if(isset($_POST['removeDue'])){

          $id = $_POST['removeDue'];
          $appoint->removeOverdueAppoint($id);
          header("refresh:0;url=appointments_list?tab=overdues");

      }

    } else
    if($page_tab == 'dones' && count($_POST) > 0){

      if(isset($_POST['clearData'])){

        $appoint->deleteDoneAppoint();
        header("refresh:0;url=appointments_list?tab=dones");

      }

    }

    $this->view('appointments_list', [
      'page_tab'=>$page_tab,
      'rows'=>$rows,
      'rows_c'=>$rows_c,
      'rows_o'=>$rows_o,
      'rows_d'=>$rows_d,
    ]);
    }else {
      $this->view('access');
    }
  }
}