<?php
  include_once("views/layouts/head.php");
  include_once("views/layouts/header.php");
  include_once("views/layouts/menu.php");
  include_once("views/layouts/breadcum.php");
  include_once("views/layouts/advertise.php");
  include_once("views/layouts/welcome.php");
?>

<section class="mt-5">
  <div class="container">
    <div class="clearfix">
      <div class="float-left">
        <?php if (isset($_SESSION['user_info'])) { ?>
          <a href="<?= vendor_url_util::makeURL([
            'controller' => 'thread',
            'action' => 'create',
            'params' => ['idTopic' => $this->idTopic]
          ]) ?>" class="btn btn-primary">
            <span class="mr-1"><i class="fas fa-plus"></i></span>
            Đăng bài viết
          </a>
        <?php } ?>
      </div>
      <div class="float-right">
        <div class="o-pagination">
          <div class="o-pagination__item">
            <a href="" class="o-pagination__link"><i class="fas fa-caret-left"></i></a>
          </div>
          <div class="o-pagination__item">
            <a href="" class="o-pagination__link">1</a>
          </div>
          <div class="o-pagination__item">
            <a href="" class="o-pagination__link">2</a>
          </div>
          <div class="o-pagination__item">
            <a href="" class="o-pagination__link"><i class="fas fa-caret-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- <section class="mt-3">
  <div class="container">
    <div class="o-panel o-panel--primary">
      <div class="o-panel__heading">
        <h4>PHỤ MỤC: TIN TỨC CÔNG NGHỆ - SẢN PHẨM MỚI</h4>
      </div>
      <div class="o-panel__title">
        <div class="row">
          <div class="offset-1 col-6"><strong>Tiêu đề</strong></div>
          <div class="offset-2 col-3"><strong>Bài Mới</strong></div>
        </div>
      </div>
      <div class="o-panel__content">
        <?php foreach ($this->list_threads as $item) { ?>
          <div class="c-topic">
            <div class="row">
              <div class="col-1 text-center">
                <span class="c-topic__icon"><i class="far fa-comment"></i></span>
              </div>
              <div class="col-6">
                <h4 class="c-topic__title"><a href=""><?= $item['title'] ?></a></h4>
                <p>Nơi chia sẻ những kiến thức bạn cần biết về các vấn đề căn bản như sử dụng Windows, tin học văn phòng, sử dụng e-mail, Internet, phòng chống virus...</p>
              </div>
              <div class="col-2">
                <p>Bài: 16.107</p>
              </div>
              <div class="col-3">
                <div class="c-topic__newest">
                  <a href="">Mở hộp Asus Zenwatch phiên bản 1 - đồng hồ thông minh đẹp, thời trang,tiện dụng</a>
                </div>
                <div>by <a href="">Lanh Khoc</a></div>
                <div>
                  <span>15-05-2018 08:35</span>
                  <a href=""><i class="fas fa-forward"></i></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        

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
                <a href="">Mở hộp Asus Zenwatch phiên bản 1 - đồng hồ thông minh đẹp, thời trang,tiện dụng</a>
              </div>
              <div>by <a href="">Lanh Khoc</a></div>
              <div>
                <span>15-05-2018 08:35</span>
                <a href=""><i class="fas fa-forward"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="o-panel__footer"></div>
    </div>
  </div>
</section> -->

<section class="mt-4">
  <div class="container">
    <div class="o-panel o-panel--primary">
      <div class="o-panel__heading">
        <h4>DIỄN ĐÀN: <?= $this->category['name'] ?></h4>
      </div>
      <div class="o-panel__title o-panel__title--dark">
        <div class="row">
          <div class="offset-1 col-6"><strong>Tiêu đề</strong></div>
          <div class="offset-2 col-3"><strong>Bài Mới</strong></div>
        </div>
      </div>
      <div class="o-panel__content">
        <?php foreach ($this->list_threads as $item) { ?>
          <div class="c-post">
            <div class="row">
              <div class="col-1 text-center">
                <span class="c-post__icon"><i class="fas fa-envelope-square"></i></span>
              </div>
              <div class="col-6">
                <h5 class="c-post__title"><a href="<?= vendor_url_util::makeURL(['controller' => 'thread', 'action' => 'show', 'params' => ['id' => $item['id_thread']]]) ?>"><?= $item['title'] ?></a></h5>
                <div>
                  <a href="<?= $item['user']['id'] ?>"><?= $item['user']['fullname'] ?></a>,
                  <span><?= $item['date_created'] ?></span>
                </div>
              </div>
              <div class="col-2">
                <div class="c-post__response">
                  <div>Trả lời: 0</div>
                  <div>Xem: <?= $item['views'] ?></div>
                </div>
              </div>
              <div class="col-3">
                <div class="c-post__newest">
                  <a href="">giangngoha</a>
                </div>
                <div>
                  <span>15-05-2018 08:35</span>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="o-panel__footer"></div>
    </div>
  </div>
</section>

<section class="mt-3 mb-4">
  <div class="container">
    <div class="clearfix">
      <div class="float-right">
        <div class="o-pagination">
          <div class="o-pagination__item">
            <a href="" class="o-pagination__link"><i class="fas fa-caret-left"></i></a>
          </div>
          <div class="o-pagination__item">
            <a href="" class="o-pagination__link">1</a>
          </div>
          <div class="o-pagination__item">
            <a href="" class="o-pagination__link">2</a>
          </div>
          <div class="o-pagination__item">
            <a href="" class="o-pagination__link"><i class="fas fa-caret-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  include_once("views/layouts/footer.php");
  include_once("views/layouts/foot.php");
?>