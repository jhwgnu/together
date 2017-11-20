<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("deleteModuleCategory");
$query->setAction("delete");
$query->setPriority("");

${'module_category_srl1_argument'} = new ConditionArgument('module_category_srl', $args->module_category_srl, 'equal');
${'module_category_srl1_argument'}->checkFilter('number');
${'module_category_srl1_argument'}->checkNotNull();
${'module_category_srl1_argument'}->createConditionValue();
if(!${'module_category_srl1_argument'}->isValid()) return ${'module_category_srl1_argument'}->getErrorMessage();
if(${'module_category_srl1_argument'} !== null) ${'module_category_srl1_argument'}->setColumnType('number');

$query->setTables(array(
new Table('`xe_module_categories`', '`module_categories`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_category_srl`',$module_category_srl1_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>