<?php

include 'Database.php'; //databaza me OOP


class Perdoruesi{
    private $db;
    public function __construct(){

        $this->db= new Database();

    }

    public function regjistrimi($data){

        $emri        =$data['emri'];
        $mbiemri     =$data['mbiemri'];
        $email       =$data['email'];
        $fjalekalimi =$data['fjalekalimi'];
        $shtese      =$data['shtese'];
        $fjalekalimiH =base64_encode(strrev(md5($fjalekalimi)));
        $check_email =$this->emailCheck($email);

        if(empty($emri) or empty($mbiemri) or empty($email) or empty($fjalekalimi) or empty($shtese) ){
            $msg="<div class='alert alert-danger'>Ploteso te gjitha fushat..</div>";
            return $msg;
        }

        elseif (!preg_match("/^[a-zA-Z ]*$/",$emri)){
            $msg="<div class='alert alert-danger'>Emri duhet te permbaje vetem shkronja.</div>";
            return $msg;
        }

        elseif (!preg_match("/^[a-zA-Z ]*$/",$mbiemri)){
            $msg="<div class='alert alert-danger'>Mbiemri duhet te permbaje vetem shkronja.</div>";
            return $msg;
        }


        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $msg="<div class='alert alert-danger'>Email nuk eshte ne formatin e duhur.</div>";
            return $msg;

        }
        elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$fjalekalimi)){
            $msg = "<div class='alert alert-danger'>Fjalekalimi duhet te permbaje se paku 8 karaktere</div>";
            return $msg;
        }


        if($check_email== true){
            $msg="<div class='alert alert-danger'>Ky email tashme eshte perdorur.</div>";
            return $msg;

        }


        else {





            $sql = "INSERT INTO perdoruesit(emri,mbiemri,email,fjalekalimi,shtese) VALUES (:emri, :mbiemri, :email, :fjalekalimi, :shtese)";
            $query = $this->db->pdo->prepare($sql);

            $query->bindValue(':emri', $emri);
            $query->bindValue(':mbiemri', $mbiemri);
            $query->bindValue(':email', $email);
            $query->bindValue(':fjalekalimi', $fjalekalimiH);
            $query->bindValue(':shtese', $shtese);
            $result= $query->execute();
            if($result){

                $msg= "<div class='alert alert-success'><a href='kycja-kandidatit.php'>Jeni regjistruar me sukses.</div>";
                return $msg;

            }else{

                $msg= "div class='alert alert-danger'>Regjistrimi nuk u realizua.</div>";
                return $msg;

            }

        }

    }
    public function emailCheck($email){
        $sql = "SELECT email FROM perdoruesit WHERE email = :email";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->execute();
        if($query->rowCount()>0){
            return true;
        }else{
            return false;
        }


    }
}



?>
