<?php

require_once './config/connect_db.php';
require_once './config/autoload.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizons Infinis</title>
    <link rel="stylesheet" href="./css/output.css">

</head>

<body>
    <header class="w-full bg-slate-800 flex flex-col md:flex-row justify-center md:justify-between flex-wrap px-5 py-2 items-center">
        <a href="./index.php" class="text-teal-300">Accueil</a>
        <h1 class=" text-center text-teal-300 text-3xl"> Horizons Infinis</h1>
        <div class='flex items-center'>
            <form class="flex gap-2 items-center" action="./process/connect_process.php" method="post">
                <div class="relative z-0 w-16 mb-5 group">
                    <input type="pseudo" name="floating_pseudo" id="floating_pseudo" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-teal-300 peer" placeholder="Pseudo " required />
                    <label for="floating_pseudo" class="peer-focus:font-small absolute text-sm text-slate-200  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"></label>
                </div>
                <div class="relative z-0 w-16 mb-5 group">
                    <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-teal-300" placeholder="Password " required />
                    <label for="floating_password" class="peer-focus:font-small absolute text-sm text-slate-200  dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"></label>
                </div>
                <button type="submit" class="text-slate-700 bg-teal-300 hover:bg-teal-800 h-8 focus:ring-4 focus:outline-none focus:ring-teal-300 font-small rounded-lg text-sm w-24 sm:w-auto px-3 py-1 text-center">Submit</button>
            </form>
        </div>

    </header>