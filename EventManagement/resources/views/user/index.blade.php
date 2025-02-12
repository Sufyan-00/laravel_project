<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Available Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Grid of Available Events -->
                 <div class="p-4">
                    <!-- Flash Messages -->
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Success!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif

                    @if(session('info'))
                        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Info:</strong>
                            <span class="block sm:inline">{{ session('info') }}</span>
                        </div>
                    @endif

                    @if(session('warning'))
                        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative mb-4">
                            <strong class="font-bold">Warning!</strong>
                            <span class="block sm:inline">{{ session('warning') }}</span>
                        </div>
                    @endif
                 </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
                    @foreach ($events as $event)
                        <div class="bg-gray-100 shadow-md rounded-lg p-4">
                            <h2 class="text-xl font-semibold text-gray-800">{{ $event->name }}</h2>
                            <p class="text-gray-600 mt-2">{{ Str::limit($event->description, 100) }}</p>
                            <p class="text-gray-600 mt-2"><strong>Date:</strong> {{ $event->event_date }}</p>
                            <p class="text-gray-600 mt-2"><strong>Time:</strong> {{ $event->time }}</p>
                            <p class="text-gray-600 mt-2"><strong>Venue:</strong> {{ $event->venue }}</p>

                            <!-- Link to Registration Page for the Event -->
                            @if(!auth()->user()->is_admin)
                                <a href="{{ route('register.event', $event->id) }}" 
                                class="text-red-600 hover:text-red-700 mt-4 inline-block">
                                Register for this Event
                                </a>
                            @else
                                <p class="text-red-600 hover:text-red-700 mt-4 inline-block">
                                    Admin should not register for an event!
                                </p>
                            @endif
                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
