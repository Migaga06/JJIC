<?php include"partials/header.php"?>
<div class="container d-flex justify-content-center">
<form method= "POST" class="mt-5 w-50">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Firstname</label>
    <input name="firstname" type="text" class="form-control" placeholder="Firstname" style="border-radius: 50px;">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Lastname</label>
    <input  name="lastname" type="text" class="form-control"  placeholder="Lastname" style="border-radius: 50px;">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email Address</label>
    <input  name="email" type="email" class="form-control"  placeholder="Email Address" style="border-radius: 50px;">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input  name="password" type="password" class="form-control"  placeholder="Password" style="border-radius: 50px;">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Show</label>
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php include"partials/footer.php"?>