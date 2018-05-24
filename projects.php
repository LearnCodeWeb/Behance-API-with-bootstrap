<?php include_once("header.php");
$getURL 	= 	$behanceData->getURL();
$project	=	explode("-",$getURL);
$id			=	isset($project[1])?$project[1]:'';
$pData	=	$behanceData->getProject($id);
?>
	
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <?php include_once('after-bar.php'); ?>
    
	<div class="container-project">
    	<div class="project-detail-box">
        	<div class="col-sm-8">
            	<a href="" class="displayName"><?php echo $pData->owners[0]->display_name; ?></a>
            	<div><?php echo $pData->owners[0]->occupation; ?></div>
            </div>
            <div class="col-sm-4 text-center hidden-md"><img src="<?php echo $pData->owners[0]->images->{'50'}; ?>" alt="<?php echo $pData->owners[0]->display_name; ?> Image" /></div>
			<div class="clearfix"></div>
            <hr />
            <div class="col-sm-12">
            	<div><a href="" class="displayName"><?php echo $pData->name; ?></a></div>
                <?php
					foreach($pData->fields as $field){
				?>
                	<a href="" class="data-tags"><?php echo $field; ?></a>
                <?php
					}
				?>
                <ul class="nav nav-pills">
                    <li><i class="fa fa-fw fa-eye"></i> <?php echo $pData->stats->views; ?></li>
                    <li><i class="fa fa-fw fa-thumbs-up"></i> <?php echo $pData->stats->appreciations; ?></li>
                    <li><i class="fa fa-fw fa-comments"></i> <?php echo $pData->stats->comments; ?></li>
                </ul>
                <br />
                <div class="text-light">Published on <?php echo date('M d Y', $pData->published_on); //published_on ?></div>
            </div>
            <div class="clearfix"></div>
            <hr />
            <div class="col-sm-12">
            	<div><a href="" class="displayName">Tags</a></div>
                <?php
					foreach($pData->tags as $tag){
					?>
                	<a href="" class="label label-default"><?php echo $tag; ?></a>
                	<?php
					}
				?>
            </div>
            <div class="clearfix"></div>
            <hr />
        </div> <!--/.project-detail-box-->
        <div class="project-data-box">
        <?php
			foreach($pData->modules as $pval){
				if($pval->type=="text"){
				echo $pval->text;
        		}else if($pval->type=="image"){
			?>
    		
        	<img src="<?php echo $pval->sizes->original; ?>" class="img-res" >
            <div class="project-des"></div>
        	<?php
				}else if($pval->type=="video"){
		?>
        <div class="embed-dimensions">
        	<iframe src="<?php echo $pval->src; ?>" allowfullscreen="" width="<?php echo $pval->width; ?>" height="<?php echo $pval->height; ?>" frameborder="0"></iframe>
            <div class="project-des"></div>
        </div>
        <?php
				}
			}
		?>
        <div class="project-data-footer">
        	<div class="col-sm-6">
            	<ul class="nav nav-tabs nav-justified">
                    <li><a href="">FB</a></li>
                    <li><a href="">G+</a></li>
                    <li><a href="">LinkedIn</a></li>
                </ul>
            </div>
            <div class="col-sm-6">
            	<ul class="nav nav-tabs nav-justified">
                    <li><a href="">View Complete Profile <i class="fa fa-long-arrow-right"></i></a></li>
                </ul>                
            </div>
            <div class="clearfix"></div>
        </div>
        </div> <!--/.project-data-box-->
        <div class="clearfix"></div>
    </div>
<?php include_once("footer.php"); ?>