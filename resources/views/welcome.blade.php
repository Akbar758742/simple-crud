<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --color-clifford: #da373d;
        }

        @layer utilities {
            .container {
                @apply max-w-6xl px-10 mx-auto p-10;

            }

            .btn {
                @apply bg-green-500 text-white px-2 py-1 rounded inline-block;
            }
            
            .btn2 {
                @apply bg-red-500 text-white px-2 py-1 rounded inline-block;
            }
        }
    </style>
    <title>simple-crud</title>
</head>

<body>
    <div class="container">
        <div class="flex justify-between">
            <h1 class=" text-red-500 font-extrabold">home</h1>
            <a href="/create" class="  btn ">add a new post</a>
        </div>

        @if (session('success'))
            <h2 class="bg-green-500 text-white p-2 rounded mt-2 inline-block">
                {{ session('success') }}
            </h2>
        @endif

        <div>
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 border  ">
                                <thead>
                                    <tr>

                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Id
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Name</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">
                                            Description</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">image
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">
                                            action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($posts as $post)
                                        <tr class="odd:bg-white even:bg-gray-100">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                                {{ $post->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                {{ $post->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                {{ $post->description }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800"> <img
                                                    src="images/{{ $post->image }}" width="80px" alt=""></td>
                                            <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                <a href="{{route('edit',$post->id)}}" class=" btn">edit</a>
                                                <a href="{{route('delete',$post->id)}}" class=" btn2 text-red-700 ">delete</a>
                                            </td>
                                        </tr>
                                    @endforeach





                                    </tr>
                                </tbody>
                            </table>
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>
