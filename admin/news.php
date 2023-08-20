<?php include "header.php"; 
include "../db_helper.php";

if(isset($_GET["page"])) {
  $page = $_GET["page"];
}else {
  $page = 1;
}
?>

<div class="container">
  <a href="/admin/add_post.php" class="btn btn-success">Qo'shish</a>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">title</th>
        <th scope="col">category</th>
        <th scope="col">content</th>
        <th scope="col">author</th>
        <th scope="col">visited_count</th>
        <th scope="col">created_at</th>
      </tr>
    </thead>
  
    <tbody>
      <?php foreach (getPostList($page) as $item) { 
        echo "<tr>";
        echo "<td>" . $item['id'] . "</td>";
        echo "<td>" . $item['title'] . "</td>";
        echo "<td>" . $item['category'] . "</td>";
        echo "<td>" . $item['content'] . "</td>";
        echo "<td>" . $item['author'] . "</td>";
        echo "<td>" . $item['visited_count'] . "</td>";
        echo "<td>" . $item['created_at'] . "</td>";
        echo "<td>
          <a href='/admin/update_category.php?id=".$item['id']."' class='btn btn-primary'>Tahrirlash</a>
          <a href='/admin/delete_category.php?id=".$item['id']."' class='btn btn-danger'>O'chirish</a>";
        echo "</td>";
        echo "</tr>";
      }
        ?>
    </tbody>
  </table>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
      <?php for ($page=1; $page<=getPagination(LIMIT); $page++) { ?>
        <li class="page-item">
          <a class="page-link" href="/admin/category.php?page=<?=$page?>">
            <?=$page?>
          </a>
        </li>
      <?php } ?>
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>
</div>

<?php include "footer.php"; ?>

