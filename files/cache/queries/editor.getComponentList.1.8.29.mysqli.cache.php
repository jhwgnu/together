<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getComponentList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->enabled)) {
${'enabled4_argument'} = new ConditionArgument('enabled', $args->enabled, 'equal');
${'enabled4_argument'}->createConditionValue();
if(!${'enabled4_argument'}->isValid()) return ${'enabled4_argument'}->getErrorMessage();
} else
${'enabled4_argument'} = NULL;if(${'enabled4_argument'} !== null) ${'enabled4_argument'}->setColumnType('char');

${'sort_index5_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index5_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index5_argument'}->isValid()) return ${'sort_index5_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_editor_components`', '`editor_components`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`enabled`',$enabled4_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index5_argument'}, "asc")
));
$query->setLimit();
return $query; ?>