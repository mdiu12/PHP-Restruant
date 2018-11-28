-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 04:25 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xicia_rest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_slug`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, 'Sea Foods', 'sea-foods', 'Sea Foods', '', ''),
(2, 'Food and Drink', 'food-and-drink', 'Food and Drink', '', ''),
(3, 'Recipes', 'recipes', 'Recipes', '', ''),
(4, 'Restaurant Business', 'restaurant-business', 'Restaurant Business', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_food_menu`
--

CREATE TABLE `tbl_category_food_menu` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category_food_menu`
--

INSERT INTO `tbl_category_food_menu` (`category_id`, `category_name`, `category_order`) VALUES
(1, 'Breakfast', 1),
(2, 'Lunch', 2),
(3, 'Dinner', 3),
(4, 'Desserts & Beverages', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chef`
--

CREATE TABLE `tbl_chef` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `flickr` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `chef_order` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chef`
--

INSERT INTO `tbl_chef` (`id`, `name`, `slug`, `designation_id`, `photo`, `banner`, `detail`, `facebook`, `twitter`, `linkedin`, `youtube`, `google_plus`, `instagram`, `flickr`, `phone`, `email`, `website`, `chef_order`, `status`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, 'Robert Smith', 'robert-smith', 7, 'chef-1.jpg', 'chef-banner-1.jpg', '<h2 style="color: rgb(0, 0, 0);">About</h2><p>Enim venenatis nisl wisi quis, in wisi. Sollicitudin eget mollis accumsan, ut wisi maecenas tortor. Magna vehicula auctor lacus aliquam. Vehicula bibendum ut sed class erat, et et risus vel pede ac, purus orci. Nulla integer sed sem. Ut erat dolor lectus consectetuer, vel tincidunt integer duis euismod nunc, pede pede nec mauris in, vel sem fuga dis ligula. Ridiculus placerat, odio ut, mauris per vitae vehicula lorem sed vestibulum, nec fusce cras orci enim.</p><h2 style="color: rgb(0, 0, 0);">Degree</h2><p>At mi consectetuer. Mauris elementum a, ridiculus est leo adipiscing in commodo, dapibus tempus, mattis suspendisse, aliquam aliquam proin.</p><h2 style="color: rgb(0, 0, 0);">Education</h2><p>Pellentesque nulla ut. Convallis eleifend ut est dui eros, porta enim odio luctus, sed orci nonummy tellus, wisi enim venenatis magnis, dolor nunc.</p><h2 style="color: rgb(0, 0, 0);">Experience</h2><p>Sociosqu at metus luctus feugiat integer, imperdiet auctor risus. Vel ultricies dis et at sodales. Massa id urna eros tempor. Fusce lobortis dolor viverra, tempor consequat nibh, eget faucibus sapien porttitor wisi, velit et. Sollicitudin consectetuer interdum gravida metus maecenas.<br></p><div><br></div>\r\n', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', '', '', '', '', '111-222-3333', 'info@yourwebsite.com', 'http://www.abc.com', 8, 'Active', 'Robert Smith', '', ''),
(2, 'Brent Grundy', 'brent-grundy', 5, 'chef-2.jpg', 'chef-banner-2.jpg', '<h2>About</h2><p>Enim venenatis nisl wisi quis, in wisi. Sollicitudin eget mollis accumsan, ut wisi maecenas tortor. Magna vehicula auctor lacus aliquam. Vehicula bibendum ut sed class erat, et et risus vel pede ac, purus orci. Nulla integer sed sem. Ut erat dolor lectus consectetuer, vel tincidunt integer duis euismod nunc, pede pede nec mauris in, vel sem fuga dis ligula. Ridiculus placerat, odio ut, mauris per vitae vehicula lorem sed vestibulum, nec fusce cras orci enim.</p><h2>Degree</h2><p>At mi consectetuer. Mauris elementum a, ridiculus est leo adipiscing in commodo, dapibus tempus, mattis suspendisse, aliquam aliquam proin.</p><h2>Education</h2><p>Pellentesque nulla ut. Convallis eleifend ut est dui eros, porta enim odio luctus, sed orci nonummy tellus, wisi enim venenatis magnis, dolor nunc.</p><h2>Experience</h2><p>Sociosqu at metus luctus feugiat integer, imperdiet auctor risus. Vel ultricies dis et at sodales. Massa id urna eros tempor. Fusce lobortis dolor viverra, tempor consequat nibh, eget faucibus sapien porttitor wisi, velit et. Sollicitudin consectetuer interdum gravida metus maecenas.<br></p><p><br></p>\r\n', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', '', '', '', '', '111-222-3333', 'info@yourwebsite.com', 'http://www.abc.com', 2, 'Active', 'Brent Grundy', '', ''),
(3, 'John Henderson', 'john-henderson', 2, 'chef-3.jpg', 'chef-banner-3.jpg', '<h2>About</h2><p>Enim venenatis nisl wisi quis, in wisi. Sollicitudin eget mollis accumsan, ut wisi maecenas tortor. Magna vehicula auctor lacus aliquam. Vehicula bibendum ut sed class erat, et et risus vel pede ac, purus orci. Nulla integer sed sem. Ut erat dolor lectus consectetuer, vel tincidunt integer duis euismod nunc, pede pede nec mauris in, vel sem fuga dis ligula. Ridiculus placerat, odio ut, mauris per vitae vehicula lorem sed vestibulum, nec fusce cras orci enim.</p><h2>Degree</h2><p>At mi consectetuer. Mauris elementum a, ridiculus est leo adipiscing in commodo, dapibus tempus, mattis suspendisse, aliquam aliquam proin.</p><h2>Education</h2><p>Pellentesque nulla ut. Convallis eleifend ut est dui eros, porta enim odio luctus, sed orci nonummy tellus, wisi enim venenatis magnis, dolor nunc.</p><h2>Experience</h2><p>Sociosqu at metus luctus feugiat integer, imperdiet auctor risus. Vel ultricies dis et at sodales. Massa id urna eros tempor. Fusce lobortis dolor viverra, tempor consequat nibh, eget faucibus sapien porttitor wisi, velit et. Sollicitudin consectetuer interdum gravida metus maecenas.<br></p><p><br></p>\r\n', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', '', '', '', '', '111-222-3333', 'info@yourwebsite.com', 'http://www.abc.com', 1, 'Active', 'John Henderson', '', ''),
(4, 'Patrick Joe', 'patrick-joe', 5, 'chef-4.jpg', 'chef-banner-4.jpg', '<h2 style="color: rgb(0, 0, 0);">About</h2><p>Enim venenatis nisl wisi quis, in wisi. Sollicitudin eget mollis accumsan, ut wisi maecenas tortor. Magna vehicula auctor lacus aliquam. Vehicula bibendum ut sed class erat, et et risus vel pede ac, purus orci. Nulla integer sed sem. Ut erat dolor lectus consectetuer, vel tincidunt integer duis euismod nunc, pede pede nec mauris in, vel sem fuga dis ligula. Ridiculus placerat, odio ut, mauris per vitae vehicula lorem sed vestibulum, nec fusce cras orci enim.</p><h2 style="color: rgb(0, 0, 0);">Degree</h2><p>At mi consectetuer. Mauris elementum a, ridiculus est leo adipiscing in commodo, dapibus tempus, mattis suspendisse, aliquam aliquam proin.</p><h2 style="color: rgb(0, 0, 0);">Education</h2><p>Pellentesque nulla ut. Convallis eleifend ut est dui eros, porta enim odio luctus, sed orci nonummy tellus, wisi enim venenatis magnis, dolor nunc.</p><h2 style="color: rgb(0, 0, 0);">Experience</h2><p>Sociosqu at metus luctus feugiat integer, imperdiet auctor risus. Vel ultricies dis et at sodales. Massa id urna eros tempor. Fusce lobortis dolor viverra, tempor consequat nibh, eget faucibus sapien porttitor wisi, velit et. Sollicitudin consectetuer interdum gravida metus maecenas.<br></p><div><br></div>\r\n', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', '', '', '', '', '111-222-3333', 'info@yourwebsite.com', 'http://www.abc.com', 3, 'Active', 'Patrick Joe', '', ''),
(5, 'Peter Robertson', 'peter-robertson', 5, 'chef-5.jpg', 'chef-banner-5.jpg', '<h2 style="color: rgb(0, 0, 0);">About</h2><p>Enim venenatis nisl wisi quis, in wisi. Sollicitudin eget mollis accumsan, ut wisi maecenas tortor. Magna vehicula auctor lacus aliquam. Vehicula bibendum ut sed class erat, et et risus vel pede ac, purus orci. Nulla integer sed sem. Ut erat dolor lectus consectetuer, vel tincidunt integer duis euismod nunc, pede pede nec mauris in, vel sem fuga dis ligula. Ridiculus placerat, odio ut, mauris per vitae vehicula lorem sed vestibulum, nec fusce cras orci enim.</p><h2 style="color: rgb(0, 0, 0);">Degree</h2><p>At mi consectetuer. Mauris elementum a, ridiculus est leo adipiscing in commodo, dapibus tempus, mattis suspendisse, aliquam aliquam proin.</p><h2 style="color: rgb(0, 0, 0);">Education</h2><p>Pellentesque nulla ut. Convallis eleifend ut est dui eros, porta enim odio luctus, sed orci nonummy tellus, wisi enim venenatis magnis, dolor nunc.</p><h2 style="color: rgb(0, 0, 0);">Experience</h2><p>Sociosqu at metus luctus feugiat integer, imperdiet auctor risus. Vel ultricies dis et at sodales. Massa id urna eros tempor. Fusce lobortis dolor viverra, tempor consequat nibh, eget faucibus sapien porttitor wisi, velit et. Sollicitudin consectetuer interdum gravida metus maecenas.<br></p><div><br></div>\r\n', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', '', '', '', '', '111-222-3333', 'info@yourwebsite.com', 'http://www.abc.com', 4, 'Active', 'Peter Robertson', '', ''),
(6, 'Bryan Smith', 'bryan-smith', 5, 'chef-6.jpg', 'chef-banner-6.jpg', '<h2 style="color: rgb(0, 0, 0);">About</h2><p>Enim venenatis nisl wisi quis, in wisi. Sollicitudin eget mollis accumsan, ut wisi maecenas tortor. Magna vehicula auctor lacus aliquam. Vehicula bibendum ut sed class erat, et et risus vel pede ac, purus orci. Nulla integer sed sem. Ut erat dolor lectus consectetuer, vel tincidunt integer duis euismod nunc, pede pede nec mauris in, vel sem fuga dis ligula. Ridiculus placerat, odio ut, mauris per vitae vehicula lorem sed vestibulum, nec fusce cras orci enim.</p><h2 style="color: rgb(0, 0, 0);">Degree</h2><p>At mi consectetuer. Mauris elementum a, ridiculus est leo adipiscing in commodo, dapibus tempus, mattis suspendisse, aliquam aliquam proin.</p><h2 style="color: rgb(0, 0, 0);">Education</h2><p>Pellentesque nulla ut. Convallis eleifend ut est dui eros, porta enim odio luctus, sed orci nonummy tellus, wisi enim venenatis magnis, dolor nunc.</p><h2 style="color: rgb(0, 0, 0);">Experience</h2><p>Sociosqu at metus luctus feugiat integer, imperdiet auctor risus. Vel ultricies dis et at sodales. Massa id urna eros tempor. Fusce lobortis dolor viverra, tempor consequat nibh, eget faucibus sapien porttitor wisi, velit et. Sollicitudin consectetuer interdum gravida metus maecenas.<br></p><div><br></div>\r\n', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', '', '', '', '', '111-222-3333', 'info@yourwebsite.com', 'http://www.abc.com', 5, 'Active', 'Bryan Smith', '', ''),
(7, 'Tom Steward', 'tom-steward', 5, 'chef-7.jpg', 'chef-banner-7.jpg', '<h2 style=""><h2>About</h2><p>Enim venenatis nisl wisi quis, in wisi. Sollicitudin eget mollis accumsan, ut wisi maecenas tortor. Magna vehicula auctor lacus aliquam. Vehicula bibendum ut sed class erat, et et risus vel pede ac, purus orci. Nulla integer sed sem. Ut erat dolor lectus consectetuer, vel tincidunt integer duis euismod nunc, pede pede nec mauris in, vel sem fuga dis ligula. Ridiculus placerat, odio ut, mauris per vitae vehicula lorem sed vestibulum, nec fusce cras orci enim.</p><h2>Degree</h2><p>At mi consectetuer. Mauris elementum a, ridiculus est leo adipiscing in commodo, dapibus tempus, mattis suspendisse, aliquam aliquam proin.</p><h2>Education</h2><p>Pellentesque nulla ut. Convallis eleifend ut est dui eros, porta enim odio luctus, sed orci nonummy tellus, wisi enim venenatis magnis, dolor nunc.</p><h2>Experience</h2><p>Sociosqu at metus luctus feugiat integer, imperdiet auctor risus. Vel ultricies dis et at sodales. Massa id urna eros tempor. Fusce lobortis dolor viverra, tempor consequat nibh, eget faucibus sapien porttitor wisi, velit et. Sollicitudin consectetuer interdum gravida metus maecenas.<br></p><p><br></p></h2><div><br></div>\r\n', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', '', '', '', '', '111-222-3333', 'info@yourwebsite.com', 'http://www.abc.com', 6, 'Active', 'Tom Steward', '', ''),
(8, 'Jeff Benson', 'jeff-benson', 5, 'chef-8.jpg', 'chef-banner-8.jpg', '<h2 style="color: rgb(0, 0, 0);">About</h2><p>Enim venenatis nisl wisi quis, in wisi. Sollicitudin eget mollis accumsan, ut wisi maecenas tortor. Magna vehicula auctor lacus aliquam. Vehicula bibendum ut sed class erat, et et risus vel pede ac, purus orci. Nulla integer sed sem. Ut erat dolor lectus consectetuer, vel tincidunt integer duis euismod nunc, pede pede nec mauris in, vel sem fuga dis ligula. Ridiculus placerat, odio ut, mauris per vitae vehicula lorem sed vestibulum, nec fusce cras orci enim.</p><h2 style="color: rgb(0, 0, 0);">Degree</h2><p>At mi consectetuer. Mauris elementum a, ridiculus est leo adipiscing in commodo, dapibus tempus, mattis suspendisse, aliquam aliquam proin.</p><h2 style="color: rgb(0, 0, 0);">Education</h2><p>Pellentesque nulla ut. Convallis eleifend ut est dui eros, porta enim odio luctus, sed orci nonummy tellus, wisi enim venenatis magnis, dolor nunc.</p><h2 style="color: rgb(0, 0, 0);">Experience</h2><p>Sociosqu at metus luctus feugiat integer, imperdiet auctor risus. Vel ultricies dis et at sodales. Massa id urna eros tempor. Fusce lobortis dolor viverra, tempor consequat nibh, eget faucibus sapien porttitor wisi, velit et. Sollicitudin consectetuer interdum gravida metus maecenas.<br></p><div><br></div>\r\n', 'http://www.facebook.com', 'http://www.twitter.com', 'http://www.linkedin.com', '', '', '', '', '111-222-3333', 'info@yourwebsite.com', 'http://www.abc.com', 7, 'Active', 'Jeff Benson', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `code_body` text NOT NULL,
  `code_main` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `code_body`, `code_main`) VALUES
(1, '<div id="fb-root"></div>\r\n<script>(function(d, s, id) {\r\n  var js, fjs = d.getElementsByTagName(s)[0];\r\n  if (d.getElementById(id)) return;\r\n  js = d.createElement(s); js.id = id;\r\n  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=323620764400430";\r\n  fjs.parentNode.insertBefore(js, fjs);\r\n}(document, ''script'', ''facebook-jssdk''));</script>', '<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `designation_id` int(11) NOT NULL,
  `designation_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`designation_id`, `designation_name`) VALUES
