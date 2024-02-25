<?php

class User extends Database{
    public function registerUser($name,$email,$password){
        if(!$this->isUserIsRegistered($email)){
            header("Location:../?status=User are already registered");
            exit();
        }
        $password = password_hash($password,PASSWORD_BCRYPT);
        $name = $this->db->real_escape_string($name);
        $email = $this->db->real_escape_string($email);
        $password = $this->db->real_escape_string($password);
        $result = $this->db->query("INSERT INTO users (name,email,password) VALUES ('$name','$email','$password')");

        if(!$result){
            header("Location:../?status=User are not register");
            exit();

        }
        header("Location:../?status=User are registered now");

    }

    public function loginUser($email,$password){
        $email = $this->db->real_escape_string($email);
        $password = $this->db->real_escape_string($password);
        $result = $this->db->query("SELECT * FROM users WHERE email = '$email'");
        if($result->num_rows == 0){
            header("Location:../?status=You are not register ");
            exit();

        }
        $user = $result->fetch_assoc();
        if(!password_verify($password,$user["password"])){
            header("Location:../?status=Password are not correct");
            exit();

        }

            if(session_status() === PHP_SESSION_NONE){
            session_start();

            $_SESSION["user"] = $email;
        }


        header("Location:../");


    }

    public function isUserIsRegistered($email){
        $email = $this->db->real_escape_string($email);
        $result = $this->db->query("SELECT * FROM users WHERE email = '$email'");
        if($result->num_rows > 0){
            return false;
        }
        return true;
    }


    public function updateUserPassword($email,$newPassword){
    $newPassword = password_hash($newPassword,PASSWORD_BCRYPT);
    $newPassword = $this->db->real_escape_string($newPassword);

    $result = $this->db->query("UPDATE users SET password = '$newPassword' WHERE email='$email'");
    if(!$result){
        header("Location:../update.php?status=Password are not changed");
        exit();
    }
        header("Location:../?status=Password changed successfully");
        exit();
}

public function deleteUser($email){
    $this->db->query("DELETE FROM users WHERE email='$email'");
    if (session_status()==PHP_SESSION_NONE){
        session_start();
    }
    session_destroy();
    header("Location:../?status=Your account was deleted");
}
}
