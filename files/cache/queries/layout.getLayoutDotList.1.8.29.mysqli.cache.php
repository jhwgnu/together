<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getLayoutDotList");
$query->setAction("select");
$query->setPriority("");

${'site_srl49_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl49_argument'}->checkFilter('number');
${'site_srl49_argument'}->ensureDefaultValue('0');
${'site_srl49_argument'}->checkNotNull();
${'site_srl49_argument'}->createConditionValue();
if(!${'site_srl49_argument'}->isValid()) return ${'site_srl49_argument'}->getErrorMessage();
if(${'site_srl49_argument'} !== null) ${'site_srl49_argument'}->setColumnType('number');

${'layout_type50_argument'} = new ConditionArgument('layout_type', $args->layout_type, 'equal');
${'layout_type50_argument'}->ensureDefaultValue('P');
${'layout_type50_argument'}->createConditionValue();
if(!${'layout_type50_argument'}->isValid()) return ${'layout_type50_argument'}->getErrorMessage();
if(${'layout_type50_argument'} !== null) ${'layout_type50_argument'}->setColumnType('char');

${'layout51_argument'} = new ConditionArgument('layout', $args->layout, 'like');
${'layout51_argument'}->ensureDefaultValue('.');
${'layout51_argument'}->createConditionValue();
if(!${'layout51_argument'}->isValid()) return ${'layout51_argument'}->getErrorMessage();
if(${'layout51_argument'} !== null) ${'layout51_argument'}->setColumnType('varchar');

${'sort_index52_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index52_argument'}->ensureDefaultValue('layout_srl');
if(!${'sort_index52_argument'}->isValid()) return ${'sort_index52_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_layouts`', '`layouts`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl49_argument,"equal")
,new ConditionWithArgument('`layout_type`',$layout_type50_argument,"equal", 'and')
,new ConditionWithArgument('`layout`',$layout51_argument,"like", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index52_argument'}, "desc")
));
$query->setLimit();
return $query; ?>