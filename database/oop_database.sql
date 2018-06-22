-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 23/06/2018 às 01:44
-- Versão do servidor: 5.7.22-0ubuntu18.04.1
-- Versão do PHP: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oop_database`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note_title` varchar(255) DEFAULT NULL,
  `note_content` text NOT NULL,
  `label_id` int(11) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `note_title`, `note_content`, `label_id`, `date_added`) VALUES
(5, 2, 'Test by the user Tesla', 'Now that I already tested the app with my user, it\'s time to test it with another one. Let\'s see how it goes.', NULL, '2018-06-01 11:42:02'),
(7, 1, 'Test 1', 'Another test.<br />\r\n<br />\r\nTesting break line.<br />\r\n<br />\r\nAgain.<br />\r\n<br />\r\n', NULL, '2018-06-01 11:48:48'),
(8, 1, 'Working', 'Now the break line functionality is working. I can press enter and it will be displayed when the user sees the note. Take a look:<br />\r\n<br />\r\nhehe. Good job buddy.', NULL, '2018-06-01 11:51:08'),
(9, 1, 'Styling', 'I implemented the styling of the notes. There you go...', NULL, '2018-06-01 12:04:14'),
(10, 1, 'EstÃ¡ indo de acordo com o esperado', 'Ã‰, aparentemente o aplicativo estÃ¡ funcionando como deveria. Falta implementar coisas como categorias, pesquisa, editar e excluir notas, etc. PorÃ©m, por enquanto estÃ¡ legal atÃ©.', NULL, '2018-06-01 12:09:46'),
(12, 1, 'Oort Cloud - Wikipedia', 'The Oort cloud,  named after the Dutch astronomer Jan Oort, sometimes called the Ã–pikâ€“Oort cloud, is a theoretical cloud of predominantly icy planetesimals proposed to surround the Sun at distances ranging from 50,000 and 200,000 AU (0.8 and 3.2 ly). It is divided into two regions: a disc-shaped inner Oort cloud (or Hills cloud) and a spherical outer Oort cloud. Both regions lie beyond the heliosphere and in interstellar space. The Kuiper belt and the scattered disc, the other two reservoirs of trans-Neptunian objects, are less than one thousandth as far from the Sun as the Oort cloud.<br />\r\n<br />\r\nThis is another test. The problem, though, is that is really slow. I don\'t know why. I have to find out why. <br />\r\n<br />\r\n#Update:<br />\r\nI finally figure out. The problem was the spellcheck: you have to set its value to false. Now, it\'s all smoth and fast! hehe', NULL, '2018-06-01 17:27:35'),
(20, 1, 'Up and running', 'Now the app is pretty much done - I mean, the logic part of it. The user interface is still pretty shity. But, you already can add notes, edit them and exclude them. You can create an account and login and have all your notes saved in the app. Yeah, I wrote a lot of things but some error occour and they were deleted. Ok then... Let\'s see how it goes.', NULL, '2018-06-02 10:48:02'),
(21, 1, 'Update', 'Now the app has some colors going on. Today I finished the process of re-coding the update_profile_img app using Object Oriented Programming. It\'s pretty decent. With it, I have already 4 projects with OOP PHP. I want to finish at least 5 projects to move on to learn to use JavaScript in the back-end (Node.js). ', NULL, '2018-06-02 16:10:50'),
(28, 1, 'Here I\'m again', 'Checking the app again. Today, 05/06/18, I created the 5th project using the PHP language. I created a form that saves the text and resume inserted from a user to a server. It can be used (and it\'s already used) for employers to gather information about possible/future employees. Now that I finished it, I will watch a series of videos on Laravel by Brad from Traversy media - a great website to learn a lot a stuff related to web development.', NULL, '2018-06-05 16:27:13'),
(29, 1, 'Update in Ubuntu', 'Nice.. I\'m using Ubuntu right now and right in this moment I just finished the migration of the database from win10 to Ubuntu just to learn how it\'s done. So far it all worked. I have all my notes I wrote. Let\'s see if everything is here.', NULL, '2018-06-07 22:30:55'),
(30, 5, 'Que legal', 'Agora posso escrever coisas!', NULL, '2018-06-09 17:25:12'),
(31, 1, 'Testing vulnerabilities of network safety', 'I\'m know aware of the command tcpdump on linux that allows you to see the trafic of data passing through the router. Right now I was able to see the password I just typed in to login! Holy shit. That\'s why you need to ensure security on the internet. Otherwise, all of your data can be seen by whoever wants it.', NULL, '2018-06-12 13:19:56'),
(48, 1, 'Using AJAX to add notes', 'Now the user can add notes without the website reaload the page. It\'s pretty fast and it will remove the data from the input as soon as the user clicks the add note button. It\'s pretty awesome!', NULL, '2018-06-14 12:53:04'),
(49, 1, 'IT industry and plans', 'I just had, this week, three interviews with three different companies in the TI business. I apply just to see how could it go and the response I would get. If everything goes wrong, and my carrer in physics don\'t go where I expect to, I can enter the web development industry to save money and try again. I really don\'t know what is going to happen. But in september my classes begin. I still don\'t know how to get 300 euros to cover my expense (rent and university), but I will try to do some freelancing in web development or other things. I have to get this money somehow. We will see how it goes...', NULL, '2018-06-22 20:19:27'),
(113, 1, 'Improvements in the app', 'Today I added some features into the website. Here are some of them: <br />\r\n1) Made sure that the web app is usable in mobile devices.<br />\r\n2) Added the possibility to delete notes using AJAX.<br />\r\n3) Added loading animation in the authentication.<br />\r\n<br />\r\nThere\'s a lot of things to implement. But, for now, the app runs fine. Will add more features in the future.', NULL, '2018-06-22 22:29:15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`) VALUES
(1, 'Weslley', 'Victor', 'wvict', 'wvictor07@gmail.com', '$2y$10$Pi5Qxe1QNgIdGEJW8lGxCuuI5sp/wsZRqCif5nZullvL8ETf8H7Ge'),
(2, 'Nikola', 'Tesla', 'tesla', 'tesla@gmail.com', '$2y$10$wTrOjfCmYFwiShWEGTOfzO4Xi8GYiZRdrZNFjhGwrUBUEbo3BBgI.'),
(4, 'Wellyson', 'Vieira', 'wgabriel0763', 'wgabriel0763@gmail.com', '$2y$10$TeliGVpu2vDwsYsnNuFasO8hzrXYN9ZMW8qr7QY0jffz0R1PYLvCm'),
(5, 'Miriam', 'GonÃ§alves', 'Miry', 'mirygcv@gmail.com', '$2y$10$pSEs.EqI85pRKTv1qLIc8u22liEjH6bCeyY4uivSU0E57Rf4feC7C'),
(6, 'Pedrin', 'PÃ© de mula', 'Pedrinpm12', 'wgabriel0763@gmail.com', '$2y$10$teONeRdTGVO1IH3MdnruOOu0odYkkm/VNdMHxVmOVLL1o80RlgiSu'),
(7, 'User', 'Test', 'test', 'test@test.com', '$2y$10$/rOXX8M42AgZeVJwGOJC..RydezdEo1EOlBKITu/14UiEzrw6vdye'),
(8, 'User', 'Lastname', 'user', 'user@hotmail.com', '$2y$10$XKVh.qQ15bE9csoTuQ2tH./GwxHGlQ0IPy/JIjmsFtSqp.MuCWWYG');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
