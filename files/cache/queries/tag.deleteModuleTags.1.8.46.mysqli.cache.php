<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteModuleTags");
$query->setAction("delete");
$query->setPriority("");

${'module_srl70_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl70_argument'}->checkFilter('number');
${'module_srl70_argument'}->checkNotNull();
${'module_srl70_argument'}->createConditionValue();
if(!${'module_srl70_argument'}->isValid()) return ${'module_srl70_argument'}->getErrorMessage();
if(${'module_srl70_argument'} !== null) ${'module_srl70_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_tags`', '`tags`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl70_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>