-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 04:03 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloche`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `recipe_name` varchar(255) DEFAULT NULL,
  `creator_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ingredients` varchar(1028) DEFAULT NULL,
  `steps` varchar(1028) DEFAULT NULL,
  `recipe_picture` varchar(255) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `recipe_name`, `creator_name`, `description`, `ingredients`, `steps`, `recipe_picture`, `likes`, `dislikes`) VALUES
(1, 'Ayam Goreng', 'Johny', 'Ayam Goreng ala Johny, rasanya luar biasa dijamin', '1/2 ekor ayam\r\n1 lembar daun salam\r\n1 batang serai memarkan\r\nSecukupnya penyedap rasa\r\n400 ml air\r\nSecukupnya garam\r\n1/2 sendok teh gula pasir\r\nSecukupnya minyak goreng\r\n3 cm lengkuas\r\n3 buah bawang merah\r\n1 cm kunyit\r\n2 cm jahe\r\n1 butir kemiri\r\n4 siung bawang putih\r\n1 1/2 sendok teh ketumbar', '1. Cuci ayam dan bahan-bahan masakan\r\n2. Potong ayam secara merata\r\n3. Rebus air dalam panci\r\n4. Masukkan ayam dengan daun salam, serai dan bumbu-bumbu. Aduk secara merata\r\n5. Tunggu hingga ayam setengah matang lalu angkat dan diamkan selama 10 menit.\r\n6. Goreng ayam hingga ayam matang dan berwarna kecoklatan', 'img/image_1.jpg', 7, 1),
(2, 'Soto Betawi', 'Johny', 'Soto Betawi tradisional yang mudah dibuat', '500 gram Daging sapi\r\n100-200 ml santan kental kemasan\r\n200 ml Susu ultra plain\r\n6 siung Bawang merah besar\r\n3 siung Bawang putih besar\r\n1 ruas Jahe\r\n1 butir Kemiri\r\n1 sdt Ketumbar bubuk\r\n1 sdt Lada bubuk\r\n1/2 sdt Jintan bubuk\r\nBumbu tambahan:\r\n1 batang Serai\r\n3 buah Cengkeh\r\n3 lmbar Daun salam\r\n2 lmbar Daun jeruk\r\n5 cm kayu manis\r\n1-3 sachet Masako sapi\r\nBumbu penyerta saat masakan dihidangkan:\r\nsecukupnya Garam\r\nTomat\r\nBawang goreng\r\nDaun bawang\r\nEmping\r\nCabe rawit\r\nKecap manis\r\nJeruk nipis', '1. Rebus daging sapi hingga empuk. Jika dengan panci presto 20-30 menit, jika dengan panci biasa 2-3 jam. Setelah daging empuk, potong dadu-dadu kecil, sisihkan. Air rebusan daging panaskan kembali (kurang lebih 500-1000 ml, silahkan atur sesuai selera).\r\n\r\n2. Tumis \"bumbu halus\" dengan minyak secukupnya, kemudian tambahkan \"bumbu tambahan\", tumis hingga harum kurang lebih 5 menit. Setelah itu, masukkan ke air rebusan.\r\n\r\n3. Tambahkan susu dan santan kental. Jika takut terlalu kental, bisa ditambahkan sedikit-sedikit, atur kekentalan dan rasa (manis, asam, asin) sesuai selera. Ingat, api kecil ya..\r\n\r\n4. Tambahkan \"bumbu penyerta\", boleh di panci ataupun di piring penyajian. SOTO BETAWI GAMPANG BANGET siap dihidangkan..', 'img/image_2.jpg', 0, 0),
(3, 'Ayam Bakar', 'ocin', 'Ayam Bakar Homemade dibuat dengan kasih', 'ayam 1 potong\r\nKecap botol\r\nBawang putih\r\nMentega\r\nArang', '1. Siapkan ayam\r\n2.Cuci bersih ayam\r\n3.Potong ayam sesuai keinginan\r\n4.Bakar ayam di atas arang\r\n5.Beri bumbu di ayam\r\n6.Bakar hingga coklat kehitaman\r\n7.Suguhkan ke piring', 'img/image_3.jpg', 2, 0),
(4, 'Spaghetti Aglio Olio', 'Leon', 'Aglio Olio adalah hidangan pasta paling sederhana. Berasal dari kata â€œaglio e olioâ€œ yang berarti â€œbawang putih dan minyakâ€. Pasta ini punya rasa yang khas dan cocok untuk anda yang ingin makan berat tapi tak ingin terlalu kenyang. Karena pada dasa', '200 gr Spaghetti\r\n1 liter Air\r\n100 gr Udang, kupas sisakan ekornya\r\n4 siung Bawang putih, cincang halus\r\n3 sdm Minyak zaitun\r\nÂ½ sdt Merica hitam\r\n1 sdt Garam\r\nUntuk taburan:\r\nParsley cincang segar/kering secukupnya\r\nKeju parmesan secukupnya\r\nCabai kering kasar/bubuk secukupnya', '1.	Rebus spaghetti hingga matang dan lembut digigit. Tiriskan.\r\n2.	Siapkan teflon, kemudian panaskan minyak zaitun. Tumis bawang putih hingga harum.\r\n3.	Masukkan udang, aduk rata. Masak hingga udang berubah warna.\r\n4.	Tambahkan garam dan merica.\r\n5.	Masukkan spaghetti, aduk hingga merata dan jangan terlalu kering.\r\n6.	Beri taburan parsley, parmesan dan cabai.\r\n7.	Aglio olio siap disajikan.', 'img/image_4.jpg', 0, 0),
(5, 'Omelet Jamur', 'Leon', 'Telur merupakan santapan yang menyehatkan untuk disantap di pagi hari. Satu butir telur menagndung vitamin A, vitamin B5, vitamin B12, vitamin B2, vitamin D, vitamin E, folat, fosfor, kalsium, selenium dan zink merupakan sebagian kecil zat gizi yang terka', '3 butir telur ayam, kocok lepas\r\n1 sdt garam\r\n4 sdm minyak zaitun\r\n2 siung bawang putih, cincang\r\n30 gr bawang bombay, cincang halus\r\n100 gr jamur kancing, iris tipis\r\n1 batang daun bawang, iris tipis', '1.	Kocok lepas terus dan tambahkan 1/2 sdt garam, sisihkan.\r\n2.	Tumis bawang putih dengan 2 sdm minyak zaitun hingga harum dan masukkan bawang bombay.\r\n3.	Setelah layu, masukkan jamur, daun bawang dan 1/2 sdt garam.\r\n4.	Aduk hingga matang dan angkat.\r\n5.	Panaskan sisa minyak zaitun dan masukkan telur hingga setengah matang.\r\n6.	Ambil adonan isi, letakkan di tengah telur dadar dan masak hingga matang.\r\n7.	Sajikan selagi hangat.', 'img/image_5.jpg', 1, 0),
(6, 'Mie Aceh', 'Leon', 'Mie Aceh merupakan makanan khas Aceh dengan bahan dasar mie dan bercita rasa pedas dilengkapi dengan bahan-bahan tambahan seperti daging kambing, dagin sapi, atau seafood.', '500gr mie basah atau mie kuning\r\n150gr udang segar, kupas dan buang kulitnya\r\n150gr daging sapi atau daging kambing (opsional)\r\n1 buah tomat, potong memanjang segitiga\r\n5 siung bawang merah, iris tipis\r\n4 siung bawang putih, iris tipiss\r\n100gr kol putih, dicincang halus\r\n100gr toge segar, buang ekornya\r\n25gr daun bawang, iris halus\r\n10gr daun seledri, iris halus \r\n600ml kaldu sapi\r\n2 sendok makan kecap manis\r\n2 sendok makan kecap asin\r\n4 sendok makan minyak goreng\r\n7 buah cabe merah\r\n7 siung bawang putih\r\n1 cm jahe\r\n3 butir kemiri\r\nÂ¼ sendok the ketumbar dan jinten\r\n3 butir adas manis dan kapulaga\r\nÂ½cm kunyit\r\n1 sendok the merica bubuk', '1.	Panaskan minyak dalam wajan, kemudian masukkan bawang merah, bawang putih, dan bumbu halus hingga aroma wangi tercium\r\n2.	Masukkan daging sapi dan daging kambing, lalu udang, kemudian diaduk rata. Tunggu hingga warna daging dan udang berubah\r\n3.	Masukkan kaldu, tunggu hingga mendidih. Kemudian tambahkan kol, daun bawang, daun seledri, dan garam. Masak hingga kaldunya sudah agak berkurang dan mengental\r\n4.	Tambahkan toge dan tomat, aduk rata. Masukan kecap manis dan kecap asin.\r\n5.	Masukan mie basah yang sudah direbus dengan air panas. Aduk hingga rata\r\n6.	Tunggu hungga kuah mendidih, lalu diangkat\r\n7.	Mie Aceh siap dihidangkan', 'img/image_6.jpg', 0, 0),
(7, 'Nasi Uduk', 'Dave', 'Nasi uduk merupakan salah satu variasi dari nasi biasa. Nasi uduk berasal dari Betawi. Nasi uduk berarti nasi campur karena berasal dari Bahasa Indonesia â€œadukâ€. Nasi uduk juga perlu beberapa lauk dan sayuran pelengkap untuk menambah cita rasa. Lauk d', 'Beras 300gr, cuci bersih \r\nSantan kelapa kental 450ml\r\nDaun salam muda 2 lembar\r\nCengkeh 2 butir\r\nSerai 2 batang, memarkan\r\nKayu manis Â½ cm\r\nMerica Â½ sendok teh\r\nGaram 1 sendok teh', '1.	Cuci beras hingga bersih kemudian direndam \r\n2.	Haluskan bumbu yakni jahit, kunyit, jahe, lengkuas, bawang merah, dan garam\r\n3.	Bumbu yang sudah dihaluskan kemudian dapat santan dan aduk hingga rata\r\n4.	Masak santan hingga mendidih\r\n5.	Buang air rendaman beras kemudian tuang santan ke beras dengan disaring \r\n6.	Masukan dan salam serai. Rebus beras dengan api kecil. Selama direbus aduk teruss hingga air menyusu dan beras hampil ada', 'img/image_7.jpg', 0, 0),
(8, 'Lasagna', 'Louis', 'Lasagna merupakan salah satu jenis olehan yang cukup digemari oleh banyak orang. Apa itu lasagna? Lasagna merupakan masakan tradisional Italia berbentuk hidangan pasta yang dimasak dengan menggunakan oven dan termasuk ke dalam hidangan pokok. Jika dilihat', 'Bahan Untuk Resep Kulit Lasagna\r\nKulit Lasagna\r\nKeju\r\n\r\nBahan Saus Tomat Lasagna\r\n1,5 kg Daging sapi cincang\r\n3 kaleng besar tomat yang dipotong dadu\r\n250 ml Kaldu ayam\r\n500 ml Air\r\nGaram dan lada disesuaikan dengan selera\r\n1 Bawang bombay, dipotong kotak\r\n2 Batang seledri, potong dadu\r\n2 Buah wortel besar yang dipotong dadu\r\n170 gr Pasta tomat (kalengan)\r\n5 lembar Daun basil\r\nDaun parsley secukupnya\r\n\r\nBahan Saus Bechamel\r\n200 ml Susu cair\r\n2-3 sdm Keju parmesan\r\n2 sdm Mentega\r\n2 sdm Tepung terigu', 'Cara Membuat Saus Tomat Lasagna yang Enak Banget:\r\n1.	Masukan dan tumis bawang bombay, batang seledri dan wortel hingga berair/berkeringat ke dalam panci dengan api kecil. Tumis dengan waktu 5-7 menit. Jaga agar masakan anda tidak sampai gosong.\r\n2.	Besarkan api, dan masukan daging cincang, pasta tomat, tomat yang telah dipotong dadu, kaldu ayam, air dan daun basil. Masak selama 30-40 menit, hingga mendidih dan adonan terlihat mengental. Jangan lupa untuk mengaduk adonan setiap 10 menit.\r\n3.	Tambahkan irisan daun parsley sesuai selera, menjelang akhir.\r\n4.	Tambahkan garam dan lada. Sesuaikan dengan selera anda masing-masing\r\n5.	Jika rasa asam dari tomat pada adonan sudah stabil, masukan kembali sedikit garam dalam adonan.\r\nCara Membuat Saus Bechamel Lasagna\r\n1.	Lelehkan mentega yang sudah anda siapkan kemudian masukkan tepung terigu. Aduk rata.\r\n2.	Campurkan susu cair secara perlahan dan bertahap ke dalam adonan\r\n3.	Perhatikan adonan, jika terlalu kental maka cobalah tambahkan susu cair secukupnya, namun jika seb', 'img/image_8.jpg', 0, 0),
(9, 'Pizza', 'Louis', 'Pizza adalah hidangan tradisional dari Italia yang berupa roti berbentuk bundar dan pipih yang di atasnya diberi topping saus tomat dan keju, lalu dipanggang di dalam oven. Pizza bisa juga dilengkapi dengan topping sayuran, daging, dan bumbu.\r\nIstilah piz', 'Bahan untuk roti :\r\nTepung terigu protein sedang 1/2 kg\r\nFermipan 5 gr\r\nMinyak sayur 3 sdm\r\nGaram 1/2 sdt\r\nGula pasir 2 sdm\r\nAir 250 ml\r\n\r\nBahan untuk topping :\r\nSaus tomat secukupnya\r\nKeju mozarela secukupnya (dipotong-potong)\r\nBawang bombay 2 buah (dicincang halus)\r\nBila Anda suka, bisa jugamenggunakan topping berikut : ikan tuna, sosis, bakso, daging asap (ham), ayam, dsb', 'Persiapan sebelum memasak :\r\n\r\n1.	Siapkan wadah, lalu masukkan: tepung terigu, fermipan, gula pasir, garam dan minyak sayur , aduk dan campur sampai merata.\r\n2.	Sambil menguleni tepung, tambahkan air sedikit demi sedikit hingga terbentuk menjadi adonan.\r\n3.	Tutup wadah dengan kain, dan biarkan dulu adonan di dalamnya.\r\n4.	Siapkan wajan, lalu tumis bawang bombay sampai berbau harum, tambahkan topping sesuai selera Anda ke dalam tumisan.\r\n5.	Masukkan secukupnya saus tomat dan saus cabai.\r\n6.	Adonan yang telah cukup lama didiamkan lalu digilas agar berbentuk pipih. Tentukan ketebalan adonan roti sesuai selera Anda. Makin tipis adonan, maka makin renyah rasanya.\r\nCara membuat pizza :\r\n1.	Siapkan wajan teflon, kemudian panaskan dan cairkan 1 sdm mentega.\r\n2.	Letakkan adonan pizza diatas wajan, taburi dengan keju mozarella.\r\n3.	Selama memasak, tutupilah wajan dengan penutupnya, agar benar-benar matang dan keju mencair dengan sempurna.\r\n4.	Pizza teflon siap dihidangkan.\r\n5.	Begitulah resep cara membuat pizza teflon ruma', 'img/image_9.jpg', 0, 0),
(10, 'Mac and Cheese', 'Nicholas', 'Mac and cheese atau hidangan makaroni dan keju merupakan comfort food orang Amerika. Anak-anak sampai lansia mengenalnya dan menyantapnya. Namun, tak banyak yang tahu bahwa makanan ini dipopulerkan oleh Thomas Jefferson, presiden Amerika Serikat ketiga.', 'Ham sapi\r\nÂ¼ siung bawang bombay kecil\r\n3 siung bawang putih\r\nMakaroni pasta\r\n200 ml susu cair\r\nLada hitam\r\nGaram\r\n1 sdm tepung terigu\r\nKeju cheddar', '1.	Panaskan minyak, tumis bawang bombay dan bawang putih hingga layu.\r\n2.	Masukkan ham sapi, aduk sebentar, masukkan tepung terigu sambil diaduk.\r\n3.	Tuang susu cair perlahan sambil terus diaduk.\r\n4.	Masukkan makaroni dan garam, aduk hingga makaroni matang dan cairan berkurang.\r\n5.	Tambahkan keju dan lada hitam, aduk hingga rata, terakhir sajikan.', 'img/image_10.jpg', 0, 0),
(11, 'Chocolate Chip Cookies', 'Nicholas', 'Chocolate chip cookies yang renyah dan gurih dari coklat yang meleleh disaat bersamaan.', '115 gr Mentega\r\n55 gr Brown sugar/palm sugar\r\n100 gr Gula pasir (saya pakai 60 gr)\r\n1 Butir telur\r\n1 sdt Vanilla essens\r\n200 gr Tepung Terigu protein sedang\r\n1/2 sdt baking soda\r\n1/4 sdt garam\r\nSecukupnya Chocolate chips (sesuai selera)', '1.	Lelehkan mentega, jangan sampai mendidih, asal panas saja dan semua mencair.\r\n2.	Campurkan gula pasir dan brown sugar dengan mentega cair. Mixer sampai tercampur rata dan agak mengental.\r\n3.	Masukkan telur dan vanilla essens. Kocok dengan mixer kecepatan terendah, sebentar saja skitar 10 detik asal tercampur rata.\r\n4.	Masukkan tepung terigu, baking soda dan garam. Aduk dengan spatula sampai semua tercampur rata. Kalau teksturnya masih terlalu basah tambahkan lagi terigunya, adonan mestinya padat seperti diantara basah dan kering. Kalau dipegang dengan tangan sudah tidak lengket.\r\n5.	Masukkan chocolate chips, aduk campurkan ke adonan dengan tangan atau spatula.\r\n6.	Kalau adonan terasa agak lembek, bungkus dengan plastik masukkan kekulkas selama 5-10 menit. Panaskan oven suhu 175 derajat celcius. Keluarkan adonan dr kulkas dan bentuk2 bola sebesar bola golf.\r\n7.	Alaskan kertas roti diatas loyang. Taruh bola2 adonan, beri jarak sedikit. Panggang di dalam oven selama 9-11 menit. Begitu masuk menit ke 9 dicek yah. ', 'img/image_11.jpg', 0, 0),
(12, 'Banana Split', 'Nicholas', 'Penciptanya adalah seorang apoteker magang berusia 23 tahun, David Evans Strickler. Saat itu, Strickler menjual es krim kreasinya dengan harga 10 sen, dua kali lipat harga es krim sundae biasa. Meski lebih mahal, dessert tersebut laris manis. Pembeli utam', 'Pisang cavendis\r\nIce cream vanila coklat strawberry\r\nSKM coklat\r\nKacang', '1.	Pisang dikupas\r\n2.	Tambahkan eskrim\r\n3.	Tempatkan coklat diatasnya dan ditaburi kacang', 'img/image_12.jpeg', 0, 0),
(13, 'Babi Panggang', 'NicholasChen', 'Bahan sedikit, dan gampang didapat. Waktu memasaknya lama. Tapi setelah jadi rasanya mantap. Bumbu juga meresap dengan daging yang juicy.', '500 gr Daging samcan\r\nBumbu daging:\r\n2 sdt Bumbu Ngohyong\r\n1 sdt Bubuk bawang putih\r\n2 sdm gula\r\n1 sdm garam\r\nOlesan kulit:\r\n2 sdm cuka\r\n1 sdm garam', '1.	Bersihkan daging samcan, kerat daging memanjang jangan kena kulit. Keringkan daging dengan tissue dapur\r\n2.	Rebus di air mendidih daging samcan 10 menit. Keringkan daging dengan tissue dapur. Tusuk\" kulit dengan garpu. Jangan tusuk dagingnya.\r\n3.	Oles bumbu olesan kulit.\r\n4.	Balik kulit. Balurkan bumbu daging, jngn kena kulit.\r\n5.	Tutup daging dengan plastik wrap tp bagian kulit ga usah tutup (supaya daging ga kering) masukan ke kulkas.Tunggu 6jam.biar meresap tunggu 24jam lebih baik.\r\n6.	Cara Memanggang: Saya pakai oven tangkring. Daging sy taruh di loyang (sesuai uk daging) kulit menghadap atas. Rendam daging dngn air jngn smp menutupi kulit. <<<< Tips supaya daging tetap juicy dan gak keras.\r\n7.	Panggang dengan api sedang. 15menit sekali oleskan kulit dengan olesan kulit. Panggang smp kulit crispy kurleb 60menit. Tergantung api dan oven kalian.\r\n8.	Ketika kulit sdh agak crispy dan air di loyang masih ada, buang air nya supaya daging luar garing tapi juicy didalam.\r\n9.	Setelah kulit crispy matikan kompor pot', 'img/image_13.jpg', 0, 0),
(14, 'Gyoza', 'NicholasChen', '1st time making Gyoza!\r\nDemen bangett pesen Gyoza di resto2 kesayangan... tapi... 1 kekurangnnya... yaitu kurang banyak... xixixi... Padahal kalo bikin sendiri dengan harga segitu jadi banyakk lohhâ€¦ #kalkulasi emak2\r\nLah kemaren ga sengaja liat resep mb', '2 pak Kulit Pangsit\r\n1 Sdm Tepung Terigu	\r\nIsian:\r\n150 gr Daging Sapi giling segar\r\n50 gr Daging Udang giling\r\n1/2 butir Bawang bombay potong dadu\r\n1 siung Bawang putih haluskan\r\n2 butir Telur\r\nSejumput Daun Kucai sesuai selera\r\n1 sdt Minyak wijen', '1.	Campur semua bahan jadi satu, aduk rata.\r\n2.	Sendok isian ke kulit pangsit, tutup rapat pakai air.\r\n3.	Beri 2 sdm minyak di teflon, goreng gyoza posisi berdiri sampe coklat.\r\n4.	Segera siram dengan air kira-kira 100 ml pastikan kulit atas kesiram jg yah. langsung tutup.\r\n5.	Tiris dan sajikan.', 'img/image_14.jpg', 0, 0),
(15, 'Charsiu Honey', 'NicholasChen', 'hayoo siapa pecinta makanan 1 ini???????????\r\nsiapapun yang suka non halal\r\npasti suka\r\napalagi ini di tambah ke nasi campur\r\nnyumâ€¦ nyum\r\nuntuk yg mau coba pakai dada ayam juga bisa\r\njadi bagi kalian yg muslim bisa menggantikanya dengan daging dada ayam', '', '1.	Campurkan semua bahan menjadi 1 di dalam wadah.sampai warna dan bumbu merata \r\n2.	Tusuk tusuk daging dengan garpu, lalu diamkan di dalam kulkas sampai semaleman. agar bumbu dan warna meresap ke daging\r\n3.	Siapkan panci masukan daging yang sudah di diamkan semaleman (jangan di kasih air) karena aku ambil kaldu dari air dagingnya (ini boleh di skip, kalo aku pakai cara ini biar lebih meresap dengan kandungan air dan bumbu yang ada di dagingnya) kira2 masak sampai 5 menit lalu angkat\r\n4.	 Siapkan alas untuk memanggang dagingnya ke dalam oven kira kira 20-25 menit di bolak balik. (Kalian bisa pakai aluminium foil/ tdk) kalo aku suka ada sedikit gosong gosongnya di bagian atas dagingnya.\r\n5.	 Setelah jadi tiriskan tipis tipis.\r\n6.	Paling enak disantap dengan nasi panas panas. lalu diberi sedikit sambal.', 'img/image_15.jpg', 0, 0),
(16, 'Bakmi Babi', 'NicholasChen', 'bakmi yang sungguh lezat', '1 bungkus Mie keriting (yang biasa ada disupermarket / pasar, saya biasa beli yang ada di supermarket rejeki ada 5-6 porsi)\r\nBahan Toping Daging\r\n250 gram daging cincang babi\r\n1 sdm kecap angsa\r\n1 sdm kecap asin bangka (warnanya lebih pekat & kental daripada kecap asin biasa)\r\n2 sdm kecap manis\r\n3 siung bawang putih cincang\r\n3 siung bawang merah cincang\r\n1/2 sdt garam\r\n1/2 sdt lada putih bubuk\r\n1 sdm gula pasir\r\n1 sdm minyak goreng\r\nsecukupnya air putih (untuk kaldu daging)\r\nBahan Minyak Bawang Putih\r\n5 siung bawang putih cincang\r\nsecukupnya minyak goreng (perbandingannya kalau saya 2x lipat dari jumlah bawang putih, ditakar kasar aja)\r\nPelengkap\r\nsecukupnya Tauge, direbus sebentar\r\nsecukupnya Caisim, direbus sebentar\r\nsecukupnya bawang goreng\r\nsecukupnya daun bawang, dipotong kecil', '1.	Cara membuat minyak bawang putih : masukkan bawang putih cincang ketika minyak masih dingin, dengan api kecil tumis bawang putih, ketika sudah matang (agak kecoklatan) sudah dapat diangkat, sisihkan\r\n \r\n \r\n2.	Cara membuat topping daging : campur semua bahan kecuali minyak & air, lalu diamkan selama 10 menit, setelah 10 menit tumis daging dan masukkan air sesuai selera kaldu yang ingin didapat (masukkan air lebih dari hasil yang ingin didapat yah karena nanti akan menyusut), adjust rasa apabila ada yang kurang, apabila kaldu sudah menyatu (tandanya agak menyusut) artinya sudah siap.\r\n \r\n \r\n3.	Cara merebus mie : Ketika air mendidih baru masukkan mienya, saya sarankan sebelum dimasukkan ke air mendidih, mie diurai\"dulu menggunakan tangan, lamanya merebus mie tergantung selera karena tingkat kematangan masing\" orang berbeda, semakin lama merebus semakin lembek mie yang akan dihasilkan. Kalau saya pribadi dari mie dimasukkan ke air mendidih sekitar 30 detik sudah saya angkat.\r\n \r\n \r\n4.	Cara penyajian : Letakkan min', 'img/image_16.jpg', 0, 0),
(17, 'Nasi Goreng Rumahan', 'NicholasChen', 'nasi goreng yang dibuat untuk keluarga dan mudah', '600 gram nasi putih\r\n125 gram aging ayam, cincang kasar\r\n1 butir telur ayam, kocok lepas\r\n5 butir bawang merah\r\n3 siung bawang putih\r\n3 buah cabai merah besar\r\n1 batang daun bawang, iris halus\r\n3 sendok makan kecap manis\r\ngaram secukupnya\r\nmerica bubuk secukupnya\r\nminyak goreng secukupnya', '1.	Masukkan bawang merah, bawang putih, dan cabai merah ke dalam cobek. Uleg hingga halus.\r\n2.	Panaskan sedikit minyak goreng, lalu goreng telur menjadi orak-arik. Sisihkan di pinggir wajan.\r\n3.	Masukkan minyak lagi, lalu tumis bumbu yang telah dihaluskan hingga harum.\r\n4.	Masukkan ayam cincang, telur orak-arik, dan daun bawang ke dalam bumbu. Tumis lagi hingga merata.\r\n5.	Tambahkan kecap, garam, dan merica. Aduk hingga rata.\r\n6.	Masukkan nasi dan aduk hingga bumbu tercampur rata.', 'img/image_17.jpg', 0, 0),
(18, 'Semur Ayam', 'Dave', 'Semur ayam yang dibuat dengan gampang siapa saja bisa buat', '1/2 ekor Ayam\r\nBumbu halus:\r\n3 siung Bawang putih\r\n1/2 sdt Lada\r\n6 siung Bawang merah\r\n1/4 butir Pala\r\nBumbu pelengkap:\r\n1 sdm Garam\r\n1 buah Gula merah\r\nsecukupnya Penyedap\r\n6 sdm Kecap manis\r\nsecukupnya Air', '1.	Cuci bersih ayam yg sdh di potong\" Dan tiriskan\r\n \r\n \r\n2.	Tumis bumbu halus sampai harum masukan ayam dan masukan bumbu pelengkapnya masak sampai ayam matang dan bumbu mengental tes rasa dan angkat', 'img/image_18.JPG', 0, 0),
(19, 'Spaghetti Carbonara', 'Dave', 'spaghetti dengan saus carbonara tidak perlu lama-lama buat sudah dapat jadi dengan rasa yang lezat', '1/2 bungkus spageti\r\n1 gelas susu cair\r\n1/2 blok keju (selera)\r\n1 mangkuk ayam suwir\r\n1 buah telur\r\nGaram\r\nGula\r\n2 sdm Bawang bombay\r\n2 buah Bawang putih', '1.	Kumpulkan bahan\r\n2.	Rebus spageti sampai lembut atau aldente sesuai kesukaan ya moms tambahkan garam dan minyak\r\n \r\n3.	Tumis bawang bombay dan bawang putih sampai harum\r\n \r\n \r\n4.	Tambahkan ayam, susu dan keju parut beri garam dan gula\r\n5.	Tambahkan spaghetti\r\n6.	Kemudian tambah saus sesukanya.', 'img/image_19.JPG', 0, 0),
(20, 'Bakwan Jagung', 'Dave', 'gorengan yang simple dan mudah untuk dibuat', 'secukupnya Tepung serbaguna\r\n1 telor ayam\r\nGaram\r\nKetumbar\r\nBawang putih powder\r\nRoyco secukup nya\r\nJagung manis\r\nDaun bawang\r\nWortel\r\nsecukupnya Air', '1.	Potong2 kecil wortel dan daun bawang\r\n2.	Campurkan bumbu dan bahan-bahan jadi satu. Jangan kebanyakan air. Test rasa jangan sampai keasinan\r\n3.	Goreng hingga warna kecoklatan..angkat dan sajikan', 'img/image_20.JPG', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` varchar(1028) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `profile_picture` varchar(200) DEFAULT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `description`, `password`, `profile_picture`, `active`) VALUES
(1, 'Johny', 'johny@gmail.com', 'My name is johny huang', '60c98cfe56a707b2ca483794805b773a', 'img/profile_Johny.JPG', 1),
(2, 'Nicholas', 'nicholas@gmail.com', 'My name is nicholas', 'dd9acc01b6c8f5c8e99adeaf86879cd5', 'img/profile_nicholas.JPG', 1),
(3, 'Leon', 'leon@gmail.com', 'Sleep, Eat, Repeat.', '12b7550392d7b477c32658d753cc07bf', 'img/profile_Leon.PNG', 1),
(4, 'Dave', 'dave@gmail.com', 'I eat and I cook', '2421447172f8354fab4dc211a6742696', 'img/profile_Dave.JPG', 1),
(5, 'Sutedja', 'sutedja@gmail.com', 'My name is sutedja', 'fdf4221bb41340551f1bd83d914c68a6', NULL, 1),
(6, 'NicholasChen', 'nicholaschen@gmail.com', 'I eat alot, i gym alot.', 'dd9acc01b6c8f5c8e99adeaf86879cd5', 'img/profile_NicholasChen.JPG', 1),
(7, 'David', 'david@gmail.com', 'My name is david', '00312459ba361e64f4fb62d82422259b', NULL, 1),
(8, 'Louis', 'louis@gmail.com', 'My name is louis', 'e7b2dacfdd7629e57f56f8308414be34', NULL, 1),
(9, 'ocin', 'nicholeo3599@gmail.com', 'Nama saya Nicholas', '427a681ca3946a8fba7eba9445df3c41', 'img/profile_ocin.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
