<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteModuleFiles");
$query->setAction("delete");
$query->setPriority("");

${'module_srl67_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl67_argument'}->checkFilter('number');
${'module_srl67_argument'}->checkNotNull();
${'module_srl67_argument'}->createConditionValue();
if(!${'module_srl67_argument'}->isValid()) return ${'module_srl67_argument'}->getErrorMessage();
if(${'module_srl67_argument'} !== null) ${'module_srl67_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_files`', '`files`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl67_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>