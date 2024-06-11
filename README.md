# API Pencatatan Keuangan
API ini menggunakan Laravel untuk mengelola pencatatan keuangan, termasuk autentikasi pengguna, pengelolaan profil pengguna, dan pengelolaan catatan keuangan.

# Tools API 
** Postman **

## Require
- Laravel Version = 11
- PHP Version = 8.1.6.
- mysql  Ver 15.1

## Database
- DB_DATABASE=db_monitoring
- DB_USERNAME=root
- DB_PASSWORD=

## instalation
1. git clone https://github.com/mochananta/Keuangan_API.git
2. composer update
3. ubah .env.example ke .env
4. tambahkan nama database, port atau password database
5. migrate database dengan php artisan migrate
6. seed database dengan php artisan db:seed
7. generate key dengan php artisan key:generate
8. jalankan php artisan serve untuk menjalankan website
9. lalu lakukan operasi di postman berikut contohnya :
## Autentikasi


### Login

**Endpoint**: `POST /api/login`

**URL**: `http://localhost:8000/api/login`

**Body**: raw
```json
{
    "email": "mochananta@coba.com",
    "password": "123"
}



### profile

**Endpoint**: `GET /api/profile`

**URL**: `http://localhost:8000/api/profile`

**Header**:
key : Authorization
Value : Bearer {isi dengan token setelah login}



### Update Profile

**Endpoint**: `PUT /api/profile/update`

**URL**: `http://localhost:8000/api/profile/update`

**Header**:
key : Authorization
Value : Bearer {isi dengan token setelah login}

**Body**: raw
```json
{
    "name": "NantaSaja",
    "alamat": "Banyuwangi",
    "phone": "+62 987654321"
}



### Add Keuangan

**Endpoint**: `POST /api/catatan-keuangan`

**URL**: `http://localhost:8000/api/catatan-keuangan`

**Header**:
key : Authorization
Value : Bearer {isi dengan token setelah login}

**Body**: raw
```json
{
    "type": "penghasilan",
    "total": 1000,
    "deskripsi": "Pendapatan dari proyek freelance"
}



### Update Keuangan

**Endpoint**: `PUT /api/catatan-keuangan/1`

**URL**: `http://localhost:8000/api/{isi dengan id yang akan di update}`

**Header**:
key : Authorization
Value : Bearer {isi dengan token setelah login}

**Body**: raw
```json
{
    "type": "pengeluaran",
    "total": 500,
    "deskprisi": "Biaya perlengkapan kantor"
}



### Show Catatan

**Endpoint**: `GET /api/users-with-records`

**URL**: `http://localhost:8000/api/users-with-records`

**Header**:
key : Authorization
Value : Bearer {isi dengan token setelah login}


