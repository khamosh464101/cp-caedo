<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Vacancies</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Vacancies Records
                </p>
                @can('create', 'App\Models\Post')
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded mb-2"
                        onclick="location.href='{{ route('admin.vacancy.create') }}';">Add Vacancy</button>
                @endcan
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    VACANCY NO.</th>
                            
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    TITLE</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    POSTING DATE</th>
                                 <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    CLOSING DATE</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    TYPE</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    JOB DESCRIPTION</th>
                                    
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    MANAGE</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vacancies as $vacancy)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $vacancy->vacancy_number }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $vacancy->title }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $vacancy->post_date }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $vacancy->close_date }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $vacancy->is_vacancy ? 'Vacancy' : 'Volunteer opportunity' }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light"><a href="{{ $vacancy->file}}" download class="text-blue-500 hover:bg-gray-100  ">Click here for TOR</a></td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        @can('update', $vacancy)
                                            <button
                                                class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                                type="button"
                                                onclick="location.href='{{ route('admin.vacancy.edit', $vacancy->id) }}';">Edit</button>
                                        @endcan
                                        @can('delete', $vacancy)
                                            <form type="submit" method="POST" style="display: inline"
                                                action="{{ route('admin.vacancy.destroy', $vacancy->id) }}"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="px-4 py-1 text-white font-light tracking-wider bg-red-600 rounded"
                                                    type="submit">Delete</button>
                                            </form>
                                        @endcan


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $vacancies->links() !!}
        </main>
    </div>
</x-admin-layout>
