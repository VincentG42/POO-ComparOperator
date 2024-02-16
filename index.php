<?php
include_once ('./partials/header.php');
require_once ('./process/index_process.php');

?>


<div  id ='hero' class='h-52'>
</div>

<section id="destinations">


</section>




  <section>
    <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <a href="#">
        <img class=" rounded-t-lg" src="./img/Istanbul.jpg" alt="product image" />
      </a>
      <div class="px-5 pb-5">
        <a href="#">
          <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">Votre destinations :</h5>
        </a>

      </div>
      <div class="flex items-center justify-between">
        <span class="text-3xl font-bold dark:text-white">$599</span>
        <a href="#" class="text-white bg-blue-500 font-medium  text-sm px-5 py-2.5 text-center rounded-lg  ">GO !!</a>
      </div>
    </div>
    </div>
  </section>










  <section class=" ">

    <div class="max-w-sm rounded-lg overflow-hidden shadow-lg border border-gray-600">
      <div class="px-6 py-4">

        <div class="font-bold text-xl mb-2">

          <div>
            <p>Nom du tour opérateur</p>
          </div>

            <span class="flex justify-start">

              <svg class="h-6 w-6 text-yellow-500 fill-current mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M10 1l2.5 6h6.5l-5 4.5 2 7-5-4.5-5 4.5 2-7-5-4.5h6.5l2.5-6z" />
              </svg>

              <span class="text-gray-700">4.5</span>

            </span>
          
        </div>




        <p class="text-gray-700 text-base">Prix: <span id="price" class="font-bold"></span></p>
        <div class="mt-4">
          <input id="pseudo-input" class="border rounded-lg px-3 py-2 w-full" type="text" placeholder="Votre pseudo">
          <textarea id="comment-input" class="border rounded-lg px-3 py-2 w-full mt-2" placeholder="Ajouter un commentaire..."></textarea>
          <button onclick="addComment()" class="bg-blue-500  text-white font-bold py-2 px-4 rounded mt-2">Envoyer</button>
        </div>
        <div id="comments" class="border rounded-lg px-3 py-2 w-full mt-4 text-center">
          <!-- Les commentaires seront affichés ici -->
        </div>
      </div>
    </div>

  </section>






<?php

include_once ('./partials/footer.php');

?>