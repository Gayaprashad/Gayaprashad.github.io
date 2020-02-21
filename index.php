<?php
  $msg ='';
  $msgClass = '';
  if (filter_has_var(INPUT_POST,'submit')){
    $name = htmlspecialchars($_POST['name']);
    $email =htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($name) && !empty($email) && !empty($message)){
      if (filter_var($email,FILTER_VALIDATE_EMAIL)){
        $m1='gayaprashad.s@gmail.com';
        $s='Request help';
        $msg1= "This is the information of the client <br> <h1>name</h1><br>".$name."<h1>email:</h1><br>".$email."<h1>message:</h1>".$message;
        mail($m1,$s,$msg1);
        echo "message sent";
      }
      else{
        $msg ='Invalid email';
        $msgClass ='alert-danger';
      }
    }else{
      $msg ='Enter data in all the fields';
      $msgClass ='alert-danger';
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>My website</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/sketchy/bootstrap.min.css">
  </head>
  <body>
    <nav class= "navbar navbar-default">
      <div class="navbar-header">
        <a class= "navbar-brand">Mywebsite</a>
      </div>
    </nav>
    <?php if($msg != ''):?>
      <div class="alert <?php echo $msgClass?>">
        <?php echo $msg;?>
      </div>
    <?php endif;?>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <div class="form-group">
        <label >Name:</label>
        <input type="text" class="form-control" name="name" value="<?php echo isset($_POST['name'])? $_POST['name'] : '' ;?>" >
      </div>
      <div class="form-group">
        <label>Email:</label>
        <input type="text" class="form-control" name="email" value="<?php echo isset($_POST['email'])? $_POST['email'] : '' ;?>">
      </div>
      <div class="form-group">
        <label >Message:</label>
        <input type="text" class="form-control" name="message" value="<?php echo isset($_POST['message'])? $_POST['message'] : '' ;?>">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary" name="submit" >
      </div>
    </form>
  </body>
</html>
