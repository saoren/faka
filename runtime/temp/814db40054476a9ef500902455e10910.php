<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"/www/wwwroot/vorp.top/application/templates/pc/shop/default//index.html";i:1538286654;s:71:"/www/wwwroot/vorp.top/application/templates/pc/shop/default/layout.html";i:1543624690;s:71:"/www/wwwroot/vorp.top/application/templates/pc/shop/default/footer.html";i:1539744030;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php if($shop['shop_name']): ?><?php echo $shop['shop_name']; ?> - <?php endif; ?><?php echo sysconf('site_name'); ?></title>
    <meta name="keywords" content="<?php echo sysconf('site_keywords'); ?>" />
    <meta name="description" content="<?php echo sysconf('site_desc'); ?>" />
    <link rel="shortcut icon" href="<?php echo sysconf('browser_icon'); ?>" />
    <!--    模版页面样式文件开始-->
    <link href="/static/app/css/main.css" rel="stylesheet" type="text/css">
    <link href="/static/app/css/pay.css" rel="stylesheet" type="text/css">
    <link href="/static/app/css/iconfont.css" rel="stylesheet" type="text/css">
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
    <!--    支付方式样式文件结束-->
    <style>
        .spsm>span>span{
			color: #648ff7 !important;
		}
	</style>
    
    

    <script>
        var user_popup_message = '';
        var is_display = '0';
        var userid ="<?php echo $shop['id']; ?>";
        var cateid =0;
        var static_url = '__PUBLIC__';
        var dis_pwd_content = '<div style="padding:10px;color:#cc3333;line-height:24px"><p style="float:left;font-size:14px;font-weight:bold;color:blue;">访问密码：</p><div style="float:right; font-size:14px; padding-left:20px;"><a href="#" style="color:#0064ff;text-decoration:none;display:inline-block;<?php if(isset($goods)): ?>display:none;<?php endif; ?>background:url(/static/app/images/x.png) left no-repeat;padding-left:15px;" class="nyroModalClose" onclick="closeNyro()">关闭</a></div><p style="clear:both;font-size:12px;font-weight:bold;color:red;"><input type="password" name="pwdforbuy" class="input" maxlength="20"> <input type="submit"  onclick="verify_pwdforbuy()" id="verify_pwdforbuy" style="font-size:12px;padding:3px 3px" value="验证密码"> <span id="verify_pwdforbuy_msg" style="display:none"><img src="/static/app/images/load.gif"> 正在验证...</span><ul><li>1.本商品购买设置了安全密码</li><li>2.只有成功验证密码后才能继续购买</li></ul></p></div>';
        var goodid = "<?php echo (isset($goods['id']) && ($goods['id'] !== '')?$goods['id']:0); ?>";
        var is_contact_limit ='<?php echo (isset($goods['contact_limit']) && ($goods['contact_limit'] !== '')?$goods['contact_limit']:""); ?>';
        var is_contact_limit_default ='<?php echo (isset($goods['contact_limit']) && ($goods['contact_limit'] !== '')?$goods['contact_limit']:""); ?>';
        var limit_quantity_tip = '无法修改购买数量，是因为本商品限制了购买数量。';

        /* <?php if(!isset($goods)): ?> */

        function closeNyro(){
            $('[name="goodid"]').val('');
            $('[name="goodid"]').change();
        }
        
        /* <?php endif; ?> */

	</script>

</head>

