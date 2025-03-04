<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Add Research</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Research Details
                </p>
                <form method="POST" action="{{ route('admin.research.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                
                <div class="mb-1">
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input required type="text"  id="title"  name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title of the post" required>
                </div>
                <div class="mb-1">
                    <label for="year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subtitle</label>
                    <input required type="text"  id="subtitle"  name="subtitle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title of the post" required>
                </div>
         
                <div class="mb-1">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Published</label>
                    <select required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="selectType" name="published">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                      </select>
                </div>
             
  
         
                <div class="mb-2">
                    <label  class="block text-sm text-gray-600" for="message">PDF file</label>
                    <input required type="file" id="myimage" name="pdf">

                </div>
                </div>
                <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded">Add Research</button>
                </form>
            </div>
        </main>
    </div>

</x-admin-layout>
