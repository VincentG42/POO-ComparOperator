<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/output.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <title>Document</title>
</head>

<body class="">
  <header class="bg-slate-400 h-32">
    <nav>

    </nav>
    <section class="bg-slate-100 h-24">

    </section>
  </header>


  <section class="grid grid-rows-4 grid-flow-col gap-4 flex justify-center align-center">

    <div class="p-8 h-64 w-64 bg-blue">fsdfsfd</div>
    <div class="p-8 h-64 w-64 bg-blue">fsdfsfd</div>
    <div class="p-8 h-64 w-64 bg-blue">fsdfsfd</div>
    <div class="p-8 h-64 w-64 bg-blue">fsdfsfd</div>
    <div class="p-8 h-64 w-64 bg-blue">fsdfsfd</div>
    <div class="p-8 h-64 w-64 bg-blue">fsdfsfd</div>
    <div class="p-8 h-64 w-64 bg-blue">fsdfsfd</div>
    <div class="p-8 h-64 w-64 bg-blue">fsdfsfd</div>
    <div class="p-8 h-64 w-64 bg-blue">fsdfsfd</div>
    <div class="p-8 h-64 w-64 bg-blue">fsdfsfd</div>


  </section>


<section class="flex justify-center ">

<div class="max-w-sm rounded-lg overflow-hidden shadow-lg border border-gray-600">
  <div class="px-6 py-4">
    <div class="font-bold text-xl mb-2">Nom du tour opérateur</div>
    <p class="text-gray-700 text-base">Prix: <span id="price" class="font-bold"></span></p>
    <div class="mt-4">
      <input id="pseudo-input" class="border  px-3 py-2 w-full" type="text" placeholder="Votre pseudo">
      <textarea id="comment-input" class="border rounded-md px-3 py-2 w-full mt-2" placeholder="Ajouter un commentaire..."></textarea>
      <button onclick="addComment()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-2">Envoyer</button>
    </div>
    <div id="comments" class="mt-4 text-center">
      <!-- Les commentaires seront affichés ici -->
    </div>
  </div>
</div>

</section>


  


  <script src="./js/main.js"></script>
</body>


</html>