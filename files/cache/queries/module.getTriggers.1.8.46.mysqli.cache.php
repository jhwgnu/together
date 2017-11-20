<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getTriggers");
$query->setAction("select");
$query->setPriority("");
if(isset($args->trigger_name)) {
${'trigger_name30_argument'} = new ConditionArgument('trigger_name', $args->trigger_name, 'equal');
${'trigger_name30_argument'}->createConditionValue();
if(!${'trigger_name30_argument'}->isValid()) return ${'trigger_name30_argument'}->getErrorMessage();
} else
${'trigger_name30_argument'} = NULL;if(${'trigger_name30_argument'} !== null) ${'trigger_name30_argument'}->setColumnType('varchar');
if(isset($args->called_position)) {
${'called_position31_argument'} = new ConditionArgument('called_position', $args->called_position, 'equal');
${'called_position31_argument'}->createConditionValue();
if(!${'called_position31_argument'}->isValid()) return ${'called_position31_argument'}->getErrorMessage();
} else
${'called_position31_argument'} = NULL;if(${'called_position31_argument'} !== null) ${'called_position31_argument'}->setColumnType('varchar');

${'36_argument'} = new Argument('', $args->{''});
${'36_argument'}->ensureDefaultValue('called_method');
if(!${'36_argument'}->isValid()) return ${'36_argument'}->getErrorMessage();

${'35_argument'} = new Argument('', $args->{''});
${'35_argument'}->ensureDefaultValue('type');
if(!${'35_argument'}->isValid()) return ${'35_argument'}->getErrorMessage();

${'34_argument'} = new Argument('', $args->{''});
${'34_argument'}->ensureDefaultValue('module');
if(!${'34_argument'}->isValid()) return ${'34_argument'}->getErrorMessage();

${'33_argument'} = new Argument('', $args->{''});
${'33_argument'}->ensureDefaultValue('called_position');
if(!${'33_argument'}->isValid()) return ${'33_argument'}->getErrorMessage();

${'32_argument'} = new Argument('', $args->{''});
${'32_argument'}->ensureDefaultValue('trigger_name');
if(!${'32_argument'}->isValid()) return ${'32_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_module_trigger`', '`module_trigger`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`trigger_name`',$trigger_name30_argument,"equal")
,new ConditionWithArgument('`called_position`',$called_position31_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'32_argument'}, "asc")
,new OrderByColumn(${'33_argument'}, "asc")
,new OrderByColumn(${'34_argument'}, "asc")
,new OrderByColumn(${'35_argument'}, "asc")
,new OrderByColumn(${'36_argument'}, "asc")
));
$query->setLimit();
return $query; ?>