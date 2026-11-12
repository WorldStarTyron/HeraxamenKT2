<table class="min-w-full divide-y divide-gray-200 overflow-x-auto">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Name
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                Telefoon + Email
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
               Role
            </th>
          
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-widerder">
                Actions
            </th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
@foreach ($klanten as $klant)
    
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10">
                        <img class="h-10 w-10 rounded-full" src="https://i.pravatar.cc/150?img=1" alt="">
                    </div>
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                       {{$klant->klant_naam}}
                        </div>
                        <div class="text-sm text-gray-500">
                        {{$klant->klant_email}}
                        </div>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="text-sm text-gray-900">{{$klant->klant_telefoon}}</div>
                <div class="text-sm text-500">{{$klant->klant_email}}</div>
            </td>
         
             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                 {{$klant->klant_role}}
            </td>
            <td class="px-6 py-4 whitespace-nowrap flex text-sm font-medium">
                <a href="{{ route('klantenBeheer.edit', $klant->klant_id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
              

               <form action="{{route('klantenBeheer.destroy', $klant->klant_id)}}" method="post" onsubmit="return confirm('Weet je zeker dat je deze klant wilt verwijderen?');">
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
    {{ $klanten->links() }}
</div>  