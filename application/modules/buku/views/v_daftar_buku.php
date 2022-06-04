<!-- Form Tambah Buku Baru -->
<h1 class="block text-center m-4 text-3xl text-slate-500 ">Form Tambah Buku Baru</h1>
<div class="mx-4 card rounded-lg shadow-lg mb-4 border border-slate-200">
    <div class="max-w-xl md:max-w-4xl">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-start text-slate-500">
            <form action="" class="contents">
                <div class="grid grid-cols-1">
                    <div class="form-control m-4">
                        <label class="label" for="judul">
                            <span class="label-text">Judul Buku</span>
                        </label>
                        <input type="text" name="judul" id="judul" placeholder="Masukkan Judul Buku" class="input input-sm input-bordered w-full focus:outline-none focus:border-sky-400" />
                    </div>
                    <div class="form-control m-4">
                        <label class="label" for="penulis">
                            <span class="label-text">Penulis</span>
                        </label>
                        <input type="text" name="penulis" id="penulis" placeholder="Masukkan Penulis" class="input input-sm input-bordered w-full focus:outline-none focus:border-sky-400" />
                    </div>
                    <div class="form-control m-4">
                        <label class="label" for="isbn">
                            <span class="label-text">ISBN</span>
                        </label>
                        <input type="text" name="isbn" id="isbn" placeholder="Masukkan Tahun Terbit" class="input input-sm input-bordered w-full focus:outline-none focus:border-sky-400" />
                    </div>
                </div>
                <div class="grid grid-cols-1">
                    <div class="form-control m-4">
                        <label class="label" for="tahun">
                            <span class="label-text">Tahun Terbit</span>
                        </label>
                        <input type="text" name="tahun" id="tahun" placeholder="Masukkan Tahun Terbit" class="input input-sm input-bordered w-full focus:outline-none focus:border-sky-400" />
                    </div>
                    <div class="form-control m-4">
                        <label for="penerbit" class="label">
                            <span class="label-text">Penerbit</span>
                        </label>
                        <select class="select select-sm select-bordered w-full" name="penerbit" id="penerbit">
                            <option disabled selected>Pick your favorite Simpson</option>
                            <option>Airlangga</option>
                            <option>Elex Media</option>
                            <option>Loko Media</option>
                            <option>Lisa Publisher</option>
                            <option>Maggie Corp</option>
                        </select>
                    </div>
                    <div class="form-control m-4">
                        <label for="kategori" class="label">
                            <span class="label-text">Kategori</span>
                        </label>
                        <select class="select select-sm select-bordered w-full" name="kategori" id="kategori">
                            <option disabled selected>Pick your favorite Simpson</option>
                            <option>Novel</option>
                            <option>Komik</option>
                            <option>Kamus</option>
                            <option>Dongeng</option>
                            <option>Komputer</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="p-4 mb-4">
        <button type="submit" class="btn btn-sm bg-sky-500 border-none hover:bg-sky-700 tracking-widest">Tambah Buku</button>
        <button type="submit" class="btn btn-sm bg-red-500 border-none hover:bg-red-700 tracking-widest">Reset</button>
    </div>
</div>

<!-- List Buku -->

<div class="mx-4 card rounded-lg shadow-lg bg-white mb-4 border border-slate-200">
    <div class="card-body">
        <p class="text-xl text-slate-500">Daftar Buku</p>
        <table class="table display" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Tahun Terbit</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr>
                    <th>1</th>
                    <td>Cy Ganderton</td>
                    <td>Quality Control Specialist</td>
                    <td>Blue</td>
                    <td>
                        <div class="flex flex-row space-x-2">
                            <button class="btn btn-xs bg-sky-500 border-none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>&nbsp;Detail</button>
                            <button class="btn btn-xs bg-yellow-500 border-none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>&nbsp;Ubah</button>
                            <button class="btn btn-xs bg-red-500 border-none"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg>&nbsp;Hapus</button>
                        </div>
                    </td>
                </tr>
                <!-- row 2 -->
                <tr class="hover">
                    <th>2</th>
                    <td>Hart Hagerty</td>
                    <td>Desktop Support Technician</td>
                    <td>Purple</td>
                    <td></td>
                </tr>
                <!-- row 3 -->
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td></td>
                </tr>
                <tr>
                    <th>3</th>
                    <td>Brice Swyre</td>
                    <td>Tax Accountant</td>
                    <td>Red</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>