-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 02:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `username` varchar(800) NOT NULL,
  `pid` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `total_price` int(100) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `username`, `pid`, `product_name`, `price`, `quantity`, `total_price`, `product_image`) VALUES
(140, '', 69, 'Kaipar-250', 4200, 1, 4200, 'Medicine Category904.jpg'),
(141, '', 69, 'Kaipar-250', 4200, 1, 4200, 'Medicine Category904.jpg'),
(142, '', 69, 'Kaipar-250', 4200, 1, 4200, 'Medicine Category904.jpg'),
(143, '', 69, 'Kaipar-250', 4200, 1, 4200, 'Medicine Category904.jpg'),
(148, 'sana', 69, 'Kaipar-250', 4200, 26, 109200, 'Medicine Category904.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `discount_name` varchar(50) DEFAULT NULL,
  `discount_percent` decimal(5,2) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `discount_name`, `discount_percent`, `status`) VALUES
(1, 'Moonsoon Sale', 10.00, 'Disabled'),
(2, 'Fall Sale', 30.00, 'Active'),
(3, 'over_1lakhs', 5.00, 'Active'),
(4, 'under_1lakhs', 2.00, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `Brand_Name` varchar(255) NOT NULL,
  `Packing_Size` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Bonus` varchar(255) NOT NULL,
  `Expiry_Date` varchar(255) NOT NULL,
  `indication` varchar(800) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`Brand_Name`, `Packing_Size`, `Price`, `Bonus`, `Expiry_Date`, `indication`, `manufacturer`, `country`, `image_name`, `quantity`) VALUES
('Amcan-5', '3\'s x10', 3100, '10+2', '-', '    Amlodipine သည် monotherapy (hypertensives အများစု) သို့မဟုတ် ACE inhibitors၊ diuretics နှင့် beta blockers တို့နှင့် ပေါင်းစပ်၍ သွေးတိုးကျစေသော ဆေးတစ်မျိုးဖြစ်သည်။   Amlodipine သည် တည်ငြိမ်သော angina pectoris ၏ ပထမလိုင်း ကုသမှုလည်း ဖြစ်သည်။   Prinzmetal ၏ (မူကွဲ) angina ။ ၎င်းကို monotherapy အဖြစ် သို့မဟုတ် angina refractory ရှိ အခြားသော antianginals များနှင့် ပေါင်းစပ်ရာတွင် nitrates နှင့် beta blockers များအဖြစ် အသုံးပြုနိုင်ပါသည်။', 'V. S. International Pvt. Ltd.  ', 'India', 'Medicine Category215.jpg', 2),
('Amimol', '100ml', 5900, '10+1', 'Dec-24', 'MIMOL ကို ပြင်းထန်သောကူးစက်ရောဂါများ၊ ယိုယွင်းလာသောရောဂါများ၊ endocrine ကမောက်ကမဖြစ်မှု၊ ခွဲစိတ်မှုလုပ်ထုံးလုပ်နည်းများ၊ ဒဏ်ရာများ၊ မီးလောင်ဒဏ်ရာများ၊ သက်ကြီးရွယ်အိုများ၊ ထုံထုံ၊ riboflavinosis သို့မဟုတ် pellagra ကဲ့သို့သော ဗီတာမင်နှင့် အမိုင်နိုအက်ဆစ်များ ချို့တဲ့မှုနှင့်ဆက်စပ်နေသော အခြေအနေများကို ကုသရာတွင် MIMOL ကို ဖြည့်စွက်စာအဖြစ် အသုံးပြုသည်။', 'V. S. International Pvt. Ltd', 'India', 'Medicine Category732.jpg', 9),
('Avistor-20', '3\'sx10', 5300, '10+1', '', 'Atorvastatin ကို ကိုလက်စထရော မြင့်မားခြင်းနှင့် triglyceride ပမာဏကို ကုသရန်အတွက် အသုံးပြုသည်။ ကိုလက်စထရောကို လျှော့ချရာတွင် atorvastatin ၏ ထိရောက်မှုသည် ဆေးပမာဏနှင့် ဆက်စပ်နေသည်၊ ဆိုလိုသည်မှာ ပမာဏများသော ပမာဏသည် ကိုလက်စထရောကို ပို၍ လျော့နည်းစေသည်။ သွေးတွင်း ကိုလက်စထရော တိုင်းတာမှုကို ကုသနေစဉ်အတွင်း ပုံမှန်ကြားကာလတွင် လုပ်ဆောင်ပြီး ဆေးပမာဏများကို ချိန်ညှိနိုင်ပါသည်။', 'V. S. International Pvt. Ltd', ' India', 'Medicine Category598.jpg', 12),
('Metvis-500', '10\'sx10', 7690, '10+2', 'Feb-25\r\n', 'အထူးသဖြင့် အဝလွန်လူနာများတွင် အမျိုးအစား 2 ဆီးချိုရောဂါကို ကုသခြင်း ၊ အစားအသောက် စီမံခြင်းနှင့် လေ့ကျင့်ခန်း တစ်ခုတည်း လုံလောက်သော glycemic ထိန်းချုပ်မှု မဖြစ်ပေါ်စေခြင်းတို့ကြောင့် ဖြစ်သည်။ အစားအသောက်ပျက်ကွက်ပြီးနောက် ပထမတန်းကုထုံးအဖြစ် metformin ဖြင့် ကုသသော အဝလွန်သောအမျိုးအစား 2 ဆီးချိုဝေဒနာရှင်များတွင် ဆီးချိုရောဂါနောက်ဆက်တွဲပြဿနာများ လျော့နည်းသွားကြောင်း ပြသခဲ့သည်။', 'V. S. International Pvt. Ltd.', 'India', 'Medicine Category805.jpg', 12),
('Rozator-10', '3\'sx10', 8950, '10+2', 'Dec-25', 'hypercholesterolemia ကို ကုသခြင်း- အရွယ်ရောက်ပြီးသူများ၊ ဆယ်ကျော်သက်များနှင့် အသက် 6 နှစ်နှင့်အထက် ကလေးများတွင် မူလ hypercholesterolemia (မျိုးကွဲ မိသားစုတွင်း သွေးတွင်းကိုလက်စထရော သွေးလွန်ကဲခြင်းအပါအဝင် အမျိုးအစား ll a) သို့မဟုတ် ရောစပ်ထားသော dyslipidaemia (type ll b) သည် အစားအသောက်နှင့် အခြားသော ဆေးဝါးမဟုတ်သော ကုသမှုများကို တုံ့ပြန်သည့်အခါ အစားအသောက်နှင့် ဆက်စပ်မှုအဖြစ် ( ဥပမာ - လေ့ကျင့်ခန်းလုပ်ခြင်း၊ ကိုယ်အလေးချိန်လျှော့ချခြင်း) သည် မလုံလောက်ပါ။  အစားအသောက်နှင့် အခြားသော lipid လျှော့ချခြင်း ကုသမှုများ ၏ နောက်ဆက်တွဲအနေဖြင့် Homozygous မိသားစု hypercholesterolaemia (ဥပမာ LDL apheresis) သို့မဟုတ် ထိုသို့သော ကုသမှုများ မသင့်လျော်ပါက။  နှလုံးသွေးကြောဆိုင်ရာ ဖြစ်ရပ်များကို ကာကွယ်ခြင်း- အခြားအန္တရာယ်အချက်များ ပြုပြင်ခြင်း၏ နောက်ဆက်တွဲအနေဖြင့် ပထမနှလုံးသွေးကြောဆိုင်ရာ ဖြစ်နိုင်ခြေ မြင့်မားသည်ဟု', 'V. S. International Pvt. Ltd.', 'India', 'Medicine Category303.jpg', 2),
('Saniomez', '10\'sx10', 7500, '10+2/30+4/50+14', 'Aug-24', 'Saniomez ကို အောက်ဖော်ပြပါ ကုသမှုများတွင် အသုံးပြုပါတယ်။', 'V. S. International Pvt. Ltd.', 'India', 'Medicine Category455.jpg', 9),
('Tevlart-40', '3\'sx10', 9250, '10+1', '', 'သွေးတိုးရောဂါ- အရွယ်ရောက်ပြီးသူများတွင် မရှိမဖြစ်လိုအပ်သော သွေးတိုးရောဂါကို ကုသခြင်း။   နှလုံးသွေးကြောဆိုင်ရာကာကွယ်ခြင်း- အရွယ်ရောက်ပြီးသူများတွင် နှလုံးသွေးကြောဆိုင်ရာရောဂါဖြစ်နိုင်ချေကို လျှော့ချပေးခြင်း- (၁) atherothrombotic နှလုံးသွေးကြောဆိုင်ရာရောဂါ (နှလုံးသွေးကြောကျဉ်းရောဂါ၊ လေဖြတ်ခြင်း သို့မဟုတ် အနားသတ်သွေးကြောဆိုင်ရာရောဂါ) သို့မဟုတ်   (ii) မှတ်တမ်းတင်ထားသော ပစ်မှတ်ကိုယ်တွင်းအင်္ဂါများ ပျက်စီးခြင်းနှင့် အမျိုးအစား ၂ ဆီးချိုရောဂါ။', ' V. S. International Pvt. Ltd.', 'India', 'Medicine Category932.jpg', 12),
('GISOMULT', '2\'sx15', 9800, '10+1/100+13', '', 'Gisomult capsule သည် Ginseng ပါသော multivatimin နှင့် သတ္တုဓာတ် ဖြည့်စွက်စာ ဖြစ်ပါသည်။ Gisomult ဆေးတောင့်သည် အစာစားချင်စိတ် ဆုံးရှုံးခြင်း၊ ကိုယ်ဝန်ဆောင်ခြင်း၊ ပင်ပန်းနွမ်းနယ်ခြင်း သို့မဟုတ် အထွေထွေ အားနည်းခြင်းအတွက် အသုံးဝင်သည်။ Gisomult ဆေးတောင့်သည် ကြီးထွားမှု၊ ခွန်အားနှင့် တက်ကြွမှုကို တိုးတက်စေရန် ကူညီပေးသည်။', ' V. S. International Pvt. Ltd.', 'India', 'Medicine Category33.jpg', 56),
('Topiclav-375', '2\'sx10 Tab', 7500, '10+2', '', 'TOPICLAV သည် ခံနိုင်ရည်ရှိသော သက်ရှိကြောင့် အောက်ပါဘက်တီးရီးယားပိုးမွှားများကို ကုသရန်အတွက် ညွှန်ပြထားသည်။', 'SPARSH BIO-TECH PVT.LTD', 'India', 'Medicine Category82.jpg', 19),
('Topiclav-625', '3\'sx10 Tab', 7500, '10+2', '', 'TOPICLAV သည် ခံနိုင်ရည်ရှိသော သက်ရှိကြောင့် အောက်ပါဘက်တီးရီးယားပိုးမွှားများကို ကုသရန်အတွက် ညွှန်ပြထားသည်။ ', 'SPARSH BIO-TECH PVT.LTD', 'India', 'Medicine Category1.jpg', 91),
('Bonical', '10s\'x10 Tab', 16500, '10+1', '', 'ကယ်လ်စီယမ်ပါဝင်မှုနည်းသောအခြေအနေများဖြစ်သည့် အရိုးထုထည်ဆုံးရှုံးမှု (အရိုးပွရောဂါ) အားနည်းသောအရိုးများ (osteoomalacia/rickets)၊ ပါရာသိုင်းရွိုက်ဂလင်း၏လုပ်ဆောင်မှုကျဆင်းခြင်း (hypoparathyroidism) နှင့် အချို့သောကြွက်သားရောဂါ (latent tetany) ကဲ့သို့သော အခြေအနေများကို ကုသရန် အသုံးပြုသည်။', 'Risefarma Global Pte. Ltd', 'Singapore', 'Medicine Category104.jpg', 89),
('Kaipar-125', '2\'sx5 Tab', 3000, '10+2', 'Jan-25', 'Kaipar ကို ခေါင်းကိုက်ခြင်း၊ သွားကိုက်ခြင်း၊ dysmenorrheal နှင့် musculoskeletal pain အတွက် အကိုက်အခဲပျောက်ဆေးအဖြစ် ဖော်ပြသည်။ ၎င်းကို သာမန်အအေးမိခြင်းနှင့် ဗိုင်းရပ်စ်ပိုးကူးစက်ခြင်းကဲ့သို့သော မသက်မသာဖြစ်ပြီး အဖျားများနှင့်အတူပါရှိသော အခြေအနေများတွင် အကိုက်အခဲပျောက်ဆေးနှင့် ပိုးသတ်ဆေးအဖြစ်လည်း ညွှန်ပြထားသည်။', 'Risefarma Global Pte. Ltd', 'Singapore', 'Medicine Category991.jpg', 40),
('Kaipar-250', '2\'sx5 Tab', 4200, '10+2', 'Jan-25', 'Kaipar ကို ခေါင်းကိုက်ခြင်း၊ သွားကိုက်ခြင်း၊ dysmenorrheal နှင့် musculoskeletal pain အတွက် အကိုက်အခဲပျောက်ဆေးအဖြစ် ဖော်ပြသည်။ ၎င်းကို သာမန်အအေးမိခြင်းနှင့် ဗိုင်းရပ်စ်ပိုးကူးစက်ခြင်းကဲ့သို့သော မသက်မသာဖြစ်ပြီး အဖျားများနှင့်အတူပါရှိသော အခြေအနေများတွင် အကိုက်အခဲပျောက်ဆေးနှင့် ပိုးသတ်ဆေးအဖြစ်လည်း ညွှန်ပြထားသည်။', 'Risefarma Global Pte. Ltd', 'Singapore', 'Medicine Category904.jpg', 2),
('Mersibion', '3 Strips x 10 Cap', 7950, '10+1/30+4/50+9', 'May-26', 'polyneuritis ကဲ့သို့သော ဗီတာမင် B1၊ B6 နှင့် B12 ချို့တဲ့မှုများကို ကုသရန်။', 'PT. Mersifarma TM Sukabumi', 'Indonesia', 'Medicine Category37.jpg', 9),
('Gvgyl-500', '2\'sx5 Suppo', 13700, '10+1', '', 'စအိုလမ်းကြောင်းအသုံးပြုမှု- GVGYL-500 ကို septicaemia၊ bacteraemia၊ ဦးနှောက်အမြှေးပါး၊ necrotizing pneumonia၊ osteomyelitis၊ puerperal sepsis၊ တင်ပါးဆုံတွင်းပြည်တည်နာ၊ တင်ပါးဆုံတွင်းဆဲလ်များရောင်ခြင်း၊ peritonitis နှင့် ခွဲစိတ်ပြီးအနာပိုးဝင်ခြင်းများတွင် အသုံးပြုနိုင်ပါသည်။ အထူးသဖြင့် Bacteroides နှင့် anaerobic Streptococci မျိုးစိတ်များတွင် anaerobic ဘက်တီးရီးယားကြောင့် ခွဲစိတ်ပြီးနောက် ရောဂါပိုးများကို ကာကွယ်ခြင်း။  မိန်းမကိုယ်အသုံးပြုမှု- GVGYL-500 ကို Trichomonas vaginitis နှင့် သီးခြားမဟုတ်သော vaginitis ကုသမှုအတွက် အသုံးပြုသည်', 'BLISS GVS PHARMA LTD', 'India', 'Medicine Category576.jpg', 2),
('Care Drop Blister', '12 x2 Strips', 5000, '10+1', 'Jan-25', 'ချောင်းဆိုးခြင်းနှင့် လည်ချောင်းနာခြင်းများအတွက်ကောင်းမွန်ပါတယ်။', 'Prince Supplico', 'India', 'Medicine Category213.jpg', 7),
('Lipovit', '10\'sx10', 30500, '10+1/50+7', 'Jun-25', 'Omega 3 polyunsaturated fatty acids ကို အစားအသောက် နှင့် လေ့ကျင့်ခန်းများ နှင့်အတူ တွဲသုံး၍ သွေးတွင်း triglyceride ပမာဏကို လျော့ကျစေပြီး သွေးကြောအတွင်း plaque များ ကြီးထွားမှုကို နှေးကွေးစေပါသည်။ နှလုံးရောဂါရှိသူများတွင် ရုတ်တရက် နှလုံးသေဆုံးနိုင်ခြေကို လျော့နည်းစေသည်။ ဦးနှောက်နှင့် အာရုံကြောစနစ် ယိုယွင်းခြင်းမှ ကာကွယ်ပေးသည်။ အရိုးနှင့်အဆစ်ကျန်းမာရေးအတွက် အကျိုးပြုသည်။ ဆံသားကျန်းမာသန်စွမ်းတောက်ပြောင်စေရန် ကူညီပေးသည်။ ခန္ဓာကိုယ်ကျန်းမာသန်စွမ်းဖို့ ထောက်ပံ့ပေးပါတယ်။', 'Risefarma Global Pte. Ltd', 'Singapore', 'Medicine Category542.jpg', 98),
('Vitacare', '3\'sx10', 5400, '10+2', 'Apr-24', 'ဤဆေးသည် အစားအသောက်ချို့တဲ့ခြင်းနှင့် အချို့သော autoimmune ရောဂါများကြောင့် ဗီတာမင်ချို့တဲ့မှုကို ကုသရန် သို့မဟုတ် ကာကွယ်ရန် အသုံးပြုသည့် ဘက်စုံဗီတာမင်ထုတ်ကုန်တစ်ခုဖြစ်သည်။', 'Risefarma Global Pte. Ltd', 'Singapore', 'Medicine Category207.jpg', 81);

-- --------------------------------------------------------

--
-- Table structure for table `price_list`
--

CREATE TABLE `price_list` (
  `id` int(11) NOT NULL,
  `Brand_Name` varchar(255) NOT NULL,
  `Packing_Size` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL,
  `Bonus` varchar(255) NOT NULL,
  `Expiry_Date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price_list`
--

INSERT INTO `price_list` (`id`, `Brand_Name`, `Packing_Size`, `Price`, `Bonus`, `Expiry_Date`) VALUES
(1, 'Amcan-5', '3\'s x10', 3100, '10+2', '-'),
(2, 'Amcan-10', '3\'s x10', 3600, '10+1', 'Jul-25'),
(3, 'Amimol', '100ml', 5900, '10+1', 'Dec-24'),
(4, 'Avistor-10', '3\'s x10', 4000, '10+1', ''),
(5, 'Avistor-20', '3\'sx10', 5300, '10+1', ''),
(6, 'Metvis-500', '10\'sx10', 7690, '10+2', 'Feb-25\r\n'),
(7, 'Mediwise Nutrivit', '2\'sx15', 7500, '10+1/30+4/50+7', 'Jul-25'),
(8, 'Rozator-5', '3\'sx10', 7350, '10+2', 'Dec-25'),
(9, 'Rozator-10', '3\'sx10', 8950, '10+2', 'Dec-25'),
(10, 'Saniomez', '10\'sx10', 7500, '10+2/30+4/50+14', 'Aug-24'),
(11, 'Supagin', '3\'sx10', 4250, '10+1/30+4/50+7', 'Feb-25'),
(12, 'Tevlart-20', '3\'sx10', 6950, '10+1', 'Jul-25'),
(13, 'Tevlart-40', '3\'sx10', 9250, '10+1', ''),
(14, 'Betalife', '2\'sx15', 11000, '10+1/100+15', ''),
(15, 'GISOMULT', '2\'sx15', 9800, '10+1/100+13', ''),
(16, 'Amivita', '3\'sx10', 0, '-', '-'),
(17, 'Azithromycin-250', '1\'sx6 Tab', 2500, '10+2', 'Aug-24'),
(18, 'Azithromycin-500', '3\'sx10 Tab', 18600, '10+2', '-'),
(19, 'Topiclav-375', '2\'sx10 Tab', 7500, '10+2', ''),
(20, 'Topiclav-625', '3\'sx10 Tab', 7500, '10+2', ''),
(21, 'Topiclav Plus', '100ml', 0, '', ''),
(22, 'Cardivit', '1\'sx10 Tab', 4000, '10+1', ''),
(23, 'Aloevit', '2\'sx15 Tab', 0, '', ''),
(24, 'I-Vit', '10\'sx10 Tab', 25000, '10+1', ''),
(25, 'Bonical', '10s\'x10 Tab', 16500, '10+1', ''),
(26, 'Kaipar-125', '2\'sx5 Tab', 3000, '10+2', 'Jan-25'),
(27, 'Kaipar-250', '2\'sx5 Tab', 4200, '10+2', 'Jan-25'),
(28, 'Kaipar-500', '2s\'x5 Tab', 6600, '10+2', 'Jan-25'),
(29, 'Calazite Lotion', '60ml', 7000, '', ''),
(30, 'ET-Cream', '10g', 4200, '', ''),
(31, 'Dermazol Plus Gel', '10g', 4200, '', ''),
(32, 'Winmyco Antisep Cream', '10g', 4200, '', ''),
(33, 'Vitavits-Chocolate', '30 Tab/Bot', 11500, '10+2', ''),
(34, 'Vitavits-Orange', '30 Tab/Bot', 15000, '10+1', 'May-25'),
(35, 'Mersibion', '3 Strips x 10 Cap', 7950, '10+1/30+4/50+9', 'May-26'),
(36, 'Takelin-500', '3\'s Stpx10 Tab', 63000, '10+1/30+4/50+8', 'May-26'),
(37, 'Merron-25', '5\'s Stpx 10 Tab', 7950, '10+1', ''),
(38, 'Gascoal', '10\'s Stpx 10 Tab', 7950, '10+1', 'Nov-25'),
(39, 'Gvgyl-500', '2\'sx5 Suppo', 13700, '10+1', ''),
(40, 'Lofnac', '2\'sx5 Suppo', 12700, '10+3', ''),
(41, 'Care Drop', '150 Pouches', 8500, '10+1', 'Jun-25'),
(42, 'Care Drop Blister', '12 x2 Strips', 5000, '10+1', 'Jan-25'),
(43, 'Care Drop Jar', '350 Pounches', 19500, '10+1', ''),
(44, 'Lotus Brand/Rock Sugar', '70g/Bot', 7500, '10+2', 'Sep-24'),
(45, 'Lotus Brand/Ginseng', '70g/Bot', 7500, '10+2', ''),
(46, 'Nano-Diacerine 50-mg', '3\'sx10', 27000, '10+2', 'Jul-24'),
(47, 'Lipovit', '10\'sx10', 30500, '10+1/50+7', 'Jun-25'),
(48, 'Femocare', '10\'sx10', 31000, '10+1', 'Jun-25'),
(49, 'Vitacare', '3\'sx10', 5400, '10+2', 'Apr-24'),
(50, 'Minglavit', '2\'sx15', 7900, '10+1', ''),
(51, 'Avoril', '100ml', 4500, '10+1/100+14', 'Aug-25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `gmail` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `gmail`, `username`, `password`, `usertype`) VALUES
(4, 'jim@gmail.com', 'Jim', '193213', 'admin'),
(1312, 'user@gmail.com', 'user', '4297f44b13', 'admin'),
(12312, 'user@gmail.com', 'user', 'cfcff1ee31', 'admin'),
(123127, 'iu@gmail.com', 'IU', '1b64fadee6', 'admin'),
(123129, 'kazuo@gmail.com', 'kazuo', '0867b6aad1fdb0ba41651dc33e56a81c', 'admin'),
(123135, 'xeehee@gmail.com', 'sohee', '9d541c9fb31c00bfeab06435187be69f', 'admin'),
(123140, 'sana@gmail.com', 'Sana', 'b8873a156dc35dc99b69d0f93ebe22fc', 'admin'),
(123141, 'lisa@gmail.com', 'Lisa', '81dc9bdb52d04dc20036dbd8313ed055', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Analgesics And Anti-Inflammatory'),
(2, 'Anti-infective'),
(5, 'Antidiabetics'),
(3, 'Cardiovascular System'),
(8, 'Cream And Lotions'),
(6, 'Gastrointestinal System'),
(4, 'Nervous System'),
(7, 'Nutraceuticals And Supplements'),
(9, 'Other Ranges');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `product_name` varchar(100) NOT NULL,
  `category` varchar(255) NOT NULL,
  `indication` varchar(800) NOT NULL,
  `packaging` varchar(100) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `id` int(10) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`product_name`, `category`, `indication`, `packaging`, `manufacturer`, `country`, `image_name`, `id`, `quantity`, `price`) VALUES
('Saniomez', 'Gastrointestinal System', 'Saniomez ကို အောက်ဖော်ပြပါ ကုသမှုများတွင် အသုံးပြုပါတယ်။', '10’s x 10 Capsules', 'V. S. International Pvt. Ltd.', 'India', 'Medicine Category455.jpg', 50, 9, 7500),
('Topiclav-625', 'Anti-infective', 'TOPICLAV သည် ခံနိုင်ရည်ရှိသော သက်ရှိကြောင့် အောက်ပါဘက်တီးရီးယားပိုးမွှားများကို ကုသရန်အတွက် ညွှန်ပြထားသည်။ ', '2’s x 10 tablets', 'SPARSH BIO-TECH PVT.LTD', 'India', 'Medicine Category1.jpg', 51, 88, 13000),
('Care Drop Blister', 'Other Ranges', 'ချောင်းဆိုးခြင်းနှင့် လည်ချောင်းနာခြင်းများအတွက်ကောင်းမွန်ပါတယ်။', '2’s x 12 ', 'Prince Supplico', 'India', 'Medicine Category213.jpg', 52, 7, 5000),
('Metvis-500', 'Antidiabetics', 'အထူးသဖြင့် အဝလွန်လူနာများတွင် အမျိုးအစား 2 ဆီးချိုရောဂါကို ကုသခြင်း ၊ အစားအသောက် စီမံခြင်းနှင့် လေ့ကျင့်ခန်း တစ်ခုတည်း လုံလောက်သော glycemic ထိန်းချုပ်မှု မဖြစ်ပေါ်စေခြင်းတို့ကြောင့် ဖြစ်သည်။ အစားအသောက်ပျက်ကွက်ပြီးနောက် ပထမတန်းကုထုံးအဖြစ် metformin ဖြင့် ကုသသော အဝလွန်သောအမျိုးအစား 2 ဆီးချိုဝေဒနာရှင်များတွင် ဆီးချိုရောဂါနောက်ဆက်တွဲပြဿနာများ လျော့နည်းသွားကြောင်း ပြသခဲ့သည်။', '10’s x 10 tablets', 'V. S. International Pvt. Ltd.', 'India', 'Medicine Category805.jpg', 53, 12, 7690),
('Topiclav-375', 'Anti-infective', 'TOPICLAV သည် ခံနိုင်ရည်ရှိသော သက်ရှိကြောင့် အောက်ပါဘက်တီးရီးယားပိုးမွှားများကို ကုသရန်အတွက် ညွှန်ပြထားသည်။', '2’s x 10 tablets', 'SPARSH BIO-TECH PVT.LTD', 'India', 'Medicine Category82.jpg', 54, 19, 7500),
('Avistor-20', 'Cardiovascular System', 'Atorvastatin ကို ကိုလက်စထရော မြင့်မားခြင်းနှင့် triglyceride ပမာဏကို ကုသရန်အတွက် အသုံးပြုသည်။ ကိုလက်စထရောကို လျှော့ချရာတွင် atorvastatin ၏ ထိရောက်မှုသည် ဆေးပမာဏနှင့် ဆက်စပ်နေသည်၊ ဆိုလိုသည်မှာ ပမာဏများသော ပမာဏသည် ကိုလက်စထရောကို ပို၍ လျော့နည်းစေသည်။ သွေးတွင်း ကိုလက်စထရော တိုင်းတာမှုကို ကုသနေစဉ်အတွင်း ပုံမှန်ကြားကာလတွင် လုပ်ဆောင်ပြီး ဆေးပမာဏများကို ချိန်ညှိနိုင်ပါသည်။', '3’s x 10 tablets', 'V. S. International Pvt. Ltd', ' India', 'Medicine Category598.jpg', 62, 12, 5300),
('Tevlart-40', 'Cardiovascular System', 'သွေးတိုးရောဂါ- အရွယ်ရောက်ပြီးသူများတွင် မရှိမဖြစ်လိုအပ်သော သွေးတိုးရောဂါကို ကုသခြင်း။   နှလုံးသွေးကြောဆိုင်ရာကာကွယ်ခြင်း- အရွယ်ရောက်ပြီးသူများတွင် နှလုံးသွေးကြောဆိုင်ရာရောဂါဖြစ်နိုင်ချေကို လျှော့ချပေးခြင်း- (၁) atherothrombotic နှလုံးသွေးကြောဆိုင်ရာရောဂါ (နှလုံးသွေးကြောကျဉ်းရောဂါ၊ လေဖြတ်ခြင်း သို့မဟုတ် အနားသတ်သွေးကြောဆိုင်ရာရောဂါ) သို့မဟုတ်   (ii) မှတ်တမ်းတင်ထားသော ပစ်မှတ်ကိုယ်တွင်းအင်္ဂါများ ပျက်စီးခြင်းနှင့် အမျိုးအစား ၂ ဆီးချိုရောဂါ။', '3’s x 10 tablets', ' V. S. International Pvt. Ltd.', 'India', 'Medicine Category932.jpg', 63, 12, 9250),
('Winmyco', 'Cream And Lotions', 'အသေးစားဒဏ်ရာများနှင့် မီးလောင်ဒဏ်ရာများကို ကုသရန်အသုံးပြုပါတယ်', '10 g tube', 'WINWA MEDICAL SDN. BHD', ' Malaysia', 'Medicine Category853.jpg', 65, 24, 4500),
('Vitavits', 'Nutraceuticals And Supplements', 'VITAVITS နေ့စဉ် Multivitamin Lysine ကို ကျန်းမာရေး ဖြည့်စွက်စာအဖြစ် အသုံးပြုသည်။', '30 chewable tablets per bottle', 'WINWA MEDICAL SDN. BHD', 'Malaysia', 'Medicine Category187.jpg', 66, 6, 11500),
('Amimol', 'Nutraceuticals And Supplements', 'MIMOL ကို ပြင်းထန်သောကူးစက်ရောဂါများ၊ ယိုယွင်းလာသောရောဂါများ၊ endocrine ကမောက်ကမဖြစ်မှု၊ ခွဲစိတ်မှုလုပ်ထုံးလုပ်နည်းများ၊ ဒဏ်ရာများ၊ မီးလောင်ဒဏ်ရာများ၊ သက်ကြီးရွယ်အိုများ၊ ထုံထုံ၊ riboflavinosis သို့မဟုတ် pellagra ကဲ့သို့သော ဗီတာမင်နှင့် အမိုင်နိုအက်ဆစ်များ ချို့တဲ့မှုနှင့်ဆက်စပ်နေသော အခြေအနေများကို ကုသရာတွင် MIMOL ကို ဖြည့်စွက်စာအဖြစ် အသုံးပြုသည်။', '100ml per bottle', 'V. S. International Pvt. Ltd', 'India', 'Medicine Category732.jpg', 67, 9, 5900),
('Merron 25 Cinnarizine', 'Nervous System', 'Supporting therapy for symptom of vertigo, dizziness, tinnitus, nystagmus, vomiting.', '5’s x 10 tablets', 'PT. Mersifarma TM Sukabumi', 'Indonesia', 'Medicine Category967.jpg', 68, 54, 7950),
('Kaipar-250', 'Analgesics And Anti-Inflammatory', ' Kaipar ကို ခေါင်းကိုက်ခြင်း၊ သွားကိုက်ခြင်း၊ dysmenorrheal နှင့် musculoskeletal pain အတွက် အကိုက်အခဲပျောက်ဆေးအဖြစ် ဖော်ပြသည်။ ၎င်းကို သာမန်အအေးမိခြင်းနှင့် ဗိုင်းရပ်စ်ပိုးကူးစက်ခြင်းကဲ့သို့သော မသက်မသာဖြစ်ပြီး အဖျားများနှင့်အတူပါရှိသော အခြေအနေများတွင် အကိုက်အခဲပျောက်ဆေးနှင့် ပိုးသတ်ဆေးအဖြစ်လည်း ညွှန်ပြထားသည်။', '2’s x 5 Suppositories', 'Risefarma Global Pte. Ltd', 'Singapore', 'Medicine Category904.jpg', 69, 17, 4200),
('Avistar-10 ', 'Cardiovascular System', 'Atorvastatin ကို ကိုလက်စထရော မြင့်မားခြင်းနှင့် triglyceride ပမာဏကို ကုသရန်အတွက် အသုံးပြုသည်။ ကိုလက်စထရောကို လျှော့ချရာတွင် atorvastatin ၏ ထိရောက်မှုသည် ဆေးပမာဏနှင့် ဆက်စပ်နေသည်၊ ဆိုလိုသည်မှာ ပမာဏများသော ပမာဏသည် ကိုလက်စထရောကို ပို၍ လျော့နည်းစေသည်။ သွေးတွင်း ကိုလက်စထရော တိုင်းတာမှုကို ကုသနေစဉ်အတွင်း ပုံမှန်ကြားကာလတွင် လုပ်ဆောင်ပြီး ဆေးပမာဏများကို ချိန်ညှိနိုင်ပါသည်။', ' 3’s x 10 tablets', 'V. S. International Pvt. Ltd', 'India', 'Medicine Category790.jpg', 70, 7, 4000),
('Gisomult', 'Nutraceuticals And Supplements', 'Gisomult capsule သည် Ginseng ပါသော multivatimin နှင့် သတ္တုဓာတ် ဖြည့်စွက်စာ ဖြစ်ပါသည်။ Gisomult ဆေးတောင့်သည် အစာစားချင်စိတ် ဆုံးရှုံးခြင်း၊ ကိုယ်ဝန်ဆောင်ခြင်း၊ ပင်ပန်းနွမ်းနယ်ခြင်း သို့မဟုတ် အထွေထွေ အားနည်းခြင်းအတွက် အသုံးဝင်သည်။ Gisomult ဆေးတောင့်သည် ကြီးထွားမှု၊ ခွန်အားနှင့် တက်ကြွမှုကို တိုးတက်စေရန် ကူညီပေးသည်။', '2 X 15 Capsules', ' V. S. International Pvt. Ltd.', 'India', 'Medicine Category33.jpg', 71, 56, 9800),
('Dermazol Plus', 'Cream And Lotions', 'Candida spp ၏ dermatophytes ဖြင့် အရေပြားပိုးဝင်ခြင်းကို ကုသရန်။ ရောင်ရမ်းခြင်းလက္ခဏာများ ထင်ရှားသည်။ gram-positive ဘက်တီးရီးယားအပေါ် Dermazol ဆန့်ကျင်ဘက်တီးရီးယားအကျိုးသက်ရောက်မှုကြောင့်၊ ထုတ်ကုန်ကို ဘက်တီးရီးယား superinfection နှင့် mycotic affection အတွက်လည်း အသုံးပြုနိုင်သည်။', '10 g tube', 'WINWA MEDICAL SDN. BHD.', 'India', 'Medicine Category442.jpg', 72, 12, 4200),
('BoniCAL', 'Nutraceuticals And Supplements', 'ကယ်လ်စီယမ်ပါဝင်မှုနည်းသောအခြေအနေများဖြစ်သည့် အရိုးထုထည်ဆုံးရှုံးမှု (အရိုးပွရောဂါ) အားနည်းသောအရိုးများ (osteoomalacia/rickets)၊ ပါရာသိုင်းရွိုက်ဂလင်း၏လုပ်ဆောင်မှုကျဆင်းခြင်း (hypoparathyroidism) နှင့် အချို့သောကြွက်သားရောဂါ (latent tetany) ကဲ့သို့သော အခြေအနေများကို ကုသရန် အသုံးပြုသည်။', '10’s x 10 capsules', 'Risefarma Global Pte. Ltd', 'Singapore', 'Medicine Category104.jpg', 73, 89, 16500),
('Vitacare', 'Nutraceuticals And Supplements', 'ဤဆေးသည် အစားအသောက်ချို့တဲ့ခြင်းနှင့် အချို့သော autoimmune ရောဂါများကြောင့် ဗီတာမင်ချို့တဲ့မှုကို ကုသရန် သို့မဟုတ် ကာကွယ်ရန် အသုံးပြုသည့် ဘက်စုံဗီတာမင်ထုတ်ကုန်တစ်ခုဖြစ်သည်။', ' 3’s x 10 capsules', 'Risefarma Global Pte. Ltd', 'Singapore', 'Medicine Category207.jpg', 74, 81, 5400),
('Rozator-10', 'Cardiovascular System', 'hypercholesterolemia ကို ကုသခြင်း- အရွယ်ရောက်ပြီးသူများ၊ ဆယ်ကျော်သက်များနှင့် အသက် 6 နှစ်နှင့်အထက် ကလေးများတွင် မူလ hypercholesterolemia (မျိုးကွဲ မိသားစုတွင်း သွေးတွင်းကိုလက်စထရော သွေးလွန်ကဲခြင်းအပါအဝင် အမျိုးအစား ll a) သို့မဟုတ် ရောစပ်ထားသော dyslipidaemia (type ll b) သည် အစားအသောက်နှင့် အခြားသော ဆေးဝါးမဟုတ်သော ကုသမှုများကို တုံ့ပြန်သည့်အခါ အစားအသောက်နှင့် ဆက်စပ်မှုအဖြစ် ( ဥပမာ - လေ့ကျင့်ခန်းလုပ်ခြင်း၊ ကိုယ်အလေးချိန်လျှော့ချခြင်း) သည် မလုံလောက်ပါ။  အစားအသောက်နှင့် အခြားသော lipid လျှော့ချခြင်း ကုသမှုများ ၏ နောက်ဆက်တွဲအနေဖြင့် Homozygous မိသားစု hypercholesterolaemia (ဥပမာ LDL apheresis) သို့မဟုတ် ထိုသို့သော ကုသမှုများ မသင့်လျော်ပါက။  နှလုံးသွေးကြောဆိုင်ရာ ဖြစ်ရပ်များကို ကာကွယ်ခြင်း- အခြားအန္တရာယ်အချက်များ ပြုပြင်ခြင်း၏ နောက်ဆက်တွဲအနေဖြင့် ပထမနှလုံးသွေးကြောဆိုင်ရာ ဖြစ်နိုင်ခြေ မြင့်မားသည်ဟု', '3’s x 10 tablets', 'V. S. International Pvt. Ltd.', 'India', 'Medicine Category303.jpg', 78, 2, 8950),
('Gvgyl-500', 'Anti-infective', 'စအိုလမ်းကြောင်းအသုံးပြုမှု- GVGYL-500 ကို septicaemia၊ bacteraemia၊ ဦးနှောက်အမြှေးပါး၊ necrotizing pneumonia၊ osteomyelitis၊ puerperal sepsis၊ တင်ပါးဆုံတွင်းပြည်တည်နာ၊ တင်ပါးဆုံတွင်းဆဲလ်များရောင်ခြင်း၊ peritonitis နှင့် ခွဲစိတ်ပြီးအနာပိုးဝင်ခြင်းများတွင် အသုံးပြုနိုင်ပါသည်။ အထူးသဖြင့် Bacteroides နှင့် anaerobic Streptococci မျိုးစိတ်များတွင် anaerobic ဘက်တီးရီးယားကြောင့် ခွဲစိတ်ပြီးနောက် ရောဂါပိုးများကို ကာကွယ်ခြင်း။  မိန်းမကိုယ်အသုံးပြုမှု- GVGYL-500 ကို Trichomonas vaginitis နှင့် သီးခြားမဟုတ်သော vaginitis ကုသမှုအတွက် အသုံးပြုသည်', '2’s x 5 Suppositories', 'BLISS GVS PHARMA LTD', 'India', 'Medicine Category576.jpg', 79, 2, 13700),
('Amcan-5', 'Cardiovascular System', '    Amlodipine သည် monotherapy (hypertensives အများစု) သို့မဟုတ် ACE inhibitors၊ diuretics နှင့် beta blockers တို့နှင့် ပေါင်းစပ်၍ သွေးတိုးကျစေသော ဆေးတစ်မျိုးဖြစ်သည်။   Amlodipine သည် တည်ငြိမ်သော angina pectoris ၏ ပထမလိုင်း ကုသမှုလည်း ဖြစ်သည်။   Prinzmetal ၏ (မူကွဲ) angina ။ ၎င်းကို monotherapy အဖြစ် သို့မဟုတ် angina refractory ရှိ အခြားသော antianginals များနှင့် ပေါင်းစပ်ရာတွင် nitrates နှင့် beta blockers များအဖြစ် အသုံးပြုနိုင်ပါသည်။', '3’s x 10 tablets', 'V. S. International Pvt. Ltd.  ', 'India', 'Medicine Category215.jpg', 80, 2, 3100),
('Calazite', 'Cream And Lotions', 'အင်းဆက်ပိုးမွှားကိုက်ခြင်း၊ နေလောင်ခြင်း၊ နေလောင်ခြင်း၊ အလှကုန်၊ လက်သည်းနီမြန်းခြင်းနှင့် အခြားသော အရေပြားယားယံခြင်းများကြောင့် အရေပြားယားယံခြင်းများကို သက်သာစေရန်နှင့် ကာကွယ်သည့် lotion။', '60 ml roll-on bottle', 'WINWA MEDICAL SDN. BHD.  ', 'Malaysia', 'Medicine Category44.jpg', 81, 12, 7000),
('Care Drop (Cough Drop)', 'Other Ranges', 'ချောင်းဆိုးခြင်းနှင့် လည်ချောင်းနာခြင်းများအတွက်ကောင်းမွန်ပါတယ်။', '150 pouches per pack', 'Prince Supplico', 'India', 'Medicine Category812.jpg', 82, 54, 8500),
('Nutrivit', 'Nutraceuticals And Supplements', '၎င်းသည် ကျန်းမာရေးကို ကောင်းမွန်စေရန် အထောက်အကူဖြစ်စေသော ဓာတ်တိုးဆန့်ကျင်ပစ္စည်းအဖြစ် လုပ်ဆောင်သည်။  MEDIWISE NUTRIVIT capsules များသည် ရောဂါပိုးမွှားများကို ကာကွယ်ရန်နှင့် ခုခံအားစနစ်ကို အားကောင်းလာစေရန်အတွက် အမြင်အာရုံကို ပိုမိုကောင်းမွန်စေရန် ကူညီပေးနိုင်ပါသည်။ ၎င်းသည် ခန္ဓာကိုယ်မှ အင်ဆူလင်ကို အသုံးပြုရန်နှင့် အင်ဆူလင် receptors အရေအတွက်ကို တိုးမြင့်လာစေရန် ကူညီပေးသောကြောင့် ဆီးချိုဝေဒနာရှင်များအတွက်လည်း အသုံးဝင်ပါသည်။', '2’s x 15 Capsules', 'V. S. International Pvt. Ltd.', 'India', 'Medicine Category798.jpg', 83, 89, 7500),
('Kaipar-125', 'Analgesics And Anti-Inflammatory', 'Kaipar ကို ခေါင်းကိုက်ခြင်း၊ သွားကိုက်ခြင်း၊ dysmenorrheal နှင့် musculoskeletal pain အတွက် အကိုက်အခဲပျောက်ဆေးအဖြစ် ဖော်ပြသည်။ ၎င်းကို သာမန်အအေးမိခြင်းနှင့် ဗိုင်းရပ်စ်ပိုးကူးစက်ခြင်းကဲ့သို့သော မသက်မသာဖြစ်ပြီး အဖျားများနှင့်အတူပါရှိသော အခြေအနေများတွင် အကိုက်အခဲပျောက်ဆေးနှင့် ပိုးသတ်ဆေးအဖြစ်လည်း ညွှန်ပြထားသည်။', ' 2’s x 5 Suppositories', 'Risefarma Global Pte. Ltd', 'Singapore', 'Medicine Category991.jpg', 84, 40, 3000),
('Lipovit', 'Nutraceuticals And Supplements', 'Omega 3 polyunsaturated fatty acids ကို အစားအသောက် နှင့် လေ့ကျင့်ခန်းများ နှင့်အတူ တွဲသုံး၍ သွေးတွင်း triglyceride ပမာဏကို လျော့ကျစေပြီး သွေးကြောအတွင်း plaque များ ကြီးထွားမှုကို နှေးကွေးစေပါသည်။ နှလုံးရောဂါရှိသူများတွင် ရုတ်တရက် နှလုံးသေဆုံးနိုင်ခြေကို လျော့နည်းစေသည်။ ဦးနှောက်နှင့် အာရုံကြောစနစ် ယိုယွင်းခြင်းမှ ကာကွယ်ပေးသည်။ အရိုးနှင့်အဆစ်ကျန်းမာရေးအတွက် အကျိုးပြုသည်။ ဆံသားကျန်းမာသန်စွမ်းတောက်ပြောင်စေရန် ကူညီပေးသည်။ ခန္ဓာကိုယ်ကျန်းမာသန်စွမ်းဖို့ ထောက်ပံ့ပေးပါတယ်။', '10’s x 10 capsules', 'Risefarma Global Pte. Ltd', 'Singapore', 'Medicine Category542.jpg', 85, 98, 30500),
('Mersibion', 'Nutraceuticals And Supplements', 'polyneuritis ကဲ့သို့သော ဗီတာမင် B1၊ B6 နှင့် B12 ချို့တဲ့မှုများကို ကုသရန်။', '3’s x 10 caplets', 'PT. Mersifarma TM Sukabumi', 'Indonesia', 'Medicine Category37.jpg', 86, 9, 7950),
('adasd', 'Cardiovascular System', '1', '2', '34', '12', 'Medicine Category306.jpg', 94, 13, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `order_number` varchar(800) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(40) NOT NULL,
  `username` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_image` varchar(500) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_gmail` varchar(500) NOT NULL,
  `customer_contact` varchar(500) NOT NULL,
  `customer_address` varchar(500) NOT NULL,
  `order_notes` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `order_number`, `quantity`, `total_products`, `total_price`, `order_date`, `order_status`, `username`, `payment_method`, `payment_image`, `customer_name`, `customer_gmail`, `customer_contact`, `customer_address`, `order_notes`) VALUES
(50, '#Order202407282055583911', 2, '', 199100, '2024-08-11 19:25:42', 'Completed', 'Sana', 'kbzpay', 'asd', 'kazuo', 'kazuo32@gmail.com', '09123456789', 'Silicon Valley', '123'),
(58, '2147483647', 1, '', 8100, '2024-07-28 18:31:31', 'Pending', 'Sana', 'kbzpay', '0', 'Htoo Myat Kyaw', 'htoomyatkyaw32@gmail.com', '09263906925', 'No.38 Natsin Street', 'List'),
(60, '2147483647', 1, '', 31500, '2024-07-28 07:13:01', 'Pending', '', 'kbzpay', '0', 'kazuoa', 'sana@gmail.com', '0912315515', 'Korea', ''),
(65, '20240729132627', 1, '', 10900, '2024-07-29 06:56:27', 'Pending', 'Sana', 'kbzpay', '0', 'aa', 'aaa', '14414', 'hhh', 'ggg'),
(66, '20240810214451', 2, '', 186000, '2024-08-10 15:14:51', 'Pending', 'Sana', 'wavepay', '0', 'kazuo', 'kazuo@gmail.com', '0912315515', 'asdasd', 'asdas'),
(67, '20240811161049', 3, ', Kaipar 125 (17) , Topiclav 625 (10) ', 186000, '2024-08-11 09:40:49', 'Pending', 'Sana', 'kbzpay', '0', 'Kaio', 'kai@gmail.com', '09123456789', 'Vaillo', 'oi'),
(104, '20240814103158', 33, ', Kaipar-250  (4200 x30) ', 131000, '2024-08-14 04:01:58', 'Pending', 'sana', 'kbzpay', 'Payment Screenshot110.jpg', 'kaii', 'kaii@gmail.com', '0988766622', 'Lion Vallet', 'poooqweq'),
(105, '20240814193744', 4, ', Kaipar-250  (4200 x4) ', 21464, '2024-08-14 13:07:44', 'Pending', 'sana', 'kbzpay', 'Payment Screenshot319.png', 'milo', 'milo@gmail.com', '092323231', 'Lista', 'adasdsa'),
(106, '20240814203348', 7, ', Kaipar-250  (4200 x4) , Topiclav-625  (13000 x3) ', 59684, '2024-08-14 14:03:48', 'Pending', 'sana', 'kbzpay', 'Payment Screenshot918.jpg', 'qwe1', 'qwe@gmail.com', '13123123123', 'adsad', 'adasd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `order_number` int(255) NOT NULL,
  `payment_number` int(255) NOT NULL,
  `customer_name` varchar(800) NOT NULL,
  `delivery_status` varchar(800) NOT NULL,
  `payment_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `order_number`, `payment_number`, `customer_name`, `delivery_status`, `payment_image`) VALUES
(1, 2147483647, 242121, 'Htoo Myat Kyaw', 'Completed', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `gmail` varchar(255) NOT NULL,
  `delivery_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `gmail`, `delivery_status`) VALUES
(8, 'kazuo', 'kazuo', 'kazuo@gmail.com', 'Pending'),
(9, 'kai', 'kai', 'kai@gmail.com', 'Completed'),
(41, 'Sana', 'b8873a156dc35dc99b69d0f93ebe22fc', 'sana@gmail.com', 'Pending'),
(46, 'Mina', '91b827e257eeae8e5989d961fe3011df', 'mina@gmail.com', 'Pending'),
(54, 'Leo', '0f759dd1ea6c4c76cedc299039ca4f23', 'leo@gmail.com', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_list`
--
ALTER TABLE `price_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD KEY `CategoryName` (`CategoryName`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `price_list`
--
ALTER TABLE `price_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123142;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD CONSTRAINT `fk_category` FOREIGN KEY (`category`) REFERENCES `tbl_category` (`CategoryName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
