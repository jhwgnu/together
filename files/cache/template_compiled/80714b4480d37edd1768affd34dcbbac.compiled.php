<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/skins/xe_official','include.header.html') ?>
<div class="form requestPackage">
    <h3><?php echo $__Context->lang->cmd_insert_package ?></h3>
    <p class="information"><?php echo $__Context->lang->about_insert_package ?></p>
    <p class="reference">(<em><img src="/modules/resource/skins/xe_official/img/bu_must.gif" alt="<?php echo $__Context->required_field ?>" /></em>) <?php echo $__Context->lang->about_required_field ?></p>
	<?php if($__Context->XE_VALIDATOR_MESSAGE && $__Context->XE_VALIDATOR_ID == 'modules/resource/skins/xe_official/insertpackage/1'){ ?><div class="message <?php echo $__Context->XE_VALIDATOR_MESSAGE_TYPE ?>">
		<p><?php echo $__Context->XE_VALIDATOR_MESSAGE ?></p>
	</div><?php } ?>
	
    <?php Context::addJsFile("modules/resource/ruleset/insertPackage.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post" ><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="ruleset" value="insertPackage" />
    <input type="hidden" name="act" value="procResourceInsertPackage" />
    <input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
    <input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
    <input type="hidden" name="package_srl" value="<?php echo $__Context->selected_package->package_srl ?>" />
    <input type="hidden" name="xe_validator_id" value="modules/resource/skins/xe_official/insertpackage/1" />
    <input type="hidden" name="success_return_url" value="<?php echo getRequestUriByServerEnviroment() ?>" />
    <fieldset>
        <legend><?php echo $__Context->lang->cmd_insert_package ?></legend>
            <table class="form">
            <tr class="first_child">
                <th scope="row"><em><?php echo $__Context->lang->package_category ?><img src="/modules/resource/skins/xe_official/img/bu_must.gif" alt="<?php echo $__Context->required_field ?>" /></em></th>
                <td>
                    <p>
                        <select name="category_srl">
                        <?php  $__Context->_curDepth = 0;  ?>
                        <?php if($__Context->categories&&count($__Context->categories))foreach($__Context->categories as $__Context->key => $__Context->val){ ?>
                            <?php if($__Context->val->depth<$__Context->_curDepth){ ?>
                            </optgroup>
                            <?php } ?>
                            <?php if($__Context->val->depth<1){ ?>
                            <?php if($__Context->val->child_count>0){ ?>
                            <optgroup label="<?php echo $__Context->val->title ?>">
                            <?php }else{ ?>
                            <option value="<?php echo $__Context->val->category_srl ?>" <?php if($__Context->category_srl == $__Context->val->category_srl){ ?>selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option>
                            <?php } ?>
                            <?php } ?>
                            <?php if($__Context->val->depth>0){ ?>
                                <option value="<?php echo $__Context->val->category_srl ?>" <?php if($__Context->category_srl == $__Context->val->category_srl){ ?>selected="selected"<?php } ?>><?php echo $__Context->val->title ?></option>
                            <?php } ?>
                            <?php  $__Context->_curDepth = $__Context->val->depth ?>
                        <?php } ?>
                        <?php for($__Context->i=0;$__Context->i<$__Context->_curDepth;$__Context->i++){ ?></optgroup><?php } ?>
                        </select>
                    </p>
                    <p class="description"><?php echo $__Context->lang->about_package_title ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row"><em><?php echo $__Context->lang->package_title ?><img src="/modules/resource/skins/xe_official/img/bu_must.gif" alt="<?php echo $__Context->required_field ?>" /></em></th>
                <td>
                    <p><input type="text" name="title" class="text_field" /></p>
                    <p class="description"><?php echo $__Context->lang->about_package_title ?></p>
                </td>
            </tr>
            <?php if($__Context->module_info->resource_use_path=='Y'){ ?>
            <tr>
                <th scope="row"><em><?php echo $__Context->lang->package_path ?><img src="/modules/resource/skins/xe_official/img/bu_must.gif" alt="<?php echo $__Context->required_field ?>" /></em></th>
                <td>
                    <p><input type="text" name="path" class="text_field" /></p>
                    <p class="description"><?php echo $__Context->lang->about_package_path ?></p>
                </td>
            </tr>
            <?php } ?>
            <tr>
                <th scope="row"><em><?php echo $__Context->lang->package_license ?><img src="/modules/resource/skins/xe_official/img/bu_must.gif" alt="<?php echo $__Context->required_field ?>" /></em></th>
                <td>
                    <p>
                        <select name="license">
                            <?php if($__Context->licenses&&count($__Context->licenses))foreach($__Context->licenses as $__Context->key => $__Context->val){ ?>
                            <option value="<?php echo $__Context->val ?>"><?php echo $__Context->val ?></option>
                            <?php } ?>
                        </select>
                    </p>
                    <p class="description"><?php echo $__Context->lang->about_package_license ?></p>
                </td>
            </tr>
            <tr>
                <th scope="row"><em><?php echo $__Context->lang->package_homepage ?><img src="/modules/resource/skins/xe_official/img/bu_must.gif" alt="<?php echo $__Context->required_field ?>" /></em></th>
                <td>
                    <p><input type="text" name="homepage" class="text_field" /></p>
                    <p class="description"><?php echo $__Context->lang->about_package_homepage ?></p>
                </td>
            </tr>
            <tr class="last_child">
                <th scope="row"><em><?php echo $__Context->lang->package_description ?><img src="/modules/resource/skins/xe_official/img/bu_must.gif" alt="<?php echo $__Context->required_field ?>" /></em></th>
                <td>
                    <p><textarea name="description" class="text_area"></textarea></p>
                    <p class="description"><?php echo $__Context->lang->about_package_description ?></p>
                </td>
            </tr>
            </table>
        </fieldset>
        <div class="btnArea">
            <a href="<?php echo $__Context->back_url ?>" class="btn" style="float:left"><?php echo $__Context->lang->cmd_back ?></a>
            <input class="btn btn-inverse" type="submit" value="<?php echo $__Context->lang->cmd_registration ?>" />
        </div>
    </form>
</div>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/resource/skins/xe_official','include.footer.html') ?>
