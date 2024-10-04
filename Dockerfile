# 1. Resmi PHP 8.2 imajını kullan
FROM php:8.2.23-fpm

# 2. Çalışma dizinini ayarla
WORKDIR /var/www/html

# 3. Gerekli sistem paketlerini ve PHP eklentilerini yükle
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql gd zip exif

# 4. Composer'ı indir ve kur
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Tüm dosyaları konteyner içine kopyala
COPY . .

# 6. Composer bağımlılıklarını yükle
RUN composer install --no-scripts --no-autoloader

# 7. Uygulama ayarlarını yap
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# 8. Başlatma komutu
CMD ["php-fpm"]
