<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updatePackage");
$query->setAction("update");
$query->setPriority("");

${'path9_argument'} = new Argument('path', $args->{'path'});
${'path9_argument'}->checkNotNull();
if(!${'path9_argument'}->isValid()) return ${'path9_argument'}->getErrorMessage();
if(${'path9_argument'} !== null) ${'path9_argument'}->setColumnType('varchar');

${'have_instance10_argument'} = new Argument('have_instance', $args->{'have_instance'});
${'have_instance10_argument'}->checkNotNull();
if(!${'have_instance10_argument'}->isValid()) return ${'have_instance10_argument'}->getErrorMessage();
if(${'have_instance10_argument'} !== null) ${'have_instance10_argument'}->setColumnType('char');

${'updatedate11_argument'} = new Argument('updatedate', $args->{'updatedate'});
${'updatedate11_argument'}->checkNotNull();
if(!${'updatedate11_argument'}->isValid()) return ${'updatedate11_argument'}->getErrorMessage();
if(${'updatedate11_argument'} !== null) ${'updatedate11_argument'}->setColumnType('date');
if(isset($args->category_srl)) {
${'category_srl12_argument'} = new Argument('category_srl', $args->{'category_srl'});
${'category_srl12_argument'}->checkFilter('number');
if(!${'category_srl12_argument'}->isValid()) return ${'category_srl12_argument'}->getErrorMessage();
} else
${'category_srl12_argument'} = NULL;if(${'category_srl12_argument'} !== null) ${'category_srl12_argument'}->setColumnType('number');

${'latest_item_srl13_argument'} = new Argument('latest_item_srl', $args->{'latest_item_srl'});
${'latest_item_srl13_argument'}->checkNotNull();
if(!${'latest_item_srl13_argument'}->isValid()) return ${'latest_item_srl13_argument'}->getErrorMessage();
if(${'latest_item_srl13_argument'} !== null) ${'latest_item_srl13_argument'}->setColumnType('number');

${'version14_argument'} = new Argument('version', $args->{'version'});
${'version14_argument'}->checkNotNull();
if(!${'version14_argument'}->isValid()) return ${'version14_argument'}->getErrorMessage();
if(${'version14_argument'} !== null) ${'version14_argument'}->setColumnType('varchar');

${'package_srl15_argument'} = new ConditionArgument('package_srl', $args->package_srl, 'equal');
${'package_srl15_argument'}->checkNotNull();
${'package_srl15_argument'}->createConditionValue();
if(!${'package_srl15_argument'}->isValid()) return ${'package_srl15_argument'}->getErrorMessage();
if(${'package_srl15_argument'} !== null) ${'package_srl15_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`path`', ${'path9_argument'})
,new UpdateExpression('`have_instance`', ${'have_instance10_argument'})
,new UpdateExpression('`updatedate`', ${'updatedate11_argument'})
,new UpdateExpression('`category_srl`', ${'category_srl12_argument'})
,new UpdateExpression('`latest_item_srl`', ${'latest_item_srl13_argument'})
,new UpdateExpression('`version`', ${'version14_argument'})
));
$query->setTables(array(
new Table('`xe_autoinstall_packages`', '`autoinstall_packages`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`package_srl`',$package_srl15_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>