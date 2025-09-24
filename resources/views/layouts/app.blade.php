<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Library</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-50 text-slate-800">
<header class="sticky top-0 z-10 bg-white/80 backdrop-blur border-b border-slate-200">
<div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
<a href="{{ route('books.index') }}" class="text-xl font-bold tracking-tight">📚 Book Library</a>
<form method="GET" action="{{ route('books.index') }}" class="hidden md:block">
<div class="flex items-center gap-2">
<input type="text" name="q" value="{{ request('q') }}" placeholder="Search title/author/genre..." class="px-3 py-2 rounded-xl border border-slate-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
<button class="px-4 py-2 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700">Search</button>
</div>
</form>
</div>
</header>


<main class="max-w-6xl mx-auto px-4 py-8">
@if (session('success'))
<div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-green-700">
{{ session('success') }}
</div>
@endif
@yield('content')
</main>


<footer class="border-t border-slate-200 bg-white">
<div class="max-w-6xl mx-auto px-4 py-6 text-sm text-slate-500">
Made with ❤️ using Laravel & Tailwind
</div>
</footer>
</body>
</html>