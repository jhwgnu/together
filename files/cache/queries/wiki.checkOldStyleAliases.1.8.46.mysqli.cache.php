<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("checkOldStyleAliases");
$query->setAction("select");
$query->setPriority("");

${'wiki_srls3_argument'} = new ConditionArgument('wiki_srls', $args->wiki_srls, 'in');
${'wiki_srls3_argument'}->checkNotNull();
${'wiki_srls3_argument'}->createConditionValue();
if(!${'wiki_srls3_argument'}->isValid()) return ${'wiki_srls3_argument'}->getErrorMessage();
if(${'wiki_srls3_argument'} !== null) ${'wiki_srls3_argument'}->setColumnType('number');

$query->setColumns(array(
new SelectExpression('`alias_srl`')
,new SelectExpression('`alias_title`')
));
$query->setTables(array(
new Table('`xe_document_aliases`', '`document_aliases`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$wiki_srls3_argument,"in")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>