<?php
include "constants.php";
function getCategoryList($page) {
  include "dbconnector.php";
  $offset = ($page - 1) * LIMIT;
  $sql = "SELECT * FROM category limit :offset, :limit";
  $state = $conn -> prepare($sql);
  $state -> bindValue(":limit", LIMIT, PDO::PARAM_INT);
  $state -> bindValue(":offset", $offset, PDO::PARAM_INT);
  $state ->execute();
  $result = $state ->fetchAll(PDO::FETCH_ASSOC);
  return $result;
}

function addCategory($title) {
  include "dbconnector.php";
  $sql_insert = "INSERT INTO category (title) values(:title)";
  $state = $conn ->prepare($sql_insert);
  $state -> bindValue(':title', $title);
  $state -> execute();
}

function getPagination($limit,$tableName) {
  include "dbconnector.php";
  $sql = "select * from ".$tableName;
  $state = $conn ->prepare($sql);
  $state -> execute();
  $total_rows = $state->rowCount();
  return ceil($total_rows/LIMIT);
}

function getCategoryById($id) {
  include "dbconnector.php";
  $sql = "select * from category where id= :id";
  $state = $conn ->prepare($sql);
  $state -> bindValue(':id', $id, PDO::PARAM_INT);
  $state -> execute();
  return $state -> fetch(PDO::FETCH_ASSOC);
}

function  updateCategory($id, $title) {
  include "dbconnector.php";
  $sql = "update category set title = :title where id= :id";
  $state = $conn ->prepare($sql);
  $state -> bindValue(':id', $id, PDO::PARAM_INT);
  $state -> bindValue(':title', $title );
  $state -> execute();
}

function deleteCategory($id) {
  include "dbconnector.php";
  $sql = "delete from category where id= :id";
  $state = $conn ->prepare($sql);
  $state -> bindValue(':id', $id, PDO::PARAM_INT);
  $state -> execute();
}

// ------------- post ----------------

function getPostList($page) {

}