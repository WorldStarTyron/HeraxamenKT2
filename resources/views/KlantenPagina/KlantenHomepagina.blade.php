<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Homepagina</title>
</head>
<body>
@include('Layouts.SidebarUser')
    <main class="sm:ml-64">
        @auth
        <div class="p-6 flex justify-center items-center">
            <h2 class="text-2xl font-bold mb-4"> Welkom {{Auth::user()->klant_naam}}</h2>
        </div>
      @endauth
    
    </main>