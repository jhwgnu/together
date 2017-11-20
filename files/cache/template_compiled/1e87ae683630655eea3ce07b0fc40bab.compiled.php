<?php if(!defined("__XE__"))exit;
$__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/wiki/skins/xe_wiki','header.html') ?>
<?php if($__Context->module_info->markup_type == 'markdown'){ ?>
<script src="/modules/wiki/lib/pagedown/Markdown.Converter.js"></script>
<script>
	jQuery(function($) {
		var $textarea = $('#wikiContentContainer textarea');
		var $preview = $('#wikiDocumentPreview');
		converter = new Markdown.Converter().makeHtml;
		$textarea.keyup(function() {
            var val = $textarea.val()
                    .replace(/<\s*script.*>(.*?)<\s*\/\s*script\s*>/g, function (a, s) {
                        return s;
                    })
                    .replace(/javascript\s*:\s*(['"])(.*?)\1]/g, '');
			$preview.html(converter(val));
		}).trigger('keyup');
	});
</script>
<?php }elseif ($__Context->module_info->markup_type == 'googlecode_markup'){ ?>
<script src="/modules/wiki/lib/js/GoogleCodeWikiParser.js"></script>
<script>
    jQuery(function($) {
        setInterval(function() {
            var wikitext = editorGetContent( jQuery('form[editor_sequence]').attr('editor_sequence') );
            var g = new GoogleCodeWikiParser();
            var html = g.parse( wikitext );
            jQuery('#wikiDocumentPreview').html(html);
        }, 500);
    });
</script>
<?php }elseif ($__Context->module_info->markup_type == 'mediawiki_markup'){ ?>
<script>
//ajax:
jQuery.fn.syncPreviewWithEditor = function(options) {
    var form = (
        typeof(options) != 'undefined' && options.sequence && !isNaN(options.sequence) ?
            jQuery('form[editor_sequence=' + options.sequence + ']') :
            jQuery('form[editor_sequence]:eq(0)')
        );
    if (!form.length) return false;
    //defaults:
    var settings = jQuery.extend({
        sequence: form.attr('editor_sequence'),
        interval: 2000
    }, options);
    form = jQuery('form[editor_sequence=' + settings.sequence + ']');
    if (!form.length) return false;
    var editorContent = editorGetContent(settings.sequence);
    return this.each(function() {
        var $this = jQuery(this);
        setInterval(function(){
            var newContent = editorGetContent( settings.sequence );
            if (editorContent != newContent || ( !$this.html() && newContent)) {
                editorContent = newContent;
                var ajaxData = {act: 'procWikiTextParse', content: newContent, markup: form.data('markup')};
                jQuery.getJSON('index.php', ajaxData, function(data){
                    $this.html(data.content);
                });
            }
        }, settings.interval);
    });
}
jQuery(function($) {
    setTimeout(function(){
        jQuery('#wikiDocumentPreview').syncPreviewWithEditor();
    }, 1000);
});
</script>
<?php } ?>
<script>
	jQuery(document).ready(function($){
		$("#title").change(function(){			
			var alias = $("#title").val().replace(/[ ]/g, "_").toLowerCase();
			$("#alias").val(alias);
		});
		
		$("#wikiHelp").click(function(){ $(this).toggleClass("hide")});
		
		$("#toggleWikiHelp").click(function(){
			$("#wikiHelp").toggleClass("hide");
			return false;
		});
		
		$("#fo_write").submit(function(event){
			event.preventDefault();
			
			var url = "index.php";
			var document_srl = <?php echo $__Context->document_srl ? $__Context->document_srl : 'null' ?>;
			var latest_doc_edit = <?php echo $__Context->latest_doc_edit ? $__Context->latest_doc_edit : 'null' ?>;
			
			$.getJSON(url
					, { act: 'procWikiCheckIfDocumentWasUpdated'
						, document_srl : document_srl
						, latest_doc_edit: latest_doc_edit} 
					, function(json){
						if(json.updated)
						{
							var confirm_message = '<?php echo $__Context->lang->confirm_document_override ?>';
							if(confirm(confirm_message))
							{
								$("#fo_write").unbind('submit').submit();
							}
						}
						else 
						{
							$("#fo_write").unbind('submit').submit();
						}
					});
			
		});
	});
</script>
<?php Context::addJsFile("modules/wiki/ruleset/insert.xml", FALSE, "", 0, "body", TRUE, "") ?><form action="./" method="post"  id="fo_write" data-markup="<?php echo $__Context->module_info->markup_type ?>"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" /><input type="hidden" name="ruleset" value="insert" />
	<input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" />
	<input type="hidden" name="act" value="procWikiInsertDocument" />
	<input type="hidden" name="module" value="wiki" />
	<input type="hidden" name="section" value="<?php echo $__Context->section ?>" />
	<input type="hidden" name="section_title" value="<?php echo $__Context->section_title ?>" />
    <input type="hidden" name="success_return_url" value="<?php echo getUrl('act','dispWikiContent', 'module_srl', $__Context->module_info->module_srl) ?>" />
	<?php if($__Context->history){ ?>
	<input type="hidden" name="content" value="<?php echo htmlspecialchars($__Context->history->content) ?>" />
	<?php }else{ ?>
	<input type="hidden" name="content" value="<?php echo $__Context->oDocument->getContentText() ?>" />
	<?php } ?>
	<input type="hidden" name="document_srl" value="<?php echo $__Context->document_srl ?>" />
	<input type="hidden" name="xe_validator_id" value="modules/wiki/skins/xe_wiki" />
	<div class="wkWrite" id="wikiContentContainer">
		<div class="title">
			<label for="title"><?php echo $__Context->lang->write_form_title ?></label>
			<input type="text" name="title"  id="title" value="<?php echo htmlspecialchars($__Context->oDocument->get('title')) ?>" class="iText" />
		</div>
		<div class="alias" >
			<label for="alias"><?php echo $__Context->lang->write_form_alias ?></label>
			<?php echo getFullUrl() ?>entry/
			<input type="text" name="alias" id="alias" value="<?php echo htmlspecialchars($__Context->oDocument->get('alias')) ?>" class="iText" />
		</div>
		
		<div class="editor">
			<?php echo $__Context->oDocument->getEditor() ?>
		</div>
		
		<?php if($__Context->module_info->markup_type != 'xe_wiki_markup'){ ?>
		<a href="#" id="toggleWikiHelp"><?php echo $__Context->lang->wiki_language_help ?></a>
		<div id="wikiHelp" class="hide" title="Click to hide">
			<?php if($__Context->module_info->markup_type == 'markdown'){ ?>
				<?php echo nl2br($__Context->lang->markdown_help) ?>
			<?php }elseif($__Context->module_info->markup_type == 'googlecode_markup'){ ?>
				<?php echo nl2br($__Context->lang->googlecode_markup_help) ?>
			<?php }elseif($__Context->module_info->markup_type == 'mediawiki_markup'){ ?>
				<?php echo nl2br($__Context->lang->mediawiki_markup_help) ?>
			<?php } ?>
		</div>
		<?php } ?>
	
		<div class="wkNav">
			<input class="btn" type="submit" value="<?php echo $__Context->lang->cmd_registration ?>" />
		</div>
		
		<?php if($__Context->module_info->markup_type != 'xe_wiki_markup'){ ?>
		<div id="wikiDocumentPreview"></div>
		<?php } ?>
	
		<br /><br />
		<?php if(!$__Context->is_logged){ ?>
			<input type="text" name="nick_name" class="inputText userName" value="<?php echo $__Context->lang->writer ?>" onfocus="this.value=''" />
			<input type="password" name="password" class="inputText userPw" value="<?php echo $__Context->lang->password ?>" onfocus="this.value=''" />
			<input type="text" name="email_address" class="inputText emailAddress" value="<?php echo $__Context->lang->email_address ?>" onfocus="this.value=''" />
			<input type="text" name="homepage" class="inputText homePage" value="<?php echo $__Context->lang->homepage ?>" onfocus="this.value=''" />
		<?php } ?>
		<?php if(is_array($__Context->status_list)){ ?>
			<?php if($__Context->status_list&&count($__Context->status_list))foreach($__Context->status_list AS $__Context->key=>$__Context->value){ ?>
			<input type="radio" name="status" value="<?php echo $__Context->key ?>" id="<?php echo $__Context->key ?>" <?php if($__Context->oDocument->get('status') == $__Context->key || ($__Context->key == 'PUBLIC' && !$__Context->document_srl)){ ?>checked="checked"<?php } ?> />
			<label for="<?php echo $__Context->key ?>"><?php echo $__Context->value ?></label>
			<?php } ?>
		<?php } ?>
		<div class="wkNav">
			<input class="btn" type="submit" value="<?php echo $__Context->lang->cmd_registration ?>" />
		</div>
	</div>
</form>
<?php $__tpl=TemplateHandler::getInstance();echo $__tpl->compile('modules/wiki/skins/xe_wiki','footer.html') ?>
