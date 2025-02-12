<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Auth::check())
                        <p class="mb-4">{{ __("You're logged in as ") }} {{ Auth::user()->name }}!</p>

                        <!-- Role-based static information -->
                        @if (Auth::user()->is_admin)
                            <div class="bg-blue-50 p-4 rounded-md shadow-md mb-6">
                                <h3 class="font-semibold text-lg text-gray-700">Admin Role Functions</h3>
                                <p class="text-gray-600">
                                    As an Admin, you have the following responsibilities:
                                </p>
                                <ul class="list-disc ml-6 text-gray-600">
                                    <li><strong>Manage Events:</strong> &nbsp; Create, edit, and delete events.</li>
                                    <li><strong>View Event Registrations:</strong> &nbsp; See who has registered for events.</li>
                                    <li><strong>Manage Users:</strong> &nbsp; Approve or delete user accounts if necessary.</li>
                                    <li><strong>Manage Event Details:</strong> &nbsp; Modify event information and handle updates.</li>
                                </ul>
                            </div>
                        @else
                            <div class="bg-yellow-50 p-4 rounded-md shadow-md mb-6">
                                <h3 class="font-semibold text-lg text-gray-700">User Role Functions</h3>
                                <p class="text-gray-600">
                                    As a User, you have the following access:
                                </p>
                                <ul class="list-disc ml-6 text-gray-600">
                                    <li><strong>View Events :</strong> &nbsp; Browse available events and their details.</li>
                                    <li><strong>Register for Events :</strong> &nbsp; Sign up for events you're interested in.</li>
                                    <li><strong>View and Update Profile :</strong> &nbsp; Edit your profile details.</li>
                                </ul>
                            </div>
                        @endif

                    @else
                        <p>{{ __("You're not logged in.") }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
