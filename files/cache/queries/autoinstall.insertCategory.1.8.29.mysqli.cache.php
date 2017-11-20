<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertCategory");
$query->setAction("insert");
$query->setPriority("");

${'category_srl17_argument'} = new Argument('category_srl', $args->{'category_srl'});
${'category_srl17_argument'}->checkFilter('number');
${'category_srl17_argument'}->checkNotNull();
if(!${'category_srl17_argument'}->isValid()) return ${'category_srl17_argument'}->getErrorMessage();
if(${'category_srl17_argument'} !== null) ${'category_srl17_argument'}->setColumnType('number');

${'parent_srl18_argument'} = new Argument('parent_srl', $args->{'parent_srl'});
${'parent_srl18_argument'}->checkFilter('number');
${'parent_srl18_argument'}->checkNotNull();
if(!${'parent_srl18_argument'}->isValid()) return ${'parent_srl18_argument'}->getErrorMessage();
if(${'parent_srl18_argument'} !== null) ${'parent_srl18_argument'}->setColumnType('number');
if(isset($args->title)) {
${'title19_argument'} = new Argument('title', $args->{'title'});
if(!${'title19_argument'}->isValid()) return ${'title19_argument'}->getErrorMessage();
} else
${'title19_argument'} = NULL;if(${'title19_argument'} !== null) ${'title19_argument'}->setColumnType('varchar');

${'list_order20_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order20_argument'}->checkFilter('number');
${'list_order20_argument'}->checkNotNull();
if(!${'list_order20_argument'}->isValid()) return ${'list_order20_argument'}->getErrorMessage();
if(${'list_order20_argument'} !== null) ${'list_order20_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`category_srl`', ${'category_srl17_argument'})
,new InsertExpression('`parent_srl`', ${'parent_srl18_argument'})
,new InsertExpression('`title`', ${'title19_argument'})
,new InsertExpression('`list_order`', ${'list_order20_argument'})
));
$query->setTables(array(
new Table('`xe_ai_remote_categories`', '`ai_remote_categories`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>