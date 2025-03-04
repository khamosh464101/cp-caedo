<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Research</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Research Records
                </p>
                @can('create', 'App\Models\Post')
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded mb-2"
                        onclick="location.href='{{ route('admin.research.create') }}';">Add research update</button>
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
                                    Subtitle</th>
                                    
                
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    File</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($researchs as $research)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $research->id }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $research->title }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $research->subtitle }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light"><a href="{{ $research->pdf}}"  class="text-blue-500 hover:bg-gray-100  ">Download PDF</a></td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        @can('update', $research)
                                            <button
                                                class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                                type="button"
                                                onclick="location.href='{{ route('admin.research.edit', $research->id) }}';">Edit</button>
                                        @endcan
                                        @can('delete', $research)
                                            <form type="submit" method="POST" style="display: inline"
                                                action="{{ route('admin.research.destroy', $research->id) }}"
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
                {!! $researchs->links() !!}
        </main>
    </div>
</x-admin-layout>
