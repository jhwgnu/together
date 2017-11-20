<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getMenuByTitle");
$query->setAction("select");
$query->setPriority("");

${'title153_argument'} = new ConditionArgument('title', $args->title, 'in');
${'title153_argument'}->checkNotNull();
${'title153_argument'}->createConditionValue();
if(!${'title153_argument'}->isValid()) return ${'title153_argument'}->getErrorMessage();
if(${'title153_argument'} !== null) ${'title153_argument'}->setColumnType('varchar');

${'site_srl154_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl154_argument'}->ensureDefaultValue('0');
${'site_srl154_argument'}->createConditionValue();
if(!${'site_srl154_argument'}->isValid()) return ${'site_srl154_argument'}->getErrorMessage();
if(${'site_srl154_argument'} !== null) ${'site_srl154_argument'}->setColumnType('number');

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_menu`', '`menu`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`title`',$title153_argument,"in")
,new ConditionWithArgument('`site_srl`',$site_srl154_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>