<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Edit Event Form Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mb-6">
                            <strong>Whoops! Something went wrong.</strong>
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Edit Event Form -->
                    <form action="/admin/events/{{ $event->id }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Event Name Input -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Event Name:</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $event->name) }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Event Description Input -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Event Description:</label>
                            <textarea id="description" name="description" rows="4" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description', $event->description) }}</textarea>
                        </div>

                        <!-- Event Date Input -->
                        <div>
                            <label for="event_date" class="block text-sm font-medium text-gray-700">Event Date:</label>
                            <input type="date" id="event_date" name="event_date" value="{{ old('event_date', $event->event_date) }}" required
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <!-- Buttons -->
                        <div class="flex items-center space-x-4">
                            
                            <button type="submit" style="margin-right:5px; display: inline-block; padding: 7.5px 8px; border-radius: 6px; text-decoration: none; font-weight: bold; transition: background-color 0.3s ease;" 
                            class="bg-red-600 text-white hover:bg-red-700"  
                                            onfocus="this.style.boxShadow='0 0 5px rgba(184, 18, 18, 0.99)';" 
                                            onblur="this.style.boxShadow='none';">
                                            Update Event
                            </button>
                            <a href="/admin/events" class="inline-block bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
