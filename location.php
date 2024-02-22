<?php
include_once './partials/header.php';
if (isset($_POST['location']) && !empty($_POST['location'])){
// var_dump($_POST);
    $_SESSION['location'] = $_POST['location'];

}

$manager = new Manager($db);
$destinationOperatorList = $manager -> getOperatorByDestination($_SESSION['location']);
// var_dump($destinationOperatorList)[0]['tour_operator_id'];
$operators = $manager ->hydrateAllOperators($destinationOperatorList);
$destinations = $manager ->hydrateDestination($destinationOperatorList);

?>
<main>

    <section id="<?= strtolower($destinations[0] ->getLocation() )?>" class="h-screen">
        <div class='p-12 flex flex-col md:flex-row gap-2 justify-center items-center flex-wrap'>   
        <?php for ($i=0; $i<count($operators); $i+=1){ ?>
        
            <div class="w-100 md:w-1/2 rounded-lg shadow-lg border border-slate-800 bg-slate-800/75 h-1/3">
                <div class="px-6 py-4 flex flex-col justify-between h-full">

                    <div class="font-bold text-xl mb-2 text-teal-300">
                        <div class= 'flex justify-between'>
                            <p><?= $operators[$i] -> getName() ?></p>
                            <?php if ($operators[$i] ->getIsPremium() === true){?>
                                <a href=<?= $operators[$i] ->getLink()?> class="underline text-sm font-thin"><?= $operators[$i] -> getLink()?></a>
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
                    <p class="text-slate-200 text-base">Prix: <span class=" pricefont-bold text-teal-300 underline underline-offset-2"> <?= $destinations[$i] ->getPrice()?>€</span></p>


                                    <!--  div comments -->
                    <div class="border rounded-lg px-3 py-2 w-full mt-4 text-center h-32 overflow-y-scroll">
                                    <!-- comments -->
                        <div  class='block comments'>
                            <button class="add_comment text-teal-300 mt-0 mb-1 hover:underline">Ajouter un commentaire</button>
                            <?php $reviews = $manager -> getreviewByOperatorId($operators[$i]-> getId());
                            // var_dump($reviews);
                            foreach ($reviews as $review){ ?> 
                                <p class="text-slate-200 text-sm text-start">
                                    <span class="font-bold"><?= $review ->getAuthor()?></span> :" <span class="font-light italic"><?= $review ->getMessage()?></span>"
                                </p>
                            <?php } ?>
                        </div>
                        
                        <!-- ajout de commentaires -->
                        <div class="add_comment_form hidden">
                            <button class="w-full cancel_submit bg-transparent text-teal-300">X</button>
                            
                            <form action="./process/comments_process.php" class="flex flex-wrap gap-1" method="post" >
                                <input type="hidden" name="tour_operator_id" value =<?= $operators[$i] -> getID() ?>>
                                <div class="relative z-0 w-full  group">
                                    <input type="text" id="author_<?= $operators[$i] -> getID() ?>"  name="author"  class="block py-2.5 px-0 text-sm text-slate-200 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-teal-300 focus:outline-none focus:ring-0 focus:border-teal-300 peer" placeholder="Votre nom " required />
                                    <label for='author_<?= $operators[$i] -> getID() ?>' class="peer-focus:font-small absolute text-sm text-slate-200  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"></label>
                                </div>
                                <div class="relative z-0 w-full  group">
                                    <input type="text" name="message"  id="message_<?= $operators[$i] -> getID() ?>" class="block py-2.5 px-0 text-sm text-slate-200  bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-teal-300 focus:outline-none focus:ring-0 focus:border-teal-300 peer" placeholder="Votre message " required />
                                    <label for="message_<?= $operators[$i] -> getID() ?>" class="peer-focus:font-small absolute text-sm text-slate-200  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-teal-300 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"></label>
                                </div>
                                <button type="submit" class=" comment_submit text-slate-700 bg-teal-300 hover:bg-teal-800 h-8 focus:ring-4 focus:outline-none focus:ring-teal-300 font-small rounded-lg text-sm w-full sm:w-auto px-3 py-1 text-center dark:bg-teal-600">Envoyer</button>
                            </form>
                        </div>
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