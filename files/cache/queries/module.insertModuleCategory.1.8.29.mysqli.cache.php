<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModuleCategory");
$query->setAction("insert");
$query->setPriority("");

${'module_category_srl1_argument'} = new Argument('module_category_srl', $args->{'module_category_srl'});
$db = DB::getInstance(); $sequence = $db->getNextSequence(); ${'module_category_srl1_argument'}->ensureDefaultValue($sequence);
if(!${'module_category_srl1_argument'}->isValid()) return ${'module_category_srl1_argument'}->getErrorMessage();
if(${'module_category_srl1_argument'} !== null) ${'module_category_srl1_argument'}->setColumnType('number');

${'title2_argument'} = new Argument('title', $args->{'title'});
${'title2_argument'}->checkNotNull();
if(!${'title2_argument'}->isValid()) return ${'title2_argument'}->getErrorMessage();
if(${'title2_argument'} !== null) ${'title2_argument'}->setColumnType('varchar');

${'regdate3_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate3_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate3_argument'}->isValid()) return ${'regdate3_argument'}->getErrorMessage();
if(${'regdate3_argument'} !== null) ${'regdate3_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`module_category_srl`', ${'module_category_srl1_argument'})
,new InsertExpression('`title`', ${'title2_argument'})
,new InsertExpression('`regdate`', ${'regdate3_argument'})
));
$query->setTables(array(
new Table('`xe_module_categories`', '`module_categories`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>