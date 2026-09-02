

<?php $__env->startSection('title', 'Identitas Diri'); ?>

<?php $__env->startSection('content'); ?>

<div class="identitas-wrapper">

    <div class="identitas-card">

        

        <div class="identitas-content">

            <div class="identitas-header">

                <div class="identitas-icon">
                    👤
                </div>

                <div>
                    <h1>Identitas Diri</h1>

                    <p>
                        Informasi identitas diri
                    </p>
                </div>

            </div>


            

            <div class="identitas-list">

                
                <div class="identitas-row">

                    <div class="label">
                        Nama
                    </div>

                    <div class="value">
                        Alya Septiani Ramadani
                    </div>

                </div>


                
                <div class="identitas-row">

                    <div class="label">
                        NIS
                    </div>

                    <div class="value">
                        2425210286
                    </div>

                </div>


                
                <div class="identitas-row">

                    <div class="label">
                       Jenis Kelamin
                    </div>

                    <div class="value">
                        Perempuan
                    </div>

                </div>


                
                <div class="identitas-row">

                    <div class="label">
                        Kelas
                    </div>

                    <div class="value">
                        XII PPLG 4
                    </div>

                </div>


                
                <div class="identitas-row">

                    <div class="label">
                        Program Studi
                    </div>

                    <div class="value">
                        Pengembangan Perangkat Lunak & Gim
                    </div>

                </div>


                
                <div class="identitas-row">

                    <div class="label">
                       Sekolah
                    </div>

                    <div class="value">
                        SMKN4 TASIKMALAYA
                    </div>

                </div>


                
                <div class="identitas-row">

                    <div class="label">
                       Tempat Tanggal Lahir
                    </div>

                    <div class="value">
                        Tasikmalaya, 07 September 2008
                    </div>

                </div>


                
                <div class="identitas-row">

                    <div class="label">
                        Email
                    </div>

                    <div class="value">
                        email@gmail.com
                    </div>

                </div>


                
                <div class="identitas-row">

                    <div class="label">
                        No. HP
                    </div>

                    <div class="value">
                       08xxxxxxxxxx
                    </div>

                </div>


                
                <div class="identitas-row">

                    <div class="label">
                        Alamat
                    </div>

                    <div class="value">
                       Alamat anda
                    </div>

                </div>

            </div>


            

            <div class="aplikasi-info">

                <h3>
                    💗 Tentang Aplikasi
                </h3>

                <p>
                    Aplikasi POS ini dibuat untuk membantu proses
                    pengelolaan produk, transaksi penjualan, keranjang,
                    pembayaran, dan monitoring stok secara lebih mudah
                    dan terorganisir.
                </p>

            </div>

        </div>


        

        <div class="foto-content">

            <div class="foto-frame">

                
                <img
                    src="<?php echo e(asset('images/foto.png')); ?>"
                    alt="Foto Alya Septiani Ramadani"
                    onerror="this.style.display='none'; document.getElementById('foto-placeholder').style.display='flex';"
                >

                
                <div
                    class="foto-placeholder"
                    id="foto-placeholder"
                >
                    <span>📷</span>

                    <p>
                        Foto Identitas
                    </p>
                </div>

            </div>


            

            <h3>
                Alya Septiani Ramadani
            </h3>

            <p>
                Pemilik Aplikasi
            </p>

        </div>

    </div>

</div>


<style>

/* =====================================================
   WRAPPER
===================================================== */

.identitas-wrapper {

    width: 100%;

    min-height: calc(100vh - 100px);

    padding: 35px 25px 50px;

    background: #fff7fa;

    box-sizing: border-box;

}


/* =====================================================
   CARD
===================================================== */

.identitas-card {

    max-width: 1100px;

    margin: 0 auto;

    display: grid;

    grid-template-columns: 1.5fr 1fr;

    gap: 45px;

    align-items: center;

    background: #ffffff;

    border: 1px solid #f1d5df;

    border-radius: 25px;

    padding: 45px;

    box-shadow:
        0 8px 30px rgba(215, 127, 154, 0.12);

}


/* =====================================================
   BAGIAN KIRI
===================================================== */

.identitas-content {

    width: 100%;

}


/* =====================================================
   HEADER
===================================================== */

.identitas-header {

    display: flex;

    align-items: center;

    gap: 18px;

    margin-bottom: 30px;

}


