<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title> Klanten Toevoegenagina </title>
</head>
<body>
  @include('Layouts.Sidebar')
    <main class="sm:ml-64">
        <div class="p-6 flex justify-center items-center">
            <h2 class="text-2xl font-bold mb-4"> Klanten Toevoegen </h2>
        </div>


        <form action="{{route('klantenBeheer.store')}}" method="post" class="w-full max-w-lg m-auto">
            @method('post')
            @csrf

                @if (session('success'))
        <div class="bg-green-400 text-white p-4 rounded mb-4 text-center font-medium">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-400 text-white p-4 rounded mb-4 text-center font-medium">
            {{ session('error') }}
        </div>
    @endif

        @if ($errors->any())
    <div class="bg-red-400 text-white p-4 rounded mb-4 text-center font-mediumanger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
        First Name
      </label>
        <input text="text"   name="klant_naam" id="klant_naam"   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="John Doe">
      
    </div>
    <div class="w-full md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
        Email
      </label>
      <input text="text"   name="klant_email" id="klant_email"   class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Example@gmail">
    </div>
  </div>
  <div class="flex flex-wrap -mx-3 mb-6">
    <div class="w-full px-3">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Telefoon
      </label>
      <input type="text" name="klant_telefoon" id="klant_telefoon" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
      <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
    </div>
  </div>
  
  <div class="flex flex-wrap -mx-3 mb-2">
     <div class="mt-3 w-full">
              <label for="klant_role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kies Gebruiker Role</label>
              <select name="klant_role" id="klant_role" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-l " required> 
           @foreach ($KlantRole as $Roletype)
            <option value="{{ $Roletype }}" {{ old('Roletype') == $Roletype ? 'selected' : '' }}>{{ $Roletype }}</option>
                @endforeach
              </select>
          </div> 
  </div>

  <div class="flex gap-2  justify-between mt-4">
    <button type="submit" class="text-black bg-green-400 box-border border border-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-400 shadow-xs font-medium leading-5 rounded-lg text-sm px-4 py-2.5 focus:outline-none">Toevoegen</button>

    <a href="{{route('KlantenBeheer.index')}}" class="text-black bg-red-400 box-border border border-red-400 hover:bg-red-500 focus:ring-4 focus:ring-red-400 shadow-xs font-medium leading-5 rounded-lg text-sm px-4 py-2.5 focus:outline-none">terug</a>
  </div>
</form>


    
    </main>