<title>Home</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Home
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  text-gray-900 font-bold bg-red-50 flex flex-col items-center justify-center">
                    <h1 class="text-3xl">Welcome to Ethics Form UiTM</h1>
                    <img src="{{ asset('./images/UITM.jpeg') }}" style="height:400px; margin: 20px;" alt='uitm'>

                    <p class="text-lg font-normal">The Research Ethics Committee (REC) of Universiti Teknologi MARA (UITM) was approved by the
                        Vice-Chancellor
                        and established in 2024. The committee is on Tier 2 (Executive), under governance of
                        UiTMReasearch and
                        Innovation, where it reports to the Univerity Research Committee (JKIPU) and to the UiTM Senate.
                        <br>
                        The objectives of REC are to safeguard the rights, safety and well-being of human research
                        participants,
                        povide timely, comprehensiveand independant review of ethics of purposed studies and ensure that
                        the
                        research complies with existing law amd regulation. The responsibility of the REC includes, but
                        is not
                        approval/disapproval, amendment or termination of studies which do not comfront to the standard
                        guidelines.

                    </p>
                </div>


            </div>
        </div>

        <footer>
    </div>
</x-app-layout>
