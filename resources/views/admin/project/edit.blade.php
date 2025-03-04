<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Add Project update</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Project update Details
                </p>
                <form method="post" action="{{ route('admin.project.update', $project->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="mb-1">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" id="title" value="{{ $project->title }}" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Title of the project" required>
                </div>
                <div class="mb-1">
                    <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                    <input type="text" id="slug" value="{{ $project->slug }}"  name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ex: bla bla bla" required>
                    </div>
                <div class="mb-1">
                    <label for="cat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category Name</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="selectType" name="category_id">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"  {{ $project->category->name == "$category->name" ? 'selected' : '' }} >{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="mb-1">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Published</label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="selectType" name="status">
                        <option value="1" {{ $project->status == true ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ $project->status == false ? 'selected' : '' }}>No</option>
                      </select>
                    </div>
                {{--  --}}
                <div class="mb-2">
                    <label class="block text-sm text-gray-600" for="message">Thumpnail 1 (371X252)</label>
                    <input type="file" id="myimage" name="thumpnail1">
                </div>
      
  
                    <div class="mb-2">
                        <label class="block text-sm text-gray-600" for="message">Image</label>
                        <input type="file" id="myimage" name="image">

                    </div>
                    <div class="mb-1">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                    <input type="date" id="date" value="{{ $project->date }}" name="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                </div>
       
                <div class="mb-2">
                    <label class="block text-sm text-gray-600" for="message">Top Paragraph</label>
                    <textarea id="mytextarea"  id="message" name="tp" >{{ $project->tp }}</textarea>
                </div>
                <div class="mb-2">
                    <label class="block text-sm text-gray-600" for="message">Message</label>
                    <textarea id="mytextarea"  id="message" name="content">{{ $project->content }}</textarea>
                </div>
                <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded">Update Project update</button>
                </form>
            </div>
        </main>
    </div>

</x-admin-layout>
