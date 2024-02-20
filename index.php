<?php
include_once './process/index_process.php';
include_once './partials/header.php';

?>

<main>
  <div id="hero" class='h-80'>

  </div>

  <section class='p-8 flex  justify-center gap-2 flex-wrap'>
    <?php foreach ($destinationList as $destination) { ?>
      <div class="flex-none w-1/4 max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
          <img class=" rounded-t-lg" src="./img/<?= $destination['location'] ?>.jpg" alt="product image" />
        </a>
        <div class="px-5 pb-5">
          <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white text-center "><?= $destination['location'] ?></h5>
          </a>

        </div>
        <div class="flex items-center justify-between">
          <!-- <span class="text-3xl font-bold dark:text-white"> A partir de $599</span> -->
          <!-- <a href="#" class="text-white bg-teal-300 hover:bg-teal-600 font-medium  text-sm px-5 py-2.5 text-center rounded-lg  ">GO !!</a> -->
          <form action="./location.php" method='post'>
            <input type="hidden" name="location" value=<?= $destination['location'] ?>>
            <button type="submit" class="text-white bg-teal-300 hover:bg-teal-600 font-medium  text-sm px-5 py-2.5 text-center rounded-lg"> Go!</button>
          </form>
        </div>
      </div>

    <?php } ?>
  </section>
</main>



<?php

include_once('./partials/footer.php');

?>