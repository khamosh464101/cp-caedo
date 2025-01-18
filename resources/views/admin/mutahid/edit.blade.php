<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Edit Audit Report</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Audit Report Details
                </p>
                <form method="POST" action="{{ route('admin.mutahid.update', $mutahid->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                
                <div class="mb-1">
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Year</label>
                    <input required type="number" min="1900" max="2100" id="year" value="{{ $mutahid->year }}" name="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title of the post" required>
                </div>
                <div class="mb-1">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Audit Report/Mutahid DFI?</label>
                    <select required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="selectType" name="is_mutahid_dfi">
                    <option value="1" {{ $mutahid->is_mutahid_dfi ? 'selected' : '' }}>Mutahid DFI</option>
                        <option value="0" {{ !$mutahid->is_mutahid_dfi ? 'selected' : '' }}Audit Report</option>
                      </select>
                </div>
                <div class="mb-1">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Published</label>
                    <select required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="selectType" name="published">
                    <option value="1" {{ $mutahid->published ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$mutahid->published ? 'selected' : '' }}>No</option>
                      </select>
                </div>
                {{--  --}}
                <div class="mb-2">
                    <label class="block text-sm text-gray-600" for="message">Image</label>
                    <input type="file" id="myimage" name="image">

                </div>
         
                <div class="mb-2">
                    <label  class="block text-sm text-gray-600" for="message">PDF file</label>
                    <input type="file" id="myimage" name="file">

                </div>
                </div>
                <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded">Update Audit Report</button>
                </form>
            </div>
        </main>
    </div>

</x-admin-layout>
