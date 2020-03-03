<?php $this->load->view('home/header'); ?>

<div class="warp">
  <div class="post-topheader">
    <div class="container">
      <form class="row" action="<?=site_url('Search/index')?>">
        <div class="col-md-9">
          <input type="text" placeholder="输入关键字搜索" value="<?=$keyword?>" name="q" class="input-lg form-control">
        </div>
        <div class="col-md-2">
          <button class="btn btn-primary btn-lg btn-block" type="submit">搜索</button>
        </div>
      </form>
    </div>
  </div>


  <div class="container mt20">

    <div class="row">
      <div class="col-md-9 main search-result">
        <h3 class="h5 mt0">找到约 <strong><?=$total?></strong> 条结果</h3>

<?php foreach ($article as $v) {?>

        <section>
          <h2 class="h4">
            <a target="_blank" href="#"><?=$v['title']?></a>
            <span class="text-muted"></span>
          </h2>
          <p class="excerpt">

            <?=html_entity_decode($v['content'])?>
          </p>
        </section>
<?php }?>
        <!-- <section>
          <h2 class="h4">
            <a target="_blank" href="#">高升云道—云时代的智能硬件和物联网创业</a>
            <span class="text-muted"></span>
          </h2>
          <p class="excerpt">后来，他在自己的大脑中安装了一个可以将颜色转成声音的设备，虽然 Neil Harbisson 看到的世界依然是灰暗的，但颜色对他来说已超越色彩本身，成为了可以听得到的音符...</p>
        </section>

        <section>
          <h2 class="h4">
            <a target="_blank" href="#">数据重构未来 - 七牛·数据时代峰会</a>
            <span class="text-muted"></span>
          </h2>
          <p class="excerpt">Neil Harbisson 过去一直生活在黑白的世界中。后来，他在自己的大脑中安装了一个可以将颜色转成声音的设备，虽然 Neil Harbisson 看到的世界依然是灰暗的，但颜色对他来说已超越色彩本身，成为了可以听得到的音符...</p>
        </section> -->

        <div class="text-center">
          <!-- <ul class="pagination"><li class="active"><a href="javascript:void(0);">1</a></li><li><a href="/search?q=php&amp;type=activity&amp;page=2">2</a></li><li class="next"><a href="/search?q=php&amp;type=activity&amp;page=2" rel="next">下一页</a></li></ul> -->
          <?=$page?>
        </div>
      </div>
      <div class="col-md-3 side">

      </div>
    </div>
  </div>

</div>

<?php $this->load->view('home/footer'); ?>