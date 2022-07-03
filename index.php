
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comment System</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <?php include './inc/header.php'; ?>

    <?php
      # FORM VALIDATION

      $name = $email = $comment = "";
      $nameErr = $emailErr = $commentErr = "";

      if($_SERVER['REQUEST_METHOD'] == "POST"){

        // check name
        if(empty($_POST['name']))
          $nameErr = "Name is required";
        else{
          $name = test_input($_POST['name']);
          // check if name only contains letters and whitespace
          if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
          }
        }

        // check email
        if(empty($_POST['email']))
          $emailErr = "Email is required";
        else{
          $email = test_input($_POST['email']);
          // check if email is in valid format
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invalid email";
          }
        }

        // check comment
        if(empty($_POST['comment']))
          $commentErr = "Comment is required";
        else{
          $comment = test_input($_POST['comment']);
          if(!filter_var($comment, FILTER_SANITIZE_STRING)){
            $commentErr = "Invalid comment";
          }
        }

        # INSERT TO DATABASE
        if(empty($nameErr) && empty($emailErr) && empty($commentErr)){
          $sql = "INSERT INTO `Comments` (`Name`, `Email`, `Comment`) VALUES ('$name', '$email', '$comment')";
          if($conn->query($sql)){ // on success
            header('Location: comment.php');
            echo "Comment added successfully";
          } else {
            echo "<div style='padding: 20px; background-color: rgb(255, 60, 46); text-align: center; color: white; font-weight: 600;'>Error inserting data</div>";
          }
        }

      }

      // function for sanitizing input
      function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    ?>

    <!-- 
      - main
        - headinng text
        - form
          - 3 input + submit btn
     -->
    <section class="main">

      <h1 class="heading">Add your comment</h1>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>">
        <span class="error">
          <?php echo $nameErr; ?>
        </span>

        <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>">
        <span class="error">
          <?php echo $emailErr; ?>
        </span>

        <textarea name="comment" id="comment" cols="30" rows="10" style="resize: none;" placeholder="Comment"><?php echo $comment; ?></textarea>
        <span class="error">
          <?php echo $commentErr; ?>
        </span>

        <input type="submit" value="SUBMIT">
      </form>
    </section>

    <?php include './inc/footer.php'; ?>
  </body>
</html>
