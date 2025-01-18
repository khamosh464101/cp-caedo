<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Project Updates</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Project Updates Records
                </p>
                @can('create', 'App\Models\Project')
                   <div class="flex justify-between">
                   <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded mb-2"
                        onclick="location.href='{{ route('admin.project.create') }}';">Add Project Update</button>
                   
                    <a href="{{ route('admin.pcategory.index') }}" class="px-4 py-1 text-white font-light tracking-wider bg-gray-600 hover:bg-gray-800 rounded mb-2"><i class="fas fa-sticky-note mr-3"></i> Categories</a>
                   </div>
                    
             
                @endcan
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    ID</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Title</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Category</th>
                            
                                 <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Views</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Added by</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $project->id }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $project->title }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $project->category->name }}</td>
                       
                                    <td class="py-4 px-6 border-b border-grey-light">
                                    {{$project->views}}
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $project->user->name }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        @can('update', $project)
                                            <button
                                                class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                                type="button"
                                                onclick="location.href='{{ route('admin.project.edit', $project->id) }}';">Edit</button>
                                        @endcan
                                        @can('delete', $project)
                                            <form type="submit" method="POST" style="display: inline"
                                                action="{{ route('admin.project.destroy', $project->id) }}"
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
                {!! $projects->links() !!}
        </main>
    </div>
</x-admin-layout>
