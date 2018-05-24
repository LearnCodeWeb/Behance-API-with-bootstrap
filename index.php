<?php include_once("config.php"); ?>
<?php include_once("header.php"); ?>
    
    <!--top bar-->
    <?php include_once('top-bar.php'); ?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <?php include_once('after-bar.php'); ?>
    
    <div class="container-search" data-spy="affix" data-offset-top="205">
    	<div class="container"></div>
    </div>
    <div class="container">
    	<div class="margin-bottom">
        	<div class="col-sm-12 col-md-9 border-right" id="freewall">
            	<?php
					$p		=	$behanceData->getUserProjects('QURESHI',array('per_page'=>50)); //,array('per_page'=>25)
					$s		=	1;
					foreach($p as $val){
						$s++;
						$date	=	$val->published_on;
				?>
                <script type="text/javascript">
				$(document).ready(function(){
					$(".ajaxCall_<?php echo $val->id; ?>").fancybox({
						afterShow	: 	function(){
						},
						afterClose	: 	function() {
							window.history.back();
						}
					});
					$('#<?php echo $val->id; ?>, #url_<?php echo $val->id; ?>').click(function() {
						window.history.pushState("", "", '/azcreativeworld/projects/d-<?php echo $val->id; ?>#<?php echo $val->id; ?>');
					});
					//$.fancybox.open({href: "#<?php echo $val->id; ?>"});
				});
				</script>
            	<div class="box-data-container brick">
                	<a href="javascript:;" data-src="<?php echo HOME_URL; ?>projects/d-<?php echo $val->id; ?>#<?php echo $val->id; ?>" data-type="iframe" id="<?php echo $val->id; ?>" class="ajaxCall_<?php echo $val->id; ?>"><img src="<?php echo $val->covers->{'202'}; ?>"></a>
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
				?>
                <div id="getPageData"></div>
            	<div class="clearfix"></div>
            </div>
            <div class="col-sm-12 col-md-3">
            	<div class="search-box-data">
                	<h2>Quick Search</h2>
                    <div class="list-group">
                        <a href="#" class="list-group-item disabled">Cras justo odio <span class="badge">14</span></a>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item">Morbi leo risus</a>
                        <a href="#" class="list-group-item">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item">Vestibulum at eros</a>
                    </div>
                </div> <!--/.search-box-data-->
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-12 col-md-9 text-center">
            	<div id="projectLoadBtn"><button value="2" id="loadmore" class="btn btn-default btn-xs margin-bottom"><i class="fa fa-fw fa-refresh" aria-hidden="true"></i> Load More</button></div>
            	<div class="project-des"></div>
            </div>
            <div class="col-sm-12 col-md-3">&nbsp;</div>
            <div class="clearfix"></div>
        </div>
    </div> <!-- /container -->
    
    <footer class="footer navbar-fixed-bottom">
        <div class="container">
        	<p class="text-muted">Place sticky footer content here.</p>
        </div>
    </footer>
    
 <?php include_once("footer.php"); ?>