(2, 'Management Chef'),
(5, 'Recipe Expert'),
(6, 'Assistant Chef'),
(7, 'Head Chef');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_title` varchar(255) NOT NULL,
  `faq_content` text NOT NULL,
  `faq_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faq`
--

INSERT INTO `tbl_faq` (`faq_id`, `faq_title`, `faq_content`, `faq_category_id`) VALUES
(1, 'Lorem ipsum dolor sit amet, an labores explicari qui', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 1),
(2, 'Eu nostrum copiosae argumentum has latine propriae quo no', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 1),
(3, 'Unum ridens expetenda id sit, at usu eius eligendi singulis', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 2),
(4, 'Sea ocurreret principes ne, at nonumy aperiri pri nam quodsi', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 2),
(5, 'Copiosae intellegebat et, ex deserunt euripidis usu', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 2),
(6, 'Duo volutpat imperdiet ut, postea salutatus imperdiet ut', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 3),
(7, 'Facilisi postulant vel no, ad mea commune disputando', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 3),
(8, 'Mea ei regione blandit ullamcorper, definiebas constituam vix ei', '<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq_category`
--

CREATE TABLE `tbl_faq_category` (
  `faq_category_id` int(11) NOT NULL,
  `faq_category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faq_category`
--

INSERT INTO `tbl_faq_category` (`faq_category_id`, `faq_category_name`) VALUES
(1, 'General Questions'),
(2, 'Client Query'),
(3, 'Technical Questions');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

CREATE TABLE `tbl_file` (
  `file_id` int(11) NOT NULL,
  `file_title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food_menu`
--

CREATE TABLE `tbl_food_menu` (
  `food_menu_id` int(11) NOT NULL,
  `food_menu_name` varchar(255) NOT NULL,
  `food_menu_description` text NOT NULL,
  `food_menu_price` varchar(10) NOT NULL,
  `food_menu_photo` varchar(255) NOT NULL,
  `food_menu_order` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_food_menu`
--

INSERT INTO `tbl_food_menu` (`food_menu_id`, `food_menu_name`, `food_menu_description`, `food_menu_price`, `food_menu_photo`, `food_menu_order`, `category_id`) VALUES
(14, 'Traditional', 'Egg / Cheddar Cheese / Bacon', '$4.50', 'food-menu-14.jpg', 1, 1),
(15, 'Smoked Salmon Bagel', 'Cream Cheese / Fried Capers / Sliced Tomato', '$7.00', 'food-menu-15.jpg', 2, 1),
(16, 'Everything Avocado Toast', 'Sliced Toast / Avocado Mash / Chili Oil / Scallions', '$7.50', 'food-menu-16.jpg', 3, 1),
(17, 'Ham And Cheesy Grits', 'Crispy Ham / Scallions / Creamy Grits', '$9.00', 'food-menu-17.jpg', 4, 1),
(18, 'Crispy Chicken', 'Chicken Thigh / Cheese / Pepper Jelly', '$8.00', 'food-menu-18.jpg', 5, 2),
(19, 'Roasted Turkey', 'Bacon / Avocado / Lettuce / Chimichurri', '$8.50', 'food-menu-19.jpg', 6, 2),
(20, 'Italian Cold Cut', 'Giardiniera / Garlic Aioli / Capicola', '$8.50', 'food-menu-20.jpg', 7, 2),
(21, 'Grilled Cheese', 'American Cheese / Toasty / White bread', '$9.00', 'food-menu-21.jpg', 8, 2),
(22, 'Hot Coffee', 'Tomatoes / Olive Oil / Cheese', '$4.00', 'food-menu-22.jpg', 9, 3),
(23, 'Marinated Grilled Shrimp', 'Fresh Shrimp / Oive Oil / Tomato Sauce', '$7.00', 'food-menu-23.jpg', 10, 3),
(24, 'Avocado & Mango Salsa', 'Avocado / Mango / Tomatoes', '$5.00', 'food-menu-24.jpg', 11, 3),
(25, 'Baked Potato Skins', 'Potatoes / Oil / Garlic', '$9.00', 'food-menu-25.jpg', 12, 3),
(26, 'Strawberry Shortcake', 'Buttermilk Biscuit / Strawberries / Cream', '$4.20', 'food-menu-26.jpg', 13, 4),
(27, 'Banana Split', 'Ice-cream with caramel / Strawberries', '$5.40', 'food-menu-27.jpg', 14, 4),
(28, 'Soft Drinks', 'Coke / Sprite / Lemonade', '$6.00', 'food-menu-28.jpg', 15, 4),
(29, 'Cold Juice', 'Apple / Orange / Grape Fruit', '$6.00', 'food-menu-29.jpg', 16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_footer`
--

CREATE TABLE `tbl_menu_footer` (
  `menu_id` int(11) NOT NULL,
  `menu_type` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `category_or_page_slug` varchar(255) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_footer`
--

INSERT INTO `tbl_menu_footer` (`menu_id`, `menu_type`, `menu_name`, `category_or_page_slug`, `menu_order`, `menu_url`) VALUES
(1, 'Page', 'Terms and Conditions', 'terms-and-conditions', 1, ''),
(2, 'Page', 'Privacy Policy', 'privacy-policy', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_main`
--

CREATE TABLE `tbl_menu_main` (
  `menu_id` int(11) NOT NULL,
  `menu_type` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `category_or_page_slug` varchar(255) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu_main`
--

INSERT INTO `tbl_menu_main` (`menu_id`, `menu_type`, `menu_name`, `category_or_page_slug`, `menu_order`, `menu_parent`, `menu_url`) VALUES
(17, 'Other', 'Home', '', 1, 0, 'http://localhost/xicia/rest/rest/upload/cms/'),
(34, 'Page', 'FAQ', 'faq', 4, 0, ''),
(35, 'Page', 'News', 'news', 5, 0, ''),
(36, 'Page', 'Contact Us', 'contact-us', 7, 0, ''),
(37, 'Other', 'Menu', '', 6, 0, '#'),
(38, 'Page', 'Food Menu 1', 'food-menu-1', 1, 37, ''),
(39, 'Page', 'Food Menu 2', 'food-menu-2', 2, 37, ''),
(40, 'Page', 'Food Menu 3', 'food-menu-3', 3, 37, ''),
(41, 'Page', 'Food Menu 4', 'food-menu-4', 4, 37, ''),
(42, 'Other', 'Pages', '', 2, 0, '#'),
(44, 'Page', 'Our Chefs', 'chefs', 3, 42, ''),
(45, 'Page', 'About Us', 'about-us', 1, 42, ''),
(46, 'Page', 'Photo Gallery', 'photo-gallery', 4, 42, ''),
(47, 'Page', 'Our Services', 'our-services', 2, 42, ''),
(48, 'Page', 'Reserve A Table', 'reserve-table', 50, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_slug` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_short_content` text NOT NULL,
  `news_date` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `total_view` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_title`, `news_slug`, `news_content`, `news_short_content`, `news_date`, `photo`, `category_id`, `publisher`, `total_view`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, 'Putent accusamus te qui, vero forensibus ei ius', 'putent-accusamus-te-qui-vero-forensibus-ei-ius', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', 'Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.', '05-09-2017', 'news-1.jpg', 3, 'John Doe', 50, 'Putent accusamus te qui, vero forensibus ei ius', '', ''),
(2, 'Eu semper imperdiet duo, eos ut exerci sanctus', 'eu-semper-imperdiet-duo-eos-ut-exerci-sanctus', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', 'Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.', '05-09-2017', 'news-2.jpg', 3, 'John Doe', 1, 'Eu semper imperdiet duo, eos ut exerci sanctus', '', ''),
(3, 'Vis constituto complectitur an, modo falli eirmod', 'vis-constituto-complectitur-an-modo-falli-eirmod', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', 'Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.', '05-09-2017', 'news-3.jpg', 3, 'John Doe', 2, 'Vis constituto complectitur an, modo falli eirmod', '', ''),
(4, 'Latine sanctus perfecto ad pro. Ut vel molestiae', 'latine-sanctus-perfecto-ad-pro-ut-vel-molestiae', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', 'Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.', '05-09-2017', 'news-4.jpg', 4, 'John Doe', 2, 'Latine sanctus perfecto ad pro. Ut vel molestiae', '', ''),
(5, 'Mea ei regione blandit ullamcorper, definiebas constituam', 'mea-ei-regione-blandit-ullamcorper-definiebas-constituam', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', 'Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.', '05-09-2017', 'news-5.jpg', 4, 'John Doe', 22, 'Mea ei regione blandit ullamcorper, definiebas constituam', '', ''),
(6, 'At his ludus nonumes gloriatur. Ne vim tamquam', 'at-his-ludus-nonumes-gloriatur-ne-vim-tamquam', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', 'Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.', '05-09-2017', 'news-6.jpg', 4, 'John Doe', 0, 'At his ludus nonumes gloriatur. Ne vim tamquam', '', ''),
(7, 'Ad mea commune disputando, cu vel choro exerci', 'ad-mea-commune-disputando-cu-vel-choro-exerci', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', 'Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.', '05-09-2017', 'news-7.jpg', 2, 'John Doe', 0, 'Ad mea commune disputando, cu vel choro exerci', '', ''),
(8, 'Pri et oratio iisque atomorum, enim detracto', 'pri-et-oratio-iisque-atomorum-enim-detracto', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', 'Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.', '05-09-2017', 'news-8.jpg', 2, 'John Doe', 10, 'Pri et oratio iisque atomorum, enim detracto', '', ''),
(9, 'Mei ut errem legimus periculis, eos liber', 'mei-ut-errem-legimus-periculis-eos-liber', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', 'Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.', '05-09-2017', 'news-9.jpg', 1, 'John Doe', 9, 'Mei ut errem legimus periculis, eos liber', '', ''),
(10, 'Vix tale noluisse voluptua ad, ne brute', 'vix-tale-noluisse-voluptua-ad-ne-brute', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', 'Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.', '05-09-2017', 'news-10.jpg', 1, 'John Doe', 10, 'Vix tale noluisse voluptua ad, ne brute', '', ''),
(11, 'Liber utroque vim an, ne his brute vivendo', 'liber-utroque-vim-an-ne-his-brute-vivendo', '<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n', 'Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.', '05-09-2017', 'news-11.jpg', 1, 'John Doe', 17, 'Liber utroque vim an, ne his brute vivendo', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page`
--

CREATE TABLE `tbl_page` (
  `page_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `page_layout` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_page`
--

INSERT INTO `tbl_page` (`page_id`, `page_name`, `page_slug`, `page_content`, `page_layout`, `banner`, `status`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, 'About Us', 'about-us', '', 'About Us Page Layout', 'page-banner-1.jpg', 'Active', 'About Us Page', '', ''),
(2, 'Contact Us', 'contact-us', '<h2>Contact Form</h2><p>Fill up the form below to contact us and send us an email<br></p>', 'Contact Us Page Layout', 'page-banner-2.jpg', 'Active', 'Contact Us Page', '', ''),
(5, 'Photo Gallery', 'photo-gallery', '<p><br></p>', 'Photo Gallery Page Layout', 'page-banner-5.jpg', 'Active', 'Photo Gallery Page', '', ''),
(7, 'FAQ', 'faq', '<p><br></p>', 'FAQ Page Layout', 'page-banner-7.jpg', 'Active', 'FAQ Page', '', ''),
(9, 'News', 'news', '', 'News Page Layout', 'page-banner-9.jpg', 'Active', 'Blog Page', '', ''),
(10, 'Our Chefs', 'chefs', '<p><br></p>', 'Chef Page Layout', 'page-banner-10.jpg', 'Active', 'Our Chefs Page', '', ''),
(11, 'Food Menu 1', 'food-menu-1', '<p><br></p>', 'Menu Style 1 Page Layout', 'page-banner-11.jpg', 'Active', 'Food Menu', '', ''),
(12, 'Food Menu 2', 'food-menu-2', '', 'Menu Style 2 Page Layout', 'page-banner-12.jpg', 'Active', 'Food Menu', '', ''),
(13, 'Food Menu 3', 'food-menu-3', '', 'Menu Style 3 Page Layout', 'page-banner-13.jpg', 'Active', 'Food Menu', '', ''),
(14, 'Food Menu 4', 'food-menu-4', '', 'Menu Style 4 Page Layout', 'page-banner-14.jpg', 'Active', 'Food Menu', '', ''),
(15, 'Our Services', 'our-services', '<p><br></p>', 'Service Page Layout', 'page-banner-15.jpg', 'Active', 'Our Services', '', ''),
(16, 'Reserve A Table', 'reserve-table', '<p style="text-align: center;">Fill up the form below to reserve a table</p><p style="text-align: center;"><br></p>', 'Reserve Table Page Layout', 'page-banner-16.jpg', 'Active', 'Reserve Table', '', ''),
(17, 'Terms and Conditions', 'terms-and-conditions', '<p style="font-family: "Times New Roman"; font-size: medium;">Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.</p><p style="font-family: "Times New Roman"; font-size: medium;">Liber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.</p><p style="font-family: "Times New Roman"; font-size: medium;">Vix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria.</p><p style="font-family: "Times New Roman"; font-size: medium;">Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p><p style="font-family: "Times New Roman"; font-size: medium;">Ex vix alienum sadipscing, quod melius philosophia id has. Ad qui quem reprimique, quo possit detracto reprimique no, sint reque officiis ei per. Ea regione commune volutpat pro, fabulas facilis omnesque mei ne. Cu unum detracto comprehensam sea, ad vim ancillae principes, ex usu fugit consulatu. Vis te purto equidem voluptatum.</p>', 'Full Width Page Layout', 'page-banner-17.jpg', 'Active', 'Terms and Conditions', '', ''),
(18, 'Privacy Policy', 'privacy-policy', '<p style="font-family: "Times New Roman"; font-size: medium;">Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has. Latine propriae quo no, unum ridens expetenda id sit, at usu eius eligendi singulis. Sea ocurreret principes ne. At nonumy aperiri pri, nam quodsi copiosae intellegebat et, ex deserunt euripidis usu. Per ad ullum lobortis. Duo volutpat imperdiet ut, postea salutatus imperdiet ut per, ad utinam debitis invenire has.</p><p style="font-family: "Times New Roman"; font-size: medium;">Liber utroque vim an, ne his brute vivendo, est fabulas consetetur appellantur an. In dolore legendos quo, ne ferri noluisse sed. Tantas eligendi at ius. Purto ipsum nemore sit ad.</p><p style="font-family: "Times New Roman"; font-size: medium;">Vix tale noluisse voluptua ad, ne brute altera democritum cum. Omnes ornatus qui et, te aeterno discere ocurreret sea. Tollit cetero cu usu, etiam evertitur id nec. Id pro unum pertinax oportere, vel ad ridens mollis. Ad ius meis suavitate voluptaria.</p><p style="font-family: "Times New Roman"; font-size: medium;">Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p><p style="font-family: "Times New Roman"; font-size: medium;">Ex vix alienum sadipscing, quod melius philosophia id has. Ad qui quem reprimique, quo possit detracto reprimique no, sint reque officiis ei per. Ea regione commune volutpat pro, fabulas facilis omnesque mei ne. Cu unum detracto comprehensam sea, ad vim ancillae principes, ex usu fugit consulatu. Vis te purto equidem voluptatum.</p>', 'Full Width Page Layout', 'page-banner-18.jpg', 'Active', 'Privacy Policy', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_photo`
--

CREATE TABLE `tbl_photo` (
  `photo_id` int(11) NOT NULL,
  `photo_caption` varchar(255) NOT NULL,
  `photo_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_photo`
--

INSERT INTO `tbl_photo` (`photo_id`, `photo_caption`, `photo_name`) VALUES
(8, 'Photo 1', 'photo-8.jpg'),
(9, 'Photo 2', 'photo-9.jpg'),
(10, 'Photo 3', 'photo-10.jpg'),
(11, 'Photo 4', 'photo-11.jpg'),
(12, 'Photo 5', 'photo-12.jpg'),
(13, 'Photo 6', 'photo-13.jpg'),
(14, 'Photo 7', 'photo-14.jpg'),
(15, 'Photo 8', 'photo-15.jpg'),
(16, 'Photo 9', 'photo-16.jpg'),
(17, 'Photo 10', 'photo-17.jpg'),
(18, 'Photo 11', 'photo-18.jpg'),
(19, 'Photo 12', 'photo-19.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `service_order` int(11) NOT NULL,
  `show_on_home` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `name`, `description`, `photo`, `service_order`, `show_on_home`) VALUES
(4, 'Quality Food', '<p>Ad his diam eirmod persecuti. Eum health cube scriptorem eu, eu aperiri definiebas concludaturque eam.</p>\r\n', 'service-4.png', 0, 'Yes'),
(5, 'Special Items', '<p>Ad his diam eirmod persecuti. Eum health cube scriptorem eu, eu aperiri definiebas concludaturque eam.</p>\r\n', 'service-5.png', 0, 'Yes'),
(6, 'First Class Coffee', '<p>Ad his diam eirmod persecuti. Eum health cube scriptorem eu, eu aperiri definiebas concludaturque eam.</p>\r\n', 'service-6.png', 0, 'Yes'),
(14, 'Quality Food', '<p>Ad his diam eirmod persecuti. Eum health cube scriptorem eu, eu aperiri definiebas concludaturque eam.<br></p>', 'service-14.png', 4, 'No'),
(15, 'Special Items', '<p>Ad his diam eirmod persecuti. Eum health cube scriptorem eu, eu aperiri definiebas concludaturque eam.<br></p>', 'service-15.png', 5, 'No'),
(16, 'First Class Coffee', '<p>Ad his diam eirmod persecuti. Eum health cube scriptorem eu, eu aperiri definiebas concludaturque eam.<br></p>', 'service-16.png', 6, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `footer_about` text NOT NULL,
  `footer_copyright` text NOT NULL,
  `contact_address` text NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_fax` varchar(255) NOT NULL,
  `contact_map_iframe` text NOT NULL,
  `contact_form_email` varchar(255) NOT NULL,
  `contact_form_email_subject` varchar(255) NOT NULL,
  `contact_form_email_thank_you_message` text NOT NULL,
  `reservation_form_email` varchar(255) NOT NULL,
  `reservation_form_email_subject` varchar(255) NOT NULL,
  `reservation_form_email_thank_you_message` text NOT NULL,
  `total_recent_news_footer` int(10) NOT NULL,
  `total_popular_news_footer` int(10) NOT NULL,
  `total_recent_news_sidebar` int(11) NOT NULL,
  `total_popular_news_sidebar` int(11) NOT NULL,
  `meta_title_home` text NOT NULL,
  `meta_keyword_home` text NOT NULL,
  `meta_description_home` text NOT NULL,
  `home_status_service` int(11) NOT NULL,
  `home_title_about` varchar(255) NOT NULL,
  `home_subtitle_about` varchar(255) NOT NULL,
  `home_text_about` text NOT NULL,
  `home_photo_about` varchar(255) NOT NULL,
  `home_status_about` int(11) NOT NULL,
  `home_title_menu` varchar(255) NOT NULL,
  `home_subtitle_menu` varchar(255) NOT NULL,
  `home_status_menu` int(11) NOT NULL,
  `home_status_testimonial` int(11) NOT NULL,
  `home_title_chef` varchar(255) NOT NULL,
  `home_subtitle_chef` varchar(255) NOT NULL,
  `home_status_chef` int(11) NOT NULL,
  `color_primary` varchar(20) NOT NULL,
  `color_secondary` varchar(20) NOT NULL,
  `reservation_text` text NOT NULL,
  `reservation_button_text` varchar(255) NOT NULL,
  `reservation_button_url` varchar(255) NOT NULL,
  `reservation_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `logo`, `favicon`, `footer_about`, `footer_copyright`, `contact_address`, `contact_email`, `contact_phone`, `contact_fax`, `contact_map_iframe`, `contact_form_email`, `contact_form_email_subject`, `contact_form_email_thank_you_message`, `reservation_form_email`, `reservation_form_email_subject`, `reservation_form_email_thank_you_message`, `total_recent_news_footer`, `total_popular_news_footer`, `total_recent_news_sidebar`, `total_popular_news_sidebar`, `meta_title_home`, `meta_keyword_home`, `meta_description_home`, `home_status_service`, `home_title_about`, `home_subtitle_about`, `home_text_about`, `home_photo_about`, `home_status_about`, `home_title_menu`, `home_subtitle_menu`, `home_status_menu`, `home_status_testimonial`, `home_title_chef`, `home_subtitle_chef`, `home_status_chef`, `color_primary`, `color_secondary`, `reservation_text`, `reservation_button_text`, `reservation_button_url`, `reservation_status`) VALUES
(1, 'logo.png', 'favicon.png', '<p>Dicant discere pro no, no pri prima facilisi. Sit munere voluptaria ea. Ex per fugit prodesset adipiscing, viderer aliquam et vim. Id enim esse deleniti mel, vix eirmod omittam constituam ad.Â </p>\r\n', 'Copyright Â© 2018. All Rights Reserved.', 'ABC Steet, NewYork.', 'info@yourwebsite.com', '123-456-7878', '123-456-7890', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387142.84040262736!2d-74.25819605476612!3d40.70583158628177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1485712851643" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>', 'jbbr.1990@gmail.com', 'Contact Form Message - YourWebsite.com', 'Thank you for sending email. We will contact you shortly.', 'jbbr.1990@gmail.com', 'Reservation Form Message - YourWebsite.com', 'Thank you for making a request in reservation. We will contact you shortly and confirm your reservation.', 3, 3, 4, 4, 'Rest - Cafe and Restaurant Website CMS', 'cafe, food, restaurant, hotel, fast food, cafe table, order, shrimp, pizza', 'Rest is a nice and clean responsive cafe and restaurant website CMS', 1, 'About Us', 'Welcome to our awesome restaurant', '<p style="margin-bottom: 15px; padding: 0px; border: 0px; outline: none; color: rgb(70, 70, 70); font-family: Lato, sans-serif; font-size: 15px;">Lorem ipsum dolor sit amet, mea nominavi instructior ex, has cu exerci temporibus. Mei no vero sensibus. Vix at dico expetendis vituperata, te senserit suavitate ius. Ut quo utamur feugiat labores, offendit intellegat vituperata nec ut, sed minimum insolens persequeris ad. Vel facilisi qualisque at.</p><p style="margin-bottom: 15px; padding: 0px; border: 0px; outline: none; color: rgb(70, 70, 70); font-family: Lato, sans-serif; font-size: 15px;">Ne mundi civibus scriptorem his, nullam gloriatur delicatissimi in vim. Eu nec paulo molestiae incorrupte, ex est esse brute altera. Ut dicunt iriure has. Sea facete delenit eloquentiam et.</p>', 'home_about_photo.jpg', 1, 'Restaurant Menu', 'Available Menu Items in Our Restaurant', 1, 1, 'Our Chefs', 'Know About All Our Experienced Chefs', 1, '323F52', 'DC9822', 'Our foods are delicious. Do not forget to make a reservation.', 'Make a Reservation', '#', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `button_text` varchar(255) NOT NULL,
  `button_url` varchar(255) NOT NULL,
  `slide_order` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `photo`, `heading`, `content`, `button_text`, `button_url`, `slide_order`, `status`) VALUES
(1, 'slider-1.jpg', 'Welcome to Our Cafe', 'The best restaurant in the city with great quality foods', 'Book Now', '#', 1, 'Active'),
(2, 'slider-2.jpg', 'Welcome to Our Cafe', 'The best restaurant in the city with great quality foods', 'Book Now', '#', 2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social`
--

CREATE TABLE `tbl_social` (
  `social_id` int(11) NOT NULL,
  `social_name` varchar(30) NOT NULL,
  `social_url` varchar(255) NOT NULL,
  `social_icon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_social`
--

INSERT INTO `tbl_social` (`social_id`, `social_name`, `social_url`, `social_icon`) VALUES
(1, 'Facebook', '#', 'fa fa-facebook'),
(2, 'Twitter', '#', 'fa fa-twitter'),
(3, 'LinkedIn', '#', 'fa fa-linkedin'),
(4, 'Google Plus', '#', 'fa fa-google-plus'),
(5, 'Pinterest', '#', 'fa fa-pinterest'),
(6, 'YouTube', '', 'fa fa-youtube'),
(7, 'Instagram', '', 'fa fa-instagram'),
(8, 'Tumblr', '', 'fa fa-tumblr'),
(9, 'Flickr', '', 'fa fa-flickr'),
(10, 'Reddit', '', 'fa fa-reddit'),
(11, 'Snapchat', '', 'fa fa-snapchat'),
(12, 'WhatsApp', '', 'fa fa-whatsapp'),
(13, 'Quora', '', 'fa fa-quora'),
(14, 'StumbleUpon', '', 'fa fa-stumbleupon'),
(15, 'Delicious', '', 'fa fa-delicious'),
(16, 'Digg', '', 'fa fa-digg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonial`
--

CREATE TABLE `tbl_testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `testimonial_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_testimonial`
--

INSERT INTO `tbl_testimonial` (`id`, `name`, `designation`, `company`, `photo`, `comment`, `testimonial_order`) VALUES
(1, 'John Doe', 'Managing Director', 'ABC Inc.', 'testimonial-1.jpg', 'Ancillae interpretaris ea has. Id amet impedit qui, eripuit mnesarchum percipitur in eam. Ne sit habeo inimicus, no his liber regione volutpat. Ex quot voluptaria usu, dolor vivendo docendi nec ea. Et atqui vocent integre vim, quod cibo recusabo ei usu.', 1),
(2, 'Dadiv Smith', 'CEO', 'SS Multimedia', 'testimonial-2.jpg', 'Ancillae interpretaris ea has. Id amet impedit qui, eripuit mnesarchum percipitur in eam. Ne sit habeo inimicus, no his liber regione volutpat. Ex quot voluptaria usu, dolor vivendo docendi nec ea. Et atqui vocent integre vim, quod cibo recusabo ei usu.', 2),
(3, 'Stefen Carman', 'Chairman', 'GH Group', 'testimonial-3.jpg', 'Ancillae interpretaris ea has. Id amet impedit qui, eripuit mnesarchum percipitur in eam. Ne sit habeo inimicus, no his liber regione volutpat. Ex quot voluptaria usu, dolor vivendo docendi nec ea. Et atqui vocent integre vim, quod cibo recusabo ei usu.', 3),
(4, 'Gary Brent', 'CFO', 'XYZ It Solution', 'testimonial-4.jpg', 'Ancillae interpretaris ea has. Id amet impedit qui, eripuit mnesarchum percipitur in eam. Ne sit habeo inimicus, no his liber regione volutpat. Ex quot voluptaria usu, dolor vivendo docendi nec ea. Et atqui vocent integre vim, quod cibo recusabo ei usu.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `email`, `phone`, `password`, `photo`, `role`, `status`) VALUES
(1, 'John Doe', 'sadmin@gmail.com', '123-456-7899', '81dc9bdb52d04dc20036dbd8313ed055', 'user-1.jpg', 'Super Admin', 'Active'),
(13, 'David Smith', 'admin@gmail.com', '111-222-3333', '81dc9bdb52d04dc20036dbd8313ed055', '', 'Admin', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_category_food_menu`
--
ALTER TABLE `tbl_category_food_menu`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_chef`
--
ALTER TABLE `tbl_chef`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`designation_id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `tbl_faq_category`
--
ALTER TABLE `tbl_faq_category`
  ADD PRIMARY KEY (`faq_category_id`);

--
-- Indexes for table `tbl_file`
--
ALTER TABLE `tbl_file`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `tbl_food_menu`
--
ALTER TABLE `tbl_food_menu`
  ADD PRIMARY KEY (`food_menu_id`);

--
-- Indexes for table `tbl_menu_footer`
--
ALTER TABLE `tbl_menu_footer`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_menu_main`
--
ALTER TABLE `tbl_menu_main`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_page`
--
ALTER TABLE `tbl_page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_social`
--
ALTER TABLE `tbl_social`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_category_food_menu`
--
ALTER TABLE `tbl_category_food_menu`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_chef`
--
ALTER TABLE `tbl_chef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  MODIFY `designation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_faq_category`
--
ALTER TABLE `tbl_faq_category`
  MODIFY `faq_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_file`
--
ALTER TABLE `tbl_file`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_food_menu`
--
ALTER TABLE `tbl_food_menu`
  MODIFY `food_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tbl_menu_footer`
--
ALTER TABLE `tbl_menu_footer`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_menu_main`
--
ALTER TABLE `tbl_menu_main`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_page`
--
ALTER TABLE `tbl_page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_photo`
--
ALTER TABLE `tbl_photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_social`
--
ALTER TABLE `tbl_social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_testimonial`
--
ALTER TABLE `tbl_testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
