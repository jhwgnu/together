<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModuleSkinDotList");
$query->setAction("select");
$query->setPriority("");

${'skin23_argument'} = new ConditionArgument('skin', $args->skin, 'like');
${'skin23_argument'}->ensureDefaultValue('.');
${'skin23_argument'}->createConditionValue();
if(!${'skin23_argument'}->isValid()) return ${'skin23_argument'}->getErrorMessage();
if(${'skin23_argument'} !== null) ${'skin23_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('`module`')
,new SelectExpression('`skin`')
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`skin`',$skin23_argument,"like")))
));
$query->setGroups(array(
'`skin`' ));
$query->setOrder(array());
$query->setLimit();
return $query; ?>