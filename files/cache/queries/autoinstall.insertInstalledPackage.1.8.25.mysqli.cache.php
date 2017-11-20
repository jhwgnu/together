<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertInstalledPackage");
$query->setAction("insert");
$query->setPriority("");

${'package_srl17_argument'} = new Argument('package_srl', $args->{'package_srl'});
${'package_srl17_argument'}->checkFilter('number');
${'package_srl17_argument'}->checkNotNull();
if(!${'package_srl17_argument'}->isValid()) return ${'package_srl17_argument'}->getErrorMessage();
if(${'package_srl17_argument'} !== null) ${'package_srl17_argument'}->setColumnType('number');

${'version18_argument'} = new Argument('version', $args->{'version'});
${'version18_argument'}->checkNotNull();
if(!${'version18_argument'}->isValid()) return ${'version18_argument'}->getErrorMessage();
if(${'version18_argument'} !== null) ${'version18_argument'}->setColumnType('varchar');

${'current_version19_argument'} = new Argument('current_version', $args->{'current_version'});
${'current_version19_argument'}->checkNotNull();
if(!${'current_version19_argument'}->isValid()) return ${'current_version19_argument'}->getErrorMessage();
if(${'current_version19_argument'} !== null) ${'current_version19_argument'}->setColumnType('varchar');
if(isset($args->need_update)) {
${'need_update20_argument'} = new Argument('need_update', $args->{'need_update'});
if(!${'need_update20_argument'}->isValid()) return ${'need_update20_argument'}->getErrorMessage();
} else
${'need_update20_argument'} = NULL;if(${'need_update20_argument'} !== null) ${'need_update20_argument'}->setColumnType('char');

$query->setColumns(array(
new InsertExpression('`package_srl`', ${'package_srl17_argument'})
,new InsertExpression('`version`', ${'version18_argument'})
,new InsertExpression('`current_version`', ${'current_version19_argument'})
,new InsertExpression('`need_update`', ${'need_update20_argument'})
));
$query->setTables(array(
new Table('`xe_ai_installed_packages`', '`ai_installed_packages`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>