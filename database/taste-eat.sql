-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql313.byetcluster.com
-- Generation Time: Mar 15, 2024 at 08:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_36147641_taste_eat`
--

-- --------------------------------------------------------

--
-- Table structure for table `cancelation_time`
--

CREATE TABLE `cancelation_time` (
  `cancelation_id` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cancelation_time`
--

INSERT INTO `cancelation_time` (`cancelation_id`, `time`) VALUES
('65f094230947f', '10');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category`) VALUES
('65f43f782d20a', 'Italian'),
('65f43f7b2f501', 'Maxican'),
('65f43f7ddd22a', 'Chinese'),
('65f43f80a98b3', 'Indian'),
('65f43f83a1d93', 'Desert');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `user_name`, `email`, `date`, `subject`, `description`) VALUES
('65f442d72ac2b', 'Rock', 'rock1star14@gmail.com', '2024-03-15', 'Email wrong : Urgent ', 'I was entered wrong email at time of registration in your website.\r\n\r\nMy Current E-mail Id Is rock1star14@gmail.com .\r\n\r\nPlease fix it as soon as possible because I\'m not getting email of forgot password and i want to change my password.');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `issue_id` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`issue_id`, `user_name`, `email`, `date`, `subject`, `description`) VALUES
('65f441ac8bd3a', 'Rock', 'rock1star14@gmail.com', '2024-03-15', 'Food Delivery!', 'My order is still not delivered. I ordered since last half and hour ago. \r\n\r\nPlease do something!');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `category` varchar(250) NOT NULL,
  `item_image` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `category`, `item_image`, `price`, `description`) VALUES
('65ec16162181a', 'Taco', 'Maxican', '65ec161621825m1-Taco.jpg', '51', 'A traditional Mexican dish consisting of a folded or rolled tortilla filled with various ingredients, such as seasoned meat, beans, cheese, lettuce, and salsa. Tacos are typically served hot and are known for their flavorful and satisfying taste.'),
('65ec16462d822', 'Burrito', 'Maxican', '65ec16462d82am2-Burrito.jpg', '42', 'A popular Mexican dish made with a flour tortilla wrapped or folded around a filling, typically including rice, beans, meat (such as beef, chicken, or pork), cheese, and salsa. Burritos are hearty and portable, making them a convenient and tasty meal'),
('65ec168f41e20', 'Hakka Noodles', 'Chinese', '65ec168f41e25c1-Hakka Noodles.jpg', '63', 'A Chinese-inspired dish made with stir-fried noodles, vegetables, and sometimes meat or seafood. Hakka noodles are known for their savory and slightly spicy flavor, along with their long, slurp-worthy noodles.'),
('65ec16d59b7d1', 'Manchow Soup', 'Chinese', '65ec16d59b7d6c2-Manchow Soup.jpg', '35', 'A spicy and flavorful soup originating from Chinese cuisine but popular in many parts of the world. Manchow soup is typically made with vegetables, chicken, or shrimp, along with a variety of seasonings and spices, creating a rich and aromatic broth.'),
('65ec170d25492', 'Pizza', 'Italian', '65ec170d25497i1-Pizza.jpg', '50', 'A beloved Italian dish consisting of a round, flattened base of dough topped with tomato sauce, cheese, and various toppings, such as pepperoni, mushrooms, onions, and peppers. Pizza is baked in an oven until the crust is crisp and the cheese is melt'),
('65ec173f8b0e3', 'Pasta', 'Italian', '65ec173f8b0e9i2-Pasta.jpg', '66', 'A versatile Italian dish made with durum wheat flour and water, formed into various shapes and sizes, then cooked and served with a sauce. Pasta dishes can include a wide range of ingredients, such as tomatoes, garlic, olive oil, cheese, and various '),
('65ec179cb82e1', 'Chilaquiles', 'Maxican', '65ec179cb82ebm3-Mexican Chilaquiles.jpg', '70', 'A classic Mexican breakfast dish made from fried or toasted corn tortilla triangles (totopos) soaked in red or green hot sauce. They’re topped with shredded chicken, chorizo, beef, scrambled eggs, or a sunny-side-up egg3.'),
('65ec1800a3c8b', 'Mexican Rice (Arroz Mexicano)', 'Maxican', '65ec1800a3c96m4-Mexican Rice (Arroz Mexicano).jpg', '65', 'It looks and tastes similar to India’s vegetable pulao. Mexican cuisine relies heavily on tomatoes and corn, which gives their rice dishes a familiar flavor1.'),
('65ec18413e204', 'Salsas (Chutneys)', 'Maxican', '65ec18413e20bm5-Salsas (Chutneys).jpg', '44', 'The ingredients and preparation style are vaguely similar. Both cuisines use mortar and pestle to create flavorful condiments1.'),
('65ec189b482d3', 'Corn Tortilla (Tortilla de Maíz)', 'Maxican', '65ec189b482d9m6-Corn Tortilla.jpg', '56', 'Similar to our makke di roti, these tortillas are made from corn and are often paired with spicy dishes1.'),
('65ec18d4a609c', 'Chicken Manchurian', 'Chinese', '65ec18d4a60a7c3-Chicken Manchurian.jpg', '75', 'Created by the chef of China Garden in Mumbai around 1975, Chicken Manchurian combines ingredients like garlic, chilli, and ginger. The occasional use of garam masala was replaced with soy sauce. It became so popular that variations were attempted wi'),
('65ec1910116b4', 'Chowmein', 'Chinese', '65ec1910116bbc4-Chowmein.jpg', '76', 'A common dish in both China and India, chowmein takes different forms. In India, it’s stir-fried with boiled noodles, soy sauce, vinegar, and sometimes MSG, resulting in a flavorful and satisfying dish1.'),
('65ec193c69752', 'Schezuan Chicken', 'Chinese', '65ec193c6975cc5-Schezuan Chicken.jpg', '57', 'Schezuan Chicken: Known for its fiery spiciness, Schezuan chicken features dry red chillies, garlic, and ginger1.'),
('65ec197f4f6e8', 'Spring Rolls', 'Chinese', '65ec197f4f6edc6-Spring Rolls.jpg', '57', 'This is actually a type of dumpling, popularised from the Cantonese style of cooking and is prepared to welcome the season of spring. In India, they are fried till are golden are filled with Julienne cut pieces of vegetables.'),
('65ec19e15d6ba', 'Risotto', 'Italian', '65ec19e15d6c0i3-Risotto.jpg', '58', 'A creamy and rich rice dish, risotto hails from northern Italy. It’s prepared with rice varieties like Arborio, Carnaroli, or Vialone, slowly cooked in flavorful broth. Variations include “risotto alla milanese,” which features saffron, Parmesan chee'),
('65ec1a21c8404', 'Lasagne', 'Italian', '65ec1a21c840ai4-Lasagne.jpg', '59', 'Another cornerstone of Italian cuisine is lasagne. This baked dish, typical of Bologna, is made up of layers of fresh pasta covered in béchamel sauce and the famous “ragù bolognese.”\r\nA sauce composed of sautéed celery, onion, and carrot to which pie'),
('65ec1a59762e8', 'Prosciutto di Parma (Parma Ham)', 'Italian', '65ec1a59762f1i5-Prosciutto di Parma (Parma Ham).jpg', '67', 'Italy is the kingdom of cured meats. Among the famous mortadella, salami, coppa, and culatello, the cured raw ham stands out, usually served as an appetizer. It is also excellent as a snack in a sandwich or as a main course, cut into thin slices and '),
('65ec1a90151bb', 'Ribollita', 'Italian', '65ec1a90151c7i6-Ribollita.jpg', '68', 'Originally from Tuscany, ribollita is a rural soup, a symbol of poor people’s cuisine, which dates back to the Middle Ages. The story goes that in those days, the peasant families were numerous and could not afford meat, so they prepared soups in lar'),
('65ec1b262fcb4', 'Idli', 'Indian', '65ec1b262fcbdin1-Idli.jpg', '72', 'Idli, also known as idly, is a variety of savory rice cake that finds its roots in the Indian subcontinent. It has gained immense popularity as a breakfast staple in Southern India and Sri Lanka.'),
('65ec1b6cc7e54', 'Chole Bhature', 'Indian', '65ec1b6cc7e5ain2-Chole Bhature.jpg', '73', 'Be warned! This sumptuous dish is best enjoyed on an empty stomach! Rich, spicy and heavy, Chole bhature is one of the most popular Punjabi dishes and is a must-try it!'),
('65ec1bc58de5c', 'Dhokla', 'Indian', '65ec1bc58de62in3-Dhokla.jpg', '74', 'Originating from the state of Gujarat, dhokla is a steamed savory cake made from fermented rice and chickpea flour. It’s light, spongy, and typically served with green chutney.'),
('65ec1c09467c0', 'Paneer Tikka', 'Indian', '65ec1c09467ccin4-Paneer tikka.jpg', '75', 'Paneer Tikka is the most ordered vegetarian starter or appetizer in Indian restaurants. This dish is made by marinating Indian cheese in spiced yogurt and then grilled to perfection. Originally tikkas were grilled in tandoor, a clay oven which infuse'),
('65ec1c3b65008', 'Vada Pav', 'Indian', '65ec1c3b6500ein5-Vada Pav.jpg', '76', 'Known as the “Indian burger,” vada pav consists of a spicy potato fritter (vada) sandwiched between a pav (soft bread roll). It’s a beloved street food in Mumbai.'),
('65ec1ca84e42c', 'Pani Puri', 'Indian', '65ec1ca84e431in6-Pani Puri.jpg', '88', 'Pani puri (pānī pūrī ) is a deep-fried breaded sphere filled with potato, onion, or chickpea. It is a common street food in the Indian subcontinent. It is often spiced with tamarind chutney, chili powder, or chaat masala.'),
('65ec1d15138ea', 'Makroud el Louse (Algeria)', 'Desert', '65ec1d15138f0d1-Makroud el Louse (Algeria).jpg', '81', 'These flourless Algerian cookies are made with almonds, eggs, sugar, and a hint of orange flower water.\r\nBaked until lightly browned, they are then coated in powdered sugar.\r\nBest enjoyed with a cup of tea or coffee1.'),
('65ec1d4a28ca6', 'Pastel de Nata (Lisbon, Portugal)', 'Desert', '65ec1d4a28cacd2-Pastel de Nata (Lisbon, Portugal).jpg', '80', 'A traditional Portuguese egg custard tart with a flaky pastry shell.\r\nThe filling is not overly sweet and is sprinkled with cinnamon.\r\nOriginally created by Catholic monks and nuns in Lisbon, it’s now popular worldwide1.'),
('65ec1d9522edc', 'Pastel de Belém (Belém, Portugal)', 'Desert', '65ec1d9522ee2d3-Pastel de Belem.jpg', '82', 'A predecessor to pastel de nata, these tarts have a custard filling flavored with lemon and cinnamon.\r\nOnly those produced at Fábrica Pastéis de Belém can be called pastel de Belém.\r\nServed hot or cold, it’s a Portuguese delight1.'),
('65ec1dbb31769', 'Petticoat Tails (Scotland)', 'Desert', '65ec1dbb3176fd4-Petticoat Tails (Scotland).jpg', '83', 'These sweet, buttery shortbread biscuits resemble the fabric used for 16th-century petticoats.\r\nNamed after Mary Queen of Scots’ elaborate petticoats, they remain a Scottish favorite1.'),
('65ec1df7064ac', 'Sfogliatelle (Naples, Italy)', 'Desert', '65ec1df7064b2d5-Sfogliatelle (Naples, Italy).jpg', '85', 'Flakey, layered pastries filled with ricotta cheese, sugar, and citrus zest.\r\nA delightful treat that’s crispy on the outside and creamy inside2.'),
('65ec1e2a1d542', 'Baklava (Middle East)', 'Desert', '65ec1e2a1d54bd6-Baklava (Middle East).jpg', '88', 'A rich, sweet pastry made of layers of phyllo dough, butter, and chopped nuts (usually walnuts or pistachios).\r\nDrenched in honey or sugar syrup, it’s a beloved dessert across the Middle East and beyond3.');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `time` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_name`, `email`, `item_name`, `quantity`, `price`, `address`, `date`, `time`) VALUES
('65f441035a679', 'Rock', 'rock1star14@gmail.com', 'Taco', '2', '102', 'https://www.google.com/maps/place/22.243156,70.9022335', '2024-03-15', '08:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user` varchar(250) NOT NULL,
  `profilepic` varchar(250) NOT NULL,
  `token` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`username`, `email`, `password`, `user`, `profilepic`, `token`) VALUES
