<table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Beurt Naam
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Datum + Tijd
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Max Auto's
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Afspraak
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Actions
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach ($beurten as $beurt)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $beurt->beurt_naam }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $beurt->beurt_datum }}</div>
                    <div class="text-sm text-gray-500">{{ $beurt->beurt_tijd }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $beurt->maximaal_aantal_auto }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $beurt->afspraak?->Afspraak_title ?? '-' }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap flex text-sm font-medium">
                    <a href="{{ route('BeurtBeheren.edit', $beurt->beurt_id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>

                    <form action="{{ route('BeurtBeheren.destroy', $beurt->beurt_id) }}" method="post" onsubmit="return confirm('Weet je zeker dat je deze beurt wilt verwijderen?');">
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
    {{ $beurten->links() }}
</div>
