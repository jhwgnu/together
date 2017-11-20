<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("updateFileValid");
$query->setAction("update");
$query->setPriority("");

${'isvalid247_argument'} = new Argument('isvalid', $args->{'isvalid'});
${'isvalid247_argument'}->ensureDefaultValue('Y');
${'isvalid247_argument'}->checkNotNull();
if(!${'isvalid247_argument'}->isValid()) return ${'isvalid247_argument'}->getErrorMessage();
if(${'isvalid247_argument'} !== null) ${'isvalid247_argument'}->setColumnType('char');

${'upload_target_srl248_argument'} = new ConditionArgument('upload_target_srl', $args->upload_target_srl, 'equal');
${'upload_target_srl248_argument'}->checkFilter('number');
${'upload_target_srl248_argument'}->checkNotNull();
${'upload_target_srl248_argument'}->createConditionValue();
if(!${'upload_target_srl248_argument'}->isValid()) return ${'upload_target_srl248_argument'}->getErrorMessage();
if(${'upload_target_srl248_argument'} !== null) ${'upload_target_srl248_argument'}->setColumnType('number');

$query->setColumns(array(
new UpdateExpression('`isvalid`', ${'isvalid247_argument'})
));
$query->setTables(array(
new Table('`xe_files`', '`files`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`upload_target_srl`',$upload_target_srl248_argument,"equal")))
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>