<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

                    @auth('admin')
                    <a href="{{route('addBook')}}">AddBook</a>
                    @else
                    <a href="{{route('admin.login')}}">Admin login</a>
                    @endauth
                    @auth('admin')
                    <a href="{{route('assignBook')}}">AssignBook</a>
                    @else
                    <a href="{{route('admin.login')}}">Admin login</a>
                    @endauth
</x-admin-layout>
