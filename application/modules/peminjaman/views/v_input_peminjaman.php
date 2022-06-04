<h1 class="block text-center m-4 text-3xl text-slate-500 ">Input Peminjaman</h1>
<div class="mx-4 card rounded-lg shadow-lg mb-4 border border-slate-200">
    <div class="max-w-md">
        <div class="grid grid-cols-2">
            <form action="" class="contents">
                <div class="grid grid-cols-1">
                    <div class="form-control m-4">
                        <label class="label" for="id_member">
                            <span class="label-text">ID Member</span>
                        </label>
                        <input type="text" name="id_member" id="id_member" placeholder="Masukkan ID Member" class="input input-sm input-bordered focus:outline-none focus:border-sky-400" />
                    </div>

                </div>
                <div class="grid grid-cols-1">

                    <div class="mt-7 pt-[1.65rem] px-2 float-left">
                        <label for="my-modal-6" type="button" class="btn btn-sm btn-circle btn-outline" title="Check Member">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            </svg>
                        </label>
                    </div>
                </div>
            </form>
        </div>

        <form action="" class="contents">
            <div class="form-control m-4">
                <label for="lama_pinjam" class="label">
                    <span class="label-text">Lama Pinjam</span>
                </label>
                <select class="select select-sm select-bordered w-full" name="lama_pinjam" id="lama_pinjam">
                    <option disabled selected>-- Pilih Waktu --</option>
                    <option>3 Hari</option>
                    <option>7 Hari</option>
                    <option>14 Hari</option>
                </select>
            </div>
            <div class="form-control m-4">
                <label class="label" for="buku">
                    <span class="label-text">Buku</span>
                </label>
                <select name="buku" id="buku" class="select select-sm select-bordered select2">
                    <option value="">--- Pilih buku ---</option>
                    <option value="1">Detektif Conan Vol.1</option>
                    <option value="3">Si Kancil &amp; Teman-Temannya</option>
                    <option value="2">Koleksi Program Web PHP</option>
                    <option value="7">Pintar Microsoft Office</option>
                    <option value="8">Jadi Youtuber</option>
                    <option value="13">Pintar Ngoding PHP</option>
                    <option value="14">Algoritma dan Pemrograman</option>
                </select>
            </div>

            <div class="p-4 mb-4">
                <button type="submit" class="btn btn-sm bg-sky-500 border-none hover:bg-sky-700 tracking-widest">Tambah Peminjaman</button>
                <button type="submit" class="btn btn-sm bg-red-500 border-none hover:bg-red-700 tracking-widest">Reset</button>
            </div>
        </form>
    </div>

    <div class="mb-42 mt-24 mx-4">
        <table class="table collapse w-full">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Lama Pinjam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Novel Cinta</td>
                    <td>3 Hari</td>
                    <td>
                        <div data-id="2" onclick="del(this)" class="btn btn-sm bg-red-500 border-none del-temp-pinjaman hover:bg-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                            </svg>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Novel Cina</td>
                    <td>3 Hari</td>
                    <td>
                        <div data-id="3" onclick="del(this)" class="btn btn-sm bg-red-500 border-none del-temp-pinjaman hover:bg-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                            </svg>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <!-- Modal Member Check -->
    <input type="checkbox" id="my-modal-6" class="modal-toggle" />
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box relative">
            <label for="my-modal-6" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="font-bold text-lg">Congratulations random Interner user!</h3>
            <p class="py-4">You've been selected for a chance to get one year of subscription to use Wikipedia for free!</p>

        </div>
    </div>
</div>

<script type="text/javascript">
    function del($this) {
        confirm("Ingin menghapus baris ini?")
        // console.log($this.getAttribute("data-id"))
    }
</script>