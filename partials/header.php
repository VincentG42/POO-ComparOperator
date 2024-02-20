<?php

require_once './config/connect_db.php';
require_once './config/autoload.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour operator</title>
    <link rel="stylesheet" href="./css/output.css">

</head>

<body>
    <header class="w-full bg-slate-600 flex justify-around py-5">
        <a href="./index.php"><img src="./img/imgs_diverses/plane.png" alt="logo avion"></a>
        <h1 class="w-max text-center text-teal-300 text-5xl font-extrabolditems-center">TOUR OPERATOR</h1>
        <div>
            <form class="max-w-md mx-auto flex gap-2 items-center" action ="./process/connect_process.php" method="post">
                <div class="relative z-0 w-full mb-5 group">
                    <input type="pseudo" name="floating_pseudo" id="floating_pseudo" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Pseudo " required />
                    <label for="floating_pseudo" class="peer-focus:font-small absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"></label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="password" name="floating_password" id="floating_password" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Password " required />
                    <label for="floating_password" class="peer-focus:font-small absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"></label>
                </div>
                <button type="submit" class="text-slate-700 bg-teal-300 hover:bg-teal-800 h-8 focus:ring-4 focus:outline-none focus:ring-teal-300 font-small rounded-lg text-sm w-full sm:w-auto px-3 py-1 text-center dark:bg-blue-600">Submit</button>
            </form>
        </div>

    </header>

