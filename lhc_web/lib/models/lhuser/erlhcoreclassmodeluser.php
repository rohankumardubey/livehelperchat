<?php
#[\AllowDynamicProperties]
class erLhcoreClassModelUser {

    use erLhcoreClassDBTrait;

    public static $dbTable = 'lh_users';

    public static $dbTableId = 'id';

    public static $dbSessionHandler = 'erLhcoreClassUser::getSession';

    public static $dbSortOrder = 'DESC';

    public function getState()
    {
        return array(
            'id' => $this->id,
            'username' => $this->username,
            'password' => $this->password,
            'email' => $this->email,
            'name' => $this->name,
            'surname' => $this->surname,
            'disabled' => $this->disabled,
            'hide_online' => $this->hide_online,
            'all_departments' => $this->all_departments,
            'filepath' => $this->filepath,
            'filename' => $this->filename,
            'skype' => $this->skype,
            'job_title' => $this->job_title,
            'time_zone' => $this->time_zone,
            'invisible_mode' => $this->invisible_mode,
            'inactive_mode' => $this->inactive_mode,
            'xmpp_username' => $this->xmpp_username,
            'rec_per_req' => $this->rec_per_req,
            'session_id' => $this->session_id,
            'departments_ids' => $this->departments_ids,
            'chat_nickname' => $this->chat_nickname,
            'max_active_chats' => $this->max_active_chats,
            'max_active_mails' => $this->max_active_mails,
            'auto_accept' => $this->auto_accept,
            'attr_int_1' => $this->attr_int_1,
            'attr_int_2' => $this->attr_int_2,
            'attr_int_3' => $this->attr_int_3,
            'operation_admin' => $this->operation_admin,
            'exclude_autoasign' => $this->exclude_autoasign,
            'exclude_autoasign_mails' => $this->exclude_autoasign_mails,
            'pswd_updated' => $this->pswd_updated,
            'always_on' => $this->always_on,
            'avatar' => $this->avatar,
            'cache_version' => $this->cache_version,
            'llogin' => $this->llogin,
            'force_logout' => $this->force_logout,
        );
   }

   public function setPassword($password)
   {
		$hash = password_hash($password, PASSWORD_DEFAULT);
       
		if ($hash) {
			$this->password = $hash;
			$this->pswd_updated = time();
		} else {
			return false;
		}
   }

   public function __toString()
   {
   		return $this->username.' ('.$this->email.')';
   }

   public static function getUserCount($params = array())
   {
       return self::getCount($params);
   }

   public function beforeUpdate()
   {
       $this->cache_version = $this->cache_version + 1;
   }

    public function __get($param)
   {
       switch ($param) {

       	case 'name_support':
       			return $this->chat_nickname != '' ? trim($this->chat_nickname) : trim($this->name_official);

       	case 'name_official':
       			$this->name_official = trim($this->name.' '.$this->surname);
       			$this->name_official = $this->name_official != '' ? $this->name_official : $this->chat_nickname;
       			return $this->name_official;

       	case 'user_groups_id':
       		   $userGroups = erLhcoreClassModelGroupUser::getList(array('filter' => array('user_id' => $this->id)));
       		   $this->user_groups_id = array();

       		   if (!empty($userGroups)) {
       		   		foreach ($userGroups as $userGroup) {
       		   	 		$this->user_groups_id[] = $userGroup->group_id;
       		   		}
       		   }

       		   return $this->user_groups_id;

       	case 'lastactivity':
       	case 'lastd_activity':
                $activityVar = array('lastactivity' => 'last_activity', 'lastd_activity' => 'lastd_activity');
                $db = ezcDbInstance::get();
                $stmt = $db->prepare('SELECT '. $activityVar[$param] .' FROM lh_userdep WHERE user_id = :user_id LIMIT 1');
                $stmt->bindValue(':user_id',$this->id,PDO::PARAM_INT);
                $stmt->execute();
                $this->{$param} = (int)$stmt->fetchColumn();
                return $this->{$param};

       	case 'has_photo':
       	    	return $this->filename != '';

       	case 'has_photo_avatar':
       	    	return $this->filename != '' || $this->avatar != '';

       	case 'photo_path':
       			$this->photo_path = ($this->filepath != '' ? erLhcoreClassSystem::getHost() . erLhcoreClassSystem::instance()->wwwDir() : erLhcoreClassSystem::instance()->wwwImagesDir() ) .'/'. $this->filepath . $this->filename;
       			return $this->photo_path;

       	case 'file_path_server':
       			return $this->filepath . $this->filename;

       	case 'lastactivity_front':
       		   $this->lastactivity_front = '';

       		   if ( $this->lastactivity > 0 ) {
       		       $this->lastactivity_front = date(erLhcoreClassModule::$dateDateHourFormat);
       		   };

       		   return $this->lastactivity_front;

       	case 'lastactivity_ago':
       	case 'llogin_ago':
               $var = str_replace('_ago','',$param);
               if ($this->{$var} > 0) {
                   $this->{$param} = erLhcoreClassChat::getAgoFormat($this->{$var});
               } else {
                   $this->{$param} = '';
               }
       		   return $this->{$param};

       	default:
       		break;
       }
   }

