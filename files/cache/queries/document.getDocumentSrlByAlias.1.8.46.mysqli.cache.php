<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocumentSrlByAlias");
$query->setAction("select");
$query->setPriority("");

${'alias_title1_argument'} = new ConditionArgument('alias_title', $args->alias_title, 'equal');
${'alias_title1_argument'}->checkNotNull();
${'alias_title1_argument'}->createConditionValue();
if(!${'alias_title1_argument'}->isValid()) return ${'alias_title1_argument'}->getErrorMessage();
if(${'alias_title1_argument'} !== null) ${'alias_title1_argument'}->setColumnType('varchar');

${'site_srl2_argument'} = new ConditionArgument('site_srl', $args->site_srl, 'equal');
${'site_srl2_argument'}->checkFilter('number');
${'site_srl2_argument'}->checkNotNull();
${'site_srl2_argument'}->createConditionValue();
if(!${'site_srl2_argument'}->isValid()) return ${'site_srl2_argument'}->getErrorMessage();
if(${'site_srl2_argument'} !== null) ${'site_srl2_argument'}->setColumnType('number');

${'mid3_argument'} = new ConditionArgument('mid', $args->mid, 'equal');
${'mid3_argument'}->checkNotNull();
${'mid3_argument'}->createConditionValue();
if(!${'mid3_argument'}->isValid()) return ${'mid3_argument'}->getErrorMessage();
if(${'mid3_argument'} !== null) ${'mid3_argument'}->setColumnType('varchar');

$query->setColumns(array(
new SelectExpression('`document_srl`')
));
$query->setTables(array(
new Table('`xe_document_aliases`', '`document_aliases`')
,new Table('`xe_modules`', '`modules`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`alias_title`',$alias_title1_argument,"equal")
,new ConditionWithArgument('`modules`.`site_srl`',$site_srl2_argument,"equal", 'and')
,new ConditionWithArgument('`modules`.`mid`',$mid3_argument,"equal", 'and')
,new ConditionWithoutArgument('`modules`.`module_srl`','`document_aliases`.`module_srl`',"equal", 'and')))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>