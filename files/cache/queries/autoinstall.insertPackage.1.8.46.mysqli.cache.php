<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertPackage");
$query->setAction("insert");
$query->setPriority("");

${'package_srl1_argument'} = new Argument('package_srl', $args->{'package_srl'});
${'package_srl1_argument'}->checkFilter('number');
${'package_srl1_argument'}->checkNotNull();
if(!${'package_srl1_argument'}->isValid()) return ${'package_srl1_argument'}->getErrorMessage();
if(${'package_srl1_argument'} !== null) ${'package_srl1_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl2_argument'} = new Argument('category_srl', $args->{'category_srl'});
${'category_srl2_argument'}->checkFilter('number');
if(!${'category_srl2_argument'}->isValid()) return ${'category_srl2_argument'}->getErrorMessage();
} else
${'category_srl2_argument'} = NULL;if(${'category_srl2_argument'} !== null) ${'category_srl2_argument'}->setColumnType('number');

${'path3_argument'} = new Argument('path', $args->{'path'});
${'path3_argument'}->checkNotNull();
if(!${'path3_argument'}->isValid()) return ${'path3_argument'}->getErrorMessage();
if(${'path3_argument'} !== null) ${'path3_argument'}->setColumnType('varchar');

${'have_instance4_argument'} = new Argument('have_instance', $args->{'have_instance'});
${'have_instance4_argument'}->checkNotNull();
if(!${'have_instance4_argument'}->isValid()) return ${'have_instance4_argument'}->getErrorMessage();
if(${'have_instance4_argument'} !== null) ${'have_instance4_argument'}->setColumnType('char');

${'updatedate5_argument'} = new Argument('updatedate', $args->{'updatedate'});
${'updatedate5_argument'}->checkNotNull();
if(!${'updatedate5_argument'}->isValid()) return ${'updatedate5_argument'}->getErrorMessage();
if(${'updatedate5_argument'} !== null) ${'updatedate5_argument'}->setColumnType('date');

${'latest_item_srl6_argument'} = new Argument('latest_item_srl', $args->{'latest_item_srl'});
${'latest_item_srl6_argument'}->checkNotNull();
if(!${'latest_item_srl6_argument'}->isValid()) return ${'latest_item_srl6_argument'}->getErrorMessage();
if(${'latest_item_srl6_argument'} !== null) ${'latest_item_srl6_argument'}->setColumnType('number');

${'version7_argument'} = new Argument('version', $args->{'version'});
${'version7_argument'}->checkNotNull();
if(!${'version7_argument'}->isValid()) return ${'version7_argument'}->getErrorMessage();
if(${'version7_argument'} !== null) ${'version7_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`package_srl`', ${'package_srl1_argument'})
,new InsertExpression('`category_srl`', ${'category_srl2_argument'})
,new InsertExpression('`path`', ${'path3_argument'})
,new InsertExpression('`have_instance`', ${'have_instance4_argument'})
,new InsertExpression('`updatedate`', ${'updatedate5_argument'})
,new InsertExpression('`latest_item_srl`', ${'latest_item_srl6_argument'})
,new InsertExpression('`version`', ${'version7_argument'})
));
$query->setTables(array(
new Table('`xe_autoinstall_packages`', '`autoinstall_packages`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>