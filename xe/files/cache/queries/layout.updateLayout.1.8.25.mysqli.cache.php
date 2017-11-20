<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateLayout");
$query->setAction("update");
$query->setPriority("");
if(isset($args->title)) {
${'title197_argument'} = new Argument('title', $args->{'title'});
if(!${'title197_argument'}->isValid()) return ${'title197_argument'}->getErrorMessage();
} else
${'title197_argument'} = NULL;if(${'title197_argument'} !== null) ${'title197_argument'}->setColumnType('varchar');
if(isset($args->extra_vars)) {
${'extra_vars198_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars198_argument'}->isValid()) return ${'extra_vars198_argument'}->getErrorMessage();
} else
${'extra_vars198_argument'} = NULL;if(${'extra_vars198_argument'} !== null) ${'extra_vars198_argument'}->setColumnType('text');
if(isset($args->layout)) {
${'layout199_argument'} = new Argument('layout', $args->{'layout'});
if(!${'layout199_argument'}->isValid()) return ${'layout199_argument'}->getErrorMessage();
} else
${'layout199_argument'} = NULL;if(${'layout199_argument'} !== null) ${'layout199_argument'}->setColumnType('varchar');
if(isset($args->layout_path)) {
${'layout_path200_argument'} = new Argument('layout_path', $args->{'layout_path'});
if(!${'layout_path200_argument'}->isValid()) return ${'layout_path200_argument'}->getErrorMessage();
} else
${'layout_path200_argument'} = NULL;if(${'layout_path200_argument'} !== null) ${'layout_path200_argument'}->setColumnType('varchar');

${'layout_srl201_argument'} = new ConditionArgument('layout_srl', $args->layout_srl, 'equal');
${'layout_srl201_argument'}->checkFilter('number');
${'layout_srl201_argument'}->checkNotNull();
${'layout_srl201_argument'}->createConditionValue();
if(!${'layout_srl201_argument'}->isValid()) return ${'layout_srl201_argument'}->getErrorMessage();
if(${'layout_srl201_argument'} !== null) ${'layout_srl201_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`title`', ${'title197_argument'})
,new UpdateExpression('`extra_vars`', ${'extra_vars198_argument'})
,new UpdateExpression('`layout`', ${'layout199_argument'})
,new UpdateExpression('`layout_path`', ${'layout_path200_argument'})
));
$query->setTables(array(
new Table('`xe_layouts`', '`layouts`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`layout_srl`',$layout_srl201_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>