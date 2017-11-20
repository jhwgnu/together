<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getKinPoint");
$query->setAction("select");
$query->setPriority("");
if(isset($args->member_srl)) {
${'member_srl19_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'in');
${'member_srl19_argument'}->createConditionValue();
if(!${'member_srl19_argument'}->isValid()) return ${'member_srl19_argument'}->getErrorMessage();
} else
${'member_srl19_argument'} = NULL;if(${'member_srl19_argument'} !== null) ${'member_srl19_argument'}->setColumnType('number');

${'page21_argument'} = new Argument('page', $args->{'page'});
${'page21_argument'}->ensureDefaultValue('1');
if(!${'page21_argument'}->isValid()) return ${'page21_argument'}->getErrorMessage();

${'page_count22_argument'} = new Argument('page_count', $args->{'page_count'});
${'page_count22_argument'}->ensureDefaultValue('10');
if(!${'page_count22_argument'}->isValid()) return ${'page_count22_argument'}->getErrorMessage();

${'limit23_argument'} = new Argument('limit', $args->{'limit'});
${'limit23_argument'}->ensureDefaultValue('5');
if(!${'limit23_argument'}->isValid()) return ${'limit23_argument'}->getErrorMessage();

${'sort_index20_argument'} = new Argument('sort_index', $args->{'sort_index'});
${'sort_index20_argument'}->ensureDefaultValue('point');
if(!${'sort_index20_argument'}->isValid()) return ${'sort_index20_argument'}->getErrorMessage();

$query->setColumns(array(
new SelectExpression('`p`.`point`', '`point`')
,new SelectExpression('`p`.`member_srl`', '`member_srl`')
,new SelectExpression('`m`.`user_name`', '`user_name`')
));
$query->setTables(array(
new Table('`xe_point`', '`p`')
,new Table('`xe_member`', '`m`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithoutArgument('`p`.`member_srl`','`m`.`member_srl`',"equal", 'and')
,new ConditionWithArgument('`p`.`member_srl`',$member_srl19_argument,"in", 'and')))
));
$query->setGroups(array());
$query->setOrder(array(
new OrderByColumn(${'sort_index20_argument'}, "desc")
));
$query->setLimit(new Limit(${'limit23_argument'}, ${'page21_argument'}, ${'page_count22_argument'}));
return $query; ?>