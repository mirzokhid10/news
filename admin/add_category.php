<?php 
  include "header.php";
  include "../db_helper.php";

  if (isset($_POST['car_add'])) {
    $title = $_POST['title'];
    addCategory($title);
    header("Location: /admin/category.php");exit;
  }
?>

<div class='container'>
  <div class='row'>
    <form method="post">
      <div class="mb-3">
        <label for="category_name_input" class="form-label">Category name</label>
        <input type="text" class="form-control" id="category_name" name="title">
        <div class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <button type="submit" name="car_add" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>