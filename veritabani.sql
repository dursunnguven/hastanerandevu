-- Veritabanı oluşturma
CREATE DATABASE hastane;
GO

-- Kullanıcılar tablosu
USE hastane;
GO

CREATE TABLE kullanicilar (
    id INT PRIMARY KEY IDENTITY(1,1),
    kadi VARCHAR(50) NOT NULL,
    sifre VARCHAR(50) NOT NULL,
    adsoyad VARCHAR(50),
    mail VARCHAR(50),
    ipadresi VARCHAR(50),
    kayittarihi VARCHAR(50)
);

-- Kullanıcılar tablosu veri ekleme
INSERT INTO kullanicilar (kadi, sifre, adsoyad, mail, ipadresi, kayittarihi) 
VALUES 
    ('admin', 'fd54ssd7', 'Yönetici 1 Ad Soyad', 'yonetici1@mtestail.mail', '127.0.0.1', '16.05.2019'),
    ('personel1', 'd5fu9uy3', 'Personel 1 Ad Soyad', 'personel1@testmail.mail', '127.0.0.1', '18.05.2019');
GO

-- Randevular tablosu
CREATE TABLE randevular (
    id INT PRIMARY KEY IDENTITY(1,1),
    adsoyad VARCHAR(50) NOT NULL,
    telno VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    randevutarih DATE NOT NULL,
    bolum VARCHAR(30) NOT NULL,
    mesaj TEXT NOT NULL,
    ipadresi VARCHAR(50) NOT NULL,
    kayittarihi VARCHAR(50) NOT NULL,
    durum VARCHAR(20)
);

-- Randevular tablosu veri ekleme
INSERT INTO randevular (adsoyad, telno, email, randevutarih, bolum, mesaj, ipadresi, kayittarihi, durum) 
VALUES 
    ('Test Ad Soyad', '5000000000', 'testmail@testmail.mail', '2019-06-22', 'Diyetisyen', 'Ek mesajım yok.', '127.0.0.1', '15.05.2019', 'Aktif'),
    ('Test Ad Soyad', '5000000000', 'testmail@testmail.mail', '2019-07-10', 'Genel Cerrahi', 'Penisiline alerjim var.', '127.0.0.1', '15.05.2019', 'Aktif'),
    ('Test Ad Soyad', '5000000000', 'testmail@testmail.com', '2020-12-07', 'Genel Cerrahi', 'Bu bir test randevudur.', '::1', '06.12.2020', 'Aktif'),
    ('Test Ad Soyad', '5000000000', 'testmail@testmail.mail', '2019-08-26', 'Diyetisyen', 'Randevum sırasında tekerlekli sandalye istiyorum.', '127.0.0.1', '15.05.2019', 'Aktif'),
    ('Test Ad Soyad', '5000000000', 'testmail@testmail.mail', '2019-05-19', 'Kardioloji', '', '127.0.0.1', '16.05.2019', 'Iptal Edilmis'),
    ('Test Ad Soyad', '5000000000', 'testmail@testmail.mail', '2019-07-07', 'Genel Cerrahi', '', '127.0.0.1', '20.05.2019', 'Aktif'),
    ('Test Ad Soyad', '5000000000', 'testmail@testmail.mail', '2019-06-25', 'Genel Cerrahi', 'Yok', '127.0.0.1', '19.05.2019', 'Aktif'),
    ('Test Ad Soyad', '5000000000', 'testmail@testmail.mail', '2019-07-13', 'Kardioloji', '', '127.0.0.1', '19.05.2019', 'Aktif');
GO
