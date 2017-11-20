<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocuments");
$query->setAction("select");
$query->setPriority("");

${'document_srls9_argument'} = new ConditionArgument('document_srls', $args->document_srls, 'in');
${'document_srls9_argument'}->checkNotNull();
${'document_srls9_argument'}->createConditionValue();
if(!${'document_srls9_argument'}->isValid()) return ${'document_srls9_argument'}->getErrorMessage();
if(${'document_srls9_argument'} !== null) ${'document_srls9_argument'}->setColumnType('number');

${'page12_argument'} = new Argument('page', $args->{'page'});
${'page12_argument'}->ensureDefaultValue('1');
if(!${'page12_argument'}->isValid()) return ${'page12_argument'}->getErrorMessage();

${'page_count13_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count13_argument'}->ensureDefaultValue('10');
if(!${'page_count13_argument'}->isValid()) return ${'page_count13_argument'}->getErrorMessage();

${'list_count14_argument'} = new Argument('list_count', $args->{'list_count'});
${'list_count14_argument'}->ensureDefaultValue('20');
if(!${'list_count14_argument'}->isValid()) return ${'list_count14_argument'}->getErrorMessage();

${'list_order10_argument'} = new Argument('list_order', $args->{'list_order'});
${'list_order10_argument'}->ensureDefaultValue('list_order');
if(!${'list_order10_argument'}->isValid()) return ${'list_order10_argument'}->getErrorMessage();

${'order_type11_argument'} = new SortArgument('order_type11', $args->order_type);
${'order_type11_argument'}->ensureDefaultValue('asc');
if(!${'order_type11_argument'}->isValid()) return ${'order_type11_argument'}->getErrorMessage();

$query->setColumns(array(
new StarExpression()
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`document_srl`',$document_srls9_argument,"in")))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'list_order10_argument'}, $order_type11_argument)
));
$query->setLimit(new Limit(${'list_count14_argument'}, ${'page12_argument'}, ${'page_count13_argument'}));
return $query; ?>