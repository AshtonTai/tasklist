@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="max-w-3xl mx-auto">

        {{-- Back link --}}
        <div class="mb-6">
            <a href="{{ route('tasks.index') }}"
               class="text-indigo-600 hover:text-indigo-800 text-sm font-medium flex items-center gap-1">
                ← Back to Tasks
            </a>
        </div>

        {{-- Card --}}
        <div class="bg-white p-6 rounded-xl shadow-md space-y-6">

            {{-- Title --}}
            <h1 class="text-2xl font-semibold text-gray-800">
                {{ $task->title }}
            </h1>

            {{-- Description --}}
            <p class="text-gray-700 leading-relaxed">
                {{ $task->description }}
            </p>

            {{-- Long description (if any) --}}
            @if ($task->long_description)
                <div class="border-l-4 border-indigo-400 pl-4 text-gray-700 leading-relaxed">
                    {{ $task->long_description }}
                </div>
            @endif

            {{-- Timestamps --}}
            <p class="text-sm text-gray-500">
                Created: {{ $task->created_at->diffForHumans() }} <br>
                Updated: {{ $task->updated_at->diffForHumans() }}
            </p>

            {{-- Status --}}
            <p>
                @if ($task->completed)
                    <span class="text-sm bg-green-100 text-green-700 px-3 py-1 rounded-full">
                        Completed
                    </span>
                @else
                    <span class="text-sm bg-red-100 text-red-700 px-3 py-1 rounded-full">
                        Not Completed
                    </span>
                @endif
            </p>

            {{-- Action buttons --}}
            <div class="flex flex-wrap gap-3 pt-4 border-t border-gray-200">

                {{-- Edit --}}
                <a href="{{ route('tasks.edit', ['task' => $task]) }}"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded-lg shadow transition">
                    Edit
                </a>

                {{-- Toggle complete --}}
                <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
                    @csrf
                    @method('PUT')
                    <button type="submit"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white font-medium px-4 py-2 rounded-lg shadow transition">
                        Mark as {{ $task->completed ? 'Not Completed' : 'Completed' }}
                    </button>
                </form>

                {{-- Delete --}}
                <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST"
                      onsubmit="return confirm('Are you sure you want to delete this task?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded-lg shadow transition">
                        Delete
                    </button>
                </form>
            </div>
        </div>

    </div>
@endsection
