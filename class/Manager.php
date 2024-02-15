<?php

class Manager{
    private PDO $bdd;

    public function __construct(PDO $db)
    {
        $this ->bdd = $db;
    }

public function getAllDestination() : array {  // retourne un tableau avec nom de ville de destination et bg image
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

    return $operatorByDestination;
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

    return $allOperators;
}

public function hydrateAllOperators(array $operators){
    $allObjectsOperators =[];
    foreach ($operators as $operator ){
        $data = [
            'id'=> $operator['id'],
            'name' => $operator['name'],
            'link' => $operator['link'],
            'gradeCount' => $operator['grade_count'],
            'gradeTotal' => $operator['grade_total'],
            'isPremium' => $operator['is_premium']

        ];
        $newOperator = new TourOperator($data);
        $allObjectsOperators[] = $newOperator;
    }


    return $allObjectsOperators;

}

public function updateOperatorToPremium(int $operatorId, int $premiumStatus) : void {
    $request = $this -> bdd ->prepare ("UPDATE tour_operator SET is_premium = :is_premium WHERE id = :id");

    $request -> execute ([
        'id' => $operatorId,
        'is_premium' => $premiumStatus
    ]);
}

public function createTourOperator(array $data) : void {
    $request = $this->bdd->prepare("INSERT INTO  tour_operator (name, link, grade_count, grade_total, is_premium) 
                                    VALUES (:name, :link, :grade_count, :grade_total, :is_premium)");
                    $request->execute([
                                'name' => $data['name_TO'],
                                'link' => $data['link'],
                                'grade_count' => $data['grade_count'],
                                'grade_total' => $data['grade_total'],
                                'is_premium' => $data['is_premium']
                            ]);
}                 

public function createDestination(){
    //pdo create
}

public function getAllDestinationByOperator(int $operatorId) : array {
    $request = $this -> bdd-> prepare ("SELECT * FROM `destination` WHERE tour_operator_id = :id");

    $request -> execute ([
        'id'=> $operatorId
    ]);

    $destinations = $request-> fetchAll();
    return $destinations;

}

public function hydrateDestination(array $destinations) : array{
    $alldestination =[];
    foreach($destinations as $destination){

        $data = [
            'id'=> $destination['id'],
            'location' => $destination['location'],
            'price' => $destination['price'],
            'tourOperatorId' => $destination['tour_operator_id'],
            'bgImage' => $destination['bg_image'],

        ];
        $newDestination = new Destination($data);
        $alldestination[] = $newDestination;
    }


    return $alldestination;

    }
}






?>