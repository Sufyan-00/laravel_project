<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event Details') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6">
                <!-- Event Details -->
                <h3 class="text-2xl font-bold text-gray-800">{{ $event->name }}</h3>
                <p class="mt-2 text-gray-600">{{ $event->description }}</p>
                <p class="mt-1 text-sm text-gray-500">Date: {{ $event->event_date }}</p>
                <div style="margin-top: 5px;">
                <a href="/admin/events/{{ $event->id }}/edit"  class="text-blue-600 hover:text-blue-800">Edit</a>

                <!-- Delete Form -->
                <form action="/admin/events/{{ $event->id }}" method="POST" style="margin-left:15px;display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800">
                        Delete
                    </button>
                </form>
                </div>
                <!-- Registered Users -->
                <h4 class="mt-6 text-lg font-semibold text-gray-700">Registered Users</h4>

                @if ($event->registrations->count() > 0)
                    <div id="printable">
                        <ul class="mt-4 bg-gray-50 border border-gray-200 rounded-md">
                            @foreach ($event->registrations as $registration)
                                <li class="px-4 py-3 border-b border-gray-200 flex justify-between">
                                    <div>
                                        <p class="text-gray-800 font-medium">{{ $registration->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $registration->email }}</p>
                                        <p class="text-sm text-gray-500">{{ $registration->contact }}</p>
                                    </div>
                                    <p class="text-sm text-gray-600">Registered on: {{ $registration->created_at->format('Y-m-d') }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Print Button -->
                    <div class="mt-4">
                        <button onclick="printContent()" style="margin-right:5px; display: inline-block; padding: 7.5px 8px; border-radius: 6px; text-decoration: none; font-weight: bold; transition: background-color 0.3s ease;" 
                            class="bg-red-600 text-white hover:bg-red-700"  
                                            onfocus="this.style.boxShadow='0 0 5px rgba(184, 18, 18, 0.99)';" 
                                            onblur="this.style.boxShadow='none';">
                            Print Registered Users
                        </button>
                        
                    </div>
                @else
                    <p class="mt-4 text-gray-500">No users have registered for this event yet.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Print Script -->
    <script>
        function printContent() {
            var content = document.getElementById('printable').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = content;
            window.print();
            document.body.innerHTML = originalContents;
            window.location.reload();
        }
    </script>
</x-app-layout>

