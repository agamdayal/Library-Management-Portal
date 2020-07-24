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
include "connections.php";
$id = $_GET['id'];
mysqli_query($link,"delete from add_books where id=$id");
?>

<script type="text/javascript">
	window.location="display_books.php";
</script>