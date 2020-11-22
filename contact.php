<!DOCTYPE html>
<HTML>
    <head>
        <meta charset="utf-8">
        <title>Contact</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/contact-style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
<body>
<?php
    $nameErr = $emailErr = $msgErr = "";
    $name =  $email = $msg = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
        $nameErr = "Name cannot be empty!";
      } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters are allowed";
        }
      }
      
      if (empty($_POST["email"])) {
        $emailErr = "Email cannot be empty!";
      } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
    
      if (empty($_POST["message"])) {
        $msgErr = "Messgae cannot be empty!";
      } else {
          if (str_word_count($_POST["message"]) >= 2 && str_word_count($_POST["message"]) <= 500){
              $messgae = test_input($_POST["message"]);
          } else {
              $msgErr = "Message should be between 2 to 500 words only!";
          }
      }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?> 
    <div class="navbar" id="topnav">
        <a href="home.html" class="active">Home</a>  
    </div>
    <div class="body-container rounded-corners container">
        <form action="" method="post" id="contactform">
            <div class="title rounded-corners white-background">
                <h1>Contact</h1>
            </div>
            <div class="container gray-background rounded-corners">
                <div class="name">
                    <input type="text" value="Name" onfocus="this.value=''" name="name">
                    <span class="error"><?php echo $nameErr;?></span>
                </div>
                <div class="email">
                    <input type="text" value="Email" onfocus="this.value=''" name="email">
                    <span class="error"><?php echo $emailErr;?></span>
                </div>
                <div class="message">
                    <input type="text" value="Message" onfocus="this.value=''" name="message">
                    <span class="error"><?php echo $msgErr;?></span>
                </div>
                <div class="submit_message">
                    <button type="submit" name="submit" form="contactform">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</body>
</HTML>
