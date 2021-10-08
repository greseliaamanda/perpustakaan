<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
  <body>
    <div id="content" class="p-4 p-md-5 pt-5">
      <br><br><br><br><br><br><br><br>
        <!--alert-->
        <div class="alert alert-dark" role="alert">
          <h4 class="alert-heading">Login Successfully!</h4>
          <p>Welcome to Ruang Baca by greselia, <?php echo$_SESSION['sesi']; ?>!</p>
          <hr>
          <p class="mb-0">Hope you enjoyed.</p>
        </div>
    </div>
  </body>
</html>