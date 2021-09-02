<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:79:"/www/wwwroot/vorp.top/application/templates/pc/manage/default/channel/form.html";i:1539744080;}*/ ?>
<style>
#account_id,#weight{
    display: none;
}
</style>
<form class="layui-form layui-box" style='padding:25px 30px 20px 0' action="__SELF__" data-auto="true" method="post">
    <div class="layui-form-item">
        <label class="layui-form-label">接口名称</label>
        <div class="layui-input-inline">
            <input type="text" name="title" placeholder="接口名称" autocomplete="off" class="layui-input" value="<?php echo (isset($channel['title']) && ($channel['title'] !== '')?$channel['title']:''); ?>">
        </div>
        <label class="layui-form-label">英文名称</label>
        <div class="layui-input-inline">
            <input type="text" name="code" placeholder="英文名称" autocomplete="off" class="layui-input" <?php if($development != 1): ?>readonly="readonly"<?php endif; ?> value="<?php echo (isset($channel['code']) && ($channel['code'] !== '')?$channel['code']:''); ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">备注标记</label>
        <div class="layui-input-inline">
            <input type="text" name="show_name" placeholder="备注标记" autocomplete="off" class="layui-input" value="<?php echo (isset($channel['show_name']) && ($channel['show_name'] !== '')?$channel['show_name']:''); ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">充值费率(‰)</label>
        <div class="layui-input-inline">
            <input type="text" name="lowrate" placeholder="充值费率" autocomplete="off" class="layui-input" value="<?php echo (isset($channel['lowrate']) && ($channel['lowrate'] !== '')?$channel['lowrate']:'0'); ?>">
        </div>
        <label class="layui-form-label">封顶费率(‰)</label>
        <div class="layui-input-inline">
            <input type="text" name="highrate" placeholder="封顶费率" autocomplete="off" class="layui-input" value="<?php echo (isset($channel['highrate']) && ($channel['highrate'] !== '')?$channel['highrate']:'0'); ?>">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">成本费率(‰)</label>
        <div class="layui-input-inline">
            <input type="text" name="costrate" placeholder="成本费率" autocomplete="off" class="layui-input" value="<?php echo (isset($channel['costrate']) && ($channel['costrate'] !== '')?$channel['costrate']:'0'); ?>">
        </div>
    </div>
    <?php if($development==1): ?>
    <div class="layui-form-item">
        <label class="layui-form-label">账户字段</label>
        <div class="layui-input-block">
            <textarea class="layui-textarea" cols="30" rows="2" name="account_fields" placeholder="账户字段" autocomplete="off"><?php echo (isset($channel['account_fields']) && ($channel['account_fields'] !== '')?$channel['account_fields']:''); ?></textarea>
            <span>用户添加渠道账户所需的字段，用“|”分割字段,用:分隔名称，如：应用号:appid|应用秘钥:appsecret</span>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">账户默认字段</label>
        <div class="layui-input-block">
            <textarea class="layui-textarea" cols="30" rows="2" name="default_fields" placeholder="账户默认字段" autocomplete="off"><?php echo (isset($channel['default_fields']) && ($channel['default_fields'] !== '')?$channel['default_fields']:''); ?></textarea>
            <span>用户添加渠道账户所需默认的字段，用“|”分割字段,用=分隔名称，如：appid=123456|appsecret:456789</span>
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">申请地址</label>
        <div class="layui-input-block">
            <input type="text" name="applyurl" placeholder="申请地址" autocomplete="off" class="layui-input" value="<?php echo (isset($channel['applyurl']) && ($channel['applyurl'] !== '')?$channel['applyurl']:''); ?>">
        </div>
    </div>
    <?php endif; ?>
    <div class="layui-form-item">
    <label class="layui-form-label">分类</label>
    <div class="layui-input-inline">
        <select class="layui-input" name="paytype" style="display:inline">
            <option value="">请选择</option>
            <?php foreach($paytype as $key => $value): ?>
            <option value="<?php echo $value['id']; ?>" <?php if(isset($channel) && $value['id']==$channel['paytype']): ?>selected<?php endif; ?>><?php echo $value['name']; ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <label class="layui-form-label">状态</label>
    <div class="layui-input-inline">
        <select class="layui-input" name="status" style="display:inline">
            <option value="1" <?php if(isset($channel) && 1==$channel['status']): ?>selected<?php endif; ?>>开启</option>
            <option value="0" <?php if(isset($channel) && 0==$channel['status']): ?>selected<?php endif; ?>>关闭</option>
        </select>
    </div>
</div>
<div class="layui-form-item">
	<label class="layui-form-label">接口可用</label>
    <div class="layui-input-inline">
        <select class="layui-input" name="is_available" style="display:inline">
            <option value="0" <?php if(isset($channel) && 0==$channel['is_available']): ?>selected<?php endif; ?>>通用</option>
            <option value="1" <?php if(isset($channel) && 1==$channel['is_available']): ?>selected<?php endif; ?>>手机</option>
            <option value="2" <?php if(isset($channel) && 2==$channel['is_available']): ?>selected<?php endif; ?>>电脑</option>
        </select>
    </div>
</div>
<?php if(isset($channel['applyurl']) && !empty($channel['applyurl'])): ?>
<div class="layui-form-item">
    <label class="layui-form-label">申请地址</label>
    <div class="layui-input-block" style="line-height: 40px;">
        <a href="<?php echo $channel['applyurl']; ?>" target="_blank"><?php echo $channel['applyurl']; ?></a>
    </div>
</div>
<?php endif; ?>
    <div class="hr-line-dashed"></div>
    <div class="layui-form-item text-center">
        <input type="hidden" name="channel_id" value="<?php echo (isset($channel_id) && ($channel_id !== '')?$channel_id:''); ?>">
        <button class="layui-btn" type="submit">保存</button>
        <button class="layui-btn layui-btn-danger" type="button" data-confirm="确定要取消吗？" data-close="">取消</button>
    </div>
</form>
<script>
</script>
