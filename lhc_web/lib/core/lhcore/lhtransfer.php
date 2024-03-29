<?php

class erLhcoreClassTransfer
{
	public static function getDepartmentLimitation(){
		$currentUser = erLhcoreClassUser::instance();
		$LimitationDepartament = '';
		$userData = $currentUser->getUserData(true);
		if ( $userData->all_departments == 0 )
		{
			$userDepartaments = erLhcoreClassUserDep::getUserDepartaments($currentUser->getUserID(), $userData->cache_version);

			if (count($userDepartaments) == 0) return false;

			$LimitationDepartament = '(lh_transfer.dep_id IN ('.implode(',',$userDepartaments).'))';

			return $LimitationDepartament;
		}

		return true;
	}

    public static function getTransferChats($params = array())
    {
       $db = ezcDbInstance::get();
       $currentUser = erLhcoreClassUser::instance();
       $limitationSQL = '';

       if (isset($params['department_transfers']) && $params['department_transfers'] == true) {

	       	$limitation = self::getDepartmentLimitation();

	       	// Does not have any assigned department
	       	if ($limitation === false) {
	       		return array();
	       	}

	       	if ($limitation !== true) {
	       		$limitationSQL = ' AND '.$limitation;
	       	}

	       	// Chat transfers
	       	$stmt = $db->prepare('SELECT lh_chat.*,lh_transfer.id as transfer_id, lh_transfer.transfer_to_user_id, lh_transfer.transfer_user_id, lh_transfer.transfer_scope FROM lh_chat INNER JOIN lh_transfer ON lh_transfer.chat_id = lh_chat.id WHERE transfer_scope = 0 AND transfer_user_id != :transfer_user_id '.$limitationSQL.' ORDER BY lh_transfer.id DESC LIMIT 10');
	       	$stmt->bindValue( ':transfer_user_id',$currentUser->getUserID());
	       	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	       	$stmt->execute();
	       	$rows = $stmt->fetchAll();

            $stmt = $db->prepare('SELECT lhc_mailconv_conversation.id, lhc_mailconv_conversation.subject as nick, lhc_mailconv_conversation.udate as `time`, lh_transfer.id as transfer_id, lh_transfer.transfer_to_user_id, lh_transfer.transfer_user_id, lh_transfer.transfer_scope FROM lhc_mailconv_conversation INNER JOIN lh_transfer ON lh_transfer.chat_id = lhc_mailconv_conversation.id WHERE transfer_scope = 1 AND transfer_user_id != :transfer_user_id '.$limitationSQL.' ORDER BY lh_transfer.id DESC LIMIT 10');
            $stmt->bindValue( ':transfer_user_id',$currentUser->getUserID());
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $rows = array_merge($rows ,$stmt->fetchAll());

       } else {
           // Chat transfers
	       	$stmt = $db->prepare('SELECT lh_chat.*,lh_transfer.id as transfer_id, lh_transfer.transfer_to_user_id, lh_transfer.transfer_user_id FROM lh_chat INNER JOIN lh_transfer ON lh_transfer.chat_id = lh_chat.id WHERE transfer_scope = 0 AND lh_transfer.transfer_to_user_id = :user_id ORDER BY lh_transfer.id DESC LIMIT 10');
	       	$stmt->bindValue( ':user_id',$currentUser->getUserID());
	       	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	       	$stmt->execute();
	       	$rows = $stmt->fetchAll();

	       	$stmt = $db->prepare('SELECT lhc_mailconv_conversation.id, lhc_mailconv_conversation.status, lhc_mailconv_conversation.subject as nick, lhc_mailconv_conversation.udate as `time`, lh_transfer.id as transfer_id, lh_transfer.transfer_to_user_id, lh_transfer.transfer_user_id, lh_transfer.transfer_scope FROM lhc_mailconv_conversation INNER JOIN lh_transfer ON lh_transfer.chat_id = lhc_mailconv_conversation.id WHERE transfer_scope = 1 AND lh_transfer.transfer_to_user_id = :user_id ORDER BY lh_transfer.id DESC LIMIT 10');
	       	$stmt->bindValue(':user_id',$currentUser->getUserID());
	       	$stmt->setFetchMode(PDO::FETCH_ASSOC);
	       	$stmt->execute();
            $rows = array_merge($rows ,$stmt->fetchAll());
       }
       
       foreach ($rows as & $row) {
            $row['user_id'] = $row['transfer_to_user_id'];
       }
       
       return $rows;
   }

   public static function getTransferByChat($chat_id, $scope = erLhcoreClassModelTransfer::SCOPE_CHAT)
   {
       $db = ezcDbInstance::get();

       $stmt = $db->prepare('SELECT * FROM lh_transfer WHERE lh_transfer.chat_id = :chat_id AND transfer_scope = :transfer_scope');
       $stmt->bindValue( ':chat_id',$chat_id);
       $stmt->bindValue( ':transfer_scope',$scope);
       $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $stmt->execute();
       $rows = $stmt->fetchAll();

       return (isset($rows[0])) ? $rows[0] : false;
   }

    /**
     * @param $chat
     *
     * @param $userId
     */
    public static function handleTransferredChatOpen(& $chat, $userId, $transferScope = erLhcoreClassModelTransfer::SCOPE_CHAT, & $operatorAccepted = false)
    {
        $transfer = erLhcoreClassModelTransfer::findOne(array('filter' => array('chat_id' => $chat->id, 'transfer_scope' => $transferScope)));
        if ($transfer instanceof erLhcoreClassModelTransfer) {

            if (!in_array($chat->status_sub, array(erLhcoreClassModelChat::STATUS_SUB_SURVEY_COMPLETED, erLhcoreClassModelChat::STATUS_SUB_USER_CLOSED_CHAT, erLhcoreClassModelChat::STATUS_SUB_SURVEY_SHOW, erLhcoreClassModelChat::STATUS_SUB_CONTACT_FORM))) {
                $chat->status_sub = erLhcoreClassModelChat::STATUS_SUB_OWNER_CHANGED;
            }

            // If it was transfer to operator change operator
            if ($userId == $transfer->transfer_to_user_id) {
                $chat->user_id = $transfer->transfer_to_user_id;
                $transfer->removeThis();
            } elseif ($transfer->transfer_to_user_id == 0) { // It was transfer to department so we can remove record
                $transfer->removeThis();
            }
            
            $operatorAccepted = true;
        }
    }

   public static function getSession()
   {
        if ( !isset( self::$persistentSession ) )
        {
            self::$persistentSession = new ezcPersistentSession(
                ezcDbInstance::get(),
                new ezcPersistentCodeManager( './pos/lhtransfer' )
            );
        }
        return self::$persistentSession;
   }

   private static $persistentSession;
}


?>