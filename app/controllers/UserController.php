<?php

namespace app\controllers\UsersController;

use core\controller\Controller;

class UserController extends Controller
{
    private $model;
    protected $r_error = false;
    protected $l_error = false;

    public function __construct($model)
    {
        $this->model = $model;
    }
    public function login()
    {
        unset($_SESSION["registerError"]);
        unset($_SESSION["registerSuccess"]);

        if (isset($_POST["user_email"]) && isset($_POST["user_password"])) {
            $uemail = htmlspecialchars($_POST["user_email"]);
            $upass = htmlspecialchars($_POST["user_password"]);
            return $this->logUser($uemail, $upass);
        }
        return $this->view("auth/login/index");;
    }

    public function logUser($email, $pass)
    {
        $storedPasswordH = $this->model->logUser($email);

        if (gettype($storedPasswordH) === "string" && password_verify($pass, $storedPasswordH)) {
            unset($_SESSION["loginError"]);
            $this->l_error = false;
            $userInfo = $this->getUserInfo($email);
            $uname = "";
            $uemail = "";
            $ucreatedAt = "";
            foreach ($userInfo as $key => $value) {
                $uname = ($value["u_name"]);
                $uemail = ($value["u_email"]);
                $ucreatedAt = ($value["created_at"]);
            }

            $_SESSION["user"] = $uname;
            $_SESSION["uemail"] = $uemail;
            $_SESSION["ucreated"] = $ucreatedAt;
            $_SESSION["_token"] = random_int(987654321, 12345678987);
            $_SESSION["loginSuccess"] = "Comment allez vous aujourd'hui ?";

            header("location: /");
        } else {
            unset($_SESSION["loginSuccess"]);
            $this->l_error = true;
            $_SESSION["loginError"] = "Mauvaise combinaison des identifiants.";
            return $this->view("auth/login/index");
        }
    }

    public function getUserInfo($email)
    {
        $data = $this->model->getUserDetails($email);
        return $data;
    }
    public function register()
    {
        unset($_SESSION["loginError"]);
        unset($_SESSION["loginSuccess"]);

        if (
            isset($_POST["user_name"]) &&
            isset($_POST["user_email"]) &&
            isset($_POST["user_password"]) &&
            trim($_POST["user_name"]) !== "" &&
            trim($_POST["user_email"]) !== "" &&
            trim($_POST["user_password"]) !== ""
        ) {
            $uname = htmlspecialchars($_POST["user_name"]);
            $uemail = htmlspecialchars($_POST["user_email"]);
            $upass = htmlspecialchars($_POST["user_password"]);
            $this->saveUser($uname, $uemail, $upass);
        } else {
            return $this->view("auth/register/index");
        }
    }

    public function saveUser($name, $email, $pass)
    {
        $status = $this->model->registerUser($name, $email, $pass);
        if ($status !== true) {
            $this->r_error = true;
        } else {
            $this->r_error = false;
        }
        $this->registerRenderView($email);
    }
    public function registerRenderView($email = "")
    {
        $_POST = [];
        if ($this->r_error === true) {
            unset($_SESSION["registerSuccess"]);
            $_SESSION["registerError"] = "Cette adresse email existe déjà.";
            header("location: " . BASE_URL . "register");
        } else {
            unset($_SESSION["registerError"]);
            $_SESSION["registerSuccess"] = "Nous sommes heureux de vous accueillir.";
            $this->r_error = false;

            return $this->view("auth/register/index");
        }
    }

    public function profil()
    {
        return $this->view("dashboard/profil/index");
    }
    public function logout()
    {
        unset($_SESSION["user"]);
        unset($_SESSION["_token"]);
        unset($_SESSION["uemail"]);
        unset($_SESSION["ucreated"]);
        session_destroy();

        if (!isset($_SESSION["user"]) && !isset($_SESSION["_token"])) {
            header("location: " . BASE_URL);
        }

        /// Renvoyer l'utilisateur sur une page d'erreur
        return $this->view("home/erreur/index");
    }

    public function updateName()
    {
        if (isset($_POST["user_nameM"]) && isset($_POST["user_emailL1"])) {
            $userName = htmlspecialchars($_POST["user_nameM"]);
            $userEmail = htmlspecialchars($_POST["user_emailL1"]);
            $modif = $this->model->updateUserName($userName, $userEmail);
            if($modif){
            $_SESSION["user"] = $userName;
            echo json_encode(["success" => true, "message" => "Votre nom a bien été modifié."]);
            exit;
            }
        } else {
        echo json_encode(["success" => false, "message" => "Merci de remplir le champ."]);
        exit;
        }
        exit;
    }

    public function updatePassword()
    {
        if(isset($_POST["old_mdp"]) && isset($_POST["user_mdp"]) && isset($_POST["user_emailL2"])){
            $oldMdp = htmlspecialchars($_POST["old_mdp"]);
            $newPass = htmlspecialchars($_POST["user_mdp"]);
            $email = htmlspecialchars($_POST["user_emailL2"]);
            $gotoUpdate = $this -> model -> updateUserPassword($email, $oldMdp, $newPass);
            if($gotoUpdate === false){
                echo json_encode(["success" => false, "Error" => "Le mot de passe est incorrect."]);
                exit(319);
            }
            
            echo json_encode(["success" => true, "message" => "Votre mot de passe a bien été modifié."]);
            exit(201);
            
        }
        exit;
    }
    public function deleteAccount()
    {
        if (isset($_POST["mdp_suppression"]) && isset($_POST["email_suppression"])) {
            $isUser = $this->model->verifyUserBeforeRemove(htmlspecialchars($_POST["mdp_suppression"]), htmlspecialchars($_POST["email_suppression"]));
            if ($isUser) {
                $goToDelete = $this->model->removeAccount($_POST["email_suppression"]);
                if ($goToDelete > 0) {
                    echo json_encode(["success" => true, "message" => "Votre compte a bien été supprimé."]);
                    exit;
                } else {
                    echo json_encode(["success" => false, "message" => "Une erreur est survenue. Veuillez réessayer plus tard."]);
                    exit;
                }
            } else {
                echo json_encode(["success" => false, "error" => "Mot de passe invalide"]);
            }
        } else {
            return $this->view("dashboard/profil/remove-account/index");
        }
    }
}