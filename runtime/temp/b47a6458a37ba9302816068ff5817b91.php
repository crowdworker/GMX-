<?php /*a:2:{s:74:"/home/gemxpbra/public_html/application/admin/view/member/member_money.html";i:1697722712;s:89:"/home/gemxpbra/public_html/application/admin/view/../../../public/static/common/base.html";i:1697722706;}*/ ?>
<!DOCTYPE html>
<html class="x-admin-sm">
<head>
    <meta charset="UTF-8">
    <title>管理员编辑</title>
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
    
</head>
<body>

<div class="layui-fluid">
    <div class="layui-row">
        <form class="layui-form" action="<?php echo url('member/memberMoney'); ?>">
            <input type="hidden" name="id" value="<?php echo htmlentities($member['id']); ?>">
            <div class="layui-form-item">
                <label for="uid" class="layui-form-label" style="width:100px;">
                    <span class="x-red"></span>会员手机号
                </label>
                <div class="layui-input-inline">
                    <input type="text"  value="<?php echo htmlentities($member['tel']); ?>" readonly autocomplete="off" class="layui-input">
                </div>
                <div class="layui-form-mid layui-word-aux">

                </div>
            </div>
            <div class="layui-form-item">
                <label for="money" class="layui-form-label" style="width:100px;">
                    <span class="x-red"></span>会员可提现余额
                </label>
                <div class="layui-input-inline">
                    <input type="number" id="balance" name="balance" autocomplete="off" class="layui-input">
                </div>
		（当前可提现余额：<?php echo htmlentities($member['balance']); ?>）
            </div>
            
            <div class="layui-form-item">
                <label for="money" class="layui-form-label" style="width:100px;">
                    <span class="x-red"></span>会员充值余额
                </label>
                <div class="layui-input-inline">
                    <input type="number" id="rechange_limit" name="rechange_limit" autocomplete="off" class="layui-input">
                </div>
		（当前充值余额：<?php echo htmlentities($member['rechange_limit']); ?>）
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">
                </label>
                <button  class="layui-btn" lay-filter="user_edit" lay-submit="">
                    发送
                </button>
            </div>
        </form>
    </div>
</div>

</body>

<script>
    layui.use(['form', 'layer'], function() {
        $ = layui.jquery;
        let form = layui.form,
            layer = layui.layer;

        form.on('select(chose_money)', function(data){
            $.ajax({
                url: '/admin/member/get_money',
                type: 'POST',
                dataType: 'JSON',
                data: {
                    u_id: $('#uid').val(),
                    type: data.value,
                },
                success: function (res) {
                    if(res.code == 2) {
                        layer.open({
                            content: res.msg
                            , skin: 'msg'
                            , time: 1
                        });
                    } else if (res.code == 1) {
                        console.log(res);
                        $("#money").val(res.money);
                    }
                }, fail: function (res) {

                }
            });
        });

        //监听提交
        form.on('submit(user_edit)', function(data) {
            let role = [];
            $("input:checkbox[name='role']:checked").each(function(i){
                role[i] = $(this).val();
            });
            $.ajax({
                url: data.form.action,
                type: 'post',
                data: {
                    id: data.field.id,
                    balance:data.field.balance,
                    coin:data.field.coin,
                    profit_recom:data.field.profit_recom,
                    profit_team:data.field.profit_team,
                    rechange_limit:data.field.rechange_limit,
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
</script>

</html>