		<div id="footerwrap" class="position">
			
			<div id="footer">
				
				<p><a href="#header">↑Top</a> | <script src="http://s96.cnzz.com/stat.php?id=4200165&web_id=4200165" language="JavaScript"></script></p>
				<p>Powered By chaochao</p>
				
			</div>
			
		</div>
        
        <ul id="nav">
			<?php wp_list_categories($args); ?>
		</ul>
        
        <script>
        	$(function(){
				$('#shownav').click(function() {
					  $('#nav').toggle('fast', function() {
						 
					  });
				});
            });
        </script>
	</body>
</html>