<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     @if ($users->isEmpty())
            <p class="text-center text-gray-500">No users found.</p>
        @else
            <ul>
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 bg-gray-200 text-gray-700 font-semibold text-left border-b">Name</th>
                            <th class="py-2 px-4 bg-gray-200 text-gray-700 font-semibold text-left border-b">Email</th>
                            <th class="py-2 px-4 bg-gray-200 text-gray-700 font-semibold text-left border-b">Joined</th>
                            <th class="py-2 px-4 bg-gray-200 text-gray-700 font-semibold text-left border-b">Role</th>
                            <th class="py-2 px-4 bg-gray-200 text-gray-700 font-semibold text-left border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                <td class="py-2 px-4 border-b">{{ $user->created_at->format('Y-m-d') }}</td>
                                <td class="py-2 px-4 border-b">{{ ucfirst($user->role) }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="/users/{{ $user->id }}" class="text-blue-500 hover:underline">Edit</a>
                                    <form action="#" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:underline ms-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </ul>
        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>