<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">FAQs</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> FAQs Records
                </p>
                @can('create', 'App\Models\Post')
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded mb-2"
                        onclick="location.href='{{ route('admin.faq.create') }}';">Add FAQ</button>
                @endcan
                <div class="bg-white overflow-auto">
                    <table class="text-left w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    QUESTION</th>
                            
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    RESPONSE</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    PUBLISHED</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    MANAGE</th>

                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $faq)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light" style="white-space: pre"><?php  echo $faq->question;  ?>   </td>
                                    <td class="py-4 px-6 border-b border-grey-light"><?php echo $faq->response; ?></td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $faq->published ? 'YES' : 'NO' }}</td>
                                  
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        @can('update', $faq)
                                            <button
                                                class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                                type="button"
                                                onclick="location.href='{{ route('admin.faq.edit', $faq->id) }}';">Edit</button>
                                        @endcan
                                        @can('delete', $faq)
                                            <form type="submit" method="POST" style="display: inline"
                                                action="{{ route('admin.faq.destroy', $faq->id) }}"
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
                {!! $faqs->links() !!}
        </main>
    </div>
</x-admin-layout>
