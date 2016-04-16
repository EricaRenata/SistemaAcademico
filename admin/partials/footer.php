    </div>
  </div>
  </body>
  <script src="../assets/js/jquery-2.2.1.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../assets/js/metisMenu.min.js"></script>
  <script src="../assets/js/sb-admin-2.js"></script>
  <script src="../assets/js/global.js"></script>
  <?php
    if(isset($scripts)) {
      echo "<script src='../assets/js/".$scripts.".js'></script>";
    }
  ?>
</html>