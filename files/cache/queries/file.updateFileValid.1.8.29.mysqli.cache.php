<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateFileValid");
$query->setAction("update");
$query->setPriority("");

${'isvalid35_argument'} = new Argument('isvalid', $args->{'isvalid'});
${'isvalid35_argument'}->ensureDefaultValue('Y');
${'isvalid35_argument'}->checkNotNull();
if(!${'isvalid35_argument'}->isValid()) return ${'isvalid35_argument'}->getErrorMessage();
if(${'isvalid35_argument'} !== null) ${'isvalid35_argument'}->setColumnType('char');

${'upload_target_srl36_argument'} = new ConditionArgument('upload_target_srl', $args->upload_target_srl, 'equal');
${'upload_target_srl36_argument'}->checkFilter('number');
${'upload_target_srl36_argument'}->checkNotNull();
${'upload_target_srl36_argument'}->createConditionValue();
if(!${'upload_target_srl36_argument'}->isValid()) return ${'upload_target_srl36_argument'}->getErrorMessage();
if(${'upload_target_srl36_argument'} !== null) ${'upload_target_srl36_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`isvalid`', ${'isvalid35_argument'})
));
$query->setTables(array(
new Table('`xe_files`', '`files`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`upload_target_srl`',$upload_target_srl36_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>