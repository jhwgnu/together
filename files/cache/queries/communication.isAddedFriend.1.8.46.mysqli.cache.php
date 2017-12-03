<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("isAddedFriend");
$query->setAction("select");
$query->setPriority("");

${'member_srl1_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl1_argument'}->checkNotNull();
${'member_srl1_argument'}->createConditionValue();
if(!${'member_srl1_argument'}->isValid()) return ${'member_srl1_argument'}->getErrorMessage();
if(${'member_srl1_argument'} !== null) ${'member_srl1_argument'}->setColumnType('number');

${'target_srl2_argument'} = new ConditionArgument('target_srl', $args->target_srl, 'equal');
${'target_srl2_argument'}->checkNotNull();
${'target_srl2_argument'}->createConditionValue();
if(!${'target_srl2_argument'}->isValid()) return ${'target_srl2_argument'}->getErrorMessage();
if(${'target_srl2_argument'} !== null) ${'target_srl2_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_member_friend`', '`member_friend`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl1_argument,"equal")
,new ConditionWithArgument('`target_srl`',$target_srl2_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>