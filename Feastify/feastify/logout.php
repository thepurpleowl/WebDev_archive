<?php
session_start();
unset($_SESSION["sess_user"]);
session_destroy();

?>
<script type="text/javascript" src="js/JQuery.js"></script>
<script type="text/javascript">
location.replace("index.php");
</script>