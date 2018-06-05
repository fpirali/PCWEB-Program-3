<?php
$basedir= dirname(__DIR__);
$basedir = explode("\\", $basedir);
$basedir = array_pop($basedir);

//array_pop(explode("\\", dirname(__DIR__))) 
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Justice Training Registration</title>
    <link rel="stylesheet" type="text/css"
	
          href="/<?php echo htmlspecialchars($basedir) ?>/main.css">
			<!--- THIS PATH WILL BREAK ON LINUX/OSX 
		replace "\\" with "//"
		-->
		  </head>

<!-- the body section -->
<body>
<header>
    <h1 id="title">Nebraska Supreme Court</h1>
   
    <img src="../image/jbe3.png" alt="Justice Training" width="100" height="100">
     <h2 id="title">Justice Training Registration</h2>
  
</header>
