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
    <link rel="stylesheet" type="text/css" href="<?= base_url('static/admin/') ?>css/glyphicons.min.css">

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

    <!-- Core Javascript - via CDN -->
    <script type="text/javascript" src="<?= base_url('static/admin/') ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?= base_url('static/admin/') ?>js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?= base_url('static/admin/') ?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= base_url('static/admin/') ?>js/uniform.min.js"></script>
    <script type="text/javascript" src="<?= base_url('static/admin/') ?>js/main.js"></script>
    <script type="text/javascript" src="<?= base_url('static/admin/') ?>js/custom.js"></script>
</head>

<body>
    <!-- Start: Header -->
    <header class="navbar navbar-fixed-top" style="background-image: none; background-color: rgb(240, 240, 240);">
        <div class="pull-left"><a class="navbar-brand" href="#">
                <div class="navbar-logo"><img src="<?= base_url('static/admin/') ?>images/logo.png" alt="logo"></div>
            </a></div>
        <div class="pull-right header-btns">
            <a class="user"><span class="glyphicons glyphicon-user"></span> admin</a>
            <a href="<?= site_url('admin/user/logout') ?>" class="btn btn-default btn-gradient" type="button"><span class="glyphicons glyphicon-log-out"></span> 退出</a>
        </div>
    </header>
    <!-- End: Header -->

    <!-- Start: Main -->
    <div id="main" style="padding-top: 0;">
        <!-- Start: Sidebar -->
        <aside id="sidebar" class="affix">
            <div id="sidebar-search">
                <div class="sidebar-toggle"><span class="glyphicon glyphicon-resize-horizontal"></span></div>
            </div>
            <div id="sidebar-menu">
                <ul class="nav sidebar-nav">
                    <li>
                        <a href="<?= site_url('admin/home') ?>"><span class="glyphicons glyphicon-home"></span><span class="sidebar-title">后台首页</span></a>
                    </li>

                    <!-- <li><a href="#sideEight" class="accordion-toggle menu-open"><span
                        class="glyphicons glyphicon-list"></span><span class="sidebar-title">文章管理</span><span
                        class="caret"></span></a>
                    <ul class="nav sub-nav" id="sideEight" style="">
                        <li><a href="#sideEight-sub" class="accordion-toggle menu-open"><span
                                class="glyphicons glyphicon-record"></span>科技<span class="caret"></span></a>
                            <ul class="nav sub-nav" id="sideEight-sub" style="">
                                <li class="active"><a href="<?= site_url('admin/Article') ?>"><span
                                        class="glyphicons glyphicon-minus"></span> 互联网</a></li>
                                <li><a href="#"><span class="glyphicons glyphicon-minus"></span> 数码</a></li>
                                <li><a href="#"><span class="glyphicons glyphicon-minus"></span> IT</a></li>
                                <li><a href="#"><span class="glyphicons glyphicon-minus"></span> 电信</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><span class="glyphicons glyphicon-record"></span> 文化</a></li>
                        <li><a href="#"><span class="glyphicons glyphicon-record"></span> 生活</a></li>
                    </ul>
                </li> -->


                    <li><a href="#sideEight" class="accordion-toggle menu-open"><span class="glyphicons glyphicon-list"></span><span class="sidebar-title">文章管理</span><span class="caret"></span></a>
                        <ul class="nav sub-nav" id="sideEight" style="">

                            <?php foreach ($cate as $val) { ?>

                                <li><a href="#sideEight-sub" class="accordion-toggle <?php 
                                        foreach ( $val['sub'] as $sub){
                                            if($sub['cid']==$type){
                                                echo 'menu-open';
                                            }
                                        }
                                    ?>"><span class="glyphicons glyphicon-record"></span><?=$val['cname']?><span class="caret"></span></a>
                                    <ul class="nav sub-nav" id="sideEight-sub" style="">

                                        <?php foreach ($val['sub'] as  $v) {

                                        ?>

                                            <li class="<?php if($type ==$v['cid']) echo 'active'; ?>"><a href="<?= site_url('admin/Article/index').'/'.$v['cid'] ?>"><span class="glyphicons glyphicon-minus"></span> <?=$v['cname']?></a></li>

                                        <?php } ?>
                                    </ul>
                                </li>

                            <?php } ?>

                        </ul>
                    </li>


                    <li>
                        <a href="cate_list.html"><span class="glyphicons glyphicon-list"></span><span class="sidebar-title">文章分类管理</span></a>
                    </li>
                    <li>
                        <a href="user_list.html"><span class="glyphicons glyphicon-list"></span><span class="sidebar-title">系统管理员</span></a>
                    </li>
                </ul>
            </div>
        </aside>
        <div style="text-align: center;"><?php
                                            // pre($cate);
                                            ?></div>