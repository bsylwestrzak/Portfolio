<?php
  require_once('webmail/helpers.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box;}
        
        input[type=text], select, textarea {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          box-sizing: border-box;
          margin-top: 6px;
          margin-bottom: 16px;
          resize: vertical;
        }
        
        input[type=submit] {
          background-color: #4CAF50;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }
        
        input[type=submit]:hover {
          background-color: #45a049;
        }
        
        .container {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
        </style>
</head>
<body>
    

    <div class="container">
        <form action="webmail/index.php" method="POST">

          <?php mailSucceed('<div class="success">Dziękujemy za kontakt. Postaramy się niezwłocznie odpowiedzieć na wysłaną wiadomość.</div>'); ?>
          <?php hasError('firstname', '<div class="error">&#9888; Podane nazwisko musi mieć od 3 do 40 znaków!</div>'); ?>
          <label for="fname">First Name</label>
          <input value="<?php previousVal('firstname'); ?>" type="text" id="fname" name="firstname" placeholder="Your name..">
      
          <?php hasError('lastname', '<div class="error">&#9888; Podane nazwisko musi mieć od 3 do 40 znaków!</div>'); ?>
          <label for="lname">Last Name</label>
          <input value="<?php previousVal('lastname'); ?>" type="text" id="lname" name="lastname" placeholder="Your last name..">
      
          <?php hasError('email', '<div class="error">&#9888; Podany email jest wadliwy!</div>'); ?>
          <label for="lname">Your email</label>
          <input value="<?php previousVal('email'); ?>" type="text" id="email" name="email" placeholder="Your email..">
      
          <?php hasError('content', '<div class="error">&#9888; Wiadomość musi się mieścić od 20 do 500 znaków!</div>'); ?>
          <label for="subject">Subject</label>
          <textarea id="subject" name="content" placeholder="Write something.." style="height:200px"><?php previousVal('content'); ?></textarea>
      
          <input type="submit" value="Submit">
        </form>
      </div>

</body>
</html>