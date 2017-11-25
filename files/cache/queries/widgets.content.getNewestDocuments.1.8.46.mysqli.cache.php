<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getNewestDocuments");
$query->setAction("select");
$query->setPriority("");

${'module_srl8_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl8_argument'}->checkFilter('number');
${'module_srl8_argument'}->checkNotNull();
${'module_srl8_argument'}->createConditionValue();
if(!${'module_srl8_argument'}->isValid()) return ${'module_srl8_argument'}->getErrorMessage();
if(${'module_srl8_argument'} !== null) ${'module_srl8_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl9_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'equal');
${'category_srl9_argument'}->createConditionValue();
if(!${'category_srl9_argument'}->isValid()) return ${'category_srl9_argument'}->getErrorMessage();
} else
${'category_srl9_argument'} = NULL;if(${'category_srl9_argument'} !== null) ${'category_srl9_argument'}->setColumnType('number');
if(isset($args->statusList)) {
${'statusList10_argument'} = new ConditionArgument('statusList', $args->statusList, 'in');
${'statusList10_argument'}->createConditionValue();
if(!${'statusList10_argument'}->isValid()) return ${'statusList10_argument'}->getErrorMessage();
} else
${'statusList10_argument'} = NULL;if(${'statusList10_argument'} !== null) ${'statusList10_argument'}->setColumnType('varchar');

${'list_count13_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count13_argument'}->ensureDefaultValue('20');
if(!${'list_count13_argument'}->isValid()) return ${'list_count13_argument'}->getErrorMessage();

${'sort_index11_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index11_argument'}->ensureDefaultValue('documents.list_order');
if(!${'sort_index11_argument'}->isValid()) return ${'sort_index11_argument'}->getErrorMessage();

${'order_type12_argument'} = new SortArgument('order_type12', $args->order_type);
${'order_type12_argument'}->ensureDefaultValue('asc');
if(!${'order_type12_argument'}->isValid()) return ${'order_type12_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`documents`.`module_srl`',$module_srl8_argument,"in", 'and')
,new ConditionWithArgument('`documents`.`category_srl`',$category_srl9_argument,"equal", 'and')
,new ConditionWithArgument('`status`',$statusList10_argument,"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index11_argument'}, $order_type12_argument)
));
$query->setLimit(new Limit(${'list_count13_argument'}));
return $query; ?>