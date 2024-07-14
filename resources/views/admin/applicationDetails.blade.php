<title>Home</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Home
        </h2>

    </x-slot>

    <style>
        h1 {
            font-weight: 700;
            margin: 20px;
        }

        label {
            margin: 15px 0;
        }

        p,
        input,
        textarea {
            font-weight: 400 !important;
        }

        form {
            div {
                display: flex;
                flex-direction: column;
                padding: 20px 0;
            }
        }

        input,
        textarea,
        select {
            padding: 10px !important;
            border-radius: 10px !important;

            &:hover {
                cursor: pointer;
            }
        }

        .attachment {
            width: fit-content;
            margin: 20px 20px 0 0;
            border: 2px dashed #999;

            .icon-doc {
                margin: 30px;
            }
        }
    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-gray-900 font-bold bg-grey-50 flex flex-col items-center justify-center">
                    <h1 class="text-3xl">Application</h1>
                    @if (auth()->user()->role == 'admin')
                        <form class="user-form w-full lg:w-1/2 flex flex-col p-5" method="POST" id="myForm"
                            onsubmit="showAlert(event)" action="{{ route('form.update', ['f_id' => $form->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div>
                                <input type="hidden" id="user_id" name="user_id" value="{{ $form->user->id }}"
                                    required>
                                <label>
                                    Name:
                                </label>
                                <input type="text" value="{{ $form->user->name }}" disabled>
                            </div>

                            <div>
                                <label>
                                    Title:
                                </label>
                                <input type="text" name='title' placeholder="Title" value="{{ $form->title }}"
                                    disabled>
                            </div>



                            <div class="my-30 mx-auto flex flex-col" style="margin:10px; color: grey">
                                Attachment:

                                <input type="text" name="attachment" value="{{ $form->attachment }}"
                                    style="padding:5px; margin:5px; display:block" disabled>


                                @if (Str::contains($form->attachment, '.pdf'))
                                    <p>
                                        Click <a href="{{ asset($form->attachment) }}"
                                            class="underline text-blue-700 w-0" download>here</a> to download
                                    </p>
                                @endif

                            </div>

                            <div>
                                <label>
                                    Description:
                                </label>
                                <textarea type="text" name='description' placeholder="Description" disabled>{{ $form->description }}</textarea>
                            </div>


                            <select class="input" id="status" name="status" required>
                                <option value="Approved" {{ $form->status == 'Approved' ? 'selected' : '' }}>
                                    Approved
                                </option>
                                <option value="Rejected" {{ $form->status == 'Rejected' ? 'selected' : '' }}>
                                    Rejected
                                </option>
                            </select>
                            <div class="flex justify-center w-full pt-3" style="flex-direction: row">
                                <input class="btn" style="padding: 10px 20px !important;" type="submit"
                                    value="Submit Response">
                            </div>

                            <div class="flex justify-center w-full pt-3" style="flex-direction: row">
                                <a class="btn" href="{{ route('form.index.student', ['id' => auth()->user()->id]) }}"
                                    style="padding: 10px 20px !important;">Back</a>
                            </div>
                        </form>
                    @else
                        @if ($form->status == 'Approved')
                            <form class="user-form w-full lg:w-1/2 flex flex-col p-5" method="POST" id="myForm"
                                onsubmit="showAlert(event)" action="{{ route('form.update', ['f_id' => $form->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div>
                                    <input type="hidden" id="user_id" name="user_id" value="{{ $form->user->id }}"
                                        required>
                                    <label>
                                        Name:
                                    </label>
                                    <input type="text" value="{{ $form->user->name }}" disabled>
                                </div>

                                <div>
                                    <label>
                                        Title:
                                    </label>
                                    <input type="text" name='title' placeholder="Title"
                                        value="{{ $form->title }}" disabled>
                                </div>



                                <div class="my-30 mx-auto flex flex-col" style="margin:10px; color: grey">
                                    Attachment:

                                    <input type="text" name="attachment" value="{{ $form->attachment }}"
                                        style="padding:5px; margin:5px; display:block" disabled>


                                    @if (Str::contains($form->attachment, '.pdf'))
                                        <p>
                                            Click <a href="{{ asset($form->attachment) }}"
                                                class="underline text-blue-700 w-0" download>here</a> to download
                                        </p>
                                    @endif

                                </div>

                                <div>
                                    <label>
                                        Description:
                                    </label>
                                    <textarea type="text" name='description' placeholder="Description" disabled>{{ $form->description }}</textarea>
                                </div>
                              
                                <div class="flex justify-center w-full pt-3" style="flex-direction: row">
                                    <a class="btn"
                                        href="{{ route('form.index.student', ['id' => auth()->user()->id]) }}"
                                        style="padding: 10px 20px !important;">Back</a>
                                </div>
                            </form>
                        @else
                            <form class="user-form w-full lg:w-1/2 flex flex-col p-5" method="POST" id="myForm"
                                onsubmit="showAlert(event)"
                                action="{{ route('form.updateStudent', ['f_id' => $form->id, 'id' => auth()->user()->id]) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div>
                                    <input type="hidden" id="user_id" name="user_id"
                                        value="{{ $form->user->id }}" required>
                                    <label>
                                        Name:
                                    </label>
                                    <input type="text" value="{{ $form->user->name }}" disabled>
                                </div>

                                <div>
                                    <label>
                                        Title:
                                    </label>
                                    <input type="text" name='title' placeholder="Title"
                                        value="{{ $form->title }}" required>
                                </div>

                                <div>
                                    <label>
                                        Description:
                                    </label>
                                    <textarea type="text" name='description' placeholder="Description">{{ $form->description }}</textarea>
                                </div>

                                <input name="status" value="Pending" type='hidden'>

                                <div class="flex flex-col" style=" color: grey">
                                    Attachment:
                                    <input type="text" value="{{ $form->attachment }}"
                                    style="padding:5px; margin:5px; display:block">
                                    <input type="file" name="attachment" value="{{ $form->attachment }}"
                                        style="padding:5px; margin:5px; display:block">

                                    @if (Str::contains($form->attachment, '.pdf'))
                                        <p class="w-fit">
                                            Click <a href="{{ asset($form->attachment) }}"
                                                class="underline text-blue-700 w-0" download>here</a> to download
                                        </p>                                     
                                    @endif
                                </div>

                                <div class="flex justify-center w-full pt-3" style="flex-direction: row">
                                    <input class="btn" style="padding: 10px 20px !important;" type="submit"
                                        value="Submit Response">
                                </div>

                                <div class="flex justify-center w-full pt-3" style="flex-direction: row">
                                    <a class="btn"
                                        href="{{ route('form.index.student', ['id' => auth()->user()->id]) }}"
                                        style="padding: 10px 20px !important;">Back</a>
                                </div>
                            </form>
                        @endif

                    @endif
                </div>
            </div>
            <footer>
        </div>
</x-app-layout>

<script>
    function showAlert(event) {
        event.preventDefault();
        alert('Form updated successfully!');
        document.getElementById('myForm').submit();
    }
</script>

<script>
    function previewFile(event) {
        var input = event.target;
        var file = input.files[0];
        var fileNameDiv = document.getElementById('file-name');
        var imagePreviewDiv = document.getElementById('image-preview');
        var previewImg = document.getElementById('preview');
        var icon = document.getElementsByClassName('icon-doc')[0];

        if (file) {
            var fileType = file.type;

            fileNameDiv.style.display = 'none';
            imagePreviewDiv.style.display = 'none';
            previewImg.style.display = 'none';

            if (fileType === 'application/pdf') {
                fileNameDiv.innerHTML = file.name;
                fileNameDiv.style.display = 'block';
                icon.style.display = 'none';
            } else {
                alert('Unsupported file type!');
            }
        }
    }
</script>
