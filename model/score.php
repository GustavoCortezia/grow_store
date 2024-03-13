<?php
require_once('./utils/next_id.php');
require_once('./utils/timestamp.php');
require_once('./utils/formatStars.php');

class Score
{
    private $id;
    private $score;
    private $userId;
    private $productId;
    private $createdAt;
    private $modifiedAt;

    public function __construct($score, $userId, $productId)
    {
        $this->id = createId();
        $this->score = $score;
        $this->userId = $userId;
        $this->productId = $productId;

        $actualDate = timestamp();
        $this->createdAt = $actualDate;
        $this->modifiedAt = $actualDate;
    }

    public function add($scoreData)
    {
        array_push($scoreData, $this);
        return $scoreData;
    }

    public function getId(){
        return $this->id;
    }

    public function getProductId(){
        return $this->productId;
    }
   
    public function getScore(){
        return $this->score;
    }
    
    public function update()
    {
    }

    public static function show($id, $scoreData)
    {
        $filtered = array_values(array_filter($scoreData, function ($item) use ($id) {
                return $item->id == $id; 
            })
        );

              
        if ($filtered) {
            $score = $filtered[0];

            echo "Avaliação: " . formatStars($score->score) . "<br>";
            echo "Data: " . $score->modifiedAt->format('d/m/Y H\hi\m') . "<br>";
            echo "<br><hr>";
        } else {
            echo "Avaliação não encontrada.";
        }
    }

    public function delete($idP)
    {
    }

    public static function list($scoreData)
    {
        echo "Lista de avaliações<br><hr>";
        foreach ($scoreData as $score) {

            $formatedScore = '';
            
            for ($i=0; $i < $score->score; $i++) { 
                $formatedScore .= '⭐';
            }

            echo "Avaliação: " . $formatedScore . "<br>";
            echo "Data: " . $score->modifiedAt->format('d/m/Y H\hi\m') . "<br>";
            echo "<br><hr>";
        }
    }
}
