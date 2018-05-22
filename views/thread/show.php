<?php
  include_once("views/layouts/head.php");
  include_once("views/layouts/header.php");
  include_once("views/layouts/menu.php");
  include_once("views/layouts/breadcum.php");
  include_once("views/layouts/advertise.php");
  include_once("views/layouts/welcome.php");
?>

<section class="mt-4">
  <div class="container">
    <div class="o-panel o-panel--primary">
      <div class="o-panel__heading clearfix">
        <div class="float-left">
          <span class="mr-1"><i class="fas fa-clock"></i></span>
          <span><?= $this->thread['date_created'] ?></span>
        </div>
        <div class="float-right">#1</div>
      </div>
      <div class="o-panel__title o-panel__title--lighter p-3">
        <div class="c-card">
          <div class="row">
            <div class="col-2 text-center">
              <a href="<?= $this->user['id'] ?>"><img src="assets/img/<?= $this->user['avatar'] ?>" alt="" class="c-card__avatar"></a>
            </div>
            <div class="col-7">
              <h4 class="c-card__username">
                <span><i class="fas fa-user-secret"></i></span>
                <a href="<?= $this->user['id'] ?>"><?= $this->user['fullname'] ?></a>
              </h4>
              <h5>
                <span><i class="fas fa-id-card"></i></span>
                <?= $this->user['permission'] ?>
              </h5>
            </div>

            <div class="col-3">
              <div class="c-card__info">
                <span class="c-card__info-title">Tham gia</span>
                <span class="c-card__info-content"><?= $this->user['date_join'] ?></span>
              </div>
              <div class="c-card__info">
                <span class="c-card__info-title">Bài</span>
                <span class="c-card__info-content"><?= $this->user['total_thread'] ?></span>
              </div>
              <div class="c-card__info">
                <span class="c-card__info-title">Cảm ơn</span>
                <span class="c-card__info-content">1024</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="o-panel__content p-3">
        <h4 class="p-thread-title"><?= $this->thread['title'] ?></h4>
        <div><?= $this->thread['content'] ?></div>
      </div>

      <div class="o-panel__title clearfix">
        <div class="float-left">
          <p class="p-thread-thanks">Có <a href="">20 thành viên</a> cảm ơn dinhquangvinh1982 cho bài viết này</p>
        </div>
        <div class="float-right">
          <button class="btn btn-success u-cursor-pointer">
            <span><i class="fas fa-thumbs-up"></i></span>
            Cảm ơn
          </button>
          <a href="" class="btn btn-primary">
            <span><i class="fas fa-reply"></i></span>
            Trả lời
          </a>
        </div>
      </div>
    </div>

    <div class="js-comment">
      <?php foreach ($this->comment as $index => $item) { ?>
        <div class="o-panel o-panel--dark mt-1">
          <div class="o-panel__title o-panel__title--dark clearfix p-2">
            <div class="float-left">
              <span class="mr-1"><i class="fas fa-clock"></i></span>
              <span><?= $item['comment']['date_comment'] ?></span>
            </div>
            <div class="float-right"><?= '#' . ($index+2) ?></div>
          </div>

          <div class="o-panel__title o-panel__title--lighter p-3">
            <div class="c-card">
              <div class="row">
                <div class="col-2 text-center">
                  <a href=""><img src="assets/img/<?= $item['user']['avatar'] ?>" alt="" class="c-card__avatar"></a>
                </div>
                <div class="col-7">
                  <h4 class="c-card__username">
                    <span><i class="fas fa-user-secret"></i></span>
                    <a href=""><?= $item['user']['fullname'] ?></a>
                  </h4>
                  <h5>
                    <span><i class="fas fa-id-card"></i></span>
                    <?= $item['user']['permission'] ?>
                  </h5>
                </div>

                <div class="col-3">
                  <div class="c-card__info">
                    <span class="c-card__info-title">Tham gia</span>
                    <span class="c-card__info-content"><?= $item['user']['date_join'] ?></span>
                  </div>
                  <div class="c-card__info">
                    <span class="c-card__info-title">Bài</span>
                    <span class="c-card__info-content"><?= $item['user']['total_threads'] ?></span>
                  </div>
                  <div class="c-card__info">
                    <span class="c-card__info-title">Cảm ơn</span>
                    <span class="c-card__info-content">1024</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="o-panel__content p-3">
            <h5 class="p-thread-comment"></h5>
            <div><?= $item['comment']['content'] ?></div>
          </div>

          <div class="o-panel__title clearfix">
            <!-- <div class="float-left"></div>
            <div class="float-right">
              <button class="btn btn-success u-cursor-pointer">
                <span><i class="fas fa-thumbs-up"></i></span>
                Cảm ơn
              </button>
              <a href="" class="btn btn-primary">
                <span><i class="fas fa-reply"></i></span>
                Trả lời
              </a>
            </div> -->
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</section>

<?php if (isset($_SESSION['user_info'])) { ?>
  <section class="mt-4 mb-5">
    <div class="container">
      <div class="o-panel o-panel--dark">
        <div class="o-panel__heading">
          <span><i class="fas fa-reply"></i></span>
          Trả lời nhanh
        </div>
        <div class="o-panel__content">
          <form method="POST" action="<?= vendor_url_util::makeURL(['controller' => 'comment', 'action' => 'store']) ?>" class="form p-3">
            <input type="hidden" name="idTopic" value="<?= $this->thread['id'] ?>" />
            <input type="hidden" name="idUser" value="<?= $_SESSION['user_info']['id'] ?>" />
            <textarea name="comment" id="ckeditor" required></textarea>
            <div class="text-right mt-2">
              <button type="submit" class="btn btn-primary">Gửi trả lời</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<?php
  include_once("views/layouts/footer.php");
  include_once("views/layouts/foot.php");
?>