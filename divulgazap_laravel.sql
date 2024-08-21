-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Ago-2024 às 18:53
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `divulgazap_laravel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Outro', 'other.svg', NULL, NULL),
(2, 'Academia', 'gym.svg', NULL, NULL),
(3, 'Amor e Romance', 'love.svg', NULL, NULL),
(4, 'Carros e Motos', 'car.svg', NULL, NULL),
(5, 'Cidades', 'city.svg', NULL, NULL),
(6, 'Compra e Venda', 'ecommerce.svg', NULL, NULL),
(7, 'Desenhos e Animes', 'cartoon.svg', NULL, NULL),
(8, 'Educação', 'study.svg', NULL, NULL),
(9, 'Esportes', 'sport.svg', NULL, NULL),
(10, 'Eventos', 'events.svg', NULL, NULL),
(11, 'Figurinhas', 'sticker.svg', NULL, NULL),
(12, 'Filmes e Séries', 'movie.svg', NULL, NULL),
(13, 'Frases e Mensagens', 'quote.svg', NULL, NULL),
(14, 'Amizade', 'friend.svg', NULL, NULL),
(15, 'Tecnologia e Programação', 'code.svg', NULL, NULL),
(16, 'Games', 'game.svg', NULL, NULL),
(17, 'Memes', 'meme.svg', NULL, NULL),
(18, 'Músicas', 'music.svg', NULL, NULL),
(19, 'Notícias', 'news.svg', NULL, NULL),
(20, 'Receitas', 'food.svg', NULL, NULL),
(21, 'Vagas de Emprego', 'job.svg', NULL, NULL),
(22, 'Viagem e Turismo', 'travel.svg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invite_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `category_id`, `name`, `image`, `invite_link`, `description`, `uri`, `created_at`, `updated_at`) VALUES
(1, 16, 'gamer kitsune 🎮', '66c6195b750f0.jpg', 'FnRpKzuVgVgFxkKaeY5UsE', NULL, 'gamer-kitsune', '2024-08-21 16:44:11', '2024-08-21 16:44:11'),
(2, 16, 'Raid e missão', '66c619743be05.jpg', 'EIVXddYuXocHYvxoRsdlf8', NULL, 'raid-e-missao', '2024-08-21 16:44:36', '2024-08-21 16:44:36'),
(3, 11, '🪐ℙ𝕃𝔸ℕ𝔼𝕋𝔸 𝕊𝕋𝕀ℂ𝕂𝔼ℝ𝕊🪐', '66c6198e9f79b.jpg', 'IMXXE8lqNYjDjY01yxq6G6', NULL, '', '2024-08-21 16:45:02', '2024-08-21 16:45:02'),
(4, 11, '𝐒𝐓𝐈𝐂𝐊𝐄𝐑 𝐂𝐇𝐀𝐓', '66c619b25dc04.jpg', 'LH4qoWnWpBQ5tt28jg89GA', 'entra aí', '-1', '2024-08-21 16:45:38', '2024-08-21 16:45:38'),
(5, 14, '💀Shitpost Do Zeca Cabuloso💯', '66c619f79b4ca.jpg', 'EJedAKfb1wsCFf6vdlny4w', NULL, 'shitpost-do-zeca-cabuloso', '2024-08-21 16:46:47', '2024-08-21 16:46:47'),
(6, 14, '✧•𝑭𝒓𝒊𝒆𝒏𝒅𝒔&#039; ╎╎ 𝒁𝒐𝒏𝒆•✧', '66c61a38b5894.jpg', 'BzWbRXJbDRiKX7jvP2ts7Q', NULL, '039', '2024-08-21 16:47:52', '2024-08-21 16:47:52'),
(7, 12, 'DRIVE VIP PIPOCA FILMES E SERIES  🍿🎬', '66c61a99c0682.jpg', 'IbJHSAf4Rje6nNTS2uXH29', NULL, 'drive-vip-pipoca-filmes-e-series', '2024-08-21 16:49:29', '2024-08-21 16:49:29'),
(8, 17, 'JANTANDO MEMES', '66c61ad2365b3.jpg', 'DJ97p8jOrRY6K0EmeLqFcY', NULL, 'jantando-memes', '2024-08-21 16:50:26', '2024-08-21 16:50:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_08_21_131401_create_categories_table', 1),
(3, '2024_08_21_131457_create_groups_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_invite_link_unique` (`invite_link`),
  ADD UNIQUE KEY `groups_uri_unique` (`uri`),
  ADD KEY `groups_category_id_foreign` (`category_id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
