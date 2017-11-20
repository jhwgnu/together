<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertCategory");
$query->setAction("insert");
$query->setPriority("");

${'category_srl12_argument'} = new Argument('category_srl', $args->{'category_srl'});
${'category_srl12_argument'}->checkFilter('number');
${'category_srl12_argument'}->checkNotNull();
if(!${'category_srl12_argument'}->isValid()) return ${'category_srl12_argument'}->getErrorMessage();
if(${'category_srl12_argument'} !== null) ${'category_srl12_argument'}->setColumnType('number');

${'parent_srl13_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl13_argument'}->checkFilter('number');
${'parent_srl13_argument'}->checkNotNull();
if(!${'parent_srl13_argument'}->isValid()) return ${'parent_srl13_argument'}->getErrorMessage();
if(${'parent_srl13_argument'} !== null) ${'parent_srl13_argument'}->setColumnType('number');
if(isset($args->title)) {
${'title14_argument'} = new Argument('title', $args->{'title'});
if(!${'title14_argument'}->isValid()) return ${'title14_argument'}->getErrorMessage();
} else
${'title14_argument'} = NULL;if(${'title14_argument'} !== null) ${'title14_argument'}->setColumnType('varchar');

${'list_order15_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order15_argument'}->checkFilter('number');
${'list_order15_argument'}->checkNotNull();
if(!${'list_order15_argument'}->isValid()) return ${'list_order15_argument'}->getErrorMessage();
if(${'list_order15_argument'} !== null) ${'list_order15_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`category_srl`', ${'category_srl12_argument'})
,new InsertExpression('`parent_srl`', ${'parent_srl13_argument'})
,new InsertExpression('`title`', ${'title14_argument'})
,new InsertExpression('`list_order`', ${'list_order15_argument'})
));
$query->setTables(array(
new Table('`xe_ai_remote_categories`', '`ai_remote_categories`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>