<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comment System - Comments</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php include './inc/header.php'; ?>

    <?php
      $sql = "SELECT `Name`, `Comment`, `Time` FROM `Comments`";
      $result = $conn->query($sql);

      # PAGINATION
      $total_records = $result->num_rows;
      $records_per_page = 3;
      $total_pages = ceil($total_records/$records_per_page);

      // determining which page number the visitor is on 
      if(!isset($_GET['page']))
        $page = 1;
      else
        $page = $_GET['page'];
      
      // determining the sql LIMIT starting number
      $page_first_record = ($page - 1) * $records_per_page;

      $sql = $sql . " LIMIT " . $page_first_record . ", " . $records_per_page;
      $result = $conn->query($sql);
      
    ?>

    <!-- 
      - main
        - heading text
        - Multiple comment element
     -->
    <section class="main">
      
      <h1 class="heading">Previous comments</h1>

      <!-- no comment -->
      <?php if($result->num_rows == 0): ?>
        <p class="comment">No comment available</p>
      <?php endif; ?>

      <!-- show comments -->
      <?php while($comment = $result->fetch_assoc()): ?>
        <div class="comment">
          <p><?php echo $comment['Comment']; ?></p>
          <span>- <?php echo $comment['Name']; ?> on <?php echo date("y/m/d", strtotime($comment['Time'])) ?></span>
        </div>
      <?php endwhile; ?>

      <!-- pagination links -->
      <?php
        echo "<div class='pagination_btn'>";
          // prev page or last page
          if($page > 1){
            echo "<a href='comment.php?page=".($page-1)."'>PREV PAGE</a>";
          } else{
            echo "<a href='comment.php?page=".($total_pages)."'>LAST PAGE</a>";
          }
          // next page or first page
          if($page > $total_pages){
            echo "<a href='comment.php?page=1'>FIRST PAGE</a>";
          } else{
            echo "<a href='comment.php?page=".($page+1)."'>NEXT PAGE</a>";
          }
        echo "</div>";
      ?>

    </section>

    <?php include './inc/footer.php'; ?>
  </body>
</html>
