<?php

class Products extends Controller
{
  public function index()
  {
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $crumbs[] = ['Home', "/"];
    $crumbs[] = ['Products', "products/index"];

    $product = new Product();
    $row = $product->findAllEqual();


    $this->view('products/index', [
      'crumbs'=>$crumbs,
      'gets'=>$row
    ]);
  }

  public function add($id = null){
    if (!Auth::logged_in()) {
      redirect('login');
    }

    $crumbs[] = ['Home', "/"];
    $crumbs[] = ['Products', "products/index"];
    $crumbs[] = ['Add to Cart', "products/add"];

    $product = new Product();
    $row = $product->where('product_id', $id);
    $cart = new Cart();
    
    $showQuantityExceededMessage = false;

    if (count($_POST) > 0) {
      $curQty = $row[0]->product_qty;
      $getID = $_SESSION['USER']->user_id;
      if($curQty >= $_POST['product_qty']){
        $cart->merge_exist($_POST);
        redirect('products/index');
      }else{
        $showQuantityExceededMessage = true;
      }
    }

    $this->view('products/add', [
      'crumbs'=>$crumbs,
      'row'=>$row,
      'showQuantityExceededMessage' => $showQuantityExceededMessage
    ]);
  }

  public function reserve($id = null){
    if(!Auth::logged_in()){
      redirect('login');
    }

    $crumbs[] = ['Home', "/"];
    $crumbs[] = ['Products', "products/index"];
    $crumbs[] = ['Reserve Item', "products/reserve"];

    $product = new Product();
    $row = $product->where('product_id', $id);
    $reserve = new Reserve();

    $showQuantityExceededMessage = false;

    if (count($_POST) > 0) {
      $curQty = $row[0]->product_qty;
      $getID = $_SESSION['USER']->user_id;
      if($curQty >= $_POST['product_qty']){
        $reserve->productRes($_POST);
        redirect('products/index');
      }else{
        $showQuantityExceededMessage = true;
      }
    }
    
    $this->view('products/reserve', [
      'crumbs'=>$crumbs,
      'row'=>$row,
      'showQuantityExceededMessage' => $showQuantityExceededMessage
    ]);
  }

  public function select(){
    if(!Auth::logged_in()){
      redirect('login');
    }

    $crumbs[] = ['Home', "/"];
    $crumbs[] = ['Modify Products', "products/select"];

    $product = new Product();
    $row = $product->findAll();

    if(Auth::access('Admin')){
      $this->view('products/select', [
        'crumbs'=>$crumbs,
        'gets'=>$row
      ]);
    }else{
      $this->view('access-denied');
    }
  }

  public function create(){
    if(!Auth::logged_in()){
      redirect('login');
    }

    $errors = [];
    $product = new Product();


    $crumbs[] = ['Home', "/"];
    $crumbs[] = ['Modify Products', "products/select"];
    $crumbs[] = ['Create Products', "products/create"];

    if(Auth::access('Admin')){
      if (count($_POST) > 0) {
        if ($product->validate_product($_POST)) {
          if (count($_FILES) > 0) {

          $allowed[] = 'image/png';
          $allowed[] = 'image/jpeg';

          if ($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed)) {

            $folder = 'assets/images/';
            if (!file_exists($folder)) {
              mkdir($folder, 0777, true);
            }
            $destination = $folder . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            $_POST['image'] = $destination;
            }
          }

          if($product->check('product_name', $_POST['product_name'])){
            $arr['product_name'] = $_POST['product_name'];
            $row = $product->firstLike($arr);
            if($row){
              $sumQty = intval($row->product_qty) + intval($_POST['product_qty']);
              $product->updateExi('product_price', $_POST['product_price'], $_POST['product_name']);
              $product->updateExi('product_qty', $sumQty, $_POST['product_name']);
            }
          }else{
              $product->insert($_POST);
          }

          redirect('products/select');

        } else {
          $errors = $product->errors;
        }
      }
    }

    if(Auth::access('Admin')){
      $this->view('products/create', [
        'crumbs'=>$crumbs,
        'errors' => $errors
      ]);
    }else{
      $this->view('access-denied');
    }
  }

  public function edit($id = null){
    if(!Auth::logged_in()){
      redirect('login');
    }

    $errors = [];
    $product = new Product();

    $row = $product->where('product_id', $id);

    
    $crumbs[] = ['Home', "/"];
    $crumbs[] = ['Modify Products', "products/select"];
    $crumbs[] = ['Edit Products', "products/edit"];

    if(Auth::access('Admin')){
      if (count($_POST) > 0) {
        if ($product->validate_product($_POST)) {
          if (count($_FILES) > 0) {


          $allowed[] = 'image/png';
          $allowed[] = 'image/jpeg';

          if ($_FILES['image']['error'] == 0 && in_array($_FILES['image']['type'], $allowed)) {

            $folder = 'assets/images/';
            if (!file_exists($folder)) {
              mkdir($folder, 0777, true);
            }
            $destination = $folder . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            $_POST['image'] = $destination;
            }
          }

          
          $product->update($id, $_POST, 'product_id');

          redirect('products/select');

        } else {
          $errors = $product->errors;
        }
      }
    }

    if(Auth::access('Admin')){
      $this->view('products/edit', [
        'row'=>$row,
        'crumbs'=>$crumbs,
        'errors' => $errors
      ]);
    }else{
      $this->view('access-denied');
    }
  }

  public function delete($id = null){
    if(!Auth::logged_in()){
      redirect('login');
    }

    $errors = [];
    $product = new Product();

    $row = $product->where('product_id', $id);

    
    $crumbs[] = ['Home', "/"];
    $crumbs[] = ['Modify Products', "products/select"];
    $crumbs[] = ['Delete Products', "products/delete"];

    if(Auth::access('Admin')){
      if (count($_POST) > 0) {
        
        $product->delete($id, 'product_id');
        redirect('products/select');
      }
    }

    if(Auth::access('Admin')){
      $this->view('products/delete', [
        'row'=>$row,
        'crumbs'=>$crumbs
      ]);
    }else{
      $this->view('access-denied');
    }
  }

  
}