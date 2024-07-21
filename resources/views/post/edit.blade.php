@props([
   'page_title' => "Editando ".$post->title
])

<x-main-header>
</x-main-header>
            <!-- Page Heading -->
            @isset($page_title)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $page_title }}
                    </div>
                </header>
            @endisset
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div
                    class=" flex flex-col bg-white border border-gray-200 rounded-lg shadow md:flex-row hover:bg-gray-100">
                    <div class="w-4/5 flex flex-col items-start">
                        <form class="pl-10 w-11/12" action="{{ route('post.update', $post->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="w-full flex flex-col pt-4 gap-2">
                                <div>
                                    <label for="title"
                                        class="block mb-2 text-base font-bold text-gray-900 dark:text-white">Titulo</label>
                                    <input type="text" name="title" id="title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Type product name" required="" value="{{ $post->title }}">
                                    @error('title')
                                        <p style="color:red;">$error</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="body"
                                        class="block mb-2 text-base font-bold text-gray-900 dark:text-white">Texto del
                                        Post</label>
                                    <textarea id="body" name="body" rows="4"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Write product description here">{{ $post->body }}</textarea>
                                    @error('body')
                                        <p style="color:red;">$error</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="image_url"
                                        class="block mb-2 text-base font-bold text-gray-900 dark:text-white">Imagen</label>
                                    <input id="image_url" type="file" name="image_url"
                                        class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Write product description here"></input>
                                    @error('image_url')
                                        <p style="color:red;">$error</p>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit"
                                class="my-4 text-white inline-flex items-center bg-blue-700 hover:bg-blue-800  font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                Editar el Post
                            </button>
                        </form>
                    </div>
                    <img class="w-1/5 p-8" src="/storage/images/{{ $post->image_url }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<x-main-footer></x-main-footer>
