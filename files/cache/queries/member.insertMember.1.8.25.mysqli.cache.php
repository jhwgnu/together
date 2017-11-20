<?php if(!defined('__XE__')) exit();
$query = new Query();
$query->setQueryId("insertMember");
$query->setAction("insert");
$query->setPriority("");

${'member_srl69_argument'} = new Argument('member_srl', $args->{'member_srl'});
${'member_srl69_argument'}->checkFilter('number');
${'member_srl69_argument'}->checkNotNull();
if(!${'member_srl69_argument'}->isValid()) return ${'member_srl69_argument'}->getErrorMessage();
if(${'member_srl69_argument'} !== null) ${'member_srl69_argument'}->setColumnType('number');

${'user_id70_argument'} = new Argument('user_id', $args->{'user_id'});
${'user_id70_argument'}->checkFilter('userid');
${'user_id70_argument'}->checkNotNull();
if(!${'user_id70_argument'}->isValid()) return ${'user_id70_argument'}->getErrorMessage();
if(${'user_id70_argument'} !== null) ${'user_id70_argument'}->setColumnType('varchar');

${'email_address71_argument'} = new Argument('email_address', $args->{'email_address'});
${'email_address71_argument'}->checkFilter('email');
${'email_address71_argument'}->checkNotNull();
if(!${'email_address71_argument'}->isValid()) return ${'email_address71_argument'}->getErrorMessage();
if(${'email_address71_argument'} !== null) ${'email_address71_argument'}->setColumnType('varchar');

${'password72_argument'} = new Argument('password', $args->{'password'});
${'password72_argument'}->checkNotNull();
if(!${'password72_argument'}->isValid()) return ${'password72_argument'}->getErrorMessage();
if(${'password72_argument'} !== null) ${'password72_argument'}->setColumnType('varchar');

${'email_id73_argument'} = new Argument('email_id', $args->{'email_id'});
${'email_id73_argument'}->checkNotNull();
if(!${'email_id73_argument'}->isValid()) return ${'email_id73_argument'}->getErrorMessage();
if(${'email_id73_argument'} !== null) ${'email_id73_argument'}->setColumnType('varchar');

${'email_host74_argument'} = new Argument('email_host', $args->{'email_host'});
${'email_host74_argument'}->checkNotNull();
if(!${'email_host74_argument'}->isValid()) return ${'email_host74_argument'}->getErrorMessage();
if(${'email_host74_argument'} !== null) ${'email_host74_argument'}->setColumnType('varchar');

${'user_name75_argument'} = new Argument('user_name', $args->{'user_name'});
${'user_name75_argument'}->checkNotNull();
if(!${'user_name75_argument'}->isValid()) return ${'user_name75_argument'}->getErrorMessage();
if(${'user_name75_argument'} !== null) ${'user_name75_argument'}->setColumnType('varchar');

${'nick_name76_argument'} = new Argument('nick_name', $args->{'nick_name'});
${'nick_name76_argument'}->checkNotNull();
if(!${'nick_name76_argument'}->isValid()) return ${'nick_name76_argument'}->getErrorMessage();
if(${'nick_name76_argument'} !== null) ${'nick_name76_argument'}->setColumnType('varchar');
if(isset($args->find_account_question)) {
${'find_account_question77_argument'} = new Argument('find_account_question', $args->{'find_account_question'});
if(!${'find_account_question77_argument'}->isValid()) return ${'find_account_question77_argument'}->getErrorMessage();
} else
${'find_account_question77_argument'} = NULL;if(${'find_account_question77_argument'} !== null) ${'find_account_question77_argument'}->setColumnType('number');
if(isset($args->find_account_answer)) {
${'find_account_answer78_argument'} = new Argument('find_account_answer', $args->{'find_account_answer'});
if(!${'find_account_answer78_argument'}->isValid()) return ${'find_account_answer78_argument'}->getErrorMessage();
} else
${'find_account_answer78_argument'} = NULL;if(${'find_account_answer78_argument'} !== null) ${'find_account_answer78_argument'}->setColumnType('varchar');
if(isset($args->homepage)) {
${'homepage79_argument'} = new Argument('homepage', $args->{'homepage'});
if(!${'homepage79_argument'}->isValid()) return ${'homepage79_argument'}->getErrorMessage();
} else
${'homepage79_argument'} = NULL;if(${'homepage79_argument'} !== null) ${'homepage79_argument'}->setColumnType('varchar');
if(isset($args->blog)) {
${'blog80_argument'} = new Argument('blog', $args->{'blog'});
if(!${'blog80_argument'}->isValid()) return ${'blog80_argument'}->getErrorMessage();
} else
${'blog80_argument'} = NULL;if(${'blog80_argument'} !== null) ${'blog80_argument'}->setColumnType('varchar');
if(isset($args->birthday)) {
${'birthday81_argument'} = new Argument('birthday', $args->{'birthday'});
if(!${'birthday81_argument'}->isValid()) return ${'birthday81_argument'}->getErrorMessage();
} else
${'birthday81_argument'} = NULL;if(${'birthday81_argument'} !== null) ${'birthday81_argument'}->setColumnType('char');

${'allow_mailing82_argument'} = new Argument('allow_mailing', $args->{'allow_mailing'});
${'allow_mailing82_argument'}->ensureDefaultValue('Y');
if(!${'allow_mailing82_argument'}->isValid()) return ${'allow_mailing82_argument'}->getErrorMessage();
if(${'allow_mailing82_argument'} !== null) ${'allow_mailing82_argument'}->setColumnType('char');

