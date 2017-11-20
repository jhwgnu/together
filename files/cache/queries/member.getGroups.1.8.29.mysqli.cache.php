<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getGroups");
$query->setAction("select");
$query->setPriority("");
if(isset($args->site_srl)) {
${'site_srl18_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl18_argument'}->createConditionValue();
if(!${'site_srl18_argument'}->isValid()) return ${'site_srl18_argument'}->getErrorMessage();
} else
${'site_srl18_argument'} = NULL;if(${'site_srl18_argument'} !== null) ${'site_srl18_argument'}->setColumnType('number');

${'sort_index19_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index19_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index19_argument'}->isValid()) return ${'sort_index19_argument'}->getErrorMessage();

${'order_type20_argument'} = new SortArgument('order_type20', $args->order_type);
${'order_type20_argument'}->ensureDefaultValue('asc');
if(!${'order_type20_argument'}->isValid()) return ${'order_type20_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_member_group`', '`member_group`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl18_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index19_argument'}, $order_type20_argument)
));
$query->setLimit();
return $query; ?>