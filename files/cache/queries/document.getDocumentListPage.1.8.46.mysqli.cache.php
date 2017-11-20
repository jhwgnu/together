<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("getDocumentListPage");
$query->setAction("select");
$query->setPriority("");
if(isset($args->module_srl)) {
${'module_srl1_argument'} = new ConditionArgument('module_srl', $args->module_srl, 'in');
${'module_srl1_argument'}->checkFilter('number');
${'module_srl1_argument'}->createConditionValue();
if(!${'module_srl1_argument'}->isValid()) return ${'module_srl1_argument'}->getErrorMessage();
} else
${'module_srl1_argument'} = NULL;if(${'module_srl1_argument'} !== null) ${'module_srl1_argument'}->setColumnType('number');
if(isset($args->exclude_module_srl)) {
${'exclude_module_srl2_argument'} = new ConditionArgument('exclude_module_srl', $args->exclude_module_srl, 'notin');
${'exclude_module_srl2_argument'}->checkFilter('number');
${'exclude_module_srl2_argument'}->createConditionValue();
if(!${'exclude_module_srl2_argument'}->isValid()) return ${'exclude_module_srl2_argument'}->getErrorMessage();
} else
${'exclude_module_srl2_argument'} = NULL;if(${'exclude_module_srl2_argument'} !== null) ${'exclude_module_srl2_argument'}->setColumnType('number');
if(isset($args->category_srl)) {
${'category_srl3_argument'} = new ConditionArgument('category_srl', $args->category_srl, 'in');
${'category_srl3_argument'}->createConditionValue();
if(!${'category_srl3_argument'}->isValid()) return ${'category_srl3_argument'}->getErrorMessage();
} else
${'category_srl3_argument'} = NULL;if(${'category_srl3_argument'} !== null) ${'category_srl3_argument'}->setColumnType('number');
if(isset($args->s_is_notice)) {
${'s_is_notice4_argument'} = new ConditionArgument('s_is_notice', $args->s_is_notice, 'equal');
${'s_is_notice4_argument'}->createConditionValue();
if(!${'s_is_notice4_argument'}->isValid()) return ${'s_is_notice4_argument'}->getErrorMessage();
} else
${'s_is_notice4_argument'} = NULL;if(${'s_is_notice4_argument'} !== null) ${'s_is_notice4_argument'}->setColumnType('char');
if(isset($args->member_srl)) {
${'member_srl5_argument'} = new ConditionArgument('member_srl', $args->member_srl, 'equal');
${'member_srl5_argument'}->checkFilter('number');
${'member_srl5_argument'}->createConditionValue();
if(!${'member_srl5_argument'}->isValid()) return ${'member_srl5_argument'}->getErrorMessage();
} else
${'member_srl5_argument'} = NULL;if(${'member_srl5_argument'} !== null) ${'member_srl5_argument'}->setColumnType('number');
if(isset($args->statusList)) {
${'statusList6_argument'} = new ConditionArgument('statusList', $args->statusList, 'in');
${'statusList6_argument'}->createConditionValue();
if(!${'statusList6_argument'}->isValid()) return ${'statusList6_argument'}->getErrorMessage();
} else
${'statusList6_argument'} = NULL;if(${'statusList6_argument'} !== null) ${'statusList6_argument'}->setColumnType('varchar');
if(isset($args->division)) {
${'division7_argument'} = new ConditionArgument('division', $args->division, 'more');
${'division7_argument'}->createConditionValue();
if(!${'division7_argument'}->isValid()) return ${'division7_argument'}->getErrorMessage();
} else
${'division7_argument'} = NULL;if(${'division7_argument'} !== null) ${'division7_argument'}->setColumnType('number');
if(isset($args->last_division)) {
${'last_division8_argument'} = new ConditionArgument('last_division', $args->last_division, 'below');
${'last_division8_argument'}->createConditionValue();
if(!${'last_division8_argument'}->isValid()) return ${'last_division8_argument'}->getErrorMessage();
} else
${'last_division8_argument'} = NULL;if(${'last_division8_argument'} !== null) ${'last_division8_argument'}->setColumnType('number');
if(isset($args->s_title)) {
${'s_title9_argument'} = new ConditionArgument('s_title', $args->s_title, 'like');
${'s_title9_argument'}->createConditionValue();
if(!${'s_title9_argument'}->isValid()) return ${'s_title9_argument'}->getErrorMessage();
} else
${'s_title9_argument'} = NULL;if(${'s_title9_argument'} !== null) ${'s_title9_argument'}->setColumnType('varchar');
if(isset($args->s_content)) {
${'s_content10_argument'} = new ConditionArgument('s_content', $args->s_content, 'like');
${'s_content10_argument'}->createConditionValue();
if(!${'s_content10_argument'}->isValid()) return ${'s_content10_argument'}->getErrorMessage();
} else
${'s_content10_argument'} = NULL;if(${'s_content10_argument'} !== null) ${'s_content10_argument'}->setColumnType('bigtext');
if(isset($args->s_user_name)) {
${'s_user_name11_argument'} = new ConditionArgument('s_user_name', $args->s_user_name, 'like');
${'s_user_name11_argument'}->createConditionValue();
if(!${'s_user_name11_argument'}->isValid()) return ${'s_user_name11_argument'}->getErrorMessage();
} else
${'s_user_name11_argument'} = NULL;if(${'s_user_name11_argument'} !== null) ${'s_user_name11_argument'}->setColumnType('varchar');
if(isset($args->s_user_id)) {
${'s_user_id12_argument'} = new ConditionArgument('s_user_id', $args->s_user_id, 'like');
${'s_user_id12_argument'}->createConditionValue();
if(!${'s_user_id12_argument'}->isValid()) return ${'s_user_id12_argument'}->getErrorMessage();
} else
${'s_user_id12_argument'} = NULL;if(${'s_user_id12_argument'} !== null) ${'s_user_id12_argument'}->setColumnType('varchar');
if(isset($args->s_nick_name)) {
${'s_nick_name13_argument'} = new ConditionArgument('s_nick_name', $args->s_nick_name, 'like');
${'s_nick_name13_argument'}->createConditionValue();
if(!${'s_nick_name13_argument'}->isValid()) return ${'s_nick_name13_argument'}->getErrorMessage();
} else
${'s_nick_name13_argument'} = NULL;if(${'s_nick_name13_argument'} !== null) ${'s_nick_name13_argument'}->setColumnType('varchar');
if(isset($args->s_email_addres)) {
${'s_email_addres14_argument'} = new ConditionArgument('s_email_addres', $args->s_email_addres, 'like');
${'s_email_addres14_argument'}->createConditionValue();
if(!${'s_email_addres14_argument'}->isValid()) return ${'s_email_addres14_argument'}->getErrorMessage();
} else
${'s_email_addres14_argument'} = NULL;if(${'s_email_addres14_argument'} !== null) ${'s_email_addres14_argument'}->setColumnType('varchar');
if(isset($args->s_homepage)) {
${'s_homepage15_argument'} = new ConditionArgument('s_homepage', $args->s_homepage, 'like');
${'s_homepage15_argument'}->createConditionValue();
if(!${'s_homepage15_argument'}->isValid()) return ${'s_homepage15_argument'}->getErrorMessage();
} else
${'s_homepage15_argument'} = NULL;if(${'s_homepage15_argument'} !== null) ${'s_homepage15_argument'}->setColumnType('varchar');
if(isset($args->s_tags)) {
${'s_tags16_argument'} = new ConditionArgument('s_tags', $args->s_tags, 'like');
${'s_tags16_argument'}->createConditionValue();
if(!${'s_tags16_argument'}->isValid()) return ${'s_tags16_argument'}->getErrorMessage();
} else
${'s_tags16_argument'} = NULL;if(${'s_tags16_argument'} !== null) ${'s_tags16_argument'}->setColumnType('text');
if(isset($args->s_member_srl)) {
${'s_member_srl17_argument'} = new ConditionArgument('s_member_srl', $args->s_member_srl, 'equal');
${'s_member_srl17_argument'}->createConditionValue();
if(!${'s_member_srl17_argument'}->isValid()) return ${'s_member_srl17_argument'}->getErrorMessage();
} else
${'s_member_srl17_argument'} = NULL;if(${'s_member_srl17_argument'} !== null) ${'s_member_srl17_argument'}->setColumnType('number');
if(isset($args->s_readed_count)) {
${'s_readed_count18_argument'} = new ConditionArgument('s_readed_count', $args->s_readed_count, 'more');
${'s_readed_count18_argument'}->createConditionValue();
if(!${'s_readed_count18_argument'}->isValid()) return ${'s_readed_count18_argument'}->getErrorMessage();
} else
${'s_readed_count18_argument'} = NULL;if(${'s_readed_count18_argument'} !== null) ${'s_readed_count18_argument'}->setColumnType('number');
if(isset($args->s_voted_count)) {
${'s_voted_count19_argument'} = new ConditionArgument('s_voted_count', $args->s_voted_count, 'more');
${'s_voted_count19_argument'}->createConditionValue();
if(!${'s_voted_count19_argument'}->isValid()) return ${'s_voted_count19_argument'}->getErrorMessage();
} else
${'s_voted_count19_argument'} = NULL;if(${'s_voted_count19_argument'} !== null) ${'s_voted_count19_argument'}->setColumnType('number');
if(isset($args->s_blamed_count)) {
${'s_blamed_count20_argument'} = new ConditionArgument('s_blamed_count', $args->s_blamed_count, 'less');
${'s_blamed_count20_argument'}->createConditionValue();
if(!${'s_blamed_count20_argument'}->isValid()) return ${'s_blamed_count20_argument'}->getErrorMessage();
} else
${'s_blamed_count20_argument'} = NULL;if(${'s_blamed_count20_argument'} !== null) ${'s_blamed_count20_argument'}->setColumnType('number');
if(isset($args->s_comment_count)) {
${'s_comment_count21_argument'} = new ConditionArgument('s_comment_count', $args->s_comment_count, 'more');
${'s_comment_count21_argument'}->createConditionValue();
if(!${'s_comment_count21_argument'}->isValid()) return ${'s_comment_count21_argument'}->getErrorMessage();
} else
${'s_comment_count21_argument'} = NULL;if(${'s_comment_count21_argument'} !== null) ${'s_comment_count21_argument'}->setColumnType('number');
if(isset($args->s_trackback_count)) {
${'s_trackback_count22_argument'} = new ConditionArgument('s_trackback_count', $args->s_trackback_count, 'more');
${'s_trackback_count22_argument'}->createConditionValue();
if(!${'s_trackback_count22_argument'}->isValid()) return ${'s_trackback_count22_argument'}->getErrorMessage();
} else
${'s_trackback_count22_argument'} = NULL;if(${'s_trackback_count22_argument'} !== null) ${'s_trackback_count22_argument'}->setColumnType('number');
if(isset($args->s_uploaded_count)) {
${'s_uploaded_count23_argument'} = new ConditionArgument('s_uploaded_count', $args->s_uploaded_count, 'more');
${'s_uploaded_count23_argument'}->createConditionValue();
if(!${'s_uploaded_count23_argument'}->isValid()) return ${'s_uploaded_count23_argument'}->getErrorMessage();
} else
${'s_uploaded_count23_argument'} = NULL;if(${'s_uploaded_count23_argument'} !== null) ${'s_uploaded_count23_argument'}->setColumnType('number');
if(isset($args->s_regdate)) {
${'s_regdate24_argument'} = new ConditionArgument('s_regdate', $args->s_regdate, 'like_prefix');
${'s_regdate24_argument'}->createConditionValue();
if(!${'s_regdate24_argument'}->isValid()) return ${'s_regdate24_argument'}->getErrorMessage();
} else
${'s_regdate24_argument'} = NULL;if(${'s_regdate24_argument'} !== null) ${'s_regdate24_argument'}->setColumnType('date');
if(isset($args->s_last_update)) {
${'s_last_update25_argument'} = new ConditionArgument('s_last_update', $args->s_last_update, 'like_prefix');
${'s_last_update25_argument'}->createConditionValue();
if(!${'s_last_update25_argument'}->isValid()) return ${'s_last_update25_argument'}->getErrorMessage();
} else
${'s_last_update25_argument'} = NULL;if(${'s_last_update25_argument'} !== null) ${'s_last_update25_argument'}->setColumnType('date');
if(isset($args->s_ipaddress)) {
${'s_ipaddress26_argument'} = new ConditionArgument('s_ipaddress', $args->s_ipaddress, 'like_prefix');
${'s_ipaddress26_argument'}->createConditionValue();
if(!${'s_ipaddress26_argument'}->isValid()) return ${'s_ipaddress26_argument'}->getErrorMessage();
} else
${'s_ipaddress26_argument'} = NULL;if(${'s_ipaddress26_argument'} !== null) ${'s_ipaddress26_argument'}->setColumnType('varchar');
if(isset($args->start_date)) {
${'start_date27_argument'} = new ConditionArgument('start_date', $args->start_date, 'more');
${'start_date27_argument'}->createConditionValue();
if(!${'start_date27_argument'}->isValid()) return ${'start_date27_argument'}->getErrorMessage();
} else
${'start_date27_argument'} = NULL;if(${'start_date27_argument'} !== null) ${'start_date27_argument'}->setColumnType('date');
if(isset($args->end_date)) {
${'end_date28_argument'} = new ConditionArgument('end_date', $args->end_date, 'less');
${'end_date28_argument'}->createConditionValue();
if(!${'end_date28_argument'}->isValid()) return ${'end_date28_argument'}->getErrorMessage();
} else
${'end_date28_argument'} = NULL;if(${'end_date28_argument'} !== null) ${'end_date28_argument'}->setColumnType('date');
if(isset($args->list_order)) {
${'list_order29_argument'} = new ConditionArgument('list_order', $args->list_order, 'less');
${'list_order29_argument'}->checkFilter('number');
${'list_order29_argument'}->createConditionValue();
if(!${'list_order29_argument'}->isValid()) return ${'list_order29_argument'}->getErrorMessage();
} else
${'list_order29_argument'} = NULL;if(${'list_order29_argument'} !== null) ${'list_order29_argument'}->setColumnType('number');
if(isset($args->rev_list_order)) {
${'rev_list_order30_argument'} = new ConditionArgument('rev_list_order', $args->rev_list_order, 'more');
${'rev_list_order30_argument'}->checkFilter('number');
${'rev_list_order30_argument'}->createConditionValue();
if(!${'rev_list_order30_argument'}->isValid()) return ${'rev_list_order30_argument'}->getErrorMessage();
} else
${'rev_list_order30_argument'} = NULL;if(${'rev_list_order30_argument'} !== null) ${'rev_list_order30_argument'}->setColumnType('number');
if(isset($args->update_order)) {
${'update_order31_argument'} = new ConditionArgument('update_order', $args->update_order, 'less');
${'update_order31_argument'}->checkFilter('number');
${'update_order31_argument'}->createConditionValue();
if(!${'update_order31_argument'}->isValid()) return ${'update_order31_argument'}->getErrorMessage();
} else
${'update_order31_argument'} = NULL;if(${'update_order31_argument'} !== null) ${'update_order31_argument'}->setColumnType('number');
if(isset($args->rev_update_order)) {
${'rev_update_order32_argument'} = new ConditionArgument('rev_update_order', $args->rev_update_order, 'more');
${'rev_update_order32_argument'}->checkFilter('number');
${'rev_update_order32_argument'}->createConditionValue();
if(!${'rev_update_order32_argument'}->isValid()) return ${'rev_update_order32_argument'}->getErrorMessage();
} else
${'rev_update_order32_argument'} = NULL;if(${'rev_update_order32_argument'} !== null) ${'rev_update_order32_argument'}->setColumnType('number');
if(isset($args->rev_regdate)) {
${'rev_regdate33_argument'} = new ConditionArgument('rev_regdate', $args->rev_regdate, 'less');
${'rev_regdate33_argument'}->checkFilter('number');
${'rev_regdate33_argument'}->createConditionValue();
if(!${'rev_regdate33_argument'}->isValid()) return ${'rev_regdate33_argument'}->getErrorMessage();
} else
${'rev_regdate33_argument'} = NULL;if(${'rev_regdate33_argument'} !== null) ${'rev_regdate33_argument'}->setColumnType('date');
if(isset($args->regdate)) {
${'regdate34_argument'} = new ConditionArgument('regdate', $args->regdate, 'more');
${'regdate34_argument'}->checkFilter('number');
${'regdate34_argument'}->createConditionValue();
if(!${'regdate34_argument'}->isValid()) return ${'regdate34_argument'}->getErrorMessage();
} else
${'regdate34_argument'} = NULL;if(${'regdate34_argument'} !== null) ${'regdate34_argument'}->setColumnType('date');

