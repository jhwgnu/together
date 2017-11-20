<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModuleConfig");
$query->setAction("insert");
$query->setPriority("");

${'module7_argument'} = new Argument('module', $args->{'module'});
${'module7_argument'}->checkNotNull();
if(!${'module7_argument'}->isValid()) return ${'module7_argument'}->getErrorMessage();
if(${'module7_argument'} !== null) ${'module7_argument'}->setColumnType('varchar');
if(isset($args->config)) {
${'config8_argument'} = new Argument('config', $args->{'config'});
if(!${'config8_argument'}->isValid()) return ${'config8_argument'}->getErrorMessage();
} else
${'config8_argument'} = NULL;if(${'config8_argument'} !== null) ${'config8_argument'}->setColumnType('text');

${'site_srl9_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl9_argument'}->checkNotNull();
if(!${'site_srl9_argument'}->isValid()) return ${'site_srl9_argument'}->getErrorMessage();
if(${'site_srl9_argument'} !== null) ${'site_srl9_argument'}->setColumnType('number');

${'regdate10_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate10_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate10_argument'}->isValid()) return ${'regdate10_argument'}->getErrorMessage();
if(${'regdate10_argument'} !== null) ${'regdate10_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`module`', ${'module7_argument'})
,new InsertExpression('`config`', ${'config8_argument'})
,new InsertExpression('`site_srl`', ${'site_srl9_argument'})
,new InsertExpression('`regdate`', ${'regdate10_argument'})
));
$query->setTables(array(
new Table('`xe_module_config`', '`module_config`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>