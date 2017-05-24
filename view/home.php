<?php
session_start();

$message = '';
if(isset($_SESSION['message'])){
	$message	= $_SESSION['message'];
}

$link = '';
if(isset($_SESSION['link'])){
	$link		= '<input type="text" class="form-control center" value="http://pendekin.16mb.com/'.$_SESSION['link'].'" readonly>';
}
session_unset();

?>

<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />  
         
    <title>Pendekin</title>

    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link href="css/stylesheet.css" rel="stylesheet" media="screen" />
    <script src="js/jquery.js"></script>
	<noscript>Best in javascript mode</noscript>
</head>

<html>
<body>
   	
   	<!-- formulir pendekin link-->
    <div class="container">
		<div class="col-sm-2"></div>
		<div class="col-sm-8 pendekin">
	    	<h2 class="center">Pendekin Your Link</h2>
		        <form class="form-horizontal" method="post" action="controller/pendekin.php">
		            <div class="form-group">
		               <div class="col-sm-12">
		                    <input type="text" name="link" placeholder="Original Link" required  class="form-control">
		               </div>
		            </div>
		            <div class="form-group">
		            	<div class="col-sm-4 col-xs-4">pendekin.16mb.com/</div>
		               	<div class="col-sm-8 col-xs-8">
		               		<input type="text" name="id" maxlength="50" placeholder="Your Link" required class="form-control">
		               	</div>
		            </div>
		            <div class="form-group">
		                <div class="col-sm-12">
		                    <button type="submit" name="pendekin" class="form-control btn-danger">Pendekin</button>
		                </div>
		            </div>
		        </form>
		</div>
		<div class="col-sm-2"></div>
	</div>

	<!-- message -->
	<div class="container">
		<div class="col-sm-2"></div>
    	<div class="col-sm-8 message center">
    		<span><?php echo "$message";?></span>
    			<div class="form-horizontal">
		            <div class="form-group">
		               <div class="col-sm-12">
		                    <?php echo "$link";?>
		               </div>
		            </div>
		        </div>
	    </div>
	    <div class="col-sm-2"></div>
	</div>
</body>
</html>