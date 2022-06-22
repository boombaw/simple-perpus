<h1 class="block text-center m-4 text-3xl text-slate-500 ">Daftar Pinjaman</h1>
<div class="mx-4 card rounded-lg shadow-lg bg-white mb-4 border border-slate-200">
    <div class="card-body">
        <table class="table display" id="example">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Pinjam</th>
                    <th>Nama Member</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($peminjaman as $key => $val) : ?>
                    <tr>
                        <th><?= $i++; ?></th>
                        <td><?= $val->tgl_pinjam; ?></td>
                        <td><?= $val->nama; ?></td>
                        <td><?= $val->is_kembali == 0 ? '<span class="text-red-500">Belum dikembalikan</span>' : '<span class="text-green-500">Sudah dikembalikan</span>'; ?></td>
                        <td>
                            <div class="flex flex-row space-x-2">
                                <label for="my-modal-3" class="btn btn-xs bg-sky-500 border-none modal-button detail-peminjam" data-peminjam='<?= json_encode($val) ?>' onclick="detailPeminjaman(this)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                    </svg></label>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Detail -->
<div>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative">
            <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Detail Pinjaman</h3>
            <p class="py-2" id="pmnjm_member"></p>
            <p class="py-2" id="pmnjm_lama"></p>
            <p class="py-2" id="pmnjm_buku"></p>

            <div class="modal-action">
                <a href="" id="sls_pinjam" class="btn btn-xs bg-green-500 hover:bg-green-700 active:bg-green-400 border-none text-slate-200">Selesaikan Peminjaman</a>
                <label for="my-modal-3" class="btn btn-xs bg-red-400 border-none hover:bg-red-500 active:bg-red-400">Tutup</label>
            </div>
        </div>

    </div>
</div>