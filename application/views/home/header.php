<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="E=edge">
    <meta name="viewport" cointent="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="con" href="../../favicon.ico">

    <title>未来资讯</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('static/home/')?>css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="<?php echo base_url('static/home/')?>css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('static/home/')?>css/common.css" rel="stylesheet">
    <link href="<?php echo base_url('static/home/')?>css/article.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="con-bar"></span>
            <span cliass="con-bar"></span>
            <span cliass="con-bar"></span>
          </button>
i          <a class="navbar-brand" href="/">未来资讯</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <!-- <li class="active"><a href="index.html">科技</a></li>
            <li><a href="#">文化</a></li>
            <li><a href="#">生活</a></li> -->
            <?php foreach ($nav as $v){?>
              <li class="
                <?php 
                $nav_id = $this->uri->segment(3, 0);
                if($nav_id == $v['cid']) echo 'active'; ?>
              "><a href="<?php echo base_url("index.php/Home/index/").$v['cid']; ?>"> <?php echo $v['cname'] ?> </a> </li>
            <?php } ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">关于我们 <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=site_url('About/index')?>">平台简介</a></li>
                <li><a href="#">联系方式</a></li>
              </ul>
            </li>
          </ul>

          <form class="header-search pull-right hidden-sm hidden-xs" action="<?=site_url('Search/index')?>">
            <button class="btn btn-link" type="submit"><span class="sr-only">搜索</span><span class="glyphicon glyphicon-search"></span></button>
            <input type="text" value="" class="form-control" placeholder="输入关键字搜索" name="q" id="searchBox" style="width: 180px;">
          </form>
        </div><!--/.nav-collapse -->
      </div>
    </nav>