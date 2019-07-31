<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
<?php
if($location = substr(dirname($_SERVER['PHP_SELF']), 1))
	$dirlist = explode('/', $location);
else
	$dirlist = array();

$count = array_push($dirlist, basename($_SERVER['PHP_SELF']));

$address = 'http://'.$_SERVER['HTTP_HOST'];

echo "<a href=" .$address."><i class='fa fa-home'></i> Inicio</a>&nbsp;/";

for($i = 0; $i < $count; $i++)
	echo '&nbsp;&nbsp;<li class="breadcrumb-item"><a href="'.($address .= '/'.$dirlist[$i]).'">'.ucwords(str_replace(".php","",$dirlist[$i])).'</a></li>';
?>
  </ol>
</nav>