<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/www/wwwroot/vorp.top/application/templates/pc/manage/default/order/index.html";i:1543624690;s:74:"/www/wwwroot/vorp.top/application/templates/pc/manage/default/content.html";i:1539744038;}*/ ?>
<div class="ibox">
    
    <?php if(isset($title)): ?>
    <div class="ibox-title notselect">
        <h5><?php echo $title; ?></h5>
        
<div class="nowrap pull-right" style="margin-top:10px">
    <div class="layui-btn-group">
        <a href="<?php echo $self_url; ?>&#38;date_type="
           class="layui-btn layui-btn-small <?php if(\think\Request::instance()->get('date_type') != ''): ?>layui-btn-primary<?php else: ?>layui-btn-normal<?php endif; ?>">全部</a>
        <a href="<?php echo $self_url; ?>&#38;date_type=month"
           class="layui-btn layui-btn-small <?php if(\think\Request::instance()->get('date_type') != 'month'): ?>layui-btn-primary<?php else: ?>layui-btn-normal<?php endif; ?>">本月</a>
        <a href="<?php echo $self_url; ?>&#38;date_type=week"
           class="layui-btn layui-btn-small <?php if(\think\Request::instance()->get('date_type') != 'week'): ?>layui-btn-primary<?php else: ?>layui-btn-normal<?php endif; ?>">本周</a>
        <a href="<?php echo $self_url; ?>&#38;date_type=day"
           class="layui-btn layui-btn-small <?php if(\think\Request::instance()->get('date_type') != 'day'): ?>layui-btn-primary<?php else: ?>layui-btn-normal<?php endif; ?>">今日</a>
    </div>
    <a href="<?php echo $self_no_url; ?>&action=dump" target="_blank" class="layui-btn layui-btn-small" style="">导出数据</a>
    <button type="button" class="layui-btn layui-btn-small layui-btn-danger" data-modal="/manage/order/del_batch">
        <i class="fa fa-remove"></i> 删除无效订单
    </button>
