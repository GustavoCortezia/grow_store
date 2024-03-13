<?php
require_once('./utils/next_id.php');

class User
{
    private $id;
    private $name;
    private $email;
    private $password;
    private $active;

    public function __construct($nameP, $emailP, $passwordP, $active = true)
    {
        $this->id = createId();
        $this->name = $nameP;
        $this->email = $emailP;
        $this->password = $passwordP;
        $this->active = $active;
    }

    public function add($userData)
    {
        array_push($userData, $this);
        return $userData;
    }

    public function getId(){
        return $this->id;
    }


    public function update($idP, $userData, $nameP, $emailP, $passwordP, $activeP)
    {
        $filtered = array_values(array_filter($userData, function ($item) use ($idP) {
            return $item->id == $idP; 
        })
        );

        $filtered[0]->name = $nameP;
        $filtered[0]->email = $emailP;
        $filtered[0]->password = $passwordP;
        $filtered[0]->active = $activeP; 

        if ($filtered) {
            echo "Nome: " . $filtered[0]->name . "<br>";
            echo "E-mail: " . $filtered[0]->email . "<br>";
            echo $filtered[0]->active ? "Status: Ativo!" : "Status: Inativo!" . "<br>";
            echo "<br><hr>";
        } else {
            echo "Usuário não encontrado.";
        }

    }

    public static function show($idP, $userData)
    {
        $filtered = array_values(array_filter($userData, function ($item) use ($idP) {
            return $item->id == $idP; 
        })
    );

    var_dump($filtered);

                
        if ($filtered) {
            echo "Nome: " . $filtered[0]->name . "<br>";
            echo "E-mail: " . $filtered[0]->email . "<br>";
            echo $filtered[0]->active ? "Status: Ativo!" : "Status: Inativo!" . "<br>";
            echo "<br><hr>";
        } else {
            echo "Usuário não encontrado.";
        }
    }

    public function delete($idP, $userData)
    {
        $filtered = array_values(array_filter($userData, function ($item) use ($idP) {
            return $item->id == $idP;
        }));

        array_pop($userData, $filtered);

    }

    public static function list($userData)
    {
        echo "Lista de usuários<br><hr>";
        foreach ($userData as $value) {
            echo "Nome: " . $value->name . "<br>";
            echo "E-mail: " . $value->email . "<br>";
            echo $value->active ? "Status: Ativo!" : "Status: Inativo!" . "<br>";
            echo "<br><hr>";
        }
    }
}
