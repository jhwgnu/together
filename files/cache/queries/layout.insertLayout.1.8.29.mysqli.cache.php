<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertLayout");
$query->setAction("insert");
$query->setPriority("");

${'layout_srl1_argument'} = new Argument('layout_srl', $args->{'layout_srl'});
${'layout_srl1_argument'}->checkFilter('number');
${'layout_srl1_argument'}->checkNotNull();
if(!${'layout_srl1_argument'}->isValid()) return ${'layout_srl1_argument'}->getErrorMessage();
if(${'layout_srl1_argument'} !== null) ${'layout_srl1_argument'}->setColumnType('number');

${'site_srl2_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl2_argument'}->checkFilter('number');
${'site_srl2_argument'}->ensureDefaultValue('0');
${'site_srl2_argument'}->checkNotNull();
if(!${'site_srl2_argument'}->isValid()) return ${'site_srl2_argument'}->getErrorMessage();
if(${'site_srl2_argument'} !== null) ${'site_srl2_argument'}->setColumnType('number');

${'layout3_argument'} = new Argument('layout', $args->{'layout'});
${'layout3_argument'}->checkNotNull();
if(!${'layout3_argument'}->isValid()) return ${'layout3_argument'}->getErrorMessage();
if(${'layout3_argument'} !== null) ${'layout3_argument'}->setColumnType('varchar');

${'title4_argument'} = new Argument('title', $args->{'title'});
${'title4_argument'}->checkNotNull();
if(!${'title4_argument'}->isValid()) return ${'title4_argument'}->getErrorMessage();
if(${'title4_argument'} !== null) ${'title4_argument'}->setColumnType('varchar');
if(isset($args->module_srl)) {
${'module_srl5_argument'} = new Argument('module_srl', $args->{'module_srl'});
if(!${'module_srl5_argument'}->isValid()) return ${'module_srl5_argument'}->getErrorMessage();
} else
${'module_srl5_argument'} = NULL;if(${'module_srl5_argument'} !== null) ${'module_srl5_argument'}->setColumnType('number');
if(isset($args->extra_vars)) {
${'extra_vars6_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars6_argument'}->isValid()) return ${'extra_vars6_argument'}->getErrorMessage();
} else
${'extra_vars6_argument'} = NULL;if(${'extra_vars6_argument'} !== null) ${'extra_vars6_argument'}->setColumnType('text');
if(isset($args->layout_path)) {
${'layout_path7_argument'} = new Argument('layout_path', $args->{'layout_path'});
if(!${'layout_path7_argument'}->isValid()) return ${'layout_path7_argument'}->getErrorMessage();
} else
${'layout_path7_argument'} = NULL;if(${'layout_path7_argument'} !== null) ${'layout_path7_argument'}->setColumnType('varchar');

${'regdate8_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate8_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate8_argument'}->isValid()) return ${'regdate8_argument'}->getErrorMessage();
if(${'regdate8_argument'} !== null) ${'regdate8_argument'}->setColumnType('date');

${'layout_type9_argument'} = new Argument('layout_type', $args->{'layout_type'});
${'layout_type9_argument'}->ensureDefaultValue('P');
if(!${'layout_type9_argument'}->isValid()) return ${'layout_type9_argument'}->getErrorMessage();
if(${'layout_type9_argument'} !== null) ${'layout_type9_argument'}->setColumnType('char');

$query->setColumns(array(
new InsertExpression('`layout_srl`', ${'layout_srl1_argument'})
,new InsertExpression('`site_srl`', ${'site_srl2_argument'})
,new InsertExpression('`layout`', ${'layout3_argument'})
,new InsertExpression('`title`', ${'title4_argument'})
,new InsertExpression('`module_srl`', ${'module_srl5_argument'})
,new InsertExpression('`extra_vars`', ${'extra_vars6_argument'})
,new InsertExpression('`layout_path`', ${'layout_path7_argument'})
,new InsertExpression('`regdate`', ${'regdate8_argument'})
,new InsertExpression('`layout_type`', ${'layout_type9_argument'})
));
$query->setTables(array(
new Table('`xe_layouts`', '`layouts`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>