$query->setColumns(array(
new SelectExpression('count(`document_srl`)', '`count`')
));
$query->setTables(array(
new Table('`xe_documents`', '`documents`')
));
$query->setConditions(array(
new ConditionGroup(array(
new ConditionWithArgument('`module_srl`',$module_srl1_argument,"in")
,new ConditionWithArgument('`module_srl`',$exclude_module_srl2_argument,"notin", 'and')
,new ConditionWithArgument('`category_srl`',$category_srl3_argument,"in", 'and')
,new ConditionWithArgument('`is_notice`',$s_is_notice4_argument,"equal", 'and')
,new ConditionWithArgument('`member_srl`',$member_srl5_argument,"equal", 'and')
,new ConditionWithArgument('`status`',$statusList6_argument,"in", 'and')))
,new ConditionGroup(array(
new ConditionWithArgument('`list_order`',$division7_argument,"more", 'and')
,new ConditionWithArgument('`list_order`',$last_division8_argument,"below", 'and')),'and')
,new ConditionGroup(array(
new ConditionWithArgument('`title`',$s_title9_argument,"like")
,new ConditionWithArgument('`content`',$s_content10_argument,"like", 'or')
,new ConditionWithArgument('`user_name`',$s_user_name11_argument,"like", 'or')
,new ConditionWithArgument('`user_id`',$s_user_id12_argument,"like", 'or')
,new ConditionWithArgument('`nick_name`',$s_nick_name13_argument,"like", 'or')
,new ConditionWithArgument('`email_address`',$s_email_addres14_argument,"like", 'or')
,new ConditionWithArgument('`homepage`',$s_homepage15_argument,"like", 'or')
,new ConditionWithArgument('`tags`',$s_tags16_argument,"like", 'or')
,new ConditionWithArgument('`member_srl`',$s_member_srl17_argument,"equal", 'or')
,new ConditionWithArgument('`readed_count`',$s_readed_count18_argument,"more", 'or')
,new ConditionWithArgument('`voted_count`',$s_voted_count19_argument,"more", 'or')
,new ConditionWithArgument('`blamed_count`',$s_blamed_count20_argument,"less", 'or')
,new ConditionWithArgument('`comment_count`',$s_comment_count21_argument,"more", 'or')
,new ConditionWithArgument('`trackback_count`',$s_trackback_count22_argument,"more", 'or')
,new ConditionWithArgument('`uploaded_count`',$s_uploaded_count23_argument,"more", 'or')
,new ConditionWithArgument('`regdate`',$s_regdate24_argument,"like_prefix", 'or')
,new ConditionWithArgument('`last_update`',$s_last_update25_argument,"like_prefix", 'or')
,new ConditionWithArgument('`ipaddress`',$s_ipaddress26_argument,"like_prefix", 'or')),'and')
,new ConditionGroup(array(
new ConditionWithArgument('`last_update`',$start_date27_argument,"more", 'and')
,new ConditionWithArgument('`last_update`',$end_date28_argument,"less", 'and')),'and')
,new ConditionGroup(array(
new ConditionWithArgument('`list_order`',$list_order29_argument,"less", 'and')
,new ConditionWithArgument('`list_order`',$rev_list_order30_argument,"more", 'and')
,new ConditionWithArgument('`update_order`',$update_order31_argument,"less", 'and')
,new ConditionWithArgument('`update_order`',$rev_update_order32_argument,"more", 'and')
,new ConditionWithArgument('`regdate`',$rev_regdate33_argument,"less", 'and')
,new ConditionWithArgument('`regdate`',$regdate34_argument,"more", 'and')),'and')
));
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>