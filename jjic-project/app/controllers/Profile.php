<?php

class Profile extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }
    $cart = new Cart();
    $appointment = new Appointment();
    $reserve = new Reserve();
    $product = new Product();

    $row_cart = $cart->where('user_id', $_SESSION['USER']->user_id);
    $row_reserve = $reserve->where('user_id', $_SESSION['USER']->user_id);
    $row_appoint = $appointment->where('user_id', $_SESSION['USER']->user_id);

    $page_tab = isset($_GET['tab']) ? $_GET['tab'] : 'carts';

    if($page_tab == 'carts' && count($_POST) > 0){

      if(isset($_POST['search'])){
        $product_name = "%".trim($_POST['product_name'])."%";
        $query = "SELECT * FROM carts WHERE product_name LIKE :product_name && user_id = :user_id limit 10";
        $row_cart = $cart->query($query, [
          'product_name'=>$product_name,
          'user_id'=>$_SESSION['USER']->user_id
        ]);
      } else
      if(isset($_POST['btnRemove'])){

        $cart->delete($_POST['btnRemove'], 'cart_id');
        header("Location: profile/".$_SESSION['USER']->user_id."?tab=carts");

      } else
      if(isset($_POST['multiRes'])){
        if (isset($_POST['cart_id']) && !empty($_POST['cart_id'])) {
          $all_id = $_POST['cart_id'];
          $all_qty = $_POST['product_qty'];


          foreach ($all_id as $key => $ids) {
            $qtys = $all_qty[$key];
            $get = $cart->where('cart_id', $ids);
            $QTY = $qtys;
            $prodid = $get[0]->product_id;
            $prodGet = $product->where('product_id', $prodid);
            $prodqty = $prodGet[0]->product_qty;
            $prodprice = $prodGet[0]->product_price;

            $sumPrice = $QTY * $prodprice;
            $sumQty = $prodqty - $QTY;

            $product->updateQty('product_qty', $sumQty, $prodid);

            $reserve->insertResFromCarts($ids, $qtys, $sumPrice);
            $cart->deleteCart($ids);
          }
          header("Location: profile/".$_SESSION['USER']->user_id."?tab=reserves");
        }
      }
    } else
    if ($page_tab == 'reserves' && count($_POST) > 0){

      if(isset($_POST['search'])){

        $product_name = "%".trim($_POST['product_name'])."%";
        $query = "SELECT * FROM reserves WHERE product_name LIKE :product_name && user_id = :user_id limit 10";
        $row_reserve = $reserve->query($query, [
          'product_name'=>$product_name,
          'user_id'=>$_SESSION['USER']->user_id
        ]);

      } else
      if(isset($_POST['cancelRes'])){

        $reserve->cancelRes($_POST['cancelRes']);
        header("Location: url=profile/".$_SESSION['USER']->user_id."?tab=reserves");
      } else
      if(isset($_POST['clearReserve'])){

        $reserve->clearReserveId($_POST['clearReserve']);
        header("Location: url=profile/".$_SESSION['USER']->user_id."?tab=reserves");
      }
    } else
    if ($page_tab == 'appointments' && count($_POST) > 0){

      if(isset($_POST['btnEdit'])){
        $appointment->editAppoint($_POST);
        header("Location: url=profile/".$_SESSION['USER']->user_id."?tab=appointments");
      } else
      if(isset($_POST['btnCancel'])){
        $id = $_POST['btnCancel'];
        $appointment->delete($id, 'appoint_id');
        header("Location: url=profile/".$_SESSION['USER']->user_id."?tab=appointments");
      }else
      if(isset($_POST['clearAppoint'])){
        $id = $_POST['clearAppoint'];
        $deleteQ = "DELETE FROM appointments WHERE appoint_id = '$id'";
        $appointment->query($deleteQ);
        header("Location: url=profile/".$_SESSION['USER']->user_id."?tab=appointments");
      }

    }

    $this->view('profile', [
      'row_cart'=>$row_cart,
      'row_reserve'=>$row_reserve,
      'row_appoint'=>$row_appoint,
      'page_tab'=>$page_tab
    ]);
  }


}