</div>

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
<form class="layui-form layui-form-pane form-search" action="__SELF__" onsubmit="return false" method="get">
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">商户账号</label>
        <div class="layui-input-inline">
            <input name="username" value="<?php echo (\think\Request::instance()->get('username') ?: ''); ?>" placeholder="请输入商户账号" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">客户联系方式</label>
        <div class="layui-input-inline">
            <input name="contact" value="<?php echo (\think\Request::instance()->get('contact') ?: ''); ?>" placeholder="请输入客户联系方式" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">支付订单号</label>
        <div class="layui-input-inline">
            <input name="trade_no" value="<?php echo (\think\Request::instance()->get('trade_no') ?: ''); ?>" placeholder="请输入支付订单号" class="layui-input">
        </div>
    </div>
    <!--<div class="layui-form-item layui-inline">-->
    <!--<label class="layui-form-label">上游订单号</label>-->
    <!--<div class="layui-input-inline">-->
    <!--<input name="transaction_id" value="<?php echo (\think\Request::instance()->get('transaction_id') ?: ''); ?>" placeholder="请输入上游订单号" class="layui-input">-->
    <!--</div>-->
    <!--</div>-->
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">卡密信息</label>
        <div class="layui-input-inline">
            <input name="card" value="<?php echo (\think\Request::instance()->get('card') ?: ''); ?>" placeholder="请输入卡密信息" class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">支付渠道</label>
        <div class="layui-input-inline">
            <select name="channel_id">
                <option value="">全部渠道</option>
                <?php foreach($channels as $v): ?>
                <option value="<?php echo $v['id']; ?>" {if $Think.get.channel_id== $v.id}selected{
                /if}><?php echo $v['title']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">支付方式</label>
        <div class="layui-input-inline">
            <select name="paytype">
                <option value="">请选择</option>
                <?php foreach($channel_paytype as $k => $v): ?>
                <option value="<?php echo $v['id']; ?>" <?php if(intval(\think\Request::instance()->get('paytype'))===intval($v['id'])): ?>selected<?php endif; ?>><?php echo $v['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">订单状态</label>
        <div class="layui-input-inline">
            <select name="status">
                <option value="">请选择</option>
                <option value="1" <?php if(\think\Request::instance()->get('status')===
                '1'): ?>selected<?php endif; ?>>已成功</option>
                <option value="0" <?php if(\think\Request::instance()->get('status')===
                '0'): ?>selected<?php endif; ?>>未支付</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">冻结状态</label>
        <div class="layui-input-inline">
            <select name="is_freeze">
                <option value="">全部状态</option>
                <option value="1" <?php if(\think\Request::instance()->get('is_freeze')===
                '1'): ?>selected<?php endif; ?>>已冻结</option>
                <option value="0" <?php if(\think\Request::instance()->get('is_freeze')===
                '0'): ?>selected<?php endif; ?>>未冻结</option>
            </select>
        </div>
    </div>
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">时间范围</label>
        <div class="layui-input-inline">
            <input name="date_range" id="date_range" value="<?php echo urldecode(\think\Request::instance()->get('date_range')); ?>" placeholder="请选择时间范围"
                   class="layui-input">
        </div>
    </div>
    <div class="layui-form-item layui-inline">
        <label class="layui-form-label">展现方式</label>
        <div class="layui-input-inline">
            <select name="show">
                <option value="sheet" <?php if(\think\Request::instance()->get('show')===
                '' || \think\Request::instance()->get('show') === 'sheet'): ?>selected<?php endif; ?>>表格</option>
                <option value="chart" <?php if(\think\Request::instance()->get('show')===
                'chart'): ?>selected<?php endif; ?>>图表</option>
            </select>
        </div>
    </div>

    <div class="layui-form-item layui-inline">
        <button type="submit" class="layui-btn layui-btn-primary"><i class="layui-icon">&#xe615;</i> 搜 索</button>
    </div>
</form>
<!-- 表单搜索 结束 -->
<div class="layui-form-item layui-inline">
    <label class="layui-form-label">统计金额</label>
    <div class="layui-input-inline">
        <input type="text" class="layui-input" value="<?php echo (isset($sum_money) && ($sum_money !== '')?$sum_money:" 0"); ?> 元" readonly>
    </div>
</div>
<div class="layui-form-item layui-inline">
    <label class="layui-form-label">交易笔数</label>
    <div class="layui-input-inline">
        <input type="text" class="layui-input" value="<?php echo (isset($sum_order) && ($sum_order !== '')?$sum_order:" 0"); ?> 笔" readonly>
    </div>
</div>

<?php if(\think\Request::instance()->get('show')=='chart'): ?>
<div id="statis_chart" style="width: 100%;height:300px;"></div>
<script>
    var statis_chart = echarts.init(document.getElementById('statis_chart'));
    var month_option = {
        title: {
            text: '交易统计'
        },
        color: ['#45c8f4', '#4ab47a'],
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'cross'
            }
        },
        legend: {
            data: ['交易金额', '收入金额']
        },
        grid: {
            top: 70,
            bottom: 50
        },
        xAxis: [
            {
                type: 'category',
                boundaryGap: false,
                data: [<?php echo $statis_chart['title']; ?>]
    }
    ],
    yAxis: [
        {
            type: 'value'
        }
    ],
        series
    :
    [
        {
            name: '交易金额',
            type: 'line',
            smooth: true,
            data: [<?php echo $statis_chart['transaction_money']; ?>]
    },
    {
        name:'收入金额',
            type
    :
        'line',
            smooth
    :
        true,
            data
    :
        [<?php echo $statis_chart['actual_money']; ?>]
    }
    ]
    }
    ;

    statis_chart.setOption(month_option);
