<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertMenu");
$query->setAction("insert");
$query->setPriority("");

${'menu_srl129_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl129_argument'}->checkFilter('number');
${'menu_srl129_argument'}->checkNotNull();
if(!${'menu_srl129_argument'}->isValid()) return ${'menu_srl129_argument'}->getErrorMessage();
if(${'menu_srl129_argument'} !== null) ${'menu_srl129_argument'}->setColumnType('number');

${'site_srl130_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl130_argument'}->checkFilter('number');
${'site_srl130_argument'}->ensureDefaultValue('0');
${'site_srl130_argument'}->checkNotNull();
if(!${'site_srl130_argument'}->isValid()) return ${'site_srl130_argument'}->getErrorMessage();
if(${'site_srl130_argument'} !== null) ${'site_srl130_argument'}->setColumnType('number');

${'title131_argument'} = new Argument('title', $args->{'title'});
${'title131_argument'}->checkNotNull();
if(!${'title131_argument'}->isValid()) return ${'title131_argument'}->getErrorMessage();
if(${'title131_argument'} !== null) ${'title131_argument'}->setColumnType('varchar');

${'listorder132_argument'} = new Argument('listorder', $args->{'listorder'});
${'listorder132_argument'}->checkNotNull();
if(!${'listorder132_argument'}->isValid()) return ${'listorder132_argument'}->getErrorMessage();
if(${'listorder132_argument'} !== null) ${'listorder132_argument'}->setColumnType('number');

${'regdate133_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate133_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate133_argument'}->isValid()) return ${'regdate133_argument'}->getErrorMessage();
if(${'regdate133_argument'} !== null) ${'regdate133_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`menu_srl`', ${'menu_srl129_argument'})
,new InsertExpression('`site_srl`', ${'site_srl130_argument'})
,new InsertExpression('`title`', ${'title131_argument'})
,new InsertExpression('`listorder`', ${'listorder132_argument'})
,new InsertExpression('`regdate`', ${'regdate133_argument'})
));
$query->setTables(array(
new Table('`xe_menu`', '`menu`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>