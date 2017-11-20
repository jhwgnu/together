<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModuleExtraVars");
$query->setAction("insert");
$query->setPriority("");

${'module_srl35_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl35_argument'}->checkFilter('number');
${'module_srl35_argument'}->checkNotNull();
if(!${'module_srl35_argument'}->isValid()) return ${'module_srl35_argument'}->getErrorMessage();
if(${'module_srl35_argument'} !== null) ${'module_srl35_argument'}->setColumnType('number');

${'name36_argument'} = new Argument('name', $args->{'name'});
${'name36_argument'}->checkNotNull();
if(!${'name36_argument'}->isValid()) return ${'name36_argument'}->getErrorMessage();
if(${'name36_argument'} !== null) ${'name36_argument'}->setColumnType('varchar');

${'value37_argument'} = new Argument('value', $args->{'value'});
${'value37_argument'}->checkNotNull();
if(!${'value37_argument'}->isValid()) return ${'value37_argument'}->getErrorMessage();
if(${'value37_argument'} !== null) ${'value37_argument'}->setColumnType('text');

$query->setColumns(array(
new InsertExpression('`module_srl`', ${'module_srl35_argument'})
,new InsertExpression('`name`', ${'name36_argument'})
,new InsertExpression('`value`', ${'value37_argument'})
));
$query->setTables(array(
new Table('`xe_module_extra_vars`', '`module_extra_vars`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>