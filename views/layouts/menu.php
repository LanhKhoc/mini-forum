<section class="u-hightlight-x-dark-white">
  <div class="container">
    <div class="row">
      <div class="col-8">
        <div class="o-list-horz o-list-horz--border o-list-horz--hover-primary">
          <div class="o-list-horz__item">
            <a href="<?= vendor_url_util::makeURL(['controller' => 'home']) ?>" class="o-list-horz__link">DIỄN ĐÀN</a>
          </div>

          <div class="o-list-horz__item">
            <a href="<?= vendor_url_util::makeURL([
              'controller' => 'topic',
              'action' => 'show',
              'params' => ['id' => 6]
              ]) ?>" class="o-list-horz__link">Anti-virus</a>
          </div>

          <div class="o-list-horz__item">
            <a href="<?= vendor_url_util::makeURL([
              'controller' => 'topic',
              'action' => 'show',
              'params' => ['id' => 8]
              ]) ?>" class="o-list-horz__link">Games Online</a>
          </div>

          <div class="o-list-horz__item">
            <a href="<?= vendor_url_util::makeURL([
              'controller' => 'topic',
              'action' => 'show',
              'params' => ['id' => 10]
              ]) ?>" class="o-list-horz__link">Thể Thao</a>
          </div>

          <div class="o-list-horz__item">
            <a href="<?= vendor_url_util::makeURL([
              'controller' => 'topic',
              'action' => 'show',
              'params' => ['id' => 11]
              ]) ?>" class="o-list-horz__link">Giao lưu, kết bạn, tự giới thiệu
              </a>
          </div>
        </div>
      </div>

      <div class="col-4">
        <form action="" method="" class="form-inline float-right p-menu">
          <input type="text" class="form-control mr-2" placeholder="Search..." />
          <button type="submit" class="btn btn-info">Tìm kiếm</button>
        </form>
      </div>
    </div>
  </div>
</section>