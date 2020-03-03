<?php $this->load->view('admin/header'); ?>

<!-- Start: Content -->
<section id="content">
  <div id="topbar" class="affix">
    <ol class="breadcrumb">
      <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
      <li class="active">资讯管理</li>
    </ol>
  </div>
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="panel">
          <div class="panel-heading">
            <div class="panel-title">资讯列表</div>
            <a href="<?php echo site_url('admin/Article/add').'/'.$this->uri->segment(4); ?>" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加文章</a>
          </div>
          <form action="" method="post">
            <div class="panel-body">
              <h2 class="panel-body-title">互联网</h2>
              <table class="table table-striped table-bordered table-hover dataTable">
                <tr class="active">
                  <th class="text-center" width="100"><input type="checkbox" value="" id="checkall" class=""> 全选</th>
                  <th>标题</th>
                  <th>内容</th>
                  <th>作者</th>
                  <th>图片</th>
                  <th>发布时间</th>
                  <th width="200">操作</th>
                </tr>
      
                <?php if (!empty($article)) { ?>
                  <?php foreach ($article as $item) { ?>
                    <tr class="success">
                      <td class="text-center"><input type="checkbox" value="<?php echo $item['aid'];  ?>" name="idarr[]" class="cbox"></td>
                      <td><?php echo $item['title'];  ?></td>
                      <td><?php echo htmlspecialchars_decode($item['content']);  ?></td>
                      <td><?php echo $item['author'];  ?></td>
                      <td>
                        <img src="<?php echo base_url() . $item['a_img'];  ?>" alt="" width="200" height="100">
                      </td>
                      <td><?php echo date("Y-m-d H:i", $item['pubtime']);  ?></td>
                      <td>
                        <div class="btn-group">
                          <a href="<?= site_url('admin/Article/edit/') . $item['aid'] ?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                          <a onclick="return confirm('确定要删除吗？');" href="<?= site_url('admin/Article/del/') . $item['aid'] ?>" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
                        </div>

                      </td>
                    </tr>
                  <?php } ?>
                <?php } else {
                  echo '无记录';
                } ?>
                <!--<tr class="success">
                      <td class="text-center"><input type="checkbox" value="1" name="idarr[]" class="cbox"></td>
                      <td>再谈互联网给传统金融带来的颠覆</td>
                      <td>2015-01-10</td>
                      <td>
                        <div class="btn-group">
                          <a href="article_edit.html" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                          <a onclick="return confirm('确定要删除吗？');" href="#" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
                        </div>
                      
                      </td>
                    </tr>
                    <tr class="success">
                      <td class="text-center"><input type="checkbox" value="1" name="idarr[]" class="cbox"></td>
                      <td>再谈互联网给传统金融带来的颠覆</td>
                      <td>2015-01-10</td>
                      <td>
                        <div class="btn-group">
                          <a href="article_edit.html" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                          <a onclick="return confirm('确定要删除吗？');" href="#" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
                        </div>
                      
                      </td>
                    </tr>-->
              </table>

              <div class="pull-left">
                <button type="submit" class="btn btn-default btn-gradient pull-right delall"><span class="glyphicons glyphicon-trash"></span></button>
              </div>

              <div class="pull-right">
                <?= $page ?>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>





  </div>
</section>
<!-- End: Content -->
</div>
<!-- End: Main -->
</body>

</html>