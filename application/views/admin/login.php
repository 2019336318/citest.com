<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>CMS内容管理系统</title>
  <meta name="keywords" content="Admin">
  <meta name="description" content="Admin">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Core CSS  -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('static/admin/') ?>css/bootstrap.css">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('static/admin/') ?>css/theme.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('static/admin/') ?>css/pages.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('static/admin/') ?>css/plugins.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('static/admin/') ?>css/responsive.css">

  <!-- Boxed-Layout CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('static/admin/') ?>css/boxed.css">

  <!-- Demonstration CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('static/admin/') ?>css/demo.css">

  <!-- Your Custom CSS -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('static/admin/') ?>css/custom.css">

</head>

<body class="login-page">

  <!-- Start: Main -->
  <div id="main">
    <div class="container">
      <div class="row">
        <div id="page-logo"></div>
      </div>
      <div class="row">
        <div class="panel">
          <div class="panel-heading">
            <div class="panel-title">CMS内容管理系统</div>
          </div>

          <form action="" class="cmxform" id="altForm" method="post">
            <div class="panel-body">
              <div class="form-group">
                <div class="input-group"> <span class="input-group-addon">用户名</span>
                  <input type="text" name="username" class="form-control phone" maxlength="10" autocomplete="off" placeholder="用户名" value="<?php echo set_value('username'); ?>">
                </div>
                <?php echo form_error('username'); ?>
              </div>
              <div class="form-group">
                <div class="input-group"> <span class="input-group-addon">密&nbsp;&nbsp;&nbsp;码</span>
                  <input type="password" name="password" class="form-control product" maxlength="10" autocomplete="off" placeholder="密码" value="<?php echo set_value('password'); ?>">
                </div>
                <?php echo form_error('password'); ?>
              </div>
              <div class="form-group">
                <input type="text" name="code">
                <img id="codeimg" src="http://citest.com/index.php/admin/user/get_code" width="140" height="50" />
              </div>
            </div>
            <div class="panel-footer"> <span class="panel-title-sm pull-left" style="padding-top: 7px;"></span>
              <div class="form-group margin-bottom-none">
                <input class="btn btn-primary pull-right" type="submit" value="登 录" />
                <div class="clearfix"></div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  <!-- End: Main -->

  <!-- Core Javascript - via CDN -->
  <script src="<?=base_url('static/admin/')?>js/jquery.min.js"></script>
  <script src="<?=base_url('static/admin/')?>js/jquery-ui.min.js"></script>
  <script src="<?=base_url('static/admin/')?>js/bootstrap.min.js"></script> <!-- Theme Javascript -->
  <script type="text/javascript" src="<?=base_url('static/admin/')?>js/uniform.min.js"></script>
  <script type="text/javascript" src="<?=base_url('static/admin/')?>js/main.js"></script>
  <script type="text/javascript" src="<?=base_url('static/admin/')?>js/custom.js"></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {

      // Init Theme Core 	  
      Core.init();
      $("#codeimg").click(function(){
        // console.log(this);
        $(this).attr('src','http://citest.com/index.php/admin/user/get_code?'+Math.random());
      })
    });
  </script>
</body>

</html>