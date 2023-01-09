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
        <form class="mt-10" method="POST" action="/admin/pengajuan-sktm/update/{{ $data->id }}" id="formPengajuan">
            @csrf
            <input type="text" class="hidden" name="status" value="{{ $data->status }}" />
            <div class="flex w-full">
                <div class="flex flex-col w-full justify-between">
                    <label>NIK</label>
                    <input @if ($data->status != 0) disabled @endif name='nik' type='number'
                        value="{{ old('nik') ? old('nik') : $data->nik }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 border-0 mt-1" />
                    @error('nik')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full ">
                    <label>Nama Lengkap</label>
                    <input name='nama' @if ($data->status != 0) disabled @endif
                        value="{{ old('nama') ? old('nama') : $data->nama }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('nama')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full ">
                    <label>Email</label>
                    <input name='email' @if ($data->status != 0) disabled @endif type="email"
                        value="{{ old('email') ? old('email') : $data->email }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1 border-0" />
                    @error('email')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex flex-col w-full">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" @if ($data->status != 0) disabled @endif
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 border-0 mt-1">
                        @if (old('jenis_kelamin'))
                            <option value="" @if (old('jenis_kelamin') == '') selected @endif>Pilih Jenis Kelamin
                            </option>
                            <option value="Laki-laki" @if (old('jenis_kelamin') == 'Laki-laki') selected @endif>Laki-laki</option>
                            <option value="Perempuan" @if (old('jenis_kelamin') == 'Perempuan') selected @endif>Perempuan</option>
                        @else
                            <option value="" @if ($data->jenis_kelamin == '') selected @endif>Pilih Jenis Kelamin
                            </option>
                            <option value="Laki-laki" @if ($data->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                            <option value="Perempuan" @if ($data->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                        @endif
                    </select>
                    @error('jenis_kelamin')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full">
                    <label>Agama</label>
                    {{-- <input name='nama' class="bg-gray-200 rounded-sm p-2 focus:outline-gray-400 mt-1" /> --}}
                    <select name="agama" id="agama" @if ($data->status != 0) disabled @endif
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 border-0 mt-1">
                        @if (old('agama'))
                            <option value="" @if (old('agama') == '') selected @endif>Pilih Agama</option>
                            <option value="Islam" @if (old('agama') == 'Islam') selected @endif>Islam</option>
                            <option value="Katolik" @if (old('agama') == 'Katolik') selected @endif>Katolik</option>
                            <option value="Protestan" @if (old('agama') == 'Protestan') selected @endif>Protestan</option>
                            <option value="Hindu" @if (old('agama') == 'Hindu') selected @endif>Hindu</option>
                            <option value="Buddha" @if (old('agama') == 'Buddha') selected @endif>Buddha</option>
                            <option value="Khonghucu" @if (old('agama') == 'Khonghucu') selected @endif>Khonghucu</option>
                        @else
                            <option value="" @if ($data->agama == '') selected @endif>Pilih Agama</option>
                            <option value="Islam" @if ($data->agama == 'Islam') selected @endif>Islam</option>
                            <option value="Katolik" @if ($data->agama == 'Katolik') selected @endif>Katolik</option>
                            <option value="Protestan" @if ($data->agama == 'Protestan') selected @endif>Protestan</option>
                            <option value="Hindu" @if ($data->agama == 'Hindu') selected @endif>Hindu</option>
                            <option value="Buddha" @if ($data->agama == 'Buddha') selected @endif>Buddha</option>
                            <option value="Khonghucu" @if ($data->agama == 'Khonghucu') selected @endif>Khonghucu</option>
                        @endif
                    </select>
                    @error('agama')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex flex-col w-full">
                    <label>Tempat Lahir</label>
                    <input name='pob' value="{{ old('pob') ? old('pob') : $data->pob }}"
                        @if ($data->status != 0) disabled @endif
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('pob')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full">
                    <label>Tanggal Lahir</label>
                    <input datepicker type="text" @if ($data->status != 0) disabled @endif name="dob"
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
                    <input name='pendidikan' @if ($data->status != 0) disabled @endif
                        value="{{ old('pendidikan') ? old('pendidikan') : $data->pendidikan }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('pendidikan')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
                <div class="w-14"></div>
                <div class="flex flex-col w-full">
                    <label>Jenis Pekerjaan</label>
                    <input name='pekerjaan' @if ($data->status != 0) disabled @endif
                        value="{{ old('pekerjaan') ? old('pekerjaan') : $data->pekerjaan }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('pekerjaan')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <div class="flex w-full mt-3">
                <div class="flex flex-col w-full">
                    <label>Alamat</label>
                    <input name='address' @if ($data->status != 0) disabled @endif
                        value="{{ old('address') ? old('address') : $data->address }}"
                        class="bg-gray-200 rounded-sm p-2 focus:ring-gray-400  focus:ring-2 focus:outline-0 mt-1" />
                    @error('address')
                        <h1 class="text-red-600">{{ $message }}</h1>
                    @enderror
                </div>
            </div>
            <div class="flex">

                <button type="button"
                    onclick="deleteDataPengajuan( '{{ url('') . '/admin/pengajuan-sktm/delete/' . $data->id }}','{{ csrf_token() }}')"
                    class="border-2 border-red-600 w-full mt-10 py-2 rounded-sm hover:bg-red-600 hover:text-white">Delete</button>
                <div class="w-8"></div>
                @if ($data->status == 0)
                    <button class="border-2 border-gray-400 w-full mt-10 py-2 rounded-sm hover:bg-gray-400 "
                        type="button" onclick="updateDataPengajuan()">Update</button>
                @endif
                {{-- <button type="button"
                    class="border-2 border-green-600 w-full mt-10 py-2 rounded-sm hover:bg-green-600 hover:text-white">Terima</button> --}}
            </div>
            @if ($data->status == 0)
                <div class="flex mt-5">
                    <button type="button" @if ($data->status == 2) disabled @endif
                        onclick="updateStatusDataPengajuan('menolak' , '{{ url('') . '/admin/pengajuan-sktm/edit/' . $data->id }}','{{ csrf_token() }}')"
                        class="border-2 border-red-600 w-full py-2 rounded-sm hover:bg-red-600 disabled:hover:bg-white disabled:hover:text-black hover:text-white">Tolak</button>
                    <div class="w-8"></div>
                    <button type="button" @if ($data->status == 1) disabled @endif
                        onclick="updateStatusDataPengajuan('menerima' , '{{ url('') . '/admin/pengajuan-sktm/edit/' . $data->id }}', '{{ csrf_token() }}')"
                        class="border-2 border-green-600 w-full py-2 rounded-sm hover:bg-green-600 disabled:hover:bg-white hover:text-white disabled:hover:text-black">Terima</button>
                </div>
            @endif

        </form>
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
