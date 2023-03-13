<?php
   include('header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 table-responsive h-100"><br>
        <div class="form-group">
				<div class="input-group">
					<input type="text" name="search_text" id="search_text" placeholder="Search by Name or Address " class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
        </div>  
    </div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	function load_data(query)
	{
		$.ajax({
			url:"php/ajax-search.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data().hide();			
		}
	});
});
</script>
<?php
   include('footer.php');
?>