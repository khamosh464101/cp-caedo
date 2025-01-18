<x-admin-layout>

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
        <main class="w-full flex-grow p-6">
            <h1 class="w-full text-3xl text-black pb-6">Edit Team Member</h1>

            <div class="w-full mt-12">
                <p class="text-xl pb-3 flex items-center">
                    <i class="fas fa-list mr-3"></i> Team Member Details
                </p>
                <form method="POST" action="{{ route('admin.team.update', $team->id) }}"enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="mb-1">
                    <label for="cat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="selectType" name="is_board_member">
                        <option class="capitalize" value="1" {{ $team->is_board_member ? 'selected' : '' }}>Board Member</option>
                        <option class="capitalize" value="0" {{ !$team->is_board_member ? 'selected' : '' }}>Management Team</option>
                  </select>
                </div>
                <div class="mb-1">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">title</label>
                    <input required type="text"  id="title" name="title" value="{{$team->title}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mr, Ms" required>
                </div>
                <div class="mb-1">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input required type="text"  id="name" name="name" value="{{$team->name}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                <div class="mb-1">
                    <label for="position" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                    <input required type="text"  id="position" name="position" value="{{$team->position}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
              
                {{--  --}}
         
                <div class="mb-2">
                    <label class="block text-sm text-gray-600" for="message">Avatar (200X200)</label>
                    <input  type="file" id="myimage" name="avatar">

                </div>
                <div class="mb-2">
                    <label  class="block text-sm text-gray-600" for="message">Image (496X524)</label>
                    <input  type="file" id="myimage" name="file">

                </div>
                
                <div class="mb-1">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Published</label>
                    <select required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="selectType" name="published">
                        <option value="1" {{ $team->published ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ !$team->published ? 'selected' : '' }}>No</option>

                      </select>
                </div>
                </div>
                <div class="mb-2">
                    <label class="block text-sm text-gray-600" for="about">About</label>
                    <textarea id="mytextarea" name="about">{{$team->about}}</textarea>
                </div>

                
                <button type="submit" class="px-4 py-1 text-white font-light tracking-wider bg-blue-600 rounded">Update Team Member</button>
                </form>
            </div>
        </main>
    </div>

</x-admin-layout>