</script>
<?php else: ?>
<form onsubmit="return false;" data-auto="true" method="post">
    <input type="hidden" value="resort" name="action"/>
    <table class="layui-table" lay-skin="line" lay-size="sm">
        <thead>
        <tr>
            <th class='text-center'>店铺名称</th>
            <th class='text-center'>商户账号</th>
            <th class='text-center'>客户联系方式</th>
            <th class='text-center'>支付订单号</th>
            <!--<th class='text-center'>上游订单号</th>-->
            <th class='text-center'>取卡密码</th>
            <th class='text-center'>商品名称</th>
            <th class='text-center'>商品数量</th>
            <th class='text-center'>金额</th>
            <th class='text-center'>手续费率</th>
            <th class='text-center'>手续费</th>
            <th class='text-center'>支付渠道</th>
            <th class='text-center'>订单状态</th>
            <th class='text-center'>取卡状态</th>
            <th class='text-center'>冻结状态</th>
            <th class='text-center'>下单时间</th>
            <th class='text-center'>操作</th>
        </tr>
        </thead>
        <tbody>
        <!--<?php  $total_price = 0;  ?>-->
        <?php foreach($orders as $v): ?>
        <!--<?php  $total_price += $v['total_price']; ?>-->
        <tr>
            <td class='text-center'><?php echo $v['user']['shop_name']; ?></td>
            <td class='text-center'><?php echo $v['user']['username']; ?></td>
            <td class='text-center'><?php echo $v['contact']; ?></td>
            <td class='text-center'><?php echo $v['trade_no']; ?></td>
            <!--<td class='text-center'><?php echo $v['transaction_id']; ?></td>-->
            <td class="text-center"><?php echo $v['take_card_password']; ?></td>
            <td class='text-center' style="max-width: 150px;"><?php echo $v['goods_name']; ?></td>
            <td class='text-center'><?php echo $v['quantity']; ?></td>
            <td class='text-center'><?php echo $v['total_price']; ?></td>
            <td class='text-center'><?php echo $v['rate']*1000; ?>‰</td>
            <td class='text-center'><?php echo $v['fee']; ?></td>
            <td class='text-center'><?php echo $v['channel']['title']; ?></td>
            <td class='text-center'>
                <?php if($v['status']==1): ?>
                <font color="green">已支付</font>
                <?php else: ?>
                <font color="red">未支付</font>
                <?php endif; ?>
            </td>
            <td class='text-center'>
                <?php if($v['cards_count']>0): if($v['cards_count']>=$v['quantity']): ?>
                <font color="green">已取</font>
                <?php else: ?>
                <font color="blue">已取部分</font>
                <?php endif; else: ?>
                <font color="red">未取</font>
                <?php endif; ?>
            </td>
            <td class='text-center'>
                <?php if($v['status']==1): if($v['is_freeze']==1): ?>
                <a style="color:red" data-tips="确定取消冻结吗？ " data-update="<?php echo $v['id']; ?>" data-field='status' data-value='0'
                   data-action='<?php echo url("change_freeze_status"); ?>'
                   href="javascript:void(0)">已冻结</a>
                <?php else: ?>
                <a style="color:green" data-tips="确定冻结吗？" data-update="<?php echo $v['id']; ?>" data-field='status' data-value='1'
                   data-action='<?php echo url("change_freeze_status"); ?>'
                   href="javascript:void(0)">未冻结</a>
                <?php endif; endif; ?>
            </td>
            <td class='text-center'><?php echo date("Y-m-d H:i:s",$v['create_at']); ?></td>
            <td>
                <a href="<?php echo url("manage/user/login"); ?>?user_id=<?php echo $v['user_id']; ?>" target="_blank">登录</a>
                <a data-title="详情" data-modal='<?php echo url("detail"); ?>?id=<?php echo $v['id']; ?>' href="javascript:void(0)">详情</a>
                <?php if($v['status'] == 0): ?>
                <a href="javascript:;" onclick="order_del(this,'<?php echo $v['id']; ?>')">删除</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</form>
<?php echo $page; ?>
<ul style="display: inline-block;padding-left: 0;margin: 20px 0;border-radius: 4px;">
    <li style="position: relative; float: left; padding: 6px 12px; margin-left: 10px; line-height: 1.42857143; text-decoration: none; background-color: #fff;">
        该页成功金额 <?php echo $total_price; ?> 元
    </li>
</ul>
<?php endif; ?>
<script>
    layui.use('form', function () {
        var form = layui.form; //只有执行了这一步，部分表单元素才会自动修饰成功
        form.render();
    });
    layui.use('laydate', function () {
        var laydate = layui.laydate;
        //日期范围
        laydate.render({
            elem: '#date_range',
            range: true
        });
    });

    /*订单-删除*/
    function order_del(obj, id) {
        layer.confirm('确认要删除这个订单吗？该操作不可恢复', function (index) {
            $.ajax({
                url: "/manage/order/del",
                type: 'post',
                data: 'id=' + id,
                success: function (res) {
                    if (res.code == 1) {
                        $(obj).parents("tr").remove();
                        layer.msg('已删除!', {icon: 1, time: 1000});
                    } else {
                        layer.msg('删除失败!', {icon: 1, time: 1000});
                    }
                }
            });
        });
    }
</script>

    </div>
    
</div>