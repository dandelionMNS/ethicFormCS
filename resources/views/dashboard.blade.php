<title>Home</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black  leading-tight">
            Home
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" text-gray-900 font-bold  flex flex-col items-center justify-center">
                    <div class="flex w-full relative" style='height: 600px'>
                        <div class="flex flex-col items-center py-10" style="width: 55%">
                            <h1 class="text-3xl my-3">Welcome to Ethics Form UiTM</h1>
                            <p class="text-lg font-normal p-3 text-justify h-fit">The Research Ethics Committee (REC) of
                                Universiti Teknologi MARA (UITM) was approved by the Vice-Chancellor and established in
                                2024. The committee is on Tier 2 (Executive), under governance of UiTMReasearch and
                                Innovation, where it reports to the Univerity Research Committee (JKIPU) and to the UiTM
                                Senate. <br> The objectives of REC are to safeguard the rights, safety and well-being of
                                human research participants, povide timely, comprehensiveand independant review of
                                ethics of purposed studies and ensure that the research complies with existing law amd
                                regulation. The responsibility of the REC includes, but is not approval/disapproval,
                                amendment or termination of studies which do not comfront to the standard guidelines.
                            </p>
                        </div>
                        <div class="absolute flex justify-end items-center right-0"
                            style="width:45%; overflow:hidden; height: 100%; border-top-left-radius: 55%; border-bottom-left-radius: 55%">
                            <img src="{{ asset('./images/UITM.jpeg') }}" style="height:100%; width: auto"
                                alt='uitm'>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        li {
            padding: 30px;
            border: #473193 2px solid;
            border-radius: 25px;
            margin: 15px;
            transition: 400ms ease-in-out;

            &:hover {
                cursor: pointer;
                scale: 1.02
            }
        }
    </style>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6  text-gray-900 font-bold bg-grey-50 flex flex-col items-center justify-center">
                <h2 class="text-3xl font-bold text-gray-900">Application Process</h2>
                <p class="text-lg font-normal mt-4">
                    Researchers who wish to submit their studies for ethical review must follow these steps:
                </p>
                <div class="list-decimal pl-5 mt-4 text-lg font-normal">
                    <li>Complete the online application form available on our website.</li>
                    <li>Submit all necessary documentation, including the study protocol and informed consent forms.
                    </li>
                    <li>Await confirmation of receipt and further instructions from the REC office.</li>
                    <li>Attend any required meetings or provide additional information if requested.</li>
                    <li>Receive the REC's decision and adhere to any stipulated conditions.</li>
                </div>
            </div>
        </div>
    </div>


    <footer class="bg-white shadow mt-10">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-gray-500">&copy; 2024 Universiti Teknologi MARA. All rights reserved.</p>
        </div>
    </footer>

</x-app-layout>
