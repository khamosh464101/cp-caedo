<x-admin-layout>
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col bg-gray-100">
        <main class="w-full flex-grow p-6">
            
            <!-- Title -->
            <div class="flex items-center mb-6">
                <i class="fas fa-chart-bar mr-3 text-blue-600 text-2xl"></i>
                <h1 class="text-2xl font-semibold text-gray-800">Dashboard Statistics</h1>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-6">

                <!-- Event Categories -->
                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                    <h2 class="text-lg font-semibold text-gray-600 text-center">Event Categories</h2>
                    <p class="text-4xl font-bold text-blue-600 text-center mt-2">{{ $categories }}</p>
                </div>

                <!-- Event Tags -->
                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                    <h2 class="text-lg font-semibold text-gray-600 text-center">Event Tags</h2>
                    <p class="text-4xl font-bold text-green-600 text-center mt-2">{{ $tags }}</p>
                </div>

                <!-- Events -->
                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                    <h2 class="text-lg font-semibold text-gray-600 text-center">Events</h2>
                    <p class="text-4xl font-bold text-purple-600 text-center mt-2">{{ $posts }}</p>
                </div>

                <!-- Users -->
                <div class="bg-white p-6 rounded-2xl shadow hover:shadow-lg transition">
                    <h2 class="text-lg font-semibold text-gray-600 text-center">Users</h2>
                    <p class="text-4xl font-bold text-pink-600 text-center mt-2">{{ $users }}</p>
                </div>

            </div>

            <!-- More Stats Sections -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Team Members -->
                <div class="bg-white p-6 rounded-2xl shadow">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Team Members</h2>
                    <div class="flex justify-between border-b py-2">
                        <span class="text-gray-600">Board Members</span>
                        <span class="font-bold text-blue-600">{{ $board_count }}</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-gray-600">Management Team</span>
                        <span class="font-bold text-green-600">{{ $management_count }}</span>
                    </div>
                </div>

                <!-- Projects -->
                <div class="bg-white p-6 rounded-2xl shadow">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Projects</h2>
                    <div class="flex justify-between border-b py-2">
                        <span class="text-gray-600">Categories</span>
                        <span class="font-bold text-purple-600">{{ $project_categories }}</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-gray-600">Total</span>
                        <span class="font-bold text-blue-600">{{ $projects }}</span>
                    </div>
                </div>

                 <!-- Vacancies -->
                <div class="bg-white p-6 rounded-2xl shadow">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Job oppurtunities</h2>
                    <div class="flex justify-between border-b py-2">
                        <span class="text-gray-600">Vacancies</span>
                        <span class="font-bold text-purple-600">{{ $vacancies }}</span>
                    </div>
                    <div class="flex justify-between py-2">
                        <span class="text-gray-600">Volunteers</span>
                        <span class="font-bold text-blue-600">{{ $volunteers }}</span>
                    </div>
                </div>

               

                <!-- Research -->
                <div class="bg-white p-6 rounded-2xl shadow">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Research</h2>
                    <p class="text-4xl font-bold text-indigo-600 text-center">{{ $researchs }}</p>
                </div>

                <!-- Procurement -->
                <div class="bg-white p-6 rounded-2xl shadow">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Procurements</h2>
                    <p class="text-4xl font-bold text-red-600 text-center">{{ $procurements }}</p>
                </div>

               
                 <!-- Stakeholders -->
                <div class="bg-white p-6 rounded-2xl shadow">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Stakeholders</h2>
                    <p class="text-4xl font-bold text-orange-600 text-center">{{ $stakeholders }}</p>
                </div>

            </div>

        </main>
    </div>
</x-admin-layout>
