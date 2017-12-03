<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteMessages");
$query->setAction("delete");
$query->setPriority("");

${'message_srls1_argument'} = new ConditionArgument('message_srls', $args->message_srls, 'in');
${'message_srls1_argument'}->checkNotNull();
${'message_srls1_argument'}->createConditionValue();
if(!${'message_srls1_argument'}->isValid()) return ${'message_srls1_argument'}->getErrorMessage();
if(${'message_srls1_argument'} !== null) ${'message_srls1_argument'}->setColumnType('number');

${'message_type2_argument'} = new ConditionArgument('message_type', $args->message_type, 'equal');
${'message_type2_argument'}->checkNotNull();
${'message_type2_argument'}->createConditionValue();
if(!${'message_type2_argument'}->isValid()) return ${'message_type2_argument'}->getErrorMessage();
if(${'message_type2_argument'} !== null) ${'message_type2_argument'}->setColumnType('char');
if(isset($args->sender_srl)) {
${'sender_srl3_argument'} = new ConditionArgument('sender_srl', $args->sender_srl, 'equal');
${'sender_srl3_argument'}->createConditionValue();
if(!${'sender_srl3_argument'}->isValid()) return ${'sender_srl3_argument'}->getErrorMessage();
} else
${'sender_srl3_argument'} = NULL;if(${'sender_srl3_argument'} !== null) ${'sender_srl3_argument'}->setColumnType('number');
if(isset($args->receiver_srl)) {
${'receiver_srl4_argument'} = new ConditionArgument('receiver_srl', $args->receiver_srl, 'equal');
${'receiver_srl4_argument'}->createConditionValue();
if(!${'receiver_srl4_argument'}->isValid()) return ${'receiver_srl4_argument'}->getErrorMessage();
} else
${'receiver_srl4_argument'} = NULL;if(${'receiver_srl4_argument'} !== null) ${'receiver_srl4_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_member_message`', '`member_message`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`message_srl`',$message_srls1_argument,"in")
,new ConditionWithArgument('`message_type`',$message_type2_argument,"equal", 'and')
,new ConditionWithArgument('`sender_srl`',$sender_srl3_argument,"equal", 'and')
,new ConditionWithArgument('`receiver_srl`',$receiver_srl4_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>