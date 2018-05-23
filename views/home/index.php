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
          <?php foreach ($this->newest as $item) { ?>
            <div class="col-4"><span><?= $item['name'] ?></span></div>
          <?php } ?>
        </div>
      </div>
      <div class="o-panel__content o-panel__content--no-border">
        <div class="row">
          <?php foreach ($this->newest as $item) { ?>
            <div class="col-4">
              <ul class="u-clearlist p-home-new-post">
                <?php foreach ($item['threads'] as $thread) { ?>
                  <li><a href="<?= vendor_url_util::makeURL(['controller' => 'thread', 'action' => 'show', 'params' => ['id' => $thread['id']]]) ?>"><?= $thread['title'] ?></a></li>
                <?php } ?>
              </ul>
            </div>
          <?php } ?>
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
                  <h4 class="c-topic__title">
                    <a href="<?= vendor_url_util::makeURL(['controller' => 'topic', 'action' => 'show', 'params' => ['id' => $topic['id_topic']]]) ?>"><?= $topic['topic_name'] ?></a>
                  </h4>
                  <p><?= $topic['topic_description'] ?></p>
                </div>

                <div class="col-2"><p>Bài: <?= $topic['total_thread'] ?></p></div>

                <div class="col-3">
                  <div class="c-topic__newest">
                    <a href="<?= vendor_url_util::makeURL([
                      'controller' => 'thread',
                      'action' => 'show',
                      'params' => ['id' => $topic['newest_thread']['id']]
                    ]) ?>"><?= $topic['newest_thread']['title'] ?></a>
                  </div>
                  <div>by <a href="<?= $topic['newest_thread']['user']['id'] ?>"><?= $topic['newest_thread']['user']['fullname'] ?></a></div>
                  <div>
                    <span><?= $topic['newest_thread']['date_created'] ?></span>
                    <a href=""><i class="fas fa-fast-forward"></i></a>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

        <div class="o-panel__footer"></div>
    <?php } ?>
  </div>
</section>

<?php
  include_once("views/layouts/footer.php");
  include_once("views/layouts/foot.php");
?>