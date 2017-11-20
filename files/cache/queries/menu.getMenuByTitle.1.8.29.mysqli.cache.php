<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMenuByTitle");
$query->setAction("select");
$query->setPriority("");

${'title2_argument'} = new ConditionArgument('title', $args->title, 'in');
${'title2_argument'}->checkNotNull();
${'title2_argument'}->createConditionValue();
if(!${'title2_argument'}->isValid()) return ${'title2_argument'}->getErrorMessage();
if(${'title2_argument'} !== null) ${'title2_argument'}->setColumnType('varchar');

${'site_srl3_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl3_argument'}->ensureDefaultValue('0');
${'site_srl3_argument'}->createConditionValue();
if(!${'site_srl3_argument'}->isValid()) return ${'site_srl3_argument'}->getErrorMessage();
if(${'site_srl3_argument'} !== null) ${'site_srl3_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_menu`', '`menu`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`title`',$title2_argument,"in")
,new ConditionWithArgument('`site_srl`',$site_srl3_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>