<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updatePackage");
$query->setAction("update");
$query->setPriority("");

${'path16_argument'} = new Argument('path', $args->{'path'});
${'path16_argument'}->checkNotNull();
if(!${'path16_argument'}->isValid()) return ${'path16_argument'}->getErrorMessage();
if(${'path16_argument'} !== null) ${'path16_argument'}->setColumnType('varchar');

${'have_instance17_argument'} = new Argument('have_instance', $args->{'have_instance'});
${'have_instance17_argument'}->checkNotNull();
if(!${'have_instance17_argument'}->isValid()) return ${'have_instance17_argument'}->getErrorMessage();
if(${'have_instance17_argument'} !== null) ${'have_instance17_argument'}->setColumnType('char');

${'updatedate18_argument'} = new Argument('updatedate', $args->{'updatedate'});
${'updatedate18_argument'}->checkNotNull();
if(!${'updatedate18_argument'}->isValid()) return ${'updatedate18_argument'}->getErrorMessage();
if(${'updatedate18_argument'} !== null) ${'updatedate18_argument'}->setColumnType('date');
if(isset($args->category_srl)) {
${'category_srl19_argument'} = new Argument('category_srl', $args->{'category_srl'});
${'category_srl19_argument'}->checkFilter('number');
if(!${'category_srl19_argument'}->isValid()) return ${'category_srl19_argument'}->getErrorMessage();
} else
${'category_srl19_argument'} = NULL;if(${'category_srl19_argument'} !== null) ${'category_srl19_argument'}->setColumnType('number');

${'latest_item_srl20_argument'} = new Argument('latest_item_srl', $args->{'latest_item_srl'});
${'latest_item_srl20_argument'}->checkNotNull();
if(!${'latest_item_srl20_argument'}->isValid()) return ${'latest_item_srl20_argument'}->getErrorMessage();
if(${'latest_item_srl20_argument'} !== null) ${'latest_item_srl20_argument'}->setColumnType('number');

${'version21_argument'} = new Argument('version', $args->{'version'});
${'version21_argument'}->checkNotNull();
if(!${'version21_argument'}->isValid()) return ${'version21_argument'}->getErrorMessage();
if(${'version21_argument'} !== null) ${'version21_argument'}->setColumnType('varchar');

${'package_srl22_argument'} = new ConditionArgument('package_srl', $args->package_srl, 'equal');
${'package_srl22_argument'}->checkNotNull();
${'package_srl22_argument'}->createConditionValue();
if(!${'package_srl22_argument'}->isValid()) return ${'package_srl22_argument'}->getErrorMessage();
if(${'package_srl22_argument'} !== null) ${'package_srl22_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`path`', ${'path16_argument'})
,new UpdateExpression('`have_instance`', ${'have_instance17_argument'})
,new UpdateExpression('`updatedate`', ${'updatedate18_argument'})
,new UpdateExpression('`category_srl`', ${'category_srl19_argument'})
,new UpdateExpression('`latest_item_srl`', ${'latest_item_srl20_argument'})
,new UpdateExpression('`version`', ${'version21_argument'})
));
$query->setTables(array(
new Table('`xe_autoinstall_packages`', '`autoinstall_packages`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`package_srl`',$package_srl22_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>