@extends('layouts.app')


@section('content')
<div class="grid lg:grid-cols-3 gap-8">
<div class="lg:col-span-2">
<div class="rounded-2xl border border-slate-200 bg-white p-6">
<div class="flex flex-col sm:flex-row gap-6">
@if($book->cover_url)
<img src="{{ $book->cover_url }}" class="w-full sm:w-48 h-64 object-cover rounded-xl border" alt="Cover">
@else
<div class="w-full sm:w-48 h-64 rounded-xl bg-gradient-to-br from-indigo-100 to-indigo-200 flex items-center justify-center text-6xl">📘</div>
@endif
<div class="flex-1 space-y-2">
<h1 class="text-3xl font-bold">{{ $book->title }}</h1>
<p class="text-slate-600">By {{ $book->author }}</p>
<div class="flex flex-wrap gap-2 text-sm text-slate-600">
@if($book->published_year)
<span class="px-2 py-1 rounded-full bg-slate-100">Year: {{ $book->published_year }}</span>
@endif
@if($book->genre)
<span class="px-2 py-1 rounded-full bg-slate-100">Genre: {{ $book->genre }}</span>
@endif
<span class="px-2 py-1 rounded-full bg-slate-100">Added: {{ $book->created_at->format('d M Y') }}</span>
</div>
@if($book->description)
<p class="pt-2 leading-relaxed">{{ $book->description }}</p>
@endif
<div class="pt-4 flex items-center gap-2">
<a href="{{ route('books.edit', $book) }}" class="px-4 py-2 rounded-xl border border-slate-300 hover:bg-slate-50">Edit</a>
<form method="POST" action="{{ route('books.destroy', $book) }}" onsubmit="return confirm('Delete this book?')">
@csrf
@method('DELETE')
<button class="px-4 py-2 rounded-xl bg-rose-600 text-white hover:bg-rose-700">Delete</button>
</form>
<a href="{{ route('books.index') }}" class="ml-auto px-4 py-2 rounded-xl bg-slate-800 text-white hover:bg-slate-900">Back</a>
</div>
</div>
</div>
</div>
</div>


<div>
<div class="rounded-2xl border border-slate-200 bg-white p-6">
<h2 class="font-semibold mb-4">Book Meta</h2>
<ul class="space-y-2 text-sm text-slate-700">
<li><span class="text-slate-500">ID:</span> {{ $book->id }}</li>
<li><span class="text-slate-500">Created:</span> {{ $book->created_at->toDayDateTimeString() }}</li>
<li><span class="text-slate-500">Updated:</span> {{ $book->updated_at->toDayDateTimeString() }}</li>
</ul>
</div>
</div>
</div>
@endsection