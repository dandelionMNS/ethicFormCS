<x-app-layout>
    <style>
        td {
            padding: 20px;
            border-top: 1px solid #eee;
        }

        thead td {
            font-size: 1.2rem;
            font-weight: 700;
        }

        .counters {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0 0 40px 0;
            width: 100%;
            aspect-ratio: 3/2;


            h1 {
                font-size: 3rem;
                font-weight: 700;
                margin: 15px
            }

            h3 {
                font-size: 1.2rem;
                font-weight: 400;
                height: unset;
            }
        }

        .mid-c {
            border-left: 1px solid #999;
            border-right: 1px solid #999;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Application List

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white text-base overflow-hidden shadow-sm sm:rounded-lg flex flex-col items-center p-10">

                @if (auth()->user()->role == 'admin')
                    <div class="grid grid-cols-1 w-full md:grid-cols-3" style="max-width:800px">
                        <div class="counters">

                            <h1>
                                {{ $forms->where('status', 'Pending')->count() }}
                            </h1>
                            <p>
                                Pending
                            </p>
                        </div>
                        <div class="counters mid-c">

                            <h1>
                                {{ $forms->where('status', 'Approved')->count() }}
                            </h1>
                            <p>
                                Approved
                            </p>

                        </div>
                        <div class="counters">
                            <h1>
                                {{ $forms->where('status', 'Rejected')->count() }}
                            </h1>
                            <p>
                                Rejected
                            </p>
                        </div>
                    </div>

                @else
                    <div class="grid grid-cols-1 w-full md:grid-cols-3" style="max-width:800px">
                        <div class="counters">

                            <h1>
                                {{ $forms->where('status', 'Pending')->where('user_id', $user)->count() }}
                            </h1>
                            <p>
                                Pending
                            </p>
                        </div>
                        <div class="counters mid-c">

                            <h1>
                                {{ $forms->where('status', 'Approved')->where('user_id', $user)->count() }}
                            </h1>
                            <p>
                                Approved
                            </p>

                        </div>
                        <div class="counters">
                            <h1>
                                {{ $forms->where('status', 'Rejected')->where('user_id', $user)->count() }}
                            </h1>
                            <p>
                                Rejected
                            </p>
                        </div>
                    </div>
                @endif



                <table class="w-full">
                    <thead>
                        <td class="w-min">No.</td>
                        @if (auth()->user()->role == 'admin')
                            <td class="w-1/2 text-nowrap">Name</td>
                        @endif
                        <td class="w-1/2 text-nowrap ">Title</td>
                        <td class="w-fit text-nowrap">Status</td>
                        <td colspan="2">Actions</td>
                    </thead>
                    <tbody>
                        <div class="hidden">
                            <?= $counter = 1 ?>
                        </div>
                        @foreach ($forms as $form)
                            @if (auth()->user()->role == 'admin')
                                <tr>
                                    <td>
                                        <?= $counter++ ?>
                                    </td>
                                    <td>{{ $form->user->name }}</td>
                                    <td>{{ $form->title }}</td>
                                    <td>{{ $form->status }}</td>
                                    <td class="p-3">
                                        <a href="{{ route('form.details', ['f_id' => $form->id]) }}" class="btn">
                                            Details
                                        </a>
                                    </td>

                                    <td class="p-3">
                                        @if ($form->status != 'Approved')
                                            <form class="w-fit" method="POST" onsubmit="showAlert(event)"
                                                action="{{ route('form.delete', ['f_id' => $form->id]) }}">

                                                @csrf
                                                @method('DELETE')
                                                <input class="btn dlt" type="submit" value="Remove">
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @else
                                @if (auth()->user()->id == $form->user_id)
                                    <tr>
                                        <td>
                                            <?= $counter++ ?>
                                        </td>
                                        <td>{{ $form->title }}</td>
                                        <td>{{ $form->status }}</td>
                                        <td class="p-3">
                                            <a href="{{ route('form.details', ['f_id' => $form->id]) }}"
                                                class="btn">
                                                Details
                                            </a>
                                        </td>

                                        <td class="p-3">
                                            @if ($form->status != 'Approved')
                                                <form class="w-fit" method="POST" onsubmit="showAlert(event)"
                                                    action="{{ route('form.delete', ['f_id' => $form->id]) }}">

                                                    @csrf
                                                    @method('DELETE')
                                                    <input class="btn dlt" type="submit" value="Remove">
                                                </form>
                                            @endif

                                        </td>

                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function showAlert(event) {
        event.preventDefault();
        alert('Form Delete successfully!');
        event.target.submit();
    }
</script>
