<?php

$def = include 'pos/lhmailconv/erlhcoreclassmodelmailconvmessagesubject.php';
$def->table =  \LiveHelperChat\Models\mailConv\Archive\Range::$archiveConversationMsgSubjectTable;
$def->class = '\LiveHelperChat\Models\mailConv\Archive\MessageSubject';

$def->idProperty = new ezcPersistentObjectIdProperty();
$def->idProperty->columnName = 'id';
$def->idProperty->propertyName = 'id';
$def->idProperty->propertyType = ezcPersistentObjectProperty::PHP_TYPE_INT;
$def->idProperty->generator = new ezcPersistentGeneratorDefinition(  'ezcPersistentManualGenerator' );

return $def;

?>