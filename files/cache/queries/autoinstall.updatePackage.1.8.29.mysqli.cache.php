<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updatePackage");
$query->setAction("update");
$query->setPriority("");

${'path21_argument'} = new Argument('path', $args->{'path'});
${'path21_argument'}->checkNotNull();
if(!${'path21_argument'}->isValid()) return ${'path21_argument'}->getErrorMessage();
if(${'path21_argument'} !== null) ${'path21_argument'}->setColumnType('varchar');

${'have_instance22_argument'} = new Argument('have_instance', $args->{'have_instance'});
${'have_instance22_argument'}->checkNotNull();
if(!${'have_instance22_argument'}->isValid()) return ${'have_instance22_argument'}->getErrorMessage();
if(${'have_instance22_argument'} !== null) ${'have_instance22_argument'}->setColumnType('char');

${'updatedate23_argument'} = new Argument('updatedate', $args->{'updatedate'});
${'updatedate23_argument'}->checkNotNull();
if(!${'updatedate23_argument'}->isValid()) return ${'updatedate23_argument'}->getErrorMessage();
if(${'updatedate23_argument'} !== null) ${'updatedate23_argument'}->setColumnType('date');
if(isset($args->category_srl)) {
${'category_srl24_argument'} = new Argument('category_srl', $args->{'category_srl'});
${'category_srl24_argument'}->checkFilter('number');
if(!${'category_srl24_argument'}->isValid()) return ${'category_srl24_argument'}->getErrorMessage();
} else
${'category_srl24_argument'} = NULL;if(${'category_srl24_argument'} !== null) ${'category_srl24_argument'}->setColumnType('number');

${'latest_item_srl25_argument'} = new Argument('latest_item_srl', $args->{'latest_item_srl'});
${'latest_item_srl25_argument'}->checkNotNull();
if(!${'latest_item_srl25_argument'}->isValid()) return ${'latest_item_srl25_argument'}->getErrorMessage();
if(${'latest_item_srl25_argument'} !== null) ${'latest_item_srl25_argument'}->setColumnType('number');

${'version26_argument'} = new Argument('version', $args->{'version'});
${'version26_argument'}->checkNotNull();
if(!${'version26_argument'}->isValid()) return ${'version26_argument'}->getErrorMessage();
if(${'version26_argument'} !== null) ${'version26_argument'}->setColumnType('varchar');

${'package_srl27_argument'} = new ConditionArgument('package_srl', $args->package_srl, 'equal');
${'package_srl27_argument'}->checkNotNull();
${'package_srl27_argument'}->createConditionValue();
if(!${'package_srl27_argument'}->isValid()) return ${'package_srl27_argument'}->getErrorMessage();
if(${'package_srl27_argument'} !== null) ${'package_srl27_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`path`', ${'path21_argument'})
,new UpdateExpression('`have_instance`', ${'have_instance22_argument'})
,new UpdateExpression('`updatedate`', ${'updatedate23_argument'})
,new UpdateExpression('`category_srl`', ${'category_srl24_argument'})
,new UpdateExpression('`latest_item_srl`', ${'latest_item_srl25_argument'})
,new UpdateExpression('`version`', ${'version26_argument'})
));
$query->setTables(array(
new Table('`xe_autoinstall_packages`', '`autoinstall_packages`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`package_srl`',$package_srl27_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>