-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 17 2021 г., 18:24
-- Версия сервера: 5.7.16-log
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `new_otherwise`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `url`, `is_active`, `keywords`, `description`, `timestamp`, `timestamp_update`) VALUES
(1, 0, 'Категория 1\n\n', 'kategoria-1', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:50:58'),
(2, 0, 'Категория 2', 'kategoria-2', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:51:03'),
(3, 0, 'Категория 3', 'kategoria-3', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:51:08'),
(4, 1, 'Подкатегория 1', 'podkategoria-1', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:51:56'),
(5, 1, 'Подкатегория 2', 'podkategoria-2', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:51:59'),
(6, 1, 'Подкатегория 3', 'podkategoria-3', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:52:03'),
(7, 1, 'Подкатегория 4', 'podkategoria-4', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:52:06'),
(8, 1, 'Подкатегория 5', 'podkategoria-5', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:52:10'),
(9, 2, 'Подкатегория 6', 'podkategoria-6', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:52:13'),
(10, 2, 'Подкатегория 7', 'podkategoria-7', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:52:19'),
(11, 2, 'Подкатегория 8', 'podkategoria-8', 0, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:52:23'),
(12, 2, 'Подкатегория 9', 'podkategoria-9', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:52:26'),
(18, 3, 'Подкатегория 10', 'podkategoria-10', 1, '', '', '2018-11-18 17:23:58', '2018-11-19 18:52:31'),
(19, 3, 'Подкатегория 11', 'podkategoria-11', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:52:40'),
(20, 3, 'Подкатегория 4', 'podkategoria-4', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:52:50'),
(21, 2, 'Подкатегория 13', 'podkategoria-13', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:52:56'),
(22, 3, 'Подкатегория 14', 'podkategoria-14', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:53:00'),
(23, 0, 'Категория 4', 'kategoria-4', 1, NULL, NULL, '2018-11-18 17:23:58', '2018-11-19 18:51:08');

-- --------------------------------------------------------

--
-- Структура таблицы `characteristics`
--

CREATE TABLE `characteristics` (
  `id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `characteristics`
--

INSERT INTO `characteristics` (`id`, `name`) VALUES
(1, 'Цвет '),
(2, 'Материал');

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_in_use` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `currency`
--

INSERT INTO `currency` (`id`, `name`, `code`, `is_active`, `is_in_use`) VALUES
(1, 'руб.', 'rub', 1, 1),
(2, 'доллар', 'usd', 1, 0),
(3, 'евро', 'eur', 1, 0),
(4, 'биткоин', 'bitcoin', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(400) NOT NULL,
  `mime_type` varchar(225) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `file_name`, `mime_type`, `timestamp`) VALUES
(1, 'product2.jpg', 'image/png', '2018-12-14 16:50:13'),
(2, 'ger.jpg', 'image/png', '2018-12-14 16:58:31'),
(3, 'ffgweher.jpg', 'image/png', '2018-12-14 16:58:31'),
(4, 'ae0ff2f3_resizedScaled_674to450.jpg', 'image/jpg', '2018-12-14 16:50:13'),
(5, 'IMG_2017072.jpg', 'image/jpg', '2018-12-14 16:58:31'),
(6, 'screenshot.jpg', 'image/jpg', '2018-12-14 16:58:31');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1516039927),
('m140622_111540_create_image_table', 1516039956),
('m140622_111545_add_name_to_image_table', 1516039957),
('m200108_143221_create_pevnev_blog', 1580145630),
('m200108_153231_create_pevnev_blog_group', 1580145631);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `qty` int(10) NOT NULL,
  `sum` float NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order`
--

INSERT INTO `order` (`id`, `created_at`, `updated_at`, `qty`, `sum`, `status`, `name`, `email`, `phone`, `address`) VALUES
(1, '2018-01-05 23:16:35', '2018-01-05 23:16:35', 4, 236, '1', 'fefed', 'e@eefew.ru', '334343434', 'кмукмкм'),
(2, '2018-01-05 23:19:43', '2018-01-05 23:19:43', 4, 236, '0', 'fefed', 'e@eefew.ru', '334343434', 'кмукмкм'),
(3, '2018-01-05 23:38:09', '2018-01-05 23:38:09', 4, 236, '0', 'fefed', 'e@eefew.ru', '334343434', 'кмукмкм'),
(4, '2018-01-05 23:39:04', '2018-01-05 23:39:04', 4, 236, '0', 'fefed', 'e@eefew.ru', '334343434', 'кмукмкм'),
(5, '2018-01-05 23:41:31', '2018-01-05 23:41:31', 4, 236, '0', 'fefed', 'e@eefew.ru', '334343434', 'кмукмкм'),
(6, '2018-01-05 23:44:34', '2018-01-05 23:44:34', 4, 236, '0', 'fefed', 'e@eefew.ru', '334343434', 'кмукмкм'),
(7, '2018-01-05 23:45:24', '2018-01-05 23:45:24', 4, 236, '1', 'fefed', 'e@eefew.ru', '334343434', 'кмукмкм'),
(8, '2018-01-05 23:51:11', '2018-01-05 23:51:11', 4, 236, '0', 'fefed', 'e@eefew.ru', '334343434', 'кмукмкм'),
(9, '2018-01-08 22:11:25', '2018-01-08 22:11:25', 4, 236, '0', 'fefed', 'e@eefew.ru', '334343434', 'кмукмкм'),
(10, '2018-01-08 22:13:10', '2018-01-08 22:13:10', 4, 236, '0', 'fefed', 'e@eefew.ru', '334343434', 'кмукмкм');

-- --------------------------------------------------------

--
-- Структура таблицы `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty_item` int(11) NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `name`, `price`, `qty_item`, `sum_item`) VALUES
(1, 7, 3, 'Easy Polo Black Edition', 59, 1, 59),
(2, 7, 4, 'Easy Polo Black Edition', 59, 1, 59),
(3, 7, 2, 'Easy Polo Black Edition', 59, 2, 118),
(4, 8, 3, 'Easy Polo Black Edition', 59, 1, 59),
(5, 8, 4, 'Easy Polo Black Edition', 59, 1, 59),
(6, 8, 2, 'Easy Polo Black Edition', 59, 2, 118),
(7, 9, 3, 'Easy Polo Black Edition', 59, 2, 118),
(8, 9, 4, 'Easy Polo Black Edition', 59, 1, 59),
(9, 9, 16, 'Easy Polo Black Edition', 59, 1, 59),
(10, 10, 3, 'Easy Polo Black Edition', 59, 2, 118),
(11, 10, 4, 'Easy Polo Black Edition', 59, 1, 59),
(12, 10, 16, 'Easy Polo Black Edition', 59, 1, 59);

-- --------------------------------------------------------

--
-- Структура таблицы `payment_accept`
--

CREATE TABLE `payment_accept` (
  `id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `payment_accept`
--

INSERT INTO `payment_accept` (`id`, `is_active`, `name`, `image`) VALUES
(1, 1, 'Pay Pal', 'paypal.png'),
(2, 1, 'Visa', 'visa.png'),
(3, 1, 'Maestro', 'maestro.png'),
(4, 1, 'Master Card', 'master.png');

-- --------------------------------------------------------

--
-- Структура таблицы `pevnev_blog`
--

CREATE TABLE `pevnev_blog` (
  `id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `blog_group_id` int(11) NOT NULL DEFAULT '0',
  `is_group_active` int(10) NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `views` int(10) NOT NULL DEFAULT '0',
  `text_announcement` text,
  `text` text,
  `image` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pevnev_blog`
--

INSERT INTO `pevnev_blog` (`id`, `is_active`, `url`, `blog_group_id`, `is_group_active`, `name`, `views`, `text_announcement`, `text`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `timestamp`, `timestamp_update`, `timestamp_start`) VALUES
(1, 1, 'demo-post-1', 1, 1, 'Demo post 1', 0, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', NULL, NULL, '2020-01-27 17:20:30', '2020-01-27 17:20:30', '2020-01-27 17:20:30'),
(2, 1, 'demo-post-2', 1, 1, 'Demo post 2', 0, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', NULL, NULL, '2020-01-27 17:20:30', '2020-01-27 17:20:30', '2020-01-27 17:20:30'),
(3, 1, 'demo-post-3', 1, 1, 'Demo post 3', 0, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', NULL, NULL, '2020-01-27 17:20:30', '2020-01-27 17:20:30', '2020-01-27 17:20:30'),
(4, 1, 'demo-post-4', 1, 1, 'Demo post 4', 0, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', NULL, NULL, '2020-01-27 17:20:30', '2020-01-27 17:20:30', '2020-01-27 17:20:30'),
(5, 1, 'demo-post-5', 1, 1, 'Demo post 5', 0, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', NULL, NULL, '2020-01-27 17:20:30', '2020-01-27 17:20:30', '2020-01-27 17:20:30'),
(6, 1, 'demo-post-6', 2, 1, 'Demo post 6', 0, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', NULL, NULL, '2020-01-27 17:20:30', '2020-01-27 17:20:30', '2020-01-27 17:20:30'),
(7, 1, 'demo-post-7', 2, 1, 'Demo post 7', 0, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', NULL, NULL, '2020-01-27 17:20:30', '2020-01-27 17:20:30', '2020-01-27 17:20:30'),
(8, 1, 'demo-post-8', 2, 1, 'Demo post 8', 0, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', NULL, NULL, '2020-01-27 17:20:30', '2020-01-27 17:20:30', '2020-01-27 17:20:30'),
(9, 1, 'demo-post-9', 3, 1, 'Demo post 9', 0, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', NULL, NULL, '2020-01-27 17:20:30', '2020-01-27 17:20:30', '2020-01-27 17:20:30'),
(10, 1, 'demo-post-10', 3, 1, 'Demo post 10', 0, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', NULL, NULL, '2020-01-27 17:20:30', '2020-01-27 17:20:30', '2020-01-27 17:20:30'),
(11, 1, 'demo-post-11', 3, 1, 'Demo post 11', 0, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', NULL, NULL, '2020-01-27 17:20:30', '2020-01-27 17:20:30', '2020-01-27 17:20:30'),
(12, 1, 'demo-post-12', 3, 1, 'Demo post 12', 0, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 'Potcany v trenikakh sidya na kortakh v padike Uralmasha reshaut voprosy', NULL, NULL, '2020-01-27 17:20:30', '2020-01-27 17:20:30', '2020-01-27 17:20:30');

-- --------------------------------------------------------

--
-- Структура таблицы `pevnev_blog_group`
--

CREATE TABLE `pevnev_blog_group` (
  `id` int(11) NOT NULL,
  `name` varchar(1255) DEFAULT NULL,
  `is_active` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pevnev_blog_group`
--

INSERT INTO `pevnev_blog_group` (`id`, `name`, `is_active`) VALUES
(1, 'Demo category 1', 1),
(2, 'Demo category 2', 1),
(3, 'Demo category 3', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `content` text,
  `price` float NOT NULL DEFAULT '0',
  `price_sale` int(10) DEFAULT '0',
  `qty` int(10) UNSIGNED NOT NULL DEFAULT '10',
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'no-image.png',
  `is_active` tinyint(1) DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_update` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `hit` enum('0','1') NOT NULL DEFAULT '0',
  `new` enum('0','1') NOT NULL DEFAULT '0',
  `sale` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `url`, `content`, `price`, `price_sale`, `qty`, `keywords`, `description`, `img`, `is_active`, `timestamp`, `timestamp_update`, `hit`, `new`, `sale`) VALUES
(1, 4, 'Easy Polo Black Edition', 'easy-polo-black-edition', '<p>Мужик в очках, просто одетый остин пауэрс 2 плюс сила члена со скидкой</p>\n', 59, 1000, 40, '', '', 'product2.jpg', 1, '2018-11-16 16:32:56', '2018-12-13 17:04:07', '0', '0', '1'),
(2, 4, 'товар по русски ', 'tovar-po-russki', 'Мужик в очках, просто одетый остин пауэрс', 143, 67, 10, 'остин, паурс', 'амплитуда расчачки старой скамейки пацанчиками с района', 'product3.jpg', 1, '2018-11-16 16:32:56', '2018-11-27 19:50:14', '1', '1', '0'),
(3, 9, 'товар по русски 2', 'tovar-po-russki-2', '<p>Мужик в очках, просто одетый остин пауэрс</p>\r\n', 5957, 0, 10, '', '', 'no-image.png', 1, '2018-11-16 16:32:56', '2018-11-21 16:33:08', '1', '1', '0'),
(4, 21, 'еще товар ', 'eshe-tovar', '<p>Мужик в очках, просто одетый остин пауэрс</p>\r\n', 59, 21, 10, '', '', 'product2.jpg', 1, '2018-11-16 16:32:56', '2019-01-11 19:36:30', '1', '0', '1'),
(5, 25, 'мвумук3434а', 'vdever3434f', 'Мужик в очках, просто одетый остин пауэрс', 59, 0, 80, NULL, NULL, 'product2.jpg', 1, '2018-11-16 16:32:56', '2018-11-21 16:33:46', '0', '1', '0'),
(6, 28, '3кус3а3ссц уцацс', '3rec3f3ccw ewfwc', 'Мужик в очках, просто одетый остин пауэрс', 593, 12, 10, NULL, NULL, 'product3.jpg', 1, '2018-11-16 16:32:56', '2019-01-04 20:20:48', '0', '0', '1'),
(7, 28, '32кч efewf 3ref', '32rx-efewf-3ref', '<p>Мужик в очках, просто одетый <strong>остин </strong>пауэрс</p>\r\n\r\n<p><img alt=\"\" src=\"/upload/global/IMG_2017072(1).jpg\" style=\"height:169px; width:300px\" /></p>\r\n', 59, 0, 10, '', '', '', 1, '2018-11-16 16:32:56', '2018-11-21 16:34:16', '0', '1', '0'),
(8, 26, '3rd efe23 ee3f', '3rd-efe23-ee3f', 'Мужик в очках, просто одетый остин пауэрс', 590, 0, 10, NULL, NULL, 'product6.jpg', 0, '2018-11-16 16:32:56', '2018-11-21 16:34:35', '1', '1', '0'),
(9, 29, 'уц32кас  уац  wef33f', 'ew32rfc-efw-wef33f', 'Мужик в очках, просто одетый остин пауэрс', 59, 0, 10, NULL, NULL, 'product2.jpg', 1, '2018-11-16 16:32:56', '2018-11-21 16:34:55', '0', '1', '0'),
(10, 29, '234 efe evdv3', '234-efe-evdv3', 'Мужик в очках, просто одетый остин пауэрс', 59, 450, 10, NULL, NULL, 'product3.jpg', 0, '2018-11-16 16:32:56', '2019-01-04 20:21:09', '0', '0', '1'),
(11, 29, 'ewf wefwefw wefwef', 'ewf-wefwefw-wefwef', 'Мужик в очках, просто одетый остин пауэрс', 342, 0, 10, NULL, NULL, 'product1.jpg', 1, '2018-11-16 16:32:56', '2019-01-02 17:52:51', '0', '1', '0'),
(12, 29, 'ewfdfwef efwef wfwef34vf', 'ewfdfwefef-wef-wfwef34vf', 'Мужик в очках, просто одетый остин пауэрс', 43, 0, 0, NULL, NULL, 'product6.jpg', 1, '2018-11-16 16:32:56', '2019-01-05 19:10:35', '0', '0', '0'),
(13, 29, 'ewf3 ваммв 4dver34', 'ewf3-dfvvd-4dver34', 'Мужик в очках, просто одетый остин пауэрс', 59, 0, 10, NULL, NULL, 'product2.jpg', 1, '2018-11-16 16:32:56', '2018-11-21 16:35:48', '0', '1', '0'),
(14, 25, 'dfsf3fvs', 'dfsf3fvs', 'Мужик в очках, просто одетый остин пауэрс', 59, 0, 10, NULL, NULL, 'product3.jpg', 0, '2018-11-16 16:32:56', '2018-11-21 16:35:51', '0', '0', '1'),
(15, 20, 'efeffwefw ewfw3ef', 'efeffwefw-ewfw3ef', 'Мужик в очках, просто одетый остин пауэрс', 59, 0, 10, NULL, NULL, 'product1.jpg', 1, '2018-11-16 16:32:56', '2018-11-21 16:35:58', '0', '1', '0'),
(16, 26, 'вау3 а32 fewf34', 'dfe3-f32 fewf34', 'Мужик в очках, просто одетый остин пауэрс', 59, 0, 10, NULL, NULL, 'product6.jpg', 0, '2018-11-16 16:32:56', '2018-11-21 16:36:13', '1', '0', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `product_to_category`
--

CREATE TABLE `product_to_category` (
  `id` int(11) NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_to_category`
--

INSERT INTO `product_to_category` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 4),
(2, 4, 1),
(3, 11, 1),
(4, 12, 1),
(5, 13, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_to_characteristic`
--

CREATE TABLE `product_to_characteristic` (
  `id` int(11) NOT NULL,
  `product_id` int(10) DEFAULT NULL,
  `characteristic_id` int(10) DEFAULT NULL,
  `value` varchar(225) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `product_to_characteristic`
--

INSERT INTO `product_to_characteristic` (`id`, `product_id`, `characteristic_id`, `value`, `timestamp`) VALUES
(1, 1, 1, 'Белый', '2018-12-17 16:12:59'),
(2, 2, 1, 'желтый', '2018-12-17 16:12:59'),
(3, 1, 2, 'Пластик', '2018-12-17 16:12:59');

-- --------------------------------------------------------

--
-- Структура таблицы `product_to_images`
--

CREATE TABLE `product_to_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_id` int(10) DEFAULT '0',
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `is_main` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_to_images`
--

INSERT INTO `product_to_images` (`id`, `image_id`, `product_id`, `is_main`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 0),
(3, 3, 1, 0),
(4, 4, 5, 1),
(5, 5, 5, 0),
(6, 6, 5, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `parameter` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `controller`, `parameter`, `value`) VALUES
(1, 'product', 'seo_url_product	', '1'),
(2, 'category', 'seo_url_category', '1');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `status`, `username`, `password_hash`, `auth_key`) VALUES
(1, 1, 'admin', '$2y$13$p6PfQ5hnKI3FSgiSUm.PouUw.COnb5xlrFWC/Yfi02cuvxgGFlRBC', '_EfVofIO5yza21xeip-FrN47rgDpuSTN');

-- --------------------------------------------------------

--
-- Структура таблицы `user_new`
--

CREATE TABLE `user_new` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timestamp_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `user_new`
--

INSERT INTO `user_new` (`id`, `email`, `status`, `surname`, `name`, `lastname`, `auth_key`, `password_hash`, `password_reset_token`, `timestamp`, `timestamp_update`) VALUES
(1, 'vipercs90@mail.ru', 1, 'Солдатов', 'Владимир', 'Юрьевич', 'I7Lcd58Bl9QBmvSCppa5VdCD0jrKrUy0', '$2y$13$nU0MfFnWO4UM4tXwOdGms.RBW4hazJsYw9hGIdleYh58595n4Oje2', NULL, '2017-05-23 09:54:55', '2017-07-23 10:38:40'),
(2, 'reklama3@tk-kit.ru', 0, 'Гиричев', 'Владимир', '', '', '$2y$13$sNbn2267czXja7D7lvh9Tunk3TNYUSDSkjJmIFB855WUgd4l8tKQG', NULL, '2017-07-06 07:01:06', '2018-02-15 10:24:14'),
(3, 'baranovskayaalena@gmail.com', 1, 'Барановская', 'Алена', '', '', '$2y$13$MPeQE/1T6wRD4zf29vRyr.E7pYU5uZx3kwcUswBTqio3OPRkezcLi', NULL, '2017-07-24 14:04:37', '2017-11-27 06:03:47'),
(4, 'nadya-tc@rambler.ru', 1, 'Чихалова', 'Надежда', 'Павловна', '', '$2y$13$1XFogfLg6GqB3GsLkDbrf.HCu6trgt4NczwmtB/bReUZD/0LiWnve', NULL, '2017-07-28 09:58:13', '2017-07-28 09:58:13'),
(5, 'reklama1@tk-kit.ru', 1, 'Седлер', 'Евгений', '', '', '$2y$13$hGzl2SGEqWYnHggruzy2o.z/pPZLfblWXqh2QAmMI9Ks0NUPx8ItW', NULL, '2017-08-07 04:56:45', '2017-08-07 04:57:41'),
(6, 'market7@tk-kit.ru', 1, 'Одинцев', 'Филипп', '', '', '$2y$13$wkY5Ty3eAG2Uw0bc83zf3uX68OIhFVXz8DwF3.1w2E5DrPoCwzihu', NULL, '2017-08-07 10:09:59', '2017-08-07 10:09:59'),
(7, 'ntagil10@tk-kit.ru', 1, 'Сидорович', 'Ирина', '', '', '$2y$13$2ydyDaaAVR0.KT1GaEvMYeuBv5sg/0px.kXbhPiJIDNHe7AVh21rm', NULL, '2017-08-10 06:10:17', '2017-08-10 06:10:17'),
(8, 'reklama2@tk-kit.ru', 1, 'Молокова', 'Татьяна', '', '', '$2y$13$vOpIofuvylmbezMFrEq9ZOvbQdhaTWo3/cvbokm/OjRO6Iv7.CFs.', NULL, '2017-08-14 06:03:48', '2017-08-14 06:03:48'),
(9, 'pekanchik@gmail.com', 1, 'Пеканова', 'Ирина', '', '', '$2y$13$6S.P7YNTc5DSThtw1uf4Xu3UKc5ouKRcbm3OY5LPSlw7nQ7w5OPbi', NULL, '2017-09-18 10:48:05', '2017-09-18 10:48:05'),
(10, 'admin', 1, 'Певнев', 'Константин', '', '', '$2y$13$p6PfQ5hnKI3FSgiSUm.PouUw.COnb5xlrFWC/Yfi02cuvxgGFlRBC', NULL, '2017-09-21 09:38:57', '2019-06-12 16:42:31'),
(11, 'analitik2@tk-kit.ru', 1, 'Голикова', 'Анна', '', '', '$2y$13$xo73qOy3wc3vvAkjzO4HxeoiItJsllOX9udHpExwnExweHwkln7ZW', NULL, '2017-10-23 14:14:28', '2017-10-23 14:14:28'),
(12, 'logist7@tk-kit.ru', 1, 'Созинов', 'Кирилл', '', '', '$2y$13$AF42vutSmEIxYfwZ.8GYi.vsvVxOK7aaoaqDQIcJS6vKQxBsiwjp2', NULL, '2017-10-26 05:17:53', '2017-10-26 05:17:53'),
(13, 'ntg11@tk-kit.ru', 1, 'Фёдорова', 'Оксана', '', '', '$2y$13$U1ZAxtE5ejF8z57AC4wUMe/1XlLoD7nWQzWQc7pPHQZmlDZ9S3.Qy', NULL, '2017-11-03 06:20:12', '2017-11-03 06:20:12'),
(14, 'ntg48@tk-kit.ru', 1, 'Ведерникова', 'Алёна', '', '', '$2y$13$yg5RMNmXrI/deoJPIjk.TuKA0fIbAbQ.3wVDrsVR9Feeia38DzfVK', NULL, '2017-11-03 06:23:13', '2017-11-03 06:23:13'),
(15, 'ntg49@tk-kit.ru', 1, 'Волокитина', 'Ксения', '', '', '$2y$13$LjkpIQL56QSk1cFPEY1louOZ9uUF2DsyRpmJLIfmpKAJOiafPgCM.', NULL, '2017-11-03 06:25:28', '2017-11-03 06:27:59'),
(16, 'ntg50@tk-kit.ru', 1, 'Иванова', 'Анастасия', '', '', '$2y$13$Zdsi6oT/dgw542R.FjJpF.UUP4LqBlqqTmYNfY/bb8YGzoKC.1HMq', NULL, '2017-11-03 06:26:15', '2017-11-03 06:27:54'),
(17, 'sei.olympus@gmail.com', 1, 'Савицкий', 'Евгений', '', '', '$2y$13$x6DpA16qox9npEK/niEoCuxGL/daTAjJlE6j4adzojqz/D.7pTbam', NULL, '2018-03-13 05:27:52', '2018-03-13 05:27:52'),
(18, 'admin10@tk-kit.ru', 1, 'Мальков', 'Вячеслав', '', '', '$2y$13$tDgWL9VAMOY4LZlZfLd2huBB1jaJwFb2h7SdGPEZt70sLUlsvy7K2', NULL, '2018-03-20 12:12:06', '2018-03-20 12:12:06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `characteristics`
--
ALTER TABLE `characteristics`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `payment_accept`
--
ALTER TABLE `payment_accept`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pevnev_blog`
--
ALTER TABLE `pevnev_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url` (`url`),
  ADD KEY `timestamp_start` (`timestamp_start`),
  ADD KEY `is_active` (`is_active`),
  ADD KEY `views` (`views`),
  ADD KEY `is_group_active` (`is_group_active`);

--
-- Индексы таблицы `pevnev_blog_group`
--
ALTER TABLE `pevnev_blog_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `is_active` (`is_active`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `qty` (`qty`);

--
-- Индексы таблицы `product_to_category`
--
ALTER TABLE `product_to_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_to_characteristic`
--
ALTER TABLE `product_to_characteristic`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_to_images`
--
ALTER TABLE `product_to_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qty` (`product_id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_new`
--
ALTER TABLE `user_new`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT для таблицы `characteristics`
--
ALTER TABLE `characteristics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `payment_accept`
--
ALTER TABLE `payment_accept`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `pevnev_blog`
--
ALTER TABLE `pevnev_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `pevnev_blog_group`
--
ALTER TABLE `pevnev_blog_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `product_to_category`
--
ALTER TABLE `product_to_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `product_to_characteristic`
--
ALTER TABLE `product_to_characteristic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `product_to_images`
--
ALTER TABLE `product_to_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `user_new`
--
ALTER TABLE `user_new`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
