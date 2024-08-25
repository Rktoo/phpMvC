<?php

namespace app\Models\User;

use PDO;
use PDOException;

class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = new PDO("sqlite:" . DB_PATH);
    }

    public function logUser($uemail)
    {
        try {
            $stmt = $this->db->prepare("SELECT u_password FROM users WHERE u_email = ?");
            $stmt->execute([$uemail]);
            $stored_hased_password =  $stmt->fetchColumn();
            return $stored_hased_password;
        } catch (PDOException $e) {
            return [
                "erreur" => true, "message" => $e->getMessage()
            ];
        }
    }

    public function getUserDetails($email)
    {
        try {
            $stmt = $this->db->prepare("SELECT u_name,u_email,created_at FROM users WHERE u_email = ? LIMIT 1");
            $stmt->execute([$email]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return "Erreur sur la récupération : " . $e->getMessage();
        }
    }
    public function registerUser($uname, $uemail, $upass)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO users (u_name, u_email, u_password) VALUES (:u_name, :u_email, :u_password)");
            $stmt->execute([
                ":u_name" => $uname,
                ":u_email" => $uemail,
                ":u_password" => password_hash($upass, PASSWORD_DEFAULT)
            ]);
            $stmt->fetchAll(PDO::FETCH_ASSOC);
            usleep(300000);
            return true;
        } catch (PDOException $e) {
            return "Erreur sur l'enregistrement : " . $e->getMessage();
        }
    }
    public function updateUserName($name, $email)
    {
        try {
            $stmt = $this->db->prepare("UPDATE users SET u_name = :uname WHERE u_email = :email");
            $stmt->execute([":uname" => $name, ":email" => $email]);
            $stmt->fetch(PDO::FETCH_ASSOC);
            return true;
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    public function updateUserPassword($email, $oldMdp, $newPass)
    {
        try {
            $stmt = $this -> db -> prepare("SELECT u_password FROM users WHERE u_email = :u_email");
            $stmt -> execute([":u_email" => $email]);
            $result = $stmt -> fetch(PDO::FETCH_ASSOC);
            if($result && password_verify($oldMdp, $result["u_password"])){
                $newPassHash = password_hash($newPass, PASSWORD_DEFAULT);
                $stmt = $this -> db -> prepare("UPDATE users SET u_password = :pass WHERE u_email = :email");
                $stmt -> execute([":pass" => $newPassHash, ":email" => $email]);
                $result = $stmt -> rowCount();
                return $result;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Erreur : ".$e -> getMessage();
        }

    }
    public function verifyUserBeforeRemove($password, $email)
    {
        try {
            $stmt = $this->db->prepare("SELECT u_password FROM users WHERE u_email = ? ");
            $stmt->execute([$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result && password_verify($password, $result["u_password"])) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return "Erreur : " . $e->getMessage();
        }
    }
    public function removeAccount($email)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM users WHERE u_email = :email");
            $stmt->execute([":email" => $email]);
            $result = $stmt->rowCount();
            return $result;
        } catch (PDOException $e) {
            return "Erreur de suppression : " . $e->getMessage();
        }
    }
}
