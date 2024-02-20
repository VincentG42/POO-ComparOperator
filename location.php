<?php
include_once './partials/header.php';
if (isset($_POST['location']) && !empty($_POST['location'])){
// var_dump($_POST);
    $location = $_POST['location'];
// var_dump($location);
    $manager = new Manager($db);
    $destinationOperatorList = $manager -> getOperatorByDestination($location);
// var_dump($destinationOperatorList)[0]['tour_operator_id'];
$operators = $manager ->hydrateAllOperators($destinationOperatorList);
$destinations = $manager ->hydrateDestination($destinationOperatorList);



// var_dump($operators);
// var_dump($destinations[0]);

}


?>
<main>

    <section id="<?= strtolower($destinations[0] ->getLocation() )?>" class="h-screen">
        <div class='p-12 flex gap-2 justify-center items-center'>   
        <?php for ($i=0; $i<count($operators); $i+=1){ ?>
        
            <div class="max-w-sm rounded-lg overflow-hidden shadow-lg border border-gray-600 bg-slate-800/75 size-80">
                <div class="px-6 py-4 flex flex-col justify-between h-full">

                    <div class="font-bold text-xl mb-2 text-teal-300">
                        <div class= 'flex justify-between'>
                            <p><?= $operators[$i] -> getName() ?></p>
                            <?php if ($operators[$i] ->getIsPremium() === true){?>
                                <a href=<?= $operators[$i] ->getLink()?> class="underline text-sm font-thin"><?= $operators[$i] ->getLink()?></a>
                            <?php } ?>
                        </div>

                        <span class="flex justify-start">

                        <svg class="h-6 w-6 text-yellow-500 fill-current mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M10 1l2.5 6h6.5l-5 4.5 2 7-5-4.5-5 4.5 2-7-5-4.5h6.5l2.5-6z" />
                        </svg>

                        <span class="text-slate-200">
                            <?php if($operators[$i] ->getGradeCount() !=0){ 
                                echo $operators[$i] ->getGradeTotal()/$operators[$i] ->getGradeCount().'/5';
                                } else{ ?>
                                    <p class='text-xs text-teal-300 '><i> Soyez le premier à noter ce tour opérateur</i></p>
                                <?php } ?>
                        </span>

                        </span>

                    </div>

                    <div>
                        <p class="text-slate-200">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae, molestias.... <span><a href="#" class=" text-teal-300 underline text-sm font-thin" >Réservez</a></span></p>
                    </div>


                    <!-- <p class="text-slate-700 text-base">Prix: <span id="price" class="font-bold text-teal-300 underline underline-offset-2"> <?= $destinations[$i] ->getPrice()?>€</span></p>
                    <div class="mt-4">
                        <input id="pseudo-input" class="border rounded-lg px-3 py-2 w-full" type="text" placeholder="Votre pseudo">
                        <textarea id="comment-input" class="border rounded-lg px-3 py-2 w-full mt-2" placeholder="Ajouter un commentaire..."></textarea>
                        <button onclick="addComment()" class="bg-teal-300  text-slate-700 font-bold py-2 px-4 rounded mt-2">Envoyer</button>
                    </div> -->
                    <div id="comments" class="border rounded-lg px-3 py-2 w-full mt-4 text-center h-32 overflow-y-scroll">
                        <?php $reviews = $manager -> getreviewByOperatorId($operators[$i]-> getId());
                            // var_dump($reviews);
                            foreach ($reviews as $review){ ?> 
                                <p class="text-slate-200 text-sm text-start">
                                    <span class="font-bold"><?= $review ->getAuthor()?></span> :" <span class="font-light italic"><?= $review ->getMessage()?></span>"
                                </p>
                            <?php } ?>
                        
                    </div>
                </div>
            </div>
        <?php } ?>  
        </div>   
    </section>



</main>



<?php
include_once './partials/footer.php';

?>