<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getLayoutDotList");
$query->setAction("select");
$query->setPriority("");

${'site_srl149_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl149_argument'}->checkFilter('number');
${'site_srl149_argument'}->ensureDefaultValue('0');
${'site_srl149_argument'}->checkNotNull();
${'site_srl149_argument'}->createConditionValue();
if(!${'site_srl149_argument'}->isValid()) return ${'site_srl149_argument'}->getErrorMessage();
if(${'site_srl149_argument'} !== null) ${'site_srl149_argument'}->setColumnType('number');

${'layout_type150_argument'} = new ConditionArgument('layout_type', $args->layout_type, 'equal');
${'layout_type150_argument'}->ensureDefaultValue('P');
${'layout_type150_argument'}->createConditionValue();
if(!${'layout_type150_argument'}->isValid()) return ${'layout_type150_argument'}->getErrorMessage();
if(${'layout_type150_argument'} !== null) ${'layout_type150_argument'}->setColumnType('char');

${'layout151_argument'} = new ConditionArgument('layout', $args->layout, 'like');
${'layout151_argument'}->ensureDefaultValue('.');
${'layout151_argument'}->createConditionValue();
if(!${'layout151_argument'}->isValid()) return ${'layout151_argument'}->getErrorMessage();
if(${'layout151_argument'} !== null) ${'layout151_argument'}->setColumnType('varchar');

${'sort_index152_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index152_argument'}->ensureDefaultValue('layout_srl');
if(!${'sort_index152_argument'}->isValid()) return ${'sort_index152_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_layouts`', '`layouts`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl149_argument,"equal")
,new ConditionWithArgument('`layout_type`',$layout_type150_argument,"equal", 'and')
,new ConditionWithArgument('`layout`',$layout151_argument,"like", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index152_argument'}, "desc")
));
$query->setLimit();
return $query; ?>