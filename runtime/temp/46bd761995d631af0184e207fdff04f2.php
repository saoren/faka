<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/www/wwwroot/vorp.top/application/templates/mobile/shop/default//index.html";i:1539744040;s:75:"/www/wwwroot/vorp.top/application/templates/mobile/shop/default/layout.html";i:1543624690;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php if($shop['shop_name']): ?><?php echo $shop['shop_name']; ?> - <?php endif; ?><?php echo sysconf('site_name'); ?></title>
    <meta name="keywords" content="<?php echo sysconf('site_keywords'); ?>"/>
    <meta name="description" content="<?php echo sysconf('site_desc'); ?>"/>
    <link rel="shortcut icon" href="<?php echo sysconf('browser_icon'); ?>"/>
    <!--    模版页面样式文件开始-->
    <link href="/static/app/css/lsy.css" rel="stylesheet" type="text/css">
    <link href="/static/app/css/pay.css" rel="stylesheet" type="text/css">
    <link href="/static/app/css/iconfont.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/static/app/css/sweetalert.css">
    <!--    模版页面样式文件结束-->

    <!--    点击购买遮罩弹窗开始-->
    <link href="/static/app/css/nyro.css" rel="stylesheet" type="text/css">
    <script src="/static/app/js/jquery.min.js"></script>
    <script src="/static/app/js/nyro.js"></script>
    <!--    点击购买遮罩弹窗结束-->

    <!--    核心文件开始-->
    <script src="/static/app/js/woodyapp.js?_v=<?php echo date('YmdHi'); ?>"></script>
    <!--    核心文件结束-->

    <!--    支付方式样式文件开始-->
    <script src="/static/app/js/layer.js"></script>
    <script src="/static/app/js/sweetalert.min.js"></script>
    <style>
        .sweet-alert p {
            word-wrap: break-word;
        }

        .notice p {
            height: 10rem;
            overflow: auto;
        }

        .notice p pre {
            white-space: pre-wrap;
        }
    </style>
    <!--    支付方式样式文件结束-->
    
    

</head>
<script>
    var user_popup_message = '';
    var is_display = '0';
    var userid = "<?php echo $shop['id']; ?>";
    var cateid = 0;
    var static_url = '__PUBLIC__';
    var dis_pwd_content = '<div style="padding:10px;color:#cc3333;line-height:24px"><p style="float:left;font-size:14px;font-weight:bold;color:blue;">访问密码：</p><div style="float:right; font-size:14px; padding-left:20px;"><a href="#" style="color:#0064ff;text-decoration:none;display:inline-block;<?php if(isset($goods)): ?>display:none;<?php endif; ?>background:url(/static/app/images/x.png) left no-repeat;padding-left:15px;" class="nyroModalClose" onclick="closeNyro()">关闭</a></div><p style="clear:both;font-size:12px;font-weight:bold;color:red;"><input type="password" name="pwdforbuy" class="input" maxlength="20"> <input type="submit"  onclick="verify_pwdforbuy()" id="verify_pwdforbuy" style="font-size:12px;padding:3px 3px" value="验证密码"> <span id="verify_pwdforbuy_msg" style="display:none"><img src="/static/app/images/load.gif"> 正在验证...</span><ul><li>1.本商品购买设置了安全密码</li><li>2.只有成功验证密码后才能继续购买</li></ul></p></div>';
    var goodid = "<?php echo (isset($goods['id']) && ($goods['id'] !== '')?$goods['id']:0); ?>";
    var is_contact_limit = '<?php echo (isset($goods['contact_limit']) && ($goods['contact_limit'] !== '')?$goods['contact_limit']:""); ?>';
    var is_contact_limit_default = '<?php echo (isset($goods['contact_limit']) && ($goods['contact_limit'] !== '')?$goods['contact_limit']:""); ?>';
    var limit_quantity_tip = '无法修改购买数量，是因为本商品限制了购买数量。';

    /* <?php if(!isset($goods)): ?> */

    function closeNyro() {
        $('[name="goodid"]').val('');
        $('[name="goodid"]').change();
    }

    /* <?php endif; ?> */
</script>

