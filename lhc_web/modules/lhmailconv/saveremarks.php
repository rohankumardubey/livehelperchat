<?php
header('content-type: application/json; charset=utf-8');

$definition = array(
    'data' => new ezcInputFormDefinitionElement(
        ezcInputFormDefinitionElement::OPTIONAL, 'unsafe_raw'
    )
);

$requestBody = json_decode(file_get_contents('php://input'),true);

$form = new erLhcoreClassInputForm(INPUT_GET, $definition, null, $requestBody);

$Chat = erLhcoreClassModelMailconvConversation::fetch($Params['user_parameters']['id']);

$errorTpl = erLhcoreClassTemplate::getInstance( 'lhkernel/validation_error.tpl.php');

if ( erLhcoreClassChat::hasAccessToRead($Chat) )
{
    if ($form->hasInputField('data') && $form->hasValidData('data')) {
        $errors = array();
        erLhcoreClassChatEventDispatcher::getInstance()->dispatch('chat.before_save_remarks', array('chat' => & $Chat, 'errors' => & $errors));

        if(empty($errors)) {
            $Chat->remarks = $form->data;
            $Chat->saveThis(array('update' => array('remarks')));
            echo json_encode(array('error' => 'false'));
            exit;
        } else {
            $errorTpl->set('errors', $errors);
            echo json_encode(array('error' => 'true', 'result' => $errorTpl->fetch()));
            exit;
        }
    } else {
        $errorTpl->set('errors', array(erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat','Form data not valid')));
        echo json_encode(array('error' => 'true', 'result' => $errorTpl->fetch()));
        exit;
    }
} else {
    $errorTpl->set('errors', array(erTranslationClassLhTranslation::getInstance()->getTranslation('chat/adminchat','Has no access to this chat')));
    echo json_encode(array('error' => 'true', 'result' => $errorTpl->fetch()));
    exit;
}
?>