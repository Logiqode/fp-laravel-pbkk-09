# Final Project ETS | Laravel | Kelompok 9
## Anggota Kelompok
| Name           | NRP        |
| ---            | ---        |
| Jeremy James | 5025221139 |
| Ranto Bastara Hamonangan Sitorus | 5025221228 |

## Project Idea
Membuat sebuah website e-commerce dengan register/login account.

### Human Actors
- Customer:<br>
Customer dapat menggunakan aplikasi layaknya sebuah customer e-commerce umumnya, dan juga dapat membuka tokonya sendiri yang dapat di verify oleh admin. Customer dapat menambahkan produk pada wishlist.
- Pemilik Toko:<br>
User yang memiliki toko akan perlu melakukan verifikasi untuk pemesanan yang dilakukan oleh customer lain, dan akan ada bagian notifikasi untuk melihat daftar pembelian, status pembelian, status pembukaan toko, pemesanan pada toko, dan verifikasi pemesanan user pada toko. Pemilik toko dapat menambahkan listing jualannya pada toko dengan sebuah form. 
- Admin:<br>
Admin ecommerce melakukan review dan verifikasi pada user yang membuka toko.

# Final Report
## Features per Human Actor
Sebuah Guest dapat membuat akun dengan sign up. Sebuah Customer dapat membuat toko yang akan mengubah is_storeowner pada tabel user jadi 1 atau true setelah mengisi store creation request. Ketika toko dari storeowner dihapus, maka akan menjadi 0 lagi. Admin menggunakan logika Gate di AppServiceProvider dan penambahan group 'admin' ke middleware. Admin dapat melihat data user di database, apabila is_admin adalah 1 atau true maka akan diberikan akses kepada admin panel.

### Guest:
 - Login, Register, Forgot Password
 - View Listings <br>

 
### Customer:
 - Everything that a Guest can do
 - Shopping Cart
 - Wishlist
 - Request Store Creation
 - View and Edit Profile <br>

 
### Storeowner:
 - Everything that a Customer can do
 - Add Listing
 - Modify Listing
 - Change Listing Status to 'Available', 'Unlisted', or 'Out of Stock'<br>

 
### Admin:
 - Everything that a Customer can do
 - Verify Store Creation Requests
 - Suspend Stores (Suspended Stores will not be accessable by Customers)
 - Remove Stores


## UI
Untuk UI kami mengambil dari flowbite dan sudah dibuat responsif dengan hamburger menu ketika ukuran layar lebih kecil. Sudah tersedia Pagination, Searching, dan pencarian listing dapat menggunakan search di navbar atau dari Dashboard.

## Database
Untuk data kami menggunakan faker untuk mengisi dummy data. Kami memiliki 6 tabel dengan relasi seperti gambar dibawah ini.
![image](https://github.com/user-attachments/assets/52de3582-d31b-4247-b9fd-7d3f6c92214d)



Link Demo : https://youtu.be/jO8gH0EDIC0