<body>
    <input type="hidden" name="is_contact_limit" value="<?php echo (isset($goods['contact_limit']) && ($goods['contact_limit'] !== '')?$goods['contact_limit']:""); ?>">
    <input type="hidden" name="limit_quantity" value="<?php echo (isset($goods['limit_quantity']) && ($goods['limit_quantity'] !== '')?$goods['limit_quantity']:1); ?>">
    <section class="page_top">
        <div class="container">
            <!--导航-->
            <div class="top">
                <div class="logo"><a href="/"><img src="<?php echo sysconf('merchant_logo'); ?>" alt="" height="44"></a></div>
                <div class="nav_btn"><i></i></div>
                <div class="user_btns">
                    <a href="/orderquery" target="_blank" class="reg_btn" style="width: 180px"><i class="iconfont icon-sousuo"></i>
                        查询订单</a>
                </div>
                <div class="nav">
                    <ul>
                        <li><a target="_blank" href="/">首页</a></li>
                        <li><a target="_blank" href="/complaint">投诉订单</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <form name="p" method="post" action="/pay/order" target="_blank" class="nyroModal">
        <div class="order_form">
            <div class="left_card" style="min-height: 276px;margin-top: -20px;">
                <div class="dianpu">
                    <i class="iconfont icon-dengpao"></i> <?php echo $shop['shop_name']; ?>
                </div>
                <div class="small_card">
                    数字卡密
                </div>
                <div class="small_card">
                    自动发货
                </div>
                <div class="small_card">
                    信誉卖家
                </div>
                <div class="clear">
                </div>
                <p>
                    <b>联系卖家</b><?php echo $shop['qq']; ?><a href="//wpa.qq.com/msgrd?v=1&uin=<?php echo $shop['qq']; ?>&site=miaoka.la&menu=yes'"
                        target="_blank" class="qq1_btn" style="width:65px;top:15px;"><i class="iconfont icon-qq-white"></i>
                        咨询卖家</a>
                    <br><span style="color:red;font-size:12px">商品问题联系卖家</span>
                </p>
                <p>
                    <b>卖家网站</b><a target="_blank" href="<?php echo $shop['website']; ?>" style="color: #648ff7;">点击浏览</a>
                </p>
                <p>
                    <b>商品说明</b><span id="remark"></span>
                </p>
            </div>
            <div class="right_form">
                <input type="hidden" name="userid" value="<?php echo $shop['id']; ?>">
                <input type="hidden" name="token" value="<?php echo \think\Request::instance()->token(); ?>">
                <input type="hidden" name="cardNoLength" value="0">
                <input type="hidden" name="cardPwdLength" value="0">
                <input type="hidden" name="is_discount" id="is_discount" value="0">
                <input type="hidden" name="coupon_ctype" value="0">
                <input type="hidden" name="coupon_value" value="0">
                <input type="hidden" name="sms_price" value="0">
                <input type="hidden" name="paymoney" value="">
                <input type="hidden" name="danjia" value="">
                <input type="hidden" name="is_pwdforsearch">
                <input type="hidden" name="is_coupon" value="">
                <span style="display: none" class="rate">100</span>
                <ul>
                    
<li><span class="span_up">商品分类</span>
    <select name="cateid" id="cateid" onchange="selectcateid()">
        <option value="">请选择分类</option>
        <?php foreach($categorys as $v): ?>
        <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
        <?php endforeach; ?>
    </select>
</li>
<li><span class="span_up">商品名称</span>
    <select name="goodid" id="goodid" onchange="selectgoodid()">
        <option value="">请选择商品</option>
    </select>
    <a class="spsm" onclick="layer_remark()">[ 卖家公告 ]</a>
    <span id="notice" style="display: none"><?php echo $shop['shop_notice']; ?></span>
    <script>
        function layer_remark() {
            var gonggao = $('#notice').text();
            layer.open({
                time: 5000,
                content: gonggao,
                shadeClose: true
            });
        }
    </script>
