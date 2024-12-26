<!doctype html>
<html lang="en" class="h-full bg-gray-200 dark:bg-gray-800">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Tailwind CSS -->
    <script>
        // Simple theme toggle script
        document.addEventListener('DOMContentLoaded', () => {
            const themeToggle = document.getElementById('theme-toggle');
            themeToggle.addEventListener('click', () => {
                document.documentElement.classList.toggle('dark');
            });
        });
    </script>
</head>
<body class="h-full w-full flex items-center justify-center">
    <div class="w-full max-w-md bg-white dark:bg-gray-900 rounded-lg shadow-lg p-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Calculator</h1>
            <button id="theme-toggle" 
                    class="p-2 bg-gray-200 dark:bg-gray-700 rounded-full hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                <svg class="w-5 h-5 text-gray-800 dark:text-gray-100" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path class="dark:hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.485-12.485l-.707.707M4.222 19.778l-.707-.707M21 12h1M3 12H2m15.071 7.071l-.707-.707M6.636 6.636l-.707-.707"/>
                    <path class="hidden dark:block" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 1112.35 3.646m6.714 5.688a9.003 9.003 0 00-9.193 14.391" />
                </svg>
            </button>
        </div>
        
        @if ($errors->any())
            <div class="mb-4">
                @foreach($errors->all() as $error)
                    <p class="text-red-600 dark:text-red-400 text-sm">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        @if(isset($result))
            <p class="mb-4 text-gray-800 dark:text-gray-100">Result of "<strong>{{ $expression }}</strong>": <span class="font-bold">{{ $result }}</span></p>
        @endif

        <form action="{{ route('calculate') }}" method="post" class="flex flex-col space-y-4">
            @csrf
            <input 
                type="text" 
                name="expression" 
                class="w-full px-4 py-2 rounded border border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" 
                placeholder="Enter expression" 
                required 
            >
            <input 
                type="submit" 
                value="Submit" 
                class="cursor-pointer bg-blue-600 dark:bg-blue-500 text-white font-semibold py-2 rounded hover:bg-blue-700 dark:hover:bg-blue-600 transition"
            >
        </form>
    </div>
</body>
</html>
