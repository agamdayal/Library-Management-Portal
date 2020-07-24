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
                                <h2>Issue Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" >
                                	<table>
                                		<tr>
                                			<td>
                                				<select name= "enr" class="form-control selectpicker">
                                					<?php
                                						$res = mysqli_query($link, "select enrollment from student_registration");
                                						while($row = mysqli_fetch_array($res))
                                						{
                                							echo "<option>";
                                							echo $row['enrollment'];
                                							echo "</option>";
                                						}
                                					?>
                                				</select>
                                			</td>
                                			<td>
                                				<input type="submit" name="submit1" class="form-control btn btn-white" value="SEARCH" >
                                			</td>
                                		</tr>
                                	</table>

                                	<?php
                                		if(isset($_POST['submit1']))
                                		{

                                			$res1 = mysqli_query($link, "select * from student_registration where enrollment='$_POST[enr]'");
                                			while($row1=mysqli_fetch_array($res1))
                                			{
                                				$firstname = $row1['firstname'];
                                				$lastname = $row1['lastname'];
                                				$sem = $row1['sem'];
                                				$contact = $row1['contact'];
                                				$email = $row1['email'];
                                				$username = $row1['username'];
                                				$enrollment = $row1['enrollment'];
                                			}
                                	?>
                                		<table class = "table table bordered">
                                			<tr>
                                				<td>
                                					<input type="text" name="studentenrollment" value= "<?php echo $enrollment;?>" class="form-control" placeholder="Student Name" required=""/>
                                				</td>
                                			</tr>
                                			<tr>
                                				<td>
                                					<input type="text" name="studentname" value= "<?php echo $firstname.' '.$lastname;?>" class="form-control" placeholder="Student Name" required=""/>
                                				</td>
                                			</tr>
                                			<tr>
                                				<td>
                                					<input type="text" name="studentsem" value="<?php echo $sem;?>"class="form-control" placeholder="Student Sem" required=""/>
                                				</td>
                                			</tr>
                                			<tr>
                                				<td>
                                					<input type="text" name="studentcontact" value="<?php echo $contact;?>"class="form-control" placeholder="Student Contact" required=""/>
                                				</td>
                                			</tr>
                                			<tr>
                                				<td>
                                					<input type="text" name="studentemail" value="<?php echo $email; ?>"class="form-control" placeholder="Student Email" required=""/>
                                				</td>
                                			</tr>
                                			<tr>
                                				<td>
                                					<select name="booksname" class="form-control selectpicker">
                                						<?php
                                							$res = mysqli_query($link,"select books_name from add_books");
                                							while($row=mysqli_fetch_array($res))
                                							{
                                								echo "<option>";
                                								echo $row['books_name'];
                                								echo "</option>";
                                							}
                                						?>
                                						
                                					</select>
                                				</td>
                                			</tr>
                                			<tr>
                                				<td>
                                					<input type="text" name="booksissuedate" class="form-control" placeholder="Book Issue Date" required=""/>
                                				</td>
                                			</tr>
                                			<tr>
                                				<td>
                                					<input type="text" name="studentusername" value= "<?php echo $username;?>"class="form-control" placeholder="Student Username" required=""/>
                                				</td>
                                			</tr>
                                			<tr>
                                				<td>
                                					<input type="submit" name="submit2" class="form-control btn btn-primary" value="SUBMIT"/>
                                				</td>
                                			</tr>
                                		</table>
                                	<?php
                                		}
                                	?>
                                </form>

                                <?php
                                	if(isset($_POST['submit2']))
                                	{
                                        $qty=0;
                                        $res = mysqli_query($link,"select * from add_books where books_name='$_POST[booksname]'");
                                        while($row=mysqli_fetch_array($res))
                                        {
                                            $qty = $row['available_qty'];
                                        }

                                        if($qty == 0)
                                        {
                                ?>
                                            <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                                <strong style="color:white">Book out of Stock</strong>.
                                            </div>
                                <?php
                                        }
                                        else
                                        {
                                		mysqli_query($link,"insert into issue_books values('','$_POST[studentenrollment]','$_POST[studentname]','$_POST[studentsem]','$_POST[studentcontact]','$_POST[studentemail]','$_POST[booksname]','$_POST[booksissuedate]','','$_POST[studentusername]')");
                                        mysqli_query($link,"update add_books set available_qty= available_qty-1 where books_name='$_POST[booksname]'");
                                         }
                                ?>

                                <script type="text/javascript">
                                	alert("Issued Successfully!");
                                </script>

                                <?php
                                	}
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

