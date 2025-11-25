@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add Task')

@section('content')
    <form method="POST"
          action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}"
          class="max-w-2xl mx-auto bg-white p-6 rounded-xl shadow-md space-y-6">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset

        {{-- Title --}}
        <div>
            <label for="title" class="block font-semibold mb-1 text-gray-700">
                Title
            </label>
            <input type="text" name="title" id="title"
                   value="{{ $task->title ?? old('title') }}"
                   class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2
               @error('title') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">
            @error('title')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="block font-semibold mb-1 text-gray-700">
                Description
            </label>
            <textarea name="description" id="description" rows="5"
                      class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2
                  @error('description') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Long Description --}}
        <div>
            <label for="long_description" class="block font-semibold mb-1 text-gray-700">
                Long Description
            </label>
            <textarea name="long_description" id="long_description" rows="10"
                      class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 px-4 py-2
                  @error('long_description') border-red-500 focus:border-red-500 focus:ring-red-500 @enderror">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex items-center gap-3">
            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white font-semibold px-5 py-2 rounded-lg shadow transition">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>

            <a href="{{ route('tasks.index') }}"
               class="text-gray-600 hover:text-gray-800 underline text-sm">
                Cancel
            </a>
        </div>

    </form>
@endsection
