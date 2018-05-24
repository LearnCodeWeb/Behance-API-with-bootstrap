	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo HOME_URL; ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo HOME_URL; ?>custom/js/freewall.js"></script>
    <!-- Add fancyBox main JS and CSS files -->
	<script src="<?php echo HOME_URL; ?>custom/fancybox/jquery.fancybox.min.js?v=2.1.5"></script>
    <script src="<?php echo HOME_URL; ?>custom/js/pace.min.js"></script>
    <script type="text/javascript">
		/*$(document).ready(function(e) {
			$('#appreciate_button').on("click",function(){
				var timestamp = new Date().getTime(),
				id	=	'46168569';
				$.ajax({
					url:'http://www.behance.net/c/a?e=project&s=1&use_jquery=1&count=1&stamp=' + timestamp + '&id=' + id,
					crossDomain:true,
				});
			});
        });*/
		$(document).ready(function(e) {
			
			var wall = new Freewall("#freewall");
			wall.reset({
				selector: '.brick',
				animate: true,
				cellW: 200,
				cellH: 'auto',
				gutterY: 15, 
				gutterX: 15,
				onResize: function() {
					wall.fitWidth();
				}
			});
			wall.fitWidth(); //for fit the first layout that load
			wall.container.find('.brick img').load(function() {
				wall.fitWidth();
			});
			$(function () {
				$('[data-toggle="tooltip"]').tooltip();
			});
			
			$("#loadmore").on("click",function(){
				nextval		=	$(this).val();
				newVal		=	+nextval+1;
				$("#projectLoadBtn button").val(newVal);
				$('.fa-refresh').addClass('fa-spinner');
				$.ajax({
					url:'<?php echo HOME_URL; ?>ajax/getProjects?page='+nextval,
					success: function(data){
						a	=	data.split("|^****^|");
						if(a[1]==1 || parseInt(a[1])==1){
							$("#getPageData").append(a[0]);
							$('.fa-refresh').removeClass('fa-spinner');
							setTimeout(function(){wall.container.find('.brick img').load(function() { wall.fitWidth(); });},100);
						}else if(a[1]==2 || parseInt(a[1])==2){
							$("#projectLoadBtn").html(a[0]);
						}
					}
				});
			});
			
			
			//pagination ajax base
			$(window).scroll(function(){
				scrollTDown		=	$(window).scrollTop();
				if(scrollTDown>=1500){
					$("#loadmore").click();	
				}
			});
			
		});
	</script>
    </body>
</html>
