<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModuleConfig");
$query->setAction("insert");
$query->setPriority("");

${'module8_argument'} = new Argument('module', $args->{'module'});
${'module8_argument'}->checkNotNull();
if(!${'module8_argument'}->isValid()) return ${'module8_argument'}->getErrorMessage();
if(${'module8_argument'} !== null) ${'module8_argument'}->setColumnType('varchar');
if(isset($args->config)) {
${'config9_argument'} = new Argument('config', $args->{'config'});
if(!${'config9_argument'}->isValid()) return ${'config9_argument'}->getErrorMessage();
} else
${'config9_argument'} = NULL;if(${'config9_argument'} !== null) ${'config9_argument'}->setColumnType('text');

${'site_srl10_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl10_argument'}->checkNotNull();
if(!${'site_srl10_argument'}->isValid()) return ${'site_srl10_argument'}->getErrorMessage();
if(${'site_srl10_argument'} !== null) ${'site_srl10_argument'}->setColumnType('number');

${'regdate11_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate11_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate11_argument'}->isValid()) return ${'regdate11_argument'}->getErrorMessage();
if(${'regdate11_argument'} !== null) ${'regdate11_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`module`', ${'module8_argument'})
,new InsertExpression('`config`', ${'config9_argument'})
,new InsertExpression('`site_srl`', ${'site_srl10_argument'})
,new InsertExpression('`regdate`', ${'regdate11_argument'})
));
$query->setTables(array(
new Table('`xe_module_config`', '`module_config`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>