<?php

class Model extends Database
{
  public $errors = [];

  public function __construct()
  {
    if (!property_exists($this, 'table')) {

      $this->table = strtolower($this::class) . 's';
    }
  }

  public function findAll()
  {
    $query = "select * from $this->table";
    $result = $this->query($query);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }

      return $data;
    }
    return false;
  }

  public function findAllEqual()
  {
    $query = "select * from $this->table WHERE product_qty != 0";
    $result = $this->query($query);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }

      return $data;
    }
    return false;
  }

  public function where($column, $value)
  {
    $column = addslashes($column);
    $query = "select * from $this->table where $column = :value";
    $data  = $this->query($query, [
      'value' => $value
    ]);

    if(is_array($data)){
      if (property_exists($this, 'afterSelect')) {

        foreach($this->afterSelect as $func){
          $data = $this->$func($data);
        }
      }
    }

    return $data;
  }

  public function whereMultiple($conditions)
  {
      // Extract column names from the conditions array
      $keys = array_keys($conditions);

      // Initialize the SQL query string with the SELECT statement and the table name
      $query = "SELECT * FROM $this->table WHERE ";

      // Construct the query by iterating over each condition
      foreach ($keys as $key) {
          // Append column name and placeholder for parameter binding
          $query .= "$key = :$key AND ";
      }

      // Remove the trailing "AND" from the query string
      $query = rtrim($query, "AND ");

      // Execute the constructed SQL query and bind parameters
      $result = $this->query($query, $conditions);

      // Return the result of the query execution
      return $result;
  }


  public function first($data, $data_not = [])
  {
    $keys = array_keys($data);
    $keys_not = array_keys($data_not);

    $query = "select * from $this->table where ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . " && ";
    }

    foreach ($keys_not as $key) {
      $query .= $key . " != :" . $key . " && ";
    }

    $query = trim($query, " && ");

    $data = array_merge($data, $data_not);
    $result = $this->query($query, $data);

    if ($result) {
      return $result[0];
    }
    return false;
  }

  public function firstLike($data, $data_not = [])
  {
      $keys = array_keys($data);
      $keys_not = array_keys($data_not);

      $query = "SELECT * FROM $this->table WHERE ";

      foreach ($keys as $key) {
          $query .= "$key LIKE :$key OR ";
      }

      foreach ($keys_not as $key) {
          $query .= "$key NOT LIKE :$key AND ";
      }

      $query = rtrim($query, " OR ");
      $query = rtrim($query, " AND ");

      $data = array_merge($data, $data_not);

      // Add '%' around the values to search for partial matches
      foreach ($data as &$value) {
          $value = '%' . $value . '%';
      }

      $result = $this->query($query, $data);

      if ($result) {
          return $result[0];
      }
      return false;
  }

  public function insert($data)
  {
    //remove unwanted to edit
    if (property_exists($this, 'allowedColumns')) {
      foreach($data as $key => $column){
        if(!in_array($key, $this->allowedColumns)){
          unset($data[$key]);
        }
      }
    }
    if (property_exists($this, 'beforeInsert')) {

      foreach($this->beforeInsert as $func){
        $data = $this->$func($data);
      }
    }

    $columns = implode(', ', array_keys($data));
    $values = implode(', :', array_keys($data));
    $query = "insert into $this->table ($columns) values (:$values)";

    $this->query($query, $data);

    return false;
  }

  public function update($id, $data, $column = 'id')
  {
    $keys = array_keys($data);
    $query = "update $this->table set ";

    foreach ($keys as $key) {
      $query .= $key . " = :" . $key . ", ";
    }

    $query = trim($query, ", ");

    $query .= " where $column = :$column";

    $data[$column] = $id;
    $this->query($query, $data);

    return false;
  }

  public function delete($id, $column = 'id')
  {
    $data[$column] = $id;
    $query = "delete from $this->table where $column = :$column";

    $this->query($query, $data);

    return false;
  }

  public function check($column, $value)
  {
    $column = addslashes($column);
    $query = "SELECT * FROM $this->table WHERE $column LIKE :value";
    return $this->query($query, [
        'value' => '%' . $value . '%'
    ]);
  }

  public function updateExi($column, $value, $whereVal){
    $column = addslashes($column);
    $query = "update $this->table set $column = :value where product_name LIKE :whereVal";

    return $this->query($query, [
      'value'=>$value,
      'whereVal'=> '%' . $whereVal . '%'
    ]);
  }

  public function updateQty($column, $value, $whereVal){
    $column = addslashes($column);
    $query = "update $this->table set $column = :value where product_id = :whereVal";

    return $this->query($query, [
      'value'=>$value,
      'whereVal'=>$whereVal
    ]);
  }

  public function insertResFromCarts($data, $qty, $price) {
    $column = addslashes("cart_id");
    $query = "INSERT INTO $this->table (user_id, product_name, product_price, product_description, product_qty, product_type, image, product_id, reserve_id, reserve_date, reserve_status, confirm_due)
              SELECT user_id, product_name, :price, product_description, :qty, product_type, image, product_id, :reserve_id, :reserve_date, :reserve_status, :confirm_due
              FROM carts WHERE $column = :id";

    $reserve_id = random_string(60);
    $reserve_date = date("Y-m-d H:i:s");
    $confirm_due = date("Y-m-d H:i:s");
    $reserve_status = "Not Confirm";

    $this->query($query, [
      'reserve_id' => $reserve_id,
      'reserve_date' => $reserve_date,
      'reserve_status' => $reserve_status,
      'confirm_due' => $confirm_due,
      'qty'=>$qty,
      'id'=>$data,
      'price'=>$price
    ]);
  }

  public function updateWhereDouble($product_id, $user_id, $data)
  {
      $keys = array_keys($data);
      $query = "UPDATE $this->table SET ";

      foreach ($keys as $key) {
          $query .= "$key = :$key, ";
      }

      $query = rtrim($query, ", ");

      $query .= " WHERE product_id = :product_id AND user_id = :user_id";

      $data['product_id'] = $product_id;
      $data['user_id'] = $user_id;

      $this->query($query, $data);

      return false;
  }

  public function deleteCart($ids){
    $query = "DELETE FROM $this->table WHERE cart_id = :ids";

    $this->query($query, [
      'ids'=>$ids
    ]);
  }

  public function viewReserve(){
    $query= "SELECT u.firstname, u.lastname, u.email, u.user_image, r.*
             FROM $this->table r JOIN users u
             ON r.user_id = u.user_id AND r.reserve_status = 'Not Confirm'";

    $result = $this->query($query);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }

      return $data;
    }
    return false;
  }

  public function viewConfirmReserve(){
    $query= "SELECT u.firstname, u.lastname, u.email, u.user_image, r.*
             FROM $this->table r JOIN users u
             ON r.user_id = u.user_id AND r.reserve_status = 'Confirm'";

    $result = $this->query($query);

    if ($result) {

      $data = $result;

      // Get the current date and time
      $now = new DateTime();

      // Loop through each result to check the confirm_due date
      foreach ($data as &$reservation) {
          // Assuming confirm_due is a datetime string, convert it to DateTime object
          $confirm_due = new DateTime($reservation->confirm_due);

          if ($confirm_due < $now) {
              // Perform the action for overdue reservations
              $reservation->reserve_status = 'Overdue';

              // Optionally increment the violation count in the result array (if needed)
              $user_id = $reservation->user_id;

              // Update the reserve_status and increment violation_count in the database
              $updateQuery = "UPDATE $this->table r
                              JOIN users u ON r.user_id = u.user_id
                              SET
                                  r.reserve_status = 'Overdue',
                                  u.violation_count = u.violation_count + 1
                              WHERE
                                  r.reserve_id = :reserve_id";

              $this->query($updateQuery, ['reserve_id' => $reservation->reserve_id]);
          }
      }

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }

      return $data;
    }
    return false;
  }

  public function cancelReserve($res_ids){
    $query = "SELECT * FROM $this->table WHERE reserve_id = '$res_ids'";

    $result = $this->query($query);
    $getQty = $result[0]->product_qty;
    $prodID = $result[0]->product_id;


    $query = "SELECT * FROM products WHERE product_id = :prod_id";
    $res = $this->query($query, [
      'prod_id'=>$prodID
    ]);

    $getQty = $getQty + $res[0]->product_qty;
    //showD($getQty);

    $query = "UPDATE products SET product_qty = :qty WHERE product_id = :product_id";
    $this->query($query, [
      'qty'=>$getQty,
      'product_id'=>$prodID
    ]);

    $query = "DELETE FROM $this->table WHERE reserve_id = '$res_ids'";
    $this->query($query);
  }

  public function mergeReserve($res_ids){
    $placeholders = "'" . implode("','", array_map('addslashes', $res_ids)) . "'";
    $query = "SELECT
                  user_id,
                  product_id,
                  product_name,
                  product_description,
                  product_type,
                  image,
                  reserve_date,
                  reserve_status,
                  SUM(product_qty) AS total_qty,
                  SUM(product_price) AS total_price,
                  GROUP_CONCAT(reserve_id ORDER BY reserve_id) AS merged_reserve_ids
              FROM
                  $this->table
              WHERE
                  reserve_id IN ($placeholders)
              GROUP BY
                  user_id, product_id";

    $result = $this->query($query);


    if (!empty($result) && count($result) == 1) {
      //showD($result);
      $user_id = $result[0]->user_id;
      $product_id = $result[0]->product_id;
      $product_name = $result[0]->product_name;
      $product_description = $result[0]->product_description;
      $product_type = $result[0]->product_type;
      $image = $result[0]->image;
      $reserve_date = $result[0]->reserve_date;
      $reserve_status = $result[0]->reserve_status;
      $total_qty = $result[0]->total_qty;
      $total_price = $result[0]->total_price;
      $merged_reserve_ids = random_string(60);

      $query1 = "INSERT INTO $this->table
                    (user_id, product_id, product_name, product_description, product_type, image, reserve_date, reserve_status, product_qty, product_price, reserve_id)
                   VALUES
                    (:user_id, :product_id, :product_name, :product_description, :product_type, :image, :reserve_date, :reserve_status, :total_qty, :total_price, :new_id)";

      $this->query($query1, [
        'user_id' => $user_id,
        'product_id' => $product_id,
        'product_name' => $product_name,
        'product_description' => $product_description,
        'product_type' => $product_type,
        'image' => $image,
        'reserve_date' => $reserve_date,
        'reserve_status' => $reserve_status,
        'total_qty' => $total_qty,
        'total_price' => $total_price,
        'new_id' => $merged_reserve_ids
      ]);

      $query2 = "DELETE FROM $this->table WHERE reserve_id IN ($placeholders)";
      $this->query($query2);

      include(views_path("partials/pop-message-success-merge"));
      header("refresh:0.25;url=reservation");
    }
    else{
      include(views_path("partials/pop-message-fail-merge"));
      header("refresh:1;url=reservation");
    }
  }

  public function confirmRes($res_ids, $date){
    $query = "UPDATE $this->table SET confirm_due = '$date', reserve_status = 'Confirm' WHERE reserve_id = '$res_ids'";

    $this->query($query);
  }

  public function confirmRemoveRes($res_ids){
    $placeholders = "'" . implode("','", array_map('addslashes', $res_ids)) . "'";
    $query = "UPDATE $this->table SET reserve_status = 'Not Confirm' WHERE reserve_id IN ($placeholders)";

    $this->query($query);
  }

  public function doneRes($res_ids){
    $placeholders = "'" . implode("','", array_map('addslashes', $res_ids)) . "'";
    $query = "UPDATE $this->table SET reserve_status = 'Done' WHERE reserve_id IN ($placeholders)";

    $this->query($query);
  }

  public function viewOverdueReserve(){
    $query= "SELECT u.firstname, u.lastname, u.violation_count, u.email, u.user_image, r.*
             FROM $this->table r JOIN users u
             ON r.user_id = u.user_id AND r.reserve_status = 'Overdue' AND (u.user_status = 'Not Banned' OR u.user_status = 'Banned')";

    $result = $this->query($query);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }

      return $data;
    }
    return false;
  }

  public function viewDoneReserve(){
    $query= "SELECT u.firstname, u.lastname, u.email, u.user_image, r.*
             FROM $this->table r JOIN users u
             ON r.user_id = u.user_id AND r.reserve_status = 'Done'";

    $result = $this->query($query);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }

      return $data;
    }
    return false;
  }

  public function bannedUser($banId, $banTime){
    $query = "UPDATE $this->table SET banned_time = '$banTime', user_status = 'Banned' WHERE user_id = '$banId'";

    $this->query($query);
  }

  public function getBannedTime($userId)
  {
    // Assuming you're using a database connection represented by $db
    // Replace 'users' with your actual table name where user information is stored
    $query = "SELECT banned_time, user_status FROM $this->table WHERE id = :userId";
    $result = $this->query($query, [
      'userId' => $userId
    ]);

    // Check if the result is not empty before fetching the banned_time
    if ($result && count($result) > 0) {
        // Extract the banned_time from the first row of the result
        $bannedTime = $result[0]->banned_time;
        $userStatus = $result[0]->user_status;

        // Check if the banned_time is in the past
        if (strtotime($bannedTime) < time() && $userStatus === 'Banned') {
          // Update the user_status to 'Not Banned' and set banned_time to null
          $updateQuery = "UPDATE $this->table SET user_status = 'Not Banned', banned_time = NULL WHERE id = :userId";
          $this->query($updateQuery, ['userId' => $userId]);

          // Update the in-memory status
          $result[0]->user_status = 'Not Banned';
          $result[0]->banned_time = null;
        }

        return $bannedTime;
    } else {
        return null; // Return null if the query fails or no rows are returned
    }
  }

  public function removeOverdueReserve($res_ids){
    $query = "SELECT * FROM $this->table WHERE reserve_id = '$res_ids'";

    $result = $this->query($query);
    $getQty = $result[0]->product_qty;
    $prodID = $result[0]->product_id;


    $query = "SELECT * FROM products WHERE product_id = :prod_id";
    $res = $this->query($query, [
      'prod_id'=>$prodID
    ]);

    $getQty = $getQty + $res[0]->product_qty;
    //showD($getQty);

    $query = "UPDATE products SET product_qty = :qty WHERE product_id = :product_id";
    $this->query($query, [
      'qty'=>$getQty,
      'product_id'=>$prodID
    ]);

    $query = "DELETE FROM $this->table WHERE reserve_id = '$res_ids'";
    $this->query($query);
  }

  public function deleteDoneRes(){
    $query = "DELETE FROM $this->table WHERE reserve_status = 'Done'";
    $this->query($query);
    return false;
  }

  public function viewBannedUser(){
    $query = "SELECT * FROM $this->table WHERE user_status = 'Banned'";

    $result = $this->query($query);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }

      return $data;
    }
    return false;
  }

  public function viewNotBannedUser(){
    $query = "SELECT * FROM $this->table WHERE user_status = 'Not Banned'";

    $result = $this->query($query);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }

      return $data;
    }
    return false;
  }

  public function unbannedUser($id){
    $updateQuery = "UPDATE $this->table SET user_status = 'Not Banned', banned_time = NULL WHERE user_id = :userId";
    $this->query($updateQuery, ['userId' => $id]);
  }

  public function clearReserveId($id){
    $delQuery = "DELETE FROM $this->table WHERE reserve_id = '$id'";
    $this->query($delQuery);
  }

  public function insertAppointment($data){
    //remove unwanted to edit
    if (property_exists($this, 'allowedColumns')) {
      foreach($data as $key => $column){
        if(!in_array($key, $this->allowedColumns)){
          unset($data[$key]);
        }
      }
    }
    if (property_exists($this, 'beforeInsert')) {

      foreach($this->beforeInsert as $func){
        $data = $this->$func($data);
      }
    }
    $columns = implode(', ', array_keys($data));
    $values = implode(', :', array_keys($data));
    $query = "insert into $this->table ($columns) values (:$values)";
    $this->query($query, $data);

  }

  public function checkerAppointment($user_id){
    $checkQuery = "SELECT * FROM $this->table WHERE user_id = '$user_id'";
    $res = $this->query($checkQuery);
    if($res){

      $data = $res;
      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

        foreach($this->afterSelect as $func){
          $data = $this->$func($data);
          }
        }
      }
      return $data;

    }
    return false;
  }

  public function editAppoint($data){
    $id = $data['btnEdit'];

    $query = "UPDATE $this->table
              SET
              firstname = '".$data['firstname']."',
              lastname = '".$data['lastname']."',
              appoint_reason = '".$data['appoint_reason']."',
              appoint_date = '".$data['appoint_date']."',
              contact = '".$data['contact']."',
              email = '".$data['email']."',
              appoint_additional = '".$data['appoint_additional']."'
              WHERE appoint_id = '$id'";

    $this->query($query);
    return false;
  }

  public function viewAppoint(){
    $query= "SELECT * FROM $this->table WHERE appoint_status = 'Not Confirm'";

    $result = $this->query($query);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }

      return $data;
    }
    return false;
  }

  public function viewConfirmAppoint(){
    $query = "SELECT *
    FROM $this->table
    WHERE appoint_status = 'Confirm'";

    $result = $this->query($query);

    if ($result) {
    $data = $result;

    // Get the current date and time
    $now = new DateTime();

    // Loop through each result to check the confirm_due date
    foreach ($data as $appointments) {
      // Assuming appoint_date is a datetime string, convert it to DateTime object
      $appoint_date = new DateTime($appointments->appoint_date);

      if ($appoint_date < $now) {
          // Perform the action for overdue reservations
          $appointments->appoint_status = 'Overdue';

          // Update the reserve_status and increment violation_count in the database
          $updateQuery = "UPDATE $this->table a
                          JOIN users u ON a.user_id = u.user_id
                          SET
                              a.appoint_status = 'Overdue',
                              u.violation_count = u.violation_count + 1
                          WHERE
                              a.appoint_id = :appoint_id";

          $this->query($updateQuery, ['appoint_id' => $appointments->appoint_id]);
      }
    }

    // Apply any afterSelect processing if necessary
    if (is_array($data) && property_exists($this, 'afterSelect')) {
      foreach ($this->afterSelect as $func) {
          $data = $this->$func($data);
      }
    }

    return $data;
    }
    return false;
  }



  public function viewOverdueAppoint(){
    $query= "SELECT u.firstname, u.lastname, u.violation_count, u.email, u.user_image, a.*
             FROM $this->table a JOIN users u
             ON a.user_id = u.user_id AND a.appoint_status = 'Overdue' AND (u.user_status = 'Not Banned' OR u.user_status = 'Banned')";

    $result = $this->query($query);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }

      return $data;
    }
    return false;
  }

  public function viewDoneAppoint(){
    $query= "SELECT u.firstname, u.lastname, u.email, u.user_image, a.*
             FROM $this->table a JOIN users u
             ON a.user_id = u.user_id AND a.appoint_status = 'Done'";

    $result = $this->query($query);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }

      return $data;
    }
    return false;
  }

  public function confirmAppoint($id){
    $query = "UPDATE $this->table SET appoint_status = 'Confirm' WHERE appoint_id = '$id'";
    $this->query($query);
  }

  public function cancelAppoint($res_ids){
    $query = "DELETE FROM $this->table WHERE appoint_id = '$res_ids'";
    $this->query($query);
  }

  public function confirmRemoveAppoint($id){
    $query = "UPDATE $this->table SET appoint_status = 'Not Confirm' WHERE appoint_id = '$id'";
    $this->query($query);
  }

  public function doneAppoint($id){
    $query = "UPDATE $this->table SET appoint_status = 'Done' WHERE appoint_id = '$id'";
    $this->query($query);
  }

  public function removeOverdueAppoint($id){
    $query = "DELETE FROM $this->table WHERE appoint_id = '$id'";
    $this->query($query);
  }

  public function deleteDoneAppoint(){
    $query = "DELETE FROM $this->table WHERE appoint_status = 'Done'";
    $this->query($query);
    return false;
  }

  public function loadPost(){

    $postQuery = "SELECT p.*, u.firstname, u.lastname, u.user_image, COUNT(l.like_id) AS like_count
                  FROM $this->table p
                  JOIN users u ON p.user_id = u.user_id
                  LEFT JOIN likes l ON p.post_id = l.post_id
                  GROUP BY p.post_id
                  ORDER BY p.created_at DESC";
    $result = $this->query($postQuery);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {

          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }
      return $data;
    }
    return false;

  }

  public function loadPinnedPost(){
    $pinnedPostQuery = "SELECT p.*, u.firstname, u.lastname, u.user_image, COUNT(l.like_id) AS like_count
        FROM $this->table p
        JOIN users u ON p.user_id = u.user_id
        LEFT JOIN likes l ON p.post_id = l.post_id
        WHERE p.is_pinned = 'Pinned'
        GROUP BY p.post_id
        ORDER BY p.created_at DESC";
    $result = $this->query($pinnedPostQuery);

    if ($result) {
      $data = $result;

      if(is_array($data)){
        if (property_exists($this, 'afterSelect')) {
          foreach($this->afterSelect as $func){
            $data = $this->$func($data);
          }
        }
      }
      return $data;
    }
    return false;
  }
}