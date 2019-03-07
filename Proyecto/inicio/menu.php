<?php
	session_start();
  if(empty($_SESSION['usr'])){
    echo "Debe auteniticarse";
		exit();
  }
  $cat = $_SESSION['cat'];
?>
<html>
  <frameset rows = "30%,*">
    <frame src='banner.html' noresize='noresize' scrolling='no'/>
    <frameset cols = "15%,60%">
      <?php
      switch ($cat){
        	case '1':
          	echo "<frame src='opcMenuA.php' noresize='noresize' scrolling='no'>";
            break;
          case '2':
            echo "<frame src='opcMenuP.php' noresize='noresize' scrolling='no'>";
            break;
          case '3':
            echo "<frame src='opcMenuL.php' noresize='noresize' scrolling='no'>";
            break;
        }
      ?>
      <frame src='nada.html' noresize='noresize' scrolling ='no'/>
    </frameset>
  </frameset>
</html>
