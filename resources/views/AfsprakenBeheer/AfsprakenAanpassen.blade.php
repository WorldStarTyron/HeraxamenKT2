<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Afspraak Aanpassen</title>
</head>
<body>
  @include('Layouts.Sidebar')
    <main class="sm:ml-64">
        <div class="p-6 flex justify-center items-center">
            <h2 class="text-2xl font-bold mb-4"> Afspraak Aanpassen </h2>
        </div>

        <form action="{{route('AfsprakenBeheer.update', $afspraak->afspraak_id)}}" method="post" class="w-full max-w-lg m-auto">
            @method('put')
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
                <div class="bg-red-400 text-white p-4 rounded mb-4 text-center font-medium">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="klant_id">
                        Klant
                    </label>
                    <select name="klant_id" id="klant_id" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">-- Kies een klant --</option>
                        @foreach ($klanten as $klant)
                            <option value="{{ $klant->klant_id }}" {{ $afspraak->klant_id == $klant->klant_id ? 'selected' : '' }}>
                                {{ $klant->klant_naam }} - {{ $klant->klant_email }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="Afspraak_title">
                        Titel
                    </label>
                    <input type="text" name="Afspraak_title" id="Afspraak_title" value="{{ $afspraak->Afspraak_title }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Bijv. APK Keuring">
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="Afspraak_datum">
                        Datum
                    </label>
                    <input type="date" name="Afspraak_datum" id="Afspraak_datum" value="{{ $afspraak->Afspraak_datum }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="Afspraak_omschrijving">
                        Omschrijving
                    </label>
                    <textarea name="Afspraak_omschrijving" id="Afspraak_omschrijving" rows="4" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Beschrijf de afspraak...">{{ $afspraak->Afspraak_omschrijving }}</textarea>
                </div>
            </div>

            <div class="flex gap-2 justify-between mt-4">
                <button type="submit" class="text-black bg-green-400 box-border border border-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-400 shadow-xs font-medium leading-5 rounded-lg text-sm px-4 py-2.5 focus:outline-none">Aanpassen</button>
                <a href="{{route('AfsprakenBeheer.index')}}" class="text-black bg-red-400 box-border border border-red-400 hover:bg-red-500 focus:ring-4 focus:ring-red-400 shadow-xs font-medium leading-5 rounded-lg text-sm px-4 py-2.5 focus:outline-none">Terug</a>
            </div>
        </form>

    </main>
</body>
</html>
