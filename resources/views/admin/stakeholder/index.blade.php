<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Stakeholders</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Stakeholders Records
                </p>
                @can('create', 'App\Models\Post')
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded mb-2"
                        onclick="location.href='{{ route('admin.stakeholder.create') }}';">Add Stakeholder</button>
                @endcan
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    ID</th>
                            
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Category</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Year</th>
                                 <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Image</th>
                             
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stakeholders as $stakeholder)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $stakeholder->id }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $stakeholder->category }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $stakeholder->url }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ $stakeholder->image}}" download><img src="{{ $stakeholder->image }}" width="200" height="500"></a>
                                    </td>
                                    
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        @can('update', $stakeholder)
                                            <button
                                                class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                                type="button"
                                                onclick="location.href='{{ route('admin.stakeholder.edit', $stakeholder->id) }}';">Edit</button>
                                        @endcan
                                        @can('delete', $stakeholder)
                                            <form type="submit" method="POST" style="display: inline"
                                                action="{{ route('admin.stakeholder.destroy', $stakeholder->id) }}"
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
                {!! $stakeholders->links() !!}
        </main>
    </div>
</x-admin-layout>
