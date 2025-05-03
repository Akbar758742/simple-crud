<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        /* @theme {
            --color-clifford: #da373d;
        } */

        @layer utilities {
            .container {
                @apply px-10 mx-auto p-10;

            }

        }
    </style>
    <title>simple-crud</title>
</head>

<body>
    <div class="container ">
        <div class="flex justify-between">
            <h1 class=" text-red-500 font-extrabold">create</h1>
            <a href="/" class=" bg-green-500 text-white px-2 py-1 rounded ">back to home</a>
        </div>
        <div class="">
            <form action="{{route('store')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="flex flex-col gap-3  ">

                    <label for="" >Name</label>
                    <input type="text" name="name" class=" border" value="{{old('name')}}">
                    @error('name')
                    <p class=" text-red-600 ">{{$message}}</p>
                        
                    @enderror

                    <label for="">Description</label>
                    <input type="textarea" name="description" class=" border" value="{{old('description')}}">
                    @error('description')
                    <p class=" text-red-600 ">{{$message}}</p>
                        
                    @enderror

                    <label for="">image</label>
                    <input type="file" name="image" class=" outline ">
                    @error('image')
                    <p class=" text-red-600 ">{{$message}}</p>
                        
                    @enderror

                    <div>
                        <input type="submit" value="submit"
                            class="bg-green-500 text-white py-2 px-4 rounded inline-block  ">
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
