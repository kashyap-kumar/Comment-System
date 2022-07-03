<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comment System - About</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php include './inc/header.php'; ?>

    <section class="main">
      <h1 class="heading">About</h1>
      <div class="about">
        A project similar to a comment section or feedbacks on webapps or websites. 
        This project is developed on linux using HTML, CSS, PHP and MySQL in June, 2022 and is my first fullstack mini project.
        The form validates input data before submitting it. 
        On submitting the data, a page opens up where previous comments are displayed along with the new one.
        Pagination facility has also been added.
      </div>
    </section>

    <?php include './inc/footer.php'; ?>
  </body>
</html>
