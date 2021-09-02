<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/vorp.top/application/templates/pc/manage/default/order/detail.html";i:1539744074;}*/ ?>
<form class="layui-form layui-box" style='padding:25px 30px 20px 0' action="__SELF__" data-auto="true" method="post">

    <div class="layui-form-item">
        <label class="layui-form-label">商户ID</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['user_id']; ?>" class="layui-input" readonly>
        </div>
        <label class="layui-form-label">商户账号</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['user']['username']; ?>" class="layui-input" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">订单号</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['trade_no']; ?>" class="layui-input" readonly>
        </div>
        <label class="layui-form-label">流水号</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['transaction_id']; ?>" class="layui-input" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">商品名称</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['goods_name']; ?>" class="layui-input" readonly>
        </div>
        <label class="layui-form-label">商品数量</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['quantity']; ?>" class="layui-input" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">商品单价</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['goods_price']; ?>" class="layui-input" readonly>
        </div>
        <label class="layui-form-label">商品成本价</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['goods_cost_price']; ?>" class="layui-input" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">优惠券</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php if($order['coupon_type']==1): ?>优惠<?php echo $order['coupon_price']; ?>元<?php else: ?>未使用<?php endif; ?>" class="layui-input" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">总价</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['total_price']; ?>" class="layui-input" readonly>
        </div>
        <label class="layui-form-label">总成本价</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['total_cost_price']; ?>" class="layui-input" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">取卡密码</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php if($order['take_card_type']==1): ?><?php echo $order['take_card_password']; else: ?>未设置<?php endif; ?>" class="layui-input" readonly>
        </div>
        <label class="layui-form-label">联系方式</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['contact']; ?>" class="layui-input" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">邮件通知</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php if($order['email_notify']==1): ?><?php echo $order['email']; else: ?>未设置<?php endif; ?>" class="layui-input" readonly>
        </div>
        <label class="layui-form-label">短信通知</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php if($order['sms_notify']==1): ?><?php echo $order['contact']; else: ?>未设置<?php endif; ?>" class="layui-input" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">支付类型</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo get_paytype_name($order['paytype']); ?>" class="layui-input" readonly>
        </div>
        <label class="layui-form-label">交易通道</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['channel']['title']; ?>" class="layui-input" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">手续费率</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['rate']*1000; ?>‰" class="layui-input" readonly>
        </div>
        <label class="layui-form-label">手续费</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['fee']; ?>" class="layui-input" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">状态</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['status_text']; ?>" class="layui-input" readonly>
        </div>
        <label class="layui-form-label">取卡状态</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php if($order['cards_count']>0): if($order['cards_count']>=$order['quantity']): ?>已取<?php else: ?>已取部分<?php endif; else: ?>未取<?php endif; ?>" class="layui-input" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">提交时间</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo date('Y-m-d H:i:s',$order['create_at']); ?>" class="layui-input" readonly>
        </div>
        <label class="layui-form-label">提交IP</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php echo $order['create_ip']; ?>" class="layui-input" readonly>
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">完成时间</label>
        <div class="layui-input-inline">
            <input type="text" value="<?php if($order['success_at'] > 0): ?><?php echo date('Y-m-d H:i:s',$order['success_at']); endif; ?>" class="layui-input" readonly>
        </div>
    </div>

</form>