${'allow_message83_argument'} = new Argument('allow_message', $args->{'allow_message'});
${'allow_message83_argument'}->ensureDefaultValue('Y');
if(!${'allow_message83_argument'}->isValid()) return ${'allow_message83_argument'}->getErrorMessage();
if(${'allow_message83_argument'} !== null) ${'allow_message83_argument'}->setColumnType('char');

${'denied84_argument'} = new Argument('denied', $args->{'denied'});
${'denied84_argument'}->ensureDefaultValue('N');
if(!${'denied84_argument'}->isValid()) return ${'denied84_argument'}->getErrorMessage();
if(${'denied84_argument'} !== null) ${'denied84_argument'}->setColumnType('char');
if(isset($args->limit_date)) {
${'limit_date85_argument'} = new Argument('limit_date', $args->{'limit_date'});
if(!${'limit_date85_argument'}->isValid()) return ${'limit_date85_argument'}->getErrorMessage();
} else
${'limit_date85_argument'} = NULL;if(${'limit_date85_argument'} !== null) ${'limit_date85_argument'}->setColumnType('date');

${'regdate86_argument'} = new Argument('regdate', $args->{'regdate'});
${'regdate86_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'regdate86_argument'}->isValid()) return ${'regdate86_argument'}->getErrorMessage();
if(${'regdate86_argument'} !== null) ${'regdate86_argument'}->setColumnType('date');

${'change_password_date87_argument'} = new Argument('change_password_date', $args->{'change_password_date'});
${'change_password_date87_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'change_password_date87_argument'}->isValid()) return ${'change_password_date87_argument'}->getErrorMessage();
if(${'change_password_date87_argument'} !== null) ${'change_password_date87_argument'}->setColumnType('date');

${'last_login88_argument'} = new Argument('last_login', $args->{'last_login'});
${'last_login88_argument'}->ensureDefaultValue(date("YmdHis"));
if(!${'last_login88_argument'}->isValid()) return ${'last_login88_argument'}->getErrorMessage();
if(${'last_login88_argument'} !== null) ${'last_login88_argument'}->setColumnType('date');

${'is_admin89_argument'} = new Argument('is_admin', $args->{'is_admin'});
${'is_admin89_argument'}->ensureDefaultValue('N');
if(!${'is_admin89_argument'}->isValid()) return ${'is_admin89_argument'}->getErrorMessage();
if(${'is_admin89_argument'} !== null) ${'is_admin89_argument'}->setColumnType('char');
if(isset($args->description)) {
${'description90_argument'} = new Argument('description', $args->{'description'});
if(!${'description90_argument'}->isValid()) return ${'description90_argument'}->getErrorMessage();
} else
${'description90_argument'} = NULL;if(${'description90_argument'} !== null) ${'description90_argument'}->setColumnType('text');
if(isset($args->extra_vars)) {
${'extra_vars91_argument'} = new Argument('extra_vars', $args->{'extra_vars'});
if(!${'extra_vars91_argument'}->isValid()) return ${'extra_vars91_argument'}->getErrorMessage();
} else
${'extra_vars91_argument'} = NULL;if(${'extra_vars91_argument'} !== null) ${'extra_vars91_argument'}->setColumnType('text');
if(isset($args->list_order)) {
${'list_order92_argument'} = new Argument('list_order', $args->{'list_order'});
if(!${'list_order92_argument'}->isValid()) return ${'list_order92_argument'}->getErrorMessage();
} else
${'list_order92_argument'} = NULL;if(${'list_order92_argument'} !== null) ${'list_order92_argument'}->setColumnType('number');

$query->setColumns(array(
new InsertExpression('`member_srl`', ${'member_srl69_argument'})
,new InsertExpression('`user_id`', ${'user_id70_argument'})
,new InsertExpression('`email_address`', ${'email_address71_argument'})
,new InsertExpression('`password`', ${'password72_argument'})
,new InsertExpression('`email_id`', ${'email_id73_argument'})
,new InsertExpression('`email_host`', ${'email_host74_argument'})
,new InsertExpression('`user_name`', ${'user_name75_argument'})
,new InsertExpression('`nick_name`', ${'nick_name76_argument'})
,new InsertExpression('`find_account_question`', ${'find_account_question77_argument'})
,new InsertExpression('`find_account_answer`', ${'find_account_answer78_argument'})
,new InsertExpression('`homepage`', ${'homepage79_argument'})
,new InsertExpression('`blog`', ${'blog80_argument'})
,new InsertExpression('`birthday`', ${'birthday81_argument'})
,new InsertExpression('`allow_mailing`', ${'allow_mailing82_argument'})
,new InsertExpression('`allow_message`', ${'allow_message83_argument'})
,new InsertExpression('`denied`', ${'denied84_argument'})
,new InsertExpression('`limit_date`', ${'limit_date85_argument'})
,new InsertExpression('`regdate`', ${'regdate86_argument'})
,new InsertExpression('`change_password_date`', ${'change_password_date87_argument'})
,new InsertExpression('`last_login`', ${'last_login88_argument'})
,new InsertExpression('`is_admin`', ${'is_admin89_argument'})
,new InsertExpression('`description`', ${'description90_argument'})
,new InsertExpression('`extra_vars`', ${'extra_vars91_argument'})
,new InsertExpression('`list_order`', ${'list_order92_argument'})
));
$query->setTables(array(
new Table('`xe_member`', '`member`')
));
$query->setConditions(array());
$query->setGroups(array());
$query->setOrder(array());
$query->setLimit();
return $query; ?>