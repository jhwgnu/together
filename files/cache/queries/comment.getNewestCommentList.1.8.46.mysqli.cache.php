<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getNewestCommentList");
$query->setAction("select");
$query->setPriority("");
if(isset($args->status)) {
${'status5_argument'} = new ConditionArgument('status', $args->status, 'equal');
${'status5_argument'}->createConditionValue();
if(!${'status5_argument'}->isValid()) return ${'status5_argument'}->getErrorMessage();
} else
${'status5_argument'} = NULL;if(${'status5_argument'} !== null) ${'status5_argument'}->setColumnType('number');
if(isset($args->module_srl)) {
${'module_srl6_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl6_argument'}->checkFilter('number');
${'module_srl6_argument'}->createConditionValue();
if(!${'module_srl6_argument'}->isValid()) return ${'module_srl6_argument'}->getErrorMessage();
} else
${'module_srl6_argument'} = NULL;if(${'module_srl6_argument'} !== null) ${'module_srl6_argument'}->setColumnType('number');
if(isset($args->document_srl)) {
${'document_srl7_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl7_argument'}->checkFilter('number');
${'document_srl7_argument'}->createConditionValue();
if(!${'document_srl7_argument'}->isValid()) return ${'document_srl7_argument'}->getErrorMessage();
} else
${'document_srl7_argument'} = NULL;if(${'document_srl7_argument'} !== null) ${'document_srl7_argument'}->setColumnType('number');

${'list_count9_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count9_argument'}->ensureDefaultValue('20');
if(!${'list_count9_argument'}->isValid()) return ${'list_count9_argument'}->getErrorMessage();

${'sort_index8_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index8_argument'}->ensureDefaultValue('list_order');
if(!${'sort_index8_argument'}->isValid()) return ${'sort_index8_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_comments`', '`comments`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`status`',$status5_argument,"equal", 'and')
,new ConditionWithArgument('`module_srl`',$module_srl6_argument,"in", 'and')
,new ConditionWithArgument('`document_srl`',$document_srl7_argument,"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index8_argument'}, "asc")
));
$query->setLimit(new Limit(${'list_count9_argument'}));
return $query; ?>