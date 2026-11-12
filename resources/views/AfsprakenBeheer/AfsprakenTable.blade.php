<table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Titel
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Klant
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Datum
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Omschrijving
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($afspraken as $afspraak)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $afspraak->Afspraak_title }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $afspraak->klanten?->klant_naam ?? '-' }}</div>
                    <div class="text-sm text-gray-500">{{ $afspraak->klanten?->klant_email ?? '' }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $afspraak->Afspraak_datum }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm text-gray-900 max-w-xs truncate">{{ $afspraak->Afspraak_omschrijving }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap flex text-sm font-medium">
                    <a href="{{ route('AfsprakenBeheer.edit', $afspraak->afspraak_id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>

                    <form action="{{ route('AfsprakenBeheer.destroy', $afspraak->afspraak_id) }}" method="post" onsubmit="return confirm('Weet je zeker dat je deze afspraak wilt verwijderen?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-2 text-red-600 hover:text-red-900">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-4">
    {{ $afspraken->links() }}
</div>
