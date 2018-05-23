<section class="mt-3">
  <div class="container">
    <div class="o-breadcum">
      <div class="o-breadcum__home">Diễn đàn</div>
      <?php
        foreach ($this->breadcum as $item) {
      ?>
        <div class="o-breadcum__item"><a href="<?= $item['link'] ?>"><?= $item['name'] ?></a></div>
      <?php } ?>
    </div>
  </div>
</section>