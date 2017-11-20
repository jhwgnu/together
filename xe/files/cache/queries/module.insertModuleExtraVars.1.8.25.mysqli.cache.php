<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertModuleExtraVars");
$query->setAction("insert");
$query->setPriority("");

${'module_srl182_argument'} = new Argument('module_srl', $args->{'module_srl'});
${'module_srl182_argument'}->checkFilter('number');
${'module_srl182_argument'}->checkNotNull();
if(!${'module_srl182_argument'}->isValid()) return ${'module_srl182_argument'}->getErrorMessage();
if(${'module_srl182_argument'} !== null) ${'module_srl182_argument'}->setColumnType('number');

${'name183_argument'} = new Argument('name', $args->{'name'});
${'name183_argument'}->checkNotNull();
if(!${'name183_argument'}->isValid()) return ${'name183_argument'}->getErrorMessage();
if(${'name183_argument'} !== null) ${'name183_argument'}->setColumnType('varchar');

${'value184_argument'} = new Argument('value', $args->{'value'});
${'value184_argument'}->checkNotNull();
if(!${'value184_argument'}->isValid()) return ${'value184_argument'}->getErrorMessage();
if(${'value184_argument'} !== null) ${'value184_argument'}->setColumnType('text');

$query->setColumns(array(
new InsertExpression('`module_srl`', ${'module_srl182_argument'})
,new InsertExpression('`name`', ${'name183_argument'})
,new InsertExpression('`value`', ${'value184_argument'})
));
$query->setTables(array(
new Table('`xe_module_extra_vars`', '`module_extra_vars`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>