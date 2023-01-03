<?php

class Connection
{
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=projet-back;host=127.0.0.1', 'root', 'root');
    }

    public function insert(User $user): bool
    {
        $query = 'INSERT INTO user (email, password, first_name, last_name)
                  VALUES (:email, :password, :first_name, :last_name)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'email' => $user->email,
            'password' => md5($user->password),
            'first_name' => $user->firstName,
            'last_name' => $user->lastName,
        ]);
    }

    public function connect(String $email, String $password): array
    {
        $validpassword = false;
        $Admin = false;

        $query ="SELECT * FROM `user` WHERE `email`= ?";

        $statement = $this->pdo->prepare($query);
        $statement->execute([$email]);

        while($user = $statement->fetch()) {
            if(md5($password . 'MY_SUPER_SALT') == $user["password"]){
                $validpassword = true;
            }
            if ($user["admin"]){
                $Admin = true;
            }

        }
        return [$validpassword, $Admin];
    }
    
}