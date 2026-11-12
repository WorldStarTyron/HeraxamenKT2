<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login</title>
</head>
<body>
    <div class="min-h-screen flex items-center justify-center bg-gray-50">
        <form action="{{ route('Store.LoginPost')}}" method="POST" class="w-full max-w-md px-6">
            @csrf
            @method('post')

            <div class="flex justify-center mb-6">
                <h2 class="text-2xl font-bold">Login</h2>
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

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="klant_email">
                        Email
                    </label>
                    <input type="email" name="klant_email" id="klant_email" value="{{ old('klant_email')}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="voorbeeld@email.com" required>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="klant_password">
                        Wachtwoord
                    </label>
                    <input type="password" name="klant_password" id="klant_password" value="{{ old('klant_password')}}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="******************" required>
                </div>
            </div>

            <div class="flex items-center justify-between mt-4">
                <button type="submit" class="text-black bg-green-400 box-border border border-green-400 hover:bg-green-500 focus:ring-4 focus:ring-green-400 shadow-xs font-medium leading-5 rounded-lg text-sm px-4 py-2.5 focus:outline-none">Login</button>
                <a href="{{ route('Auth.Register') }}" class="text-sm text-gray-600 hover:text-gray-800 underline">Nog geen account? Registreer</a>
            </div>
        </form>
    </div>
</body>
</html>
