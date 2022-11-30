<?php
    session_start();
	require_once("MIDB.php");
	if (!isset($_SESSION['usuario']) &&  !isset($_SESSION['password']))
	{ $_SESSION['usuario'] = "";
	
      $_SESSION['password'] = "";
      $_SESSION['color'] = "CCFF99";}
	  $misu=$_SESSION['usuario'] ;
      $mipass=$_SESSION['password'] ;
      $micolor =$_SESSION['color'];
	  echo "<html><body bgcolor=".$micolor.">";
	  if (!isset($_POST['login']))
	  {
	   echo '<form action="" method="post" >
        <table  cellpadding="5%">
            <tr >
                Identificarse
            </tr>
            <tr>
                <td>
                    <label>Username</label>
                </td>
                <td>
                    <input name="user" type="text" value='.$misu.'>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Password</label>
                </td>
                <td>
                    <input name="password" type="password" value='.$mipass.'>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div><input name="login" type="submit" value="login" ></div>
                </td>
            </tr>
              </table>
    </form>';
	  }
else  

	  if (MIDB::verificaCliente($_POST['user'], $_POST['password']))
	  { 
		$_SESSION['usuario'] = $_POST['user'];
        $_SESSION['password'] = $_POST['password'];
		echo '<a href="enlace1.php"> Enlace 1 </a></br>';
		echo '<a href="enlace2.php"> Enlace 2 </a></br>';}
	  else 
		{echo "<b>Usuario incorrecto</b>, pulse ";
        echo '<a href="ejercicio2.php"> aqui</a> para volver a intentarlo</br>';}
   ?>