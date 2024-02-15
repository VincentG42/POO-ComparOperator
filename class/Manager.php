<?php

class Manager{
    private PDO $bdd;

public function getAllDestination(){
    // pdo select
}

public function getOperatorByDestination(int $destinationId){
    // pdo select where id = $destinationId
}

public function checkAuthor(string $name){
    // pdo select where $author =$name
}
public function createReview(){
    //pdo create
}

public function getreviewByOperatorId (int $operatorId){
    //pdo select review where tour_operator_id = $operatorId
}

public function getAllOperator(){
    //pdo select 
}

public function updateOperatorToPremium($operatorId){
    // pdo update ispremium where id= $operatorId;
}

public function createTourOperator(){
    //pdo create
}

public function createDestination(){
    //pdo create
}


}

?>