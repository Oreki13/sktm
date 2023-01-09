@extends('layout.main')
@extends('layout.sweetalert')
@section('content')
    @include('layout.header')
    <section class="bg-white mt-10 max-w-screen-xl mx-auto p-5 rounded-md mb-16">
        <div class="flex justify-between w-full">
            <div>

                <h1 class="text-2xl font-bold ">Detail Pengajuan</h1>
            </div>

            <div class="py-1 px-3 {{ $bgColorStatus }} text-white w-fit rounded font-semibold ">
                @if ($data->status == 0)
                    Dalam Proses
                @elseif ($data->status == 1)
                    Diterima
                @elseif ($data->status == 2)
                    Ditolak
                @endif
            </div>

        </div>
        <div class="mt-10">
            {{-- @csrf --}}
            {{-- {{ $data }} --}}
            <input type="text" class="hidden" name="status" value="{{ $data->status }}" />
            <div class="flex w-full">
                <div class="flex flex-col w-full justify-between">
                    <label>NIK</label>
                    <input disabled name='nik' type='number' value="{{ old('nik') ? old('nik') : $data->nik }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 border-0 mt-1" />
                    @error('nik')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full ">
                    <label>Nama Lengkap</label>
                    <input name='nama' disabled value="{{ old('nama') ? old('nama') : $data->nama }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('nama')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full ">
                    <label>Email</label>
                    <input name='email' disabled type="email" value="{{ old('email') ? old('email') : $data->email }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1 border-0" />
                    @error('email')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex flex-col w-full">
                    <label>Jenis Kelamin</label>
                    <input name='jenis_kelamin' disabled type="text"
                        value="{{ old('jenis_kelamin') ? old('jenis_kelamin') : $data->jenis_kelamin }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1 border-0" />
                    @error('jenis_kelamin')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full">
                    <label>Agama</label>
                    <input name='agama' disabled type="text" value="{{ old('agama') ? old('agama') : $data->agama }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1 border-0" />
                    @error('agama')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex flex-col w-full">
                    <label>Tempat Lahir</label>
                    <input name='pob' value="{{ old('pob') ? old('pob') : $data->pob }}" disabled
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('pob')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full">
                    <label>Tanggal Lahir</label>
                    <input datepicker type="text" disabled name="dob"
                        value="{{ old('dob') ? old('dob') : $data->dob }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 border-0 mt-1"
                        placeholder="Select date">
                    @error('dob')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex flex-col w-full">
                    <label>Pendidikan</label>
                    <input name='pendidikan' disabled
                        value="{{ old('pendidikan') ? old('pendidikan') : $data->pendidikan }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('pendidikan')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full">
                    <label>Jenis Pekerjaan</label>
                    <input name='pekerjaan' disabled value="{{ old('pekerjaan') ? old('pekerjaan') : $data->pekerjaan }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('pekerjaan')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex flex-col w-full">
                    <label>Alamat</label>
                    <input name='address' disabled value="{{ old('address') ? old('address') : $data->address }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('address')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>

        </div>
    </section>
@endsection
@push('js')
    {{-- @vite('resources/js/admin.js') --}}
    <script src="{{ asset('js/admin.js') }}"></script>
    @if (session('success'))
        <script>
            showAlert('Success', '{{ session('success') }}', 'success', 'OK');
        </script>
    @endif
@endpush
