<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getSiteAddons");
$query->setAction("select");
$query->setPriority("");

${'site_srl115_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl115_argument'}->checkNotNull();
${'site_srl115_argument'}->createConditionValue();
if(!${'site_srl115_argument'}->isValid()) return ${'site_srl115_argument'}->getErrorMessage();
if(${'site_srl115_argument'} !== null) ${'site_srl115_argument'}->setColumnType('number');

${'list_order116_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order116_argument'}->ensureDefaultValue('addon');
if(!${'list_order116_argument'}->isValid()) return ${'list_order116_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_addons_site`', '`addons_site`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl115_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'list_order116_argument'}, "asc")
));
$query->setLimit();
return $query; ?>