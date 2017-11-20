<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertInstalledPackage");
$query->setAction("insert");
$query->setPriority("");

${'package_srl29_argument'} = new Argument('package_srl', $args->{'package_srl'});
${'package_srl29_argument'}->checkFilter('number');
${'package_srl29_argument'}->checkNotNull();
if(!${'package_srl29_argument'}->isValid()) return ${'package_srl29_argument'}->getErrorMessage();
if(${'package_srl29_argument'} !== null) ${'package_srl29_argument'}->setColumnType('number');

${'version30_argument'} = new Argument('version', $args->{'version'});
${'version30_argument'}->checkNotNull();
if(!${'version30_argument'}->isValid()) return ${'version30_argument'}->getErrorMessage();
if(${'version30_argument'} !== null) ${'version30_argument'}->setColumnType('varchar');

${'current_version31_argument'} = new Argument('current_version', $args->{'current_version'});
${'current_version31_argument'}->checkNotNull();
if(!${'current_version31_argument'}->isValid()) return ${'current_version31_argument'}->getErrorMessage();
if(${'current_version31_argument'} !== null) ${'current_version31_argument'}->setColumnType('varchar');
if(isset($args->need_update)) {
${'need_update32_argument'} = new Argument('need_update', $args->{'need_update'});
if(!${'need_update32_argument'}->isValid()) return ${'need_update32_argument'}->getErrorMessage();
} else
${'need_update32_argument'} = NULL;if(${'need_update32_argument'} !== null) ${'need_update32_argument'}->setColumnType('char');

$query->setColumns(array(
new InsertExpression('`package_srl`', ${'package_srl29_argument'})
,new InsertExpression('`version`', ${'version30_argument'})
,new InsertExpression('`current_version`', ${'current_version31_argument'})
,new InsertExpression('`need_update`', ${'need_update32_argument'})
));
$query->setTables(array(
new Table('`xe_ai_installed_packages`', '`ai_installed_packages`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>