<?php include_once('../config.php');
	extract($_REQUEST);
	if($page!=""){
		$p		=	$behanceData->getUserProjects('MianZaidBinKhalid',array('per_page'=>25, 'page' => $page));
		if(!empty($p)){
		foreach($p as $val){
			$date	=	$val->published_on;
?>
	<script type="text/javascript">
    $(document).ready(function(e) {
        $(".ajaxCall_<?php echo $val->id; ?>").fancybox({
			afterClose		: function() {
				window.history.back();
			}
		});
        $('#<?php echo $val->id; ?>, #url_<?php echo $val->id; ?>').click(function() {
			window.history.pushState("", "", '/azcreativeworld/projects/d-<?php echo $val->id; ?>#<?php echo $val->id; ?>');
		});
    });
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
    </script>
    <div class="box-data-container brick">
        <a href="javascript:;" data-src="<?php echo HOME_URL; ?>projects/d-<?php echo $val->id; ?>#<?php echo $val->id; ?>" id="<?php echo $val->id; ?>" data-type="iframe" class="ajaxCall_<?php echo $val->id; ?>"><img src="<?php echo $val->covers->{'202'}; ?>"></a>
        <div class="box-data-content">
            <div class="box-data-title"><a href="javascript:;" data-src="<?php echo HOME_URL; ?>projects/d-<?php echo $val->id; ?>#<?php echo $val->id; ?>" data-type="iframe" id="url_<?php echo $val->id; ?>" class="ajaxCall_<?php echo $val->id; ?>"><?php echo $val->name; ?></a></div>
            <span>by <a href=""><?php echo $val->owners[0]->first_name.'&nbsp;'.$val->owners[0]->last_name; ?></a></span>
            <div class="box-devider"></div>
            <?php
                foreach($val->fields as $field){
            	?>
                <a href="" class="data-tags"><?php echo $field; ?></a>
            	<?php
                }
            ?>
        </div> <!--/.box-data-content-->
        <div class="box-data-footer">
            <span><i class="fa fa-thumbs-up"></i> <?php echo $val->stats->appreciations; ?></span>
            <span><i class="fa fa-eye"></i> <?php echo $val->stats->views; ?></span>
            <span class="pull-right" data-toggle="tooltip" data-placement="bottom" title="Created on <?php echo date('M d Y', $date); ?>"><i class="fa fa-calendar"></i></span>
        </div> <!--/.box-data-footer-->
    </div> <!--/.box-data-container-->
<?php
		}
			echo '|^****^|1|^****^|';
		}else{
			echo '|^****^|2|^****^|';
		}
	}
?>
