<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconvmb','E-mail');?>*</label>
            <input type="text" maxlength="50" class="form-control form-control-sm" name="email" value="<?php echo htmlspecialchars($item->email)?>" />
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconvmb','Name');?>. <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconvmb','Use in campaign body - {args.recipient.name}');?></label>
            <input type="text" maxlength="50" class="form-control form-control-sm" name="name" value="<?php echo htmlspecialchars($item->name)?>" />
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconvmb','String attribute 1');?>. <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconvmb','Use in campaign body - {args.recipient.attr_str_1}');?></label>
            <input type="text" maxlength="50" class="form-control form-control-sm" name="attr_str_1" value="<?php echo htmlspecialchars($item->attr_str_1)?>" />
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconvmb','String attribute 2');?>. <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconvmb','Use in campaign body - {args.recipient.attr_str_2}');?></label>
            <input type="text" maxlength="50" class="form-control form-control-sm" name="attr_str_2" value="<?php echo htmlspecialchars($item->attr_str_2)?>" />
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconvmb','String attribute 3');?>. <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconvmb','Use in campaign body - {args.recipient.attr_str_3}');?></label>
            <input type="text" maxlength="50" class="form-control form-control-sm" name="attr_str_3" value="<?php echo htmlspecialchars($item->attr_str_3)?>" />
        </div>
    </div>

</div>


<div class="form-group">
    <label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconvmb','This recipient is a member of these mailing lists');?></label>
    <div class="row" style="max-height: 500px; overflow: auto">
        <?php
            $params = array (
                'input_name'     => 'ml[]',
                'display_name'   => 'name',
                'css_class'      => 'form-control',
                'multiple'       => true,
                'wrap_prepend'   => '<div class="col-4">',
                'wrap_append'    => '</div>',
                'selected_id'    => $item->ml_ids_front,
                'list_function'  => 'erLhcoreClassModelMailconvMailingList::getList',
                'list_function_params'  => array('sort' => 'name ASC, id ASC', 'limit' => false)
            );
            echo erLhcoreClassRenderHelper::renderCheckbox( $params );
        ?>
    </div>
</div>

<hr>

<div class="form-group">
    <label><input type="checkbox" name="disabled" value="on" <?php $item->disabled == 1 ? print ' checked="checked" ' : ''?> > <?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('module/mailconvmb','Disabled');?></label>
</div>