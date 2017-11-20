<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getTriggers");
$query->setAction("select");
$query->setPriority("");
if(isset($args->trigger_name)) {
${'trigger_name9_argument'} = new ConditionArgument('trigger_name', $args->trigger_name, 'equal');
${'trigger_name9_argument'}->createConditionValue();
if(!${'trigger_name9_argument'}->isValid()) return ${'trigger_name9_argument'}->getErrorMessage();
} else
${'trigger_name9_argument'} = NULL;if(${'trigger_name9_argument'} !== null) ${'trigger_name9_argument'}->setColumnType('varchar');
if(isset($args->called_position)) {
${'called_position10_argument'} = new ConditionArgument('called_position', $args->called_position, 'equal');
${'called_position10_argument'}->createConditionValue();
if(!${'called_position10_argument'}->isValid()) return ${'called_position10_argument'}->getErrorMessage();
} else
${'called_position10_argument'} = NULL;if(${'called_position10_argument'} !== null) ${'called_position10_argument'}->setColumnType('varchar');

${'15_argument'} = new Argument('', $args->{''});
${'15_argument'}->ensureDefaultValue('called_method');
if(!${'15_argument'}->isValid()) return ${'15_argument'}->getErrorMessage();

${'14_argument'} = new Argument('', $args->{''});
${'14_argument'}->ensureDefaultValue('type');
if(!${'14_argument'}->isValid()) return ${'14_argument'}->getErrorMessage();

${'13_argument'} = new Argument('', $args->{''});
${'13_argument'}->ensureDefaultValue('module');
if(!${'13_argument'}->isValid()) return ${'13_argument'}->getErrorMessage();

${'12_argument'} = new Argument('', $args->{''});
${'12_argument'}->ensureDefaultValue('called_position');
if(!${'12_argument'}->isValid()) return ${'12_argument'}->getErrorMessage();

${'11_argument'} = new Argument('', $args->{''});
${'11_argument'}->ensureDefaultValue('trigger_name');
if(!${'11_argument'}->isValid()) return ${'11_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_module_trigger`', '`module_trigger`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`trigger_name`',$trigger_name9_argument,"equal")
,new ConditionWithArgument('`called_position`',$called_position10_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'11_argument'}, "asc")
,new OrderByColumn(${'12_argument'}, "asc")
,new OrderByColumn(${'13_argument'}, "asc")
,new OrderByColumn(${'14_argument'}, "asc")
,new OrderByColumn(${'15_argument'}, "asc")
));
$query->setLimit();
return $query; ?>