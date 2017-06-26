<?php
session_start();
const SQL_CREATE_TABLE_USER = '
    CREATE TABLE IF NOT EXISTS user (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,
      login VARCHAR(255) NOT NULL,
      password VARCHAR(255) NOT NULL,
      root INT(10) NOT NULL
    )
';

const SQL_CREATE_TABLE_BASKET = '
    CREATE TABLE IF NOT EXISTS basket (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,  
      name VARCHAR(255) NOT NULL,
      img VARCHAR(255) NOT NULL,
      cost INT(10) NOT NULL,
      info VARCHAR(255) NOT NULL
    )
';

const SQL_CREATE_TABLE_CATEGORIES = '
    CREATE TABLE IF NOT EXISTS categories (
      id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT NOT NULL,  
      name_cat VARCHAR(255) NOT NULL,
      id_prod INT(10) NOT NULL,
      name VARCHAR(255) NOT NULL,
      img VARCHAR(255) NOT NULL,
      cost INT(10) NOT NULL,
      info VARCHAR(255) NOT NULL
    )
';

const SQL_CREATE_PROD_1 = "
  INSERT INTO basket VALUES (NULL,
  'Apple Macbook Pro',
  'img/Apple Macbook Pro.jpg',
  25000,
  'Экран 13.3 IPS\" (2560x1600) Retina LED, глянцевый / Intel Core i5 (2.7 ГГц) / RAM 8 ГБ / SSD 128 ГБ / Intel Iris Graphics 6100 / без ОД / Wi-Fi / Bluetooth / веб-камера / OS X Yosemite / 1.58 кг.'
  )
";

const SQL_CREATE_PROD_2 = "
  INSERT INTO basket VALUES (NULL,
  'HP W7',
  'img/HP W7.jpg',
  15000,
  'Экран 15.6\" (1920x1080) Full HD, матовый / Intel Core i7-7500U (2.7 - 3.5 ГГц) / RAM 8 ГБ / HDD 1 ТБ / NVIDIA GeForce 930MX, 2 ГБ / DVD+/-RW / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.04 кг / серебристый.'
  )
";

const SQL_CREATE_PROD_3 = "
  INSERT INTO basket VALUES (NULL,
  'Lenovo 20h1',
  'img/Lenovo 20h1.jpg',
  10000,
  'Экран 14\" IPS (1920x1080) Full HD, матовый / Intel Core i3-7100U (2.4 ГГц) / RAM 8 ГБ / SSD 256 ГБ / Intel HD Graphics 620 / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 1.87 кг.'
  )
";

const SQL_CREATE_PROD_4 = "
  INSERT INTO basket VALUES (NULL,
  'Samsung Galaxy S8',
  'img/Samsung Galaxy S8.jpg',
  20000,
  'Экран (5.8\", Super AMOLED, 2960х1440)/ Samsung Exynos 8895 (4 x 2.3 ГГц + 4 x 1.7 ГГц)/ основная камера 12 Мп + фронтальная 8 Мп/ RAM 4 ГБ/ 64 ГБ встроенной памяти + microSD (до 256 ГБ)/ 3G/ LTE/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 7.0 (Nougat) / 3000 мА*ч
Поддерживается установка двух SIM-карт или одной SIM-карты и карты памяти. Слот для второй SIM-карты совмещен со слотом для карты памяти.'
  )
";

const SQL_CREATE_PROD_5 = "
  INSERT INTO basket VALUES (NULL,
  'Apple Iphone 5S',
  'img/Apple Iphone 5S.jpg',
  12000,
  'Экран (4\", IPS, 1136x640)/ Apple A7 (1.3 ГГц)/ основная камера: 8 Мп, фронтальная камера: 1.2 Мп/ RAM 1 ГБ/ 16 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ iOS 9/ 1560 мА*ч.'
  )
";

const SQL_CREATE_PROD_6 = "
  INSERT INTO basket VALUES (NULL,
  'Huawei P10',
  'img/Huawei P10.jpg',
  8000,
  'Экран (5.1\", IPS, 1920x1080)/ HiSilicon Kirin 960 (4 ядра 2.4 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 20 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 256 ГБ)/ 3G/ LTE/ GPS/ GLONASS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 7.0 (Nougat)/ 3200 мА*ч.'
  )
