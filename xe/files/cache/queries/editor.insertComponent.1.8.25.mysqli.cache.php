<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertComponent");
$query->setAction("insert");
$query->setPriority("");

${'component_name118_argument'} = new Argument('component_name', $args->{'component_name'});
${'component_name118_argument'}->checkNotNull();
if(!${'component_name118_argument'}->isValid()) return ${'component_name118_argument'}->getErrorMessage();
if(${'component_name118_argument'} !== null) ${'component_name118_argument'}->setColumnType('varchar');

${'enabled119_argument'} = new Argument('enabled', $args->{'enabled'});
${'enabled119_argument'}->ensureDefaultValue('N');
if(!${'enabled119_argument'}->isValid()) return ${'enabled119_argument'}->getErrorMessage();
if(${'enabled119_argument'} !== null) ${'enabled119_argument'}->setColumnType('char');

${'list_order120_argument'} = new Argument('list_order', $args->{'list_order'});
$db = DB::getInstance(); $sequence = $db->getNextSequence(); ${'list_order120_argument'}->ensureDefaultValue($sequence);
if(!${'list_order120_argument'}->isValid()) return ${'list_order120_argument'}->getErrorMessage();
if(${'list_order120_argument'} !== null) ${'list_order120_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`component_name`', ${'component_name118_argument'})
,new InsertExpression('`enabled`', ${'enabled119_argument'})
,new InsertExpression('`list_order`', ${'list_order120_argument'})
));
$query->setTables(array(
new Table('`xe_editor_components`', '`editor_components`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>