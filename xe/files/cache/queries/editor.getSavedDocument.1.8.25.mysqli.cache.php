<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getSavedDocument");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl244_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl244_argument'}->createConditionValue();
if(!${'module_srl244_argument'}->isValid()) return ${'module_srl244_argument'}->getErrorMessage();
} else
${'module_srl244_argument'} = NULL;if(${'module_srl244_argument'} !== null) ${'module_srl244_argument'}->setColumnType('number');
if(isset($args->member_srl)) {
${'member_srl245_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl245_argument'}->createConditionValue();
if(!${'member_srl245_argument'}->isValid()) return ${'member_srl245_argument'}->getErrorMessage();
} else
${'member_srl245_argument'} = NULL;if(${'member_srl245_argument'} !== null) ${'member_srl245_argument'}->setColumnType('number');
if(isset($args->ipaddress)) {
${'ipaddress246_argument'} = new ConditionArgument('ipaddress', $args->ipaddress, 'equal');
${'ipaddress246_argument'}->createConditionValue();
if(!${'ipaddress246_argument'}->isValid()) return ${'ipaddress246_argument'}->getErrorMessage();
} else
${'ipaddress246_argument'} = NULL;if(${'ipaddress246_argument'} !== null) ${'ipaddress246_argument'}->setColumnType('varchar');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_editor_autosave`', '`editor_autosave`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl244_argument,"equal")
,new ConditionWithArgument('`member_srl`',$member_srl245_argument,"equal", 'and')
,new ConditionWithArgument('`ipaddress`',$ipaddress246_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>