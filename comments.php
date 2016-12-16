<html>
  <head>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div class="myform">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <fieldset>
      <legend><span class="number">#</span> COMMENT PAGE </legend>
      NAME :
      <input type="text" name="user" placeholder="NAME *" required>

      E-MAIL:
      <input type="email" name="email" placeholder="EMAIL* *"required>
      
      COMMENT :
      <textarea name="comment" placeholder="COMMENTS**" rows="8"></textarea>

      <input type="submit" value="SUBMIT">
      <input type="reset" value="RESET">
      <div class="cleardiv"></div>
      </fieldset>
    </form>
    </div>
  </body>
</html>