<?php 
  include 'showphperror.php';
  $name=$mail=$comment=$nameErr=$mailErr=$commentErr='';
  $SeeError=0;
  function format($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
      }
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])){
          $nameErr="* The name field is required";
          $SeeError=1;
        }
    else{
          $name=format($_POST["name"]);
          if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
              $nameErr = "Entered name is not a valid name";
              $SeeError=1;
            }
        }

        if(empty($_POST["mail"])){
          $mailErr="* The mail field is necessery";
          $SeeError=1;
        }
        else{
          $mail=format($_POST["mail"]);
          if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
              $mailErr = "Email provided is not a valid Email"; 
              $SeeError=1;
          }
        }

      if (empty($_POST["comment"])) {
          $commentErr="* The Comment field must not remain empty";
          $SeeError=1;
        }  
      else{
        $comment=format($_POST["comment"]);
      }  

      $dbhost="localhost";
      $dbuser="guest";
      $dbpass="guest123";
      $dbname="FirstDatabse";
      $conn= new mysqli($dbhost,$dbuser,$dbpass,$dbname);
      if($conn->connect_error){
        die("Sorry could not be connected to the database  ".$conn->connect_error );
      }
      else{
        $date=date("Y-m-d H:i:s");
        $sql="INSERT INTO comments(Date,Name,Email,Comments) VALUES('$date','$name','$mail','$comment')";
        $result = $conn->query($sql);
        if (!$result) {
          die("Couldnot Enter The data in the databse exitting  :  *  ".$conn->error);
        }
        echo "<script>alert(\"Data Entered Successfully.... THANKYOU\")</script>";
      }

  }
 ?>

<html>
  <head>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div class="myform">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <fieldset>
      <legend><span class="number">#</span> COMMENT PAGE </legend>
      NAME :<p class="error"> <span class="error"><?php echo $nameErr; ?></span></p>
      <input type="text" name="name" placeholder="NAME *" required>

      E-MAIL:<p class="error"> <span class="error"><?php echo $mailErr; ?></span></p>
      <input type="email" name="mail" placeholder="EMAIL **" required>
      
      COMMENT :<p class="error"> <span class="error"><?php echo $commentErr; ?></span></p>
      <textarea name="comment" placeholder="COMMENTS **" rows="8"  required=""></textarea>

      <input type="submit" value="SUBMIT">
      <input type="reset" value="RESET">
      <div class="cleardiv"></div>
      </fieldset>
    </form>
    </div>
  </body>
</html>