@extends('layouts.app')


@section('content')
<div class="flex items-center justify-between mb-6">
<h1 class="text-2xl font-semibold">All Books</h1>
<a href="{{ route('books.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-indigo-600 text-white font-medium shadow hover:shadow-md hover:bg-indigo-700">+ New Book</a>
</div>


<!-- Mobile search -->
<form method="GET" action="{{ route('books.index') }}" class="md:hidden mb-4">
<div class="flex items-center gap-2">
<input type="text" name="q" value="{{ $q }}" placeholder="Search..." class="px-3 py-2 rounded-xl border border-slate-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 w-full">
<button class="px-4 py-2 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700">Go</button>
</div>
</form>


@if ($books->count())
<div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
@foreach ($books as $book)
<div class="group rounded-2xl bg-white shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition">
@if($book->cover_url)
<img src="{{ $book->cover_url }}" alt="Cover" class="w-full h-44 object-cover">
@else
<div class="w-full h-44 bg-gradient-to-br from-indigo-100 to-indigo-200 flex items-center justify-center text-5xl">📘</div>
@endif
<div class="p-4 space-y-2">
<a href="{{ route('books.show', $book) }}" class="block text-lg font-semibold hover:underline">{{ $book->title }}</a>
<p class="text-slate-600 text-sm">By {{ $book->author }} @if($book->published_year) • {{ $book->published_year }} @endif</p>
@if($book->genre)
<span class="inline-block text-xs px-2 py-1 rounded-full bg-slate-100 text-slate-700">{{ $book->genre }}</span>
@endif
<div class="pt-2 flex items-center gap-2">
<a href="{{ route('books.edit', $book) }}" class="px-3 py-1.5 rounded-lg border border-slate-300 hover:bg-slate-50">Edit</a>
<form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Delete this book?')">
@csrf
@method('DELETE')
<button class="px-3 py-1.5 rounded-lg bg-rose-600 text-white hover:bg-rose-700">Delete</button>
</form>
</div>
</div>
</div>
@endforeach
</div>


<div class="mt-6">{{ $books->links() }}</div>
@else
<div class="rounded-xl border border-slate-200 bg-white p-8 text-center">
<p class="text-slate-600">No books found. Add your first one!</p>
<a href="{{ route('books.create') }}" class="mt-4 inline-block px-4 py-2 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700">Create Book</a>
</div>
@endif
@endsection