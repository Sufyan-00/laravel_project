<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ManageMe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Events Listing Section -->
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 text-gray-900">
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
                <a href="/admin/events/create" class="bg-red-600 text-white hover:bg-red-700" 
                    style="margin-top:10px;margin-left:30px; display: inline-block;  
                    padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; transition: background-color 0.3s ease;"  
                    onfocus="this.style.boxShadow='0 0 5px rgba(184, 18, 18, 0.99)';" 
                    onblur="this.style.boxShadow='none';">
                    Create New Event
                </a>
            
                <div class="p-6 text-gray-900">
                    
                    <!-- Display All Events in Grid Style -->
                    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 max-w-7xl mx-auto">
                        @foreach ($events as $event)
                            <li class="bg-white shadow-lg rounded-lg overflow-hidden border border-gray-200">
                                <div class="p-6">
                                    <!-- Event Header (Name and Date) -->
                                    <div class="flex justify-between items-center">
                                        <h3 class="text-xl font-semibold text-gray-900">{{ $event->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $event->event_date }}</p>
                                        
                                    </div>

                                    <!-- Event Description -->
                                    <p class="mt-2 text-sm text-gray-600">{{ Str::limit($event->description, 100) }}</p>
                                    <p class="text-gray-600 mt-2"><strong>Time:</strong> {{ $event->time }}</p>
                                    <p class="text-gray-600 mt-2"><strong>Venue:</strong> {{ $event->venue }}</p>
                                    <!-- View Details Link -->
                                    <div class="mt-4 flex justify-between items-center">
                                        <a href="{{ route('admin.show', $event->id) }}" 
                                           class="inline-block text-indigo-600 hover:text-indigo-700 font-semibold">
                                           View Details
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <!-- No events message if none available -->
                    @if($events->isEmpty())
                        <p class="text-center text-gray-500 mt-6">No events available. Please create an event.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