   public static function getUserList($paramsSearch = array())
   {
       return self::getList($paramsSearch);
   }

   public static function userExists($username)
   {
       return self::getCount(array('filter' => array('username' => $username))) > 0;
   }

   public static function fetchUserByEmail($email, $xmpp_username = false)
   {
       $db = ezcDbInstance::get();
       $xmppAppend = $xmpp_username !== false ? ' OR xmpp_username = :xmpp_username' : '';       
       $stmt = $db->prepare('SELECT id FROM lh_users WHERE email = :email'.$xmppAppend);
       $stmt->bindValue( ':email',$email);
       
       if ($xmpp_username !== false) {
       		$stmt->bindValue( ':xmpp_username',$xmpp_username);       		
       }
       
       $stmt->execute();
       $rows = $stmt->fetchAll();

       if (isset($rows[0]['id'])) {
            return $rows[0]['id'];
       } else {
            return false;
       }
   }

   public function removeFile()
   {   		   	
	   	if ($this->filename != '') {
	   		if ( file_exists($this->filepath . $this->filename) ) {
	   			unlink($this->filepath . $this->filename);
	   		}

	   		if ($this->filepath != '') {
	   			erLhcoreClassFileUpload::removeRecursiveIfEmpty('var/userphoto/',str_replace('var/userphoto/','',$this->filepath));
	   		}
	   		
	   		erLhcoreClassChatEventDispatcher::getInstance()->dispatch('user.remove_photo', array('user' => & $this));
	   		
	   		$this->filepath = '';
	   		$this->filename = '';
	   		$this->saveThis();
	   	}
   }

   public function setUserGroups() {
   		
		erLhcoreClassModelGroupUser::removeUserFromGroups($this->id);
		
		foreach ($this->user_groups_id as $group_id) {
			$groupUser = new erLhcoreClassModelGroupUser();
			$groupUser->group_id = $group_id;
			$groupUser->user_id = $this->id;
			$groupUser->saveThis();
		}
		
   	}


   	public function hasAccessTo($module, $function) {
        if ($this->accessArray === null) {
            $this->accessArray = erLhcoreClassRole::accessArrayByUserID($this->id);
        }

        return erLhcoreClassRole::canUseByModuleAndFunction($this->accessArray, $module, $function);
    }

    private $accessArray = null;

    public $id = null;
    public $username = '';
    public $password = '';
    public $email = '';
    public $name = '';
    public $filepath = '';
    public $filename = '';
    public $surname = '';
    public $job_title = '';
    public $departments_ids = '';
    public $skype = '';
    public $xmpp_username = '';
    public $disabled = 0;
    public $hide_online = 0;
    public $all_departments = 0;
    public $invisible_mode = 0;
    public $time_zone = '';
    public $rec_per_req = '';
    public $session_id = '';
    public $chat_nickname = '';
    public $operation_admin = '';
    public $inactive_mode = 0;
    public $max_active_chats = 0;
    public $max_active_mails = 0;
    public $auto_accept = 0;
    public $exclude_autoasign = 0;
    public $exclude_autoasign_mails = 0;
    public $pswd_updated = 0;
    public $always_on = 0;
    public $avatar = '';
    public $cache_version = 0;
    public $llogin = 0;
    public $force_logout = 0;

    public $attr_int_1 = 0;
    public $attr_int_2 = 0;
    public $attr_int_3 = 0;
}

?>