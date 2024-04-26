<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="">
        <h2 class="  text-white py-3  bg-black text-center text-4xl  uppercase font-bold">Student List</h2>
    </div>

    <section>
        <div class="container mx-auto my-20">
            <div class=" flex justify-end mb-5">
                <a href="{{ route('add.student') }}"> ADD STUDENT</a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                <h2>
                    {{ Session::get('info') }}
                </h2>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Phone
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created At
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($students as $student)
                            <tr
                                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $student->id }}
                                </th>
                                <td class="px-6 py-4">
                                    <div class=" w-16 h-16 rounded-full">
                                        @if ($student->image)
                                            <img class="w-full rounded-full  object-fill"
                                                src="{{ asset('image/' . $student->image) }}" alt="">
                                        @else
                                            <img class="w-full  object-cover rounded-full"
                                                src="{{ asset('img/user.png') }}" alt="">
                                        @endif

                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $student->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $student->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $student->phone }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $student->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('edit.student', $student->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    <a href="{{ route('delete.student', $student->id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </section>

</body>

</html>
