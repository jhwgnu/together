<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateModuleLayout");
$query->setAction("update");
$query->setPriority("");
if(isset($args->layout_srl)) {
${'layout_srl3_argument'} = new Argument('layout_srl', $args->{'layout_srl'});
if(!${'layout_srl3_argument'}->isValid()) return ${'layout_srl3_argument'}->getErrorMessage();
} else
${'layout_srl3_argument'} = NULL;if(${'layout_srl3_argument'} !== null) ${'layout_srl3_argument'}->setColumnType('number');

${'module_srls4_argument'} = new ConditionArgument('module_srls', $args->module_srls, 'in');
${'module_srls4_argument'}->checkNotNull();
${'module_srls4_argument'}->createConditionValue();
if(!${'module_srls4_argument'}->isValid()) return ${'module_srls4_argument'}->getErrorMessage();
if(${'module_srls4_argument'} !== null) ${'module_srls4_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`layout_srl`', ${'layout_srl3_argument'})
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srls4_argument,"in")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>