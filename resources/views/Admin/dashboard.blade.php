@extends('layout.main')
@extends('layout.sweetalert')
@section('content')
    @include('layout.header')
    <section class="bg-white mt-10 max-w-screen-xl mx-auto p-5 rounded-md">
        <h1 class="text-2xl font-bold">Daftar Pengajuan</h1>
        <div class="flex flex-col mt-3 w-full">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-4 inline-block min-[805px]:block  sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class=" text-center w-full">
                            <thead class="border-b bg-gray-800 ">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 rounded-tl-md">
                                        NIK
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 ">
                                        NAMA
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        ALAMAT
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4">
                                        STATUS
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-white px-6 py-4 rounded-tr-md">
                                        AKSI
                                    </th>
                                </tr>
                            </thead class="border-b">
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr class="bg-white border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $data->nik }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $data->nama }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $data->address }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap ">
                                            <div
                                                class="py-1 px-3 
                                                @if ($data->status == 0) bg-blue-600
                                                @elseif ($data->status == 1)
                                                bg-green-600
                                                    @elseif ($data->status == 2)
                                                    bg-red-600 @endif
                                                 text-white w-fit rounded font-semibold mx-auto">
                                                @if ($data->status == 0)
                                                    Dalam Proses
                                                @elseif ($data->status == 1)
                                                    Diterima
                                                @elseif ($data->status == 2)
                                                    Ditolak
                                                @endif
                                            </div>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <div>
                                                <a href="/admin/detail/{{ $data->id }}"
                                                    class="bg-[#251351] text-white rounded py-1 px-2 font-semibold cursor-pointer">Detail</a>
                                                @if ($data->status == 0)
                                                    <span
                                                        onclick="updateStatusDataPengajuan('menerima' , '{{ url('') . '/admin/pengajuan-sktm/edit/' . $data->id }}', '{{ csrf_token() }}')"
                                                        class="bg-green-600 text-white rounded py-1 px-2 font-semibold cursor-pointer">Terima</span>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        <div class="mt-5">

                            {{ $datas->links('layout.paginate') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('js/admin.js') }}"></script>
    @if (session('success'))
        <script>
            showAlert('Success', '{{ session('success') }}', 'success', 'OK');
        </script>
    @endif
@endpush
