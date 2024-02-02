-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Jan 2024 pada 02.07
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes-pwd-epic-games-2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `game`
--

CREATE TABLE `game` (
  `id_game` int NOT NULL,
  `nama_game` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL DEFAULT 'default.png',
  `logo` varchar(255) NOT NULL DEFAULT 'default.png',
  `genre_game` varchar(50) NOT NULL,
  `pengembang` varchar(50) NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `harga` int NOT NULL,
  `deskripsi` text NOT NULL,
  `_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'normal',
  `is_delete` tinyint(1) NOT NULL DEFAULT '1',
  `diskon` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `game`
--

INSERT INTO `game` (`id_game`, `nama_game`, `foto`, `logo`, `genre_game`, `pengembang`, `tanggal_rilis`, `harga`, `deskripsi`, `_status`, `is_delete`, `diskon`) VALUES
(3, 'Alan Wake 2', 'alan-wake-cover.png', 'Alan_Wake_II_logo.png', 'action', 'Remedy Entertainment', '2023-10-27', 455400, 'Saga Anderson arrives to investigate ritualistic murders in a small town. Alan Wake pens a dark story to shape the reality around him. These two heroes are somehow connected. Can they become the heroes they need to be?', 'discount popular new release', 1, NULL),
(4, 'Hogwarts Legacy', 'default.png', 'default.png', 'adventure', 'Avalanche Software', '2023-02-10', 479400, 'Hogwarts Legacy is an immersive, open-world action RPG. Now you can take control of the action and be at the center of your own adventure in the wizarding world.', 'Most Played', 1, NULL),
(6, 'Assassins Creed Mirage', 'default.png', 'default.png', 'action', 'Ubisoft', '2023-10-05', 405300, 'Experience the story of Basim, a cunning street thief with nightmarish visions, seeking answers and justice as he navigates the bustling streets of ninth-century Baghdad. Through a mysterious, ancient organization known as the Hidden Ones, he will become a deadly Master Assassin and change his fate in ways he never could have imagined.', 'Top Player Rated new release', 1, NULL),
(7, 'Red Dead Redemption 2', 'default.png', 'default.png', 'action', 'Rockstar Game', '2018-10-26', 640000, 'Includes Red Dead Redemption 2: Story Mode and Red Dead Online.\r\nWinner of over 175 Game of the Year Awards and recipient of over 250 perfect scores, Red Dead Redemption 2 is an epic tale of honor and loyalty at the dawn of the modern age.\r\nAmerica, 1899. Arthur Morgan and the Van der Linde gang are outlaws on the run. With federal agents and the best bounty hunters in the nation massing on their heels, the gang must rob, steal and fight their way across the rugged heartland of America in order to survive. As deepening internal divisions threaten to tear the gang apart, Arthur must make a choice between his own ideals and loyalty to the gang who raised him.\r\nRed Dead Redemption 2 also includes the shared living world of Red Dead Online – forge your own path as you battle lawmen, outlaw gangs and ferocious wild animals to build a life on the American frontier. Build a camp, ride solo or form a posse and explore everything from the snowy mountains in the North to the swamps of the South, from remote outposts to busy farms and bustling towns. Chase down bounties, hunt, fish and trade, search for exotic treasures, run your own underground Moonshine distillery, or become a Naturalist to learn the secrets of the animal kingdom and much more in a world of astounding depth and detail – includes all new features, gameplay content and additional enhancements released since launch.', 'normal', 1, NULL),
(8, 'Cyberpunk 2077', 'default.png', 'default.png', 'action', 'CD PROJEKT RED', '2020-12-10', 706000, 'IMMERSE YOURSELF WITH UPDATE 2.1\r\nNight City feels more alive than ever with the free Update 2.1! Take a ride on the fully functional NCART metro system, listen to music as you explore the city with the Radioport, hang out with your partner in V’s apartment, compete in replayable races, ride new vehicles, enjoy improved bike combat and handling, discover hidden secrets and much, much more!\r\nCREATE YOUR OWN CYBERPUNK\r\nBecome a cyberpunk, an urban mercenary equipped with cybernetic enhancements and build your legend on the streets of Night City.\r\nEXPLORE THE CITY OF THE FUTURE\r\nNight City is packed to the brim with things to do, places to see, and people to meet. And it’s up to you where to go, when to go, and how to get there.\r\nBUILD YOUR LEGEND\r\nGo on daring adventures and build relationships with unforgettable characters whose fates are shaped by the choices you make.\r\nCLAIM EXCLUSIVE ITEMS\r\nClaim in-game swag & digital goodies inspired by CD PROJEKT RED games as part of the My Rewards program.\r\nGO TO CYBERPUNK.NET', 'normal', 1, 10.00),
(9, 'Grand Theft Auto V', 'default.png', 'default.png', 'action', 'Rockstar Games', '2013-09-17', 300750, 'Grand Theft Auto V: Premium Edition\r\nThe Grand Theft Auto V: Premium Edition includes the complete Grand Theft Auto V story experience, free access to the ever evolving Grand Theft Auto Online and all existing gameplay upgrades and content including The Doomsday Heist, Gunrunning, Smuggler’s Run, Bikers and much more. You’ll also get the Criminal Enterprise Starter Pack, the fastest way to jumpstart your criminal empire in Grand Theft Auto Online.\r\nGRAND THEFT AUTO V\r\nWhen a young street hustler, a retired bank robber and a terrifying psychopath land themselves in trouble, they must pull off a series of dangerous heists to survive in a city in which they can trust nobody, least of all each other.\r\nGRAND THEFT AUTO ONLINE\r\nDiscover an ever-evolving world of choices and ways to play as you climb the criminal ranks of Los Santos and Blaine County in the ultimate shared Online experience.\r\nTHE CRIMINAL ENTERPRISE STARTER PACK\r\nThe Criminal Enterprise Starter Pack is the fastest way for new GTA Online players to jumpstart their criminal empires with the most exciting and popular content plus $1,000,000 bonus cash to spend in GTA Online - all content valued at over GTA $10,000,000 if purchased separately.\r\nLAUNCH YOUR CRIMINAL EMPIRE\r\nLaunch business ventures from your Maze Bank West Executive Office, research powerful weapons technology from your underground Gunrunning Bunker and use your Counterfeit Cash Factory to start a lucrative counterfeiting operation.\r\nA FLEET OF POWERFUL VEHICLES\r\nTear through the streets with a range of 10 high performance vehicles including a Supercar, Motorcycles, the weaponized Dune FAV, a Helicopter, a Rally Car and more. You’ll also get properties including a 10 car garage to store your growing fleet.\r\nWEAPONS, CLOTHING & TATTOOS\r\nYou’ll also get access to the Compact Grenade Launcher, Marksman Rifle and Compact Rifle along with Stunt Racing Outfits, Biker Tattoos and more.', 'normal', 1, 10.00),
(10, 'Backrooms: Eight Levels', 'default.png', 'default.png', 'action, adventure', 'Performance Artist', '2024-01-05', 6999, 'The game offers you a journey through a confusing maze of yellow rooms, endless dark corridors, abandoned offices and other dangerous places Backrooms. You will have to explore spaces that are hard to believe exist. It s hard to say who could have built such a thing and why. There are eight different levels available for you to explore. Each level of this otherworld is fraught with danger, and no matter what surreal place you find yourself in, you have only one goal - to survive and find a way out.\r\nOne of the few descriptions we know of this mysterious place reads - If you re not careful and noclip out of reality in the wrong areas, you ll end up in the Backrooms, where it s nothing but the stink of old moist carpet, the madness of mono-yellow, the endless background noise of fluorescent lights at maximum hum-buzz, and approximately six hundred million square miles of randomly segmented empty rooms to be trapped in. God save you if you hear something wandering around nearby, because it sure as hell has heard you..\r\nIn Backrooms you do need to be careful. Remember that you re just a guest here and you definitely shouldn t disturb the inhabitants of this place. The deeper you go into the backstage, the more creepy dangers will come your way.\r\nGraphics, sounds, post effects, as well as character and entity animations are as close as possible to the original Backrooms Found Footage videos. All these visual solutions create the atmosphere of a realistic journey through the backstage.', 'new release', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjangbelanja`
--

CREATE TABLE `keranjangbelanja` (
  `id_keranjang_belanja` int NOT NULL,
  `id_user` int NOT NULL,
  `id_game` int NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `keranjangbelanja`
--

INSERT INTO `keranjangbelanja` (`id_keranjang_belanja`, `id_user`, `id_game`, `is_delete`) VALUES
(3, 4, 3, 1),
(4, 4, 4, 1),
(5, 5, 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `membeli`
--

CREATE TABLE `membeli` (
  `id_game` int NOT NULL,
  `id_pemain` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menyimpan`
--

CREATE TABLE `menyimpan` (
  `id_menyimpan` int NOT NULL,
  `id_user` int NOT NULL,
  `id_game` int NOT NULL,
  `id_transaksi` int NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `menyimpan`
--

INSERT INTO `menyimpan` (`id_menyimpan`, `id_user`, `id_game`, `id_transaksi`, `is_delete`) VALUES
(2, 5, 3, 26, 1),
(3, 5, 4, 27, 1),
(4, 5, 9, 29, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_game` int NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_harga` int NOT NULL,
  `metode_pembayaran` varchar(15) NOT NULL,
  `status_pembelian` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_game`, `tanggal`, `total_harga`, `metode_pembayaran`, `status_pembelian`, `is_delete`) VALUES
(26, 5, 3, '2024-01-06 13:51:00', 455400, 'transfer', 1, 0),
(27, 5, 4, '2024-01-07 13:44:44', 479400, 'transfer', 1, 0),
(29, 5, 9, '2024-01-14 07:30:39', 270675, '', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `user_photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.png',
  `uang` bigint NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `username`, `user_password`, `user_type`, `fullname`, `user_photo`, `uang`, `is_delete`) VALUES
(1, '', 'ygz', 'ygzaza', 'Pemain', 'ygz alrazzak', 'default.png', 0, 1),
(2, 'dodo@gmail.com', 'dodoz', '$2y$10$vRHDf7sQgkTQbKbhxe3Sa.Vgpb3rZclrPRrnSNZvcR7T/YFCamYjO', 'player', 'Dodo Herlambang', 'IMG_5405.JPG', 500000, 1),
(4, 'abdel@gmail.com', 'abdel456', 'abdel456', 'player', 'abdel temon', 'default.png', 700000, 1),
(5, 'admin@gmail.com', 'admin456', '$2y$10$cBxp3A/3iuwTWqPN4Pdn.e.ApwH7zF8EP9/sBetwJiK8W7cFfYPxy', 'admin', 'admin beben', 'default.png', 10975, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int NOT NULL,
  `id_user` int DEFAULT NULL,
  `id_game` int DEFAULT NULL,
  `tanggal_dimasukkan` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_delete` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `wishlist`
--

INSERT INTO `wishlist` (`id_wishlist`, `id_user`, `id_game`, `tanggal_dimasukkan`, `is_delete`) VALUES
(4, 4, 3, '2024-01-02 15:58:58', 1),
(5, 4, 4, '2024-01-02 15:59:04', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id_game`);

--
-- Indeks untuk tabel `keranjangbelanja`
--
ALTER TABLE `keranjangbelanja`
  ADD PRIMARY KEY (`id_keranjang_belanja`),
  ADD KEY `id_pemain` (`id_user`),
  ADD KEY `id_game` (`id_game`);

--
-- Indeks untuk tabel `menyimpan`
--
ALTER TABLE `menyimpan`
  ADD PRIMARY KEY (`id_menyimpan`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `game`
--
ALTER TABLE `game`
  MODIFY `id_game` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `keranjangbelanja`
--
ALTER TABLE `keranjangbelanja`
  MODIFY `id_keranjang_belanja` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menyimpan`
--
ALTER TABLE `menyimpan`
  MODIFY `id_menyimpan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
