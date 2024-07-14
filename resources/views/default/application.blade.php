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
                    <h1 class="text-3xl text-black ">Application</h1>

                    <form class="user-form w-full lg:w-1/2 flex flex-col p-5" method="POST" id="myForm"
                        onsubmit="showAlert(event)" action="{{ route('form.add') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <input type="hidden" id="user_id" name="user_id" value="{{ auth()->user()->id }}"
                                required>
                            <label>
                                Name:
                            </label>
                            <input type="text" value="{{ auth()->user()->name }}" disabled>
                        </div>

                        <div>

                            <label>
                                Title:
                            </label>
                            <input type="text" name='title' placeholder="Title">
                        </div>



                        <div class="my-30 mx-auto flex flex-col" style="margin:10px; color: grey">
                            Attachment:
                            <label for="attachment" class="attachment">
                                <img class="icon-doc" src="{{ asset('./icons/ic_plus.svg') }}">
                                <div id="image-preview" class="my-30 mx-auto"
                                    style="margin:10px; padding:0; display:none">
                                    <img id="preview" src="#" alt="Image Preview"
                                        style="max-width: 100px; max-height: 100px; display: none;">
                                </div>
                                <div id="file-name" style="display:none; padding:20px; color: black;"></div>
                            </label>
                            <input type="file" id="attachment" name="attachment" accept=".pdf"
                                onchange="previewFile(event)" style="padding:5px; margin:5px; display:block">
                            <input type="hidden" id="attachment-hidden" name="attachment"
                                value="{{ old('attachment') }}">
                            <p class="italic">Please upload file <strong class="text-red-500">.pdf</strong> only</p>
                        </div>




                        <div>

                            <label>
                                Description:
                            </label>
                            <textarea type="text" name='description' placeholder="Description" required></textarea>
                        </div>


                        <div class="flex justify-center w-full pt-3" style="flex-direction: row">
                            <input class="btn" style="padding: 10px 20px !important;" type="submit"
                                value="Send Application">
                        </div>
                    </form>


                </div>
            </div>
            <footer>
        </div>
</x-app-layout>

<script>
    function showAlert(event) {
        event.preventDefault();
        alert('Form submitted successfully!');
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

            // Hide elements initially
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



{{-- If input file empty --}}

<script>
    function previewFile(event) {
        var input = event.target;
        var file = input.files[0];
        var fileNameDiv = document.getElementById('file-name');
        var imagePreviewDiv = document.getElementById('image-preview');
        var previewImg = document.getElementById('preview');
        var icon = document.getElementsByClassName('icon-doc')[0];

        var attachmentHiddenInput = document.getElementById('attachment-hidden');

        if (file) {
            var fileType = file.type;

            fileNameDiv.style.display = 'none';
            imagePreviewDiv.style.display = 'none';
            previewImg.style.display = 'none';

            if (fileType === 'application/pdf') {
                fileNameDiv.innerHTML = file.name;
                fileNameDiv.style.display = 'block';
                icon.style.display = 'none';
                attachmentHiddenInput.value = ''; 
            } else {
                alert('Unsupported file type!');
                input.value = ''; 
            }
        } else {
            attachmentHiddenInput.value = ''; 
        }
    }
</script>
