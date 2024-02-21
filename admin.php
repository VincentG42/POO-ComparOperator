<?php

require_once './config/connect_db.php';
require_once './config/autoload.php';
// logique session admin (redirect si PAS admin)
if($_SESSION['pseudo'] != 'admin'  && $_SESSION['password'] != 'presqueadmin'){

    session_destroy();

    header('Location: index.php');

}
    $manager = new Manager($db);
    // liste des operators en bdd
    $operatorList = $manager->hydrateAllOperators($manager->getAllOperator());
// var_dump($operatorList);

    // liste des destinations uniques 
    // $globalDestinationList = $manager->getAllDestination();
    $globalDestinationList = ['Rome', 'Londres', 'Monaco', 'Tunis', 'Barcelone', 'Greece', 'Istanbul', 'Moscou', 'Portugal','Vienne']

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/output.css">

        <title>Tour operator Admin Panel</title>
    </head>

    <body>
        <div class="flex flex-col lg:flex-row justify-around p-8 gap-1">

        <form action="./process/connect_process.php" method='post'>
            <input type="hidden" name="get_back" value ="get_back"> 
            <button type="submit" class="text-white rounded bg-blue-700 py-1.5 px-2">Retour accueil</button>
        </form>

        <!-- ajout tour operator -->
            <div class="border-2 border-black flex-col p-8 mb-2 h-min">
                <h2 class="text-lg font-bold">Ajout Tour Opérateur</h2>

                <form action="./process/admin_create_TO_process.php" method="post" class="max-w-sm mx-auto">
                    <div class="mb-5">
                        <label for="name_TO" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom du Tour Opérateur :</label>
                        <input type="text" id="name_TO" name="name_TO" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div class="mb-5">
                        <label for="Site" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Site :</label>
                        <input type="Site" id="Site" name="site" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div class="flex items-start mb-5">
                        <div class="flex items-center h-5">
                            <input id="premium" type="checkbox" name="premium" value="true" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                        </div>
                        <label for="premium" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Premium</label>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Enregistrer le tour opérateur</button>
                </form>
            </div>

    <!-- manager tour operator -->
            <div class="border-2 border-black flex p-8 mb-2 gap-2 flex-col max-w">
                <h2 class="text-lg font-bold text-center w-full">Tour Operateurs Manager</h2>
                <div class='flex gap-4 flex-wrap'>
                <!-- creaton 'cards' des tours opeator -->
                <?php foreach ($operatorList as $operator) {
                    $destinationlist = $manager->hydrateDestination($manager->getAllDestinationByOperator($operator->getId())) ?>
                    <div class="w-full p-6 bg-white flex border border-gray-400 shadow">
                        <div class="flex-col gap-2 w-full">
                            <h3 class="font-medium w-full text-center mb-2">
                                <!-- recuperation du nom du TO -->
                                <?= $operator->getName() ?>
                            </h3>
                            <div class='flex flex-row mb-2 gap-2'>
                                <p class= 'font-medium'>
                                    Premium : <?= $operator->getIsPremium() == true ?  'oui' : 'non' ?>
                                </p>
                                <!-- form changement de statut premium -->
                                <form action="./process/admin_manage_TO_process.php" method="post" class='flex gap-2 w-1/2'>
                                    <select id="change_premium" name='change_premium' class="bg-gray-200 w-1/5 text-gray-900 rounded text-sm focus:ring-blue-500 focus:border-blue-500 block">
                                        <option value=1>oui</option>
                                        <option value=0>non</option>
                                    </select>
                                    <input type="hidden" name="tour_id" value=<?= $operator->getId() ?>>
                                    <button type="submit" class="text-white rounded bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm w-full sm:w-auto py-1 px-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">changer</button>
                                </form>
                            </div>
                            <!-- form ajout/modif prix destination a un TO -->
                            <form action="./process/admin_manage_TO_process.php" method="post" class='flex w-full justify-start items-center gap-4 border border-gray-300 p-2 mb-2'>
                                
                                    <label for="premium" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ajout Destination :</label>

                                    <select id="add_destination" name='add_destination' class="bg-gray-200 border border-gray-300  rounded text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-1/3">
                                        <option></option>
                                        <?php foreach ($globalDestinationList as $destination) { ?>
                                            <option value=<?= $destination ?>><?= $destination?></option>
                                        <?php } ?>
                                    </select>

                                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">prix :</label>
                                    <input type="price" id="price" name="price" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />

                                    <input type="hidden" name="operator_id" value = <?= $operator -> getID() ?>>
                                
                                <button type="submit" class="text-white rounded bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm w-full sm:w-auto p-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
                            </form>
                            <!-- liste des destination dispo pour le TO -->
                            <div>
                                <p>Propose déjà :</p>
                                <ul class="flex gap-2 mt-1">
                                    <?php foreach ($destinationlist as $destination) { ?>
                                        <li class="flex gap-1"><?= $destination->getLocation() ?> <span>
                                            <!-- form suppression destination -->
                                                <form action="./process/admin_manage_TO_process.php" method="post">
                                                    <input type="hidden" name='destination_to_delete' value=<?= $destination->getId() ?>>
                                                    <button type="submit" class="text-white bg-red-700 rounded hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm sm:w-auto p-1 text-center">X</button>
        
                                                </form>
                                            </span></li>
                                    <?php } ?>
        
                                </ul>
                            </div>
                        </div>

                    </div>
                <?php } ?>
                </div>                    
            </div>
        </div>
    </body>

    </html>
<?php 


?>