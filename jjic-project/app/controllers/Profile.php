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

    $row_cart = $cart->where('user_id', $_SESSION['USER']->user_id);

    $page_tab = isset($_GET['tab']) ? $_GET['tab'] : 'carts';
    
    $this->view('profile', [
      'crumbs'=>$crumbs,
      'row_cart'=>$row_cart,
      'page_tab'=>$page_tab
    ]);
  }
}