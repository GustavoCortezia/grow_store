<?php
require_once("./model/user.php");
require_once('./data/user_data.php');
require_once('./model/product.php');
require_once('./data/product_data.php');
require_once('./data/comment_data.php');
require_once("./model/comment.php");
require_once("./model/score.php");
require_once('./data/score_data.php');

echo "TESTEEEE";

$newUser = new User('pedro','pedro@bol.com','1234');
// $newUser2 = new User('José','jose@bol.com','5555');
$userData = $newUser->add($userData);

// $userData = $newUser2->add($userData);

$newProduct = new Product('Lápis', 'Escreve bem', '2');
$productData = $newProduct->add($productData);

$newComment = new Comment('12.03', 'Produto muito bom', $newUser->getId(), '1');
$commentData = $newComment->add($commentData);

Comment::show($newComment->getId() , $commentData);

$score1 = new Score(1, $newUser->getId(), $newProduct->getId());
$score2 = new Score(2, $newUser->getId(), $newProduct->getId());
$score3 = new Score(3, $newUser->getId(), $newProduct->getId());
$score4 = new Score(4, $newUser->getId(), $newProduct->getId());
$score5 = new Score(5, $newUser->getId(), $newProduct->getId());
$score6 = new Score(10, $newUser->getId(), $newProduct->getId());

$scoreData = $score1->add($scoreData);
$scoreData = $score2->add($scoreData);
$scoreData = $score3->add($scoreData);
$scoreData = $score4->add($scoreData);
$scoreData = $score5->add($scoreData);
$scoreData = $score6->add($scoreData);

$newProduct->showScore($scoreData);

