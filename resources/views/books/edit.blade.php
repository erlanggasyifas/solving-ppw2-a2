@extends('layouts.app')


@section('content')
<h1 class="text-2xl font-semibold mb-6">Edit Book</h1>


<form method="POST" action="{{ route('books.update', $book) }}" class="bg-white rounded-2xl border border-slate-200 p-6 max-w-3xl">
@csrf
@method('PUT')
<div class="grid sm:grid-cols-2 gap-6">
<div>
<label class="block text-sm font-medium mb-1">Title <span class="text-rose-600">*</span></label>
<input type="text" name="title" value="{{ old('title', $book->title) }}" class="w-full px-3 py-2 rounded-xl border @error('title') border-rose-500 @else border-slate-300 @enderror shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
@error('title')<p class="text-sm text-rose-600 mt-1">{{ $message }}</p>@enderror
</div>
<div>
<label class="block text-sm font-medium mb-1">Author <span class="text-rose-600">*</span></label>
<input type="text" name="author" value="{{ old('author', $book->author) }}" class="w-full px-3 py-2 rounded-xl border @error('author') border-rose-500 @else border-slate-300 @enderror shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
@error('author')<p class="text-sm text-rose-600 mt-1">{{ $message }}</p>@enderror
</div>
<div>
<label class="block text-sm font-medium mb-1">Published Year</label>
<input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}" class="w-full px-3 py-2 rounded-xl border @error('published_year') border-rose-500 @else border-slate-300 @enderror shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g. 2020">
@error('published_year')<p class="text-sm text-rose-600 mt-1">{{ $message }}</p>@enderror
</div>
<div>
<label class="block text-sm font-medium mb-1">Genre</label>
<input type="text" name="genre" value="{{ old('genre', $book->genre) }}" class="w-full px-3 py-2 rounded-xl border @error('genre') border-rose-500 @else border-slate-300 @enderror shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="e.g. Fiction">
@error('genre')<p class="text-sm text-rose-600 mt-1">{{ $message }}</p>@enderror
</div>
<div class="sm:col-span-2">
<label class="block text-sm font-medium mb-1">Cover URL</label>
<input type="url" name="cover_url" value="{{ old('cover_url', $book->cover_url) }}" class="w-full px-3 py-2 rounded-xl border @error('cover_url') border-rose-500 @else border-slate-300 @enderror shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="https://...">
@error('cover_url')<p class="text-sm text-rose-600 mt-1">{{ $message }}</p>@enderror
</div>
<div class="sm:col-span-2">
<label class="block text-sm font-medium mb-1">Description</label>
<textarea name="description" rows="5" class="w-full px-3 py-2 rounded-xl border @error('description') border-rose-500 @else border-slate-300 @enderror shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Short summary...">{{ old('description', $book->description) }}</textarea>
@error('description')<p class="text-sm text-rose-600 mt-1">{{ $message }}</p>@enderror
</div>
</div>


<div class="mt-6 flex items-center gap-2">
<a href="{{ route('books.index') }}" class="px-4 py-2 rounded-xl border border-slate-300 hover:bg-slate-50">Cancel</a>
<button class="px-4 py-2 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700">Update</button>
</div>
</form>
@endsection