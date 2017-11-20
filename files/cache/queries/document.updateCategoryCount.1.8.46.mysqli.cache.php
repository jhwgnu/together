<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateCategoryCount");
$query->setAction("update");
$query->setPriority("");
if(isset($args->document_count)) {
${'document_count3_argument'} = new Argument('document_count', $args->{'document_count'});
if(!${'document_count3_argument'}->isValid()) return ${'document_count3_argument'}->getErrorMessage();
} else
${'document_count3_argument'} = NULL;if(${'document_count3_argument'} !== null) ${'document_count3_argument'}->setColumnType('number');

${'last_update4_argument'} = new Argument('last_update', $args->{'last_update'});
${'last_update4_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_update4_argument'}->isValid()) return ${'last_update4_argument'}->getErrorMessage();
if(${'last_update4_argument'} !== null) ${'last_update4_argument'}->setColumnType('date');

${'category_srl5_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'equal');
${'category_srl5_argument'}->checkFilter('number');
${'category_srl5_argument'}->checkNotNull();
${'category_srl5_argument'}->createConditionValue();
if(!${'category_srl5_argument'}->isValid()) return ${'category_srl5_argument'}->getErrorMessage();
if(${'category_srl5_argument'} !== null) ${'category_srl5_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`document_count`', ${'document_count3_argument'})
,new UpdateExpression('`last_update`', ${'last_update4_argument'})
));
$query->setTables(array(
new Table('`xe_document_categories`', '`document_categories`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`category_srl`',$category_srl5_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>