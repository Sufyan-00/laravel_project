<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Registration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
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
                    <h1 class="text-3xl font-semibold text-gray-800 mb-6">{{ $event->name }}</h1>
                    <p class="text-gray-600">{{ $event->description }}</p>
                    <p class="text-gray-600 mt-2"><strong>Date:</strong> {{ $event->event_date }}</p>
                    <p class="mt-2"><strong>Time:</strong> {{ $event->time }}</p>
                    <p class="mt-2"><strong>Venue:</strong> {{ $event->venue }}</p>
                    @if($eventHasEnded)
                        <div class="bg-red-100 border border-red-400 text-red-700 p-4 rounded mt-4">
                            <strong>Event has ended. Registration is closed.</strong>
                        </div>
                    @else
                    <form action="{{ route('register.event', $event->id) }}" method="POST" class="mt-6">
                        @csrf
                        <input type="hidden" name="event_id" value="{{ $event->id }}">

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Your Name:</label>
                            <input type="text" name="name" id="name" placeholder="Your Name" required 
                        @if(!auth()->user()->is_admin) value="{{ auth()->user()->name }}" 
                        class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm cursor-not-allowed text-gray-600" readonly
                        @else 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm"
                        @endif>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Your Email:</label>
                            <input type="email" name="email" id="email"placeholder="Your Email" required
                                   @if(!auth()->user()->is_admin) 
                                       value="{{ auth()->user()->email }}"
                                       class="mt-1 block w-full px-3 py-2 bg-gray-100 border border-gray-300 rounded-md shadow-sm cursor-not-allowed text-gray-600" readonly
                                    @else class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm"
                                   @endif>
                        </div>

                        <div class="mb-4">
                            <label for="contact" class="block text-sm font-medium text-gray-700">Your Contact:</label>
                            <input type="tel" name="contact" id="contact" placeholder="Your Contact Number" required
                                   class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                        </div>

                        <button type="submit" 
                                class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded transition duration-300 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Register
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
