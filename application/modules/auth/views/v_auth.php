<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login / Register</title>
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/styles.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital@0;1&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/dist/js/toast/jquery.toast.min.css'); ?>">

</head>

<body class="">
    <!-- <div class="relative"> -->
    <!-- <div class="h-48 w-48 bg-orange-300 rounded-full absolute -top-16 -right-14"></div>
    <div class="h-40 w-40 bg-orange-200 rounded-full absolute -top-12 -right-10"></div> -->
    <!-- </div> -->
    <div class="relative">
        <ul class="menu bg-base-100 p-2 rounded-box flex-none fixed top-1/3 -right-4 mx-auto z-10">
            <li class="tooltip tooltip-left" data-tip="back to up">
                <a href="<?= base_url() ?>#one" class="active:bg-slate-300 active:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </a>
            </li>
            <li class="tooltip tooltip-left" data-tip="show books">
                <a href="<?= base_url(); ?>#koleksi" class="pl-5 active:bg-slate-300 active:text-black">
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
    <div class="w-full h-screen">
        <!-- <div class="box"></div> -->
        <div class="min-h-full grid">
            <div class="relative mx-auto p-5 max-w-xs top-28 w-96 h-[400px] shadow-lg shadow-orange-300 overflow-hidden">
                <!-- <h1 class="block mx-auto p-4 text-lg text-slate-500">Authentication Form</h1> -->

                <div class="w-52 my-9 mx-auto shadow-lg shadow-orange-200 rounded-3xl border-orange-500 flex font-poppins">
                    <div id="btn" class="btn btn-sm absolute w-24 h-3 bg-gradient-to-r from-orange-500 to-orange-200 rounded-3xl border-none transition-all duration-[.5s] ease-linear"></div>
                    <button type="button" class="btn btn-sm rounded-2xl ml-4 text-slate-700 border-none toggle-btn bg-transparent active:bg-transparent focus:bg-transparent hover:bg-transparent z-10" onclick="login()">Login</button>
                    <button type="button" onclick="register()" class="btn btn-sm rounded-2xl ml-7 text-slate-700 bg-transparent active:bg-transparent focus:bg-transparent border-none toggle-btn hover:bg-transparent z-10">Register</button>
                </div>
                <div class="overflow-hidden">
                    <!-- Login -->
                    <form id="frmLogin" action="<?= base_url('auth/login'); ?>" class="m-5 font-poppins absolute left-0 transition-all duration-[.5s] ease-in-out w-[87%]">
                        <div class="">
                            <input type="text" class=" bg-transparent w-full border-b-[1px] mt-5 border-slate-300 focus:transition focus:duration-[.5s] delay-200 focus:ease-in-out focus:border-orange-300 focus:outline-none" placeholder="Username" class="form-input" required autocomplete="off" name="username" id="userlogin">
                        </div>
                        <input type="password" class=" bg-transparent w-full mx-auto border-b-[1px] my-5 border-slate-300 focus:transition focus:duration-[.5s] delay-200 focus:ease-in-out focus:border-orange-300 focus:outline-none" placeholder=" Password" class="form-input" required autocomplete="off" name="password" id="passlogin">
                        <div>
                            <button type="submit" id="btnLogin" class="btn btn-sm w-full bg-gradient-to-r from-orange-500 to-orange-200 border-none text-slate-700 focus:outline-none focus-visible:outline-none active:outline-none">Login</button>
                        </div>
                    </form>
                    <!-- Login -->

                    <!-- Register -->
                    <form id="register" action="<?= base_url('auth/register'); ?>" class="m-5 font-poppins absolute left-[450px] transition-all duration-[.5s] ease-in-out">
                        <div>
                            <input type="text" class=" bg-transparent w-full mx-auto border-b-[1px] mt-5 border-slate-300 focus:transition focus:duration-[.5s] delay-200 focus:ease-in-out focus:border-orange-300 focus:outline-none" placeholder="Username" class="form-input" required autocomplete="off" name="username" id="userregister">
                            <span class="font-thin text-xs pt-1 text-red-400 hidden my-5" id="valid_userregister">asdas</span>

                        </div>
                        <input type="password" class=" bg-transparent w-full mx-auto border-b-[1px] my-5 mt-7 border-slate-300 focus:transition focus:duration-[.5s] delay-200 focus:ease-in-out focus:border-orange-300 focus:outline-none" placeholder=" Password" class="form-input" required autocomplete="off" name="password" id="passregister">
                        <input type="password" class=" bg-transparent w-full mx-auto border-b-[1px] my-2 border-slate-300 focus:transition focus:duration-[.5s] delay-200 focus:ease-in-out focus:border-orange-300 focus:outline-none" placeholder=" Confirm Password" class="form-input" required autocomplete="off" name="confpassword" id="confpassregister">
                        <div>
                            <button type="submit" class="btn btn-sm w-full bg-gradient-to-r from-orange-500 to-orange-200 border-none text-slate-700 focus:ring-0 focus:outline-none focus-visible:outline-none active:outline-none">Register</button>
                        </div>
                    </form>
                    <!-- Register -->
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/dist/js/jquery/3.5.1/jquery-3.5.1.js') ?>"></script>
    <!-- Toast -->
    <script src="<?= base_url('assets/dist/js/toast/jquery.toast.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/auth/login.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/auth/register.js'); ?>"></script>

    <script>
        let formLogin = document.getElementById('frmLogin')
        let formRegister = document.getElementById('register')
        let btn = document.getElementById('btn')

        function register() {
            formLogin.reset()
            formLogin.style.left = "-650px"
            formRegister.style.left = "3px"
            btn.style.left = "166px"
            btn.style.width = "30%"
        }

        function login() {
            formRegister.reset();
            formLogin.style.left = "-5px"
            formRegister.style.left = "480px"
            btn.style.left = "56px"
            btn.style.width = "30%"
        }
    </script>
</body>

</html>