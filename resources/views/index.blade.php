@extends('template')

@section('content')
    @if (session('success'))
        <p class="text-green-500 text-lg mb-7 text-center">{{ session('success') }}</p>
    @endif
    <div class="container mx-auto px-10 bg-slate-200 mt-2 h-24">
        <p class="font-semibold text-lg">Filter by:</p>
        <form method="GET" action="/">
            @csrf
            <div class="flex justify-evenly items-center">
                <div>
                    <label for="cari_nama">Nama:</label>
                    <input type="text" id="cari_nama" name="cari_nama" class="w-56"
                        value="{{ request()->input('cari_nama') }}">
                </div>
                <div>
                    <label for="cari_jenis_kelamin">Jenis kelamin</label>
                    <select name="cari_jenis_kelamin" id="cari_jenis_kelamin" class="w-72">
                        <option value="">(Tanpa filter)</option>
                        <option value="Laki-laki"
                            {{ request()->input('cari_jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan"
                            {{ request()->input('cari_jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="cari_jurusan">Jurusan</label>
                    <select name="cari_jurusan" id="cari_jurusan" class="w-64">
                        <option value="">(Tanpa filter)</option>
                        <option value="RPL" {{ request()->input('cari_jurusan') == 'RPL' ? 'selected' : '' }}>
                            RPL
                        </option>
                        <option value="TKJ" {{ request()->input('cari_jurusan') == 'TKJ' ? 'selected' : '' }}>
                            TKJ
                        </option>
                        <option value="MM" {{ request()->input('cari_jurusan') == 'MM' ? 'selected' : '' }}>
                            MM
                        </option>
                    </select>
                </div>
                <button type="submit" class="bg-yellow-400 rounded-md text-white w-24">Cari</button>
            </div>
        </form>
    </div>
    <div class="flex justify-center mt-7">
        <a href="/create" class="bg-green-600 w-32 text-center rounded-md text-white font-semibold">+Tambah siswa</a>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama pendaftar
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis kelamin
                    </th>
                    <th scope="col" class="px-6 py-3">
                        No HP
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Asal sekolah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jurusan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal lahir
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NISN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($siswa as $data)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $i++ }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $data->Nm_pendaftar }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->Alamat }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->Jenis_kelamin }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->No_hp }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->Asal_sekolah }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->Jurusan }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->Tgl_lahir }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $data->NISN }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-center">
                                <a href="/edit/{{ $data->Id_pendaftar }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            </div>
                            <div class="text-center mt-5">
                                <form method="POST" action="/delete/{{ $data->Id_pendaftar }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600"
                                        onclick="return confirm('Ingin menghapus data siswa atas nama {{ $data->Nm_pendaftar }}')">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- pagination --}}
    <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="flex flex-1 justify-between sm:hidden">
            <a href="#"
                class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Previous</a>
            <a href="#"
                class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Next</a>
        </div>
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Showing
                    <span class="font-medium">{{ $siswa->firstItem() }}</span>
                    to
                    <span class="font-medium">{{ $siswa->lastItem() }}</span>
                    of
                    <span class="font-medium">{{ $siswa->total() }}</span>
                    results
                </p>
            </div>
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <a href="{{ $siswa->previousPageUrl() . '&' . http_build_query(request()->except('page')) }}"
                        class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 {{ $siswa->onFirstPage() ? 'pointer-events-none opacity-40' : '' }}">
                        <span class="sr-only">Previous</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>

                    <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                    @php
                        // Hitung jumlah halaman yang akan ditampilkan di pagination
                        $maxPages = min($siswa->lastPage(), 5);
                        // Hitung halaman pertama yang akan ditampilkan di pagination
                        $startPage = max(1, min($siswa->currentPage() - 2, $siswa->lastPage() - 4));
                    @endphp
                    @for ($i = $startPage; $i < $startPage + $maxPages; $i++)
                        <a href="{{ $siswa->url($i) . '&' . http_build_query(request()->except('page')) }}"
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold {{ $siswa->currentPage() == $i ? 'z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600' : 'text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0' }}">{{ $i }}</a>
                    @endfor

                    <a href="{{ $siswa->nextPageUrl() . '&' . http_build_query(request()->except('page')) }}"
                        class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 {{ $siswa->hasMorePages() ? '' : 'pointer-events-none opacity-40' }}">
                        <span class="sr-only">Next</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </div>
@endsection
