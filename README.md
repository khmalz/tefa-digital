# TEFA DIGITAL

Website inovatif yang berdedikasi untuk meningkatkan pendidikan dan membantu siswa mencapai potensi terbaik mereka. Kami hadir menyediakan jasa yang membantu menghemat waktu Anda dan memberikan pengalaman yang menarik.

## Jasa yang Kami Sediakan

-   Design
-   Photography
-   Videography
-   3D Printing

### Design

Kami menyediakan 3 kategori desain:

-   Logo
-   Promosi Digital
-   3D

### Photography

Kami menyediakan 3 kategori fotografi:

-   Produk
-   Pernikahan
-   Acara

### Videography

Kami menyediakan 2 kategori videografi:

-   Video Syuting
-   Video Dokumentasi

### 3D Printing

Kami menyediakan 2 pilihan material untuk 3D printing:

-   Metal Stainless Steel
-   Strong Nylon Plastic

## Jalankan Secara Lokal

Berikut adalah langkah-langkah untuk menginstall Tefa Digital:

**Klon Proyek**

```shell
git clone https://github.com/khmalz/tefa-digital.git
```

**Masuk ke Direktori Proyek**

```shell
cd tefa-digital
```

**Instalasi Dependensi**

```shell
composer install
```

```shell
npm install
```

**Konfigurasi Environment**

```shell
cp .env.example .env
```

**Generate Key Aplikasi**

```shell
php artisan key:generate
```

**Mengatur Konfigurasi Database pada Environment Variables**

```
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

**Migrasi Database**

```shell
php artisan migrate --seed
```

**Build Assets**

```shell
npm run build
```

**Link Storage**

```shell
php artisan storage:link
```

**Menjalankan Server Lokal**

```shell
php artisan serve
```

## Environment Variables

Untuk menjalankan fitur Contact Us pada situs web kami, Anda perlu mengubah konfigurasi variabel pada file .env Anda

```
MAIL_USERNAME
MAIL_PASSWORD
```

## Kontak

Jika Anda memiliki pertanyaan, saran, atau masalah teknis terkait dengan penggunaan Tefa Digital, silakan hubungi tim dukungan kami melalui email tefadigital.smk46@gmail.com atau melalui halaman kontak di situs web kami.

## Developer

-   [@khmalz](https://github.com/khmalz)
-   [@Advenian](https://github.com/Advenian)
-   [@nesyafakhira](https://github.com/nesyafakhira)
-   [@nursyakilla](https://github.com/nursyakilla)
