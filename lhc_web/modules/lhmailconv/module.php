<?php

$Module = array( "name" => "Mail conversation module");

$ViewList = array();

$ViewList['index'] = array(
    'params' => array(),
    'functions' => array( 'use_admin' )
);

$ViewList['uploadimage'] = array(
    'params' => array(),
    'functions' => array( 'use_admin' )
);

$ViewList['uploadfile'] = array(
    'params' => array(),
    'functions' => array( 'use_admin' )
);

$ViewList['attatchfiledata'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['mailbox'] = array(
    'params' => array(),
    'functions' => array( 'mailbox_manage' )
);

$ViewList['inlinedownload'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['previewmail'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['transfermail'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['apimaildownload'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['apisendreply'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['apifetchmails'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['attatchfile'] = array(
    'params' => array(),
    'uparams' => array('persistent','user_id','visitor','upload_name','attachment'),
    'functions' => array( 'use_admin' )
);

$ViewList['insertfile'] = array(
    'params' => array('id'),
    'uparams' => array('mode'),
    'functions' => array( 'use_admin' )
);

$ViewList['getreplydata'] = array(
    'params' => array('id','mode'),
    'functions' => array( 'use_admin' )
);

$ViewList['mailprint'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['mailprintcovnersation'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['view'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['single'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['apinoreplyrequired'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['apilabelmessage'] = array(
    'params' => array('id'),
    'uparams' => array('subject','status'),
    'functions' => array( 'use_admin' )
);

$ViewList['apigetlabels'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['apicloseconversation'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['apideleteconversation'] = array(
    'params' => array('id'),
    'functions' => array( 'delete_conversation' )
);

$ViewList['loadmainconv'] = array(
    'params' => array('id'),
    'uparams' => array('mode'),
    'functions' => array( 'use_admin' )
);

$ViewList['saveremarks'] = array(
    'params' => array('id'),
    'uparams' => array(),
    'functions' => array( 'use_admin' )
);

$ViewList['mailhistory'] = array(
    'params' => array('id'),
    'uparams' => array(),
    'functions' => array( 'use_admin' )
);

$ViewList['conversations'] = array(
    'params' => array(),
    'uparams' => array('subject','department_ids','department_group_ids','user_ids','group_ids','subject_id','wait_time_from','wait_time_till','conversation_id','nick','email','timefrom','timeto','user_id','xls','conversation_status','hum','product_id','timefrom','timefrom_minutes','timefrom_hours','timeto', 'timeto_minutes', 'timeto_hours', 'department_group_id', 'group_id'),
    'functions' => array( 'use_admin' ),
    'multiple_arguments' => array(
        'department_ids',
        'department_group_ids',
        'user_ids',
        'group_ids',
        'bot_ids',
    )
);

$ViewList['newmailbox'] = array(
    'params' => array(),
    'functions' => array( 'mailbox_manage' )
);

$ViewList['syncmailbox'] = array(
    'params' => array('id'),
    'functions' => array( 'use_admin' )
);

$ViewList['matchingrules'] = array(
    'params' => array(),
    'functions' => array( 'mrules_manage' )
);

$ViewList['newmatchrule'] = array(
    'params' => array(),
    'functions' => array( 'mrules_manage' )
);

$ViewList['editmailbox'] = array(
    'params' => array('id'),
    'uparams' => array('action'),
    'functions' => array( 'mailbox_manage' )
);

$ViewList['editmatchrule'] = array(
    'params' => array('id'),
    'functions' => array( 'mrules_manage' )
);

$ViewList['deletemailbox'] = array(
    'params' => array('id'),
    'uparams' => array('csfr'),
    'functions' => array( 'mailbox_manage' )
);

$ViewList['deleteconversation'] = array(
    'params' => array('id'),
    'uparams' => array('csfr'),
    'functions' => array( 'use_admin' )
);

$ViewList['deleteresponsetemplate'] = array(
    'params' => array('id'),
    'uparams' => array('csfr'),
    'functions' => array( 'rtemplates_manage' )
);

$ViewList['deletematchingrule'] = array(
    'params' => array('id'),
    'uparams' => array('csfr'),
    'functions' => array( 'mrules_manage' )
);

$ViewList['responsetemplates'] = array(
    'params' => array(),
    'uparams' => array(),
    'functions' => array( 'rtemplates_manage' )
);

$ViewList['apiresponsetemplates'] = array(
    'params' => array('id'),
    'uparams' => array(),
    'functions' => array( 'use_admin' )
);

$ViewList['newresponsetemplate'] = array(
    'params' => array(),
    'functions' => array( 'rtemplates_manage' )
);

$ViewList['editresponsetemplate'] = array(
    'params' => array('id'),
    'functions' => array( 'rtemplates_manage' )
);

$ViewList['notifications'] = array(
    'params' => array(),
    'functions' => array( 'use_alarms' )
);

$FunctionList = array();
$FunctionList['use_admin'] = array('explain' => 'Permission to use mail conversation module');
$FunctionList['mailbox_manage'] = array('explain' => 'Permission to manage mailbox');
$FunctionList['mrules_manage'] = array('explain' => 'Permission to manage matching rules');
$FunctionList['rtemplates_manage'] = array('explain' => 'Permission to manage response templates');
$FunctionList['use_alarms'] = array('explain' => 'Permission to use alarm widget');
$FunctionList['delete_conversation'] = array('explain' => 'Permission to delete conversation');

?>