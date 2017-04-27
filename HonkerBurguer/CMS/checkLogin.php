<?php
	if(isset($_SESSION['logado']))
	{
		if($_SESSION['logado'] == false)
		{
			header('location:../Index.php?login=false');
		}
	}
	else
	{
		header('location:../Index.php');
	}
?>