";

const SQL_CREATE_PROD_7 = "
  INSERT INTO basket VALUES (NULL,
  'Prestigio Multipad W1',
  'img/Prestigio Multipad W1.jpg',
  6000,
  'Экран 7\" IPS (1280x800) емкостный, MultiTouch / Intel Atom x3-C3230RK (1.2 ГГц) / RAM 1 ГБ / 8 ГБ встроенной памяти + microSD / 3G / Wi-Fi / Bluetooth 4.0 / основная камера 2 Мп, фронтальная - 0.3 Мп / GPS / Android 5.1 (Lollipop) / 270 г / черный.
'
  )
";

const SQL_CREATE_PROD_8 = "
  INSERT INTO basket VALUES (NULL,
  'Nomi Corsa C07',
  'img/Nomi Corsa C07.jpg',
  5000,
  'Экран 7\" IPS (1280x720) емкостный, MultiTouch / MediaTek MT6580 (1.3 ГГц) / RAM 1 ГБ / 16 ГБ встроенной памяти + microSD / 3G / Wi-Fi / Bluetooth / камера 2 Мп + фронтальная 0.3 Мп / GPS / поддержка 2-х СИМ-карт / Android 6.0 (Marshmallow) / 250 г / серый.
'
  )
";

const SQL_CREATE_PROD_9 = "
  INSERT INTO basket VALUES (NULL,
  'Ergo Tab A700 3g black',
  'img/ergo tab a700 3g black.jpg',
  4000,
  'Экран 7\" (1024x600) емкостный, Multi-Touch / MediaTek MT8312 (1.3 ГГц) / RAM 512 ГБ / 8 ГБ встроенной памяти + поддержка карт памяти microSD / 3G / Wi-Fi / Bluetooth 4.0 / камера 2 Мп + фронтальная 0.3 Мп / GPS / поддержка 2-х СИМ-карт / Android 4.4 / 292 г / белый.'
  )
";

const SQL_CREATE_CATEGORIES_1 = "
  INSERT INTO categories VALUES (NULL,
  'LopTop',
  1,
  'Apple Macbook Pro',
  'img/Apple Macbook Pro.jpg',
  25000,
  'Экран 13.3 IPS\" (2560x1600) Retina LED, глянцевый / Intel Core i5 (2.7 ГГц) / RAM 8 ГБ / SSD 128 ГБ / Intel Iris Graphics 6100 / без ОД / Wi-Fi / Bluetooth / веб-камера / OS X Yosemite / 1.58 кг.'
  )
";

const SQL_CREATE_CATEGORIES_2 = "
  INSERT INTO categories VALUES (NULL,
  'LopTop',
  2,
  'HP W7',
  'img/HP W7.jpg',
  15000,
  'Экран 15.6\" (1920x1080) Full HD, матовый / Intel Core i7-7500U (2.7 - 3.5 ГГц) / RAM 8 ГБ / HDD 1 ТБ / NVIDIA GeForce 930MX, 2 ГБ / DVD+/-RW / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.04 кг / серебристый.'
  )
";

const SQL_CREATE_CATEGORIES_3 = "
  INSERT INTO categories VALUES (NULL,
  'LopTop',
  3,
  'Lenovo 20h1',
  'img/Lenovo 20h1.jpg',
  10000,
  'Экран 14\" IPS (1920x1080) Full HD, матовый / Intel Core i3-7100U (2.4 ГГц) / RAM 8 ГБ / SSD 256 ГБ / Intel HD Graphics 620 / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 1.87 кг.'
  )
";

