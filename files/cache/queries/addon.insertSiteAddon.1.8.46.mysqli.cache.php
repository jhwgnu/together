<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertSiteAddon");
$query->setAction("insert");
$query->setPriority("");

${'site_srl1_argument'} = new Argument('site_srl', $args->{'site_srl'});
${'site_srl1_argument'}->checkNotNull();
if(!${'site_srl1_argument'}->isValid()) return ${'site_srl1_argument'}->getErrorMessage();
if(${'site_srl1_argument'} !== null) ${'site_srl1_argument'}->setColumnType('number');

${'addon2_argument'} = new Argument('addon', $args->{'addon'});
${'addon2_argument'}->checkNotNull();
if(!${'addon2_argument'}->isValid()) return ${'addon2_argument'}->getErrorMessage();
if(${'addon2_argument'} !== null) ${'addon2_argument'}->setColumnType('varchar');

${'is_used3_argument'} = new Argument('is_used', $args->{'is_used'});
${'is_used3_argument'}->ensureDefaultValue('N');
${'is_used3_argument'}->checkNotNull();
if(!${'is_used3_argument'}->isValid()) return ${'is_used3_argument'}->getErrorMessage();
if(${'is_used3_argument'} !== null) ${'is_used3_argument'}->setColumnType('char');

${'is_used_m4_argument'} = new Argument('is_used_m', $args->{'is_used_m'});
${'is_used_m4_argument'}->ensureDefaultValue('N');
if(!${'is_used_m4_argument'}->isValid()) return ${'is_used_m4_argument'}->getErrorMessage();
if(${'is_used_m4_argument'} !== null) ${'is_used_m4_argument'}->setColumnType('char');
if(isset($args->extra_vars)) {
${'extra_vars5_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars5_argument'}->isValid()) return ${'extra_vars5_argument'}->getErrorMessage();
} else
${'extra_vars5_argument'} = NULL;if(${'extra_vars5_argument'} !== null) ${'extra_vars5_argument'}->setColumnType('text');

${'regdate6_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate6_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate6_argument'}->isValid()) return ${'regdate6_argument'}->getErrorMessage();
if(${'regdate6_argument'} !== null) ${'regdate6_argument'}->setColumnType('date');

$query->setColumns(array(
new InsertExpression('`site_srl`', ${'site_srl1_argument'})
,new InsertExpression('`addon`', ${'addon2_argument'})
,new InsertExpression('`is_used`', ${'is_used3_argument'})
,new InsertExpression('`is_used_m`', ${'is_used_m4_argument'})
,new InsertExpression('`extra_vars`', ${'extra_vars5_argument'})
,new InsertExpression('`regdate`', ${'regdate6_argument'})
));
$query->setTables(array(
new Table('`xe_addons_site`', '`addons_site`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>