</li>

                    <li>
                        <span class="span_up">商品单价</span>
                        <p class="big_txt">
                            <b id="price"></b>元
                        </p>
                        <a style="display:none;top: 10px;" id="isdiscount_span" class="spsm">[ 批发优惠 ]</a>
                        <div id="discountdetail" style="display: none;">
                        </div>
                        <script>
                            /*
                         * 显示批发优惠价格
                         */
                        $("#isdiscount_span").hover(
                            function () {
                                //1.获取数据
                                var discountdetail2='';
                                var goodid = $('#goodid').val();
                                $.post('/ajax/getdiscountdetails', {goodid: goodid}, function (data) {
                                    console.log(data);
                                    //2.组装数据
                                    $('#discountdetail').html(data);
                                });
                                //3.显示数据
                                var discountdetail2 = $('#discountdetail').html();
                                if(discountdetail2!='') {
                                    //显示样式
                                    var index = layer.tips(discountdetail2, $('#isdiscount_span'), {
                                        tips: [2, '#4B4B4B'],
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
					</script>
                    </li>
                    <li>
                        <span class="span_up">购买数量</span>
                        <input name="quantity" onkeyup="changequantity()" type="text" value="1" />
                        <a class="spsm">[ <span id="goodInvent" style="width: 110px"></span> ]</a>
                    </li>
                    <li>
                        <span class="span_up">联系方式</span>
                        <input class="phone_num" name="contact" type="text" placeholder="[必填]推荐填写QQ号或手机号!">
                        <script>
                            function js_check_contact() {
                            //更新部分
                            var contact=$.trim($("input[name='contact']").val());
                            var reg = /^([0-9A-Za-z]+){6,20}$/;
                            if (contact == '' || !reg.test(contact)) {
                                layer.msg('请填写至少6位联系方式！',{
                                    icon:2,
                                    time:2000,
                                });
                                $('[name=contact]').focus();
                                return false;
                            }
                        }
					</script>
                    </li>
                    <li id="pwdforsearch1" style="display:none">
                        <span class="span_up">取卡密码</span>
                        <input type="text" onblur="is_pwd_need()" name="pwdforsearch1" placeholder="[必填]请输入取卡密码（6-20位）">
                    </li>
                    <li id="pwdforsearch2" style="display:none">
                        <span class="span_up">取卡密码</span>
                        <input type="text" onblur="is_pwd_not_need()" name="pwdforsearch2" placeholder="[选填]请输入取卡密码（6-20位）">
                    </li>
                    <li>
                        <label class="fz_lab">短信提醒<input type="checkbox" name="is_rev_sms" value="1" id="is_rev_sms"
                                data-cost="<?php if(isset($goods) && $goods['sms_payer']==1): ?>0<?php else: ?><?php echo get_sms_cost(); endif; ?>"></label>
                        <label class="fz_lab">邮箱提醒<input type="checkbox" name="isemail" value="1" id="isemail"></label>
                        <label class="fz_lab" style="display: none" id="goodCoupon">使用优惠券<input type="checkbox" id="youhui"></label>
                    </li>
                    <li class="email_show">
                        <span class="span_up">邮箱地址</span>
                        <input type="text" name="email" placeholder="填写你常用的邮箱地址">
                        <p style="color: red">注：如果没收到邮件，请在邮件垃圾箱查找。</p>
                    </li>
                    <li class="youhui_show"><span class="span_up">优惠券</span><input type="text" name="couponcode"
                            placeholder="请填写你的优惠券" onchange="checkCoupon2()"></li>
                    <script>
                        function checkCoupon2() {
                        var couponcode = $.trim($('[name=couponcode]').val());
                        if (cateid == 0) {
                            cateid = $('#cateid').val();
                        }
                        $.post('/ajax/checkcoupon', {
                            couponcode: couponcode,
                            userid: userid,
                            cateid: cateid,
                            t: new Date().getTime()
                        }, function (data) {
                            if (data) {
                                data = eval(data);
                                if (data.result == 0) {
                                    layer.msg(data.msg,{icon:2,time:3000});
                                    $('#checkcoupon').html(data.msg);
                                    $('[name=is_coupon]').val("0");//更新部分
                                } else if (data.result == 1) {
                                    layer.msg('优惠卷可用',{icon:1,time:3000});
                                    $('[name=coupon_ctype]').val(data.ctype);
                                    $('[name=coupon_value]').val(data.coupon);
                                    $('[name=is_coupon]').val("1");//更新部分
                                    goodschk();
                                } else {
                                    layer.msg(data.msg,{icon:2,time:3000});
                                    $('#checkcoupon').html('验证失败！');
                                }
                            }
                        }, "json");
                    }
				</script>
                </ul>
            </div>
            <div class="clear">
            </div>
            <!--付款方式-->
            <div class="pay_box">
                <div class="pay_menu">
                    <!--                扫码支付-->
                    <div class="pay pay_cj_1 checked1">
                        <img src="/static/app/images/pay1.png" width="18" height="18" style="vertical-align:middle">
                        扫码支付
                    </div>
                    <!--                网银支付-->
                    <div class="all_pay">
                        <i class="iconfont icon-zijin"></i> 应付总额：<b class="tprice">0.00</b>元
                    </div>
                </div>
                <!--                扫码支付-->
                <div class="pay_list1">
                    <input type="hidden" name="feePayer" value="<?php echo (isset($shop['fee_payer']) && ($shop['fee_payer'] !== '')?$shop['fee_payer']:1); ?>">
                    <input type="hidden" name="fee_rate" value="<?php echo (isset($userChannels[0]['rate']) && ($userChannels[0]['rate'] !== '')?$userChannels[0]['rate']:0); ?>">
                    <input type="hidden" name="min_fee" value="<?php echo sysconf('transaction_min_fee'); ?>">
                    <!-- <?php echo $n=0; ?> -->
                    <!-- <?php echo $sub_n=0; ?> -->
                    <!--<?php foreach($userChannels as $v): ?>-->
                    <!--<?php if($v['status']==1): ?>-->
                    <label class="lab3" for="pay_item_<?php echo $v['channel_id']; ?>">
                        <input name="pid" id="pay_item_<?php echo $v['channel_id']; ?>" value="<?php echo $v['channel_id']; ?>" data-bank="" type="radio" onclick="javascript:setFeeRate('<?php echo $v['rate']; ?>')">
                            <img src="/static/app/images/<?php echo get_paytype_info($v['paytype'])['logo']; ?>.jpg">
                    </label>
                    <!-- <?php echo $n++; ?> -->
                    <!--<?php endif; ?>-->
                    <!--<?php endforeach; ?>-->
                </div>
                <!--                网银支付-->
            </div>
            <div id="submit">
                <button name="check_pay" class="check_pay" type="submit">确认支付</button>
            </div>
        </div>
    </form>
    <!--右浮动-->
    <div class="ewm">
        <div id="qrcode" style="width:150px;height:150px;"></div><br>
        手机扫码支付
    </div>
    <!--返回顶部-->
    <div class="toTop"><i class="iconfont icon-angle-up"></i>TOP</div>
    
<footer class="row footer-area">

    <div class="row m0 footer_bottom">
        <div class="container">
            <div class="row" style="padding:0 20px">
                <div class="col-sm-6 col-md-6">
                    <?php echo sysconf('site_info_copyright'); ?>
                </div>
            </div>
        </div>
    </div>
</footer>
    <script src="/static/app/js/qrcode.min.js"></script>
    <script>
        $(function () {
            $('.right_form li input,.right_form li select').focus(function () {
                // $(this).siblings('span').addClass('span_up');
            });
            $('.right_form li input').blur(function () {
                if ($(this).val() == '') {
                    // $(this).siblings('span').removeClass('span_up');
                }
            });
            $('.right_form li select').blur(function () {
                var sel_option = $(this).find('option:selected').text();
                if (sel_option == '') {
                    $(this).siblings('span').removeClass('span_up');
                }
            });
            $('.fz_lab').click(function () {
                if ($(this).children("input").attr('checked')) {
                    $(this).addClass("lab_on");
                } else {
                    $(this).removeClass("lab_on");
                }
            });
            $('#isemail').click(function () {
                $('#is_rev_sms').attr('checked', false);
                $('#is_rev_sms').parent().removeClass("lab_on");
                $('[name=sms_price]').val(0);
                $('.email_show').stop().fadeToggle();
                $('.email_show').find('input').focus();
                if ($('#is_rev_sms').attr('checked')) {
                    $('.phone_num').focus().attr('placeholder', '请填写你的手机号');
                } else {
                    $('.phone_num').blur().attr('placeholder', '推荐填写QQ号或手机号');
                }
            });
            $('#youhui').click(function () {
                $('.youhui_show').stop().fadeToggle();
                $('.youhui_show').find('input').focus();
            });
            $('#is_rev_sms').click(function () {
                $('#isemail').attr('checked', false);
                $('#isemail').parent().removeClass("lab_on");
                $('.email_show').stop().fadeOut();
                if ($(this).attr('checked')) {
                    $('.phone_num').focus().attr('placeholder', '请填写你的手机号');
                } else {
                    $('.phone_num').blur().attr('placeholder', '推荐填写QQ号或手机号');
                }
            });
            $(".pay").click(function () {
                $(this).siblings(".pay").removeClass("checked1");
                $(this).addClass("checked1");
            });
            $(".lab3").click(function () {
                $(this).children('input').attr('checked', true);
                $(this).siblings("label").children('input').attr('checked', false);
                $(this).siblings("label").removeClass("checked2");
                $(this).addClass("checked2");
                var bankid = $(this).children('input').data('bank');
                $('input[name="bankid"]').val(bankid);
            });
            $('.pay_cj_1').click(function () {
                $('.pay_list1').show();
                $('.pay_list2').hide();
                $('#alipay').attr('checked', true);
                $('#bank').attr('checked', false);
                $('.pay_list1 input').attr('checked', false);
                $('.pay_list1 .lab3').removeClass('checked2');
                $('.pay_list1 .lab3').eq(0).children('input').attr('checked', true);
                $('.pay_list1 .lab3').eq(0).addClass('checked2');
                $(this).children('img').attr('src', '/static/app/images/pay1.png');
                $('.pay_cj_2').children('img').attr('src', '/static/app/images/pay3_menu2_cj.png');
            });
            $('.pay_cj_2').click(function () {
                $('.pay_list2').show();
                $('.pay_list1').hide();
                $('#alipay').attr('checked', false);
                $('#bank').attr('checked', true);
                $('.pay_list2 input').attr('checked', false);
                $('.pay_list2 .lab3').removeClass('checked2');
                $('.pay_list2 .lab3').eq(0).children('input').attr('checked', true);
                $('.pay_list2 .lab3').eq(0).addClass('checked2');
                $(this).children('img').attr('src', '/static/app/images/pay2.png');
                $('.pay_cj_1').children('img').attr('src', '/static/app/images/pay3_menu1_cj.png');
            });

            $('.lab3:eq(0)')[0].click();
        });

        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: "<?php echo $qrcode; ?>",
            width: 150,
            height: 150,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>

    
    <!-- 商户统计代码 -->
    <?php echo htmlspecialchars_decode($shop['statis_code']); ?>
</body>

</html>