<?php $this->load->view('home/header'); ?>

<div class="container theme-showcase" role="main">

  <p>
    <!-- 
        <button class="btn btn-sm btn-default" type="button">互联网</button>
        <button class="btn btn-sm btn-default" type="button">数码</button>
        <button class="btn btn-sm btn-default" type="button">IT</button>
        <button class="btn btn-sm btn-default" type="button">电信</button> -->

    <a href="<?= site_url('Home/index/'.$cid.'/0')?>">
      <button class="btn btn-sm btn-default <?php if($sub_cid == 0) echo 'active'; ?>" type="button">全部</button>
    </a>
    <?php foreach ($sub_nav as $v) { ?>
      <a href="<?= site_url('Home/index/'.$cid.'/'.$v['cid'].'')?>">
        <button class="btn btn-sm btn-default<?php if($sub_cid == $v['cid'] ) echo 'active'; ?> " type="button"><?= $v['cname'] ?></button>
      </a>
    <?php } ?>

  </p>

  <div class="row all-event-list mt20">
    <?php foreach ($article as $v) { ?>
      <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="widget-event">
          <a href="<?=site_url('Article/index/'.$cid.'/'.$sub_cid.'/'.$v['aid'].'')?>"><img class="widget-event__banner lazy" src="<?= base_url('static/home/') ?>images/<?=$v['a_img'] ?>"></a>
          <div class="widget-event__info">
            <h2 class="h4 title"><a href="<?=site_url('Article/index/'.$cid.'/'.$sub_cid.'/'.$v['aid'].'')?>">

                <?=$v['title']; ?>

              </a></h2>
            <ul class="widget-event__meta">
              <li>时间：<?=date('Y-m-d',$v['pubtime']) ?></li>
            </ul>
            <a class="btn btn-default btn-sm" href="<?=site_url('Article/index/'.$cid.'/'.$sub_cid.'/'.$v['aid'].'')?>">查看</a>
          </div>
        </div>
      </div>
    <?php } ?>

    <!-- <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?=base_url('static/home/') ?>images/article_02.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">2015中国旅游极客开发大赛</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?=base_url('static/home/') ?>images/article_03.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">高升云道—云时代的智能硬件和物联网创业</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?=base_url('static/home/') ?>images/article_04.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">数据重构未来 - 七牛·数据时代峰会</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?=base_url('static/home/') ?>images/article_01.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">高速+智能→未来</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?=base_url('static/home/') ?>images/article_02.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">2015中国旅游极客开发大赛</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?php echo base_url('static/home/') ?>images/article_03.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">高升云道—云时代的智能硬件和物联网创业</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?php echo base_url('static/home/') ?>images/article_04.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">数据重构未来 - 七牛·数据时代峰会</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?php echo base_url('static/home/') ?>images/article_01.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">高速+智能→未来</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?php echo base_url('static/home/') ?>images/article_02.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">2015中国旅游极客开发大赛</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?php echo base_url('static/home/') ?>images/article_03.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">高升云道—云时代的智能硬件和物联网创业</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?php echo base_url('static/home/') ?>images/article_04.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">数据重构未来 - 七牛·数据时代峰会</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?php echo base_url('static/home/') ?>images/article_01.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">高速+智能→未来</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?php echo base_url('static/home/') ?>images/article_02.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">2015中国旅游极客开发大赛</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?php echo base_url('static/home/') ?>images/article_03.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">高升云道—云时代的智能硬件和物联网创业</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="widget-event">
            <a href="#"><img class="widget-event__banner lazy" src="<?php echo base_url('static/home/') ?>images/article_04.png"></a>
            <div class="widget-event__info">
              <h2 class="h4 title"><a href="#">数据重构未来 - 七牛·数据时代峰会</a></h2>
              <ul class="widget-event__meta">
                <li>时间：2015-09-19</li>
              </ul>
              <a class="btn btn-default btn-sm" href="#">查看</a>
            </div>
          </div>
        </div> -->



  </div>


  <div class="text-center">
    <!-- <ul class="pagination">
      <li class="active"><a href="javascript:void(0);">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">5</a></li>
      <li class="next"><a href="#" rel="next">下一页</a></li>
    </ul> -->
    <!-- <?php echo $this->pagination->create_links();?> -->
    <?=$page?>
  </div>


</div>

<?php $this->load->view('home/footer'); ?>