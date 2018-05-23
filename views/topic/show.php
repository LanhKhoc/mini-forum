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
      <div class="float-right clearfix">
        <div class="o-pagination float-right">
          <div class="o-pagination__item">
            <span>Trang <?= $this->topicData['page'] ?>/<?= $this->topicData['total_page'] ?></span>
          </div>

          <?php if ($this->topicData['page']>1) { ?>
            <div class="o-pagination__item">
              <a href="<?= vendor_url_util::makeURL([
                  'controller' => 'topic',
                  'action' => 'show',
                  'params' => ['id' => $this->idTopic, 'page' => $this->topicData['page'] - 1]
                ]) ?>" class="o-pagination__link"><i class="fas fa-caret-left"></i></a>
            </div>
          <?php } ?>

          <?php for ($i=$this->topicData['min']; $i<=$this->topicData['max']; $i++) { ?>
            <div class="o-pagination__item">
              <?php if ($this->topicData['page'] == $i) { ?>
                <span class="o-pagination__current u-cursor-default"><?= $i ?></span>
              <?php } else { ?>
                <a href="<?= vendor_url_util::makeURL([
                  'controller' => 'topic',
                  'action' => 'show',
                  'params' => ['id' => $this->idTopic, 'page' => $i]
                ]) ?>" class="o-pagination__link"><?= $i ?></a>
              <?php } ?>
            </div>
          <?php } ?>

          <?php if ($this->topicData['page'] < $this->topicData['total_page']) { ?>
            <div class="o-pagination__item">
              <a href="<?= vendor_url_util::makeURL([
                  'controller' => 'topic',
                  'action' => 'show',
                  'params' => ['id' => $this->idTopic, 'page' => $this->topicData['page'] + 1]
                ]) ?>" class="o-pagination__link"><i class="fas fa-caret-right"></i></a>
            </div>
          <?php } ?>
        </div>

        <div class="u-clearfloat text-right">
          Xếp bài từ
          <?= $this->topicData['start'] + 1 ?>
          tới
          <?php
            if ($this->topicData['total_record'] > ($this->topicData['page'] )*$this->topicData['limit']) {
              echo ($this->topicData['start'] + 1 + $this->topicData['limit']);
            } else echo $this->topicData['total_record'];
            ?>
          trên
          <?= $this->topicData['total_record'] ?>
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
        <?php foreach ($this->topicData['data'] as $item) { ?>
          <div class="c-post">
            <div class="row">
              <div class="col-1 text-center">
                <span class="c-post__icon"><i class="fas fa-envelope-square"></i></span>
              </div>
              <div class="col-6">
                <h5 class="c-post__title"><a href="<?= vendor_url_util::makeURL(['controller' => 'thread', 'action' => 'show', 'params' => ['id' => $item['thread']['id']]]) ?>"><?= $item['thread']['title'] ?></a></h5>
                <div>
                  <a href="<?= $item['user_thread']['id'] ?>"><?= $item['user_thread']['fullname'] ?></a>,
                  <span><?= $item['thread']['date_created'] ?></span>
                </div>
              </div>
              <div class="col-2">
                <div class="c-post__response">
                  <div>Trả lời: <?= $item['thread']['total_comments'] ?></div>
                  <div>Xem: <?= $item['thread']['views'] ?></div>
                </div>
              </div>
              <div class="col-3">
                <div class="c-post__newest">
                  <a href=""><?= $item['user_comment']['fullname'] ?></a>
                </div>
                <div>
                  <span><?= $item['user_comment']['date_created'] ?></span>
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
  <div class="container clearfix">
    <div class="float-right clearfix">
      <div class="o-pagination float-right">
        <div class="o-pagination__item">
          <span>Trang <?= $this->topicData['page'] ?>/<?= $this->topicData['total_page'] ?></span>
        </div>

        <?php if ($this->topicData['page']>1) { ?>
          <div class="o-pagination__item">
            <a href="<?= vendor_url_util::makeURL([
                'controller' => 'topic',
                'action' => 'show',
                'params' => ['id' => $this->idTopic, 'page' => $this->topicData['page'] - 1]
              ]) ?>" class="o-pagination__link"><i class="fas fa-caret-left"></i></a>
          </div>
        <?php } ?>

        <?php for ($i=$this->topicData['min']; $i<=$this->topicData['max']; $i++) { ?>
          <div class="o-pagination__item">
            <?php if ($this->topicData['page'] == $i) { ?>
              <span class="o-pagination__current u-cursor-default"><?= $i ?></span>
            <?php } else { ?>
              <a href="<?= vendor_url_util::makeURL([
                'controller' => 'topic',
                'action' => 'show',
                'params' => ['id' => $this->idTopic, 'page' => $i]
              ]) ?>" class="o-pagination__link"><?= $i ?></a>
            <?php } ?>
          </div>
        <?php } ?>

        <?php if ($this->topicData['page'] < $this->topicData['total_page']) { ?>
          <div class="o-pagination__item">
            <a href="<?= vendor_url_util::makeURL([
                'controller' => 'topic',
                'action' => 'show',
                'params' => ['id' => $this->idTopic, 'page' => $this->topicData['page'] + 1]
              ]) ?>" class="o-pagination__link"><i class="fas fa-caret-right"></i></a>
          </div>
        <?php } ?>
      </div>

      <div class="u-clearfloat text-right">
        Xếp bài từ
        <?= $this->topicData['start'] + 1 ?>
        tới
        <?= ($this->topicData['start'] + 1 + $this->topicData['limit']) ?>
        trên
        <?= $this->topicData['total_record'] ?>
      </div>
    </div>
  </div>
</section>

<?php
  include_once("views/layouts/footer.php");
  include_once("views/layouts/foot.php");
?>