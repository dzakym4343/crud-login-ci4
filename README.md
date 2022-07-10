# crud-login-ci4
Ini adalah repo pertama dan saya belajar framework codeigniter 4 dengan membuat project CRUD dan login sederhana. Jika ada kurangnya mohon dimaafkan hehe
# Instalasi & Update
<code>composer install</code> lalu <code>composer update</code> barangkali ada library yang update

Jalankan <code>php spark migrate</code> dan <code>php spark db:seed Classname</code> pada cli/cmd untuk membuat dan mengisi tabel

<code>php spark migrate</code>

<code>php spark db:seed DataBukuSeeder</code> & <code>php spark db:seed UsersSeeder</code>
# Setup & Run
Rename file <code>env</code> menjadi <code>.env</code> lalu sesuaikan, terutama pada bagian <code>app.baseURL</code> dan database

<code>php spark serve</code> untuk menjalankan projectnya. Default url <code>http://localhost:8080</code>
