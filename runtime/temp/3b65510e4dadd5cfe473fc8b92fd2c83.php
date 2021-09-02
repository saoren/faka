<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/vorp.top/application/templates/pc/index/t3blue//pay/order.html";i:1539744064;}*/ ?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <title></title>
    <script src="/static/app/js/jquery-2.2.1.min.js"></script>
    <script src="/static/app/js/layer.js"></script>
    <style>
        body{
            font-family: "Microsoft Yahei", "微软雅黑", "Pinghei";
        }
        button,a{
            border: none;
            font-size: 16px;
        }
        .order_show{
            padding:20px;
        }
        .order_info{
            line-height:30px;
            font-size:14px;
            color:#666;
            padding:20px;
        }
        .order_pay{
            line-height:30px;
            font-size:16px;
            color:#333;
            padding:20px;
            /*border-bottom:1px solid #eee;*/
        }
        .order_pay img{
            float: left;
            margin-right: 20px;
        }
        .order_pay p{
            margin: 0;
            float: left;
        }
        .order_pay p span{
            color: crimson;
        }
        .order_btn1, .order_btn2 {
            display: block;
            text-decoration: none;
            color: #fff;
            margin: 10px;
            float: left;
            height: 40px;
            line-height: 40px;
            width: calc(50% - 20px);
            text-align: center;
            border-radius: 3px;
            font-size: 12px;
        }
        .order_btn1{
            background: crimson;
        }
        .order_btn2{
            background: #ccc;
        }
		@media only screen and (min-width: 768px) {
			.layui-layer-iframe{min-height: 400px;}

		}
		@media only screen and (max-width: 768px) {
			.layui-layer-iframe{width: 80%!important;}

		}
		.note{
	    	color: #8c8787;
    		font-size: 13px;
		}
</style>
</head>

<body>
    <?php if(isset($order) && $order): ?>
    <form id="payForm" name="p" method="post" action="/index/pay/payment" <?php if($isMobile == '0'): ?>target="_blank"
        <?php endif; ?>> <input type="hidden" name="trade_no" value="<?php echo $order['trade_no']; ?>">
        <div class="order_show">
            <div class="order_pay">
                <img src="/static/app/images/order_pay.png" alt="">
                <p>
                    支付金额：
                    <span><?php echo $order['total_price']; ?>元<?php if($order['coupon_type']==1): ?>(已优惠:<?php echo $order['coupon_price']; ?>元)<?php endif; ?> </span><br>
                    支付方式：
                    <span><?php echo $channel['title']; ?></span>
                </p>
                <div style="clear: both">
                </div>
            </div>
            <div class="order_info">
                订单编号： <?php echo $order['trade_no']; ?>
                <br>
                商品名称： <?php echo $order['goods_name']; ?>
                <br>
                购买数量： <?php echo $order['quantity']; ?>
            </div>
            <div class="ymm-prompt form-group">
                <p style="padding-left: 16px;">
                    <input style="display:inline-block;vertical-align: middle;" id="check" class="checkbox" name="agree"
                        type="checkbox" checked>
                    <span class="color1" style="font-size: 12px;">点击同意<a id="agreement" href="javascript:;" target="_blank"
                            style="margin-top:-1px;display:inline-block;font-size: 12px;text-decoration: none;color: crimson;">《用户协议》</a>
                    </span>
                </p>
            </div>
            <div class="paybtn" id="d1">
                <button class="order_btn1" type="button" id="pay_btn">确认付款</button>
                <a onclick="back_url()" class="order_btn2">重新选择</a>
            </div>
            <div class="paybtn" style="display:none;" id="d2">
                <a onclick="back_url()" class="order_btn2">返回商品</a>
                <a href="/orderquery?orderid=<?php echo $order['trade_no']; ?>" id="pay" target="_parent" class="order_btn1"> 等待付款中...</a>
            </div>
            <div class="note">商品问题请先和商家交流，如果处理结果不满意，请于订单当日23点之前联系平台客服，超过时间认定订单没问题。</div>
        </div>
    </form>
    <script type="text/javascript">
        $('#agreement').click(function () {
            layer.open({
                type: 2,
                title: '用户协议',
                area: ['80%'],
                anim: 2,
                content: ['/index/index/service_agreement']

            });
        })
        $('#pay_btn').click(function () {
            if (false === $("#check").is(':checked')) {
                layer.msg('请先同意用户协议');
                return false;
            }
            $('#payForm').submit();
        });

        function back_url() {
            try {
                parent.$.nyroModalRemove();
            } catch (err) {
                window.history.back();
            }
            return false;
        }

        function query_url() {
            try {
                parent.location.href = '/orderquery?orderid=<?php echo $order['trade_no']; ?>';
            } catch (err) {
                window.location.href = '/orderquery?orderid=<?php echo $order['trade_no']; ?>';
            }
            return false;
        }

        function oderquery(t) {
            var orderid = '<?php echo $order['trade_no']; ?>';
            $.post('/pay/getOrderStatus', {
                orderid: orderid,
                token: "<?php echo $token; ?>"
            }, function (ret) {
                if (ret == 1) {
                    $("#pay").html("付款成功，查看卡密");
                }
            });
            t = t + 1;
            setTimeout('oderquery(' + t + ')', 3000);
        }
        $(function () {
            $("#d1").click(function () {
                $("#d1").hide();
                $("#d2").show().attr("dis");
                setTimeout('oderquery(1)', 3000);
            });
        });
    </script>
    <?php else: ?>
    <div class="order_show">
        <div class="order_pay">
            <p style="width: 100%;text-align: center"><?php echo $error; ?></p>
            <div class="paybtn">
                <a onclick="parent.$.nyroModalRemove();" class="order_btn2" style="float: none;position: fixed; bottom: 30px;left: 50%;margin-left: -127.5px;">关闭</a>
            </div>
        </div>
    </div>
    <?php endif; ?>
</body>

</html>