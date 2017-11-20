<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertPackage");
$query->setAction("insert");
$query->setPriority("");

${'package_srl2_argument'} = new Argument('package_srl', $args->{'package_srl'});
${'package_srl2_argument'}->checkFilter('number');
${'package_srl2_argument'}->checkNotNull();
if(!${'package_srl2_argument'}->isValid()) return ${'package_srl2_argument'}->getErrorMessage();
if(${'package_srl2_argument'} !== null) ${'package_srl2_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl3_argument'} = new Argument('category_srl', $args->{'category_srl'});
${'category_srl3_argument'}->checkFilter('number');
if(!${'category_srl3_argument'}->isValid()) return ${'category_srl3_argument'}->getErrorMessage();
} else
${'category_srl3_argument'} = NULL;if(${'category_srl3_argument'} !== null) ${'category_srl3_argument'}->setColumnType('number');

${'path4_argument'} = new Argument('path', $args->{'path'});
${'path4_argument'}->checkNotNull();
if(!${'path4_argument'}->isValid()) return ${'path4_argument'}->getErrorMessage();
if(${'path4_argument'} !== null) ${'path4_argument'}->setColumnType('varchar');

${'have_instance5_argument'} = new Argument('have_instance', $args->{'have_instance'});
${'have_instance5_argument'}->checkNotNull();
if(!${'have_instance5_argument'}->isValid()) return ${'have_instance5_argument'}->getErrorMessage();
if(${'have_instance5_argument'} !== null) ${'have_instance5_argument'}->setColumnType('char');

${'updatedate6_argument'} = new Argument('updatedate', $args->{'updatedate'});
${'updatedate6_argument'}->checkNotNull();
if(!${'updatedate6_argument'}->isValid()) return ${'updatedate6_argument'}->getErrorMessage();
if(${'updatedate6_argument'} !== null) ${'updatedate6_argument'}->setColumnType('date');

${'latest_item_srl7_argument'} = new Argument('latest_item_srl', $args->{'latest_item_srl'});
${'latest_item_srl7_argument'}->checkNotNull();
if(!${'latest_item_srl7_argument'}->isValid()) return ${'latest_item_srl7_argument'}->getErrorMessage();
if(${'latest_item_srl7_argument'} !== null) ${'latest_item_srl7_argument'}->setColumnType('number');

${'version8_argument'} = new Argument('version', $args->{'version'});
${'version8_argument'}->checkNotNull();
if(!${'version8_argument'}->isValid()) return ${'version8_argument'}->getErrorMessage();
if(${'version8_argument'} !== null) ${'version8_argument'}->setColumnType('varchar');

$query->setColumns(array(
new InsertExpression('`package_srl`', ${'package_srl2_argument'})
,new InsertExpression('`category_srl`', ${'category_srl3_argument'})
,new InsertExpression('`path`', ${'path4_argument'})
,new InsertExpression('`have_instance`', ${'have_instance5_argument'})
,new InsertExpression('`updatedate`', ${'updatedate6_argument'})
,new InsertExpression('`latest_item_srl`', ${'latest_item_srl7_argument'})
,new InsertExpression('`version`', ${'version8_argument'})
));
$query->setTables(array(
new Table('`xe_autoinstall_packages`', '`autoinstall_packages`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>