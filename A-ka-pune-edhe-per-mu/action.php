<?php

include 'crud.php';
$object = new Crud();
if(isset($_POST["action"]))
{
    if($_POST["action"] == "Load")
    {
        echo $object->get_data_in_table("SELECT * FROM komentuesit ORDER BY id DESC");
    }
    if($_POST["action"] == "Komento")
    {
        $emri = mysqli_real_escape_string($object->connect, $_POST["emri"]);
        $komenti = mysqli_real_escape_string($object->connect, $_POST["komenti"]);
        $query = "
           INSERT INTO komentuesit
           (emri, komenti)
           VALUES ('".$emri."', '".$komenti."')
           ";
        $object->execute_query($query);
        echo 'Ju komentuat me sukses !';
    }
    if($_POST["action"] == "Fetch Single Data")
    {
        $output = '';
        $query = "SELECT * FROM komentuesit WHERE id = '".$_POST["id"]."'";
        $result = $object->execute_query($query);
        while($row = mysqli_fetch_array($result))
        {
            $output["emri"] = $row['emri'];
            $output["komenti"] = $row['komenti'];
        }
        echo json_encode($output);
    }
    if($_POST["action"] == "Edit")
    {

        $emri = mysqli_real_escape_string($object->connect, $_POST["emri"]);
        $komenti = mysqli_real_escape_string($object->connect, $_POST["komenti"]);
        $query = "UPDATE komentuesit SET emri = '".$emri."', komenti = '".$komenti."' WHERE id = '".$_POST["id"]."'";
        $object->execute_query($query);
        echo 'Komenti u ndryshua !';
    }
    if($_POST["action"] == "Delete")
 {
  $query = "DELETE FROM komentuesit WHERE id = '".$_POST["id"]."'";
  $object->execute_query($query);
  echo 'Komenti u fshi me sukses !';
 }
}

?>

