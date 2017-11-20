<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getAuthMail");
$query->setAction("select");
$query->setPriority("");

${'auth_key1_argument'} = new ConditionArgument('auth_key', $args->auth_key, 'equal');
${'auth_key1_argument'}->checkNotNull();
${'auth_key1_argument'}->createConditionValue();
if(!${'auth_key1_argument'}->isValid()) return ${'auth_key1_argument'}->getErrorMessage();
if(${'auth_key1_argument'} !== null) ${'auth_key1_argument'}->setColumnType('varchar');

${'member_srl2_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl2_argument'}->checkNotNull();
${'member_srl2_argument'}->createConditionValue();
if(!${'member_srl2_argument'}->isValid()) return ${'member_srl2_argument'}->getErrorMessage();
if(${'member_srl2_argument'} !== null) ${'member_srl2_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_member_auth_mail`', '`member_auth_mail`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`auth_key`',$auth_key1_argument,"equal")
,new ConditionWithArgument('`member_srl`',$member_srl2_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>