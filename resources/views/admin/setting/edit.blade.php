<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Add Setting</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Setting Details
                </p>
                <form method="POST" action="{{ route('admin.setting.update', $setting->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <input type="hidden" name="field_name" value="{{ $setting->field_name }}">
                <div class="mb-1">
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-capitalize">{{ str_replace('_', ' ', $setting->field_name) }}</label>
                    @if($setting->type == 'image')
                    <input type="file" id="myimage" name="field_value">
                    <span class="text-yellow-500">Size {{$setting->description}}</span>
                    @else
                    <textarea name="field_value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $setting->field_value }}</textarea>
                    @endif
                </div>
                <div class="mb-1">
                    <label for="cat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="selectType" name="category">
                        <option class="capitalize" value="">General</option>
                    @foreach ($setting->getCategory() as $category)
                    @if($category == $setting->category)
                    <option class="capitalize" selected value="{{ $category }}">{{ $category }}</option>
                    @else
                    <option class="capitalize" value="{{ $category }}">{{ $category }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                

                
                </div>
                <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded">Update Setting</button>
                </form>
            </div>
        </main>
    </div>

</x-admin-layout>
