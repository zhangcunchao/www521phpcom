<?php
/*
Plugin Name: WP Cleaner
Plugin URI: http://www.jiangmiao.org/blog/c/wpcleaner
Description: 删除不需要的文章，节省空间，提高速度。delete posts which don't need any more,keep database clean and fast.
Author:  JiangMiao
Version: 1.1.5
Author URI: http://www.jiangmiao.org/blog
 */

add_action('admin_menu', 'revisionCleanerMenu');

function revisionCleanerMenu() {
	add_options_page('WPCleaner Options', 'WP Cleaner', 'manage_options', __FILE__, 'revisionCleanerOptions');
}

function revisionCleanerDo($type,$status,$name) {
	global $wpdb;
	if($status=='publish')
	{
		return __("Fatal: Script is trying delete publish post, operation abandon... :(","wpcleaner");
	}
	$where='';
	if($type=='all'&&$status=='all')
	{
		$where = " and (post_type='".$wpdb->escape('revision')."' or post_status='".$wpdb->escape('draft')."' or post_status='".$wpdb->escape('auto-draft')."')";
	}
	else
	{
		if($type!='revision' and $status!='draft' and $status!='auto-draft' and $status!='trash')
		{
			return __("Fatal: The plugin can only change revision or draft. :(", "wpcleaner");
		}

		if($type!='')
		{
			$where .= " and post_type='".$wpdb->escape($type)."'";
		}
		if($status!='')
		{
			$where .= " and post_status='".$wpdb->escape($status)."'";
		}
	}
	$sqlcmd=<<<EOT
delete from $wpdb->posts where 1 {$where}
EOT;
	$wpdb->query($sqlcmd);
	$wpdb->query("delete from {$wpdb->term_relationships} WHERE term_taxonomy_id=1 and object_id not in (select id from wp_posts)");
	return sprintf(__("Success %s", "wpcleaner"),$name);
}

function revisionCleanerOptions() {
	global $wpdb;
	global $_POST;
  load_plugin_textdomain('wpcleaner',null,basename(dirname(__FILE__)));
?>
<script type="text/javascript">
function revisionCleanerDo(type,status,ob)
{
  if(!confirm("<?php echo __("Are you sure", "wpcleaner") ?> \""+ob.value+"\"?"))
		return;
	ob.form.wpc_post_type.value=type;
	ob.form.wpc_post_status.value=status;
	ob.form.wpc_post_name.value=ob.value;
	ob.form.submit();
	return;
}
</script>
<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div>
<h2>WP Cleaner</h2>
<?php
	if(isset($_POST['wpc_action']))
	{
		$rt=revisionCleanerDo(trim($_POST['wpc_post_type']).'',trim($_POST['wpc_post_status']).'',trim($_POST['wpc_post_name']).'');
		echo <<<EOT
<div id="message" class="updated fade"><p>{$rt}</p></div>
EOT;
	}
	$result=$wpdb->get_results("select post_type,post_status,count(*) as c from $wpdb->posts group by post_type,post_status order by post_status,post_type");
  echo "<form method=\"post\" action=\"{$_SERVER['REQUEST_URI']}\">";
?>
  <h3><?php echo __("Tips","wpcleaner")?></h3><p>
<?php echo __("This operation will be delete useless revision and cannot be rollback, please <b>backup</b> before using it, Thank you :), The plugin has protect mechanism, so it cannot effect any published post ever. be free in using it.", "wpcleaner");?>
</p>
  <h3><?php echo __("Posts Stats","wpcleaner");?></h3>
<form>
<table class="form-table" style="width:auto">
<tr><th style="width:6em"><?php echo __("Posts Type","wpcleaner");?></th><th style="width:6em"><?php echo __("Posts Status","wpcleaner");?></th><th style="width:6em"><?php echo __("Posts count","wpcleaner")?></th></tr>
<?php

	foreach($result as $row)
	{
		$style="";
		$disabled=false;
		if($row->post_status!="draft"&&$row->post_type!='revision' && $row->post_status!="auto-draft" && $row->post_status!="trash")
		{
			$disabled=true;
		}
		if($disabled)
		{
			$style='style="color:#ccc"';
		}
		$postType= __($row->post_type,'wpcleaner');
		$postStatus= __($row->post_status,'wpcleaner');
		if(!$postType)$postType=$row->post_type;
		if(!$postStatus)$postStatus=$row->post_status;
		echo <<<EOT
		<tr $style><td>{$postType}</td><td>{$postStatus}</td><td>{$row->c}</td>
EOT;
		if(!$disabled)
		{
?>
<td>
<input class="button-primary" type="button" value="<?php echo __("Delete All", "wpcleaner")." {$postType}-{$postStatus}({$row->c})";?>" style="font-size:12px !important;font-weight:normal" onclick="revisionCleanerDo('<?php echo $row->post_type?>','<?php echo $row->post_status?>',this)"/>
</td>
<?php
		}
	}

	echo <<<EOT
</table>
<div>
EOT;
	$sqlcmd="select count(*) as c from {$wpdb->term_relationships} WHERE term_taxonomy_id=1 and object_id not in (select id from {$wpdb->posts})";
	$row=$wpdb->get_row($sqlcmd);
	$count=$row->c;
	if($count>0)
	{
		$count="<span style=\"color:red\">{$count}</span>";
	}
?>
  <div><?php printf(__("%d broken links","wpcleaner"), $count);?></div>
<input type="hidden" name="wpc_post_type" value=""/>
<input type="hidden" name="wpc_post_status" value=""/>
<input type="hidden" name="wpc_post_name" value=""/>
<input type="hidden" name="wpc_action" value="update"/>
<input class="button-primary" type="button" value="<?php echo __("Delete all revisions","wpcleaner");?>" style="font-size:12px !important;font-weight:normal" onclick="revisionCleanerDo('revision','',this)"/>
<input class="button-primary" type="button" value="<?php echo __("Delete all drafts","wpcleaner");?>" style="font-size:12px !important;font-weight:normal" onclick="revisionCleanerDo('','draft',this)"/>
<input class="button-primary" type="button" value="<?php echo __("Delete all revisions and drafts", "wpcleaner");?>" style="font-size:12px !important;font-weight:normal" onclick="revisionCleanerDo('all','all',this)"/>
</div>
</form>
</div>
<?php
}
