<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertLayout");
$query->setAction("insert");
$query->setPriority("");

${'layout_srl188_argument'} = new Argument('layout_srl', $args->{'layout_srl'});
${'layout_srl188_argument'}->checkFilter('number');
${'layout_srl188_argument'}->checkNotNull();
if(!${'layout_srl188_argument'}->isValid()) return ${'layout_srl188_argument'}->getErrorMessage();
if(${'layout_srl188_argument'} !== null) ${'layout_srl188_argument'}->setColumnType('number');

${'site_srl189_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl189_argument'}->checkFilter('number');
${'site_srl189_argument'}->ensureDefaultValue('0');
${'site_srl189_argument'}->checkNotNull();
if(!${'site_srl189_argument'}->isValid()) return ${'site_srl189_argument'}->getErrorMessage();
if(${'site_srl189_argument'} !== null) ${'site_srl189_argument'}->setColumnType('number');

${'layout190_argument'} = new Argument('layout', $args->{'layout'});
${'layout190_argument'}->checkNotNull();
if(!${'layout190_argument'}->isValid()) return ${'layout190_argument'}->getErrorMessage();
if(${'layout190_argument'} !== null) ${'layout190_argument'}->setColumnType('varchar');

${'title191_argument'} = new Argument('title', $args->{'title'});
${'title191_argument'}->checkNotNull();
if(!${'title191_argument'}->isValid()) return ${'title191_argument'}->getErrorMessage();
if(${'title191_argument'} !== null) ${'title191_argument'}->setColumnType('varchar');
if(isset($args->module_srl)) {
${'module_srl192_argument'} = new Argument('module_srl', $args->{'module_srl'});
if(!${'module_srl192_argument'}->isValid()) return ${'module_srl192_argument'}->getErrorMessage();
} else
${'module_srl192_argument'} = NULL;if(${'module_srl192_argument'} !== null) ${'module_srl192_argument'}->setColumnType('number');
if(isset($args->extra_vars)) {
${'extra_vars193_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars193_argument'}->isValid()) return ${'extra_vars193_argument'}->getErrorMessage();
} else
${'extra_vars193_argument'} = NULL;if(${'extra_vars193_argument'} !== null) ${'extra_vars193_argument'}->setColumnType('text');
if(isset($args->layout_path)) {
${'layout_path194_argument'} = new Argument('layout_path', $args->{'layout_path'});
if(!${'layout_path194_argument'}->isValid()) return ${'layout_path194_argument'}->getErrorMessage();
} else
${'layout_path194_argument'} = NULL;if(${'layout_path194_argument'} !== null) ${'layout_path194_argument'}->setColumnType('varchar');

${'regdate195_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate195_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate195_argument'}->isValid()) return ${'regdate195_argument'}->getErrorMessage();
if(${'regdate195_argument'} !== null) ${'regdate195_argument'}->setColumnType('date');

${'layout_type196_argument'} = new Argument('layout_type', $args->{'layout_type'});
${'layout_type196_argument'}->ensureDefaultValue('P');
if(!${'layout_type196_argument'}->isValid()) return ${'layout_type196_argument'}->getErrorMessage();
if(${'layout_type196_argument'} !== null) ${'layout_type196_argument'}->setColumnType('char');

$query->setColumns(array(
new InsertExpression('`layout_srl`', ${'layout_srl188_argument'})
,new InsertExpression('`site_srl`', ${'site_srl189_argument'})
,new InsertExpression('`layout`', ${'layout190_argument'})
,new InsertExpression('`title`', ${'title191_argument'})
,new InsertExpression('`module_srl`', ${'module_srl192_argument'})
,new InsertExpression('`extra_vars`', ${'extra_vars193_argument'})
,new InsertExpression('`layout_path`', ${'layout_path194_argument'})
,new InsertExpression('`regdate`', ${'regdate195_argument'})
,new InsertExpression('`layout_type`', ${'layout_type196_argument'})
));
$query->setTables(array(
new Table('`xe_layouts`', '`layouts`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>