-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 07 2017 г., 12:43
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `of`
--

-- --------------------------------------------------------

--
-- Структура таблицы `lr_admins`
--

CREATE TABLE `lr_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `lr_admins`
--

INSERT INTO `lr_admins` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'admin@admin.ru', '$2y$10$DIg7nwL5he4wvIc/8NRQbuI.hknKXWV0gRUwEyfayk/W9saTUOqmO', NULL, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `lr_articles`
--

CREATE TABLE `lr_articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` enum('ru','en','ky') COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `preview` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_h1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lr_collections`
--

CREATE TABLE `lr_collections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preview` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `on_main` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `lr_collections`
--

INSERT INTO `lr_collections` (`id`, `title`, `slug`, `preview`, `image`, `priority`, `on_main`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Весна 2017', 'vesna-2017', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, eum nisi cupiditate! Quidem dolore dolor, repudiandae corporis eveniet ipsa similique aspernatur nulla debitis deserunt dignissimos qui, praesentium labore impedit repellendus.', '1507361530_31175400.jpg', 4, 1, 1, '2017-10-07 01:32:10', '2017-10-07 01:48:59'),
(2, 'Лето 2017', 'leto-2017', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, eum nisi cupiditate! Quidem dolore dolor, repudiandae corporis eveniet ipsa similique aspernatur nulla debitis deserunt dignissimos qui, praesentium labore impedit repellendus.', '1507361550_24245800.jpg', 3, 1, 1, '2017-10-07 01:32:30', '2017-10-07 01:50:32'),
(3, 'Осень 2017', 'osen-2017', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, eum nisi cupiditate! Quidem dolore dolor, repudiandae corporis eveniet ipsa similique aspernatur nulla debitis deserunt dignissimos qui, praesentium labore impedit repellendus.', '1507361569_97975900.jpg', 2, 1, 1, '2017-10-07 01:32:49', '2017-10-07 01:50:43'),
(4, 'Зима 2017', 'zima-2017', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat, eum nisi cupiditate! Quidem dolore dolor, repudiandae corporis eveniet ipsa similique aspernatur nulla debitis deserunt dignissimos qui, praesentium labore impedit repellendus.', '1507361588_19407000.jpg', 1, 1, 1, '2017-10-07 01:33:08', '2017-10-07 01:50:57');

-- --------------------------------------------------------

--
-- Структура таблицы `lr_feedback`
--

CREATE TABLE `lr_feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` enum('ru','en','ky') COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `ip` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lr_gallery`
--

CREATE TABLE `lr_gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `date` date NOT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_ru` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_ky` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `preview_en` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `preview_ru` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `preview_ky` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `content_en` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ru` text COLLATE utf8_unicode_ci NOT NULL,
  `content_ky` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lr_gallery_images`
--

CREATE TABLE `lr_gallery_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lr_migrations`
--

CREATE TABLE `lr_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `lr_migrations`
--

INSERT INTO `lr_migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_06_01_000000_create_settings_table', 1),
(2, '2017_06_01_000001_create_tree_table', 1),
(3, '2017_06_01_000002_create_articles_table', 1),
(4, '2017_06_01_000003_create_feedback_table', 1),
(5, '2017_06_01_000004_create_news_table', 1),
(6, '2017_06_01_000005_create_widgets_table', 1),
(7, '2017_06_01_000006_create_statistics_search_words_table', 1),
(8, '2017_06_01_000007_create_gallery_table', 1),
(9, '2017_06_01_000008_create_gallery_images_table', 1),
(10, '2017_06_01_000008_create_password_resets_table', 1),
(11, '2017_06_01_000009_create_users_table', 1),
(12, '2017_06_01_000010_create_roles_table', 1),
(13, '2017_06_01_000011_create_admins_table', 1),
(14, '2017_06_01_000012_create_permissions_table', 1),
(15, '2017_06_01_000013_create_modules_table', 1),
(16, '2017_06_01_000014_create_permission_role_table', 1),
(17, '2017_07_26_163239_create_sliders_table', 2),
(18, '2017_08_17_093059_create_collections_table', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `lr_modules`
--

CREATE TABLE `lr_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `lr_modules`
--

INSERT INTO `lr_modules` (`id`, `slug`, `title`) VALUES
(1, 'images', 'Изображения'),
(2, 'files', 'Файлы'),
(3, 'admins', 'Администраторы'),
(4, 'collections', 'Коллекции'),
(5, 'colors', 'Цветовые решения'),
(6, 'feedback', 'Обратная связь'),
(7, 'news', 'Новости'),
(8, 'products', 'Продукты'),
(9, 'roles', 'Группы администраторов'),
(10, 'sliders', 'Слайдер'),
(11, 'tree', 'Дерево сайта'),
(12, 'users', 'Клиенты'),
(13, 'widgets', 'Виджеты');

-- --------------------------------------------------------

--
-- Структура таблицы `lr_news`
--

CREATE TABLE `lr_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` enum('ru','en','ky') COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `preview` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `on_main` tinyint(4) NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_h1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `lr_news`
--

INSERT INTO `lr_news` (`id`, `lang`, `priority`, `title`, `date`, `preview`, `content`, `image`, `active`, `on_main`, `meta_title`, `meta_h1`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'ru', 0, 'News 1', '2017-10-07', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimos', '<p>1Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimo</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimos</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimos</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimos</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimos</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimos</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimos</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimos</p>\r\n', '1507368013_59779000.jpg', 1, 1, '', '', '', '', '2017-10-07 03:20:13', '2017-10-07 03:31:01'),
(2, 'ru', 0, 'News 2', '2017-10-06', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimos', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimosLorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimosLorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimosLorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimosLorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimosLorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimosLorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimosLorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimos</p>\r\n', '1507368034_18512600.jpg', 1, 1, '', '', '', '', '2017-10-07 03:20:34', '2017-10-07 03:20:34'),
(3, 'ru', 0, 'News 3', '2017-10-07', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimosLorem ipsum dolor sit amet, consectetur adipisicing elit. ', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimosLorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur. Et dignissimosLorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci pariatur et, corrupti unde omnis delectus corporis consequuntur.</p>\r\n', '1507368061_20091700.jpg', 1, 1, '', '', '', '', '2017-10-07 03:21:01', '2017-10-07 03:32:40');

-- --------------------------------------------------------

--
-- Структура таблицы `lr_password_resets`
--

CREATE TABLE `lr_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lr_permissions`
--

CREATE TABLE `lr_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `create` tinyint(4) NOT NULL,
  `read` tinyint(4) NOT NULL,
  `update` tinyint(4) NOT NULL,
  `delete` tinyint(4) NOT NULL,
  `publish` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `lr_permissions`
--

INSERT INTO `lr_permissions` (`id`, `module_id`, `create`, `read`, `update`, `delete`, `publish`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 2, 1, 1, 1, 1, 1),
(3, 3, 1, 1, 1, 1, 1),
(4, 4, 1, 1, 1, 1, 1),
(5, 5, 1, 1, 1, 1, 1),
(6, 6, 1, 1, 1, 1, 1),
(7, 7, 1, 1, 1, 1, 1),
(8, 8, 1, 1, 1, 1, 1),
(9, 9, 1, 1, 1, 1, 1),
(10, 10, 1, 1, 1, 1, 1),
(11, 11, 1, 1, 1, 1, 1),
(12, 12, 1, 1, 1, 1, 1),
(13, 13, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `lr_permission_roles`
--

CREATE TABLE `lr_permission_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `roles_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `lr_permission_roles`
--

INSERT INTO `lr_permission_roles` (`id`, `roles_id`, `permission_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10),
(11, 1, 11),
(12, 1, 12),
(13, 1, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `lr_roles`
--

CREATE TABLE `lr_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `lr_roles`
--

INSERT INTO `lr_roles` (`id`, `title`, `active`) VALUES
(1, 'Администратор', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `lr_settings`
--

CREATE TABLE `lr_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lr_sliders`
--

CREATE TABLE `lr_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_type` enum('in','out') COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `lr_sliders`
--

INSERT INTO `lr_sliders` (`id`, `title`, `title_color`, `link`, `link_type`, `image`, `priority`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Здесь текст заголовка, может бть в несколько строк', 'gray', 'https://mail.ru/', 'in', '1507359135_29926700.jpg', 0, 1, '2017-10-07 00:52:15', '2017-10-07 00:52:20'),
(2, '', 'white', 'chrome-extension://igokaaaooaoflibhomenoakijkgnmbbb/htmlbook.html', 'in', '1507360375_34089200.jpg', 0, 1, '2017-10-07 01:12:43', '2017-10-07 01:12:55');

-- --------------------------------------------------------

--
-- Структура таблицы `lr_statistics_search_words`
--

CREATE TABLE `lr_statistics_search_words` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `lang` enum('ru','en','ky') COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `query` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `results` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lr_tree`
--

CREATE TABLE `lr_tree` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `lang` enum('ru','en','ky') COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `module` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `template` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `in_menu` tinyint(4) NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_h1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `lr_tree`
--

INSERT INTO `lr_tree` (`id`, `parent_id`, `lft`, `rgt`, `depth`, `lang`, `slug`, `title`, `content`, `module`, `template`, `active`, `in_menu`, `meta_title`, `meta_h1`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 12, 0, 'ru', '', 'Главная', '', '', 'index', 1, 0, '', '', '', '', '2017-09-30 03:21:15', '2017-10-06 23:36:37'),
(2, 1, 2, 3, 1, 'ru', 'about', 'О нас', '<p>новости</p>\r\n', '', 'inner', 1, 1, '', '', '', '', '2017-10-06 23:32:55', '2017-10-06 23:36:19'),
(3, 1, 4, 5, 1, 'ru', 'catalog', 'Каталог одежды', '', 'collections', 'inner', 1, 1, '', '', '', '', '2017-10-06 23:33:42', '2017-10-07 01:35:58'),
(4, 1, 6, 7, 1, 'ru', 'Cooperation', 'Сотрудничество', '', '', 'inner', 1, 1, '', '', '', '', '2017-10-06 23:34:51', '2017-10-06 23:34:51'),
(5, 1, 8, 9, 1, 'ru', 'news', 'Новости и публикации', '', 'news', 'inner', 1, 1, '', '', '', '', '2017-10-06 23:35:36', '2017-10-07 03:26:24'),
(6, 1, 10, 11, 1, 'ru', 'contacts', 'Контакты', '', '', 'inner', 1, 1, '', '', '', '', '2017-10-06 23:36:37', '2017-10-06 23:36:37');

-- --------------------------------------------------------

--
-- Структура таблицы `lr_users`
--

CREATE TABLE `lr_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `region_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `lr_widgets`
--

CREATE TABLE `lr_widgets` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` enum('ru','en','ky') COLLATE utf8_unicode_ci NOT NULL,
  `protected` tinyint(4) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `type` enum('html','wysiwyg') COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `lr_widgets`
--

INSERT INTO `lr_widgets` (`id`, `lang`, `protected`, `active`, `type`, `slug`, `title`, `content`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ru', 0, 1, 'html', 'header.phones', 'Номера телефонов в шапке сайта. Вводить через запятую', ' +996 (312) 34 78 40,+996 (555) 34 78 41\r\n', '', '2017-09-30 03:22:59', '2017-09-30 03:24:24');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `lr_admins`
--
ALTER TABLE `lr_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Индексы таблицы `lr_articles`
--
ALTER TABLE `lr_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_lang_index` (`lang`),
  ADD KEY `articles_priority_index` (`priority`);

--
-- Индексы таблицы `lr_collections`
--
ALTER TABLE `lr_collections`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lr_feedback`
--
ALTER TABLE `lr_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_lang_index` (`lang`);

--
-- Индексы таблицы `lr_gallery`
--
ALTER TABLE `lr_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_priority_index` (`priority`);

--
-- Индексы таблицы `lr_gallery_images`
--
ALTER TABLE `lr_gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_images_parent_id_foreign` (`parent_id`);

--
-- Индексы таблицы `lr_migrations`
--
ALTER TABLE `lr_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lr_modules`
--
ALTER TABLE `lr_modules`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lr_news`
--
ALTER TABLE `lr_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_lang_index` (`lang`),
  ADD KEY `news_priority_index` (`priority`);

--
-- Индексы таблицы `lr_password_resets`
--
ALTER TABLE `lr_password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `lr_permissions`
--
ALTER TABLE `lr_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lr_permission_roles`
--
ALTER TABLE `lr_permission_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permission_roles_permission_id_roles_id_unique` (`permission_id`,`roles_id`),
  ADD KEY `permission_roles_roles_id_foreign` (`roles_id`);

--
-- Индексы таблицы `lr_roles`
--
ALTER TABLE `lr_roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lr_settings`
--
ALTER TABLE `lr_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lr_sliders`
--
ALTER TABLE `lr_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `lr_statistics_search_words`
--
ALTER TABLE `lr_statistics_search_words`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statistics_search_words_lang_index` (`lang`);

--
-- Индексы таблицы `lr_tree`
--
ALTER TABLE `lr_tree`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tree_parent_id_index` (`parent_id`),
  ADD KEY `tree_lft_index` (`lft`),
  ADD KEY `tree_rgt_index` (`rgt`),
  ADD KEY `tree_lang_index` (`lang`),
  ADD KEY `tree_slug_index` (`slug`);

--
-- Индексы таблицы `lr_users`
--
ALTER TABLE `lr_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `lr_widgets`
--
ALTER TABLE `lr_widgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `widgets_lang_index` (`lang`),
  ADD KEY `widgets_type_index` (`type`),
  ADD KEY `widgets_slug_index` (`slug`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `lr_admins`
--
ALTER TABLE `lr_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `lr_articles`
--
ALTER TABLE `lr_articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `lr_collections`
--
ALTER TABLE `lr_collections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `lr_feedback`
--
ALTER TABLE `lr_feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `lr_gallery`
--
ALTER TABLE `lr_gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `lr_gallery_images`
--
ALTER TABLE `lr_gallery_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `lr_migrations`
--
ALTER TABLE `lr_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `lr_modules`
--
ALTER TABLE `lr_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `lr_news`
--
ALTER TABLE `lr_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `lr_permissions`
--
ALTER TABLE `lr_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `lr_permission_roles`
--
ALTER TABLE `lr_permission_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `lr_roles`
--
ALTER TABLE `lr_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `lr_settings`
--
ALTER TABLE `lr_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `lr_sliders`
--
ALTER TABLE `lr_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `lr_statistics_search_words`
--
ALTER TABLE `lr_statistics_search_words`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `lr_tree`
--
ALTER TABLE `lr_tree`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `lr_users`
--
ALTER TABLE `lr_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `lr_widgets`
--
ALTER TABLE `lr_widgets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `lr_gallery_images`
--
ALTER TABLE `lr_gallery_images`
  ADD CONSTRAINT `gallery_images_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `lr_gallery` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `lr_permission_roles`
--
ALTER TABLE `lr_permission_roles`
  ADD CONSTRAINT `permission_roles_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `lr_permissions` (`id`),
  ADD CONSTRAINT `permission_roles_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `lr_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
