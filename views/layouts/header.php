<section class="c-header">
  <div class="c-login-bar mt-1 u-pos-a u-t-0 u-l-0 u-r-0">
    <div class="row">
      <div class="col-3">
        <span class="c-login-bar__form-item text-white">Follow us on...</span>
        <a href="https://fb.com/lanh.khoc.96" class="c-login-bar__form-icon">
          <img src="assets/img/facebook2.png" alt="">
        </a>
      </div>

      <div class="col-9">
        <?php if (empty($_SESSION['user_info'])) { ?>
          <form action="<?= vendor_url_util::makeURL(['controller' => 'login', 'action' => 'check']) ?>" method="POST" class="form-inline float-right">
            <label for="l-username">Login: &nbsp;</label>
            <input type="text" name="username" value="<?= $this->remember ?>" class="form-control" placeholder="Username..." id="l-username" required />
            <input type="password" name="password" class="form-control mr-1 ml-1" placeholder="Password..." required />
            <!-- <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Ghi Nhớ?
              </label>
            </div> -->
            <button type="submit" class="btn btn-primary u-cursor-pointer mr-2 ml-2">Login</button>
            <a href="<?= vendor_url_util::makeURL(['controller' => 'register']) ?>" class="btn btn-info">Register</a>
          </form>
        <?php } else { ?>
          <div class="float-right">
            <span>Xin chào, &nbsp;</span>
            <a href="" class="text-white mr-2"><strong><?= $_SESSION['user_info']['fullname'] ?></strong></a>
            <a href="<?= vendor_url_util::makeURL(['controller' => 'login', 'action' => 'logout']) ?>" class="btn btn-danger">Logout</a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>

  <div class="u-clear-collapse">
    <div class="c-header__logo">
      <a href="<?= vendor_url_util::makeURL(['controller' => 'home']) ?>">
        <img src="assets/img/front-end.png" alt="" class="c-header__logo-img">
      </a>
    </div>
  </div>
</section>