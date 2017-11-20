<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getModulesByModuleName");
$query->setAction("select");
$query->setPriority("");
if(isset($args->modules)) {
${'modules1_argument'} = new ConditionArgument('modules', $args->modules, 'in');
${'modules1_argument'}->createConditionValue();
if(!${'modules1_argument'}->isValid()) return ${'modules1_argument'}->getErrorMessage();
} else
${'modules1_argument'} = NULL;if(${'modules1_argument'} !== null) ${'modules1_argument'}->setColumnType('varchar');

${'sort_index2_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index2_argument'}->ensureDefaultValue('browser_title');
if(!${'sort_index2_argument'}->isValid()) return ${'sort_index2_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module`',$modules1_argument,"in")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index2_argument'}, "asc")
));
$query->setLimit();
return $query; ?>