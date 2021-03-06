<?php if(!defined("__XE__")) exit();
$info = new stdClass;
$info->default_index_act = 'dispResourceIndex';
$info->setup_index_act='dispResourceAdminInsert';
$info->simple_setup_index_act='';
$info->admin_index_act = 'dispResourceAdminList';
$info->grant = new stdClass;
$info->grant->request = new stdClass;
$info->grant->request->title='신청';
$info->grant->request->default='member';
$info->grant->write_comment = new stdClass;
$info->grant->write_comment->title='평가';
$info->grant->write_comment->default='member';
$info->permission = new stdClass;
$info->permission->dispResourceInsertPackage = 'member';
$info->permission->dispResourceModifyPackage = 'member';
$info->permission->dispResourceDeletePackage = 'member';
$info->permission->dispResourcePackage = 'member';
$info->permission->dispResourcePackageList = 'member';
$info->permission->dispResourceAttach = 'member';
$info->permission->dispResourceModifyAttach = 'member';
$info->permission->dispResourceManage = 'manager';
$info->permission->dispResourceSearchDependency = 'member';
$info->permission->procResourceRequestPackage = 'member';
$info->permission->procResourceInsertPackage = 'member';
$info->permission->procResourceDeletePackage = 'member';
$info->permission->procResourceAttach = 'member';
$info->permission->procResourceModifyAttach = 'member';
$info->permission->procResourceAttachFile = 'member';
$info->permission->procResourceModifyAttachFile = 'member';
$info->permission->procResourceDeleteAttach = 'member';
$info->permission->procResourceInsertComment = 'member';
$info->permission->procResourceDeleteComment = 'member';
$info->permission->procResourceChangeStatus = 'manager';
$info->permission->procResourceDeleteItem = 'manager';
$info->action = new stdClass;
$info->action->dispResourceIndex = new stdClass;
$info->action->dispResourceIndex->type='view';
$info->action->dispResourceIndex->grant='guest';
$info->action->dispResourceIndex->standalone='true';
$info->action->dispResourceIndex->ruleset='';
$info->action->dispResourceIndex->method='';
$info->action->dispResourceIndex->check_csrf='true';
$info->action->dispResourceInsertPackage = new stdClass;
$info->action->dispResourceInsertPackage->type='view';
$info->action->dispResourceInsertPackage->grant='guest';
$info->action->dispResourceInsertPackage->standalone='true';
$info->action->dispResourceInsertPackage->ruleset='';
$info->action->dispResourceInsertPackage->method='';
$info->action->dispResourceInsertPackage->check_csrf='true';
$info->action->dispResourceModifyPackage = new stdClass;
$info->action->dispResourceModifyPackage->type='view';
$info->action->dispResourceModifyPackage->grant='guest';
$info->action->dispResourceModifyPackage->standalone='true';
$info->action->dispResourceModifyPackage->ruleset='';
$info->action->dispResourceModifyPackage->method='';
$info->action->dispResourceModifyPackage->check_csrf='true';
$info->action->dispResourceDeletePackage = new stdClass;
$info->action->dispResourceDeletePackage->type='view';
$info->action->dispResourceDeletePackage->grant='guest';
$info->action->dispResourceDeletePackage->standalone='true';
$info->action->dispResourceDeletePackage->ruleset='';
$info->action->dispResourceDeletePackage->method='';
$info->action->dispResourceDeletePackage->check_csrf='true';
$info->action->dispResourceAttach = new stdClass;
$info->action->dispResourceAttach->type='view';
$info->action->dispResourceAttach->grant='guest';
$info->action->dispResourceAttach->standalone='true';
$info->action->dispResourceAttach->ruleset='';
$info->action->dispResourceAttach->method='';
$info->action->dispResourceAttach->check_csrf='true';
$info->action->dispResourceModifyAttach = new stdClass;
$info->action->dispResourceModifyAttach->type='view';
$info->action->dispResourceModifyAttach->grant='guest';
$info->action->dispResourceModifyAttach->standalone='true';
$info->action->dispResourceModifyAttach->ruleset='';
$info->action->dispResourceModifyAttach->method='';
$info->action->dispResourceModifyAttach->check_csrf='true';
$info->action->dispResourcePackage = new stdClass;
$info->action->dispResourcePackage->type='view';
$info->action->dispResourcePackage->grant='guest';
$info->action->dispResourcePackage->standalone='true';
$info->action->dispResourcePackage->ruleset='';
$info->action->dispResourcePackage->method='';
$info->action->dispResourcePackage->check_csrf='true';
$info->action->dispResourcePackageList = new stdClass;
$info->action->dispResourcePackageList->type='view';
$info->action->dispResourcePackageList->grant='guest';
$info->action->dispResourcePackageList->standalone='true';
$info->action->dispResourcePackageList->ruleset='';
$info->action->dispResourcePackageList->method='';
$info->action->dispResourcePackageList->check_csrf='true';
$info->action->dispResourceManage = new stdClass;
$info->action->dispResourceManage->type='view';
$info->action->dispResourceManage->grant='guest';
$info->action->dispResourceManage->standalone='true';
$info->action->dispResourceManage->ruleset='';
$info->action->dispResourceManage->method='';
$info->action->dispResourceManage->check_csrf='true';
$info->action->dispResourceSearchDependency = new stdClass;
$info->action->dispResourceSearchDependency->type='view';
$info->action->dispResourceSearchDependency->grant='guest';
$info->action->dispResourceSearchDependency->standalone='true';
$info->action->dispResourceSearchDependency->ruleset='';
$info->action->dispResourceSearchDependency->method='';
$info->action->dispResourceSearchDependency->check_csrf='true';
$info->action->procResourceInsertPackage = new stdClass;
$info->action->procResourceInsertPackage->type='controller';
$info->action->procResourceInsertPackage->grant='guest';
$info->action->procResourceInsertPackage->standalone='true';
$info->action->procResourceInsertPackage->ruleset='insertPackage';
$info->action->procResourceInsertPackage->method='';
$info->action->procResourceInsertPackage->check_csrf='true';
$info->action->procResourceModifyPackage = new stdClass;
$info->action->procResourceModifyPackage->type='controller';
$info->action->procResourceModifyPackage->grant='guest';
$info->action->procResourceModifyPackage->standalone='true';
$info->action->procResourceModifyPackage->ruleset='modifyPackage';
$info->action->procResourceModifyPackage->method='';
$info->action->procResourceModifyPackage->check_csrf='true';
$info->action->procResourceDeletePackage = new stdClass;
$info->action->procResourceDeletePackage->type='controller';
$info->action->procResourceDeletePackage->grant='guest';
$info->action->procResourceDeletePackage->standalone='true';
$info->action->procResourceDeletePackage->ruleset='deletePackage';
$info->action->procResourceDeletePackage->method='';
$info->action->procResourceDeletePackage->check_csrf='true';
$info->action->procResourceAttachOneTime = new stdClass;
$info->action->procResourceAttachOneTime->type='controller';
$info->action->procResourceAttachOneTime->grant='guest';
$info->action->procResourceAttachOneTime->standalone='true';
$info->action->procResourceAttachOneTime->ruleset='attachOneTime';
$info->action->procResourceAttachOneTime->method='';
$info->action->procResourceAttachOneTime->check_csrf='true';
$info->action->procResourceModifyAttachOneTime = new stdClass;
$info->action->procResourceModifyAttachOneTime->type='controller';
$info->action->procResourceModifyAttachOneTime->grant='guest';
$info->action->procResourceModifyAttachOneTime->standalone='true';
$info->action->procResourceModifyAttachOneTime->ruleset='modifyAttachOneTime';
$info->action->procResourceModifyAttachOneTime->method='';
$info->action->procResourceModifyAttachOneTime->check_csrf='true';
$info->action->procResourceAttach = new stdClass;
$info->action->procResourceAttach->type='controller';
$info->action->procResourceAttach->grant='guest';
$info->action->procResourceAttach->standalone='true';
$info->action->procResourceAttach->ruleset='attach';
$info->action->procResourceAttach->method='';
$info->action->procResourceAttach->check_csrf='true';
$info->action->procResourceModifyAttach = new stdClass;
$info->action->procResourceModifyAttach->type='controller';
$info->action->procResourceModifyAttach->grant='guest';
$info->action->procResourceModifyAttach->standalone='true';
$info->action->procResourceModifyAttach->ruleset='modifyAttach';
$info->action->procResourceModifyAttach->method='';
$info->action->procResourceModifyAttach->check_csrf='true';
$info->action->procResourceAttachFile = new stdClass;
$info->action->procResourceAttachFile->type='controller';
$info->action->procResourceAttachFile->grant='guest';
$info->action->procResourceAttachFile->standalone='true';
$info->action->procResourceAttachFile->ruleset='attachFile';
$info->action->procResourceAttachFile->method='';
$info->action->procResourceAttachFile->check_csrf='true';
$info->action->procResourceModifyAttachFile = new stdClass;
$info->action->procResourceModifyAttachFile->type='controller';
$info->action->procResourceModifyAttachFile->grant='guest';
$info->action->procResourceModifyAttachFile->standalone='true';
$info->action->procResourceModifyAttachFile->ruleset='modifyAttachFile';
$info->action->procResourceModifyAttachFile->method='';
$info->action->procResourceModifyAttachFile->check_csrf='true';
$info->action->procResourceDeleteAttach = new stdClass;
$info->action->procResourceDeleteAttach->type='controller';
$info->action->procResourceDeleteAttach->grant='guest';
$info->action->procResourceDeleteAttach->standalone='true';
$info->action->procResourceDeleteAttach->ruleset='deleteAttach';
$info->action->procResourceDeleteAttach->method='';
$info->action->procResourceDeleteAttach->check_csrf='true';
$info->action->procResourceInsertComment = new stdClass;
$info->action->procResourceInsertComment->type='controller';
$info->action->procResourceInsertComment->grant='guest';
$info->action->procResourceInsertComment->standalone='true';
$info->action->procResourceInsertComment->ruleset='insertComment';
$info->action->procResourceInsertComment->method='';
$info->action->procResourceInsertComment->check_csrf='true';
$info->action->procResourceDeleteComment = new stdClass;
$info->action->procResourceDeleteComment->type='controller';
$info->action->procResourceDeleteComment->grant='guest';
$info->action->procResourceDeleteComment->standalone='true';
$info->action->procResourceDeleteComment->ruleset='deleteComment';
$info->action->procResourceDeleteComment->method='';
$info->action->procResourceDeleteComment->check_csrf='true';
$info->action->procResourceChangeStatus = new stdClass;
$info->action->procResourceChangeStatus->type='controller';
$info->action->procResourceChangeStatus->grant='guest';
$info->action->procResourceChangeStatus->standalone='true';
$info->action->procResourceChangeStatus->ruleset='changeStatus';
$info->action->procResourceChangeStatus->method='';
$info->action->procResourceChangeStatus->check_csrf='true';
$info->action->dispResourceAdminList = new stdClass;
$info->action->dispResourceAdminList->type='view';
$info->action->dispResourceAdminList->grant='guest';
$info->action->dispResourceAdminList->standalone='true';
$info->action->dispResourceAdminList->ruleset='';
$info->action->dispResourceAdminList->method='';
$info->action->dispResourceAdminList->check_csrf='true';
$info->action->dispResourceAdminInsert = new stdClass;
$info->action->dispResourceAdminInsert->type='view';
$info->action->dispResourceAdminInsert->grant='guest';
$info->action->dispResourceAdminInsert->standalone='true';
$info->action->dispResourceAdminInsert->ruleset='';
$info->action->dispResourceAdminInsert->method='';
$info->action->dispResourceAdminInsert->check_csrf='true';
$info->action->dispResourceAdminCategory = new stdClass;
$info->action->dispResourceAdminCategory->type='view';
$info->action->dispResourceAdminCategory->grant='guest';
$info->action->dispResourceAdminCategory->standalone='true';
$info->action->dispResourceAdminCategory->ruleset='';
$info->action->dispResourceAdminCategory->method='';
$info->action->dispResourceAdminCategory->check_csrf='true';
$info->action->dispResourceAdminGrant = new stdClass;
$info->action->dispResourceAdminGrant->type='view';
$info->action->dispResourceAdminGrant->grant='guest';
$info->action->dispResourceAdminGrant->standalone='true';
$info->action->dispResourceAdminGrant->ruleset='';
$info->action->dispResourceAdminGrant->method='';
$info->action->dispResourceAdminGrant->check_csrf='true';
$info->action->dispResourceAdminAdditions = new stdClass;
$info->action->dispResourceAdminAdditions->type='view';
$info->action->dispResourceAdminAdditions->grant='guest';
$info->action->dispResourceAdminAdditions->standalone='true';
$info->action->dispResourceAdminAdditions->ruleset='';
$info->action->dispResourceAdminAdditions->method='';
$info->action->dispResourceAdminAdditions->check_csrf='true';
$info->action->dispResourceAdminSkin = new stdClass;
$info->action->dispResourceAdminSkin->type='view';
$info->action->dispResourceAdminSkin->grant='guest';
$info->action->dispResourceAdminSkin->standalone='true';
$info->action->dispResourceAdminSkin->ruleset='';
$info->action->dispResourceAdminSkin->method='';
$info->action->dispResourceAdminSkin->check_csrf='true';
$info->action->dispResourceAdminMobileSkin = new stdClass;
$info->action->dispResourceAdminMobileSkin->type='view';
$info->action->dispResourceAdminMobileSkin->grant='guest';
$info->action->dispResourceAdminMobileSkin->standalone='true';
$info->action->dispResourceAdminMobileSkin->ruleset='';
$info->action->dispResourceAdminMobileSkin->method='';
$info->action->dispResourceAdminMobileSkin->check_csrf='true';
$info->action->dispResourceAdminDelete = new stdClass;
$info->action->dispResourceAdminDelete->type='view';
$info->action->dispResourceAdminDelete->grant='guest';
$info->action->dispResourceAdminDelete->standalone='true';
$info->action->dispResourceAdminDelete->ruleset='';
$info->action->dispResourceAdminDelete->method='';
$info->action->dispResourceAdminDelete->check_csrf='true';
$info->action->procResourceAdminInsert = new stdClass;
$info->action->procResourceAdminInsert->type='controller';
$info->action->procResourceAdminInsert->grant='guest';
$info->action->procResourceAdminInsert->standalone='true';
$info->action->procResourceAdminInsert->ruleset='';
$info->action->procResourceAdminInsert->method='';
$info->action->procResourceAdminInsert->check_csrf='true';
$info->action->procResourceAdminDelete = new stdClass;
$info->action->procResourceAdminDelete->type='controller';
$info->action->procResourceAdminDelete->grant='guest';
$info->action->procResourceAdminDelete->standalone='true';
$info->action->procResourceAdminDelete->ruleset='';
$info->action->procResourceAdminDelete->method='';
$info->action->procResourceAdminDelete->check_csrf='true';
$info->action->procResourceAdminDeletePackage = new stdClass;
$info->action->procResourceAdminDeletePackage->type='controller';
$info->action->procResourceAdminDeletePackage->grant='guest';
$info->action->procResourceAdminDeletePackage->standalone='true';
$info->action->procResourceAdminDeletePackage->ruleset='deletePackage';
$info->action->procResourceAdminDeletePackage->method='';
$info->action->procResourceAdminDeletePackage->check_csrf='true';
$info->action->getResourceItems = new stdClass;
$info->action->getResourceItems->type='api';
$info->action->getResourceItems->grant='guest';
$info->action->getResourceItems->standalone='true';
$info->action->getResourceItems->ruleset='';
$info->action->getResourceItems->method='';
$info->action->getResourceItems->check_csrf='true';
$info->action->dispResourceCategory = new stdClass;
$info->action->dispResourceCategory->type='mobile';
$info->action->dispResourceCategory->grant='guest';
$info->action->dispResourceCategory->standalone='true';
$info->action->dispResourceCategory->ruleset='';
$info->action->dispResourceCategory->method='';
$info->action->dispResourceCategory->check_csrf='true';
return $info;