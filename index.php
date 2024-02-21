<?php
include_once './process/index_process.php';
include_once './partials/header.php';

?>

<main>
  <div id="hero" class='h-80'>

  </div>

  <section class='p-8 flex justify-center items-center gap-2 flex-wrap'>
    <?php foreach ($destinationList as $destination) { ?>
      <div class="flex-none md:w-1/4 w-1/3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
          <img class=" rounded-t-lg" src="./img/<?= $destination['location'] ?>.jpg" alt="product image" />
        
          
          <div class="flex items-center justify-between">
            <div class="px-5 p-5">   
              <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white text-center "><?= $destination['location'] ?></h5>
            </div>
            <!-- <span class="text-3xl font-bold dark:text-white"> A partir de $599</span> -->
            <!-- <a href="#" class="text-white bg-teal-300 hover:bg-teal-600 font-medium  text-sm px-5 py-2.5 text-center rounded-lg  ">GO !!</a> -->
            <form action="./location.php" method='post' class='p-2 w-100'>
              <input type="hidden" name="location" value=<?= $destination['location'] ?>>
              <button type="submit" class="text-white bg-teal-300 hover:bg-teal-600 font-medium text-sm px-5 py-2.5 text-center rounded-lg"> Go!</button>
            </form>
          </div>
      </div>

    <?php } ?>
  </section>
</main>



<?php

include_once('./partials/footer.php');

?>