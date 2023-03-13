<?php
   include('header.php');
?>
<style>
    #pagination{
  text-align: center;
  padding: 10px;
}
#pagination a{
  background: #2980b9;
  color: #fff;
  text-decoration: none;
  display: inline-block;
  padding:5px 10px;
  margin-right: 5px;
  border-radius: 3px;
}
#pagination a.active{
  background: #27ae60;
}
</style>

<div class="container"><br>
<h2 class="text-center">All Records</h2>
    <div class="row"><br>
   
        <div class="col-md-12 table-responsive w-100" style="padding:0px;margin:3px;">
            <div id="table-data"></div>
        </div>
        
    </div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  //code for all record using ajax
  $(document).ready(function() {
    function loadTable(page){
      $.ajax({
        url: "php/ajax-pagination.php",
        type: "POST",
        data: {page_no :page },
        success: function(data) {
          $("#table-data").html(data);
        }
      });
    }
    loadTable();

    //Pagination Code
    $(document).on("click","#pagination a",function(e) {
      e.preventDefault();
      var page_id = $(this).attr("id");

      loadTable(page_id);
    })
  });
</script>
<?php
   include('footer.php');
?>