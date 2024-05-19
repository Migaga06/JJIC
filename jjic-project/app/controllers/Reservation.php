<?php

/*require_once __DIR__ . '/../excel/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;*/

class Reservation extends Controller
{


  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $reserve = new Reserve();
    $product = new Product();

    $rows = $reserve->viewReserve();
    $rows_c = $reserve->viewConfirmReserve();
    $rows_o = $reserve->viewOverdueReserve();
    $rows_d = $reserve->viewDoneReserve();
    if(Auth::access('Staff')){
    $page_tab = isset($_GET['tab']) ? $_GET['tab'] : 'confirms';

    if($page_tab == 'confirms' && count($_POST) > 0){

      if(isset($_POST['btnConfirm'])){

        $date = date("Y-m-d H:i:s", strtotime($_POST['confirm_date']));
        $id = $_POST['btnConfirm'];

        $reserve->confirmRes($id, $date);
        include(views_path("partials/pop-message-res"));
        header("refresh:0.25;url=reservation");

      } else
      if(isset($_POST['mergeRes'])){

        if (isset($_POST['reserve_id']) && !empty($_POST['reserve_id'])){

          $ids = $_POST['reserve_id'];
          $reserve->mergeReserve($ids);

        }

      } else
      if(isset($_POST['cancelRes'])){

        if(isset($_POST['reserve_id']) &&!empty($_POST['reserve_id'])){

          $ids = $_POST['reserve_id'];
          foreach($ids as $id){
            $reserve->cancelReserve($id);
          }
          include(views_path("partials/pop-message-success"));
          header("refresh:0.25;url=reservation");

        }

      }
    } else
    if($page_tab == 'confirmeds' && count($_POST) > 0){
      if(isset($_POST['doneRes'])){

        $ids = $_POST['reserve_id'];
        $reserve->doneRes($ids);
        header("refresh:0.25;url=reservation");

      } else
      if(isset($_POST['confRemove'])){

        $ids = $_POST['reserve_id'];
        $reserve->confirmRemoveRes($ids);
        header("refresh:0.25;url=reservation");

      }
    }


    $this->view('reservation', [
      'rows'=>$rows,
      'rows_c'=>$rows_c,
      'rows_o'=>$rows_o,
      'rows_d'=>$rows_d,
      'page_tab'=>$page_tab
    ]);
    } else
    if(Auth::access('Admin')){

    if($page_tab == 'overdues' && count($_POST) > 0){

      if(isset($_POST['banUser'])){
        //showD($_POST);
        $id = $_POST['banUser'];
        $date = date("Y-m-d H:i:s", strtotime($_POST['confirm_date']));
        $user = new User();
        $user->bannedUser($id, $date);
        header("refresh:0.25;url=reservation");
      } else
      if(isset($_POST['removeDue'])){

        $id = $_POST['removeDue'];
        $reserve->removeOverdueReserve($id);
        include(views_path("partials/pop-message-success"));
        header("refresh:0.25;url=reservation");

      }
    } else
    if($page_tab == 'dones' && count($_POST) > 0){
      if (isset($_POST['clearData'])){
        $reserve->deleteDoneRes();
        redirect('reservation');
      }
    }
    }else {
      $this->view('access');
    }
  }
}