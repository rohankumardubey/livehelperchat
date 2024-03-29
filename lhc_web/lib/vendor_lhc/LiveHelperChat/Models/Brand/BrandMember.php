<?php

namespace LiveHelperChat\Models\Brand;
#[\AllowDynamicProperties]
class BrandMember {

    use \erLhcoreClassDBTrait;

    public static $dbTable = 'lh_brand_member';

    public static $dbTableId = 'id';

    public static $dbSessionHandler = 'erLhcoreClassAbstract::getSession';

    public static $dbSortOrder = 'DESC';

    public static $dbDefaultSort = 'dep_id ASC';

    public function getState()
    {
        $stateArray = array(
            'id' => $this->id,
            'dep_id' => $this->dep_id,
            'brand_id' => $this->brand_id,
            'role' => $this->role
        );

        return $stateArray;
    }

    public function __toString()
    {
        return $this->role;
    }

    public function __get($var)
    {
        switch ($var) {

            case 'brand_dynamic_array':

                $chat_dynamic_array = [];
                \erLhcoreClassChatEventDispatcher::getInstance()->dispatch('chat.brand_dynamic_array', array('brand_member' => $this, 'dynamic_array' => & $chat_dynamic_array));
                $this->brand_dynamic_array = $chat_dynamic_array;

                return $this->brand_dynamic_array;

            default:
                ;
                break;
        }
    }

    public $id = null;
    public $dep_id = null;
    public $brand_id = null;
    public $role = '';
}