<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Setting</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Setting Records
                </p>
                <!-- @can('create', 'App\Models\Post')
                    <button class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded mb-2"
                        onclick="location.href='{{ route('admin.setting.create') }}';">Add Setting</button>
                @endcan -->
                <div class="bg-white overflow-auto">
                    <table class="text-left table-fixed w-full border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    ID</th>
                            
                                    <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Field Name</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Field Value</th>
                                 <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    type</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    category</th>
                                <th
                                    class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                                    Manage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($settings as $setting)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $setting->id }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light break-all">{{ $setting->field_name }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light w-14 break-all">{{ $setting->field_value }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                    {{$setting->type}}
                                    </td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{$setting->category}}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        @can('update', $setting)
                                            <button
                                                class="px-4 py-1 text-white font-light tracking-wider bg-green-600 rounded"
                                                type="button"
                                                onclick="location.href='{{ route('admin.setting.edit', $setting->id) }}';">Edit</button>
                                        @endcan
                                        <!-- @can('delete', $setting)
                                            <form type="submit" method="POST" style="display: inline"
                                                action="{{ route('admin.setting.destroy', $setting->id) }}"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="px-4 py-1 text-white font-light tracking-wider bg-red-600 rounded"
                                                    type="submit">Delete</button>
                                            </form>
                                        @endcan -->


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $settings->links() !!}
        </main>
    </div>
</x-admin-layout>
