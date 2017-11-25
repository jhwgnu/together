<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertMenu");
$query->setAction("insert");
$query->setPriority("");

${'menu_srl1_argument'} = new Argument('menu_srl', $args->{'menu_srl'});
${'menu_srl1_argument'}->checkFilter('number');
${'menu_srl1_argument'}->checkNotNull();
if(!${'menu_srl1_argument'}->isValid()) return ${'menu_srl1_argument'}->getErrorMessage();
if(${'menu_srl1_argument'} !== null) ${'menu_srl1_argument'}->setColumnType('number');

${'site_srl2_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl2_argument'}->checkFilter('number');
${'site_srl2_argument'}->ensureDefaultValue('0');
${'site_srl2_argument'}->checkNotNull();
if(!${'site_srl2_argument'}->isValid()) return ${'site_srl2_argument'}->getErrorMessage();
if(${'site_srl2_argument'} !== null) ${'site_srl2_argument'}->setColumnType('number');

${'title3_argument'} = new Argument('title', $args->{'title'});
${'title3_argument'}->checkNotNull();
if(!${'title3_argument'}->isValid()) return ${'title3_argument'}->getErrorMessage();
if(${'title3_argument'} !== null) ${'title3_argument'}->setColumnType('varchar');

${'listorder4_argument'} = new Argument('listorder', $args->{'listorder'});
${'listorder4_argument'}->checkNotNull();
if(!${'listorder4_argument'}->isValid()) return ${'listorder4_argument'}->getErrorMessage();
if(${'listorder4_argument'} !== null) ${'listorder4_argument'}->setColumnType('number');

${'regdate5_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate5_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate5_argument'}->isValid()) return ${'regdate5_argument'}->getErrorMessage();
if(${'regdate5_argument'} !== null) ${'regdate5_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`menu_srl`', ${'menu_srl1_argument'})
,new InsertExpression('`site_srl`', ${'site_srl2_argument'})
,new InsertExpression('`title`', ${'title3_argument'})
,new InsertExpression('`listorder`', ${'listorder4_argument'})
,new InsertExpression('`regdate`', ${'regdate5_argument'})
));
$query->setTables(array(
new Table('`xe_menu`', '`menu`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>