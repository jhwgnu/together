<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteModuleExtraVars");
$query->setAction("delete");
$query->setPriority("");

${'module_srl181_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl181_argument'}->checkFilter('number');
${'module_srl181_argument'}->checkNotNull();
${'module_srl181_argument'}->createConditionValue();
if(!${'module_srl181_argument'}->isValid()) return ${'module_srl181_argument'}->getErrorMessage();
if(${'module_srl181_argument'} !== null) ${'module_srl181_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_module_extra_vars`', '`module_extra_vars`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl181_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>