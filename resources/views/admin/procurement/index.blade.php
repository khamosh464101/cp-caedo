<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Procurements</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Procurements Records
                </p>
                @can('create', 'App\Models\Post')
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded mb-2"
                        onclick="location.href='{{ route('admin.procurement.create') }}';">Add Procurement</button>
                @endcan
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    ANNOUNCEMENT DATE</th>
                            
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    REFERENCE NO.</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    DESCRIPTION</th>
                                 <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    DEADLINE</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    ITB/NOA</th>
                                
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    MANAGE</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($procurements as $procurement)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $procurement->announcement_date }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $procurement->reference_number }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $procurement->description }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $procurement->deadline }}</td>

                                    <td class="py-4 px-6 border-b border-grey-light">
                                        @if($procurement->itb_noa)
                                        ITB
                                        @else 
                                        NOA
                                        @endif
                                        <a href="{{ $procurement->file}}" download class="text-blue-500 hover:bg-gray-100  ">Download</a>
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        @can('update', $procurement)
                                            <button
                                                class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                                type="button"
                                                onclick="location.href='{{ route('admin.procurement.edit', $procurement->id) }}';">Edit</button>
                                        @endcan
                                        @can('delete', $procurement)
                                            <form type="submit" method="POST" style="display: inline"
                                                action="{{ route('admin.procurement.destroy', $procurement->id) }}"
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
                {!! $procurements->links() !!}
        </main>
    </div>
</x-admin-layout>
