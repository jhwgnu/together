<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateLayout");
$query->setAction("update");
$query->setPriority("");
if(isset($args->title)) {
${'title1_argument'} = new Argument('title', $args->{'title'});
if(!${'title1_argument'}->isValid()) return ${'title1_argument'}->getErrorMessage();
} else
${'title1_argument'} = NULL;if(${'title1_argument'} !== null) ${'title1_argument'}->setColumnType('varchar');
if(isset($args->extra_vars)) {
${'extra_vars2_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars2_argument'}->isValid()) return ${'extra_vars2_argument'}->getErrorMessage();
} else
${'extra_vars2_argument'} = NULL;if(${'extra_vars2_argument'} !== null) ${'extra_vars2_argument'}->setColumnType('text');
if(isset($args->layout)) {
${'layout3_argument'} = new Argument('layout', $args->{'layout'});
if(!${'layout3_argument'}->isValid()) return ${'layout3_argument'}->getErrorMessage();
} else
${'layout3_argument'} = NULL;if(${'layout3_argument'} !== null) ${'layout3_argument'}->setColumnType('varchar');
if(isset($args->layout_path)) {
${'layout_path4_argument'} = new Argument('layout_path', $args->{'layout_path'});
if(!${'layout_path4_argument'}->isValid()) return ${'layout_path4_argument'}->getErrorMessage();
} else
${'layout_path4_argument'} = NULL;if(${'layout_path4_argument'} !== null) ${'layout_path4_argument'}->setColumnType('varchar');

${'layout_srl5_argument'} = new ConditionArgument('layout_srl', $args->layout_srl, 'equal');
${'layout_srl5_argument'}->checkFilter('number');
${'layout_srl5_argument'}->checkNotNull();
${'layout_srl5_argument'}->createConditionValue();
if(!${'layout_srl5_argument'}->isValid()) return ${'layout_srl5_argument'}->getErrorMessage();
if(${'layout_srl5_argument'} !== null) ${'layout_srl5_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`title`', ${'title1_argument'})
,new UpdateExpression('`extra_vars`', ${'extra_vars2_argument'})
,new UpdateExpression('`layout`', ${'layout3_argument'})
,new UpdateExpression('`layout_path`', ${'layout_path4_argument'})
));
$query->setTables(array(
new Table('`xe_layouts`', '`layouts`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`layout_srl`',$layout_srl5_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>