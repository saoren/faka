<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/www/wwwroot/vorp.top/application/templates/pc/manage/default/cash/config.html";i:1543624690;s:74:"/www/wwwroot/vorp.top/application/templates/pc/manage/default/content.html";i:1539744038;}*/ ?>
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
        
<form onsubmit="return false;" action="__SELF__" data-auto="true" method="post" class='form-horizontal' style='padding-top:20px'>

    <div class="form-group">
        <label class="col-sm-2 control-label">商户结算方式</label>
        <div class='col-sm-8'>
            <select name="settlement_type" class="layui-input" required>
                <!--<?php if(sysconf('settlement_type')=='1'): ?>-->
                <option value="1" selected>T1结算</option>
                <!--<?php else: ?>-->
                <option value="1">T1结算</option>
                <!--<?php endif; ?>-->
                <!--<?php if(sysconf('settlement_type')=='0'): ?>-->
                <option value="0" selected>T0结算</option>
                <!--<?php else: ?>-->
                <option value="0">T0结算</option>
                <!--<?php endif; ?>-->
            </select>
            <span class="help-block"> 开启 T0 结算后，商户订单即时结算，可能出现负数！ </span>
            <span class="help-block"> 优先级： </span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">提现开关</label>
        <div class='col-sm-8'>
            <select name="cash_status" class="layui-input" required>
                <option value="0" <?php if(sysconf('cash_status')==0): ?>selected<?php endif; ?>>关闭</option>
                <option value="1" <?php if(sysconf('cash_status')==1): ?>selected<?php endif; ?>>开启</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">自动提现开关</label>
        <div class='col-sm-8'>
            <select name="auto_cash" class="layui-input" required>
                <option value="0" <?php if(sysconf('auto_cash')==0): ?>selected<?php endif; ?>>关闭</option>
                <option value="1" <?php if(sysconf('auto_cash')==1): ?>selected<?php endif; ?>>开启</option>
            </select>
            <span class="help-block">开启之后，每天对达到条件的用户自动提现</span>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">自动提现触发时间</label>
        <div class='col-sm-8'>
            <select name="auto_cash_time" class="layui-input" required>
            	<?php $__FOR_START_583888829__=0;$__FOR_END_583888829__=24;for($i=$__FOR_START_583888829__;$i < $__FOR_END_583888829__;$i+=1){ ?>
                <option value="<?php echo $i; ?>" <?php if(sysconf('auto_cash_time')==$i): ?>selected<?php endif; ?>><?php echo $i; ?>点</option>
                <?php } ?>
            </select>
            <span class="help-block">达到时间之后，有用户访问则会触发自动提现</span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">开启提现方式</label>
        <div class='col-sm-8' style="line-height: 18px;">
            <input type="checkbox" name="cash_type[]" <?php if(in_array(1, (array)json_decode((string)sysconf('cash_type'), true))): ?>checked="checked"<?php endif; ?> title="" value="1">支付宝收款
            <input type="checkbox" name="cash_type[]" <?php if(in_array(2, (array)json_decode((string)sysconf('cash_type'), true))): ?>checked="checked"<?php endif; ?> title="" value="2">微信收款
            <input type="checkbox" name="cash_type[]" <?php if(in_array(3, (array)json_decode((string)sysconf('cash_type'), true))): ?>checked="checked"<?php endif; ?> title="" value="3">银行卡收款
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">最低自动提现金额</label>
        <div class='col-sm-8'>
            <input type="number" name="auto_cash_money" required="required" title="请输入最低自动提现金额" placeholder="请输入最低自动提现金额" value="<?php echo sysconf('auto_cash_money'); ?>" class="layui-input">
            <p class="help-block">最低提现金额</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">提现关闭提示</label>
        <div class='col-sm-8'>
            <textarea name="cash_close_tips" id="" cols="30" rows="5" class="layui-textarea"><?php echo sysconf('cash_close_tips'); ?></textarea>
            <p class="help-block">提现关闭提示</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">允许提现时间</label>
        <div class='col-sm-8'>
            <select name="cash_limit_time_start" class="layui-input" required>
                <?php $__FOR_START_1381765083__=0;$__FOR_END_1381765083__=24;for($i=$__FOR_START_1381765083__;$i < $__FOR_END_1381765083__;$i+=1){ ?>
                <option value="<?php echo $i; ?>" <?php if(sysconf('cash_limit_time_start')==$i): ?>selected<?php endif; ?>><?php echo $i; ?>点</option>
                <?php } ?>
            </select>
            至
            <select name="cash_limit_time_end" class="layui-input" required>
                <?php $__FOR_START_820846111__=0;$__FOR_END_820846111__=24;for($i=$__FOR_START_820846111__;$i < $__FOR_END_820846111__;$i+=1){ ?>
                <option value="<?php echo $i; ?>" <?php if(sysconf('cash_limit_time_end')==$i): ?>selected<?php endif; ?>><?php echo $i; ?>点</option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">最低提现金额</label>
        <div class='col-sm-8'>
            <input type="number" name="cash_min_money" required="required" title="请输入最低提现金额" placeholder="请输入最低提现金额" value="<?php echo sysconf('cash_min_money'); ?>" class="layui-input">
            <p class="help-block">最低提现金额</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">手动提现手续费类型</label>
        <div class='col-sm-8'>
            <select name="cash_fee_type" class="layui-input" required>
                <option value="1" <?php if(sysconf('cash_fee_type')==1): ?>selected<?php endif; ?>>固定金额</option>
                <option value="100" <?php if(sysconf('cash_fee_type')==100): ?>selected<?php endif; ?>>百分比</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">手动提现手续费</label>
        <div class='col-sm-8'>
            <input type="number" name="cash_fee" required="required" title="请输入提现手续费" placeholder="请输入提现手续费" value="<?php echo sysconf('cash_fee'); ?>" class="layui-input">
            <p class="help-block">提现手续费</p>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-2 control-label">自动提现手续费类型</label>
        <div class='col-sm-8'>
            <select name="auto_cash_fee_type" class="layui-input" required>
                <option value="1" <?php if(sysconf('auto_cash_fee_type')==1): ?>selected<?php endif; ?>>固定金额</option>
                <option value="100" <?php if(sysconf('auto_cash_fee_type')==100): ?>selected<?php endif; ?>>百分比</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">自动提现手续费</label>
        <div class='col-sm-8'>
            <input type="number" name="auto_cash_fee" required="required" title="请输入提现手续费" placeholder="请输入提现手续费" value="<?php echo sysconf('auto_cash_fee'); ?>" class="layui-input">
            <p class="help-block">提现手续费</p>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">提现次数限制</label>
        <div class='col-sm-8'>
            <select name="cash_limit_num" class="layui-input" required>
                <?php $__FOR_START_1635464062__=1;$__FOR_END_1635464062__=6;for($i=$__FOR_START_1635464062__;$i < $__FOR_END_1635464062__;$i+=1){ ?>
                <option value="<?php echo $i; ?>" <?php if(sysconf('cash_limit_num')==$i): ?>selected<?php endif; ?>><?php echo $i; ?>次</option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">超过限制提示</label>
        <div class='col-sm-8'>
            <textarea name="cash_limit_num_tips" id="" cols="30" rows="5" class="layui-textarea"><?php echo sysconf('cash_limit_num_tips'); ?></textarea>
            <p class="help-block">超过限制提示</p>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="col-sm-4 col-sm-offset-2">
        <div class="layui-form-item text-center">
            <button class="layui-btn" type="submit">保存配置</button>
        </div>
    </div>

</form>
<script>
    layui.use('form', function(){
        var form = layui.form; //只有执行了这一步，部分表单元素才会自动修饰成功
        form.render();
    });
</script>

    </div>
    
</div>