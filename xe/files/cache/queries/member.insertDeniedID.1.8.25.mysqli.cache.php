<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertGroup");
$query->setAction("insert");
$query->setPriority("");

${'user_id105_argument'} = new Argument('user_id', $args->{'user_id'});
${'user_id105_argument'}->checkNotNull();
if(!${'user_id105_argument'}->isValid()) return ${'user_id105_argument'}->getErrorMessage();
if(${'user_id105_argument'} !== null) ${'user_id105_argument'}->setColumnType('varchar');

${'regdate106_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate106_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate106_argument'}->isValid()) return ${'regdate106_argument'}->getErrorMessage();
if(${'regdate106_argument'} !== null) ${'regdate106_argument'}->setColumnType('date');

${'description107_argument'} = new Argument('description', $args->{'description'});
${'description107_argument'}->ensureDefaultValue('');
if(!${'description107_argument'}->isValid()) return ${'description107_argument'}->getErrorMessage();
if(${'description107_argument'} !== null) ${'description107_argument'}->setColumnType('text');
if(isset($args->list_order)) {
${'list_order108_argument'} = new Argument('list_order', $args->{'list_order'});
if(!${'list_order108_argument'}->isValid()) return ${'list_order108_argument'}->getErrorMessage();
} else
${'list_order108_argument'} = NULL;if(${'list_order108_argument'} !== null) ${'list_order108_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`user_id`', ${'user_id105_argument'})
,new InsertExpression('`regdate`', ${'regdate106_argument'})
,new InsertExpression('`description`', ${'description107_argument'})
,new InsertExpression('`list_order`', ${'list_order108_argument'})
));
$query->setTables(array(
new Table('`xe_member_denied_user_id`', '`member_denied_user_id`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>