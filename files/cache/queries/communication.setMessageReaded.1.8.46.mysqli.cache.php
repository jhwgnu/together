<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("setMessageReaded");
$query->setAction("update");
$query->setPriority("");

${'message_srl2_argument'} = new ConditionArgument('message_srl', $args->message_srl, 'equal');
${'message_srl2_argument'}->checkFilter('number');
${'message_srl2_argument'}->checkNotNull();
${'message_srl2_argument'}->createConditionValue();
if(!${'message_srl2_argument'}->isValid()) return ${'message_srl2_argument'}->getErrorMessage();
if(${'message_srl2_argument'} !== null) ${'message_srl2_argument'}->setColumnType('number');

${'related_srl3_argument'} = new ConditionArgument('related_srl', $args->related_srl, 'equal');
${'related_srl3_argument'}->checkFilter('number');
${'related_srl3_argument'}->checkNotNull();
${'related_srl3_argument'}->createConditionValue();
if(!${'related_srl3_argument'}->isValid()) return ${'related_srl3_argument'}->getErrorMessage();
if(${'related_srl3_argument'} !== null) ${'related_srl3_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpressionWithoutArgument('`readed`', "'Y'")
,new UpdateExpressionWithoutArgument('`readed_date`', "'".date("YmdHis")."'")
));
$query->setTables(array(
new Table('`xe_member_message`', '`member_message`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`message_srl`',$message_srl2_argument,"equal")
,new ConditionWithArgument('`related_srl`',$related_srl3_argument,"equal", 'or')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>