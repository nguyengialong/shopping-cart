/*
Navicat MySQL Data Transfer

Source Server         : project
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shops

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-07-09 10:14:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bills
-- ----------------------------
DROP TABLE IF EXISTS `bills`;
CREATE TABLE `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `total` double(100,0) DEFAULT NULL,
  `date_oder` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bills
-- ----------------------------

-- ----------------------------
-- Table structure for bill_detail
-- ----------------------------
DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` time DEFAULT NULL,
  `update_at` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bill_detail
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('10', 'Áo thun', 'p1.jpg', '0', '2020-07-02 08:54:48', null);
INSERT INTO `categories` VALUES ('11', 'Quần ', 'q_1.webp', '0', '2020-07-03 12:37:51', '2020-07-03 12:37:51');
INSERT INTO `categories` VALUES ('12', 'Đầm', 'd_1.webp', '0', '2020-07-02 09:01:53', null);
INSERT INTO `categories` VALUES ('13', 'Áo khoác', '3046028800_6_1_1.webp', '0', '2020-07-02 09:03:23', null);

-- ----------------------------
-- Table structure for customer
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone_number` int(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('1', 'nguyễn gia long', 'Nam', 'nguyengialong9x@gmail.com', 'đại mỗ', '989458598', '2020-07-09 10:02:22', null);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `discount_percent` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `size` varchar(200) DEFAULT NULL,
  `image_product` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('24', ' ÁO PHÔNG PHỐI TRANG TRÍ', '10', 'Áo phông cổ tròn, cộc tay. Gấu phối ren.', '599000', '0', '0', 't3.webp', '2020-07-07 09:28:07', '2020-07-07 09:28:07', 'S,M,L,XL', 't3.webp,t3_1.webp,t3_2.webp');
INSERT INTO `products` VALUES ('25', 'ÁO CÓ ĐỆM VAI PHỐI MÀU XANH', '10', 'Áo cổ tròn, tay ngắn, có đệm vai.', '699000', '0', '0', 't4_1.webp', '2020-07-04 12:30:26', '2020-07-04 12:30:26', 'XS,S,M,L', 't4_2.webp,t4_1.webp,t4.webp');
INSERT INTO `products` VALUES ('26', 'ÁO PHÔNG HỞ VAI BẰNG VẢI LINEN', '10', 'Áo phông dáng ngắn, cổ ngang may lật ngược, tay ngắn, hở vai.', '399000', '0', '0', 't5.webp', '2020-07-04 12:31:52', '2020-07-04 12:31:52', 'S,M,L', 't5_2.webp,t5_1.webp,t5.webp');
INSERT INTO `products` VALUES ('27', 'ÁO ĐÍNH NƠ BẰNG VẢI LỤA ORGANZA', '10', 'Áo cổ chữ V. Có hai quai đeo vai đính nơ bằng vải lụa organza cùng màu.', '499000', '0', '0', 't6.webp', '2020-07-02 15:58:05', '2020-07-02 15:58:05', 'S,M,L', 't6_2.webp,t6_3.webp');
INSERT INTO `products` VALUES ('28', ' ÁO BA LỖ BẰNG VẢI LINEN', '10', 'Áo hai dây mảnh, cổ chữ V.Chất liệu vải co dãn thoáng mát', '399000', '0', '0', 't7.webp', '2020-07-04 12:32:17', '2020-07-04 12:32:17', 'S,M,L,XL', 't7_4.webp,t7_3.webp,0858036250_2_1_1.webp');
INSERT INTO `products` VALUES ('32', 'QUẦN CULOTTE CẠP PAPER BAG', '11', 'Quần vải rũ cạp cao, ống rộng. Eo xếp li, kèm thắt lưng cùng chất liệu. Có hai túi phía trước. Cài phía trước bằng khóa kéo và khuy kim loại.', '999000', '0', '0', 'q1.webp', '2020-07-03 12:39:14', '2020-07-03 12:39:14', 'XS,S,M,L,XL', 'q3.webp,q1_2.webp');
INSERT INTO `products` VALUES ('33', ' QUẦN ỐNG THỤNG ỐNG RỘNG', '11', 'Quần cạp cao, kiểu cạp paper bag, bo thun co giãn phía sau. Có túi hai bên và túi giả may viền phía sau. Kèm thắt lưng vải cùng chất liệu.', '999000', '0', '0', 'q2.webp', '2020-07-04 12:32:46', '2020-07-04 12:32:46', 'XS,S,M,L,XL', 'q_2_4_1.webp,q2_2.webp,q2_1.webp');
INSERT INTO `products` VALUES ('34', 'QUẦN JEANS Z1975 ỐNG BÓ CẠP CAO', '11', 'Quần jeans cạp cao, có năm túi. Kiểu bạc màu. Trang trí chi tiết rách phía trước. Gấu kiểu xổ chỉ. Cài phía trước bằng khóa kéo và khuy đính đá', '999000', '0', '0', 'qj1.webp', '2020-07-03 12:52:33', null, 'S,M,L,XL', 'qj3.jpg,qj2.webp');
INSERT INTO `products` VALUES ('35', ' QUẦN JEANS BAGGY DÁNG BOYFRIEND', '11', 'Quần jeans cạp lỡ. Có túi phía trước và túi đáp phía sau. Xếp li ở cạp. Cài bằng khóa kéo.Có khóa khuy kim loại', '1199000', '0', '0', 'qjbg1.webp', '2020-07-03 20:34:41', '2020-07-03 20:34:41', 'XS,S,M,L,XL', 'qjgb3.webp,qjbg2.webp');
INSERT INTO `products` VALUES ('36', 'QUẦN JEANS BAGGY Z1975 CẠP PAPER BAG', '11', 'Quần jeans cạp cao co giãn, kiểu cạp paper bag. Có túi phía trước và túi đáp phía sau. Gấu lật. Cài khóa kéo.', '999000', '0', '0', 'qd.webp', '2020-07-03 20:35:04', '2020-07-03 20:35:04', 'S,M,L,XL', 'qd3.webp,qd2.webp,qd1.webp');
INSERT INTO `products` VALUES ('37', 'QUẦN JEANS Z1975 CÓ TÚI HỘP', '11', ' Quần jeans cạp cao, xếp li phía trước. Có túi phía trước và túi vuông có nắp hai bên ống quần. Cài phía trước.', '1199000', '0', '0', 'qh1.webp', '2020-07-03 20:35:54', '2020-07-03 20:35:54', 'XS,S,M,L', 'qh4.webp,qh3.webp,qh2.jpg');
INSERT INTO `products` VALUES ('38', 'ĐẦM VẢI SẦN RÁP BÈO', '12', 'Đầm vải rũ cổ ngang. Tay ngắn, hở vai, có hai dây đeo vai mảnh. Ráp bèo cùng màu trang trí.', '999000', '0', '0', 'd1.webp', '2020-07-03 13:15:53', null, 'S,M,L', 'd4.webp,d3.webp,d2.webp');
INSERT INTO `products` VALUES ('39', 'JUMPSUIT IN HỌA TIẾT ', '12', 'Playsuit cổ chữ V, có hai dây đeo vai mảnh. Có chi tiết buộc thắt nút ở phía trước. Cài bằng khóa kéo.', '999000', '0', '0', 'd5.webp', '2020-07-04 12:33:24', '2020-07-04 12:33:24', 'XS,S,M,L', 'd7.webp,d6.webp');
INSERT INTO `products` VALUES ('40', ' ĐẦM VẢI RŨ CÓ ĐỆM VAI', '12', 'Đầm dáng ngắn, cổ tròn. Tay sát nách, có đệm vai và nhún li. Xẻ và cài khuy sau lưng.', '999000', '0', '0', 'dvr1.webp', '2020-07-04 12:34:21', '2020-07-04 12:34:21', 'XS,S,M,L,XL', 'dvr3.webp,dvr2.webp');
INSERT INTO `products` VALUES ('41', ' ĐẦM XẾP LI CÓ ĐỆM VAI BASIC', '12', 'Đầm dáng ngắn, cổ tròn. Tay sát nách, có đệm vai. Có các chi tiết xếp li. ', '1199000', '0', '0', 'dl4.webp', '2020-07-04 12:34:54', '2020-07-04 12:34:54', 'XS,S,M,L,XL', 'dl3.webp,dl2.webp,dl1.webp');
INSERT INTO `products` VALUES ('42', ' ĐẦM DÁNG RỘNG OVERSIZE BASIC', '12', 'Đầm midi cổ tròn, tay sát nách. Túi hai bên ẩn ở đường may.', '1199000', '0', '0', 'ddr.webp', '2020-07-04 12:35:17', '2020-07-04 12:35:17', 'XS,S,M,L,XL', 'ddr4.webp,ddr3.webp,ddr2.webp');
INSERT INTO `products` VALUES ('43', ' ĐẦM DÁNG SƠ MI KẺ SỌC', '12', 'Đầm midi cổ chữ V có ve lật, vạt đắp chéo, cộc tay. Cài khuy phía trước.', '1599000', '0', '0', 'cr.webp', '2020-07-03 13:24:23', null, 'XS,S,M,L,XL', 'cr3.jpg,cr2.webp');
INSERT INTO `products` VALUES ('44', ' ÁO KHOÁC DENIM OVERSIZE', '13', 'Áo khoác oversize cổ ve lật, dài tay. Có túi may viền và túi vuông.', '1199000', '0', '0', 'dn.webp', '2020-07-03 20:39:20', '2020-07-03 20:39:20', 'XS,S,M,L', 'dn3.webp,dn2.webp');
INSERT INTO `products` VALUES ('45', 'ÁO KHOÁC BLAZER OVERSIZE VẢI RŨ', '13', 'Áo khoác blazer vải rũ, cổ ve lật, dài tay. Túi trước có viền. Cài khuy phía trước.', '1599000', '0', '0', 'ak.webp', '2020-07-03 13:39:12', null, 'XS,S,M,L,XL', 'ak4.webp,ak3.webp,ak2.webp');
INSERT INTO `products` VALUES ('46', 'ÁO KHOÁC BIKER JACKET GIẢ DA ', '13', 'Áo khoác cổ ve lật, dài tay. Túi phía trước cài khóa kéo kim loại.', '1599000', '0', '0', 'bk1.webp', '2020-07-04 12:36:37', '2020-07-04 12:36:37', 'XS,S,M,L', 'bk2.webp');
INSERT INTO `products` VALUES ('47', 'ÁO KHOÁC BLAZER KẺ CA RÔ GINGHAM PHỐI MÀU CÁ TÍNH', '13', 'Áo khoác blazer dáng lửng, chất liệu vải pha sợi linen. Cổ ve lật, dài tay.', '1999000', '0', '0', 'bcr.webp', '2020-07-04 12:37:37', '2020-07-04 12:37:37', 'XS,S,M,L,XL', 'bcr4.webp,bcr3.webp,bcr2.jpg');
INSERT INTO `products` VALUES ('48', ' ÁO KHOÁC BLAZER VẢI MUỐI TIÊU KHÔNG KHUY CÀI', '13', 'Áo khoác blazer cổ ve lật, dài tay. Túi phía trước có nắp.', '1599000', '0', '0', 'bvm.webp', '2020-07-03 13:43:52', null, 'XS,S,M,L,XL', 'bvm4.jpg,bmv3.webp,bvm2.webp');
INSERT INTO `products` VALUES ('49', 'ÁO GI LÊ CÀI KHUY ĐÔI VẢI COTTON CO GIÃN 4 CHIỀU', '13', 'Áo gi lê cổ ve lật, tay sát nách. Có hai túi có nắp phía trước.', '1599000', '0', '0', 'agl.webp', '2020-07-04 12:37:18', '2020-07-04 12:37:18', 'XS,S,M,L,XL', 'agl4.webp,agl3.webp,agl2.webp');
INSERT INTO `products` VALUES ('51', 'ÁO PHÔNG TRANG TRÍ HÌNH CHUỘT MICKEY © DISNEY', '10', 'Áo phông cổ tròn, cộc tay. In họa tiết khác màu hình nhân vật Chuột Mickey ©Disney.', '599000', '0', '0', 't2.webp', '2020-07-07 14:28:49', null, 'XS,S,M,L', 't2_1.webp');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `phone` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT '',
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('67', 'admin', 'nguyengialong9x@gmail.com', '123456', '1', '2020-07-02 17:40:09', null, '0989458598', 'đại mỗ', '1');
INSERT INTO `users` VALUES ('68', 'nguyễn diệu hương', 'sadcloudy8@gmail.com', '123456', '1', '2020-07-04 14:23:38', null, '0123456789', 'phố vọng', '2');
