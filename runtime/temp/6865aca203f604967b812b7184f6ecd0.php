<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/vorp.top/application/templates/pc/admin/default/auth/form.html";i:1539744048;}*/ ?>
<form class="layui-form layui-box" style='padding:25px 30px 20px 0' action="__SELF__" data-auto="true" method="post">

    <div class="layui-form-item">
        <label class="layui-form-label">权限名称</label>
        <div class="layui-input-block">
            <input type="text" name="title" value='<?php echo (isset($vo['title']) && ($vo['title'] !== '')?$vo['title']:""); ?>' required="required" title="请输入权限名称" placeholder="请输入权限名称" class="layui-input">
        </div>
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">权限描述</label>
        <div class="layui-input-block">
            <textarea placeholder="请输入权限描述" required="required" title="请输入权限描述" class="layui-textarea" name="desc"><?php echo (isset($vo['desc']) && ($vo['desc'] !== '')?$vo['desc']:""); ?></textarea>
        </div>
    </div>

    <div class="hr-line-dashed"></div>

    <div class="layui-form-item text-center">
        <?php if(isset($vo['id'])): ?><input type='hidden' value='<?php echo $vo['id']; ?>' name='id'/><?php endif; ?>
        <button class="layui-btn" type='submit'>保存数据</button>
        <button class="layui-btn layui-btn-danger" type='button' data-confirm="确定要取消编辑吗？" data-close>取消编辑</button>
    </div>

</form>
