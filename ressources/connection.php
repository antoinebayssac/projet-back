<?php

class Connection
{
    public PDO $pdo;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:dbname=projet-back;host=127.0.0.1', 'root', 'root');
    }

    public function getinfouser(String $email) :array {
        $query = 'SELECT last_name, first_name FROM user WHERE email=?';

        $statement = $this->pdo->prepare($query);

        $statement->execute([
          $email
        ]);
        return $statement->fetch();
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

    public function connect(String $email, String $password): bool
    {
        $validpassword = false;
        

        $query ="SELECT * FROM `user` WHERE `email`= ?";

        $statement = $this->pdo->prepare($query);
        $statement->execute([$email]);

        while($user = $statement->fetch()) {
            if(md5($password) == $user["password"]){
                $validpassword = true;
            }
            

        }
        return $validpassword;
    }

    public function insertalbum(String $email, String $nom, bool $prive): bool
    {
        $query = 'INSERT INTO Album (email, nom, prive)
                  VALUES (:email, :nom, :prive)';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'email' => $email,
            'nom' => $nom,
            'prive' => (int)$prive
        ]);
    } 

    public function getAlbumFromEmail($email)
    {
        $query =  'SELECT * from Album WHERE email = '.$email;
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $data = $statement->fetchAll();
        return $data;
    }

    public function getAlbum()
    {
        $query =  'SELECT * from Album';
        $statement = $this->pdo->prepare($query);
        $statement->execute();

        $data = $statement->fetchAll();
        return $data;
    }


    public function deleteAlbum(int $id): bool
    {
        $query = 'DELETE FROM Album
                  WHERE id = :id';

        $statement = $this->pdo->prepare($query);

        return $statement->execute([
            'id' => $id,
        ]);
    }
}