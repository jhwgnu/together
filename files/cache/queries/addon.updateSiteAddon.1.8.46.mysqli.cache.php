<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateSiteAddon");
$query->setAction("update");
$query->setPriority("");
if(isset($args->is_used)) {
${'is_used1_argument'} = new Argument('is_used', $args->{'is_used'});
if(!${'is_used1_argument'}->isValid()) return ${'is_used1_argument'}->getErrorMessage();
} else
${'is_used1_argument'} = NULL;if(${'is_used1_argument'} !== null) ${'is_used1_argument'}->setColumnType('char');
if(isset($args->is_used_m)) {
${'is_used_m2_argument'} = new Argument('is_used_m', $args->{'is_used_m'});
if(!${'is_used_m2_argument'}->isValid()) return ${'is_used_m2_argument'}->getErrorMessage();
} else
${'is_used_m2_argument'} = NULL;if(${'is_used_m2_argument'} !== null) ${'is_used_m2_argument'}->setColumnType('char');
if(isset($args->extra_vars)) {
${'extra_vars3_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars3_argument'}->isValid()) return ${'extra_vars3_argument'}->getErrorMessage();
} else
${'extra_vars3_argument'} = NULL;if(${'extra_vars3_argument'} !== null) ${'extra_vars3_argument'}->setColumnType('text');

${'site_srl4_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl4_argument'}->checkNotNull();
${'site_srl4_argument'}->createConditionValue();
if(!${'site_srl4_argument'}->isValid()) return ${'site_srl4_argument'}->getErrorMessage();
if(${'site_srl4_argument'} !== null) ${'site_srl4_argument'}->setColumnType('number');

${'addon5_argument'} = new ConditionArgument('addon', $args->addon, 'equal');
${'addon5_argument'}->checkNotNull();
${'addon5_argument'}->createConditionValue();
if(!${'addon5_argument'}->isValid()) return ${'addon5_argument'}->getErrorMessage();
if(${'addon5_argument'} !== null) ${'addon5_argument'}->setColumnType('varchar');

$query->setColumns(array(
new UpdateExpression('`is_used`', ${'is_used1_argument'})
,new UpdateExpression('`is_used_m`', ${'is_used_m2_argument'})
,new UpdateExpression('`extra_vars`', ${'extra_vars3_argument'})
));
$query->setTables(array(
new Table('`xe_addons_site`', '`addons_site`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`site_srl`',$site_srl4_argument,"equal")
,new ConditionWithArgument('`addon`',$addon5_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>