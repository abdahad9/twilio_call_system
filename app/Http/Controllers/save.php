<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class save extends Controller
{
    protected $client;
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "forge";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    function check_email($email)
    {
        
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        $sql = "SELECT * FROM `email_scraper` WHERE `email` = '" . $email . "'";

        $result = mysqli_query($conn, $sql);
        // it return number of rows in the table.
        if ($result->num_rows > 0) {
          
            return false;

        } else {
            
            return true;
        }
        // close the result.
        mysqli_free_result($result);

    }
    public function save_email($email)
    {
        if (self::check_email($email) == true) {
            $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

            $sql = "INSERT INTO email_scraper (`email`) VALUES ('" . $email . "')";

            if (mysqli_query($conn, $sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
    }

    function getemailid($email)
    {
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        $sql = "SELECT * FROM `email_scraper` WHERE `email` = '" . $email . "'";
        $result = mysqli_query($conn, $sql);
        while ($data = mysqli_fetch_assoc($result)) {
            return $data['ID'];
        }

    }
    function delete($email){
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $sql = "DELETE FROM `scraper` WHERE `email`='" . $email . "'";
   
        if (mysqli_query($conn, $sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    function save($email, $emailid, $start, $title, $Description, $Location, $Meeting_Link, $Organizer, $Phone, $pin, $Guest)
    {
        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);

        $stmt = $conn->prepare("INSERT INTO scraper (`email`, `emailid`, `START`, `Title`, `Description`, `Location`, `Meeting_link`, `Organizer`, `Phone`, `Pin`, `Guests`) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssssssss',$email, $emailid, $start, $title, $Description, $Location, $Meeting_Link, $Organizer, $Phone, $pin, $Guest);
        if ($stmt->execute() === true){
            return "true";
        }else{
            return "true";
        }

    }
}
