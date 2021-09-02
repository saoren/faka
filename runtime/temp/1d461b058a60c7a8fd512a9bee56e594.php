<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:85:"/www/wwwroot/vorp.top/application/templates/pc/manage/default/cash_channel/index.html";i:1539744080;s:74:"/www/wwwroot/vorp.top/application/templates/pc/manage/default/content.html";i:1539744038;}*/ ?>
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
        
<form onsubmit="return false;" data-auto="" method="POST">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class='text-center'>编号</th>
                <th class='text-center'>渠道名称</th>
                <th class='text-center'>渠道类型</th>
                <th class='text-center'>渠道状态</th>
                <th class='text-center'>操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($channelList) || $channelList instanceof \think\Collection || $channelList instanceof \think\Paginator): $i = 0; $__LIST__ = $channelList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
            <tr>
                <td class='text-center'><?php echo $v['id']; ?></td>
                <td class='text-center'><?php echo $v['title']; ?></td>
                <td class='text-center'>
                    <?php if($v['type'] == 1): ?>支付宝<?php endif; if($v['type'] == 2): ?>微信<?php endif; if($v['type'] == 3): ?>银行<?php endif; ?>
                </td>
                <?php if($v['status'] == 1): ?>
                <td class='text-center'>启用</td>
                <?php else: ?>
                <td class='text-center'>禁用</td>
                <?php endif; ?>
                <td class='text-center'>
                    <div class="layui-btn-group">
                        <button type="button" class='layui-btn layui-btn-small' data-modal='<?php echo url("CashChannelAccount/add"); ?>?channel_id=<?php echo $v['id']; ?>'
                            data-title="添加账号">添加账号</button>
                        <button type="button" class='layui-btn layui-btn-small' data-open='<?php echo url("CashChannelAccount/index"); ?>?channel_id=<?php echo $v['id']; ?>'
                            data-title="账号列表">账号列表</button>
                        <?php if($v['status'] == 1): ?>
                        <button type="button" class='layui-btn layui-btn-danger layui-btn-small' onclick="changeStatus('<?php echo $v['id']; ?>','0')"
                            data-title="禁用">禁用
                        </button>&nbsp;
                        <?php else: ?>
                        <button type="button" class='layui-btn layui-btn-small' onclick="changeStatus('<?php echo $v['id']; ?>','1')"
                            data-title="启用">启用
                        </button>&nbsp;
                        <?php endif; ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</form>
<script>
    //更新接口状态
    function changeStatus(id, status) {
        $.ajax({
            url: '<?php echo url("change_status"); ?>',
            type: 'post',
            dataType: 'json',
            data: {
                channel_id: id,
                status: status
            },
            success: function (res) {
                if (res.code == 200) {
                    location.reload();
                } else {
                    alert(res.msg);
                }
            }
        });
    }
</script>

    </div>
    
</div>