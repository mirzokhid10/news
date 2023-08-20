<?php 
  include "header.php";
  include "../db_helper.php";

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $category_row = getCategoryById($id);  
  }



  if (isset($_POST['car_update'])) {
    $title = $_POST['title'];
    updateCategory($id, $title);
    header("Location: /admin/category.php");exit;
  }
?>

<div class='container'>
  <div class='row'>
    <form method="post">
      <div class="mb-3">
        <label for="category_name_input" class="form-label">Category name</label>
        <input type="text" class="form-control" id="category_name" value="<?= $category_row['title']; ?>" name="title">
        <div class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <button type="submit" name="car_update" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>