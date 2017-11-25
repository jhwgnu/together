<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMessage");
$query->setAction("select");
$query->setPriority("");

${'message_srl1_argument'} = new ConditionArgument('message_srl', $args->message_srl, 'equal');
${'message_srl1_argument'}->checkNotNull();
${'message_srl1_argument'}->createConditionValue();
if(!${'message_srl1_argument'}->isValid()) return ${'message_srl1_argument'}->getErrorMessage();
if(${'message_srl1_argument'} !== null) ${'message_srl1_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_member_message`', '`member_message`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`message_srl`',$message_srl1_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>