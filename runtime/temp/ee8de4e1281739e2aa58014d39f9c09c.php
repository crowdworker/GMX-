<?php /*a:2:{s:76:"/home/gemxpbra/public_html/application/admin/view/product/mutualaid_add.html";i:1697722712;s:89:"/home/gemxpbra/public_html/application/admin/view/../../../public/static/common/base.html";i:1697722706;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>互助添加</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <link rel="stylesheet" href="/../static/css/font.css">
    <link rel="stylesheet" href="/../static/css/xadmin.css">
    <script type="text/javascript" src="/../static/js/jquery.min.js"></script>
    <script src="/../static/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/../static/js/xadmin.js"></script>
    <!--[if lt IE 9]>
    <script src="/../static/js/html5.min.js"></script>
    <script src="/../static/js/respond.min.js"></script>
    <![endif]-->
    <style>
        .nodata_td {
            text-align: center;
        }
    </style>
    
<style>
    .thumbnail_box {
        display: none;
    }
	.layui-laydate-content>.layui-laydate-list {
	    padding-bottom: 0px;
	    overflow: hidden;
	}
	.layui-laydate-content>.layui-laydate-list>li{
	    width:50%
	}
	.merge-box .scrollbox .merge-list {
	    padding-bottom: 5px;
	}
</style>

</head>
<body>

<div class="layui-fluid">
    <div class="layui-row">
        <form action="" method="post" class="layui-form layui-form-pane">
        
            <div class="layui-form-item">
                <label for="name" class="layui-form-label" style="width: 150px">
                    <span class="x-red">*</span>产品名称
                </label>
                <div class="layui-input-inline">
                    <input type="text" id="name" name="name" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            
            <div class="layui-form-item">
                <label for="introduce" class="layui-form-label" style="width: 150px">
                    <span class="x-red">*</span>简介
                </label>
                <div class="layui-input-inline" style="width:60%;">
                    <input type="text" id="introduce" name="introduce" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="min_price" class="layui-form-label" style="width: 150px">
                    <span class="x-red">*</span>总出售份数
                </label>
                <div class="layui-input-inline">
                    <input type="number" id="zpurchaseNum" name="zpurchaseNum"  lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="min_price" class="layui-form-label" style="width: 150px">
                    <span class="x-red">*</span>已出售份数
                </label>
                <div class="layui-input-inline">
                    <input type="number" id="issellpurchaseNum" name="issellpurchaseNum"  lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label for="thumbnail" class="layui-form-label" style="width: 150px">
                    <span class="x-red">*</span>logo
                </label>
                <div class="layui-input-block">
                    <button type="button" class="layui-btn" id="thumbnail">
                        <i class="layui-icon">&#xe67c;</i>上传图片
                    </button>
                    <div class="thumbnail_box" id="thumbnail_box">
                        <img id="thumbnail_img" src="" alt="" width="100" onclick="$('#thumbnail').click()">
                        <input type="button" class="layui-btn layui-btn-danger" onclick="delete_thumbnail()" value="删除">
                    </div>
                    <input type="hidden" name="thumbnail" value="" id="thumbnail_value">
                </div>
            </div>
            
            <div class="layui-form-item">
                <label for="up_appoint" class="layui-form-label" style="width: 150px">
                    <span class="x-red">*</span>产品等级
                </label>
                <div class="layui-input-inline layui-show-xs-block">
                    <select name="level" id="level">
                        <option value="-1">活动产品</option>
                        <option value="0">普通产品</option>
                        <?php if(is_array($aid_list) || $aid_list instanceof \think\Collection || $aid_list instanceof \think\Paginator): $i = 0; $__LIST__ = $aid_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$aid): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo htmlentities($aid['id']); ?>"><?php echo htmlentities($aid['name']); ?>产品</option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            
            <div class="layui-form-item">
                <label for="min_price" class="layui-form-label" style="width: 150px">
                    <span class="x-red">*</span>产品价格
                </label>
                <div class="layui-input-inline">
                    <input type="number" id="price" name="price"  lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="power" class="layui-form-label" style="width: 150px">
                    <span class="x-red">*</span>收益比例
                </label>
                <div class="layui-input-inline">
                    <input type="number" id="rate" name="rate" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="power" class="layui-form-label" style="width: 150px">
                    <span class="x-red">*</span>升值天数
                </label>
                <div class="layui-input-inline">
                    <input type="number" id="days" name="days" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="power" class="layui-form-label" style="width: 150px">
                    <span class="x-red">*</span>最大购买次数
                </label>
                <div class="layui-input-inline">
                    <input type="number" id="purchaseNum" name="purchaseNum" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label for="hour_output" class="layui-form-label" style="width: 150px">
                    <span class="x-red">*</span>排序
                </label>
                <div class="layui-input-inline">
                    <input type="number" id="sort" name="sort" required="" lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            
            <div class="layui-form-item">
                <label for="status" class="layui-form-label" style="width: 150px">
                    <span class="x-red">*</span>状态
                </label>
                <div class="layui-input-inline layui-show-xs-block">
                    <select name="status" id="status" lay-verify="required">
                        <option value="">请选择</option>
                        <option value="1">开启</option>
                        <option value="2">关闭</option>
                        <option value="3">待开启</option>
                    </select>
                </div>
            </div>

            <?php if(in_array('/product/mutualaidadd', (array)session('power_action'))): ?>
            <div class="layui-form-item">
                <label class="layui-form-label"></label>
                <button class="layui-btn" lay-submit lay-filter="role_add">增加</button>
            </div>
            <?php endif; ?>
        </form>
    </div>
</div>

</body>

<script>
	//日期选择
	layui.use(['laydate','form'], function(){
	    var laydate = layui.laydate;
	    laydate.render({
	        elem: '#sta_time',
	        type: 'time',
	        format: 'HH:mm'
	    });
	    laydate.render({
	        elem: '#end_time',
	        type: 'time',
	        format: 'HH:mm'
	    });
	
	});

    // 图片上传
    layui.use('upload', function(){
        var upload = layui.upload;
        var uploadInst = upload.render({
            elem: '#thumbnail',
            field: 'image',
            accept: 'images',
            url: "<?php echo url('base/uploadImage'); ?>",//'/admin/base/uploadImage',
            data: {module: 'mutualaid', folder: '/mutualaid/thumbnail'},
            done: function(res){
            	console.log(res);
            	
                if(res.code == 1){
                    layer.msg(res.msg);
                    $("#thumbnail_img").attr('src',res.url);
                    $("#thumbnail_value").val(res.url);
                    $("#thumbnail").hide();
                    $("#thumbnail_box").show();
                }else {
                    layer.msg(res.msg);
                }
            },
            error: function(){
                //请求异常回调
            }
        });
    });

    // 删除缩略图
    function delete_thumbnail()
    {
        $("#thumbnail_box").hide();
        $("#thumbnail").show();
        $("#thumbnail_img").attr('src', '');
        $("#thumbnail_value").val('');
        return false;
    }


    $(function  () {
        layui.use('form', function(){
            let form = layui.form;
            form.on('submit(role_add)', function(data){
                $.ajax({
                    url: "<?php echo url('product/mutualaidAddPost'); ?>",//'/admin/mutualaid/mutualaidAddPost',
                    type: 'post',
                    data: {
                        name: data.field.name,
                        log: data.field.thumbnail,
                        price: data.field.price,
                        rate: data.field.rate,
                        days: data.field.days,
                        sort: data.field.sort,
                        purchaseNum: data.field.purchaseNum,
                        status: data.field.status,
                        introduce: data.field.introduce,
                        level: data.field.level,
                        zpurchaseNum:data.field.zpurchaseNum,
                        issellpurchaseNum:data.field.issellpurchaseNum
                    },
                    success: function (data) {
                        if(data.code === 1){
                            layer.msg(data.msg);
                            setTimeout(function(){
                                parent.location.reload();
                            }, 500);
                        }else {
                            layer.msg(data.msg);
                        }
                    }
                });
                return false;
            });
        });
    });
</script>

</html>