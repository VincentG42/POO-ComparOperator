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
    $request = $this -> bdd -> prepare ("SELECT destination.*, tour_operator.name, tour_operator.link, tour_operator.is_premium, tour_operator.grade_count, tour_operator.grade_total, tour_operator.logo
                                            FROM `destination` 
                                            JOIN tour_operator ON destination.tour_operator_id = tour_operator.id 
                                            WHERE destination.location = :locationName");
    $request ->execute([    
        'locationName' => $destinationName
    ])  ;

    $operatorByDestination = $request -> fetchAll();

    return $operatorByDestination;
}
// tableau de sortie id |location | price | tour_operator_id | bg_image | id |name |link |grade_count | grade_total| is_premium



public function checkAuthor(string $name, int $tourOperatorId){
    $request = $this -> bdd -> prepare("SELECT :name FROM review WHERE tour_operator_id = :tour_operator_id");

    $request -> execute ([
        'name' => $name,
        'tour_operator_id' => $tourOperatorId
    ]);

    $testName = $request ->fetch();

    return $testName;
}

public function createReview(array $data) : void {
    if(!$this -> checkAuthor($data['author'], $data['tour_operator_id'])){

        $request = $this->bdd->prepare("INSERT INTO  review (message, author, tour_operator_id) 
                                        VALUES (:message, :author, :tour_operator_id)");
        $request->execute([
                    'message' => $data['message'],
                    'author' => $data['author'],
                    'tour_operator_id' => $data['tour_operator_id'],
                    
                ]);
    }
}

public function hydratereviews(array $reviews) : array{
    $allReviews =[];
    foreach($reviews as $review){

        $data = [
            'id'=> $review['id'],
            'message' => $review['message'],
            'author' => $review['author'],
            'tourOperatorId' => $review['tour_operator_id'],

        ];
        $newReview = new Review($data);
        $allReviews[] = $newReview;
    }


    return $allReviews;

    
}
public function getreviewByOperatorId (int $operatorId) : array{
    $request = $this -> bdd -> prepare("SELECT * FROM review WHERE tour_operator_id = :tour_operator_id");

    $request -> execute ([
        'tour_operator_id' => $operatorId
    ]);

    $reviews = $request ->fetchAll();

    $reviewsObject = $this -> hydratereviews($reviews);

    return $reviewsObject;
}


public function getAllOperator() : array {
    $request = $this -> bdd -> query("SELECT * FROM `tour_operator`");

    $allOperators = $request ->fetchAll();

    return $allOperators;
}

public function hydrateAllOperators(array $operators){
    $allObjectsOperators =[];
    foreach ($operators as $operator ){



        if(isset($operator['tour_operator_id'])){
            $id = $operator['tour_operator_id'];
        }else {
            $id =$operator['id'];
        }
            $data = [
                'id' => $id,
                'name' => $operator['name'],
                'link' => $operator['link'],
                'gradeCount' => $operator['grade_count'],
                'gradeTotal' => $operator['grade_total'],
                'isPremium' => $operator['is_premium']
                // 'logo' => $operator['logo']
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

public function updatePriceDestination(int $destinationId, int $price) : void {
    $request = $this -> bdd ->prepare ("UPDATE destination SET price = :price WHERE id = :id");

    $request -> execute ([
        'id' => $destinationId,
        'price' => $price
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

public function createDestination(array $data) : void{
    $request = $this -> bdd -> prepare ("INSERT INTO destination (location, price, tour_operator_id, bg_image)
                                            VALUES (:location, :price, :tour_operator_id, :bg_image)");

    $request ->execute ([
                        'location' => $data["location"],
                        'price' => $data["price"], 
                        'tour_operator_id' => $data["tour_operator_id"], 
                        'bg_image' => $data["bg_image"]
    ]);

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

public function checkDestinationOperator(string $name, int $tourOperatorId){
    $request = $this -> bdd -> prepare("SELECT * FROM destination WHERE tour_operator_id = :tour_operator_id AND location = :location ");

    $request -> execute ([
        'location' => $name,
        'tour_operator_id' => $tourOperatorId
    ]);

    $testDestination = $request ->fetch();

    return $testDestination;
}

public function deleteDestination(int $destinationId){
    $request  =  $this ->bdd -> prepare ("DELETE FROM destination WHERE id= :id");
            $request->execute([
                'id' => $destinationId
            ]);
}


}


?>