('Jigar', 'jkalariya487@rku.ac.in', '1234567@Jj', 'user', '65ef71a91b481JP.jpg', '65e9dc0eee7b5'),
('Rock', 'rock1star14@gmail.com', '1234567@Rr', 'user', '65f44034c4fd3Picsart_23-11-09_16-31-26-759.jpg', '65f0b65e7953a'),
('Admin', 'admin@gmail.com', '123456#Admin', 'admin', '65f43eb08b4d8Picsart_22-12-05_19-16-54-887 - Copy.jpg', '65e9dcfe4311c');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `rating` varchar(250) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `user_name`, `email`, `item_name`, `rating`, `description`) VALUES
('65ec389c918c0', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Pizza', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec390b3f20f', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Pasta', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec392254b9c', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Risotto', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec392f29bf5', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Lasagne', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec39373d03e', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Prosciutto di Parma (Parma Ham)', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec394f2e1a0', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Ribollita', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec39607072a', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Taco', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec397e6a337', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Chilaquiles', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec398f501ae', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Mexican Rice (Arroz Mexicano)', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec399bd608c', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Salsas (Chutneys)', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec39a3c96b1', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Corn Tortilla (Tortilla de Maíz)', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec39c00ce4a', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Hakka Noodles', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec39cb874dc', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Manchow Soup', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec39d4199ee', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Chicken Manchurian', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec39e8b1774', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Chowmein', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec39f687672', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Schezuan Chicken', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec39fd7d31d', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Spring Rolls', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec3a16c565c', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Idli', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec3a206ed90', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Chole Bhature', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec3a29eab0c', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Dhokla', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec3a384b788', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Paneer Tikka', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec3a44d7f2f', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Vada Pav', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec3a4d12f4b', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Pani Puri', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec3a657cef5', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Makroud el Louse (Algeria)', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec3a70c3077', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Pastel de Nata (Lisbon, Portugal)', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec3a7a5b801', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Pastel de Belém (Belém, Portugal)', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec3a8239078', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Petticoat Tails (Scotland)', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec3a894ae41', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Sfogliatelle (Naples, Italy)', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ec3a90f26e0', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Baklava (Middle East)', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65ed7fad47377', 'Sarthak', 'sdhaduk666@rku.ac.in', 'Burrito', '5', 'Our platform offers an intuitive interface, making ordering a breeze, while our extensive selection of restaurants ensures there\'s something to satisfy every craving. We\'re committed to delivering top-notch customer service, ensuring your meal arrives promptly and deliciously every time. Join the thousands who trust \' Taste Eat \' for a seamless dining experience.'),
('65f44096cce6b', 'Rock', 'rock1star14@gmail.com', 'Pastel de Nata (Lisbon, Portugal)', '3', 'You should improve your delevery services!'),
('65f440cf3cd4f', 'Rock', 'rock1star14@gmail.com', 'Taco', '1', 'You should improve your delivery services!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cancelation_time`
--
ALTER TABLE `cancelation_time`
  ADD PRIMARY KEY (`cancelation_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`issue_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `u1` (`item_name`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `u1` (`email`),
  ADD UNIQUE KEY `u2` (`token`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
