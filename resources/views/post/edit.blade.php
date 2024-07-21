<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-2 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editando ').$post->title }}
        </h2>
    </x-slot>
    <div class="w-screen flex flex-col items-center justify-center bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
        <div class="w-2/3 flex flex-col items-center justify-center">
              <form class="p-4 md:p-5" action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                  <div class="grid gap-4 mb-4 grid-cols-2">
                      <div class="col-span-2">
                          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                          <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="" value="{{ $post->title }}">
                          @error('title')
                          <p style="color:red;">$error</p>
                          @enderror
                      </div>
                      <div class="col-span-2">
                          <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Texto del Post</label>
                          <textarea id="body" name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here">{{ $post->body }}</textarea>
                          @error('body')
                          <p style="color:red;">$error</p>
                        @enderror
                      </div>
                      <div class="col-span-2">
                          <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                          <input id="file" type="file" name="file"  class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write product description here"></input>
                          @error('file')
                          <p style="color:red;">$error</p>
                         @enderror
                      </div>
                  </div>
                  <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Editar el Post
                  </button>
              </form>
        </div>
        <img class="w-1/4" src="/storage/{{ $post->image_url }}" alt="" />
    </div>
</x-app-layout>
