-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th4 24, 2019 lúc 02:41 PM
-- Phiên bản máy phục vụ: 10.2.17-MariaDB
-- Phiên bản PHP: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `u380514009_repib`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbconfigfb`
--

CREATE TABLE `dbconfigfb` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dbconfigfb`
--

INSERT INTO `dbconfigfb` (`id`, `name`, `value`) VALUES
(1, 'sample', 'Chào bạn\r\nCho mình xin sdt bạn\r\nCửa hàng mình ở 182 lương thế vinh'),
(2, 'cookie', 'cookie'),
(3, 'idpage', '1231067173615477');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbguitinnhan`
--

CREATE TABLE `dbguitinnhan` (
  `id` int(11) NOT NULL,
  `idchat` text COLLATE utf8_unicode_ci NOT NULL,
  `ndungSend` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dbguitinnhan`
--

INSERT INTO `dbguitinnhan` (`id`, `idchat`, `ndungSend`) VALUES
(1, 't_186878438872577', 'nghiahsgs'),
(23, 't_783717668686239', 'Chào em'),
(24, 't_1137214819778214', 'Cho mình xin sdt bạn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbmember`
--

CREATE TABLE `dbmember` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `typemember` text COLLATE utf8_unicode_ci NOT NULL,
  `uutien` text COLLATE utf8_unicode_ci NOT NULL,
  `soluong` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dbmember`
--

INSERT INTO `dbmember` (`id`, `username`, `password`, `typemember`, `uutien`, `soluong`) VALUES
(4, 'member1', 'member1', 'member', '1', '59'),
(5, 'member2', 'member2', 'member', '2', '58'),
(6, 'member3', 'member3', 'member', '3', '58'),
(7, 'member4', 'member4', 'member', '4', '58'),
(9, 'admin', 'nghiahsgs', 'admin', '0', '999999999');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dbtinnhan`
--

CREATE TABLE `dbtinnhan` (
  `id` int(11) NOT NULL,
  `idchat` text COLLATE utf8_unicode_ci NOT NULL,
  `nameChat` text COLLATE utf8_unicode_ci NOT NULL,
  `uidChat` text COLLATE utf8_unicode_ci NOT NULL,
  `Snippet` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_time` text COLLATE utf8_unicode_ci NOT NULL,
  `link_read` text COLLATE utf8_unicode_ci NOT NULL,
  `ndungChat` text COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `ndungChatUnread` text COLLATE utf8_unicode_ci NOT NULL,
  `message_count` text COLLATE utf8_unicode_ci NOT NULL,
  `member` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dbtinnhan`
--

INSERT INTO `dbtinnhan` (`id`, `idchat`, `nameChat`, `uidChat`, `Snippet`, `updated_time`, `link_read`, `ndungChat`, `note`, `ndungChatUnread`, `message_count`, `member`) VALUES
(91, 't_138047190410919', 'Nguyễn Nghĩa', '100026169163354', 'Cửa hàng mình ở 182 lương thế vinh', '2018-11-01T04:41:51 0000', '', 'I:Cửa hàng mình ở 182 lương thế vinh<br>I:Cửa hàng mình ở 182 lương thế vinh<br>U:nghiahsgs<br>U:zzzzzzzzzzz<br>I:Cửa hàng mình ở 182 lương thế vinh<br>I:hi<br>U:đcm shop<br>U:uk chào shop<br>I:helloo cưng<br>I:cs e ổn không<br>I:em ăn cơm chưa<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hihih<br>U:0982149607<br>I:ad<br>I:asfd<br>I:fd<br>I:dfas<br>I:asd<br>I:sfg<br>I:hfd<br>I:yu<br>I:h<br>I:h<br>I:ghf', '', 'U:need update', '161', 'member1'),
(92, 't_2171236362900039', 'Thanh Nga', '100000410892581', 'Bạn phản hoi giúp mình', '2018-10-26T07:11:27 0000', '', 'U:Bạn phản hoi giúp mình<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Alo<br>U:Bên bạn có mâuc này k?', '', '', '8', 'member2'),
(93, 't_261003314554707', 'Lê Ngọc Linh', '100019351216543', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-09-24T11:43:31 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Xin chào, tôi muốn hỏi về bình nước cực ngầu.<br>U::> dạ shop còn bình chim cánh cụt đó hăm ạ ?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Xin chào, tôi muốn hỏi về bình nước cực ngầu.', '', '', '5', 'member3'),
(94, 't_1137214819778214', 'Pằng Chíu', '100004691194014', 'ko gửi ảnh đc', '2018-11-01T04:19:45 0000', '', 'I:ko gửi ảnh đc<br>I:hình như mk code hơi ngu<br>U:+84982149607<br>I:Cho mình xin sdt bạn<br>U:Cưng cặc<br>I:hi cưng<br>I:vc @@\ntí report bay nick nhé cưng', '', '', '19', 'member4'),
(95, 't_2180499132222243', 'Ven Kim Nguyen', '100007865324229', 'Ven sent a photo.', '2018-08-28T05:14:56 0000', '', '', '', '', '13', 'member1'),
(96, 't_327174964689779', 'Mi Lô Mi Lô', '100021918349817', 'Mi Lô sent a photo.', '2018-08-24T15:48:12 0000', '', '', '', '', '4', 'member2'),
(97, 't_1045818065758417', 'Đàm Vân', '100009906991209', 'Bình này còn k n', '2018-08-15T05:37:11 0000', '', 'U:Bình này còn k n<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member3'),
(98, 't_783717668686239', 'Nhóc Lật Đật', '100011440402610', 'Báo giá em shop oie', '2018-08-14T22:03:35 0000', '', 'U:Báo giá em shop oie', '', '', '4', 'member4'),
(99, 't_266773840781147', 'Thanh Vân', '100023455983818', 'bên shop có những mẫu mochi nào mới ạ?', '2018-08-05T06:43:39 0000', '', 'U:bên shop có những mẫu mochi nào mới ạ?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '3', 'member1'),
(100, 't_361151304305265', 'Tuyết Võ', '100012311955742', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-08-04T15:43:13 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop còn sỉ bảng tên k ạ<br>U:Dạ shop<br>I:ma the: 7503512771204, serial: 58357124991<br>U:Dạ<br>I:ok em 10 p nua shop gui<br>U:Vittel ạ<br>U:Dạ<br>I:e lấy card mạng nào<br>I:1 card 10k nhé<br>I:shop đền bù  e<br>I:chắc do nhân viên shop nhầm ấy<br>I:hix có 41 cái ạ<br>U:Shop bảo 42 mà<br>U:Shop ơi s có 41 cái à shop<br>U:Sớm hơn dự định<br>U:Dạ shop<br>I:trong hôm nay đó e<br>U:Dạ shop do e chưa nghe ng ta gọi ạ<br>I:alo em ơi hàng của e đến nơi rồi đó ạ nay người ta giao cho e đó ạ<br>U:Dạ<br>I:đúng rồi em ơi e gửi bưu tá là được<br>U:Z tc đưa cj 430k hả<br>U:Dạ<br>I:cái đó e về cứ bán tầm 20-25k ấy hàng ngoài cugnx đẹp lắm', '', '', '233', 'member2'),
(101, 't_1032840976875996', 'Hà Trang', '100004503105831', 'cái này bn tiền v shop?', '2018-07-31T15:45:26 0000', '', 'U:cái này bn tiền v shop?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member3'),
(102, 't_1645388578904867', 'Đoàn Cẩm Vân', '100003012224006', 'chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy', '2018-07-27T03:24:49 0000', '', 'U:chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:b ơi', '', '', '3', 'member4'),
(103, 't_255916571672924', 'Xuân Nguyễn', '100017637484868', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-07-16T04:18:55 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '2', 'member1'),
(104, 't_2110632509183277', 'Hiền Berry', '100007096453697', 'bên mình có kẹp tóc màu sắc k ạ', '2018-06-22T08:54:30 0000', '', 'U:bên mình có kẹp tóc màu sắc k ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có thể nhận trợ giúp từ dịch vụ chăm sóc khách hàng không?', '', '', '3', 'member2'),
(105, 't_243572519749863', 'Bích Thảo', '100022913499592', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-06-11T04:28:31 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có đèn đom đóm k ạ', '', '', '2', 'member3'),
(106, 't_2099538920293572', 'Tâm Nguyễn', '100007124535605', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-05-15T10:15:09 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có bán album ảnh không ạ', '', '', '2', 'member4'),
(107, 't_169073090584689', '阮氏明月', '100024459963677', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-04-24T15:17:06 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có được xem giá sản phẩm không?', '', '', '2', 'member1'),
(108, 't_183060509176761', 'Han Han', '100024184401568', 'bn 1 chai ạ', '2018-04-24T12:17:26 0000', '', 'U:bn 1 chai ạ', '', '', '4', 'member2'),
(109, 't_367784137072662', 'Lanh Anna', '100015232367142', 'Ship vê hải phòng bn ạ?', '2018-04-21T09:38:42 0000', '', 'U:Ship vê hải phòng bn ạ?', '', '', '4', 'member3'),
(110, 't_227954394428039', 'Nguyễn Hương', '100016404395809', 'K có hàng nữa nha bạn', '2018-04-20T13:47:15 0000', '', 'I:K có hàng nữa nha bạn<br>U:J chừng nào hàg về ạ<br>I:Mặt hàng này hết r ạ<br>U:E cần gấp shop ơi<br>U:Chừng nào e mới đặt đơn hàng đc j ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Một hộp bút hello kity màu xanh nước vs hộp bút totoro màu hồng ạ', '', '', '32', 'member4'),
(111, 't_204411383669566', 'Pham Huong Quy', '100023021164831', 'Shop có kính này kh ạ', '2018-04-19T07:22:40 0000', '', 'U:Shop có kính này kh ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member1'),
(112, 't_274587233032858', 'Minh Thư', '100014447503575', 'Shop bán đồng hồ đúng ko ạ', '2018-04-08T01:11:18 0000', '', 'U:Shop bán đồng hồ đúng ko ạ<br>U:Shop ơi<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Shop ơiiiiiiii<br>U:Shop ơi', '', '', '10', 'member2'),
(113, 't_359969361185967', 'Vi Vi', '100015187170732', 'Vi sent a photo.', '2018-04-01T04:39:32 0000', '', '', '', '', '11', 'member3'),
(114, 't_2194439074116952', 'Nguyễn Bá Nghĩa', '100006526419466', 'a', '2018-03-27T11:21:38 0000', '', 'I:a<br>I:nghiahsgs<br>I:nghiahsgs<br>I:nghiahsgs<br>I:nghiahsgs<br>U:test<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hi<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hi', '', '', '10', 'member4'),
(115, 't_128412987787488', 'Song Joong Ki', '100018563616809', 'shop không nha em', '2018-03-24T13:33:31 0000', '', 'I:shop không nha em<br>U:dạ shop in hình lên hộp bút ko ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:shop ơi<br>U:Dạ<br>I:^.^ e ơi e đánh giá cho shop lên 5 * với ạ huhu<br>U:????????????<br>U:Dạ', '', '', '168', 'member1'),
(117, 't_204292380464516', 'Thảo Phương', '100026512652857', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-11-01T03:52:34 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Ai đó có thể hỗ trợ cho tôi không?', '', '', '2', 'member3'),
(118, 't_743422899340148', 'Tiwi Andiny', '100010173342431', 'test', '2018-11-01T04:08:09 0000', '', 'U:test<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hi shop', '', '', '3', 'member4'),
(119, 't_138047190410919', 'Nguyễn Nghĩa', '100026169163354', 'Cửa hàng mình ở 182 lương thế vinh', '2018-11-01T04:41:51 0000', '', 'I:Cửa hàng mình ở 182 lương thế vinh<br>I:Cửa hàng mình ở 182 lương thế vinh<br>U:nghiahsgs<br>U:zzzzzzzzzzz<br>I:Cửa hàng mình ở 182 lương thế vinh<br>I:hi<br>U:đcm shop<br>U:uk chào shop<br>I:helloo cưng<br>I:cs e ổn không<br>I:em ăn cơm chưa<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hihih<br>U:0982149607<br>I:ad<br>I:asfd<br>I:fd<br>I:dfas<br>I:asd<br>I:sfg<br>I:hfd<br>I:yu<br>I:h<br>I:h<br>I:ghf', '', 'U:need update', '161', 'member1'),
(120, 't_1137214819778214', 'Pằng Chíu', '100004691194014', 'ko gửi ảnh đc', '2018-11-01T04:19:45 0000', '', 'I:ko gửi ảnh đc<br>I:hình như mk code hơi ngu<br>U:+84982149607<br>I:Cho mình xin sdt bạn<br>U:Cưng cặc<br>I:hi cưng<br>I:vc @@\ntí report bay nick nhé cưng', '', '', '19', 'member2'),
(121, 't_743422899340148', 'Tiwi Andiny', '100010173342431', 'test', '2018-11-01T04:08:09 0000', '', 'U:test<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hi shop', '', '', '3', 'member3'),
(122, 't_204292380464516', 'Thảo Phương', '100026512652857', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-11-01T03:52:34 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Ai đó có thể hỗ trợ cho tôi không?', '', '', '2', 'member4'),
(123, 't_2171236362900039', 'Thanh Nga', '100000410892581', 'Bạn phản hoi giúp mình', '2018-10-26T07:11:27 0000', '', 'U:Bạn phản hoi giúp mình<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Alo<br>U:Bên bạn có mâuc này k?', '', '', '8', 'member1'),
(124, 't_261003314554707', 'Lê Ngọc Linh', '100019351216543', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-09-24T11:43:31 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Xin chào, tôi muốn hỏi về bình nước cực ngầu.<br>U::> dạ shop còn bình chim cánh cụt đó hăm ạ ?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Xin chào, tôi muốn hỏi về bình nước cực ngầu.', '', '', '5', 'member2'),
(125, 't_2180499132222243', 'Ven Kim Nguyen', '100007865324229', 'Ven sent a photo.', '2018-08-28T05:14:56 0000', '', '', '', '', '13', 'member3'),
(126, 't_327174964689779', 'Mi Lô Mi Lô', '100021918349817', 'Mi Lô sent a photo.', '2018-08-24T15:48:12 0000', '', '', '', '', '4', 'member4'),
(127, 't_1045818065758417', 'Đàm Vân', '100009906991209', 'Bình này còn k n', '2018-08-15T05:37:11 0000', '', 'U:Bình này còn k n<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member1'),
(128, 't_783717668686239', 'Nhóc Lật Đật', '100011440402610', 'Báo giá em shop oie', '2018-08-14T22:03:35 0000', '', 'U:Báo giá em shop oie', '', '', '4', 'member2'),
(129, 't_266773840781147', 'Thanh Vân', '100023455983818', 'bên shop có những mẫu mochi nào mới ạ?', '2018-08-05T06:43:39 0000', '', 'U:bên shop có những mẫu mochi nào mới ạ?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '3', 'member3'),
(130, 't_361151304305265', 'Tuyết Võ', '100012311955742', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-08-04T15:43:13 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop còn sỉ bảng tên k ạ<br>U:Dạ shop<br>I:ma the: 7503512771204, serial: 58357124991<br>U:Dạ<br>I:ok em 10 p nua shop gui<br>U:Vittel ạ<br>U:Dạ<br>I:e lấy card mạng nào<br>I:1 card 10k nhé<br>I:shop đền bù  e<br>I:chắc do nhân viên shop nhầm ấy<br>I:hix có 41 cái ạ<br>U:Shop bảo 42 mà<br>U:Shop ơi s có 41 cái à shop<br>U:Sớm hơn dự định<br>U:Dạ shop<br>I:trong hôm nay đó e<br>U:Dạ shop do e chưa nghe ng ta gọi ạ<br>I:alo em ơi hàng của e đến nơi rồi đó ạ nay người ta giao cho e đó ạ<br>U:Dạ<br>I:đúng rồi em ơi e gửi bưu tá là được<br>U:Z tc đưa cj 430k hả<br>U:Dạ<br>I:cái đó e về cứ bán tầm 20-25k ấy hàng ngoài cugnx đẹp lắm', '', '', '233', 'member4'),
(131, 't_1032840976875996', 'Hà Trang', '100004503105831', 'cái này bn tiền v shop?', '2018-07-31T15:45:26 0000', '', 'U:cái này bn tiền v shop?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member1'),
(132, 't_1645388578904867', 'Đoàn Cẩm Vân', '100003012224006', 'chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy', '2018-07-27T03:24:49 0000', '', 'U:chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:b ơi', '', '', '3', 'member2'),
(133, 't_255916571672924', 'Xuân Nguyễn', '100017637484868', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-07-16T04:18:55 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '2', 'member3'),
(134, 't_2110632509183277', 'Hiền Berry', '100007096453697', 'bên mình có kẹp tóc màu sắc k ạ', '2018-06-22T08:54:30 0000', '', 'U:bên mình có kẹp tóc màu sắc k ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có thể nhận trợ giúp từ dịch vụ chăm sóc khách hàng không?', '', '', '3', 'member4'),
(135, 't_243572519749863', 'Bích Thảo', '100022913499592', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-06-11T04:28:31 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có đèn đom đóm k ạ', '', '', '2', 'member1'),
(136, 't_2099538920293572', 'Tâm Nguyễn', '100007124535605', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-05-15T10:15:09 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có bán album ảnh không ạ', '', '', '2', 'member2'),
(137, 't_169073090584689', '阮氏明月', '100024459963677', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-04-24T15:17:06 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có được xem giá sản phẩm không?', '', '', '2', 'member3'),
(138, 't_183060509176761', 'Han Han', '100024184401568', 'bn 1 chai ạ', '2018-04-24T12:17:26 0000', '', 'U:bn 1 chai ạ', '', '', '4', 'member4'),
(139, 't_367784137072662', 'Lanh Anna', '100015232367142', 'Ship vê hải phòng bn ạ?', '2018-04-21T09:38:42 0000', '', 'U:Ship vê hải phòng bn ạ?', '', '', '4', 'member1'),
(140, 't_227954394428039', 'Nguyễn Hương', '100016404395809', 'K có hàng nữa nha bạn', '2018-04-20T13:47:15 0000', '', 'I:K có hàng nữa nha bạn<br>U:J chừng nào hàg về ạ<br>I:Mặt hàng này hết r ạ<br>U:E cần gấp shop ơi<br>U:Chừng nào e mới đặt đơn hàng đc j ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Một hộp bút hello kity màu xanh nước vs hộp bút totoro màu hồng ạ', '', '', '32', 'member2'),
(141, 't_204411383669566', 'Pham Huong Quy', '100023021164831', 'Shop có kính này kh ạ', '2018-04-19T07:22:40 0000', '', 'U:Shop có kính này kh ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member3'),
(142, 't_274587233032858', 'Minh Thư', '100014447503575', 'Shop bán đồng hồ đúng ko ạ', '2018-04-08T01:11:18 0000', '', 'U:Shop bán đồng hồ đúng ko ạ<br>U:Shop ơi<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Shop ơiiiiiiii<br>U:Shop ơi', '', '', '10', 'member4'),
(143, 't_359969361185967', 'Vi Vi', '100015187170732', 'Vi sent a photo.', '2018-04-01T04:39:32 0000', '', '', '', '', '11', 'member1'),
(144, '', '', '', '', '', '', '', '', '', '', 'member2'),
(145, 't_138047190410919', 'Nguyễn Nghĩa', '100026169163354', 'Cửa hàng mình ở 182 lương thế vinh', '2018-11-01T04:41:51 0000', '', 'I:Cửa hàng mình ở 182 lương thế vinh<br>I:Cửa hàng mình ở 182 lương thế vinh<br>U:nghiahsgs<br>U:zzzzzzzzzzz<br>I:Cửa hàng mình ở 182 lương thế vinh<br>I:hi<br>U:đcm shop<br>U:uk chào shop<br>I:helloo cưng<br>I:cs e ổn không<br>I:em ăn cơm chưa<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hihih<br>U:0982149607<br>I:ad<br>I:asfd<br>I:fd<br>I:dfas<br>I:asd<br>I:sfg<br>I:hfd<br>I:yu<br>I:h<br>I:h<br>I:ghf', '', '', '161', 'member3'),
(146, 't_1137214819778214', 'Pằng Chíu', '100004691194014', 'ko gửi ảnh đc', '2018-11-01T04:19:45 0000', '', 'I:ko gửi ảnh đc<br>I:hình như mk code hơi ngu<br>U:+84982149607<br>I:Cho mình xin sdt bạn<br>U:Cưng cặc<br>I:hi cưng<br>I:vc @@\ntí report bay nick nhé cưng', '', '', '19', 'member4'),
(147, 't_743422899340148', 'Tiwi Andiny', '100010173342431', 'test', '2018-11-01T04:08:09 0000', '', 'U:test<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hi shop', '', '', '3', 'member1'),
(148, 't_204292380464516', 'Thảo Phương', '100026512652857', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-11-01T03:52:34 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Ai đó có thể hỗ trợ cho tôi không?', '', '', '2', 'member2'),
(149, 't_2171236362900039', 'Thanh Nga', '100000410892581', 'Bạn phản hoi giúp mình', '2018-10-26T07:11:27 0000', '', 'U:Bạn phản hoi giúp mình<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Alo<br>U:Bên bạn có mâuc này k?', '', '', '8', 'member3'),
(150, 't_261003314554707', 'Lê Ngọc Linh', '100019351216543', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-09-24T11:43:31 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Xin chào, tôi muốn hỏi về bình nước cực ngầu.<br>U::> dạ shop còn bình chim cánh cụt đó hăm ạ ?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Xin chào, tôi muốn hỏi về bình nước cực ngầu.', '', '', '5', 'member4'),
(151, 't_2180499132222243', 'Ven Kim Nguyen', '100007865324229', 'Ven sent a photo.', '2018-08-28T05:14:56 0000', '', '', '', '', '13', 'member1'),
(152, 't_327174964689779', 'Mi Lô Mi Lô', '100021918349817', 'Mi Lô sent a photo.', '2018-08-24T15:48:12 0000', '', '', '', '', '4', 'member2'),
(153, 't_1045818065758417', 'Đàm Vân', '100009906991209', 'Bình này còn k n', '2018-08-15T05:37:11 0000', '', 'U:Bình này còn k n<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member3'),
(154, 't_783717668686239', 'Nhóc Lật Đật', '100011440402610', 'Báo giá em shop oie', '2018-08-14T22:03:35 0000', '', 'U:Báo giá em shop oie', '', '', '4', 'member4'),
(155, 't_266773840781147', 'Thanh Vân', '100023455983818', 'bên shop có những mẫu mochi nào mới ạ?', '2018-08-05T06:43:39 0000', '', 'U:bên shop có những mẫu mochi nào mới ạ?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '3', 'member1'),
(156, 't_361151304305265', 'Tuyết Võ', '100012311955742', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-08-04T15:43:13 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop còn sỉ bảng tên k ạ<br>U:Dạ shop<br>I:ma the: 7503512771204, serial: 58357124991<br>U:Dạ<br>I:ok em 10 p nua shop gui<br>U:Vittel ạ<br>U:Dạ<br>I:e lấy card mạng nào<br>I:1 card 10k nhé<br>I:shop đền bù  e<br>I:chắc do nhân viên shop nhầm ấy<br>I:hix có 41 cái ạ<br>U:Shop bảo 42 mà<br>U:Shop ơi s có 41 cái à shop<br>U:Sớm hơn dự định<br>U:Dạ shop<br>I:trong hôm nay đó e<br>U:Dạ shop do e chưa nghe ng ta gọi ạ<br>I:alo em ơi hàng của e đến nơi rồi đó ạ nay người ta giao cho e đó ạ<br>U:Dạ<br>I:đúng rồi em ơi e gửi bưu tá là được<br>U:Z tc đưa cj 430k hả<br>U:Dạ<br>I:cái đó e về cứ bán tầm 20-25k ấy hàng ngoài cugnx đẹp lắm', '', '', '233', 'member2'),
(157, 't_1032840976875996', 'Hà Trang', '100004503105831', 'cái này bn tiền v shop?', '2018-07-31T15:45:26 0000', '', 'U:cái này bn tiền v shop?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member3'),
(158, 't_1645388578904867', 'Đoàn Cẩm Vân', '100003012224006', 'chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy', '2018-07-27T03:24:49 0000', '', 'U:chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:b ơi', '', '', '3', 'member4'),
(159, 't_255916571672924', 'Xuân Nguyễn', '100017637484868', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-07-16T04:18:55 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '2', 'member1'),
(160, 't_2110632509183277', 'Hiền Berry', '100007096453697', 'bên mình có kẹp tóc màu sắc k ạ', '2018-06-22T08:54:30 0000', '', 'U:bên mình có kẹp tóc màu sắc k ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có thể nhận trợ giúp từ dịch vụ chăm sóc khách hàng không?', '', '', '3', 'member2'),
(161, 't_243572519749863', 'Bích Thảo', '100022913499592', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-06-11T04:28:31 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có đèn đom đóm k ạ', '', '', '2', 'member3'),
(162, 't_2099538920293572', 'Tâm Nguyễn', '100007124535605', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-05-15T10:15:09 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có bán album ảnh không ạ', '', '', '2', 'member4'),
(163, 't_169073090584689', '阮氏明月', '100024459963677', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-04-24T15:17:06 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có được xem giá sản phẩm không?', '', '', '2', 'member1'),
(164, 't_183060509176761', 'Han Han', '100024184401568', 'bn 1 chai ạ', '2018-04-24T12:17:26 0000', '', 'U:bn 1 chai ạ', '', '', '4', 'member2'),
(165, 't_367784137072662', 'Lanh Anna', '100015232367142', 'Ship vê hải phòng bn ạ?', '2018-04-21T09:38:42 0000', '', 'U:Ship vê hải phòng bn ạ?', '', '', '4', 'member3'),
(166, 't_227954394428039', 'Nguyễn Hương', '100016404395809', 'K có hàng nữa nha bạn', '2018-04-20T13:47:15 0000', '', 'I:K có hàng nữa nha bạn<br>U:J chừng nào hàg về ạ<br>I:Mặt hàng này hết r ạ<br>U:E cần gấp shop ơi<br>U:Chừng nào e mới đặt đơn hàng đc j ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Một hộp bút hello kity màu xanh nước vs hộp bút totoro màu hồng ạ', '', '', '32', 'member4'),
(167, 't_204411383669566', 'Pham Huong Quy', '100023021164831', 'Shop có kính này kh ạ', '2018-04-19T07:22:40 0000', '', 'U:Shop có kính này kh ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member1'),
(168, 't_274587233032858', 'Minh Thư', '100014447503575', 'Shop bán đồng hồ đúng ko ạ', '2018-04-08T01:11:18 0000', '', 'U:Shop bán đồng hồ đúng ko ạ<br>U:Shop ơi<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Shop ơiiiiiiii<br>U:Shop ơi', '', '', '10', 'member2'),
(169, 't_359969361185967', 'Vi Vi', '100015187170732', 'Vi sent a photo.', '2018-04-01T04:39:32 0000', '', '', '', '', '11', 'member3'),
(170, '', '', '', '', '', '', '', '', '', '', 'member4'),
(171, 't_1032840976875996', 'Hà Trang', '100004503105831', 'cái này bn tiền v shop?', '2018-07-31T15:45:26 0000', '', 'U:cái này bn tiền v shop?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member1'),
(172, 't_1645388578904867', 'Đoàn Cẩm Vân', '100003012224006', 'chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy', '2018-07-27T03:24:49 0000', '', 'U:chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:b ơi', '', '', '3', 'member2'),
(173, 't_255916571672924', 'Xuân Nguyễn', '100017637484868', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-07-16T04:18:55 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '2', 'member3'),
(174, 't_2110632509183277', 'Hiền Berry', '100007096453697', 'bên mình có kẹp tóc màu sắc k ạ', '2018-06-22T08:54:30 0000', '', 'U:bên mình có kẹp tóc màu sắc k ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có thể nhận trợ giúp từ dịch vụ chăm sóc khách hàng không?', '', '', '3', 'member4'),
(175, 't_243572519749863', 'Bích Thảo', '100022913499592', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-06-11T04:28:31 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có đèn đom đóm k ạ', '', '', '2', 'member1'),
(176, 't_2099538920293572', 'Tâm Nguyễn', '100007124535605', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-05-15T10:15:09 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có bán album ảnh không ạ', '', '', '2', 'member2'),
(177, 't_169073090584689', '阮氏明月', '100024459963677', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-04-24T15:17:06 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có được xem giá sản phẩm không?', '', '', '2', 'member3'),
(178, 't_183060509176761', 'Han Han', '100024184401568', 'bn 1 chai ạ', '2018-04-24T12:17:26 0000', '', 'U:bn 1 chai ạ', '', '', '4', 'member4'),
(179, 't_367784137072662', 'Lanh Anna', '100015232367142', 'Ship vê hải phòng bn ạ?', '2018-04-21T09:38:42 0000', '', 'U:Ship vê hải phòng bn ạ?', '', '', '4', 'member1'),
(180, 't_227954394428039', 'Nguyễn Hương', '100016404395809', 'K có hàng nữa nha bạn', '2018-04-20T13:47:15 0000', '', 'I:K có hàng nữa nha bạn<br>U:J chừng nào hàg về ạ<br>I:Mặt hàng này hết r ạ<br>U:E cần gấp shop ơi<br>U:Chừng nào e mới đặt đơn hàng đc j ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Một hộp bút hello kity màu xanh nước vs hộp bút totoro màu hồng ạ', '', '', '32', 'member2'),
(181, 't_204411383669566', 'Pham Huong Quy', '100023021164831', 'Shop có kính này kh ạ', '2018-04-19T07:22:40 0000', '', 'U:Shop có kính này kh ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member3'),
(182, 't_274587233032858', 'Minh Thư', '100014447503575', 'Shop bán đồng hồ đúng ko ạ', '2018-04-08T01:11:18 0000', '', 'U:Shop bán đồng hồ đúng ko ạ<br>U:Shop ơi<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Shop ơiiiiiiii<br>U:Shop ơi', '', '', '10', 'member4'),
(183, 't_359969361185967', 'Vi Vi', '100015187170732', 'Vi sent a photo.', '2018-04-01T04:39:32 0000', '', '', '', '', '11', 'member1'),
(184, '', '', '', '', '', '', '', '', '', '', 'member2'),
(185, 't_138047190410919', 'Nguyễn Nghĩa', '100026169163354', 'Cửa hàng mình ở 182 lương thế vinh', '2018-11-01T04:41:51 0000', '', 'I:Cửa hàng mình ở 182 lương thế vinh<br>I:Cửa hàng mình ở 182 lương thế vinh<br>U:nghiahsgs<br>U:zzzzzzzzzzz<br>I:Cửa hàng mình ở 182 lương thế vinh<br>I:hi<br>U:đcm shop<br>U:uk chào shop<br>I:helloo cưng<br>I:cs e ổn không<br>I:em ăn cơm chưa<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hihih<br>U:0982149607<br>I:ad<br>I:asfd<br>I:fd<br>I:dfas<br>I:asd<br>I:sfg<br>I:hfd<br>I:yu<br>I:h<br>I:h<br>I:ghf', '', '', '161', 'member3'),
(186, 't_743422899340148', 'Tiwi Andiny', '100010173342431', 'test', '2018-11-01T04:08:09 0000', '', 'U:test<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hi shop', '', '', '3', 'member3'),
(187, 't_204292380464516', 'Thảo Phương', '100026512652857', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-11-01T03:52:34 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Ai đó có thể hỗ trợ cho tôi không?', '', '', '2', 'member3'),
(188, 't_2171236362900039', 'Thanh Nga', '100000410892581', 'Bạn phản hoi giúp mình', '2018-10-26T07:11:27 0000', '', 'U:Bạn phản hoi giúp mình<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Alo<br>U:Bên bạn có mâuc này k?', '', '', '8', 'member3'),
(189, 't_783717668686239', 'Nhóc Lật Đật', '100011440402610', 'Báo giá em shop oie', '2018-08-14T22:03:35 0000', '', 'U:Báo giá em shop oie', '', '', '4', 'member1'),
(190, 't_266773840781147', 'Thanh Vân', '100023455983818', 'bên shop có những mẫu mochi nào mới ạ?', '2018-08-05T06:43:39 0000', '', 'U:bên shop có những mẫu mochi nào mới ạ?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '3', 'member2'),
(191, 't_361151304305265', 'Tuyết Võ', '100012311955742', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-08-04T15:43:13 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop còn sỉ bảng tên k ạ<br>U:Dạ shop<br>I:ma the: 7503512771204, serial: 58357124991<br>U:Dạ<br>I:ok em 10 p nua shop gui<br>U:Vittel ạ<br>U:Dạ<br>I:e lấy card mạng nào<br>I:1 card 10k nhé<br>I:shop đền bù  e<br>I:chắc do nhân viên shop nhầm ấy<br>I:hix có 41 cái ạ<br>U:Shop bảo 42 mà<br>U:Shop ơi s có 41 cái à shop<br>U:Sớm hơn dự định<br>U:Dạ shop<br>I:trong hôm nay đó e<br>U:Dạ shop do e chưa nghe ng ta gọi ạ<br>I:alo em ơi hàng của e đến nơi rồi đó ạ nay người ta giao cho e đó ạ<br>U:Dạ<br>I:đúng rồi em ơi e gửi bưu tá là được<br>U:Z tc đưa cj 430k hả<br>U:Dạ<br>I:cái đó e về cứ bán tầm 20-25k ấy hàng ngoài cugnx đẹp lắm', '', '', '233', 'member3'),
(192, 't_1032840976875996', 'Hà Trang', '100004503105831', 'cái này bn tiền v shop?', '2018-07-31T15:45:26 0000', '', 'U:cái này bn tiền v shop?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member4'),
(193, 't_1645388578904867', 'Đoàn Cẩm Vân', '100003012224006', 'chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy', '2018-07-27T03:24:49 0000', '', 'U:chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:b ơi', '', '', '3', 'member1'),
(194, 't_255916571672924', 'Xuân Nguyễn', '100017637484868', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-07-16T04:18:55 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '2', 'member2'),
(195, 't_2110632509183277', 'Hiền Berry', '100007096453697', 'bên mình có kẹp tóc màu sắc k ạ', '2018-06-22T08:54:30 0000', '', 'U:bên mình có kẹp tóc màu sắc k ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có thể nhận trợ giúp từ dịch vụ chăm sóc khách hàng không?', '', '', '3', 'member3'),
(196, 't_243572519749863', 'Bích Thảo', '100022913499592', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-06-11T04:28:31 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có đèn đom đóm k ạ', '', '', '2', 'member4'),
(197, 't_2099538920293572', 'Tâm Nguyễn', '100007124535605', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-05-15T10:15:09 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có bán album ảnh không ạ', '', '', '2', 'member1'),
(198, 't_169073090584689', '阮氏明月', '100024459963677', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-04-24T15:17:06 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có được xem giá sản phẩm không?', '', '', '2', 'member2'),
(199, 't_183060509176761', 'Han Han', '100024184401568', 'bn 1 chai ạ', '2018-04-24T12:17:26 0000', '', 'U:bn 1 chai ạ', '', '', '4', 'member3'),
(200, 't_367784137072662', 'Lanh Anna', '100015232367142', 'Ship vê hải phòng bn ạ?', '2018-04-21T09:38:42 0000', '', 'U:Ship vê hải phòng bn ạ?', '', '', '4', 'member4'),
(201, 't_227954394428039', 'Nguyễn Hương', '100016404395809', 'K có hàng nữa nha bạn', '2018-04-20T13:47:15 0000', '', 'I:K có hàng nữa nha bạn<br>U:J chừng nào hàg về ạ<br>I:Mặt hàng này hết r ạ<br>U:E cần gấp shop ơi<br>U:Chừng nào e mới đặt đơn hàng đc j ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Một hộp bút hello kity màu xanh nước vs hộp bút totoro màu hồng ạ', '', '', '32', 'member1'),
(202, 't_204411383669566', 'Pham Huong Quy', '100023021164831', 'Shop có kính này kh ạ', '2018-04-19T07:22:40 0000', '', 'U:Shop có kính này kh ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member2'),
(203, 't_274587233032858', 'Minh Thư', '100014447503575', 'Shop bán đồng hồ đúng ko ạ', '2018-04-08T01:11:18 0000', '', 'U:Shop bán đồng hồ đúng ko ạ<br>U:Shop ơi<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Shop ơiiiiiiii<br>U:Shop ơi', '', '', '10', 'member3'),
(204, 't_359969361185967', 'Vi Vi', '100015187170732', 'Vi sent a photo.', '2018-04-01T04:39:32 0000', '', '', '', '', '11', 'member4'),
(205, '', '', '', '', '', '', '', '', '', '', 'member1'),
(206, 't_138047190410919', 'Nguyễn Nghĩa', '100026169163354', 'Cửa hàng mình ở 182 lương thế vinh', '2018-11-01T04:41:51 0000', '', 'I:Cửa hàng mình ở 182 lương thế vinh<br>I:Cửa hàng mình ở 182 lương thế vinh<br>U:nghiahsgs<br>U:zzzzzzzzzzz<br>I:Cửa hàng mình ở 182 lương thế vinh<br>I:hi<br>U:đcm shop<br>U:uk chào shop<br>I:helloo cưng<br>I:cs e ổn không<br>I:em ăn cơm chưa<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hihih<br>U:0982149607<br>I:ad<br>I:asfd<br>I:fd<br>I:dfas<br>I:asd<br>I:sfg<br>I:hfd<br>I:yu<br>I:h<br>I:h<br>I:ghf', '', '', '161', 'member2'),
(207, 't_1137214819778214', 'Pằng Chíu', '100004691194014', 'ko gửi ảnh đc', '2018-11-01T04:19:45 0000', '', 'I:ko gửi ảnh đc<br>I:hình như mk code hơi ngu<br>U:+84982149607<br>I:Cho mình xin sdt bạn<br>U:Cưng cặc<br>I:hi cưng<br>I:vc @@\ntí report bay nick nhé cưng', '', '', '19', 'member3'),
(208, 't_743422899340148', 'Tiwi Andiny', '100010173342431', 'test', '2018-11-01T04:08:09 0000', '', 'U:test<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hi shop', '', '', '3', 'member4'),
(209, 't_204292380464516', 'Thảo Phương', '100026512652857', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-11-01T03:52:34 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Ai đó có thể hỗ trợ cho tôi không?', '', '', '2', 'member1'),
(210, 't_2171236362900039', 'Thanh Nga', '100000410892581', 'Bạn phản hoi giúp mình', '2018-10-26T07:11:27 0000', '', 'U:Bạn phản hoi giúp mình<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Alo<br>U:Bên bạn có mâuc này k?', '', '', '8', 'member2'),
(211, 't_261003314554707', 'Lê Ngọc Linh', '100019351216543', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-09-24T11:43:31 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Xin chào, tôi muốn hỏi về bình nước cực ngầu.<br>U::> dạ shop còn bình chim cánh cụt đó hăm ạ ?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Xin chào, tôi muốn hỏi về bình nước cực ngầu.', '', '', '5', 'member3'),
(212, 't_2180499132222243', 'Ven Kim Nguyen', '100007865324229', 'Ven sent a photo.', '2018-08-28T05:14:56 0000', '', '', '', '', '13', 'member4'),
(213, 't_327174964689779', 'Mi Lô Mi Lô', '100021918349817', 'Mi Lô sent a photo.', '2018-08-24T15:48:12 0000', '', '', '', '', '4', 'member1'),
(214, 't_1045818065758417', 'Đàm Vân', '100009906991209', 'Bình này còn k n', '2018-08-15T05:37:11 0000', '', 'U:Bình này còn k n<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member2'),
(215, 't_783717668686239', 'Nhóc Lật Đật', '100011440402610', 'Báo giá em shop oie', '2018-08-14T22:03:35 0000', '', 'U:Báo giá em shop oie', '', '', '4', 'member3'),
(216, 't_266773840781147', 'Thanh Vân', '100023455983818', 'bên shop có những mẫu mochi nào mới ạ?', '2018-08-05T06:43:39 0000', '', 'U:bên shop có những mẫu mochi nào mới ạ?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '3', 'member4'),
(217, 't_361151304305265', 'Tuyết Võ', '100012311955742', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-08-04T15:43:13 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop còn sỉ bảng tên k ạ<br>U:Dạ shop<br>I:ma the: 7503512771204, serial: 58357124991<br>U:Dạ<br>I:ok em 10 p nua shop gui<br>U:Vittel ạ<br>U:Dạ<br>I:e lấy card mạng nào<br>I:1 card 10k nhé<br>I:shop đền bù  e<br>I:chắc do nhân viên shop nhầm ấy<br>I:hix có 41 cái ạ<br>U:Shop bảo 42 mà<br>U:Shop ơi s có 41 cái à shop<br>U:Sớm hơn dự định<br>U:Dạ shop<br>I:trong hôm nay đó e<br>U:Dạ shop do e chưa nghe ng ta gọi ạ<br>I:alo em ơi hàng của e đến nơi rồi đó ạ nay người ta giao cho e đó ạ<br>U:Dạ<br>I:đúng rồi em ơi e gửi bưu tá là được<br>U:Z tc đưa cj 430k hả<br>U:Dạ<br>I:cái đó e về cứ bán tầm 20-25k ấy hàng ngoài cugnx đẹp lắm', '', '', '233', 'member1'),
(218, 't_1032840976875996', 'Hà Trang', '100004503105831', 'cái này bn tiền v shop?', '2018-07-31T15:45:26 0000', '', 'U:cái này bn tiền v shop?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member2'),
(219, 't_1645388578904867', 'Đoàn Cẩm Vân', '100003012224006', 'chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy', '2018-07-27T03:24:49 0000', '', 'U:chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:b ơi', '', '', '3', 'member3'),
(220, 't_255916571672924', 'Xuân Nguyễn', '100017637484868', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-07-16T04:18:55 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '2', 'member4'),
(221, 't_2110632509183277', 'Hiền Berry', '100007096453697', 'bên mình có kẹp tóc màu sắc k ạ', '2018-06-22T08:54:30 0000', '', 'U:bên mình có kẹp tóc màu sắc k ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có thể nhận trợ giúp từ dịch vụ chăm sóc khách hàng không?', '', '', '3', 'member1'),
(222, 't_243572519749863', 'Bích Thảo', '100022913499592', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-06-11T04:28:31 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có đèn đom đóm k ạ', '', '', '2', 'member2'),
(223, 't_2099538920293572', 'Tâm Nguyễn', '100007124535605', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-05-15T10:15:09 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có bán album ảnh không ạ', '', '', '2', 'member3'),
(224, 't_169073090584689', '阮氏明月', '100024459963677', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-04-24T15:17:06 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có được xem giá sản phẩm không?', '', '', '2', 'member4'),
(225, 't_183060509176761', 'Han Han', '100024184401568', 'bn 1 chai ạ', '2018-04-24T12:17:26 0000', '', 'U:bn 1 chai ạ', '', '', '4', 'member1'),
(226, 't_367784137072662', 'Lanh Anna', '100015232367142', 'Ship vê hải phòng bn ạ?', '2018-04-21T09:38:42 0000', '', 'U:Ship vê hải phòng bn ạ?', '', '', '4', 'member2'),
(227, 't_227954394428039', 'Nguyễn Hương', '100016404395809', 'K có hàng nữa nha bạn', '2018-04-20T13:47:15 0000', '', 'I:K có hàng nữa nha bạn<br>U:J chừng nào hàg về ạ<br>I:Mặt hàng này hết r ạ<br>U:E cần gấp shop ơi<br>U:Chừng nào e mới đặt đơn hàng đc j ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Một hộp bút hello kity màu xanh nước vs hộp bút totoro màu hồng ạ', '', '', '32', 'member3'),
(228, 't_204411383669566', 'Pham Huong Quy', '100023021164831', 'Shop có kính này kh ạ', '2018-04-19T07:22:40 0000', '', 'U:Shop có kính này kh ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member4'),
(229, 't_274587233032858', 'Minh Thư', '100014447503575', 'Shop bán đồng hồ đúng ko ạ', '2018-04-08T01:11:18 0000', '', 'U:Shop bán đồng hồ đúng ko ạ<br>U:Shop ơi<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Shop ơiiiiiiii<br>U:Shop ơi', '', '', '10', 'member1'),
(230, 't_359969361185967', 'Vi Vi', '100015187170732', 'Vi sent a photo.', '2018-04-01T04:39:32 0000', '', '', '', '', '11', 'member2'),
(231, '', '', '', '', '', '', '', '', '', '', 'member3'),
(232, 't_138047190410919', 'Nguyễn Nghĩa', '100026169163354', 'Cửa hàng mình ở 182 lương thế vinh', '2018-11-01T04:41:51 0000', '', 'I:Cửa hàng mình ở 182 lương thế vinh<br>I:Cửa hàng mình ở 182 lương thế vinh<br>U:nghiahsgs<br>U:zzzzzzzzzzz<br>I:Cửa hàng mình ở 182 lương thế vinh<br>I:hi<br>U:đcm shop<br>U:uk chào shop<br>I:helloo cưng<br>I:cs e ổn không<br>I:em ăn cơm chưa<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hihih<br>U:0982149607<br>I:ad<br>I:asfd<br>I:fd<br>I:dfas<br>I:asd<br>I:sfg<br>I:hfd<br>I:yu<br>I:h<br>I:h<br>I:ghf', '', '', '161', 'member4'),
(233, 't_1137214819778214', 'Pằng Chíu', '100004691194014', 'ko gửi ảnh đc', '2018-11-01T04:19:45 0000', '', 'I:ko gửi ảnh đc<br>I:hình như mk code hơi ngu<br>U:+84982149607<br>I:Cho mình xin sdt bạn<br>U:Cưng cặc<br>I:hi cưng<br>I:vc @@\ntí report bay nick nhé cưng', '', '', '19', 'member1'),
(234, 't_743422899340148', 'Tiwi Andiny', '100010173342431', 'test', '2018-11-01T04:08:09 0000', '', 'U:test<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:hi shop', '', '', '3', 'member2'),
(235, 't_204292380464516', 'Thảo Phương', '100026512652857', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-11-01T03:52:34 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Ai đó có thể hỗ trợ cho tôi không?', '', '', '2', 'member3'),
(236, 't_2171236362900039', 'Thanh Nga', '100000410892581', 'Bạn phản hoi giúp mình', '2018-10-26T07:11:27 0000', '', 'U:Bạn phản hoi giúp mình<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Alo<br>U:Bên bạn có mâuc này k?', '', '', '8', 'member4'),
(237, 't_261003314554707', 'Lê Ngọc Linh', '100019351216543', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-09-24T11:43:31 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Xin chào, tôi muốn hỏi về bình nước cực ngầu.<br>U::> dạ shop còn bình chim cánh cụt đó hăm ạ ?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Xin chào, tôi muốn hỏi về bình nước cực ngầu.', '', '', '5', 'member1'),
(238, 't_2180499132222243', 'Ven Kim Nguyen', '100007865324229', 'Ven sent a photo.', '2018-08-28T05:14:56 0000', '', '', '', '', '13', 'member2'),
(239, 't_327174964689779', 'Mi Lô Mi Lô', '100021918349817', 'Mi Lô sent a photo.', '2018-08-24T15:48:12 0000', '', '', '', '', '4', 'member3'),
(240, 't_1045818065758417', 'Đàm Vân', '100009906991209', 'Bình này còn k n', '2018-08-15T05:37:11 0000', '', 'U:Bình này còn k n<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member4'),
(241, 't_783717668686239', 'Nhóc Lật Đật', '100011440402610', 'Báo giá em shop oie', '2018-08-14T22:03:35 0000', '', 'U:Báo giá em shop oie', '', '', '4', 'member1'),
(242, 't_266773840781147', 'Thanh Vân', '100023455983818', 'bên shop có những mẫu mochi nào mới ạ?', '2018-08-05T06:43:39 0000', '', 'U:bên shop có những mẫu mochi nào mới ạ?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '3', 'member2'),
(243, 't_361151304305265', 'Tuyết Võ', '100012311955742', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-08-04T15:43:13 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop còn sỉ bảng tên k ạ<br>U:Dạ shop<br>I:ma the: 7503512771204, serial: 58357124991<br>U:Dạ<br>I:ok em 10 p nua shop gui<br>U:Vittel ạ<br>U:Dạ<br>I:e lấy card mạng nào<br>I:1 card 10k nhé<br>I:shop đền bù  e<br>I:chắc do nhân viên shop nhầm ấy<br>I:hix có 41 cái ạ<br>U:Shop bảo 42 mà<br>U:Shop ơi s có 41 cái à shop<br>U:Sớm hơn dự định<br>U:Dạ shop<br>I:trong hôm nay đó e<br>U:Dạ shop do e chưa nghe ng ta gọi ạ<br>I:alo em ơi hàng của e đến nơi rồi đó ạ nay người ta giao cho e đó ạ<br>U:Dạ<br>I:đúng rồi em ơi e gửi bưu tá là được<br>U:Z tc đưa cj 430k hả<br>U:Dạ<br>I:cái đó e về cứ bán tầm 20-25k ấy hàng ngoài cugnx đẹp lắm', '', '', '233', 'member3'),
(244, 't_1032840976875996', 'Hà Trang', '100004503105831', 'cái này bn tiền v shop?', '2018-07-31T15:45:26 0000', '', 'U:cái này bn tiền v shop?<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member4'),
(245, 't_1645388578904867', 'Đoàn Cẩm Vân', '100003012224006', 'chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy', '2018-07-27T03:24:49 0000', '', 'U:chỗ bạn có nhận sỉ hàng phụ kiện quà tặng ko vậy<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:b ơi', '', '', '3', 'member1'),
(246, 't_255916571672924', 'Xuân Nguyễn', '100017637484868', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-07-16T04:18:55 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Cửa hàng bạn ở đâu?', '', '', '2', 'member2'),
(247, 't_2110632509183277', 'Hiền Berry', '100007096453697', 'bên mình có kẹp tóc màu sắc k ạ', '2018-06-22T08:54:30 0000', '', 'U:bên mình có kẹp tóc màu sắc k ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có thể nhận trợ giúp từ dịch vụ chăm sóc khách hàng không?', '', '', '3', 'member3'),
(248, 't_243572519749863', 'Bích Thảo', '100022913499592', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-06-11T04:28:31 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có đèn đom đóm k ạ', '', '', '2', 'member4'),
(249, 't_2099538920293572', 'Tâm Nguyễn', '100007124535605', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-05-15T10:15:09 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop có bán album ảnh không ạ', '', '', '2', 'member1'),
(250, 't_169073090584689', '阮氏明月', '100024459963677', 'Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '2018-04-24T15:17:06 0000', '', 'I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Tôi có được xem giá sản phẩm không?', '', '', '2', 'member2'),
(251, 't_183060509176761', 'Han Han', '100024184401568', 'bn 1 chai ạ', '2018-04-24T12:17:26 0000', '', 'U:bn 1 chai ạ', '', '', '4', 'member3'),
(252, 't_367784137072662', 'Lanh Anna', '100015232367142', 'Ship vê hải phòng bn ạ?', '2018-04-21T09:38:42 0000', '', 'U:Ship vê hải phòng bn ạ?', '', '', '4', 'member4'),
(253, 't_227954394428039', 'Nguyễn Hương', '100016404395809', 'K có hàng nữa nha bạn', '2018-04-20T13:47:15 0000', '', 'I:K có hàng nữa nha bạn<br>U:J chừng nào hàg về ạ<br>I:Mặt hàng này hết r ạ<br>U:E cần gấp shop ơi<br>U:Chừng nào e mới đặt đơn hàng đc j ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Một hộp bút hello kity màu xanh nước vs hộp bút totoro màu hồng ạ', '', '', '32', 'member1'),
(254, 't_204411383669566', 'Pham Huong Quy', '100023021164831', 'Shop có kính này kh ạ', '2018-04-19T07:22:40 0000', '', 'U:Shop có kính này kh ạ<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ', '', '', '3', 'member2'),
(255, 't_274587233032858', 'Minh Thư', '100014447503575', 'Shop bán đồng hồ đúng ko ạ', '2018-04-08T01:11:18 0000', '', 'U:Shop bán đồng hồ đúng ko ạ<br>U:Shop ơi<br>I:Dạ chào Bạn ạ shop có thể hỗ trợ gì cho bạn ạ<br>U:Shop ơi<br>U:Shop ơiiiiiiii<br>U:Shop ơi', '', '', '10', 'member3'),
(256, 't_359969361185967', 'Vi Vi', '100015187170732', 'Vi sent a photo.', '2018-04-01T04:39:32 0000', '', '', '', '', '11', 'member4'),
(257, '', '', '', '', '', '', '', '', '', '', 'member1'),
(258, '', '', '', '', '', '', '', '', '', '', 'member2'),
(259, '', '', '', '', '', '', '', '', '', '', 'member3'),
(260, '', '', '', '', '', '', '', '', '', '', 'member4'),
(261, '', '', '', '', '', '', '', '', '', '', 'member1'),
(262, '', '', '', '', '', '', '', '', '', '', 'member2'),
(263, '', '', '', '', '', '', '', '', '', '', 'member3'),
(264, '', '', '', '', '', '', '', '', '', '', 'member4'),
(265, '', '', '', '', '', '', '', '', '', '', 'member1'),
(266, '', '', '', '', '', '', '', '', '', '', 'member2'),
(267, '', '', '', '', '', '', '', '', '', '', 'member3'),
(268, '', '', '', '', '', '', '', '', '', '', 'member4'),
(269, '', '', '', '', '', '', '', '', '', '', 'member1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dbconfigfb`
--
ALTER TABLE `dbconfigfb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dbguitinnhan`
--
ALTER TABLE `dbguitinnhan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dbmember`
--
ALTER TABLE `dbmember`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dbtinnhan`
--
ALTER TABLE `dbtinnhan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dbconfigfb`
--
ALTER TABLE `dbconfigfb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `dbguitinnhan`
--
ALTER TABLE `dbguitinnhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `dbmember`
--
ALTER TABLE `dbmember`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `dbtinnhan`
--
ALTER TABLE `dbtinnhan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
