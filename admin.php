<?php

require_once './config/connect_db.php';
require_once './config/autoload.php';
// logique session admin -> if  isset & !empty session['pseudo'] = admin && session['password'] =>affichage page else redirect (header location index.php)

$manager = new Manager($db);
// liste des operators en bdd
$operatorList = $manager->hydrateAllOperators($manager->getAllOperator());


// liste des destinations uniques 
$globalDestinationList = $manager->getAllDestination();

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
    <div class="flex justify-around p-8">

    <!-- ajout tour operator -->
        <div class="border-2 border-black flex-col p-8 mb-2">
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
        <div class="border-2 border-black flex-col p-8 mb-2 gap-2">
            <h2 class="text-lg font-bold text-center">Tour Operateurs Manager</h2>
            <!-- creaton 'cards' des tours opeator -->
            <?php foreach ($operatorList as $operator) {
                $destinationlist = $manager->hydrateDestination($manager->getAllDestinationByOperator($operator->getId())) ?>
                <div class="max-w p-6 bg-white border border-gray-400 shadow mb-2">
                    <div class="flex gap-1 w-100">
                        <p class="font-medium">
                            <!-- recuperation du nom du TO -->
                            <?= $operator->getName() ?>
                        </p>
                        <p>
                            Premium : <?= $operator->getIsPremium() == true ?  'oui' : 'non' ?>
                        </p>
                        <!-- form changement de statut premium -->
                        <form action="./process/admin_manage_TO_process.php" method="post" class='flex'>
                            <select id="change_premium" name='change_premium' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full">
                                <option value=1>oui</option>
                                <option value=0>non</option>
                            </select>
                            <input type="hidden" name="tour_id" value=<?= $operator->getId() ?>>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm w-full sm:w-auto p-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">changer</button>
                        </form>
                        <!-- form ajout destination a un TO -->
                        <form action="./process/admin_manage_TO_process.php" method="post" class='flex'>

                            <label for="premium" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ajout Destination</label>

                            <select id="add_destination" name='add_destination' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full">
                                <option></option>
                                <?php foreach ($globalDestinationList as $destination) { ?>
                                    <option value=<?= $destination['location'] ?>><?= $destination['location'] ?></option>
                                <?php } ?>

                            </select>

                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">prix :</label>
                            <input type="price" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />


                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm w-full sm:w-auto p-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ajouter</button>
                        </form>
                    </div>
                    <!-- liste des destination dispo pour le TO -->
                    <div>
                        <ul class="flex gap-2">
                            <?php foreach ($destinationlist as $destination) { ?>
                                <li class="flex"><?= $destination->getLocation() ?> <span>
                                        <form action="./process/admin_manage_TO_process.php" method="post">
                                            <input type="hidden" name='destination_to_delete' value=<?= $destination->getId() ?>>
                                            <button type="submit" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm w-full sm:w-auto p-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">X</button>

                                        </form>
                                    </span></li>
                            <?php } ?>

                        </ul>
                    </div>

                </div>
            <?php } ?>

        </div>
    </div>
</body>

</html>