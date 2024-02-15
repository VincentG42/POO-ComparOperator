<?php

require_once './config/connect_db.php';
require_once './config/autoload.php';

// logique session admin -> if  isset & !empty session['pseudo'] = admin && session['password'] =>affichage page else redirect (header location index.php)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour operator Admin Panel</title>
</head>

<body>
    <div>
        <div>
            <h2>Ajout Tour Opérateur</h2>

            <form action="./process/admin_process.php" method='post'>

                
                    <div class="mt-4">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <label for="name_TO" class="block text-sm font-medium leading-6 text-gray-900">Nom du Tour opérateur</label>                          
                            <input type="text" name="name_TO" id="name_TO" autocomplete="name_TO" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                
                    <div class="mt-4">
                        <div class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                            <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Site</span>
                            <input type="text" name="site" id="site" autocomplete="site" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="flex h-6 items-center">
                        <legend class="text-sm font-semibold leading-6 text-gray-900">Premium</legend>
                        <input id="premium" name="premium" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                    </div>


                <button type="submit" class="btn btn-success my-3">Ajout tour Opérateur</button>


            </form>
        </div>
        <div></div>
    </div>
</body>

</html>