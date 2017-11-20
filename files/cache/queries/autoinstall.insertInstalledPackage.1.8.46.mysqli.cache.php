<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertInstalledPackage");
$query->setAction("insert");
$query->setPriority("");

${'package_srl24_argument'} = new Argument('package_srl', $args->{'package_srl'});
${'package_srl24_argument'}->checkFilter('number');
${'package_srl24_argument'}->checkNotNull();
if(!${'package_srl24_argument'}->isValid()) return ${'package_srl24_argument'}->getErrorMessage();
if(${'package_srl24_argument'} !== null) ${'package_srl24_argument'}->setColumnType('number');

${'version25_argument'} = new Argument('version', $args->{'version'});
${'version25_argument'}->checkNotNull();
if(!${'version25_argument'}->isValid()) return ${'version25_argument'}->getErrorMessage();
if(${'version25_argument'} !== null) ${'version25_argument'}->setColumnType('varchar');

${'current_version26_argument'} = new Argument('current_version', $args->{'current_version'});
${'current_version26_argument'}->checkNotNull();
if(!${'current_version26_argument'}->isValid()) return ${'current_version26_argument'}->getErrorMessage();
if(${'current_version26_argument'} !== null) ${'current_version26_argument'}->setColumnType('varchar');
if(isset($args->need_update)) {
${'need_update27_argument'} = new Argument('need_update', $args->{'need_update'});
if(!${'need_update27_argument'}->isValid()) return ${'need_update27_argument'}->getErrorMessage();
} else
${'need_update27_argument'} = NULL;if(${'need_update27_argument'} !== null) ${'need_update27_argument'}->setColumnType('char');

$query->setColumns(array(
new InsertExpression('`package_srl`', ${'package_srl24_argument'})
,new InsertExpression('`version`', ${'version25_argument'})
,new InsertExpression('`current_version`', ${'current_version26_argument'})
,new InsertExpression('`need_update`', ${'need_update27_argument'})
));
$query->setTables(array(
new Table('`xe_ai_installed_packages`', '`ai_installed_packages`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>