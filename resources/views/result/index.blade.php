<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                
            </div>
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-6 py-4">ID</th>
                            <th class="border px-6 py-4">Path</th>
                            <th class="border px-6 py-4">Total Student</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($result as $item)
                            <tr>
                                <td class="border px-6 py-4 text-center">{{ $item->id }}</td>
                                <td class="border px-6 py-4 text-center">{{ $item->name }}</td>
                                <td class="border px-6 py-4 text-center">{{ $item->student }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="border "text-center p-5>
                                    Data tidak ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center">
            </div>
        </div>
    </div>
</x-app-layout>
