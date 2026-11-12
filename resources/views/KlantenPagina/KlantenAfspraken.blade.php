<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Mijn Afspraken</title>
</head>
<body>
  @include('Layouts.SidebarUser')
    <main class="sm:ml-64">
        <div class="p-6 flex justify-center items-center">
            <h2 class="text-2xl font-bold mb-4"> Mijn Afspraken </h2>
        </div>

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

        <div class="px-6 mb-8">
            <h3 class="text-lg font-semibold mb-4">Nieuwe Afspraak Maken</h3>
            <form action="{{route('KlantenAfspraken.store')}}" method="post" class="w-full max-w-lg bg-gray-50 p-6 rounded-lg border border-gray-200">
                @csrf

                <div class="mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="Afspraak_title">
                        Type Onderhoud
                    </label>
                    <select name="Afspraak_title" id="Afspraak_title" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="">Kies een type</option>
                        @foreach ($beurten as $beurt)
                            <option value="{{ $beurt->beurt_naam }}" {{ old('Afspraak_title') == $beurt->beurt_naam ? 'selected' :''}}>
                                {{ $beurt->beurt_naam }} - {{ $beurt->beurt_datum }} om {{ $beurt->beurt_tijd }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="Afspraak_datum">
                        Datum
                    </label>
                    <input type="date" name="Afspraak_datum" id="Afspraak_datum" value="{{ old('Afspraak_datum') }}" min="{{ date('Y-m-d') }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                </div>

                <div class="mb-4">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="Afspraak_omschrijving">
                        Omschrijving
                    </label>
                    <textarea name="Afspraak_omschrijving" id="Afspraak_omschrijving" rows="3" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Beschrijf uw probleem of wensen...">{{ old('Afspraak_omschrijving') }}</textarea>
                </div>

                <button type="submit" class="text-black bg-green-400 box-border border border-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-400 shadow-xs font-medium leading-5 rounded-lg text-sm px-4 py-2.5 focus:outline-none">Afspraak Inplannen</button>
            </form>
        </div>

        <div class="px-6">
            <h3 class="text-lg font-semibold mb-4">Mijn Bestaande Afspraken</h3>
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                <table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Titel</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Datum</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Omschrijving</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($afspraken as $afspraak)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $afspraak->Afspraak_title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $afspraak->Afspraak_datum }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900 max-w-xs truncate">{{ $afspraak->Afspraak_omschrijving }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <form action="{{ route('KlantenAfspraken.destroy', $afspraak->afspraak_id) }}" method="post" onsubmit="return confirm('Weet je zeker dat je deze afspraak wilt annuleren?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Annuleren</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">U heeft nog geen afspraken.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>
</body>
</html>
