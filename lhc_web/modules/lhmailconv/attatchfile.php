<?php

$currentUser = erLhcoreClassUser::instance();
$currentUser->getUserID();

$tpl = erLhcoreClassTemplate::getInstance('lhmailconv/attatchfile.tpl.php');

if (isset($_GET['doSearch'])) {
    $filterParams = erLhcoreClassSearchHandler::getParams(array('module' => 'chat','module_file' => 'filelist','format_filter' => true, 'use_override' => true, 'uparams' => $Params['user_parameters_unordered']));
    $filterParams['is_search'] = true;
} else {
    $filterParams = erLhcoreClassSearchHandler::getParams(array('module' => 'chat','module_file' => 'filelist','format_filter' => true, 'uparams' => $Params['user_parameters_unordered']));
    $filterParams['is_search'] = false;
}

$append = erLhcoreClassSearchHandler::getURLAppendFromInput($filterParams['input_form']);

$pages = new lhPaginator();
$pages->serverURL = erLhcoreClassDesign::baseurl('mailconv/attatchfile').$append;
$pages->items_total = erLhcoreClassChat::getCount($filterParams['filter'],'lh_chat_file');
$pages->setItemsPerPage(20);
$pages->paginate();

$items = array();
if ($pages->items_total > 0) {
    $items = erLhcoreClassChat::getList(array_merge(array('offset' => $pages->low, 'limit' => $pages->items_per_page,'sort' => 'id DESC'), $filterParams['filter']),'erLhcoreClassModelChatFile','lh_chat_file');
}

$tpl->set('items',$items);
$tpl->set('pages',$pages);

$filterParams['input_form']->form_action = erLhcoreClassDesign::baseurl('mailconv/attatchfile') . ($filterParams['input_form']->attachment == 1 ? '/(attachment)/1' : '');
$tpl->set('input',$filterParams['input_form']);

if (isset($_GET['ajax_search'])) {
    $tpl->set('ajax_search',true);
    echo $tpl->fetch();
    exit;
}

$Result['content'] = $tpl->fetch();
$Result['pagelayout'] = 'popup';

?>