.identitas-icon {

    width: 60px;

    height: 60px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: #fcecf2;

    border-radius: 16px;

    font-size: 28px;

}


.identitas-header h1 {

    margin: 0 0 5px;

    color: #5a414b;

    font-size: 28px;

    font-weight: 700;

}


.identitas-header p {

    margin: 0;

    color: #9a7c88;

    font-size: 14px;

}


/* =====================================================
   IDENTITAS
===================================================== */

.identitas-list {

    border: 1px solid #f1d5df;

    border-radius: 15px;

    overflow: hidden;

}


.identitas-row {

    display: grid;

    grid-template-columns: 150px 1fr;

    padding: 15px 18px;

    border-bottom: 1px solid #f5dce4;

    transition: background 0.2s ease;

}


.identitas-row:last-child {

    border-bottom: none;

}


.identitas-row:hover {

    background: #fff7fa;

}


.label {

    color: #c96d89;

    font-size: 14px;

    font-weight: 600;

}


.value {

    color: #5a414b;

    font-size: 14px;

}


/* =====================================================
   INFO APLIKASI
===================================================== */

.aplikasi-info {

    margin-top: 20px;

    padding: 20px;

    background: #fff7fa;

    border: 1px solid #f1d5df;

    border-radius: 15px;

}


.aplikasi-info h3 {

    margin: 0 0 10px;

    color: #c96d89;

    font-size: 17px;

}


.aplikasi-info p {

    margin: 0;

    color: #765f6a;

    font-size: 13px;

    line-height: 1.7;

}


/* =====================================================
   BAGIAN KANAN - FOTO
===================================================== */

.foto-content {

    display: flex;

    flex-direction: column;

    align-items: center;

    justify-content: center;

    text-align: center;

}


/* =====================================================
   FRAME FOTO
===================================================== */

.foto-frame {

    width: 250px;

    height: 320px;

    padding: 8px;

    background: #ffffff;

    border: 1px solid #f1d5df;

    border-radius: 22px;

    box-shadow:
        0 8px 25px rgba(215, 127, 154, 0.15);

    overflow: hidden;

    position: relative;

}


.foto-frame img {

    width: 100%;

    height: 100%;

    object-fit: cover;

    object-position: center;

    border-radius: 17px;

    display: block;

}


/* =====================================================
   PLACEHOLDER FOTO
===================================================== */

.foto-placeholder {

    width: 100%;

    height: 100%;

    display: none;

    flex-direction: column;

    align-items: center;

    justify-content: center;

    background: #fff7fa;

    border-radius: 17px;

    color: #c96d89;

}


.foto-placeholder span {

    font-size: 50px;

    margin-bottom: 10px;

}


.foto-placeholder p {

    margin: 0;

    color: #9a7c88;

    font-size: 14px;

}


/* =====================================================
   NAMA DI BAWAH FOTO
===================================================== */

.foto-content h3 {

    margin: 18px 0 5px;

    color: #5a414b;

    font-size: 19px;

    font-weight: 700;

}


.foto-content p {

    margin: 0;

    color: #c96d89;

    font-size: 13px;

}


/* =====================================================
   MOBILE
===================================================== */

@media (max-width: 768px) {

    .identitas-wrapper {

        padding: 20px 12px 40px;

    }


    .identitas-card {

        grid-template-columns: 1fr;

        gap: 30px;

        padding: 25px 20px;

    }


    /* FOTO DI ATAS PADA HP */

    .foto-content {

        order: -1;

    }


    .foto-frame {

        width: 200px;

        height: 250px;

    }


    .identitas-header h1 {

        font-size: 24px;

    }


    .identitas-row {

        grid-template-columns: 120px 1fr;

    }


    .label,
    .value {

        font-size: 13px;

    }

}


/* =====================================================
   MOBILE KECIL
===================================================== */

@media (max-width: 480px) {

    .identitas-card {

        padding: 20px 15px;

        border-radius: 18px;

    }


    .identitas-header {

        gap: 12px;

    }


    .identitas-icon {

        width: 50px;

        height: 50px;

        font-size: 23px;

    }


    .identitas-header h1 {

        font-size: 21px;

    }


    .identitas-row {

        grid-template-columns: 105px 1fr;

        padding: 13px 12px;

    }


    .foto-frame {

        width: 180px;

        height: 230px;

    }

}

</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\APK_POS_RAMADANI\resources\views/tentang.blade.php ENDPATH**/ ?>