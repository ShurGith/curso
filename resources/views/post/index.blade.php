@props([
    'i' => 0,
    'page_title'=>'Index y Listado de temas',
])
<x-main-header></x-main-header>
            <!-- Page Heading -->
            @isset($page_title)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $page_title }}
                    </div>
                </header>
            @endisset
<div class="py-12">
        <!-- Modal toggle -->
     <div class="w-1/5 flex justify-center pb-5">
        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Nuevo Post
        </button>
    </div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- Main modal -->
                <div id="crud-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-md max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Creando un Nuevo Post
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="crud-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form class="p-4 md:p-5" action="{{ route('post.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="grid gap-4 mb-4 grid-cols-2">
                                    <div class="col-span-2">
                                        <label for="title"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                                        <input type="text" name="title" id="title"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Type product name" required="">
                                        @error('title')
                                            <p style="color:red;">$error</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="body"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Texto
                                            del Post</label>
                                        <textarea id="body" name="body" rows="4"
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Write product description here"></textarea>
                                        @error('body')
                                            <p style="color:red;">$error</p>
                                        @enderror
                                    </div>
                                    <div class="col-span-2">
                                        <label for="file"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagen</label>
                                        <input id="file" type="file" name="image_url"
                                            class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Write product description here"></input>
                                        @error('file')
                                            <p style="color:red;">$error</p>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit"
                                    class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Añadir el nuevo Post
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <!-- SUCCESS -->
                    @if (session()->has('success'))
                        <div
                            class="absolute bg-green-400 flex justify-center w-full alerta transition duration-1000 ease-in-out">
                            <h3 class="text-gray-600 text-sm"> {{ session()->get('success') }}</h3>
                        </div>
                    @endif
                    @if (session()->has('borrado'))
                        <div
                            class="absolute bg-red-400 flex justify-center w-full alerta transition duration-1000 ease-in-out">
                            <h3 class="text-gray-600 text-sm"> {{ session()->get('borrado') }}</h3>
                        </div>
                    @endif
                    <!-- SUCCESS -->
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Imagen
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Titulo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Cuerpo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)
                                <?php $i++; ?>
                                <tr
                                    class="{{ $i % 2 == 0 ? 'bg-slate-200' : 'bg-slate-300' }} hover:bg-gray-300 dark:hover:bg-gray-600 ">
                                    <td class="px-6 py-4">
                                        @if ($post->image_url)
                                            <img class="max-w-xs h-auto" src="/storage/images/{{ $post->image_url }}"
                                                alt="" />
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="#">
                                            <h5
                                                class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                                {{ $post->title }}</h5>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $post->body }}
                                        </p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="border flex gap-2 size-full">
                                            <a href="{{ route('post.show', $post->id) }}"
                                                class="font-medium text-white px-4 py-2 bg-blue-600 rounded dark:text-blue-500 hover:underline">Ver</a>
                                            <a href="{{ route('post.edit', $post->id) }}"
                                                class="font-medium text-white px-4 py-2 bg-blue-600 rounded dark:text-blue-500 hover:underline">Editar</a>
                                            <form class="border" method="POST"
                                                action="{{ route('post.delete', $post->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit"
                                                    class="font-medium text-white px-4 py-2 bg-red-600 rounded hover:underline cursor-pointer"
                                                    value="Borrar">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                No hay datos
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const alertas = document.querySelectorAll('.alerta')
        setTimeout(() => {
            for (a of alertas) {
                a.classList.add('opacity-0')
            }
        }, 2000);
        setTimeout(() => {
            for (a of alertas) {
                a.remove()
            }
        }, 2500);
    })
</script>

<x-main-footer></x-main-footer>
