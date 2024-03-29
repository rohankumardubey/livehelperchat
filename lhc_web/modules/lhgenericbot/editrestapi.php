<?php

$tpl = erLhcoreClassTemplate::getInstance('lhgenericbot/editrestapi.tpl.php');

$botRestAPI =  erLhcoreClassModelGenericBotRestAPI::fetch((int)$Params['user_parameters']['id']);

if ( isset($_POST['Cancel_bot']) ) {
    erLhcoreClassModule::redirect('genericbot/listrestapi');
    exit;
}

if (isset($_POST['ClearCacheAction'])) {
    if (!isset($_POST['csfr_token']) || !$currentUser->validateCSFRToken($_POST['csfr_token'])) {
        erLhcoreClassModule::redirect('genericbot/editrestapi','/' . $botRestAPI->id);
        exit;
    }

    // Rest API Cache
    $q = ezcDbInstance::get()->createDeleteQuery();
    $q->deleteFrom('lh_generic_bot_rest_api_cache')->where( $q->expr->eq( 'rest_api_id', $botRestAPI->id ) );
    $stmt = $q->prepare();
    $stmt->execute();
}

if (isset($_POST['Update_bot']) || isset($_POST['Save_bot'])  )
{
    if (!isset($_POST['csfr_token']) || !$currentUser->validateCSFRToken($_POST['csfr_token'])) {
        erLhcoreClassModule::redirect('genericbot/listrestapi');
        exit;
    }

    $Errors = erLhcoreClassGenericBot::validateBotRestAPI($botRestAPI);

    if (count($Errors) == 0)
    {
        $botRestAPI->saveThis();

        if (isset($_POST['Save_bot'])) {
            erLhcoreClassModule::redirect('genericbot/listrestapi');
            exit;
        } else {
            $tpl->set('updated',true);
        }

    }  else {
        $tpl->set('errors',$Errors);
    }
}

$tpl->set('item', $botRestAPI);

$Result['additional_footer_js'] = '<script type="text/javascript" src="'.erLhcoreClassDesign::designJS('js/angular.bot.rest.api.js').'"></script>';
$Result['require_angular'] = true;

$Result['content'] = $tpl->fetch();
$Result['path'] = array(
    array('url' => erLhcoreClassDesign::baseurl('system/configuration'),'title' => erTranslationClassLhTranslation::getInstance()->getTranslation('genericbot/edit','System configuration')),
    array('url' => erLhcoreClassDesign::baseurl('genericbot/listrestapi'),'title' => erTranslationClassLhTranslation::getInstance()->getTranslation('genericbot/edit','Rest API Calls')),
    array('title' => $botRestAPI->name));

?>