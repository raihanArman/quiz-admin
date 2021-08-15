<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('questions.create', ['id' => $id]) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 nx-2 rounded">
                    + Create Question
                </a>
            </div>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-6 py-4">Question</th>
                            <th class="border px-6 py-4">A</th>
                            <th class="border px-6 py-4">B</th>
                            <th class="border px-6 py-4">C</th>
                            <th class="border px-6 py-4">D</th>
                            <th class="border px-6 py-4">Answer</th>
                            <th class="border px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($question as $item)
                            <tr>
                                <td class="border px-6 py-4">{{ $item->question }}</td>
                                <td class="border px-6 py-4">{{ $item->a }}</td>
                                <td class="border px-6 py-4">{{ $item->b }}</td>
                                <td class="border px-6 py-4">{{ $item->c }}</td>
                                <td class="border px-6 py-4">{{ $item->d }}</td>
                                <td class="border px-6 py-4">{{ $item->answer }}</td>
                                <td class="border px-6 py-4 text-center">
                                    <a href="{{ route('questions.edit', $item->id) }}" class="inline-block bg-yellow-300 hover:bg-yellow-500 text-white font-bold py-2 px-4 nx-2 rounded">Edit</a>
                                    <form action="{{ route('questions.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 nx-2 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="border "text-center p-5>
                                    Data tidak ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <br><br>
            <div class="mb-10">
                <a href="{{ route('quizzes.index') }}" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 nx-2 rounded">
                    Back
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
