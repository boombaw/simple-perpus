<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/styles.css'); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.css">
</head>

<body>
    <div class="relative">
        <ul class="menu bg-base-100 p-2 rounded-box flex-none fixed sm:top-1/2 top-1/4 -right-4 z-10">
            <li class="tooltip tooltip-left" data-tip="back to up">
                <a href="#one" class="active:bg-slate-300 active:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </a>
            </li>
            <li class="tooltip tooltip-left" data-tip="show books">
                <a href="#koleksi" class="pl-5 active:bg-slate-300 active:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                    </svg>
                </a>
            </li>
            <li class="tooltip tooltip-left" data-tip="login">
                <a href="<?= base_url('auth'); ?>" class="active:bg-slate-300 active:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg>
                </a>
            </li>
        </ul>
    </div>
    <div class="scroll-auto h-screen" id="one">
        <div class="w-full h-screen bg-scroll relative bg-cover bg-no-repeat" style="background-image: url('<?= base_url("assets/dist/img/books-2.webp") ?>');">
            <div class="w-full h-[50vh] bg-opacity-60"></div>
            <div class="hero-content text-center text-neutral-content lg:mx-auto">
                <div class="max-w-md lg:max-w-full">
                    <h1 class="mb-5 text-3xl font-bold">"Hari ini seorang pembaca, besok seorang pemimpin."</h1>
                    <p class="mb-5">- Margaret Fuller -</p>
                    <a href="#koleksi" class="btn btn-ghost btn-circle"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="orange" class="bi bi-caret-down" viewBox="0 0 16 16">
                            <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="bg-white mx-4 h-screen py-5">
            <div class="px-3 py-2" id="koleksi">
                <p class="text-xl text-slate-400 mb-4">Koleksi Buku</p>
                <div class="mx-2 card rounded-lg shadow-lg bg-white mb-4 border border-slate-200">
                    <div class="card-body">
                        <table class="table display" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Buku</th>
                                    <th>Tahun Terbit</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($buku as $val) : ?>
                                    <tr>
                                        <th><?= $i++; ?></th>
                                        <td><?= $val->title; ?></td>
                                        <td><?= $val->pub_year; ?></td>
                                        <td><?= $val->category_name; ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/dist/js/jquery/3.5.1/jquery-3.5.1.js') ?>"></script>
    <script src="<?= base_url('assets/dist/js/datatables/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/datatables/2.3.0/dataTables.responsive.js'); ?>"></script>

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                responsive: true
            });
        });
    </script>

</body>

</html>