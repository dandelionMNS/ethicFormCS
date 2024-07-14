<title>Home</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-black  text-xl leading-tight">
            Guide
        </h2>

    </x-slot>

    <style>
        h1 {
            font-weight: 700;
            margin: 20px;
        }

        p {
            margin-top: 30px;
            font-weight: 500 !important;
        }

        ul {
            margin: 10px 0;
            font-weight: 400;
        }

        .img {
            max-width: 800px;
            width: 90%;
        }
    </style>
    <div class="pb-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-gray-900 font-bold bg-grey-50 flex flex-col items-center justify-center">
                    <h1 class="text-3xl">Ethics Form Guidelines</h1>
                    <img src='{{ asset('./images/guideline.jpg') }}' class="img">
                    <p class="text-lg text-normal">Here are some guideline for filling out the Ethics Form:</p>
                    <ul class="list-disc">
                        <li>Provide accurate information in all fields.</li>
                        <li>Be concise yet thorough in explaining your ethical consideration.</li>
                        <li>Contact the relevant authority if you have any questions regarding the form.</li>
                        <li>Ensure compliance with ethical standards and regulations.</li>
                    </ul>
                </div>
            </div>
        </div>

        <footer>
    </div>
</x-app-layout>
