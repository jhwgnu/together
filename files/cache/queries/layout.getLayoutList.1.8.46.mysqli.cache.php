<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getLayoutList");
$query->setAction("select");
$query->setPriority("");

${'site_srl4_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl4_argument'}->checkFilter('number');
${'site_srl4_argument'}->ensureDefaultValue('0');
${'site_srl4_argument'}->checkNotNull();
${'site_srl4_argument'}->createConditionValue();
if(!${'site_srl4_argument'}->isValid()) return ${'site_srl4_argument'}->getErrorMessage();
if(${'site_srl4_argument'} !== null) ${'site_srl4_argument'}->setColumnType('number');

${'layout_type5_argument'} = new ConditionArgument('layout_type', $args->layout_type, 'equal');
${'layout_type5_argument'}->ensureDefaultValue('P');
${'layout_type5_argument'}->createConditionValue();
if(!${'layout_type5_argument'}->isValid()) return ${'layout_type5_argument'}->getErrorMessage();
if(${'layout_type5_argument'} !== null) ${'layout_type5_argument'}->setColumnType('char');
if(isset($args->layout)) {
${'layout6_argument'} = new ConditionArgument('layout', $args->layout, 'equal');
${'layout6_argument'}->createConditionValue();
if(!${'layout6_argument'}->isValid()) return ${'layout6_argument'}->getErrorMessage();
} else
${'layout6_argument'} = NULL;if(${'layout6_argument'} !== null) ${'layout6_argument'}->setColumnType('varchar');

${'sort_index7_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index7_argument'}->ensureDefaultValue('layout_srl');
if(!${'sort_index7_argument'}->isValid()) return ${'sort_index7_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_layouts`', '`layouts`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl4_argument,"equal")
,new ConditionWithArgument('`layout_type`',$layout_type5_argument,"equal", 'and')
,new ConditionWithArgument('`layout`',$layout6_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index7_argument'}, "desc")
));
$query->setLimit();
return $query; ?>