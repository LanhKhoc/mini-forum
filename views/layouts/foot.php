
  <script src="./assets/libs/jquery-3.3.1.min.js"></script>
  <script src="./assets/libs/tether/dist/js/tether.min.js"></script>
  <script src="./assets/libs/bootstrap/js/bootstrap.min.js"></script>
  <script defer src="./assets/libs/fontawesome/svg-with-js/js/fontawesome-all.min.js"></script>
  <script src="./assets/js/main.js"></script>
  <?php if ($this->error != '') { echo "<script defer>$(() => alert('{$this->error}'));</script>"; } ?>
</div>
</body>
</html>
