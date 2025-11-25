@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    <div class="max-w-3xl mx-auto">

        {{-- Header + Add Task Button --}}
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Tasks</h1>

            <a href="{{ route('tasks.create') }}"
               class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800 text-white text-sm font-medium px-4 py-2 rounded-lg shadow transition">
                + Add Task
            </a>
        </div>

        {{-- Task List --}}
        @forelse ($tasks as $task)
            <div class="flex items-center justify-between bg-white p-4 mb-3 rounded-xl shadow-sm border border-gray-100">

                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                   class="text-lg font-medium text-gray-800 hover:text-indigo-600 transition
                   @if($task->completed) line-through text-gray-400 @endif">
                    {{ $task->title }}
                </a>

                {{-- Status badge --}}
                @if($task->completed)
                    <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">Completed</span>
                @else
                    <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full">Pending</span>
                @endif
            </div>
        @empty
            <div class="text-center text-gray-500 bg-white p-6 rounded-xl shadow">
                There are no tasks!
            </div>
        @endforelse

        {{-- Pagination --}}
        @if ($tasks->count())
            <div class="mt-6">
                {{ $tasks->links() }}
            </div>
        @endif

    </div>
@endsection
