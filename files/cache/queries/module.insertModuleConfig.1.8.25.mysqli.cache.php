<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModuleConfig");
$query->setAction("insert");
$query->setPriority("");

${'module19_argument'} = new Argument('module', $args->{'module'});
${'module19_argument'}->checkNotNull();
if(!${'module19_argument'}->isValid()) return ${'module19_argument'}->getErrorMessage();
if(${'module19_argument'} !== null) ${'module19_argument'}->setColumnType('varchar');
if(isset($args->config)) {
${'config20_argument'} = new Argument('config', $args->{'config'});
if(!${'config20_argument'}->isValid()) return ${'config20_argument'}->getErrorMessage();
} else
${'config20_argument'} = NULL;if(${'config20_argument'} !== null) ${'config20_argument'}->setColumnType('text');

${'site_srl21_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl21_argument'}->checkNotNull();
if(!${'site_srl21_argument'}->isValid()) return ${'site_srl21_argument'}->getErrorMessage();
if(${'site_srl21_argument'} !== null) ${'site_srl21_argument'}->setColumnType('number');

${'regdate22_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate22_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate22_argument'}->isValid()) return ${'regdate22_argument'}->getErrorMessage();
if(${'regdate22_argument'} !== null) ${'regdate22_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`module`', ${'module19_argument'})
,new InsertExpression('`config`', ${'config20_argument'})
,new InsertExpression('`site_srl`', ${'site_srl21_argument'})
,new InsertExpression('`regdate`', ${'regdate22_argument'})
));
$query->setTables(array(
new Table('`xe_module_config`', '`module_config`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>