-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28/06/2018 às 19:50
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
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_created` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `note_title`, `note_content`, `label_id`, `date_added`, `date_created`) VALUES
(5, 2, 'Test by the user Tesla', 'Now that I already tested the app with my user, it\'s time to test it with another one. Let\'s see how it goes.', NULL, '2018-06-01 11:42:02', NULL),
(7, 1, 'Test 1', 'Another test.<br />\r\n<br />\r\nTesting break line.<br />\r\n<br />\r\nAgain.<br />\r\n<br />\r\n', NULL, '2018-06-01 11:48:48', NULL),
(8, 1, 'Working', 'Now the break line functionality is working. I can press enter and it will be displayed when the user sees the note. Take a look:<br />\r\n<br />\r\nhehe. Good job buddy.', NULL, '2018-06-01 11:51:08', NULL),
(9, 1, 'Styling', 'I implemented the styling of the notes. There you go...', NULL, '2018-06-01 12:04:14', NULL),
(10, 1, 'EstÃ¡ indo de acordo com o esperado', 'Ã‰, aparentemente o aplicativo estÃ¡ funcionando como deveria. Falta implementar coisas como categorias, pesquisa, editar e excluir notas, etc. PorÃ©m, por enquanto estÃ¡ legal atÃ©.', NULL, '2018-06-01 12:09:46', NULL),
(12, 1, 'Oort Cloud - Wikipedia', 'The Oort cloud,  named after the Dutch astronomer Jan Oort, sometimes called the Ã–pikâ€“Oort cloud, is a theoretical cloud of predominantly icy planetesimals proposed to surround the Sun at distances ranging from 50,000 and 200,000 AU (0.8 and 3.2 ly). It is divided into two regions: a disc-shaped inner Oort cloud (or Hills cloud) and a spherical outer Oort cloud. Both regions lie beyond the heliosphere and in interstellar space. The Kuiper belt and the scattered disc, the other two reservoirs of trans-Neptunian objects, are less than one thousandth as far from the Sun as the Oort cloud.<br />\r\n<br />\r\nThis is another test. The problem, though, is that is really slow. I don\'t know why. I have to find out why. <br />\r\n<br />\r\n#Update:<br />\r\nI finally figure out. The problem was the spellcheck: you have to set its value to false. Now, it\'s all smoth and fast! hehe', NULL, '2018-06-01 17:27:35', NULL),
(20, 1, 'Up and running', 'Now the app is pretty much done - I mean, the logic part of it. The user interface is still pretty shity. But, you already can add notes, edit them and exclude them. You can create an account and login and have all your notes saved in the app. Yeah, I wrote a lot of things but some error occour and they were deleted. Ok then... Let\'s see how it goes.', NULL, '2018-06-02 10:48:02', NULL),
(21, 1, 'Update', 'Now the app has some colors going on. Today I finished the process of re-coding the update_profile_img app using Object Oriented Programming. It\'s pretty decent. With it, I have already 4 projects with OOP PHP. I want to finish at least 5 projects to move on to learn to use JavaScript in the back-end (Node.js). ', NULL, '2018-06-02 16:10:50', NULL),
(28, 1, 'Here I\'m again', 'Checking the app again. Today, 05/06/18, I created the 5th project using the PHP language. I created a form that saves the text and resume inserted from a user to a server. It can be used (and it\'s already used) for employers to gather information about possible/future employees. Now that I finished it, I will watch a series of videos on Laravel by Brad from Traversy media - a great website to learn a lot a stuff related to web development.', NULL, '2018-06-05 16:27:13', NULL),
(29, 1, 'Update in Ubuntu', 'Nice.. I\'m using Ubuntu right now and right in this moment I just finished the migration of the database from win10 to Ubuntu just to learn how it\'s done. So far it all worked. I have all my notes I wrote. Let\'s see if everything is here.', NULL, '2018-06-07 22:30:55', NULL),
(30, 5, 'Que legal', 'Agora posso escrever coisas!', NULL, '2018-06-09 17:25:12', NULL),
(31, 1, 'Testing vulnerabilities of network safety', 'I\'m know aware of the command tcpdump on linux that allows you to see the trafic of data passing through the router. Right now I was able to see the password I just typed in to login! Holy shit. That\'s why you need to ensure security on the internet. Otherwise, all of your data can be seen by whoever wants it.', NULL, '2018-06-12 13:19:56', NULL),
(48, 1, 'Using AJAX to add notes', 'Now the user can add notes without the website reaload the page. It\'s pretty fast and it will remove the data from the input as soon as the user clicks the add note button. It\'s pretty awesome!', NULL, '2018-06-14 12:53:04', NULL),
(49, 1, 'IT industry and plans', 'I just had, this week, three interviews with three different companies in the TI business. I apply just to see how could it go and the response I would get. If everything goes wrong, and my carrer in physics don\'t go where I expect to, I can enter the web development industry to save money and try again. I really don\'t know what is going to happen. But in september my classes begin. I still don\'t know how to get 300 euros to cover my expense (rent and university), but I will try to do some freelancing in web development or other things. I have to get this money somehow. We will see how it goes...', NULL, '2018-06-22 20:19:27', NULL),
(113, 1, 'Improvements in the app', 'Today I added some features into the website. Here are some of them: <br />\r\n1) Made sure that the web app is usable in mobile devices.<br />\r\n2) Added the possibility to delete notes using AJAX.<br />\r\n3) Added loading animation in the authentication.<br />\r\n<br />\r\nThere\'s a lot of things to implement. But, for now, the app runs fine. Will add more features in the future.', NULL, '2018-06-22 22:29:15', NULL),
(120, 1, 'Some improvements I have to do', 'I have to add a navbar in the web app containing a place to search notes and an area to see personal information. The logout button will also be there. I also have to create a modal to edit the note on it. After that, I think the improvements need to be in the desing of the app and then the mobile experience...', NULL, '2018-06-25 20:27:17', NULL),
(122, 1, 'About the application and the data from DB.', 'I think I can store information and some notes here. Nobody but me has access to the database. Actually, I put it inside my GitHub account. Got to delete that later and leave only the schema for notes and users there. What I can do is to save in Google drive the actual data.', NULL, '2018-06-25 16:45:19', NULL),
(126, 1, 'Improvements in the app #2', 'Today, 25/06, I was able to implement some functionalities in the website. One of them was the modal that it is now displayed when the user wants to edit a note. It opens the edit section without reloading the page using AJAX and Javascript.  Right now, I have to insert manually the note\'s id in the code. However, I have to find a way to display the edit section for each note and, when the changes are made, the app needs to update both in the database and in the client side as well. I\'m thinking in some ways to implement that.', NULL, '2018-06-25 16:25:49', NULL),
(127, 1, 'Testing the editing functionality', 'Right now I was able to implement the edit feature. That means that everytime the user clicks in a note, it will open the edit modal. It already saves the changes and all. The only thing I have to change is to make it change both in the database and in the browser when the user saves the changes without reloading the page. I will do this later. Now I\'ll update the update\'s file. (got it? hehehe)<br />\r\n', NULL, '2018-06-26 23:06:46', NULL),
(162, 1, 'Some tansitions going on...', 'Today, 26/06, I added some transitions into the web app. Now, whenever the user adds a new note, or hover the mouse on top of it, it will display some transitions. I also added some shadows as well...', NULL, '2018-06-26 16:47:57', NULL),
(165, 1, 'Implemented more features', 'I am becoming more experienced with javascript while creating this web application. Right now, it has some interesting animations and interactions. The notes already are inside modals, when the user clicks to add a new note the title appears and the note becomes bigger, and so on. More on the implemented features in the update file. By the way,  I have to update it. (:D)', NULL, '2018-06-26 21:04:53', NULL),
(170, 1, 'NAT (Network address translation) ', 'Eu acabei de descobrir o que Ã© o chamado NAT e o papel que este desempenha na internet. Como o nÃºmero de IP Ã© limitado (cerca de 4.2 bilhÃµes), Ã© necessÃ¡rio achar uma forma de pelo menos temporariamente resolver o problema. O NAT serve para isso. Quando um dispositivo de uma rede local faz um request para um domÃ­nio na internet (com um IP pÃºblico), o router faz a transiÃ§Ã£o do endereÃ§o local para o pÃºblico (apenas um IP que Ã© o do router em si) e, sÃ³ entÃ£o, faz a requisiÃ§Ã£o para a internet. Vamos supor que o dispositivo com IP local 192.168.1.161 faz uma requisiÃ§Ã£o para o google.com. O router transforma esse IP local, que requere a pÃ¡gina do google em determinada porta (vamos supor 6510 - nÃºmero aleatÃ³rio). <br />\r\n<br />\r\nEntÃ£o, a requisiÃ§Ã£o vem do dispositivo 192.168.1.161:6510. O router converte esse nÃºmero em 87.115.64.25 que Ã© o IP pÃºblico que utiliza para se comunicar com a internet. Para isso, aquele IP privado Ã© transformado em 87.115.64.25:54198 (outra porta) e esses dados sÃ£o armazenados no que Ã© chamado de NAT forwarding table. Assim, quando os dados voltarem do servidor do google, o router vai saber para qual dispositivo mandar esses dados, requisitando, logo, essa tabela. Ã‰ assim que os routers conseguem funcionar utilizando apenas um IP pÃºblico. A nova versÃ£o do IP (IP v6) vem resolver esse problema utilizando 128 bits de dados (o que dÃ¡ 3,4*10^28, uma caralhada de endereÃ§os de internet - em comparaÃ§Ã£o com os 4 bilhÃµes da versÃ£o 4).<br />\r\nÃ‰ por isso se eu tentar acessar o meu endereÃ§o de internet pÃºblico, o browser Ã© direcionado Ã  pÃ¡gina do router (que no IP privado Ã© 192.168.1.1) e nÃ£o tem como eu acessar meu servidor local (atÃ© agora, vou ver se isso Ã© possÃ­vel). Outra coisa que aprendi foi sobre o DHCP (Dynamic Host Configuration Protocol), o qual dÃ¡ a cada dispositivo conectado na rede um IP local Ãºnico, sem precisar que o sys admin faÃ§a isso manualmente!', NULL, '2018-06-27 02:05:49', 'June 27, 2018'),
(171, 1, 'Going back to BookList', 'Today I\'m improving some of the functionalities of BookList (I need to come up with a better name ;D). I already added a new font and made a few things look better. Now I\'m going to add some animations to the notes. I also need to edit the index page - it\'s ugly as hell right now. Yeah, let\'s see how it goes.', NULL, '2018-06-27 11:48:40', 'June 27, 2018'),
(173, 1, 'There\'s a bug I need to fix', 'When the first note is added, it is not displayed in the browser without reloading. Have to fix this...', NULL, '2018-06-27 11:49:42', 'June 27, 2018'),
(174, 1, 'Thoughts on the web application and what I want to focus on.', 'The Notes app is pretty decent. I need to find a good color palette to use in the design though. I\'m not good on that stuff (of course I could always learn, but I\'m not interested in.. Maybe becouse I want to focus on the back-end and in the security part of the internet).', NULL, '2018-06-27 16:56:52', 'June 27, 2018'),
(182, 9, 'kjdkd', 'iieirurieoe', NULL, '2018-06-27 21:26:52', 'June 27, 2018'),
(186, 1, 'Added some colors', 'Today I added colors to the web app. I choose the color green since the icon is already in green. I changed the body background color as well and used a some what platinum color. I think it\'s dope. Now I need to change the note\'s color when editing it inside the modal. Will do this right now...<br />\r\n<br />\r\n#Update<br />\r\nI changed the modal\'s color to a more bright green. I don\'t know if it\'s that good, maybe I\'ll change it later.', NULL, '2018-06-28 13:43:56', 'June 28, 2018'),
(187, 1, 'EstratÃ©gias futuras - estudos.', 'Faltam cerca de 2 meses para o inÃ­cio das Ã¡ulas. Ainda nÃ£o tenho recursos financeiros suficientes para pagar o aluguel em porto. Uma alternativa Ã© vender tudo o que eu conseguir lÃ¡ em sinop e juntar o mÃ¡ximo que eu puder. Eu posso vender o violÃ£o, os livros, alguns mÃ³veis - irei focar, entretanto, no que Ã© meu, ou que Ã©, em parte, meu. Irei comeÃ§ar a fazer isso no final do mÃªs de julho. TambÃ©m tenho procurar quartos para alugar em porto. Irei fazer isso na metade do mÃªs de agosto.', NULL, '2018-06-28 15:15:01', 'June 28, 2018');

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
(5, 'Miriam', 'GonÃ§alves', 'Miry', 'mirygcv@gmail.com', '$2y$10$pSEs.EqI85pRKTv1qLIc8u22liEjH6bCeyY4uivSU0E57Rf4feC7C'),
(9, 'Wellyson', 'Vieira', 'wgabriel0763', 'wgabriel0763@gmail.com', '$2y$10$qB53.FCtipgpP6gdCO6ZVeGPb90fsJddtz3cxPX4sf8hhHUF9dqhK');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
