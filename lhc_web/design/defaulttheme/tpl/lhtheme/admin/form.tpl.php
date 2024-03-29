<?php if (isset($errors)) : ?>
	<?php include(erLhcoreClassDesign::designtpl('lhkernel/validation_error.tpl.php'));?>
<?php endif; ?>

<?php include(erLhcoreClassDesign::designtpl('lhkernel/csfr_token.tpl.php'));?>

<script>
    window.PersonalTheme = {};

    <?php if ($form->static_content != '') : ?>
    window.PersonalTheme.staticResources = <?php echo $form->static_content;?>
    <?php endif; ?>

    <?php if ($form->static_js_content != '') : ?>
    window.PersonalTheme.staticJSResources = <?php echo $form->static_js_content;?>
    <?php endif; ?>

    <?php if ($form->static_css_content != '') : ?>
    window.PersonalTheme.staticCSSResources = <?php echo $form->static_css_content;?>
    <?php endif; ?>
</script>

<div role="tabpanel" ng-controller="IClickToCallFormGenerator as cform" ng-init="cform.initVariables();">

	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="nav-item"><a class="active nav-link" href="#settings" aria-controls="settings" role="tab" data-bs-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('icclicktocallform/form','Settings');?></a></li>
        <li role="presentation" class="nav-item"><a class="nav-link" href="#chatattributes" aria-controls="chatattributes" role="tab" data-bs-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('icclicktocallform/form','Chat attributes');?></a></li>
        <li role="presentation" class="nav-item"><a class="nav-link" href="#mainattr" aria-controls="mainattr" role="tab" data-bs-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('icclicktocallform/form','Main attributes');?></a></li>
        <li role="presentation" class="nav-item"><a class="nav-link" href="#headersettings" aria-controls="headersettings" role="tab" data-bs-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('icclicktocallform/form','Header settings');?></a></li>
		<li role="presentation" class="nav-item"><a class="nav-link" href="#headercss" aria-controls="headercss" role="tab" data-bs-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('icclicktocallform/form','Header css');?></a></li>
		<?php if ($form->id !== null) : ?>
		<li role="presentation" class="nav-item"><a class="nav-link" href="#static" aria-controls="static" role="tab" data-bs-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('icclicktocallform/form','Static content');?></a></li>
		<li role="presentation" class="nav-item"><a class="nav-link" href="#js" aria-controls="js" role="tab" data-bs-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('icclicktocallform/form','JS');?></a></li>
		<li role="presentation" class="nav-item"><a class="nav-link" href="#css" aria-controls="css" role="tab" data-bs-toggle="tab"><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('icclicktocallform/form','CSS');?></a></li>
		<?php endif; ?>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="settings">
			<div class="form-group" ng-non-bindable>
				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('icclicktocallform/form','Name');?>*</label> 
				<input type="text" class="form-control" name="Name" value="<?php echo htmlspecialchars($form->name) ?>" />
			</div>
		</div>

        

		<div role="tabpanel" class="tab-pane" id="chatattributes">

            <style>
                [data-bs-theme=bright] {
                    ;{{bactract_bg_color_buble_visitor_background ? '--lhc-msg-body-response: #'+bactract_bg_color_buble_visitor_background : ''}};
                    {{bactract_bg_color_buble_visitor_text_color ? '--lhc-msg-body-response-text: #'+bactract_bg_color_buble_visitor_text_color : ''}};
                    {{bactract_bg_color_buble_visitor_title_color ? '--lhc-msg-body-vis-tit-text: #'+bactract_bg_color_buble_visitor_title_color : ''}};
                    {{bactract_bg_color_buble_operator_title_color ? '--lhc-msg-body-op-tit-text: #'+bactract_bg_color_buble_operator_title_color : ''}};
                    {{bactract_bg_color_buble_operator_text_color ? '--lhc-msg-body-op-text: #'+bactract_bg_color_buble_operator_text_color : ''}};
                    {{bactract_bg_color_buble_operator_background ? '--lhc-msg-body-op-bg: #'+bactract_bg_color_buble_operator_background : ''}};
                    {{bactract_bg_color_buble_operator_other_title_color ? '--lhc-msg-body-op-tit-other-text: #'+bactract_bg_color_buble_operator_other_title_color : ''}};
                    {{bactract_bg_color_buble_operator_other_background ? '--lhc-msg-body-op-bg-other: #'+bactract_bg_color_buble_operator_other_background : ''}};
                    {{bactract_bg_color_buble_operator_other_text_color ? '--lhc-msg-body-op-text-other: #'+bactract_bg_color_buble_operator_other_text_color : ''}};
                    {{bactract_bg_color_buble_sys_background ? '--lhc-msg-body-sys-tit-bg: #'+bactract_bg_color_buble_sys_background : ''}};
                    {{bactract_bg_color_buble_sys_title_color ? '--lhc-msg-body-sys-date-text: #'+bactract_bg_color_buble_sys_title_color : ''}};
                    {{bactract_bg_color_buble_sys_title_color ? '--lhc-msg-body-sys-tit-text: #'+bactract_bg_color_buble_sys_title_color : ''}};
                    {{bactract_bg_color_buble_sys_text_color ? '--lhc-msg-body-sys-text: #'+bactract_bg_color_buble_sys_text_color : ''}};
                    {{bactract_bg_color_time_color ? '--lhc-msg-date-text: #'+bactract_bg_color_time_color : ''}};
                    {{bactract_bg_color_chat_bg ? '--lhc-msg-body-bg: #'+bactract_bg_color_chat_bg : ''}};
                    {{bactract_bg_color_newm_color ? '--lhc-new-msg-border: #'+bactract_bg_color_newm_color : ''}};
                }
                [data-bs-theme=dark] {
                    ;{{bactract_bg_color_dark_buble_visitor_background ? '--lhc-msg-body-response: #'+bactract_bg_color_dark_buble_visitor_background : ''}};
                    {{bactract_bg_color_dark_buble_visitor_text_color ? '--lhc-msg-body-response-text: #'+bactract_bg_color_dark_buble_visitor_text_color : ''}};
                    {{bactract_bg_color_dark_buble_visitor_title_color ? '--lhc-msg-body-vis-tit-text: #'+bactract_bg_color_dark_buble_visitor_title_color : ''}};
                    {{bactract_bg_color_dark_buble_operator_title_color ? '--lhc-msg-body-op-tit-text: #'+bactract_bg_color_dark_buble_operator_title_color : ''}};
                    {{bactract_bg_color_dark_buble_operator_text_color ? '--lhc-msg-body-op-text: #'+bactract_bg_color_dark_buble_operator_text_color : ''}};
                    {{bactract_bg_color_dark_buble_operator_background ? '--lhc-msg-body-op-bg: #'+bactract_bg_color_dark_buble_operator_background : ''}};
                    {{bactract_bg_color_dark_buble_operator_other_title_color ? '--lhc-msg-body-op-tit-other-text: #'+bactract_bg_color_dark_buble_operator_other_title_color : ''}};
                    {{bactract_bg_color_dark_buble_operator_other_background ? '--lhc-msg-body-op-bg-other: #'+bactract_bg_color_dark_buble_operator_other_background : ''}};
                    {{bactract_bg_color_dark_buble_operator_other_text_color ? '--lhc-msg-body-op-text-other: #'+bactract_bg_color_dark_buble_operator_other_text_color : ''}};
                    {{bactract_bg_color_dark_buble_sys_background ? '--lhc-msg-body-sys-tit-bg: #'+bactract_bg_color_dark_buble_sys_background : ''}};
                    {{bactract_bg_color_dark_buble_sys_title_color ? '--lhc-msg-body-sys-date-text: #'+bactract_bg_color_dark_buble_sys_title_color : ''}};
                    {{bactract_bg_color_dark_buble_sys_title_color ? '--lhc-msg-body-sys-tit-text: #'+bactract_bg_color_dark_buble_sys_title_color : ''}};
                    {{bactract_bg_color_dark_buble_sys_text_color ? '--lhc-msg-body-sys-text: #'+bactract_bg_color_dark_buble_sys_text_color : ''}};
                    {{bactract_bg_color_dark_time_color ? '--lhc-msg-date-text: #'+bactract_bg_color_dark_time_color : ''}};
                    {{bactract_bg_color_dark_chat_bg ? '--lhc-msg-body-bg: #'+bactract_bg_color_dark_chat_bg : ''}};
                    {{bactract_bg_color_dark_newm_color ? '--lhc-new-msg-border: #'+bactract_bg_color_dark_newm_color : ''}};
                }
            </style>
            
                <h3><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','Live preview')?></h3>
                <div id="messages">
                    <div class="msgBlock msgBlock-admin">
                        <div class="message-row response">
                            <span class="usr-tit vis-tit" role="button"><i class="material-icons chat-operators mi-fs15 me-0">face</i>Visitor</span>
                            <div class="msg-date msg-date-vi" >10:14:39</div>
                            <div class="msg-body" >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                        <div class="message-row system-response">
                            <span class="usr-tit sys-tit"><i>System assistant</i><span class="msg-date ps-2 fw-normal">2024-02-09 14:29:33</span></span>
                              <div class="text-muted">
                                <div class="msg-body">
                                    <span class="material-icons text-success">login</span>Operator has accepted the chat!
                                </div>
                            </div>
                        </div>
                        <div class="message-row message-admin operator-changes">
                            <div id="unread-separator-10487909" class="new-msg-holder border-bottom border-danger text-center"><span class="new-msg bg-danger text-white d-inline-block fs12 rounded-top" >New</span></div>
                            <div class="msg-date msg-date-op" >10:18:22</div>
                            <span class="usr-tit op-tit" ><i class="material-icons chat-operators mi-fs15 me-0">account_box</i>Operator 1</span>
                            <div class="msg-body" >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                        <div class="message-row message-admin operator-changes other-operator">
                            <div class="msg-date" >10:18:22</div>
                            <span  class="usr-tit op-tit" ><i class="material-icons chat-operators mi-fs15 me-0">account_box</i>Operator 2</span>
                            <div class="msg-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                        </div>
                    </div>
                </div>

                <h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','Bright message style')?></h1>
                <hr>
                <h5><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','Visitor messages style')?></h5>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label><?php echo $fields['buble_visitor_background']['trans'];?></label>
                            <?php echo erLhcoreClassAbstract::renderInput('buble_visitor_background', $fields['buble_visitor_background'], $form)?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label><?php echo $fields['buble_visitor_title_color']['trans'];?></label>
                            <?php echo erLhcoreClassAbstract::renderInput('buble_visitor_title_color', $fields['buble_visitor_title_color'], $form)?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label><?php echo $fields['buble_visitor_text_color']['trans'];?></label>
                            <?php echo erLhcoreClassAbstract::renderInput('buble_visitor_text_color', $fields['buble_visitor_text_color'], $form)?>
                        </div>
                    </div>
                </div>

                <h5><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','Operator messages style')?></h5>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label><?php echo $fields['buble_operator_background']['trans'];?></label>
                            <?php echo erLhcoreClassAbstract::renderInput('buble_operator_background', $fields['buble_operator_background'], $form)?>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label><?php echo $fields['buble_operator_title_color']['trans'];?></label>
                            <?php echo erLhcoreClassAbstract::renderInput('buble_operator_title_color', $fields['buble_operator_title_color'], $form)?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label><?php echo $fields['buble_operator_text_color']['trans'];?></label>
                            <?php echo erLhcoreClassAbstract::renderInput('buble_operator_text_color', $fields['buble_operator_text_color'], $form)?>
                        </div>
                    </div>
                </div>

            <h5><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','Other Operator messages style')?></h5>
            <p><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','If other operator writes a message in the chat this is how their message will look a like.')?></p>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['buble_operator_other_background']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('buble_operator_other_background', $fields['buble_operator_other_background'], $form)?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['buble_operator_other_title_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('buble_operator_other_title_color', $fields['buble_operator_other_title_color'], $form)?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['buble_operator_other_text_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('buble_operator_other_text_color', $fields['buble_operator_other_text_color'], $form)?>
                    </div>
                </div>
            </div>

                <h5><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','System assistant messages style')?></h5>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label><?php echo $fields['buble_sys_background']['trans'];?></label>
                            <?php echo erLhcoreClassAbstract::renderInput('buble_sys_background', $fields['buble_sys_background'], $form)?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label><?php echo $fields['buble_sys_title_color']['trans'];?></label>
                            <?php echo erLhcoreClassAbstract::renderInput('buble_sys_title_color', $fields['buble_sys_title_color'], $form)?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label><?php echo $fields['buble_sys_text_color']['trans'];?></label>
                            <?php echo erLhcoreClassAbstract::renderInput('buble_sys_text_color', $fields['buble_sys_text_color'], $form)?>
                        </div>
                    </div>
                </div>

                <h5><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','General')?></h5>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label><?php echo $fields['chat_bg']['trans'];?></label>
                            <?php echo erLhcoreClassAbstract::renderInput('chat_bg', $fields['chat_bg'], $form)?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label><?php echo $fields['time_color']['trans'];?></label>
                            <?php echo erLhcoreClassAbstract::renderInput('time_color', $fields['time_color'], $form)?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label><?php echo $fields['newm_color']['trans'];?></label>
                            <?php echo erLhcoreClassAbstract::renderInput('newm_color', $fields['newm_color'], $form)?>
                        </div>
                    </div>
                </div>


                <hr>
                <h1><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','Dark message style')?></h1>
            <h5><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','Visitor messages style')?></h5>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_buble_visitor_background']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_buble_visitor_background', $fields['dark_buble_visitor_background'], $form)?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_buble_visitor_title_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_buble_visitor_title_color', $fields['dark_buble_visitor_title_color'], $form)?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_buble_visitor_text_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_buble_visitor_text_color', $fields['dark_buble_visitor_text_color'], $form)?>
                    </div>
                </div>
            </div>

            <h5><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','Operator messages style')?></h5>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_buble_operator_background']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_buble_operator_background', $fields['dark_buble_operator_background'], $form)?>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_buble_operator_title_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_buble_operator_title_color', $fields['dark_buble_operator_title_color'], $form)?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_buble_operator_text_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_buble_operator_text_color', $fields['dark_buble_operator_text_color'], $form)?>
                    </div>
                </div>
            </div>

            <h5><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','Other Operator messages style')?></h5>
            <p><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','If other operator writes a message in the chat this is how their message will look a like.')?></p>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_buble_operator_other_background']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_buble_operator_other_background', $fields['dark_buble_operator_other_background'], $form)?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_buble_operator_other_title_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_buble_operator_other_title_color', $fields['dark_buble_operator_other_title_color'], $form)?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_buble_operator_other_text_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_buble_operator_other_text_color', $fields['dark_buble_operator_other_text_color'], $form)?>
                    </div>
                </div>
            </div>

            <h5><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','System assistant messages style')?></h5>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_buble_sys_background']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_buble_sys_background', $fields['dark_buble_sys_background'], $form)?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_buble_sys_title_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_buble_sys_title_color', $fields['dark_buble_sys_title_color'], $form)?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_buble_sys_text_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_buble_sys_text_color', $fields['dark_buble_sys_text_color'], $form)?>
                    </div>
                </div>
            </div>

            <h5><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('abstract/widgettheme','General')?></h5>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_chat_bg']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_chat_bg', $fields['dark_chat_bg'], $form)?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_time_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_time_color', $fields['dark_time_color'], $form)?>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label><?php echo $fields['dark_newm_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('dark_newm_color', $fields['dark_newm_color'], $form)?>
                    </div>
                </div>
            </div>




			</div>





		<div role="tabpanel" class="tab-pane" id="headersettings">
            <div class="form-group">
				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('icclicktocallform/form','Header content');?></label>
				<textarea ng-non-bindable name="header_content" class="form-control" rows="10" cols=""><?php echo htmlspecialchars($form->header_content) ?></textarea>
			</div>
		</div>

		<div role="tabpanel" class="tab-pane" id="headercss">
            <div class="form-group">
				<label><?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('icclicktocallform/form','Header css');?></label>
				<textarea ng-non-bindable name="header_css" class="form-control" rows="10" cols=""><?php echo htmlspecialchars($form->header_css) ?></textarea>
			</div>
		</div>

		<?php 
		// Visible only if form is stored
		if ($form->id !== null) : ?>
		<div role="tabpanel" class="tab-pane" id="static">
            <?php $paramsResourceAdd = array(
                    'scope' => 'static_content',
                    'add_function' => 'addStaticResource'
                );
            ?>
			<?php include(erLhcoreClassDesign::designtpl('lhtheme/admin/resource_add.tpl.php'));?>
			<?php $paramsResourceRepeat = array(
                    'attr' => 'staticResources',
                    'scope' => 'static_content',
                    'delete' => 'deleteStaticResource'
                );
            ?>
			<?php include(erLhcoreClassDesign::designtpl('lhtheme/admin/resource_repeat.tpl.php'));?>
		</div>
		
		<div role="tabpanel" class="tab-pane" id="js">
		    <?php $paramsResourceAdd = array(
                    'scope' => 'static_js_content',
                    'add_function' => 'addStaticJSResource'
                );
            ?>
			<?php include(erLhcoreClassDesign::designtpl('lhtheme/admin/resource_add.tpl.php'));?>
			<?php $paramsResourceRepeat = array(
                    'attr' => 'staticJSResources',
                    'scope' => 'static_js_content',
                    'delete' => 'deleteStaticJSResource'
                );
            ?>
			<?php include(erLhcoreClassDesign::designtpl('lhtheme/admin/resource_repeat.tpl.php'));?>
		</div>
		
		<div role="tabpanel" class="tab-pane" id="css">
		    <?php $paramsResourceAdd = array(
                    'scope' => 'static_css_content',
                    'add_function' => 'addStaticCSSResource'
                );
            ?>
			<?php include(erLhcoreClassDesign::designtpl('lhtheme/admin/resource_add.tpl.php'));?>
			<?php $paramsResourceRepeat = array(
                    'attr' => 'staticCSSResources',
                    'scope' => 'static_css_content',
                    'delete' => 'deleteStaticCSSResource'
                );
            ?>
			<?php include(erLhcoreClassDesign::designtpl('lhtheme/admin/resource_repeat.tpl.php'));?>
		</div>
		<?php endif;?>

        <div role="tabpanel" class="tab-pane" id="mainattr">

            <h4>Main</h4>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['main_background_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('main_background_color', $fields['main_background_color'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['link_tc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('link_tc', $fields['link_tc'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['tbl_boc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('tbl_boc', $fields['tbl_boc'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['default_tc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('default_tc', $fields['default_tc'], $form)?>
                    </div>
                </div>
            </div>

            <h4>Navbar toggle</h4>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['nvb_tgl_bgc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('nvb_tgl_bgc', $fields['nvb_tgl_bgc'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['nvb_tgl_bc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('nvb_tgl_bc', $fields['nvb_tgl_bc'], $form)?>
                    </div>
                </div>
            </div>

            <h4>Navigation bar list</h4>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['nvb_li_clr']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('nvb_li_clr', $fields['nvb_li_clr'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['nvb_lih_clr']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('nvb_lih_clr', $fields['nvb_lih_clr'], $form)?>
                    </div>
                </div>
            </div>

            <h4>Dropdown</h4>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['drpdown_bgc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('drpdown_bgc', $fields['drpdown_bgc'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['drpdown_boc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('drpdown_boc', $fields['drpdown_boc'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['drpdown_hbgc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('drpdown_hbgc', $fields['drpdown_hbgc'], $form)?>
                    </div>
                </div>
            </div>

            <h4>Panels</h4>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['panel_background_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('panel_background_color', $fields['panel_background_color'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['panel_border_color']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('panel_border_color', $fields['panel_border_color'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['panel_mbc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('panel_mbc', $fields['panel_mbc'], $form)?>
                    </div>
                </div>
            </div>

            <h4>Menu</h4>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['mactive_bc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('mactive_bc', $fields['mactive_bc'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['men_col']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('men_col', $fields['men_col'], $form)?>
                    </div>
                </div>
            </div>

            <h4>Tabs</h4>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['tab_bc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('tab_bc', $fields['tab_bc'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['tab_tc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('tab_tc', $fields['tab_tc'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['tab_atc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('tab_atc', $fields['tab_atc'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['tab_boc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('tab_boc', $fields['tab_boc'], $form)?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <h4>Button default</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label><?php echo $fields['btnd_bc']['trans'];?></label>
                                <?php echo erLhcoreClassAbstract::renderInput('btnd_bc', $fields['btnd_bc'], $form)?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><?php echo $fields['btnd_clr']['trans'];?></label>
                                <?php echo erLhcoreClassAbstract::renderInput('btnd_clr', $fields['btnd_clr'], $form)?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><?php echo $fields['btnd_boc']['trans'];?></label>
                                <?php echo erLhcoreClassAbstract::renderInput('btnd_boc', $fields['btnd_boc'], $form)?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h4>Button default active</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label><?php echo $fields['btnda_clr']['trans'];?></label>
                                <?php echo erLhcoreClassAbstract::renderInput('btnda_clr', $fields['btnda_clr'], $form)?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><?php echo $fields['btnda_bc']['trans'];?></label>
                                <?php echo erLhcoreClassAbstract::renderInput('btnda_bc', $fields['btnda_bc'], $form)?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><?php echo $fields['btnda_boc']['trans'];?></label>
                                <?php echo erLhcoreClassAbstract::renderInput('btnda_boc', $fields['btnda_boc'], $form)?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-6">
                    <h4>Button primary</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label><?php echo $fields['btnp_bc']['trans'];?></label>
                                <?php echo erLhcoreClassAbstract::renderInput('btnp_bc', $fields['btnp_bc'], $form)?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><?php echo $fields['btnp_clr']['trans'];?></label>
                                <?php echo erLhcoreClassAbstract::renderInput('btnp_clr', $fields['btnp_clr'], $form)?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><?php echo $fields['btnp_boc']['trans'];?></label>
                                <?php echo erLhcoreClassAbstract::renderInput('btnp_boc', $fields['btnp_boc'], $form)?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <h4>Button primary active</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label><?php echo $fields['btnpa_clr']['trans'];?></label>
                                <?php echo erLhcoreClassAbstract::renderInput('btnpa_clr', $fields['btnpa_clr'], $form)?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><?php echo $fields['btnpa_bc']['trans'];?></label>
                                <?php echo erLhcoreClassAbstract::renderInput('btnpa_bc', $fields['btnpa_bc'], $form)?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label><?php echo $fields['btnpa_boc']['trans'];?></label>
                                <?php echo erLhcoreClassAbstract::renderInput('btnpa_boc', $fields['btnpa_boc'], $form)?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <h4>Breadcrumb</h4>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['bcrumb_bgc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('bcrumb_bgc', $fields['bcrumb_bgc'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['bcrumb_boc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('bcrumb_boc', $fields['bcrumb_boc'], $form)?>
                    </div>
                </div>
            </div>

            <h4>Header</h4>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['nvbar_bc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('nvbar_bc', $fields['nvbar_bc'], $form)?>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['nvbar_pbc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('nvbar_pbc', $fields['nvbar_pbc'], $form)?>
                    </div>
                </div>
            </div>

            <h4>Chat</h4>

            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label><?php echo $fields['chat_onl_bc']['trans'];?></label>
                        <?php echo erLhcoreClassAbstract::renderInput('chat_onl_bc', $fields['chat_onl_bc'], $form)?>
                    </div>
                </div>
            </div>

        </div>

	</div>
</div>