<?php 

global $redirect, $current_theme;

$redirect = true;

require("index.php");

?>

<!DOCTYPE HTML>

<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
        
        <script type="text/javascript">
        
		
		top.location.href = 'http://vps5.cgwizz.com/?theme=<?php echo $current_theme; ?>';
		
        
        </script>
        
</head>

<body>


</body>

</html>