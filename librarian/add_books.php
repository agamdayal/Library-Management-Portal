<?php
session_start();
if(!isset($_SESSION["librarian"]))
{
?>
    <script type="text/javascript">
        window.location="login.php";
    </script>
<?php
}
include "header.php";
include "connections.php";
?>



        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
                                	<table class = "table table bordered">
                                		<tr>
                                			<td>
                                				<input type="text" name="booksname" class="form-control" placeholder="Book Name" required=""/>
                                			</td>
                                		</tr>
                                		<tr>
                                			<td>
                                				<input type="text" name="bauthorname" class="form-control" placeholder="Book Author Name" required="">
                                			</td>
                                		</tr>
                                		<tr>
                                			<td>
                                				<input type="text" name="pname" class="form-control" placeholder="Publication Name" required="">
                                			</td>
                                		</tr>
                                		<tr>
                                			<td>
                                				<input type="text" name="bpurchasedt" class="form-control" placeholder="Book Purchase Date" required="">
                                			</td>
                                		</tr>
                                		<tr>
                                			<td>
                                				<input type="text" name="bprice" class="form-control" placeholder="Book Price" required="">
                                			</td>
                                		</tr>
                                		<tr>
                                			<td>
                                				<input type="text" name="bqty" class="form-control" placeholder="Book Quantity" required="">
                                			</td>
                                		</tr>
                                		<tr>
                                			<td>
                                				<input type="text" name="aqty" class="form-control" placeholder="Available Quantity" required=""/>
                                			</td>
                                		</tr>
                                		<tr>
                                			<td>
                                				<input type="submit" name="submit1" class="btn btn-default btn-primary submit" value="INSERT" >
                                			</td>
                                		</tr>
                                	</table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
	if(isset($_POST["submit1"]))
	{
		mysqli_query($link,"insert into add_books values('','$_POST[booksname]','$_POST[bauthorname]','$_POST[pname]','$_POST[bpurchasedt]','$_POST[bprice]','$_POST[bqty]','$_POST[aqty]','$_SESSION[librarian]')");

?>
	<script type="text/javascript">
		alert("Books Inserted Successfully");
	</script>
<?php
	}
?>


<?php
include "footer.php";
?>
