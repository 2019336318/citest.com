
<?php $this->load->view('admin/header'); ?>
    <!-- Start: Content -->
    <section id="content">
        <div id="topbar" class="affix">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">添加资讯</li>
            </ol>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-10 col-lg-10 center-column">
                    <form action="" method="post" class="cmxform" enctype="multipart/form-data">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">添加文章</div>
                                <div class="panel-btns pull-right margin-left">
                                    <a href="<?php echo site_url('admin/Article/index');?>"
                                       class="btn btn-default btn-gradient dropdown-toggle"><span
                                            class="glyphicon glyphicon-chevron-left"></span></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="input-group"><span class="input-group-addon">分类</span>
                                            <select name="cid" id="standard-list1" class="form-control">
                                                <?php foreach ($cate as $item) {?>
                                                    <optgroup label="<?php echo $item['cname']; ?>">
                                                        <?php
                                                            if(isset($item['sub'])) {
	                                                        foreach ($item['sub'] as $v) {
		                                                        ?>
                                                                <option value="<?php echo $v['cid']; ?>" <?php
                                                                    if($v['cid']==$this->uri->segment(4)){
                                                                    echo 'selected';
                                                                    }
                                                                ?>>
			                                                        <?php echo $v['cname']; ?>
                                                                </option>
	                                                        <?php }
                                                        }?>
                                                    </optgroup>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group"><span class="input-group-addon">标题</span>
                                            <input type="text" name="title" value="<?php echo set_value('title'); ?>" class="form-control">
                                        </div>
                                        <?php echo form_error('title');?>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group"><span class="input-group-addon">内容</span>
                                            <script type="text/plain" id="myEditor" style="width:100%;height:200px;">
                                             <p></p>
                                            </script>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group"><span class="input-group-addon">作者</span>
                                            <input type="text" name="author" value="<?php echo set_value('author'); ?>" class="form-control">
                                        </div>
	                                    <?php echo form_error('author');?>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group"><span class="input-group-addon">图片</span>
                                            <input type="file" name="a_img" value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group"><span class="input-group-addon">是否显示</span>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="isshow" value="1" checked class="form-control">是
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="isshow" value="0" class="form-control">否
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="submit" name="sub" value="提交" class="submit btn btn-blue">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
    <!-- End: Content -->
</div>
<!-- End: Main -->
<link type="text/css" rel="stylesheet" href="<?php echo base_url('static/admin/umeditor/themes/default/_css/umeditor.css');?>">
<script src="<?php echo base_url('static/admin/umeditor/umeditor.config.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('static/admin/umeditor/editor_api.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('static/admin/umeditor/lang/zh-cn/zh-cn.js');?>" type="text/javascript"></script>
<script type="text/javascript">
    var ue = UM.getEditor('myEditor', {
        autoClearinitialContent: true,
        wordCount: false,
        elementPathEnabled: false,
        initialFrameHeight: 300
    });
</script>
</body>

</html>