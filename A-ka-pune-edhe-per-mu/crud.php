<?php

//require 'konektimi.php';
$output = ''; //superglobale
 class Crud
 {
      //crud class
      public $connect;
      private $host = "localhost";
      private $username = 'root';
      private $password = '';
      private     $database = 'a_ka_pune_edhe_per_mu';
      function __construct()
      {
           $this->database_connect();
      }
      public function database_connect()
      {
          $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
      }
      public function execute_query($query)
      {
          return mysqli_query($this->connect, $query);
      }
      public function get_data_in_table($query)
      {
          $GLOBALS['output'] = '';
          $result = $this->execute_query($query);
          $GLOBALS['output'] .= '
           <table class="table table-bordered table-striped">
                <tr>
                     <th width="20%">Emri</th>
                     <th width="50%">Komenti</th>
                     <th width="10%">Ndrysho</th>
                     <th width="10%">Fshij</th>
                </tr>
           ';
          while($row = mysqli_fetch_object($result))
          {
              $GLOBALS['output'] .= '
                <tr>
                     <td>'.$row->emri.'</td>
                     <td>'.$row->komenti.'</td>
                     <td><button type="button" name="update" id="'.$row->id.'" class="btn btn-success btn-xs update">Ndrysho</button></td>
                     <td><button type="button" name="delete_btn" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Fshij</button></td>
                </tr>
                ';
          }
          $GLOBALS['output'] .= '</table>';
          return $GLOBALS['output'];
      }
 }
?>