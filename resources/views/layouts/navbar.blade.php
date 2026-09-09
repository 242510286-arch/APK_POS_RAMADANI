{{-- =========================================
     NAVBAR POS SOFT PINK
========================================= --}}

<div class="navbar-wrapper">

    <nav class="soft-pink-navbar">

        <div class="navbar-container">

            {{-- =====================================
                 LOGO
            ====================================== --}}

            <div class="navbar-logo">

                <a href="{{ route('dashboard') }}">
                    POS
                </a>

            </div>


            {{-- =====================================
                 MENU NAVBAR
            ====================================== --}}

            <div class="navbar-menu">

                {{-- DASHBOARD --}}
                <a
                    href="{{ route('dashboard') }}"
                    class="{{ Request::is('dashboard') ? 'active' : '' }}"
                >
                    <span class="menu-icon"></span>
                    Dashboard
                </a>


                {{-- USERS --}}
                <a
                    href="{{ route('admin.users') }}"
                    class="{{ Request::is('admin/users') ? 'active' : '' }}"
                >
                    <span class="menu-icon"></span>
                    Users
                </a>


                {{-- JENIS PRODUK --}} 
                <a 
                      href="{{ route('jenis-produk.index') }}" 
                      class="{{ Request::is('jenis-produk*') ? 'active' : '' }}" 
                > 
                      <span class="menu-icon"></span> 
                      Jenis Produk 
                </a>


                {{-- PRODUK --}}
                <a
                    href="{{ route('produk.index') }}"
                    class="{{ Request::is('produk') ? 'active' : '' }}"
                >
                    <span class="menu-icon"></span>
                    Produk
                </a>


                {{-- PENJUALAN --}}
                <a
                    href="{{ route('penjualan.index') }}"
                    class="{{ Request::is('penjualan') ? 'active' : '' }}"
                >
                    <span class="menu-icon"></span>
                    Penjualan
                </a>


                {{-- TENTANG --}}
                <a
                    href="{{ route('tentang') }}"
                    class="{{ Request::is('tentang') ? 'active' : '' }}"
                >
                    <span class="menu-icon"></span>
                    Profile
                </a>

            </div>


            {{-- =====================================
                 LOGOUT
            ====================================== --}}

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >

                    <span></span>
                    Logout

                </button>

            </form>

        </div>

    </nav>

</div>



<style>

/* =====================================================
   GLOBAL NAVBAR
===================================================== */

.navbar-wrapper {

    width: 100%;

    padding: 18px 25px 10px;

    background: #fff7fa;

    box-sizing: border-box;

}


/* =====================================================
   NAVBAR CARD
===================================================== */

.soft-pink-navbar {

    width: 100%;

    background: #ffffff;

    border: 1px solid #f1d5df;

    border-radius: 18px;

    box-shadow:
        0 5px 20px rgba(215, 127, 154, 0.12);

    overflow: visible;

}


/* =====================================================
   NAVBAR CONTAINER
===================================================== */

.navbar-container {

    min-height: 70px;

    display: flex;

    align-items: center;

    padding: 0 25px;

    gap: 20px;

}


/* =====================================================
   LOGO POS
===================================================== */

.navbar-logo {

    flex-shrink: 0;

    margin-right: 15px;

}


.navbar-logo a {

    text-decoration: none;

    color: #c96d89;

    font-size: 25px;

    font-weight: 700;

    letter-spacing: 1px;

    transition: 0.2s;

}


.navbar-logo a:hover {

    color: #b85f7a;

}


/* =====================================================
   MENU
===================================================== */

.navbar-menu {

    display: flex;

    align-items: center;

    gap: 6px;

    flex: 1;

}


.navbar-menu a {

    display: flex;

    align-items: center;

    gap: 7px;

    text-decoration: none;

    color: #5a414b;

    font-size: 14px;

    font-weight: 500;

    padding: 10px 14px;

    border-radius: 10px;

    transition: all 0.2s ease;

}


/* ICON */

.menu-icon {

    font-size: 15px;

}


/* HOVER */

.navbar-menu a:hover {

    color: #c96d89;

    background: #fff1f5;

}


/* ACTIVE */

.navbar-menu a.active {

    color: #c96d89;

    background: #fcecf2;

    font-weight: 600;

    box-shadow:
        inset 0 0 0 1px #f5dce4;

}


/* =====================================================
   USER AREA
===================================================== */

.navbar-user-area {

    display: flex;

    align-items: center;

    gap: 12px;

    flex-shrink: 0;

}


/* =====================================================
   USER ROLE
===================================================== */

.user-role {

    display: flex;

    align-items: center;

    gap: 8px;

    padding: 6px 10px;

    background: #fff7fa;

    border: 1px solid #f1d5df;

    border-radius: 12px;

}


/* ICON USER */

.role-icon {

    width: 32px;

    height: 32px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #fcecf2;

    border-radius: 50%;

    font-size: 15px;

}


/* INFORMATION */

.role-information {

    display: flex;

    flex-direction: column;

    line-height: 1.2;

}


/* LOGIN TEXT */

.login-text {

    color: #9a7c88;

    font-size: 10px;

}


/* ROLE */

.role-badge {

    color: #c96d89;

    font-size: 13px;

    font-weight: 700;

}


/* =====================================================
   LOGOUT BUTTON
===================================================== */

.logout-button {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 6px;

    border: none;

    background: #d77f9a;

    color: #ffffff;

    padding: 10px 17px;

    border-radius: 10px;

    font-size: 14px;

    font-weight: 600;

    cursor: pointer;

    transition: all 0.2s ease;

}


/* LOGOUT HOVER */

.logout-button:hover {

    background: #c96d89;

    transform: translateY(-1px);

    box-shadow:
        0 4px 12px rgba(201, 109, 137, 0.25);

}


/* LOGOUT ACTIVE */

.logout-button:active {

    transform: translateY(0);

}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 991px) {

    .navbar-wrapper {

        padding: 12px;

    }


    .navbar-container {

        flex-direction: column;

        align-items: stretch;

        padding: 18px;

        gap: 15px;

    }


    /* LOGO */

    .navbar-logo {

        text-align: center;

        margin-right: 0;

    }


    /* MENU */

    .navbar-menu {

        flex-direction: column;

        width: 100%;

        gap: 5px;

    }


    .navbar-menu a {

        width: 100%;

        justify-content: center;

        box-sizing: border-box;

    }


    /* USER */

    .navbar-user-area {

        width: 100%;

        flex-direction: column;

    }


    .user-role {

        width: 100%;

        justify-content: center;

        box-sizing: border-box;

    }


    .navbar-user-area form {

        width: 100%;

    }


    .logout-button {

        width: 100%;

    }

}

</style>
