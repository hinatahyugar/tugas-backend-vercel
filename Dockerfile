# Gunakan image PHP dengan Apache
FROM php:8.2-apache

# Salin semua file ke direktori web server
COPY . /var/www/html/

# Ubah permission
RUN chmod -R 755 /var/www/html

# Aktifkan modul mysqli (buat koneksi MySQL)
RUN docker-php-ext-install mysqli

# Port default untuk Apache
EXPOSE 8080

# Jalankan Apache
CMD ["apache2-foreground"]