const SQL_CREATE_CATEGORIES_4 = "
  INSERT INTO categories VALUES (NULL,
  'Phones',
  4,
  'Samsung Galaxy S8',
  'img/Samsung Galaxy S8.jpg',
  20000,
  'Экран (5.8\", Super AMOLED, 2960х1440)/ Samsung Exynos 8895 (4 x 2.3 ГГц + 4 x 1.7 ГГц)/ основная камера 12 Мп + фронтальная 8 Мп/ RAM 4 ГБ/ 64 ГБ встроенной памяти + microSD (до 256 ГБ)/ 3G/ LTE/ GPS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 7.0 (Nougat) / 3000 мА*ч
Поддерживается установка двух SIM-карт или одной SIM-карты и карты памяти. Слот для второй SIM-карты совмещен со слотом для карты памяти.'
  )
";

const SQL_CREATE_CATEGORIES_5 = "
  INSERT INTO categories VALUES (NULL,
  'Phones',
  5,
  'Apple Iphone 5S',
  'img/Apple Iphone 5S.jpg',
  12000,
  'Экран (4\", IPS, 1136x640)/ Apple A7 (1.3 ГГц)/ основная камера: 8 Мп, фронтальная камера: 1.2 Мп/ RAM 1 ГБ/ 16 ГБ встроенной памяти/ 3G/ LTE/ GPS/ Nano-SIM/ iOS 9/ 1560 мА*ч.'
  )
";

const SQL_CREATE_CATEGORIES_6 = "
  INSERT INTO categories VALUES (NULL,
  'Phones',
  6,
  'Huawei P10',
  'img/Huawei P10.jpg',
  8000,
  'Экран (5.1\", IPS, 1920x1080)/ HiSilicon Kirin 960 (4 ядра 2.4 ГГц + 4 ядра 1.8 ГГц)/ Две основные камеры: 20 Мп + 12 Мп, фронтальная камера: 8 Мп/ RAM 4 ГБ/ 32 ГБ встроенной памяти + microSD/SDHC (до 256 ГБ)/ 3G/ LTE/ GPS/ GLONASS/ поддержка 2х SIM-карт (Nano-SIM)/ Android 7.0 (Nougat)/ 3200 мА*ч.'
  )
";

const SQL_CREATE_CATEGORIES_7 = "
  INSERT INTO categories VALUES (NULL,
  'Planshet',
  7,
  'Prestigio Multipad W1',
  'img/Prestigio Multipad W1.jpg',
  6000,
  'Экран 7\" IPS (1280x800) емкостный, MultiTouch / Intel Atom x3-C3230RK (1.2 ГГц) / RAM 1 ГБ / 8 ГБ встроенной памяти + microSD / 3G / Wi-Fi / Bluetooth 4.0 / основная камера 2 Мп, фронтальная - 0.3 Мп / GPS / Android 5.1 (Lollipop) / 270 г / черный.
'
  )
";

const SQL_CREATE_CATEGORIES_8 = "
  INSERT INTO categories VALUES (NULL,
  'Planshet',
  8,
  'Nomi Corsa C07',
  'img/Nomi Corsa C07.jpg',
  5000,
  'Экран 7\" IPS (1280x720) емкостный, MultiTouch / MediaTek MT6580 (1.3 ГГц) / RAM 1 ГБ / 16 ГБ встроенной памяти + microSD / 3G / Wi-Fi / Bluetooth / камера 2 Мп + фронтальная 0.3 Мп / GPS / поддержка 2-х СИМ-карт / Android 6.0 (Marshmallow) / 250 г / серый.
'
  )
";

const SQL_CREATE_CATEGORIES_9 = "
  INSERT INTO categories VALUES (NULL,
  'Planshet',
  9,
  'Ergo Tab A700 3g black',
  'img/ergo tab a700 3g black.jpg',
  4000,
  'Экран 7\" (1024x600) емкостный, Multi-Touch / MediaTek MT8312 (1.3 ГГц) / RAM 512 ГБ / 8 ГБ встроенной памяти + поддержка карт памяти microSD / 3G / Wi-Fi / Bluetooth 4.0 / камера 2 Мп + фронтальная 0.3 Мп / GPS / поддержка 2-х СИМ-карт / Android 4.4 / 292 г / белый.'
  )
";

const SQL_SELECT_BASKET = '
    SELECT * FROM basket ORDER BY id DESC
';

const SQL_SELECT_USER = '
    SELECT * FROM user
';

?>