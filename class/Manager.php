<?php

class Manager{
    private PDO $bdd;

    public function __construct(PDO $db)
    {
        $this ->bdd = $db;
    }

public function getAllDestination() : array {  // retourne un tableau avec nom de ville de destinatoin et bg image
    $request = $this -> bdd -> query("SELECT DISTINCT location, bg_image FROM `destination`");

    $allDestinations = $request ->fetchAll();

    return $allDestinations;
}

public function getOperatorByDestination(string $destinationName){
    $request = $this -> bdd -> prepare ("SELECT * FROM `destination` JOIN tour_operator ON destination.tour_operator_id= tour_operator.id 
                                        WHERE destination.location = :locationName");
    $request ->execute([    
        'locationName' => $destinationName
    ])  ;

    $operatorByDestination = $request -> fetchAll();
}
// tableau de sortie id location price tour_operator_id bg_image id name link grade_count grade_total is_premium



public function checkAuthor(string $name, int $tourOperatorId){
    $request = $this -> bdd -> prepare("SELECT :name FROM review WHERE tour_operator_id = :tour_operator_id");

    $request -> execute ([
        'name' => $name,
        'tour_operator_id' => $tourOperatorId
    ]);

    $testName = $request ->fetch();

    return $testName;
    // pdo select where $author =$name
}
public function createReview(){
    //pdo create
}

public function getreviewByOperatorId (int $operatorId){
    //pdo select review where tour_operator_id = $operatorId
}


public function getAllOperator() : array {
    $request = $this -> bdd -> query("SELECT * FROM `tour_operator`");

    $allOperators = $request ->fetchAll();

    return $$allOperators;
}

public function hydrateAllOperators(array $operators){
    foreach ($operators as $operator ){
        $data = [
            'id'=> $operator['name'],
            'name' => $operator['price'],
            'link' => $operator['link'],
            'gradeCount' => $operator['grade_count'],
            'gradeTotal' => $operator['grade_total'],
            'isPremium' => $operator['is_premium']

        ];
    }

    $newOperator = new TourOperator($data);
    $allObjectsOperators =[];
    $allObjectsOperators[] = $newOperator;

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