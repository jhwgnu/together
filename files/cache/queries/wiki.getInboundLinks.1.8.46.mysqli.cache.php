<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getInboundLinks");
$query->setAction("select");
$query->setPriority("");

${'document_srl1_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl1_argument'}->checkNotNull();
${'document_srl1_argument'}->createConditionValue();
if(!${'document_srl1_argument'}->isValid()) return ${'document_srl1_argument'}->getErrorMessage();
if(${'document_srl1_argument'} !== null) ${'document_srl1_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`document_aliases`.`alias_title`', '`alias`')
,new SelectExpression('`documents`.`title`', '`title`')
,new SelectExpression('`documents`.`document_srl`', '`document_srl`')
));
$query->setTables(array(
new Table('`xe_wiki_links`', '`wiki_links`')
,new Table('`xe_document_aliases`', '`document_aliases`')
,new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`link_doc_srl`',$document_srl1_argument,"equal")
,new ConditionWithoutArgument('`cur_doc_srl`','`document_aliases`.`document_srl`',"equal", 'and')
,new ConditionWithoutArgument('`documents`.`document_srl`','`document_aliases`.`document_srl`',"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>