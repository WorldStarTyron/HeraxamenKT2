<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Beurt Beheren</title>
</head>
<body>
  @include('Layouts.Sidebar')
    <main class="sm:ml-64">
        <div class="p-6 flex justify-center items-center">
            <h2 class="text-2xl font-bold mb-4"> Beurt Beheren </h2>
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

        <div class="px-6">
            <div class="mb-4 flex justify-end">
                <a href="{{route('BeurtBeheren.create')}}" class="text-black bg-green-400 box-border border border-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-400 shadow-xs font-medium leading-5 rounded-lg text-sm px-4 py-2.5 focus:outline-none">Beurt Toevoegen</a>
            </div>
            <div class="overflow-x-auto rounded-lg border border-gray-200">
                @include('BeurtBeheren.BeurtTable')
            </div>
        </div>

    </main>
</body>
</html>
