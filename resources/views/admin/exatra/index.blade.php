<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Exatras</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Exatras Records
                </p>
                @can('create', 'App\Models\Post')
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded mb-2"
                        onclick="location.href='{{ route('admin.exatra.create') }}';">Add Exatra</button>
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
                                    title</th>
                                 <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Icon</th>
                             
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exatras as $exatra)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $exatra->id }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $exatra->category }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $exatra->title }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                    <a href="{{ $exatra->icon}}" download><img src="{{ $exatra->icon }}" width="50" height="500" class="bg-green-500"></a>
                                    </td>
                                    
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        @can('update', $exatra)
                                            <button
                                                class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                                type="button"
                                                onclick="location.href='{{ route('admin.exatra.edit', $exatra->id) }}';">Edit</button>
                                        @endcan
                                        @can('delete', $exatra)
                                            <form type="submit" method="POST" style="display: inline"
                                                action="{{ route('admin.exatra.destroy', $exatra->id) }}"
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
                {!! $exatras->links() !!}
        </main>
    </div>
</x-admin-layout>
