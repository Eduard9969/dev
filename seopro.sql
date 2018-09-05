-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 24 2018 г., 03:59
-- Версия сервера: 5.6.22-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `seopro`
--

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `site_id` int(11) NOT NULL,
  `supp_group` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `maker` int(11) NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `archive_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `name`, `site_id`, `supp_group`, `manager_id`, `maker`, `status`, `archive_status`) VALUES
(1, 'Проект | Rushautо', 5, 1, 3, 1, 1, 0),
(2, 'Проект | Kn', 2, 2, 3, 2, 2, 0),
(3, 'Проект | Autofresh', 1, 3, 3, 1, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `projects_overrides`
--

CREATE TABLE IF NOT EXISTS `projects_overrides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `projects_overrides`
--

INSERT INTO `projects_overrides` (`id`, `project_id`, `user_id`) VALUES
(1, 1, 1),
(4, 2, 1),
(5, 3, 1),
(6, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `archive_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `sites`
--

INSERT INTO `sites` (`id`, `name`, `url`, `archive_status`, `user_id`) VALUES
(1, 'Autofresh', 'http://autofresh.pro', 0, 1),
(2, 'Kn Pstu', 'http://kn.pstu.edu', 0, 1),
(3, 'Pstu', 'http://pstu.edu', 0, 3),
(4, 'Newprobeg', 'http://newprobeg.ru', 0, 1),
(5, 'Rushauto', 'http://rushauto.ru', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `specialty`
--

CREATE TABLE IF NOT EXISTS `specialty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `specialty`
--

INSERT INTO `specialty` (`id`, `name`) VALUES
(1, 'Менеджер'),
(2, 'Фронтенд'),
(3, 'Бэкенд'),
(4, 'Seo-Специалист'),
(5, 'Ux-Специалист');

-- --------------------------------------------------------

--
-- Структура таблицы `supp_group`
--

CREATE TABLE IF NOT EXISTS `supp_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `members` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `supp_group`
--

INSERT INTO `supp_group` (`id`, `name`, `members`) VALUES
(1, 'Группа | Rushauto', 'YToxOntpOjA7czoxOiIxIjt9'),
(2, 'Группа | Kn', 'YToyOntpOjA7czoxOiIyIjtpOjE7czoxOiIxIjt9'),
(3, 'Группа | Autofresh', 'YToyOntpOjA7czoxOiIxIjtpOjE7czoxOiIyIjt9');

-- --------------------------------------------------------

--
-- Структура таблицы `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type_test` int(11) NOT NULL,
  `test_group` int(11) NOT NULL,
  `count_testers` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `date_init` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `tests`
--

INSERT INTO `tests` (`id`, `name`, `type_test`, `test_group`, `count_testers`, `project_id`, `date_init`, `status`) VALUES
(1, 'Тестирование юзабилити', 1, 0, 0, 3, '1526990622', 1),
(2, 'Тестирование', 1, 0, 0, 3, '1527012730', 1),
(6, 'Тестирование №2. Повтор', 1, 0, 0, 1, '1527068565', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tests_auto`
--

CREATE TABLE IF NOT EXISTS `tests_auto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(11) NOT NULL,
  `path_name` varchar(250) NOT NULL,
  `test_auth` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `tests_auto`
--

INSERT INTO `tests_auto` (`id`, `test_id`, `path_name`, `test_auth`) VALUES
(1, 1, 'test_result_1_yKRZtcKT', 'yKRZtcKT'),
(2, 2, 'test_result_3_u6SsjkkK', 'u6SsjkkK'),
(6, 6, 'test_result_1_t0jyLSu1', 't0jyLSu1');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `about_text` varchar(200) NOT NULL,
  `status_text` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(75) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `time_code` varchar(100) NOT NULL,
  `specialty` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `about_text`, `status_text`, `phone`, `username`, `email`, `pass`, `salt`, `time_code`, `specialty`, `ref`) VALUES
(1, 'Эдуард', 'Самойленко', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morby id neque quam. Aliquam sollicitudin venenatis ipsum ac feugiat. Vestibulum ullamcorper sodales nisi nec \r\ncondimentum', 'Да прибудет со мной сила', '0982015696', 'baha2705', 'eduard9969@gmail.com', '4e865cf10dc78bbcafc993cc11280e7e', 'W];P''5mq', '', 2, 0),
(2, 'Твой', 'Диплом', 'Я определенно существую. Веруй в меня!', '', '', 'demo', 'demo@demo.com', '56b0618b1ddc6eb848599b1143dbb5b4', 'rI*o^yDE', '', 0, 0),
(3, 'Менеджер', 'Менеджер', 'Я демо менеджер', '#Русалочкаживи', '', 'manager', 'manager@manager.manager', '8312bb0f13f698cff48efe5b2e6b43e5', 'A^/8}(Y>', '', 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_overrides`
--

CREATE TABLE IF NOT EXISTS `users_overrides` (
  `user_id` int(10) unsigned NOT NULL,
  `user_group` int(10) unsigned NOT NULL,
  `access` int(10) unsigned NOT NULL,
  `reg_day` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_overrides`
--

INSERT INTO `users_overrides` (`user_id`, `user_group`, `access`, `reg_day`) VALUES
(1, 2, 1, 1525977003),
(2, 2, 2, 1526314327),
(3, 2, 1, 1526557221);

-- --------------------------------------------------------

--
-- Структура таблицы `users_social`
--

CREATE TABLE IF NOT EXISTS `users_social` (
  `user_id` int(10) unsigned NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `google` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `color_select` varchar(25) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_social`
--

INSERT INTO `users_social` (`user_id`, `facebook`, `twitter`, `google`, `linkedin`, `color_select`) VALUES
(1, 'miste.zealot', 'BTS_twt', '', 'kate-belevanceva-483b25153/', 'blue-grey'),
(2, '', '', '', '', 'indigo'),
(3, 'miste.zealot', 'kate-belevanceva-483b25153/', 'miste.zealot', 'miste.zealot', 'yellow');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
