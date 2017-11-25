<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateChangePasswordDate");
$query->setAction("update");
$query->setPriority("");

${'change_password_date1_argument'} = new Argument('change_password_date', $args->{'change_password_date'});
${'change_password_date1_argument'}->ensureDefaultValue(date("YmdHis"));
${'change_password_date1_argument'}->checkNotNull();
if(!${'change_password_date1_argument'}->isValid()) return ${'change_password_date1_argument'}->getErrorMessage();
if(${'change_password_date1_argument'} !== null) ${'change_password_date1_argument'}->setColumnType('date');

${'member_srl2_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl2_argument'}->checkFilter('number');
${'member_srl2_argument'}->checkNotNull();
${'member_srl2_argument'}->createConditionValue();
if(!${'member_srl2_argument'}->isValid()) return ${'member_srl2_argument'}->getErrorMessage();
if(${'member_srl2_argument'} !== null) ${'member_srl2_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`change_password_date`', ${'change_password_date1_argument'})
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`member_srl`',$member_srl2_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>