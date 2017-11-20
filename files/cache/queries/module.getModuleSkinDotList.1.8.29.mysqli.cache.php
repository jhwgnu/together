<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModuleSkinDotList");
$query->setAction("select");
$query->setPriority("");

${'skin54_argument'} = new ConditionArgument('skin', $args->skin, 'like');
${'skin54_argument'}->ensureDefaultValue('.');
${'skin54_argument'}->createConditionValue();
if(!${'skin54_argument'}->isValid()) return ${'skin54_argument'}->getErrorMessage();
if(${'skin54_argument'} !== null) ${'skin54_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('`module`')
,new SelectExpression('`skin`')
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`skin`',$skin54_argument,"like")))
));
$query->setGroups(array(
'`skin`' ));
$query->setOrder(array());
$query->setLimit();
return $query; ?>