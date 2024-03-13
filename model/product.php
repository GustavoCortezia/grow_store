<?php
require_once('./utils/next_id.php');
require_once('./utils/formatStars.php');

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $available;
    private $score;

    public function __construct($nameP, $descriptionP, $priceP, $available = true)
    {
        $this->id = createId();
        $this->name = $nameP;
        $this->description = $descriptionP;
        $this->price = $priceP;
        $this->available = $available;
    }

    public function add($productData)
    {
        array_push($productData, $this);
        return $productData;
    }

    public function getId(){
        return $this->id;
    }

    public function update($idP, $productData, $nameP, $descriptionP, $priceP, $availableP, $scoreP)
    {
        $filtered = array_values(array_filter($productData, function ($item) use ($idP) {
            return $item->id == $idP; 
        })
        );

        $filtered[0]->name = $nameP;
        $filtered[0]->description = $descriptionP;
        $filtered[0]->price = $priceP;
        $filtered[0]->available = $availableP; 
        $filtered[0]->score = $scoreP; 

        if ($filtered) {
            echo "Nome: " . $filtered[0]->name . "<br>";
            echo "Descrição " . $filtered[0]->description . "<br>";
            echo "Preço: " . $filtered[0]->price . "<br>";
            echo $filtered[0]->available ? "Status: Disponível!" : "Status: Indisponível!" . "<br>";
            echo "<br><hr>";
        } else {
            echo "Produto não encontrado.";
        }

    }

    public static function show($idP, $productData)
    {
        $filtered = array_values(array_filter($productData, function ($item) use ($idP) {
            return $item->id == $idP; 
        })
    );

                
        if ($filtered) {
            echo "Nome: " . $filtered[0]->name . "<br>";
            echo "Descrição " . $filtered[0]->description . "<br>";
            echo "Preço: " . $filtered[0]->price . "<br>";
            echo $filtered[0]->available ? "Status: Disponível!" : "Status: Indisponível!" . "<br>";
            echo "<br><hr>";
        } else {
            echo "Produto não encontrado.";
        }
    }

    public function delete($idP, $productData)
    {
        $filtered = array_values(array_filter($productData, function ($item) use ($idP) {
            return $item->id == $idP;
        }));

        array_pop($productData, $filtered);

    }

    public static function list($userData)
    {
        echo "Lista de produtos:<br><hr>";
        foreach ($userData as $value) {
            echo "Nome: " . $value->name . "<br>";
            echo "E-mail: " . $value->email . "<br>";
            echo $value->active ? "Status: Ativo!" : "Status: Inativo!" . "<br>";
            echo "<br><hr>";
        }
    }

    private function calculateAverageScore($scoreData) {
        $filteredScore = array_values(
            array_filter($scoreData, function ($item) {
                return $item->getProductId() == $this->id;
            }
        ));

        $sum = array_reduce(
            $filteredScore,
            function ($acc, $score) {
                return $acc + $score->getScore();
            },
            0
        );

        return round($sum / count($filteredScore));
    }

    public function showScore($scoreData) 
    {
        $media = $this->calculateAverageScore($scoreData);

        echo formatStars($media);
    }
}
