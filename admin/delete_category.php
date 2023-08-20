<?php 
  include "header.php";
  include "../db_helper.php";

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $category_row = getCategoryById($id);
    if(isset($_GET['confirm']) && $_GET['confirm'] === "yes") {
      deleteCategory($id);
      header("Location: /admin/category.php");
    } else if(isset($_GET['confirm']) && $_GET['confirm'] === "no") {
      header("Location: /admin/category.php");
    }
  }

  echo "Rostan ochirmoqchimisizmi?";?>

  <a href="/admin/delete_category.php?id=<?=$id?>&confirm=yes" class="btn btn-danger">Ha</a>
  <a href="/admin/delete_category.php?id=<?=$id?>&confirm=no" class="btn btn-primary">Yo'q</a>