<body>
<input type="hidden" name="is_contact_limit" value="<?php echo (isset($goods['contact_limit']) && ($goods['contact_limit'] !== '')?$goods['contact_limit']:""); ?>">
<input type="hidden" name="limit_quantity" value="<?php echo (isset($goods['limit_quantity']) && ($goods['limit_quantity'] !== '')?$goods['limit_quantity']:1); ?>">
<!--顶部-->
<div class="aaa" style="display: none"><?php echo $shop['shop_notice']; ?></div>
<div class="top_bg">
    <div class="top">
        <div class="logo">
            <img src="<?php echo sysconf('site_logo'); ?>" alt="" height="24" style="vertical-align: middle">
        </div>
        <div class="seller_name">
            <i class="iconfont icon-tehuishanghu"></i>
            <?php echo $shop['shop_name']; ?>
        </div>
    </div>
    <div class="top_menu">
        <ul>
            <li onclick="window.open('/orderquery')"><i class="iconfont icon-sousuo2"></i><br>查询订单</li>
            <li class="gg_btn"><i class="iconfont icon-dingdan"></i><br>商家公告</li>
            <li onclick="window.open('//wpa.qq.com/msgrd?v=1&uin=<?php echo $shop['qq']; ?>&site=miaoka.la&menu=yes')"><i
                    class="iconfont icon-zixun"></i><br>咨询卖家
            </li>
        </ul>
    </div>
    <div class="clear"></div>
</div>
<form id="payform" name="p" method="get" action="/pay/order">
    <div class="seller_form">
        <ul>
            

<li><span class="form_title">商品分类</span>
    <select name="cateid" id="cateid" onchange="selectcateid()" style="width:calc(93% - 72px);margin-left: 3%">
        <option value="">请选择分类</option>
        <?php foreach($categorys as $v): ?>
        <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
        <?php endforeach; ?>
    </select>
</li>
<!--            如果是店铺链接结束-->
<!--            如果是分类链接或者是店铺链接结束-->
<!--            如果是单个商品链接开始-->
<li>
    <span class="form_title">商品名称</span>
    <select style="width:calc(93% - 72px);margin-left: 3%" name="goodid" id="goodid" onchange="selectgoodid()">
        <option value="">请选择商品</option>
    </select>
</li>

            <!--如果是分类链接或者是店铺链接结束-->
            <input type="hidden" name="userid" value="<?php echo $shop['id']; ?>">
            <input type="hidden" name="cardNoLength" value="0">
            <input type="hidden" name="cardPwdLength" value="0">
            <input type="hidden" name="is_discount" id="is_discount" value="0">
            <input type="hidden" name="coupon_ctype" value="0">
            <input type="hidden" name="coupon_value" value="0">
            <input type="hidden" name="sms_price" value="0">

            <li style="position: relative"><span class="form_title">购买数量</span><input
                    style="width:calc(93% - 72px);margin-left: 3%"
                    type="text" value="1" name="quantity" onkeyup="changequantity2()"><span class="green"
                                                                                            id="goodInvent"
                                                                                            style="position: absolute;right: 0;top:0"></span>
            </li>
            <li><span class="form_title">商品单价</span>
                <p class="spdj"><span class="big_text" id="price">0.00</span> 元
                    <span style="display:none;color: #648ff7;" id="isdiscount_span">(查看批发价格)</span>
                <div id="discountdetail" style="display: none;"></div>
                </p>
            </li>
            <li><span class="form_title">联系方式</span><input style="width:calc(93% - 72px);margin-left: 3%"
                                                           class="phone_num"
                                                           type="text" name="contact" placeholder="推荐填写QQ号或手机号"
                                                           data-onchange="js_check_contact()"></li>
            <li style="display:none"><span class="form_title">邮箱</span><input
                    style="width:calc(93% - 72px);margin-left: 3%"
                    class="email" type="text" name="email" placeholder="填写邮箱" onblur="checkemail2()"></li>
            <li id="pwdforsearch1" style="display:none"><span class="form_title">取卡密码</span><input
                    style="width: calc(100% - 110px);"
                    type="text" onblur="is_pwd_need()" name="pwdforsearch1" placeholder="[必填]请输入取卡密码（6-20位）"></li>
            <li id="pwdforsearch2" style="display:none"><span class="form_title">取卡密码</span><input
                    style="width: calc(100% - 110px);"
                    type="text" onblur="is_pwd_not_need()" name="pwdforsearch2" placeholder="[选填]请输入取卡密码（6-20位）"></li>
            <li id="goodCoupon" style="display:none"><span class="form_title">优惠券&nbsp;&nbsp;&nbsp;</span><input
                    style="width:calc(93% - 72px);margin-left: 3%" type="text" name="couponcode" onblur="checkCoupon2()"
                    placeholder="请填写你的优惠券"><span id="checkcoupon" style="display:none">正在查询...</span></li>
            <input type="hidden" name="is_pwdforsearch">
            <input type="hidden" name="is_coupon" value="">
            <li class="" style="display:none">折价率<br>
                <span class="rate">100</span><span>%</span>
            </li>
            <li>
                <label class="form_title">短信提醒<input type="checkbox" name="is_rev_sms" value="1" id="is_rev_sms"
                                                     data-cost="<?php if(isset($goods) && $goods['sms_payer']==1): ?>0<?php else: ?><?php echo get_sms_cost(); endif; ?>"></label>
            </li>
            <li>
                <label class="form_title">邮箱提醒<input type="checkbox" name="isemail" value="1" id="isemail"></label>
            </li>
        </ul>
    </div>
    <div class="seller_sm">商品说明：<label id="remark"></label></div>
    <div class="payments" style="margin-left: 12px;margin-right: 12px;margin-bottom:100px;">
        <span class="form_title" style="margin-bottom: 4px">请选择支付方式</span>
        <input type="hidden" name="feePayer" value="<?php echo (isset($shop['fee_payer']) && ($shop['fee_payer'] !== '')?$shop['fee_payer']:1); ?>">
        <input type="hidden" name="fee_rate" value="<?php echo (isset($userChannels[0]['rate']) && ($userChannels[0]['rate'] !== '')?$userChannels[0]['rate']:0); ?>">
        <input type="hidden" name="min_fee" value="<?php echo sysconf('transaction_min_fee'); ?>">
        <ul>
            <!-- <?php echo $n=0; ?> -->
            <!--<?php foreach($userChannels as $v): ?>-->
            <!--<?php if($v['status']==1): ?>-->
            <li onclick="javascript:setFeeRate('<?php echo $v['rate']; ?>')">
                <img src="/static/app/images/<?php echo get_paytype_info($v['paytype'])['logo']; ?>.jpg" alt=""><?php echo get_paytype_name($v['paytype']); ?>
                <span <?php if($n==0): ?>class="pay_choose" <?php endif; ?>> </span>
                <!--<?php if(isset(get_paytype_info($v['paytype'])['target'])): ?>-->
                <input name="pid" data-target='1' value="<?php echo $v['channel_id']; ?>" type="radio">
                <!--<?php else: ?>-->
                <input name="pid" value="<?php echo $v['channel_id']; ?>" type="radio">
                <!--<?php endif; ?>-->
            </li>
            <!-- <?php echo $n++; ?> -->
            <!--<?php endif; ?>-->
            <!--<?php endforeach; ?>-->
        </ul>
    </div>
