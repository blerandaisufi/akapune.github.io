<?php
// vargje
$a[] = "Mjekesi";
$a[] = "Inxhinieri";
$a[] = "Ndihmes";
$a[] = "Mesues/e";
$a[] = "Menaxher/e";
$a[] = "Zdrukthtari";
$a[] = "Sherbime civile";
$a[] = "Hotelieri";



// mere parametrin q nga URL-ja
$q = $_REQUEST["q"];

$hint = "";

//  kerko pershtatje ne te gjitha nga vargjet nese $q nuk eshte e zbrazet
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

//  nese nuk ka asnje pershtatje paraqet "ska sugjerime"
echo $hint === "" ? "Nuk ka sugjerime" : $hint;
?>
