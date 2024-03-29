<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/www/wwwroot/vorp.top/application/templates/pc/manage/default/content/del.html";i:1541750644;s:74:"/www/wwwroot/vorp.top/application/templates/pc/manage/default/content.html";i:1539744038;}*/ ?>
<div class="ibox">
    
    <?php if(isset($title)): ?>
    <div class="ibox-title notselect">
        <h5><?php echo $title; ?></h5>
        
    </div>
    <?php endif; ?>
    <div class="ibox-content">
        <?php if(isset($alert)): ?>
        <div class="alert alert-<?php echo $alert['type']; ?> alert-dismissible" role="alert" style="border-radius:0">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <?php if(isset($alert['title'])): ?><p style="font-size:18px;padding-bottom:10px"><?php echo $alert['title']; ?></p><?php endif; if(isset($alert['content'])): ?><p style="font-size:14px"><?php echo $alert['content']; ?></p><?php endif; ?>
        </div>
        <?php endif; ?>
        

<!-- 表单搜索 开始 -->
<form id="del-form" class="layui-form layui-box" style='padding:25px 30px 20px 0' action="__SELF__" data-auto="true"
      method="post">

    <?php echo token(); ?>

    <div class="layui-form-item">
        <label class="layui-form-label">数据类型</label>
        <div class="layui-input-block">
            <select name="model" id="model">
                <option value="order">订单数据</option>
                <option value="cash">提现数据</option>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">订单日期范围</label>
        <div class="layui-input-block">
            <input name="order_date_range" id="order_date_range" value="" placeholder="请选择日期范围" class="layui-input">
        </div>
    </div>

    <div>
        <label class="layui-form-label">短信验证码</label>
        <div class="layui-input-block">
            <input name="chcode" id="chcode" value="" placeholder="请输入短信验证码" class="layui-input">
            <button type="button" style="margin: 1rem 0" class="btn btn-primary" onclick="sendSms()" id="sendbtn">发送短信
            </button>
        </div>
    </div>

    <div class="hr-line-dashed"></div>
    <div class="layui-form-item text-center">
        <button class="layui-btn" id="del_submit" type="button">删除</button>
        <button class="layui-btn layui-btn-danger" type="button" data-close="">取消</button>
    </div>
</form>
<script>
    layui.use('form', function () {
        var form = layui.form; //只有执行了这一步，部分表单元素才会自动修饰成功
        layer = layui.layer;
        form.render();
    });
    layui.use('laydate', function () {
        var laydate = layui.laydate;
        //日期范围
        laydate.render({
            elem: '#order_date_range',
            range: true,
            max: '<?php echo $max_date; ?>'
        });
    });

    function sendSms() {
        $.post("<?php echo url('manage/order/sendDelBatchSms'); ?>", {}, function (res) {
            layer.msg(res.msg);
        }, 'json')
    }


    $('#del_submit').click(function () {
        var date_range = $('#order_date_range').val();
        if (date_range == '') {
            layer.msg('请先选择日期范围！');
            return false;
        }

        var chcode = $('#chcode').val();
        if (chcode == '') {
            layer.msg('请输入短信验证码！');
            return false;
        }

        layer.confirm('确定要删除【' + date_range + '】之间的数据吗？该操作不可恢复！', function (index) {
            layer.load();
            $.ajax({
                url: "/manage/content/del",
                type: 'post',
                data: $('#del-form').serialize(),
                success: function (res) {
                    layer.closeAll();
                    if (res.code == 1) {
                        layer.closeAll();
                        layer.alert(res.msg);
                        $.form.reload();
                    } else {
                        layer.msg(res.msg, {icon: 1, time: 1000}, function () {
                            $.form.reload();
                        });
                    }
                },
                error: function () {
                    layer.closeAll();
                }
            });
        });
    });
</script>

    </div>
    
</div>