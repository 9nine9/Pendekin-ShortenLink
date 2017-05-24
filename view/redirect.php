<?php 
require_once "../controller/pendekin.php";

$title = 'Something wrong, my friend!';
if(isset($_SESSION['message'])){
	$title	= $_SESSION['message'];
}

session_unset();
?>
<!DOCTYPE html><head>
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
	   
	<div class="container">
    	<div class="col-sm-2"></div>
    	<div class="col-sm-8 pendekin">
	        <h2 class="center"><?php echo "$title"; ?></h2>
	        <div class="form-horizontal">
	            <div class="form-group">
		            <div class="col-sm-12">
		                <input type="text" class="form-control center message" readonly value="<?php echo "$pendekin->link";?>">
		            </div>
	            </div>
	            <div class="form-group">
	               	<div class="col-sm-6 col-xs-6">
	               		<a href=http://<?php echo "$pendekin->link";?>>
	               			<button class="form-control btn-danger">
	               				Go to link
	               			</button>
	               		</a>
	               	</div>
	               	<div class="col-sm-6 col-xs-6">
	               		<a href=home>
	               			<button class="form-control btn-info">
	               				Home
	               			</button>
	               		</a>
	               	</div>
	            </div>
	        </div>
	    </div>
	    <div class="col-sm-2"></div>
    </div>

</body>
</html>