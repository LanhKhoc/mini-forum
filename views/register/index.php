<?php
  include_once("views/layouts/head.php");
  include_once("views/layouts/header.php");
  include_once("views/layouts/menu.php");
  include_once("views/layouts/breadcum.php");
  include_once("views/layouts/advertise.php");
?>

<section class="mt-4 mb-5">
  <div class="container">
    <form action="">
      <div class="o-panel o-panel--dark">
        <div class="o-panel__heading">
          Đăng Ký EdocCode - Chia sẻ kiến thức và công nghệ máy tính
        </div>
        <div class="o-panel__content p-3">
          <div class="form-group row">
            <div class="col-3">
              <label for="">Thành viên:</label>
            </div>
            <div class="col-4">
              <input type="text" class="form-control" />
              <small class="form-text text-muted">
                Xin hãy điền tên mà bạn thích được hiển thị trên diễn đàn.
              </small>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-3">
              <label for="">Mật mã:</label>
            </div>
            <div class="col-4">
              <input type="text" class="form-control" />
              <small class="form-text text-muted"></small>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-3">
              <label for="">Xác nhận mật mã:</label>
            </div>
            <div class="col-4">
              <input type="text" class="form-control" />
              <small class="form-text text-muted"></small>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-3">
              <label for="">Ðịa Chỉ Email:</label>
            </div>
            <div class="col-4">
              <input type="text" class="form-control" />
              <small class="form-text text-muted"></small>
            </div>
          </div>
        </div>
      </div>

      <div class="o-panel o-panel--dark mt-4">
        <div class="o-panel__heading">
          Nội Quy Diễn Đàn
        </div>
        <div class="o-panel__content p-3">
          <p>Bạn cần đọc và chấp nhận đồng ý theo Điều Khoản Đăng Ký Diễn Đàn khi đăng ký</p>
          <div class="p-register-term">
            <p><strong>Đăng ký diễn đàn này hoàn toàn MIỄN PHÍ</strong></p>
            <p><strong>Quy định Diễn Đàn [E-C]</strong></p>
            <p>Xin hãy dành vài phút để đọc các nội quy và các quy định của diễn đàn.</p>
            <p class="text-danger">
              1) Đọc kỹ "Điều khoản và Quy Định của Diễn Đàn". <br />
              2) Dùng Tiếng Việt có dấu khi sử dụng diễn đàn. <br />
              3) Tài khoản của bạn sẽ bị xóa nếu bạn không viết bài nào và không đăng nhập trong vòng 365 ngày kể từ ngày đăng ký.
            </p>
            <p>Xin nhớ là chúng tôi không chịu trách nhiệm về bất kỳ bài viết nào đăng trong diễn đàn. Chúng tôi không đảm bảo sự chính xác, hoàn hảo hoặc hữu ích của bất kỳ bài viết nào, và không chịu trách nhiệm về nội dung của bất kỳ bài viết nào.</p>
            <p>Các bài viết bộc lộ quan điểm của người viết bài, không nhất thiết là quan điểm của diễn đàn. Bất kỳ thành viên nào cảm thấy một bài viết có nội dung không lành mạnh thì xin hãy thông báo cho chúng tôi biết bằng email. Chúng tôi có khả năng xóa bài viết có nội dung không lành mạnh và chúng tôi sẽ cố gắng để làm như thế trong thời gian sớm nhất nếu chúng tôi xét thấy việc xóa bài viết là cần thiết.</p>
          </div>

          <div class="form-check mt-3">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input">
                <strong>Tôi đã đọc, và đồng ý tuân theo điều khoản đăng ký của EdocCode - Chia sẻ kiến thức và công nghệ máy tính</strong>
              </label>
            </div>
        </div>
      </div>

      <div class="mt-3 text-right">
        <button type="submit" class="btn btn-primary u-cursor-pointer">Đăng Ký</button>
        <button type="reset" class="btn btn-warning u-cursor-pointer">Hủy bỏ tất cả</button>
      </div>
    </form>
  </div>
</section>

<?php
  include_once("views/layouts/footer.php");
  include_once("views/layouts/foot.php");
?>