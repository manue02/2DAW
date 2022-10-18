<html>
<head>
   <title>Primitiva</title>
</head>
<body>

<?php 

echo "<center><h1>Primitiva</h1>";
for ($i=1;$i<50;$i++)
{$b[$i]=$i;}
shuffle($b);
for ($i=1;$i<7;$i++)
	{$a[$i]=$b[$i];}
echo ("<table border=2 width=300 align=center>"); 
echo ("<caption>Suerte</caption>");
$i=1;
while ($i<49)
{ 
    $c=1;
	echo "<tr>";
	while ($c<=10)
  {
	   if (!in_array($i,$a) )
	   {$celda="<td>";}
		
	else
		{$celda="<td style=\"color:blue\">"; }
    if ($i<50)
		{echo $celda.$i;}
	 
	echo "</td>";
	$i++;
	$c++;
  }
  echo "</tr>";
} 
echo"</table>";

	




?>


<br>
</body>
</html> 