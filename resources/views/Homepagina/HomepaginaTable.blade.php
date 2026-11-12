<table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Klant
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Afspraak
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Datum
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Beurt
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Max Auto's
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($afspraken as $afspraak)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $afspraak->klanten?->klant_naam ?? '-' }}</div>
                    <div class="text-sm text-gray-500">{{ $afspraak->klanten?->klant_email ?? '' }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-gray-900">{{ $afspraak->Afspraak_title }}</div>
                    <div class="text-sm text-gray-500 max-w-xs truncate">{{ $afspraak->Afspraak_omschrijving }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $afspraak->Afspraak_datum }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if ($afspraak->beurten->isNotEmpty())
                        @foreach ($afspraak->beurten as $beurt)
                            <div class="text-sm text-gray-900">{{ $beurt->beurt_naam }}</div>
                            <div class="text-sm text-gray-500">{{ $beurt->beurt_datum }} om {{ $beurt->beurt_tijd }}</div>
                        @endforeach
                    @else
                        <div class="text-sm text-gray-400">Geen beurt</div>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if ($afspraak->beurten->isNotEmpty())
                        @foreach ($afspraak->beurten as $beurt)
                            <div class="text-sm text-gray-900">{{ $beurt->maximaal_aantal_auto }}</div>
                        @endforeach
                    @else
                        <div class="text-sm text-gray-400">-</div>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Geen afspraken gevonden.</td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="mt-4">
    {{ $afspraken->links() }}
</div>
