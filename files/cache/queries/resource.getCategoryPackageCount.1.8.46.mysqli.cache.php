<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getCategoryPackageCount");
$query->setAction("select");
$query->setPriority("");

${'module_srl13_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'equal');
${'module_srl13_argument'}->checkFilter('number');
${'module_srl13_argument'}->checkNotNull();
${'module_srl13_argument'}->createConditionValue();
if(!${'module_srl13_argument'}->isValid()) return ${'module_srl13_argument'}->getErrorMessage();
if(${'module_srl13_argument'} !== null) ${'module_srl13_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`package`.`category_srl`', '`category_srl`')
,new SelectExpression('count(*)', '`count`')
));
$query->setTables(array(
new Table('`xe_resource_packages`', '`package`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`package`.`module_srl`',$module_srl13_argument,"equal", 'and')
,new ConditionWithoutArgument('`package`.`status`',"'accepted'","equal", 'and')
,new ConditionWithoutArgument('`package`.`latest_item_srl`','1',"more", 'and')))
));
$query->setGroups(array(
'`package`.`category_srl`' ));
$query->setOrder(array());
$query->setLimit();
return $query; ?>