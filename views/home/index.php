<?php
  include_once("views/layouts/head.php");
  include_once("views/layouts/header.php");
  include_once("views/layouts/menu.php");
  include_once("views/layouts/breadcum.php");
  include_once("views/layouts/advertise.php");

  if (empty($_SESSION['user_info'])) { include_once("views/layouts/welcome.php"); }
?>

<section class="mt-4 mb-5">
  <div class="container">
    <div class="o-panel o-panel--dark">
      <div class="o-panel__heading">Những bài viết mới nhất</div>
      <div class="o-panel__title">
        <div class="row p-home-new-post-title">
          <div class="col-4"><span>Chia sẻ & Kiến thức</span></div>
          <div class="col-4"><span>Chia sẻ & Kiến thức</span></div>
          <div class="col-4"><span>Chia sẻ & Kiến thức</span></div>
        </div>
      </div>
      <div class="o-panel__content o-panel__content--no-border">
        <div class="row">
          <div class="col-4">
            <ul class="u-clearlist p-home-new-post">
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
            </ul>
          </div>
          <div class="col-4">
            <ul class="u-clearlist p-home-new-post">
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
            </ul>
          </div>
          <div class="col-4">
            <ul class="u-clearlist p-home-new-post">
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
              <li><a href="">Nhờ mọi người tư vấn build pc tầm 20 triệu</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mb-5">
  <div class="container">
    <?php foreach ($this->data as $id => $item) { ?>
      <div class="o-panel o-panel--primary mt-3">
        <div class="o-panel__heading">
          <h4 class="u-d-ib"><a href="<?= $id ?>" class="u-color-white"><?= $item['category_name'] ?></a></h4>
          <span><?= '&nbsp' . $item['category_description'] ?></span>
        </div>

        <div class="o-panel__title o-panel__title--dark">
          <div class="row">
            <div class="offset-1 col-6"><strong>Tiêu đề</strong></div>
            <div class="offset-2 col-3"><strong>Bài Mới</strong></div>
          </div>
        </div>

        <div class="o-panel__content">
          <?php foreach ($item['topics'] as $topic) { ?>
            <div class="c-topic">
              <div class="row">
                <div class="col-1 text-center">
                  <span class="c-topic__icon"><i class="far fa-comment"></i></span>
                </div>
                <div class="col-6">
                  <h4 class="c-topic__title"><a href=""><?= $item['topic_name'] ?></a></h4>
                  <p><?= $item['topic_description'] ?></p>
                </div>
                <div class="col-2">
                  <p>Bài: 16.107</p>
                </div>
                <div class="col-3">
                  <div class="c-topic__newest">
                    <i class="fas fa-book"></i>
                    <a href="">Mở hộp Asus Zenwatch phiên bản 1 - đồng hồ thông minh đẹp, thời trang,tiện dụng</a>
                  </div>
                  <div>by <a href="">Lanh Khoc</a></div>
                  <div>
                    <span>15-05-2018 08:35</span>
                    <a href=""><i class="fas fa-fast-forward"></i></a>
                  </div>
                </div>
              </div>
            </div>

            <div class="c-topic">
              <div class="row">
                <div class="col-1 text-center">
                  <span class="c-topic__icon"><i class="far fa-comment"></i></span>
                </div>
                <div class="col-6">
                  <h4 class="c-topic__title"><a href="">Reviews- Hands on</a></h4>
                  <p>Nơi chia sẻ những kiến thức bạn cần biết về các vấn đề căn bản như sử dụng Windows, tin học văn phòng, sử dụng e-mail, Internet, phòng chống virus...</p>
                </div>
                <div class="col-2">
                  <p>Bài: 16.107</p>
                </div>
                <div class="col-3">
                  <div class="c-topic__newest">
                    <i class="fas fa-book"></i>
                    <a href="">Mở hộp Asus Zenwatch phiên bản 1 - đồng hồ thông minh đẹp, thời trang,tiện dụng</a>
                  </div>
                  <div>by <a href="">Lanh Khoc</a></div>
                  <div>
                    <span>15-05-2018 08:35</span>
                    <a href=""><i class="fas fa-fast-forward"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
    <?php } ?>

    
      
      <div class="o-panel__footer"></div>
    </div>
</section>

<?php
  include_once("views/layouts/footer.php");
  include_once("views/layouts/foot.php");
?>