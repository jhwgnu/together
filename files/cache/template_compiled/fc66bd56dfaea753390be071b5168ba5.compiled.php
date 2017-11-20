<?php if(!defined("__XE__"))exit;?><!--#Meta:modules/counter/tpl/js/counter_admin.js--><?php $__tmp=array('modules/counter/tpl/js/counter_admin.js','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#Meta:modules/counter/tpl/counter.css--><?php $__tmp=array('modules/counter/tpl/counter.css','','','');Context::loadFile($__tmp);unset($__tmp); ?>
<!--#JSPLUGIN:ui.datepicker--><?php Context::loadJavascriptPlugin('ui.datepicker'); ?>
<script>
    function moveDate() {
		document.forms['calendar'].submit();
        return true;
    }
</script>
<div class="x_page-header">
	<h1><?php echo $__Context->lang->counter ?> <?php echo $__Context->lang->cmd_management ?></h1>
</div>
<form action="./index.php" method="get" name="calendar" id="fo_calendar" style="margin-bottom:30px"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
    <input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
    <input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
    <input type="hidden" name="selected_date" id="selected_date" value="<?php echo zdate($__Context->selected_date,'Ymd') ?>" />
	<table class="x_table x_table-striped x_table-hover">
		<thead>
			<tr>
				<th scope="row"><?php echo $__Context->lang->total_counter ?></th>
				<th scope="row"> 
					<span id="str_selected_date"><?php echo zdate($__Context->selected_date, "Y-m-d") ?></span>
					<input type="hidden" class="inputDate" value="<?php echo zdate($__Context->selected_date,'Y-m-d') ?>" />
					<script>
					(function($){
						$(function(){
							var option = {
								changeMonth: true
								,changeYear: true
								,gotoCurrent: false
								,dateFormat:'yy-mm-dd'
								,yearRange:'-100:+10'
								,showOn:"button"
								,buttonImage:"./modules/counter/tpl/images/buttonCalendar.gif"
								,buttonImageOnly:false
								,mandatory:true
								,onSelect:function(){
									$("#str_selected_date").html(this.value);
									$("#selected_date").val(this.value.replace(/-/g,''));
									moveDate();
								}
							};
	
							$.extend(option,$.datepicker.regional['<?php echo $__Context->lang_type ?>']);
							$(".inputDate").datepicker(option);
						});
					})(jQuery);
					</script>
					<style scoped>
						.ui-datepicker-trigger{cursor:pointer;border:0;background:none;padding:0}
					</style>
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Visitor <strong><?php echo number_format($__Context->total_counter->unique_visitor) ?></strong> &nbsp;/&nbsp; Pageview : <strong><?php echo number_format($__Context->total_counter->pageview) ?></strong></td>
				<td>Visitor : <strong><?php echo number_format($__Context->selected_day_counter->unique_visitor) ?></strong> &nbsp;/&nbsp; Pageview : <strong><?php echo number_format($__Context->selected_day_counter->pageview) ?></strong></td>
			</tr>
		</tbody>
	</table>
</form>
<ul class="x_nav x_nav-tabs">
	<?php if($__Context->lang->cmd_select_counter_type&&count($__Context->lang->cmd_select_counter_type))foreach($__Context->lang->cmd_select_counter_type as $__Context->key=>$__Context->val){ ?><li<?php if($__Context->type==$__Context->key || (!$__Context->type && $__Context->key == 'hour')){ ?> class="x_active"<?php } ?>>
		<a href="<?php echo getUrl('type',$__Context->key) ?>"><?php echo $__Context->val ?></a> 
	</li><?php } ?>
</ul>
<!-- 일자를 옮기는 form -->
<form action="./" method="get" id="fo_counter"><input type="hidden" name="error_return_url" value="<?php echo htmlspecialchars(getRequestUriByServerEnviroment(), ENT_COMPAT | ENT_HTML401, 'UTF-8', false) ?>" /><input type="hidden" name="mid" value="<?php echo $__Context->mid ?>" /><input type="hidden" name="vid" value="<?php echo $__Context->vid ?>" />
	<input type="hidden" name="module" value="<?php echo $__Context->module ?>" />
	<input type="hidden" name="act" value="<?php echo $__Context->act ?>" />
	<input type="hidden" name="selected_date" value="<?php echo $__Context->selected_date ?>" />
</form>
<!-- unique visitor 그래프 -->
<table class="x_table x_table-striped x_table-hover">
	<?php if($__Context->detail_status->list&&count($__Context->detail_status->list))foreach($__Context->detail_status->list as $__Context->key => $__Context->val){ ?>
		<?php if($__Context->detail_status->sum>0){ ?>
			<?php $__Context->percent   = sprintf("%0.2f", $__Context->val / $__Context->detail_status->sum * 100 ) ?>
			<?php $__Context->img_width = sprintf("%d", $__Context->val / $__Context->detail_status->max * 100 ) ?>
		<?php }else{ ?>
			<?php $__Context->percent = 0 ?>
			<?php $__Context->img_width = 1 ?>
		<?php } ?>
	<tr>
		<?php if(Context::getLangType()=='en'){ ?><th scope="row"> 
			<?php if($__Context->type == 'year'){ ?>
				<?php echo $__Context->key ?>
			<?php }elseif($__Context->type == 'month'){ ?>
				<?php echo $__Context->key ?>
			<?php }elseif($__Context->type == 'day'){ ?>
				<?php echo $__Context->key ?> <?php echo $__Context->lang->unit_day ?>
			<?php }else{ ?>
				<?php echo $__Context->key ?>
			<?php } ?>
		</th><?php } ?>
		<?php if(Context::getLangType()!='en'){ ?><th scope="row"> 
			<?php if($__Context->type == 'year'){ ?>
				<?php echo $__Context->key ?> <?php echo $__Context->lang->unit_year ?>
			<?php }elseif($__Context->type == 'month'){ ?>
				<?php echo $__Context->key ?> <?php echo $__Context->lang->unit_month ?>
			<?php }elseif($__Context->type == 'day'){ ?>
				<?php echo $__Context->key ?> <?php echo $__Context->lang->unit_day ?>
			<?php }else{ ?>
				<?php echo $__Context->key ?> <?php echo $__Context->lang->unit_hour ?>
			<?php } ?>
		</th><?php } ?>
		<?php  $__Context->img_width = (int)$__Context->percent; $__Context->img_width = $__Context->img_width?$__Context->img_width.'%':'3px';  ?>
		<td>
			<div class="barContainer">
				<span class="graphHr" style="width:<?php echo $__Context->img_width ?>">
					<span><?php echo number_format($__Context->val) ?>(<?php echo $__Context->percent ?>%)</span>
				</span>
			</div>
		</td>
	</tr>
	<?php } ?>
</table>
