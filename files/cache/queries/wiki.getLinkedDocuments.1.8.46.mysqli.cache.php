<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getLinkedDocuments");
$query->setAction("select");
$query->setPriority("");

${'document_srl2_argument'} = new ConditionArgument('document_srl', $args->document_srl, 'equal');
${'document_srl2_argument'}->checkNotNull();
${'document_srl2_argument'}->createConditionValue();
if(!${'document_srl2_argument'}->isValid()) return ${'document_srl2_argument'}->getErrorMessage();
if(${'document_srl2_argument'} !== null) ${'document_srl2_argument'}->setColumnType('number');

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
new ConditionWithArgument('`cur_doc_srl`',$document_srl2_argument,"equal")
,new ConditionWithoutArgument('`link_doc_srl`','`document_aliases`.`document_srl`',"equal", 'and')
,new ConditionWithoutArgument('`documents`.`document_srl`','`document_aliases`.`document_srl`',"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>