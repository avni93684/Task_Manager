<div class="max-w-2xl mx-auto mt-10 bg-white shadow-lg rounded-xl p-6">

    <h2 class="text-2xl font-semibold text-gray-800 mb-6">
        📝 Add New Task
    </h2>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tasks" method="POST" class="space-y-5">
        @csrf

        {{-- Title --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Task Title
            </label>
            <input
                type="text"
                name="title"
                value="{{ old('title') }}"
                placeholder="Eg: Complete DBMS assignment"
                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
            >
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Description
            </label>
            <textarea
                name="description"
                rows="4"
                placeholder="Write task details..."
                class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
            >{{ old('description') }}</textarea>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <button
                type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg transition"
            >
                ➕ Add Task
            </button>
        </div>
    </form>
</div>
