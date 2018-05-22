<?php
  include_once("views/layouts/head.php");
  include_once("views/layouts/header.php");
  include_once("views/layouts/menu.php");
  include_once("views/layouts/breadcum.php");
  include_once("views/layouts/advertise.php");
?>

<section class="mt-5 mb-5">
  <div class="container">
    <h5 class="m-0">Gửi Ðề Tài Mới</h5>
    <small>Diễn đàn: <a href="">Tin Học Căn Bản</a></small>

    <div class="o-panel o-panel--dark mt-2">
      <div class="o-panel__heading">Nội dung của bạn</div>
      <div class="o-panel__content">
        <form action="<?= vendor_url_util::makeURL(['action' => 'store']) ?>" method="POST" class="form p-3">
          <input type="hidden" name="idTopic" value="<?= $this->idTopic ?>" />
          <input type="hidden" name="idUser" value="<?= $_SESSION['user_info']['id'] ?>" />
          <div class="form-group row">
            <div class="col-6">
              <label for=""><strong>Tiêu đề:</strong></label>
              <input type="text" class="form-control" name="title" required />
            </div>
          </div>

          <div class="form-group">
            <textarea name="content" id="ckeditor" required></textarea>
            <!-- <script>CKEDITOR.replace('ckeditor');</script> -->
          </div>

          <div class="form-group text-right">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-success">Đăng chủ đề</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php
  include_once("views/layouts/footer.php");
  include_once("views/layouts/foot.php");
?>