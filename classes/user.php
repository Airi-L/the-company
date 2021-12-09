<?php
include 'database.php';

class User extends Database{

    public function createUser($first_name, $last_name, $username, $password){
        $password = password_hash($password, PASSWORD_DEFAULT);

        // SQL
        //password is the keyword of the mysql
        $sql = "INSERT INTO users(first_name, last_name, username, `password`)VALUES('$first_name', '$last_name', '$username','$password')";
        //Execution -> Redirection
        if($this->conn->query($sql)){
            header('location: ../views'); // go to index.php
            exit;
        }else{
            die("ERROR crating user: ".$this->conn->error);
        }
    }

    public function login($username,$password){
        $sql = "SELECT id, username, `password` FROM users WHERE username = '$username'";

        if($result = $this->conn->query($sql)){
            // $result holds the id username password from the database
            // Ceack if the username exists
            if($result->num_rows == 1){
                // Check if the password is correct
                $user_details = $result->fetch_assoc();

                if(password_verify($password,$user_details['password'])){
                    session_start();
                    $_SESSION['user_id'] = $user_details['id'];
                    $_SESSION['username'] = $user_details['username'];

                    header("location: ../views/dashboard.php");
                    exit;
                }else{
                    die("Password is incorrect.");
                }

            }else{
                die("Username not found.");
            }

        }else{
        die("ERROR: ".$this->conn->error);
        }
    }

    public function getAllUsers(){
        $sql = "SELECT id, first_name, last_name, username FROM users";

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("ERROR retrieving all users: ".$this->conn->error);
        }
    }

    public function getExceptOneUser(){
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT id, first_name, last_name, username FROM users WHERE id != '$user_id'";
        // Get all users EXCEPT for this id

        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("ERROR retrieving all users: ".$this->conn->error);
        }
    }

    public function getUser($user_id){
        $sql = "SELECT * FROM users WHERE id = $user_id";

        if($result = $this->conn->query($sql)){
            return $result->fetch_assoc();
            // Since we are expecting 1 row of result only, transfrom the result to SSSOCIATIVE array right away.
        }else{
            die("ERROR retrieving the user: ".$this->conn->error);
        }
    }

    public function updateUser($user_id, $first_name,$last_name,$username){
        $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', username = '$username' WHERE id = $user_id";

        if($this->conn->query($sql)){
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("ERROR retrieving all users: ".$this->conn->error);
        }
    }

    public function deleteUser($user_id){
        $sql = "DELETE FROM users WHERE id = '$user_id'";

        if($this->conn->query($sql)){
            header("location: ../views/dashboard.php");
            exit;
        }else{
            die("ERROR deleting all users: ".$this->conn->error);
        }
    }
}

?>