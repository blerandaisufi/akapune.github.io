<?php

require 'konektimi.php';
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($db, $_POST["query"]);
    $query = "
  SELECT * FROM punet
  WHERE titulli LIKE '%".$search."%'
  OR pershkrimi LIKE '%".$search."%'";
}
else
{
    $query = "
  SELECT * FROM punet";
}
$result = mysqli_query($db, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Titulli</th>
     <th>Kompania</th>
     <th>Pershkrimi</th>
<th>Paga minimale</th>
     <th>Paga maksimale</th>
<th>Kualifikimi</th>
<th>Data Publikimit</th>
<th>Data Mbylljes</th>
    </tr>
 ';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
   <tr>
    <td>'.$row["titulli"].'</td>
<td>'.$row["kompania"].'</td>
    <td>'.$row["pershkrimi"].'</td>
<td>'.$row["pagaminimale"].'</td>
<td>'.$row["pagamaksimale"].'</td>
<td>'.$row["kualifikimi"].'</td>
<td>'.$row["dataPublikimit"].'</td>
<td>'.$row["dataMbylljes"].'</td>
<td><form method="POST" action="aplikimi.php"><input type="submit" value="Apliko"/>
<input type="hidden" name="sendbtn" value="1" />
</button></form></td></tr>'


;




    }
    echo $output;
}
else
{
    echo 'Te dhenat nuk u gjeten..';
}

?>
