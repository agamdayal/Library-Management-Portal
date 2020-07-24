<?php
session_start();
if(!isset($_SESSION["issued"]))
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
                                <h2>Search Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <?php
                                	$res = mysqli_query($link,"select * from add_books");
                                	echo "<table class='table table-bordered'>";
                                	echo "<tr>";
                                	echo "<th>"; echo "Book Name"; echo "</th>";
                                	echo "<th>"; echo "Book Author Name"; echo "</th>";
                                	echo "<th>"; echo "Publication Name"; echo "</th>";
                                	echo "<th>"; echo "Book Price"; echo "</th>";
                                	echo "<th>"; echo "Available Quantity"; echo "</th>";
                                	echo "</tr>";

                                	while($row=mysqli_fetch_array($res))
                                	{
                                		echo "<tr>";
                                		echo "<td>"; echo $row['books_name']; echo "</td>";
                                		echo "<td>"; echo $row['books_author_name']; echo "</td>";
                                		echo "<td>"; echo $row['books_publication_name']; echo "</td>";
                                		echo "<td>"; echo $row['books_price']; echo "</td>";
                                		echo "<td>"; echo $row['available_qty']; echo "</td>";
                                		echo "</tr>";
                                	}
                                	echo "</table>"
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
include "footer.php";
?>