</form>
<div class="pay_bottom" style="height: 88px">
    <p style="width: 100%;">应付总额： <span class="pay_all tprice">0.00</span> 元</p>
    <div>
        <button id="submit" type="button" style="width: 100%;">去支付</button>
    </div>
</div>
<div id="notice_tpl" style="display:none;">
    <pre><?php echo $shop['shop_notice']; ?></pre>
</div>

<script>
    /*
     * 显示批发优惠价格
     */
    $("#isdiscount_span").hover(
        function () {
            //1.获取数据
            var discountdetail2 = '';
            var goodid = $('#goodid').val();
            $.ajax({
                url: '/ajax/getdiscountdetails',
                data: {
                    goodid: goodid,
                },
                type: 'post',
                dataType: 'json',
                async: false,
                success: function (data) {
                    console.log(data);
                    $('#discountdetail').html(data);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    layer.msg('连接错误');
                }
            });
            //3.显示数据
            var discountdetail2 = $('#discountdetail').html();
            if (discountdetail2 != '') {
                //显示样式
                var index = layer.tips(discountdetail2, $('#isdiscount_span'), {
                    tips: [1, '#4B4B4B'],
                    time: 0
                });
                //显示数据
                $(this).attr("data-index", index);
            }
        },
        //4.关闭显示
        function () {
            layer.close($(this).attr("data-index"));
        });

    function changequantity2() {
        goodDiscount();
        goodschk();
        var quantity = $("input[name='quantity']").val();
        var kucun = $("input[name='kucun']").val();
        if (quantity < 1) {
            return false;
        } else if ((quantity - kucun) > 0) {
            layer.msg('您输入的购买数量超过库存数量，请重新输入！');
            $('[name=quantity]').focus();
        }
    }

    $(function () {
        $('.payments li').click(function () {
            $(this).children('span').addClass('pay_choose');
            $(this).siblings('li').find('span').removeClass('pay_choose');
            $(this).children('input').attr('checked', true);
            $(this).siblings('li').find('input').attr('checked', false);
        });

        $('.payments li:eq(0)').click();

        $('.seller_name').click(function () {
            swal({
                    title: "卖家Q Q",
                    text: "<?php echo $shop['qq']; ?>",
                    showCancelButton: true,
                    cancelButtonText: "返回",
                    confirmButtonText: "联系商户"
                },
                function () {
                    window.open('//wpa.qq.com/msgrd?v=1&uin=<?php echo $shop['qq']; ?>&site=miaoka.la&menu=yes'); //联系QQ链接
                }
            );
        });
        $('.gg_btn').click(function () {
            swal({
                title: "商户公告",
                html: true,
                text: $('#notice_tpl').html(),
                confirmButtonText: "已阅",
                customClass: 'notice'
            });
        });
        $('.pf_btn').click(function () {
            swal({
                title: "批发优惠",
                text: "批发优惠内容！",
                confirmButtonText: "返回"
            });
        });
        /* <?php if($shop['shop_notice_auto_pop'] == 1): ?>*/

        $('.gg_btn').click();

        /* <?php endif; ?> */
    });
    //-----js样式部分开始-----//

    //-----js样式部分结束-----//

    //-----js新增部分开始-----//
    function is_pwd_need() {
        //更新部分
        var pwdforsearch1 = $("input[name='pwdforsearch1']").val();
        if (pwdforsearch1 != '') {
            $("input[name='is_pwdforsearch']").val("1");
        } else {
            $("input[name='is_pwdforsearch']").val("");
        }
        var reg = /^([0-9A-Za-z]+){6,20}$/;
        if (pwdforsearch1 != '' && !reg.test(pwdforsearch1)) {
            layer.msg('请填写6-20位取卡密码！', {
                icon: 2,
                time: 2000,
            });
            $('[name=pwdforsearch1]').focus();
            return false;
        }
    }

    function is_pwd_not_need() {
        //更新部分
        var pwdforsearch2 = $("input[name='pwdforsearch2']").val();
        if (pwdforsearch2 != '') {
            $("input[name='is_pwdforsearch']").val("1");
        } else {
            $("input[name='is_pwdforsearch']").val("");
        }
        var reg = /^([0-9A-Za-z]+){6,20}$/;
        if (pwdforsearch2 != '' && !reg.test(pwdforsearch2)) {
            layer.msg('请填写6-20位取卡密码！', {
                icon: 2,
                time: 2000,
            });
            $('[name=pwdforsearch2]').focus();
            return false;
        }
    }

    function js_check_contact() {
        //更新部分
        var contact = $.trim($("input[name='contact']").val());
        var reg = /^([0-9A-Za-z]+){6,20}$/;
        if (contact == '' || !reg.test(contact)) {
            layer.msg('联系方式最短6位！', {
                icon: 2,
                time: 2000,
            });
            $('[name=contact]').focus();
            return false;
        }
    }

    function checkemail2() {
        if (!$('#isemail').is(':checked')) {
            return;
        }
        var email = $("input[name='email']").val();
        var reg = /^([0-9a-zA-Z_-])+@([0-9a-zA-Z_-])+((\.[0-9a-zA-Z_-]{2,3}){1,2})$/;
        if (!email || email == null || email == "" || email == 0) {
            layer.msg('邮箱地址必填哦！', {
                icon: 2,
                time: 2000,
            });
            $('[name=email]').focus();
        } else if (reg.test(email)) {
            //showToast('success', '', '您输入的邮箱 填写正确^_^');
        } else {
            layer.msg('您输入的邮箱地址 填写有误！', {
                icon: 2,
                time: 2000,
            });
            $('[name=email]').focus();
        }
    }

    function checkCoupon2() {
        var couponcode = $.trim($('[name=couponcode]').val());
        if (cateid == 0) {
            cateid = $('#cateid').val();
        }
        $('#checkcoupon').show();
        $.post('/ajax/checkcoupon', {
            couponcode: couponcode,
            userid: userid,
            cateid: cateid,
            t: new Date().getTime()
        }, function (data) {
            if (data) {
                data = eval(data);
                if (data.result == 0) {
                    $('#checkcoupon').html(data.msg);
                    $('[name=is_coupon]').val("0"); //更新部分
                } else if (data.result == 1) {
                    $('[name=coupon_ctype]').val(data.ctype);
                    $('[name=coupon_value]').val(data.coupon);
                    $('[name=is_coupon]').val("1"); //更新部分
                    $('#checkcoupon').html('<span class="blue">此优惠券可用</span>');
                    goodschk();
                } else {
                    $('#checkcoupon').html('验证失败！');
                }
            }
        }, "json");
    }

    $('input[name="is_rev_sms"]').click(function () {
        if ($(this).is(':checked')) {
            $('[name=sms_price]').val(
                "<?php if(isset($goods) && $goods['sms_payer']==1): ?>0<?php else: ?><?php echo get_sms_cost(); endif; ?>"
            );
        } else {
            $('[name=sms_price]').val(0);
        }
        goodDiscount();
        goodschk();
        updateContactLimit();
    });
    $('input[name="isemail"]').click(function () {
        if ($(this).is(':checked')) {
            $("input[name='email']").parents('li').show();
        } else {
            $("input[name='email']").parents('li').hide();
        }
    })
    //-----js新增部分结束-----//
</script>
</body>

</html>