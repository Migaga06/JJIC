<?php

class Profile extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $crumbs[] = ['Home', "home"];
    $crumbs[] = ['Profile', "profile"];

    $cart = new Cart();
    $appointment = new Appointment();
    $reserve = new Reserve();
    $product = new Product();
    
    $row_cart = $cart->where('user_id', $_SESSION['USER']->user_id);
    $row_reserve = $reserve->where('user_id', $_SESSION['USER']->user_id);

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
        redirect('profile/'.$_SESSION['USER']->user_id."?tab=carts");

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
          redirect('profile/' . $_SESSION['USER']->user_id . "?tab=reserves");
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

      }
    }
    
    $this->view('profile', [
      'crumbs'=>$crumbs,
      'row_cart'=>$row_cart,
      'row_reserve'=>$row_reserve,
      'page_tab'=>$page_tab
    ]);
  }

    
}