<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chapter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('chapters.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 nx-2 rounded">
                    + Create Chapter
                </a>
            </div>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-6 py-4">ID</th>
                            <th class="border px-6 py-4">Name</th>
                            <th class="border px-6 py-4">Path Name</th>
                            <th class="border px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($chapter as $item)
                            <tr>
                                <td class="border px-6 py-4">{{ $item->id }}</td>
                                <td class="border px-6 py-4">{{ $item->name }}</td>
                                <td class="border px-6 py-4">{{ $item->path->name }}</td>
                                <td class="border px-6 py-4 text-center">
                                    <a href="{{ route('chapters.edit', $item->id) }}" class="inline-block bg-yellow-300 hover:bg-yellow-500 text-white font-bold py-2 px-4 nx-2 rounded">Edit</a>
                                    <form action="{{ route('chapters.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 nx-2 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="border "text-center p-5>
                                    Data tidak ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center">
                {{ $chapter->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
