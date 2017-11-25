<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModuleMobileSkinVars");
$query->setAction("insert");
$query->setPriority("");

${'module_srl5_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl5_argument'}->checkFilter('number');
${'module_srl5_argument'}->checkNotNull();
if(!${'module_srl5_argument'}->isValid()) return ${'module_srl5_argument'}->getErrorMessage();
if(${'module_srl5_argument'} !== null) ${'module_srl5_argument'}->setColumnType('number');

${'name6_argument'} = new Argument('name', $args->{'name'});
${'name6_argument'}->checkNotNull();
if(!${'name6_argument'}->isValid()) return ${'name6_argument'}->getErrorMessage();
if(${'name6_argument'} !== null) ${'name6_argument'}->setColumnType('varchar');

${'value7_argument'} = new Argument('value', $args->{'value'});
${'value7_argument'}->checkNotNull();
if(!${'value7_argument'}->isValid()) return ${'value7_argument'}->getErrorMessage();
if(${'value7_argument'} !== null) ${'value7_argument'}->setColumnType('text');

$query->setColumns(array(
new InsertExpression('`module_srl`', ${'module_srl5_argument'})
,new InsertExpression('`name`', ${'name6_argument'})
,new InsertExpression('`value`', ${'value7_argument'})
));
$query->setTables(array(
new Table('`xe_module_mobile_skins`', '`module_mobile_skins`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>