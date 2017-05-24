<?php

if(!isset($_GET['id'])){
	header("Location: home");
}
else{
	$id	= $_GET['id'];
	header("Location: $id");
}