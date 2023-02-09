-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2017 at 09:03 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jakuzaug_monitor`
--
CREATE DATABASE IF NOT EXISTS `jakuzaug_monitor` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `jakuzaug_monitor`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(120) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `phone` varchar(13) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_login` datetime DEFAULT '0000-00-00 00:00:00',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fa_id` tinytext NOT NULL,
  `fa_dis` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`, `email`, `phone`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`, `fa_id`, `fa_dis`) VALUES
(1, 'bamwine', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'bams@gmail.com', '', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE IF NOT EXISTS `animal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` varchar(50) NOT NULL,
  `arrived` varchar(100) NOT NULL,
  `notes` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `famer_id` varchar(100) NOT NULL,
  `fam_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `tag_id`, `arrived`, `notes`, `created`, `famer_id`, `fam_id`) VALUES
(1, '456234', '2015-05-15 10:19:20', 'This animal finds out', '2015-05-15 07:18:26', 'FA17042496J', ''),
(2, '67848', '2015-05-15 12:09:54', 'finding the bests', '2015-05-15 09:09:40', '', ''),
(3, '456435', '2015-05-16 17:23:26', '', '2015-05-16 14:19:26', '', ''),
(4, '456784', '2015-05-16 17:23:44', '', '2015-05-16 14:19:26', '', ''),
(5, '34523', '2015-05-16 17:24:12', 'test2', '2017-04-28 08:22:15', 'FA17042496J', ''),
(6, '56345', '2015-05-16 17:24:16', '', '2015-05-16 14:19:26', '', ''),
(7, '453452', '2015-05-16 17:24:31', '', '2015-05-16 14:19:26', '', ''),
(8, '21234', '2015-05-16 17:24:40', 'Imported from the Netherlands', '2015-05-16 14:19:26', '', ''),
(9, '23456', '2015-05-16 17:25:06', '', '2015-05-16 14:19:26', '', ''),
(11, '25634', '2016-06-21 00:00:00', 'white and black', '2016-06-21 13:41:16', '', ''),
(13, '67954', '04/05/2017', 'itss new', '2017-05-01 11:28:57', 'FA17042496J', '');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE IF NOT EXISTS `disease` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disease` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `signs` text NOT NULL,
  `symptoms` text NOT NULL,
  `prevention` text NOT NULL,
  `treatment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`id`, `disease`, `description`, `signs`, `symptoms`, `prevention`, `treatment`) VALUES
(1, 'Displaced Abomasum', 'The abomasum (or true stomach) normally lies on the floor of the abdomen, but can become filled with gas and rise to the top of the abdomen, when it is said to be ‘displaced’. The abomasum is more likely to be displaced to the left (LDA) than the right (RDA).\r\n<b>Cause</b><br />\r\n\r\nCalving: The majority of cases occur soon after calving. During pregnancy the uterus displaces the abomasum, so that after calving the abomasum has to move back to its normal position, increasing the risk of displacement.', '', '<ul>\r\n<li>Loss of appetite</li>\r\n<li>Drop in milk yield</li>\r\n<li>Reduced rumination</li>\r\n<li>Mild diarrhoea</li>\r\n</ul>', 'Prevention should be aimed at ensuring dry matter intake is maintained in early lactation:\r\n  <ul>\r\n    <li>Ensure cattle are not too fat at calving (i.e. >3.5 BCS);</li>\r\n    <li>Feed high quality feeds, with good quality forage;</li>\r\n   <li> Feeding a total mixed ration as opposed to concentrates;</li>\r\n   <li> Ensure plenty of space at feeding sites;</li>\r\n  <li>  Minimise changes between late dry and early lactation ration;</li>\r\n  <li>  Prevent and promptly treat, diseases such as milk fever, metritis, toxic mastitis and retained afterbirth which reduce feed intake;</li>\r\n    <li>Maximise cow comfort, minimise stress.</li>\r\n</ul>', 'Treatment requires replacing the abomasum in its normal position. Preferably, the veterinarian also prevents recurrence by tacking the abomasum to the body wall.\r\n\r\nSurgery can be performed, however isn''t always necessary. Often the abomasum can be returned to its usual place by casting and rolling the animal onto its back, permitting the abomasum to "float" back into its normal position.\r\n\r\nRolling can be used in conjunction with toggling, where a toggle is passed through the skin into the abdomen and twisted fixing the abomasum in the correct position. This significantly reduces the relapse rate.'),
(2, 'Foot-and-Mouth', 'Foot-and-mouth disease (FMD) is a severe, highly contagious viral disease of cattle and swine. It also affects sheep, goats, deer, and other cloven-hooved ruminants. FMD is not recognised as a zoonotic disease.\r\n\r\n<b>Cause</b> <br / >\r\nThe disease is caused by a virus of which there are seven ‘types’, each producing the same symptoms, and distinguishable only in the laboratory.\r\n\r\nImmunity to one type does not protect an animal against other types.\r\n\r\nThe interval between exposure to infection and the appearance of symptoms varies between twenty-four hours and ten days, or even longer. The average time, under natural conditions, is three to six days.\r\n\r\nThe virus survives in lymph nodes and bone marrow at neutral pH, but is destroyed in muscle when pH is less than 6.0, i.e., after rigor mortis. The virus can persist in contaminated fodder and the environment for up to one month, depending on the temperature and pH conditions.\r\n\r\nAirborne spread of the disease can take place and under favourable weather conditions the disease may be spread considerable distances by this route.\r\n\r\nAnimals pick up the virus either by direct contact with an infected animal or by contact with foodstuffs or other things which have been contaminated by such an animal, or by eating or coming into contact with some part of an infected carcase.\r\n\r\nOutbreaks have been linked with the importation of infected meat and meat products.\r\n\r\nThe disease can also be spread by people, vehicles and other objects that have been contaminated by the virus.\r\n\r\nThe disease spreads very quickly if not controlled and because of this is a reportable disease.', '', '<ul>\r\n<li>Fever</li>\r\n<li>Bilsters in the mouth and on feet</li>\r\n<li>Drop in milk production</li>\r\n<li>Weight loss</li>\r\n<li>Loss of appetite</li>\r\n<li>Quivering lips and frothing of mouth</li>\r\n<li>Cows may develop blisters on teats</li>\r\n<li>Lameness</li>\r\n</ul>', 'FMD is one of the most difficult animal infections to control. Because the disease occurs in many parts of the world, there is always a chance of its accidental introduction into an unaffected country.\r\n\r\nExport restrictions are often imposed on countries with known outbreaks.\r\n\r\nFMD outbreaks are usually controlled by quarantines and movement restrictions, euthanasia of affected and in-contact animals, and cleansing and disinfection of affected premises, equipment and vehicles.\r\n\r\nInfected carcasses must be disposed of safely by incineration, rendering, burial or other techniques. Milk from infected cows can be inactivated by heating to 100°C (212°F) for more than 20 minutes. Slurry can be heated to 67°C (153°F) for three minutes.\r\n\r\nRodents and other vectors may be killed to prevent them from mechanically disseminating the virus.\r\n\r\nGood biosecurity measures should be practiced on uninfected farms to prevent entry of the virus.\r\nVaccination\r\n\r\nVaccination can be used to reduce the spread of FMD or protect specific animals.\r\n\r\nVaccines are also used in endemic regions to protect animals from clinical disease. FMDV vaccines must closely match the serotype and strain of the infecting strain.\r\n\r\nVaccination with one serotype does not protect the animal against other serotypes, and may not protect the animal completely or at all from other strains of the same serotype. Currently, there is no universal FMD vaccine', 'Treatment is not given. Affected animals will recover. However because of the loss of production and the infectious state of the disease, infected animals are usually culled'),
(3, 'Fatty Liver Syndrome', 'Fatty liver syndrome is the accumulation of fat within the cow''s liver.\r\n<strong>Cause</strong> <br  />\r\n\r\nFatty liver occurs as a result of the cow breaking down too much fat for the liver to process properly. Fat mobilisation occurs as a result of negative energy balance. The broken down far is then converted back to fat in the liver to prevent them becoming toxic. Thus the liver becomes fat when the cow is losing condition, the more loss in condition the more fat in the liver.\r\n\r\nFatty liver can develop within 24 hours of an animal going off feed. This is typically around calving time.\r\n\r\nOnce it is deposited in the liver, the concentration of fat in the liver does not fall until the cow gets into positive energy balance, which can be over ten weeks after calving, particularly if the fatty liver is severe. Fat cows (Body Condition Score greater than 3.5) are much more prone to fatty liver.', '', '<ul>\r\n<li>Lower milk yields</li>\r\n<li>Depressed appetite</li>\r\n<li>Incidences of milk fever, ketosis, mastitis, retained fetal membranes etc</li>\r\n<li>Reduced fertility</li>\r\n</ul>\r\nBlood tests will show elevated nonesterified fatty acid concentrations (NEFA) levels (free fatty acids) and increased ketones. - See more at: http://www.thecattlesite.com/diseaseinfo/212/fatty-liver-syndrome/#sthash.OPmJj7DP.dpuf', 'Ensuring that cows are calving at the correct body condition would prevent the breakdown of fat and fatty liver. An ideal body condition score to calf would be between 2.5 to 3. Cows should be dried of at this score and weight maintained through the dry period.\r\n\r\nChanging diets during this period should be avoided.\r\n\r\nGlucose supplements can be given to overfat animals as preventative measure.\r\n\r\nMinimising stress is important for prevention of fatty liver. Sudden changes in environment should be avoided. For example, changes in ration, housing, temperature, herdmates, etc may cause a reduction in feed intake and trigger catecholamine-mediated increases in fat mobilisation.', 'Without treatment mortality can be as high as 25 per cent.\r\n\r\nBesides longterm IV infusion of glucagon, there is no proven treatment for fatty liver.\r\n\r\nFatty liver is an important economic disease because cows that develop fatty liver are affected by multiple metabolic and infectious diseases; they reduce milk production, and are frequently culled'),
(4, 'Rift Valley Fever', 'Rift Valley Fever is a viral disease of cattle and sheep that was first discovered in the Rift Valley of Kenya. The disease is spread to livestock through the bite of infected mosquitoes during years of heavy rainfall. The disease causes high death rates in young animals and abortions in older animals. Outbreaks of Rift Valley Fever have caused famine in endemic areas.\r\n\r\nRift Valley Fever is zoonotic, meaning that it can spread to people through contact with infected livestock. In addition to airborne spread of the virus, humans can become infected through handling undercooked meat, blood or raw milk. Rift Valley Fever is typically mild in humans but can be severe.', '<ul>\r\n<li>Fever</li>\r\n<li>Anorexia (poor appetite)</li>\r\n<li>Weakness</li>\r\n<li>Death in young animals</li>\r\n<li>Abortion (may be 100% in the herd)</li>\r\n</ul>', '', 'Human and animal vaccines exist for those areas where Rift Valley Fever is endemic. Control of the mosquito population is also necessary to prevent the spread of the disease. - See more at: http://www.thecattlesite.com/diseaseinfo/254/rift-valley-fever/#sthash.iu8WMXFO.dpuf', 'There is no specific treatment for Rift Valley Fever. Any animal suspected of having Rift Valley Fever should be reported to the State Veterinarians or USDA Area Veterinarian in Charge immediately. - See more at: http://www.thecattlesite.com/diseaseinfo/254/rift-valley-fever/#sthash.iu8WMXFO.dpuf'),
(5, 'Repeat Breeding Syndrome', 'A repeat breeder is a cow that is cycling normally, with no clinical abnormalities, but has failed to conceive after at least two successive inseminations', 'In practice, some will have been inseminated at the wrong time, others may have pathological changes in the bursa or oviduct that are difficult to palpate, or undiagnosed uterine infections.\r\n\r\nAn early repeater is an animals whose luteal function has been shorter than normal or typical for the physiological oestrus cycle in non bred cow. In these cows the most probable event is either failure of fertilisation (delayed ovulation, poor semen quality etc.) or early embryonic death (delayed ovulation, poor embryo quality, unfavourable uterine environment, precocious luteolysis).\r\n\r\nThe cows will come into heat within 17-24 days after AI.\r\n\r\nA late repeater is a cow that comes into heat later than 25 days after AI.\r\n\r\nIn these animals the luteal function was maintained for longer than the physiological luteal phase in non bred cows. Fertilisation and initial recognition of pregnancy probably took place but for some reason (inadequate luteal function, inadequate embryo signalling, infectious diseases, induced luteolysis) luteolysis was induced and pregnancy lost.\r\n\r\nGood heat detection and records are key to identifying these cows', '', '<ul>\r\n<li>Ensure you are serving cows at the correct time. This means that all staff should know the signs of heat. Milk progesterone testing is also useful; cows in a true heat will have very low progesterone.</li>\r\n<li>Ensure insemination techniques are as good as possible. This is particularly important if you use DIY AI. Do not serve cows previously diagnosed as pregnant without doing a cow-side progesterone test to confirm it is has a low progesterone and is not pregnant. If the cow is pregnant AI may cause foetal loss.</li>\r\n<li>Identify and treat cows with whites before starting to serve them.</li>\r\n<li>Don&rsquo;t start serving too soon after calving. Herds that start early have lower pregnancy rates to service and so more repeat breeder cows.</li>\r\n<li>Minimise stress at service. For example, try and avoid serving around turnout or when you change the diet.</li>\r\n</ul>', 'Repeat breeders should be carefully evaluated in order to define the most probable reason for the failure to conceive (early repeats) or failure in pregnancy maintenance (early and late repeats).\r\n\r\nInitially heat records should be evaluated to classify the cow as early or late repeat.\r\n\r\nCows that have had three services and are not pregnant should be checked before serving again by a veterinarian'),
(6, 'Tetanus in Cattle', 'Tetanus is a fairly common disease occurring in all types of livestock. It is relatively rare in cattle, but outbreaks of disease can cause very severe losses.\r\nCause\r\n\r\nTetanus is caused by toxins produced by the bacterium Clostridium tetani. This bacterium is found in the soil and the guts of animals and humans.\r\n\r\nThe disease starts when the organism gets into wounded or damaged tissue as a result of contamination. In the absence of oxygen the bacteria multiply and produce a local infection.\r\n\r\nAs they grow, the bacteria produce toxins, which spread along the nerves to the brain and cause the clinical signs of tetanus.\r\n\r\nThe time between infection and disease can be very short (two or three days) or quite long (four weeks or more), depending on how long it takes for the contaminated area to develop a low level of oxygen (such as by a wound healing over sealing off the tissue from the outside).\r\n\r\nThe disease is seen in all ages of stock. Calving and castration seem to be the most common procedures linked to the development of tetanus.', '<ul>\r\n<li>Stiffness and reluctance to move are normally the first signs</li>\r\n<li>Twitching and tremors of the muscles</li>\r\n<li>Lockjaw</li>\r\n<li>Prominent protruding third eyelid</li>\r\n<li>Unsteady gait with stiff held out tail</li>\r\n<li>Affected cattle are usually anxious and easily excited by sudden movements or handling.</li>\r\n<li>Bloat is common because the rumen stops working</li>\r\n<li>Later signs include collapse, lying on side with legs held stiffly out, spasm and death.</li>\r\n</ul>', '', 'Undertaking surgical procedures (such as castration) properly, in a clean environment, with disinfected instruments and surgical area, will significantly reduce the risk of tetanus. The same rules apply to calving, be as clean as possible and minimise contamination.\r\n\r\nAntitoxin can be useful as a short-acting (up to 21 days) preventative if used at high risk times, however on some farms vaccination may be better, as a three dose course of vaccination can result in protection for over three years.', 'Cattle with early tetanus probably respond to treatment better than most other livestock. Antitoxin is of very little use unless given in the very early states of infection.\r\n\r\nIn some cases sedatives and relaxants have been known to aid recovery.\r\n\r\nIt is not worth treating cattle with fully developed tetanus'),
(7, 'Brucellosis', 'Brucellosis is an infectious disease that occurs from contact with animals carrying Brucella bacteria. Brucella can infect cattle, goats, camels, dogs, and pigs. The bacteria can spread to humans if you come in contact with infected meat or the placenta of infected animals, or if you eat or drink unpasteurised milk or cheese.\r\n\r\nBrucella is highly contagious, spreading very easily between cattle as the calf, the membranes and the uterine fluids all contain large quantities of bacteria.', '<ul>\r\n<li>Stiffness and reluctance to move are normally the first signs</li>\r\n<li>Twitching and tremors of the muscles</li>\r\n<li>Lockjaw</li>\r\n<li>Prominent protruding third eyelid</li>\r\n<li>Unsteady gait with stiff held out tail</li>\r\n<li>Affected cattle are usually anxious and easily excited by sudden movements or handling.</li>\r\n<li>Bloat is common because the rumen stops working</li>\r\n<li>Later signs include collapse, lying on side with legs held stiffly out, spasm and death.</li>\r\n</ul>', '', 'Dr Phil Hadley from Eblex believes that prevention through pasture rotation is effective against fluke, as this prevents cattle grazing the snail habitat. If possible keep cattle from grazing on wet areas such as pond margins, river banks and marshy ground.\r\n\r\nHe also says that an appropriate anthelmintic (worming) regime should be used, ensuring products used target eggs, immature and adult fluke and are combined in a programme which mininises wormer resistance.\r\n\r\nControl of liver fluke disease should be an important part of a farm health plan drawn up with the farmer''s local veterinary surgeon. Monitoring the levels of infection in sheep and cattle using fluke egg counts, abattoir returns and veterinary investigation of ill-thrifty animals is an essential part of successful control', 'A number of products are available for treating fluke in cattle. Flukicides are effective against immature and adult fluke.\r\n\r\nAdvice for farmers on flukicide usage, particularly with regard to frequency, should take account of the previous farm history, results of abattoir returns, if they are available, and faecal monitoring, tempered with the knowledge that triclabendazole-resistant flukes have been recorded in the UK and Eire.\r\n\r\nWhere the cattle are out-wintered, for example suckler cows, they should be treated twice. Once during the October/December period to remove the infection that has built up over the summer months and a second time in April or May to remove any fluke infection, which may have been picked up over the winter months. This will help to limit the risk of subsequent egg contamination of the pasture.\r\n\r\nTreating cattle seven to 14 days after housing with a flukicide can be very effective in reducing the impact of fluke through the winter says EBLEX. This would then mean that treatment at turnout could be avoided until mid-summer. This might be combined with a worm treatment for convenience, which will help to reduce pasture contamination.\r\n\r\nWhere possible there may be a benefit in delaying the housing treatment until five to eight weeks after housing to ensure all larval stages of fluke have matured to adulthood and then treating with a flukicide or combine the fluke treatment with worm dose.\r\n\r\nResistance to triclabendazole has been reported in both the UK and Ireland. Where this is suspected discuss the issue with your vet and choose an alternative drug.\r\n\r\nIn their first year, spring born calves are unlikely to require treatment until housing, and autumn born calves should be treated mid-summer in combination with the routine wormer treatment.\r\n\r\nThere are no flukicides available with a nil milk withdrawal period, therefore, for routine control treat dairy cows at drying off time.\r\n\r\nIn urgent clinical cases dairy cows need to be treated and the appropriate withholding period applied. Witholding period information is carried on the product label and datasheet and advice should be sought from a veterinary surgeon.\r\n\r\nWith potential costs of £20-25 per head or more if an animal dies, it is certainly beneficial for producers to prevent this parasite from infecting cattle. With reports of an increase in cases of liver fluke, farmers are advised to be aware of the problem, even if their herds have not previously been affected and they should take a strategic management approach to preventing and treating cases'),
(8, 'Abortion', 'Cows can suffer abnormalities during pregnancy leading to mummification of the foetus or resulting from maternal or foetal abnormality. All cases where the pregnancy terminates early and the foetus is expulsed are called abortions.\r\n\r\nAs there are multiple causes of abortion and the detection of abortions in a herd can vary significantly depending on the husbandry system and calving pattern, the incidence of abortion at herd level also varies markedly. It has been suggested that an abortion rate of 5% or more in a herd should be considered an indication of an abortion problem (Deas, 1981).\r\n</strong>\r\n<ul>\r\n<li>Non-specific</li>\r\n<li>Specific</li>\r\n</ul>\r\n<strong>Miscellaneous:</strong>\r\n<ul>\r\n<li>Drug-induced (prostaglandins)</li>\r\n<li>Insemination/intra-uterine infusion</li>\r\n<li>Hypothyroidism</li>\r\n<li>Trauma/stress (transport, noise, veterinary treatment etc.)</li>\r\n<li>High fever and endotoxins (toxic plants, nitrate/nitrite, fungal toxins, other disease)</li>\r\n<li>Nutritional (malnutrition, vitamin A/selenium/vitamin E deficiency, goitre)</li>\r\n<li>Twin pregnancy</li>\r\n<li>Genetic (malformation)</li>\r\n</ul>', '', '', '', ''),
(9, 'Mastitis', '<h3>Cause</h3>\r\n<p>Mastitis is the inflammation of the mammary gland and udder tissue.<br /><br /> It usually occurs as an immune response to bacterial invasion of the teat canal by variety of bacterial sources present on the farm (commonly through bedding or contaminated teat dips), and can also occur as a result of chemical, mechanical, or thermal injury to the cow''s udder.<br /><br /> Mastitis is a multifactoral disease, closely related to the production system and environment that cows are kept in. Mastitis risk factors or disease determinants can be classified into three groups: host, pathogen and environmental determinants.</p>', '', '<p><strong>Subclinical</strong>: Few symptoms of subclinical mastitis appear, although it is present in most dairy herds. <br /><br /> Somatic cell counts measure milk quality and can be used as an indicator of mastitis prevalence. <br /><br /> <strong>Clinical mastitis</strong>: The most obvious symptoms of clinical mastitis in the udder are swelling, heat, hardness, redness or pain. <br /><br /> Milk takes on a watery appearance, flakes, clots or pus is often present. <br /><br /> A reduction in milk yields, increases in body temperature, lack of appetite, and a reduction in mobility due to the pain of a swollen udder are also common signs.</p>', '<ol>\r\n<li><strong>Hygienic teat management</strong>: which includes good housing management, effective teat preparation and disinfection for good milk hygiene, teat health and disease control.</li>\r\n<li><strong> Prompt identification and treatment of clinical mastitis cases</strong>: including the use of the most appropriate treatment for the symptoms.</li>\r\n<li><strong> Dry cow management and therapy</strong>: where cows are dried off abruptly and teats are cleaned scrupulously before dry cow antibiotics are administered, including the use of teat-end sealants if appropriate.</li>\r\n<li><strong>Culling chronically affected cows</strong>: cows that become impossible to cure and represent a reservoir of infection for the whole herd.</li>\r\n<li><strong> Regular testing and maintenance of the milking machine</strong>: with regular, recommended teatcup liner replacement and milking machine servicing and attention paid to items which must be checked on a daily, weekly or monthly basis.</li>\r\n<li><strong>Good record keeping</strong>: of all aspects of mastitis treatment, dry cow therapy, milking machine servicing, Somatic Cell Counts and Bactoscan results, and clinical mastitis cases.</li>\r\n</ol>', 'NSAID are widely used for the treatment of acute mastitis. Aspirin, flunixin meglumine, flurbiprofen, carprofen, ibuprofen, and ketoprofen have been studied as treatments for experimental coliform mastitis or endotoxin-induced mastitis. Orally administered aspirin should be used with caution in acute coliform mastitis because it may lead to severe rumen atony.'),
(10, 'Anthrax', 'Anthrax, a highly infectious and fatal disease of mammals and humans, is caused by a relatively large spore-forming rectangular shaped bacterium called Bacillus anthracis.\r\n\r\nAnthrax occurs on all the continents, causes acute mortality in ruminants and is a zoonosis. The bacteria produce extremely potent toxins which are responsible for the ill effects, causing a high mortality rate. While most mammals are susceptible, anthrax is typically a disease of ruminants and humans.\r\n\r\nIt does not typically spread from animal to animal nor from person to person. The bacteria produce spores on contact with oxygen.', '<ul>\r\n<li>Sudden death (often within 2 or 3 hours of being apparently normal) is by far the most common sign;</li>\r\n<li>Very occasionally some animals may show trembling, a high temperature, difficulty breathing, collapse and convulsions before death. This usually occurs over a period of 24 hours;</li>\r\n<li>After death blood may not clot, resulting in a small amount of bloody discharge from the nose, mouth and other openings</li>\r\n</ul>', '', 'Infection is usually acquired through the ingestion of contaminated soil, fodder or compound feed. Anthrax spores in the soil are very resistant and can cause disease when ingested even years after an outbreak. The spores are brought to the surface by wet weather, or by deep tilling, and when ingested or inhaled by ruminants the disease reappears.<br /> <br /> Where an outbreak has occurred, carcases must be disposed of properly, the carcase should not be open (exposure to oxygen will allow the bacteria to form spores) and premises should be quarantined until all susceptible animals are vaccinated. <br /> <br /> Vaccination in endemic areas is very important. Although vaccination will prevent outbreaks veterinary services sometimes fail to vaccinate when the disease has not appeared for several years. But because the spores survive for such lengthy periods, the risk is always present.', 'Due to the rapidity of the disease treatment is seldom possible, although high doses of penicillin have been effective in the later stages of some outbreaks.'),
(11, 'Bovine Spongiform Encephalopathy (BSE)', 'Bovine Spongiform Encephalopathy (BSE) is a transmissible, neurodegenerative, fatal brain disease of cattle. The disease has a long incubation period of four to five years, but ultimately is fatal for cattle within weeks to months of its onset. BSE first came to the attention of the scientific community in November 1986 with the appearance in cattle of a newly-recognized form of neurological disease\r\nCause\r\n\r\nEpidemiological studies conducted in the UK suggest that the source of BSE was cattle feed prepared from bovine tissues, such as brain and spinal cord, that was contaminated by the BSE agent.\r\n\r\nSpeculation as to the cause of the appearance of the agent causing the disease has ranged from spontaneous occurrence in cattle, the carcases of which then entered the cattle food chain, to entry into the cattle food chain from the carcases of sheep with a similar disease, scrapie.\r\n\r\nBSE in the brain affects the brain and spinal cord of cattle. Lesions are characterised by sponge-like changes visible with an ordinary microscope.\r\n\r\nThe agent is highly stable, resisting freezing, drying and heating at normal cooking temperatures, even those used for pasteurization and sterilization.\r\n\r\nThe nature of the BSE agent is still a matter of debate. According to the prion theory, the agent is composed largely, if not entirely, of a self-replicating protein, referred to as a prion. Another theory argues that the agent is virus-like and possesses nucleic acids which carry genetic information. Strong evidence collected over the past decade supports the prion theory, but the ability of the BSE agent to form multiple strains is more easily explained by a virus-like agent.\r\n\r\nAs the disease progresses, more and more prion proteins are caused to deform into the beta pleated sheet, or infectious, state. As the deformed proteins increase in number, the degeneration process increases exponentially, and leads to the appearance of microscopic ‘holes’ in the brain. It is these holes which lead to the ‘spongy’ degeneration of the brain and spinal cord.\r\n\r\nBSE is not contagious and cannot be transmitted animal-to-animal contact.', '', 'As the disease affects the brain, the symptoms are the gradual lack of mental and physical ability. In cows this degeneration of the brain results in an ability to stand or walk straight, and has therefore given rise to the common term ‘mad cow disease’. BSE ultimately results in death.', 'BSE is a notifiable disease. Most countries follow OIE guidelines and have BSE control and prevention programmes in place, which involve the monitoring of dead and slaughtered cattle.\r\n\r\nGuidelines also prohibit the use of ruminant proteins in the preparation of animal feed. Also bovine offal fed to humans has been limited in some countries to prevent risk to humans.\r\n\r\nNo infectivity has yet been detected in skeletal muscle tissue. Reassurance can be provided by removal of visible nervous and lymphatic tissue from meat (skeletal muscle).\r\n\r\nMilk and milk products are considered safe. Tallow and gelatin are considered safe if prepared by a manufacturing process which has been shown experimentally to inactivate the transmissible agent and, if prepared from specifically identified tissues, or from cattle without risk of exposure to BSE. -', 'There is no way to tell if live cattle are infected with BSE. Ordinarily the disease is confirmed after death, when the microscopic appearance of ‘holes’ in the brain can be seen and identified as BSE. -'),
(12, 'Anaplasmosis', 'Anaplasmosis is a vector-borne, infectious blood disease in cattle caused by the rickesttsial parasites Anaplasma marginale and Anaplasma centrale. It is also known as yellow-bag or yellow-fever.\r\n\r\nThis parasite infects the red blood cells and causes severe anemia. It is most usually spread by ticks.', '', '<ul>\r\n<li>Anemia</li>\r\n<li>Fever</li>\r\n<li>Weight loss</li>\r\n<li>Breathlessness</li>\r\n<li>Jaundice</li>\r\n<li>Uncoordinated movements</li>\r\n<li>Abortion</li>\r\n<li>Death</li>\r\n</ul>', 'Typically, cases of anaplasmosis increase in late summer and fall as insect vectors increase. Therefore, control of vectors is key to preventing anaplasmosis. If necessary herd treatment with oxytetracycline injection every 3 to 4 weeks during high risk times may be necessary will prevent clinical disease but animals can become carriers.\r\n\r\nChlortetracycline also known as CTC can reduce the risk of anaplasmosis. A consistent intake of the correct amount of mineral is crucial to a anaplasmosis prevention programme. CTC is available in medicated feed, free choice salt-mineral mixes or medicated blocks.\r\n\r\nIn some places, vaccines are available to increase resistance to anaplasmosis.', 'Tetracycline is often used for clinical anaplasmosis. However it cannot be used in every country.\r\n\r\nGeneral supportive care is also important for anemic animals. Blood transfusions are of limited benefit.\r\n\r\nThe incubation time for the disease to develop varies from two weeks to over three months, but averages three to four weeks. Adult cattle are more susceptible to infection than calves.\r\n\r\nThe disease is generally mild in calves under a year of age, rarely fatal in cattle up to two years of age, sometimes fatal in animals up to three years of age, and often fatal in older cattle.\r\n\r\nOnce an animal recovers from infection, either naturally or with normal therapy, it will usually remain a carrier of the disease for life. Carriers show no sign of the disease but act as sources of infection for other susceptible cattle.'),
(13, '''Nagana'' /Trypanosomosis/ Sleeping Disease', 'Nagana, also known as nagana pest or animal African trypanosomiasis, is a disease of vertebrate animals. The disease is caused by trypanosomes of several species in the genus Trypanosoma such as Trypanosoma brucei. Trypanosoma vivax causes nagana mainly in West Africa, although it has spread to South America.[1] The trypanosomes infect the blood of the vertebrate host, causing fever, weakness, and lethargy, which lead to weight loss and anemia; in some animals the disease is fatal unless treated. The trypanosomes are transmitted by tsetse flies.\r\n\r\nCause\r\n\r\nTrypanosomosis is usually transmitted through blood lymph and other fluids of infected animals. It is caused by Flagellated protozoan parasites that live in the fluids and tissue of its host animal.\r\n\r\nOften the disease is transmitted through the bite of an infected tsetse fly which has been feeding on an infected animal.', 'The signs of disease appear 11-21 days after an infective bite as a relapsing fever, with temperature peaks. These peaks are associated with an increase in the numbers of trypanosomes in the circulating blood, followed by the destruction of large numbers of the parasites and a return to a normal temperature. The end of the period of parasite destruction is the crisis, when antibodies are being produced and large quantities of trypanosome protein are liberated into the bloodstream. Death commonly coincides with a crisis. In areas where reinfection is frequent, death will commonly occur within one to three months, unless the animal is treated with a trypanocide.', '<p align="justify">Symptoms often begin to show four to 24 days after infection. The most important clinical sign is nonregenerative anaemia. <br /><br /> The major clinical signs are:</p>\r\n<ul>\r\n<li>intermittent fever</li>\r\n<li>anaemia</li>\r\n<li>oedema</li>\r\n<li>lacrimation</li>\r\n<li>enlarged lymph nodes</li>\r\n<li>abortion</li>\r\n<li>decreased fertility</li>\r\n<li>loss of appetite, body condition and productivity</li>\r\n<li>early death in acute forms</li>\r\n<li>emaciation and eventual death in chronic forms often after digestive and/or nervous signs</li>\r\n</ul>', '', 'At present no vaccine is available.\r\n\r\nIf detected early, Trypanosomosis can be treated with trypanocidal drugs for therapeutic and prophylactic purposes.\r\n\r\nTherapeutic drugs for cattle include diminazene aceturate, homidium chloride and homidium bromide. Prophylactic drugs for cattle include homidium chloride, homidium bromide and isometamidium.\r\n\r\nHowever the effectiveness of these drugs is now questionable following years of use, causing resistence and now variuos strains of Trypanosomosis to occur.\r\n\r\nAnother area of control that has been studied is to eradicate the tsetse flies which transmit the disease.\r\n\r\nThe most common of the procedures that have been deveoped are: spraying insecticide on tsetse habitat, destruction of tsetse habitat and alteration of vegetation so that it becomes unsuitable for tsetse flies.\r\n\r\nHowever, these methods are costly and require a high level of management, organisation and specialist expertise'),
(14, 'East Coast fever', 'East Coast fever (theileriosis) is a disease of cattle, sheep and goats caused by the protozoan parasite Theileria parva. The term excludes diseases caused by other Theileria, such as tropical theileriosis (also known as Mediterranean theileriosis), caused by T. annulata, and human theileriosis, caused by T. microti.', 'Mortality can be up to 100%, with death occurring around 18–30 days after the initial attachment of infected ticks, because the incubation required is around 10–25 days, and the parasite spreads quickly and is rather aggressive.\r\n\r\nClinical signs for diagnosis include, but are not limited to, fever and enlarged lymph nodes near the tick bite(s). Smears and stains can also be done to check for the parasite. Schizonts (meronts, or segmentors) can be found in infected lymphocytes. Pathology includes anorexia, dyspnea, corneal opacity, nasal discharge, frothy nasal discharge, diarrhea, pulmonary edema, leukopenia, and anemia. Endemic cattle given medication sometimes recover to varying degrees, or death follows due to blocked capillaries and parasites infecting the central nervous system.[6] Cattle that are endemic and manage to survive tend to be carriers.\r\n\r\nA form of East Coast fever called corridor disease is observed when the organism is transmitted from the African buffalo to cattle. Another form, called January disease, only occurs over the winter months in Zimbabwe due to the tick lifecycle.\r\n\r\nFor diagnosis, post mortem findings are characteristic and mainly include damage to the lymphoid and respiratory systems.', '', 'Restriction of cattle movements, vector control, treatment and immunization are identified as the main control methods against East Coast fever (ECF). The effectiveness of these methods is very much influenced by cultural practices, economic and political pressures and development of resistance by ticks to acaricides. The proposed strategies for the future include continued restriction of cattle movements, less intensive vector control in enzootic areas so as to maintain enzootic stability, chemotherapy and immunization of the improved cattle. In addition, research efforts to evaluate strategic vector control, develop cheaper drugs, improve the quality and delivery of the stabilate vaccine, and identify and mass produce appropriate immunogenic subunit vaccines should be intensified.', 'Control of the disease also relies on tick control and the development of disease-resistant ticks. Control of ticks of domestic animals is a major concern in tropical countries with large livestock populations, especially in the endemic area of East Coast fever. Chemical pesticides (acaricides) are applied in dipping baths or spray races, and use of breeds of cattle with good ability to acquire immune resistance to the vector ticks are used to control the measure.'),
(15, 'Bovine Viral Diarrhoea (BVD)', 'BVD is a common cause of respiratory and reproductive issues in the herd. It is a economically important disease in many countries, and problems realted to the disease are thought to be increasing in some areas.\r\n\r\nAlthough a disease in itself, BVD causes a number of transient infections which are often the cause of animal health and economic problems.\r\nCause\r\n\r\nBovine viral diarrhea is a viral disease of cattle and other ruminants that is caused by the bovine viral diarrhea virus (BVDV).\r\n\r\nBVD is transmitted in a number of ways. Either through a congenital infection of the fetus or after birth. Congenital infections may cause resorption, abortion, stillbirth, or live-birth. Congenitally infected fetuses that survive in utero infection (i.e., the live-births) may be born as BVDV-infected calves. The BVDV infection in these calves will persist during the entire life of the calf, and they will shed BVDV continuously in the farm environment.', '', 'In adults, clinical signs are highly variable. Signs of acute infection include fever, lethargy, loss of appetite, ocular dishcharge, nasal dischargem oral lesions, diarrhea and decreasing milk production. Chronic infection may lead to signs of mucosal disease. <br /> <br /> In calves, the most commonly recognised birth defect is cerebellar hypoplasia. The signs of this are:\r\n<ul>\r\n<li>Ataxia/ lack of voluntary coordination of musle movements;</li>\r\n<li>Tremors</li>\r\n<li>Wide stance</li>\r\n<li>Stumbling</li>\r\n<li>Failure to nurse</li>\r\n</ul>\r\n<p align="justify">In severe cases the calf may die. <br /> <br /> Transient infections include diarrhea, calf pneumonia, decreased milk production, reproductive disorders, increased occurrence of other diseases, and death<br /> <br /> The losses from fetal infection include abortions; congenital defects; weak and abnormally small calves; unthrifty, persistently infected (PI) animals; and death among PI animals.</p>', 'Research is ongoing to look at the potential for breeding animals that are less susceptible to the disease. At the moment, no one breed has an advantage.\r\n\r\nOne strategy to minimise BVD transmission is to make infected cattle less infectious, and this can be achieved by increasing the antibody titer. Cattle that have antibodies at the time that they acquire acute BVDV infection do not shed as much virus, and they will shed virus for a shorter period of time.\r\n\r\nOn farm there it is important for producers to cull persistantly infected animals from the herd. Blood tests will identify Housing calves in individual hutches as opposed to group housing will decrease contact and risk of infection, as will reducing stocking density.\r\n\r\nStrategic vaccination and high-quality colostrum could also decrease the proportion of susceptible cattle.\r\n\r\nA BVD control programme on farm would aim to prevent fetal infections, to eliminate reproductive loss and decrease losses due to transient infections. Control is achieved with a combination of removal of PI cattle, vaccination and enhanced biosecurity.', 'Treatment of BVD is limited primarily to supportive therapy. Once identified, infected animals should be culled. \r\nVaccines\r\n\r\nVaccines for BVD are available. The two categories are modified live virus (MLV) vaccines and killed virus (KV) vaccines. Generally speaking, MLV vaccines require only one dose during the initial immunization step, however they are more difficult to handle.\r\n\r\nKV vaccines are usually more expensive and more than one dose is required during immunization. However, KV vaccines are less susceptible to deactivation by temperature extremes, and they are less susceptible to deactivation by chemicals.'),
(16, 'Bovine Babesiosis (Redwater, Tick Fever)', 'Cause\r\n\r\nBovine Babesiosis (BB) is a tick-borne disease of cattle.\r\n\r\nThe principal strains are babesia bovis and babesia bigemina, with Rhipicephalus ticks being the major vector.\r\n\r\nBabesia divergens is also found, with the major vector being Ixodes ricinus.\r\n\r\nBB is found in areas where its arthropod vector is distributed, especially tropical and subtropical climates. Babesia bovis and B. bigemina are more widely distributed and of major importance in Africa, Asia, Australia, and Central and South America. Babesia divergens is economically important in some parts of Europe and possibly northern Africa.\r\n\r\nTransmission of B bovis takes place when engorging adult female ticks pick up the infection. They pass it on to their progeny via their eggs. Larvae (or seed ticks) then pass it on in turn when feeding on another animal. B bigemina is also passed from one generation of ticks to the next. Engorging adult ticks pick up the infection and nymphal and adult stages (not larval stages) of the next generation pass it on to other cattle.\r\n\r\nMorbidity and mortality vary greatly and are influenced by prevailing treatments employed in an area, previous exposure to a species/strain of parasite, and vaccination status. In endemic areas, cattle become infected at a young age and develop a long-term immunity. However, outbreaks can occur in these endemic areas if exposure to ticks by young animals is interrupted or immuno-naïve cattle are introduced. The introduction of Babesia infected ticks into previously tick-free areas may also lead to outbreaks of disease.', '', '<p align="justify">BB is predominantly observed in adult cattle. Infected animals develop a life-long immunity against re-infection with the same species and some cross-protection is evident in B. bigemina-immune animals against subsequent B. bovis infections.</p>\r\n<em><strong>B. bovis</strong></em><br /> <br /> Conditions are often more severe than other strains.\r\n<ul>\r\n<li>High fever</li>\r\n<li>Parasitaemia (percentage of infected erythrocytes) - maximum parasitaemia is often less than one per cent.</li>\r\n<li>Neurologic signs such as incoordination, teeth grinding and mania. Some cattle may be found on the ground with the involuntary movements of the legs. When the nervous symptoms of cerebral babesiosis develop, the outcome is almost always fatal.</li>\r\n<li>Dark coloured urine</li>\r\n<li>Anorexia</li>\r\n</ul>\r\n<em><strong>B. bigemina</strong></em>\r\n<ul>\r\n<li>Fever</li>\r\n<li>Anorexia</li>\r\n<li>Animals likely to separate from herd, be weak, depressed and reluctant to move</li>\r\n<li>Haemoglobinuria and anaemiaDark coloured urine</li>\r\n<li>Central nervous system (CNS) signs are uncommon</li>\r\n<li>Lesions</li>\r\n<li>In <em>b. bigemina</em> parasitaemia often exceeds 10 per cent and may be as high as 30 per cent.</li>\r\n</ul>\r\n<p align="justify">Clinical symptoms for <em><strong>Babesia divergens </strong></em> are similar to <em>B. bigemina</em> infections.<br /> <br /> The survivors may be weak and in reduced condition, although they usually recover fully. Subacute infections, with less apparent clinical signs, are also seen.</p>', 'Effective control of tick fevers has been achieved by a combination of measures directed at both the disease and the tick vector. Tick control by acaracide dipping is widely used in endemic areas.\r\n\r\nDipping may be done as frequently as every 4-6 weeks in heavily infested areas. The occurrence of resistance of ticks, chemical residues in cattle and environmental concerns over the continued use of insecticides has led to use of integrated strategies for tick control.\r\n\r\nBabesiosis vaccines are readily available and are highly effective. Anti-tick vaccines are also available in some countries and can be used as part of an integrated program for the control of ticks.\r\n\r\nBabesiosis can be eradicated by eliminating the host tick(s). In the US, this was accomplished by treating all cattle every two to three weeks with acaricides. In countries where eradication is not feasible, tick control can reduce the incidence of disease.', 'Mild cases may recover without treatment.\r\n\r\nSick animals can be treated with an antiparasitic drug. Treatment is most likely to be successful if the disease is diagnosed early; it may fail if the animal has been weakened by anemia.\r\n\r\nImidocarb has been reported to protect animals from disease but immunity can develop. There are also concerns with regard to residues in milk and meat.\r\n\r\nIn some cases blood transfusions and other supportive therapy should be considered.');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `dis_code` tinytext NOT NULL,
  `dis_name` tinytext NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='store district' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `dis_code`, `dis_name`, `created`) VALUES
(4, 'DIS39170424J', 'kampala', '2017-04-24 06:07:57'),
(5, 'DIS94170424J', 'Mpigi', '2017-04-24 06:09:37'),
(6, 'DIS15170424J', 'Masaka', '2017-04-24 06:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `emg_contact`
--

CREATE TABLE IF NOT EXISTS `emg_contact` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fbk` varchar(255) NOT NULL,
  `twiter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emg_field_details`
--

CREATE TABLE IF NOT EXISTS `emg_field_details` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `postID` int(255) NOT NULL,
  `fieldID` varchar(255) NOT NULL,
  `Detail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emg_messages`
--

CREATE TABLE IF NOT EXISTS `emg_messages` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `dater` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emg_meta`
--

CREATE TABLE IF NOT EXISTS `emg_meta` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `hostname` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_uname` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_fname` varchar(255) NOT NULL,
  `admin_level` varchar(255) NOT NULL,
  `admin_profile_pic` varchar(255) NOT NULL,
  `dater` varchar(255) NOT NULL,
  `admin_color` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `emg_meta`
--

INSERT INTO `emg_meta` (`id`, `hostname`, `p_name`, `admin_email`, `admin_uname`, `admin_password`, `admin_fname`, `admin_level`, `admin_profile_pic`, `dater`, `admin_color`) VALUES
(1, 'http://localhost/Jaguza', 'JAGGUZA', 'bamwinealbert@gmail.com', 'bamwine', 'd1570931c7b177a4202954025bf8716b', 'Main_Admin', 'Main_Admin', 'img/placeholder2.png', '2017-04-13 12:46:27', 'black'),
(2, '', '', 'Katamba@gmail.com', 'Katamba', '0936d678d68029b46d76cea2ca68b249', 'Katamba Ronald', 'Editor', 'uploads/vlcsnap-2017-02-04-14h50m54s27-743530273.png', '2017-04-14 17:38:48', 'red');

-- --------------------------------------------------------

--
-- Table structure for table `emg_more_fields`
--

CREATE TABLE IF NOT EXISTS `emg_more_fields` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fieldName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emg_pages`
--

CREATE TABLE IF NOT EXISTS `emg_pages` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) NOT NULL,
  `post_content` text,
  `author` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dater` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emg_plugins`
--

CREATE TABLE IF NOT EXISTS `emg_plugins` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `plugin_name` varchar(255) NOT NULL,
  `plugin_details` varchar(255) NOT NULL,
  `plugin_image` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `dater` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emg_posts`
--

CREATE TABLE IF NOT EXISTS `emg_posts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `post_ID` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` text,
  `post_image` varchar(255) NOT NULL,
  `post_category` varchar(255) NOT NULL,
  `page_id` varchar(255) NOT NULL,
  `post_url` varchar(255) NOT NULL,
  `dater` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emg_posts`
--

INSERT INTO `emg_posts` (`id`, `post_ID`, `post_title`, `post_content`, `post_image`, `post_category`, `page_id`, `post_url`, `dater`, `status`, `author`) VALUES
(1, '831158854', 'jaguza dash', 'Our&nbsp; research indicates that about 48 hours before the major visual appearance , the core&nbsp; temperatures had increased significantly <br>&nbsp;<br>', 'uploads/3-967834472.png', 'jaguza_dash', 'Home', 'jaguza-dash', '2017-04-17 09:43:56', 'publish', 'bamwine');

-- --------------------------------------------------------

--
-- Table structure for table `emg_post_cats`
--

CREATE TABLE IF NOT EXISTS `emg_post_cats` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emg_post_cats`
--

INSERT INTO `emg_post_cats` (`id`, `category`) VALUES
(1, 'jaguza_dash');

-- --------------------------------------------------------

--
-- Table structure for table `emg_post_tag_relate`
--

CREATE TABLE IF NOT EXISTS `emg_post_tag_relate` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) NOT NULL,
  `post_ID` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emg_tags`
--

CREATE TABLE IF NOT EXISTS `emg_tags` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `tags` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(128) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` varchar(26) NOT NULL,
  `email` varchar(30) NOT NULL,
  `typeowk` varchar(100) NOT NULL,
  `startdate` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `farm_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `full_name`, `address`, `telephone`, `email`, `typeowk`, `startdate`, `salary`, `date_added`, `farm_id`) VALUES
(1, 'bamwine2', 'kampala', '45676', 'bamwe@gmail.com', 'digger', '7899', 200000, '2017-04-28 08:42:22', 'FA17042496J'),
(2, 'bamwine2', 'kampala', '45676', 'bamwe@gmail.com', 'digger', '7899', 200000, '2017-04-28 08:42:22', 'FA17042496J');

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

CREATE TABLE IF NOT EXISTS `farms` (
  `fam_id` int(150) NOT NULL AUTO_INCREMENT,
  `fam_code` tinytext NOT NULL,
  `fam_owner` tinytext NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`fam_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`fam_id`, `fam_code`, `fam_owner`, `created`) VALUES
(5, 'JF17042457I', 'FA17042496J', '2017-04-24 08:29:55'),
(6, 'JF17050281I', 'FA17042496J', '2017-05-02 14:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `animal` enum('Goats','Poultry','Pigs','Cattle') NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `famer_id` varchar(100) NOT NULL,
  `cost` int(100) NOT NULL,
  `comments` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `feeds`
--

INSERT INTO `feeds` (`id`, `quantity`, `animal`, `date_added`, `famer_id`, `cost`, `comments`) VALUES
(3, 30, 'Goats', '2015-06-23 10:33:21', '', 0, ''),
(4, 24, 'Goats', '2015-05-23 10:33:38', '', 0, ''),
(5, 10, 'Goats', '2017-05-02 07:17:21', 'FA17042496J', 10000, ''),
(6, 23, 'Poultry', '2015-06-23 10:34:25', '', 0, ''),
(8, 45, 'Poultry', '2017-05-02 07:14:58', 'FA17042496J', 2000000, '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=10 ;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(3, '::1', 'james', NULL),
(4, '::1', 'james', NULL),
(5, '::1', 'admin', NULL),
(6, '::1', 'admin', NULL),
(9, '41.190.143.250', 'farmers', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `report` text NOT NULL,
  `feedback` text NOT NULL,
  `move_from_observation` enum('Yes','No','Alert Vet doctor') NOT NULL,
  `status` varchar(3) NOT NULL DEFAULT 'No',
  `farmer_id` varchar(100) NOT NULL,
  `vet_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `vet_id` (`vet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `tag_id`, `report`, `feedback`, `move_from_observation`, `status`, `farmer_id`, `vet_id`, `date_added`) VALUES
(1, 21234, 'ssssss', 'take medice', 'Yes', 'yes', 'FA17042496J', 2, '2015-05-16 16:33:29'),
(3, 67845, 'The animal has failed to improve. It continuously bleeds from the nose with a lot of mucus in the ears and i suspect it could it be foot and mouth diseases. the temperatures have also soared recently. Any advice on that will be full appreciated.', 'The cause of the disease could be exposure to much sunlight.', 'Alert Vet doctor', 'Yes', 'FA17042496J', 2, '0000-00-00 00:00:00'),
(5, 67845, 'has improved', 'good take back', 'Yes', 'yes', 'FA17042496J', 1, '2015-05-22 08:09:16'),
(6, 23456, 'the animal not improving', 'try this medicine', 'Alert Vet doctor', 'Yes', 'FA17042496J', 2, '2015-05-22 10:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `milk`
--

CREATE TABLE IF NOT EXISTS `milk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `litres` int(11) NOT NULL,
  `unitp` int(150) NOT NULL,
  `date_added` datetime NOT NULL,
  `famer_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `milk`
--

INSERT INTO `milk` (`id`, `amount`, `litres`, `unitp`, `date_added`, `famer_id`) VALUES
(2, 2450, 40, 0, '2015-04-07 23:44:12', ''),
(3, 27000, 30, 900, '2017-05-01 19:59:09', 'FA17042496J'),
(4, 35600, 27, 0, '2015-05-02 00:00:00', ''),
(5, 33500, 67, 500, '2017-05-01 19:58:10', 'FA17042496J'),
(7, 80000, 80, 1000, '2017-05-01 19:54:51', 'FA17042496J'),
(8, 38500, 55, 700, '2017-05-17 10:01:33', 'FA17042496J');

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE IF NOT EXISTS `monitor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `temp` varchar(120) NOT NULL,
  `date_time` datetime NOT NULL,
  `tag_id` varchar(50) NOT NULL,
  `famer_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`id`, `temp`, `date_time`, `tag_id`, `famer_id`) VALUES
(1, '10.2', '2015-02-04 08:19:10', '456234', 'FA17042496J'),
(2, '10.2', '2015-02-13 16:15:28', '456234', 'FA17042496J'),
(3, '50.4', '2015-05-22 03:10:19', '456234', 'FA17042496J'),
(4, '40.2', '2015-05-22 01:18:18', '456435', 'FA17042496J'),
(5, '20.6', '2015-03-17 12:16:09', '456234', 'FA17042496J'),
(7, '10.3', '2015-04-15 05:19:04', '456234', ''),
(8, '53.4', '2015-05-22 08:12:15', '67845', ''),
(9, '30.5', '2015-05-12 06:14:04', '456234', ''),
(10, '50.7', '2015-05-22 12:04:09', '34523', '');

-- --------------------------------------------------------

--
-- Table structure for table `observation`
--

CREATE TABLE IF NOT EXISTS `observation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` varchar(6) NOT NULL,
  `temp` int(11) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `famer_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `observation`
--

INSERT INTO `observation` (`id`, `tag_id`, `temp`, `added`, `famer_id`) VALUES
(3, '23456', 37, '2016-09-13 14:29:57', ''),
(4, '56345', 42, '2016-09-13 14:29:57', ''),
(5, '456234', 43, '2016-09-13 14:29:57', '');

-- --------------------------------------------------------

--
-- Table structure for table `resour_center`
--

CREATE TABLE IF NOT EXISTS `resour_center` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(128) NOT NULL,
  `description` longtext NOT NULL,
  `signs` text NOT NULL,
  `symptoms` text NOT NULL,
  `prevention` text NOT NULL,
  `treatment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `resour_center`
--

INSERT INTO `resour_center` (`id`, `topic`, `description`, `signs`, `symptoms`, `prevention`, `treatment`) VALUES
(1, 'How to Raise Cattle', '<p><strong><a href="http://www.wikihow.com/Raise-Cattle">How to Raise Cattle</a></strong></p>\r\n<p>There is more than one way to raise cattle, that is something that everyone, beginner and veteran cattlemen alike. How cattle are raised not only depends on the individual raising them, but the <a title="Identify Cattle Breeds" href="http://www.wikihow.com/Identify-Cattle-Breeds">breed</a>, class and type of cattle in concern. For instance, <a title="Start up a Beef Cow Calf Operation" href="http://www.wikihow.com/Start-up-a-Beef-Cow-Calf-Operation">beef cows</a> are raised differently from <a title="Milk a Cow" href="http://www.wikihow.com/Milk-a-Cow">dairy cows</a>: beef cows are raised to live with minimal management and raise a calf that, in 95% of all cases are sold for beef, and dairy cows are raised to give milk, but not raise a calf. As far as beef cattle are concerned, there are far more variations as how these type of cattle are raised than with dairy cattle. As such, this article will only focus on the <em>general</em> aspects of raising cattle, only briefly touching base with both beef and dairy production practices.</p>\r\n<p><strong>Purchase and </strong><a title="Start a Cattle Farm" href="http://www.wikihow.com/Start-a-Cattle-Farm"><strong>start up your cattle herd</strong></a><strong>.</strong> You will have needed to have chosen your cattle before you purchase them in order to start up the operation you''re managing.</p>\r\n<p><strong>From the </strong><a title="Write a Business Plan for Farming and Raising Livestock" href="http://www.wikihow.com/Write-a-Business-Plan-for-Farming-and-Raising-Livestock"><strong>business plan you created before starting your cattle operation</strong></a><strong>, carry through with the various operational and strategic plans you had set out as best as possible.</strong> You may find out soon enough that some of your plans may not work out like you expected and you may have to make some compromises whenever and however necessary.</p>\r\n<p>However, usually very few plans, if any would require any major changes or rethinking if you have done your research as thoroughly as possible before purchasing your animals.</p>\r\n<p>The main things that you need to follow through from your business plan include the following (a few are mentioned in the proceeding steps):</p>\r\n<ul>\r\n<li><a title="Breed Dairy Cattle" href="http://www.wikihow.com/Breed-Dairy-Cattle">Breeding (dairy</a> and <a title="Breed Beef Cattle" href="http://www.wikihow.com/Breed-Beef-Cattle">beef cow-calf</a> only)</li>\r\n<li><a title="Observe the Birth of a Calf" href="http://www.wikihow.com/Observe-the-Birth-of-a-Calf">Calving</a> (dairyand beef cow-calf only)</li>\r\n<li><a title="Wean Cattle" href="http://www.wikihow.com/Wean-Cattle">Weaning</a> (beef cow-calf primarily, dairy as well if calves also raised on-farm)</li>\r\n<li>Marketing and selling livestock of various classes (all sectors: dairy, beef cow-calf, back grounding/stocker and feedlot)</li>\r\n<li>Replacement heifers selection criteria and management (dairy and beef cow-calf only)</li>\r\n<li><a title="Cull Cattle" href="http://www.wikihow.com/Cull-Cattle">Cull cow/bull/heifer criteria and management</a> (dairy and beef cow-calf only)</li>\r\n<li><a title="Select a Herd Bull for Your Cows" href="http://www.wikihow.com/Select-a-Herd-Bull-for-Your-Cows">Herd bull management</a> (primarily beef cow-calf, some dairy)</li>\r\n<li><a title="Start a Dairy Farm" href="http://www.wikihow.com/Start-a-Dairy-Farm">Milk production</a> (dairy only)</li>\r\n<li><a title="Raise Bucket Calves" href="http://www.wikihow.com/Raise-Bucket-Calves">Care of bottle calves</a> (dairy only) or <a title="Care for an Orphan Calf" href="http://www.wikihow.com/Care-for-an-Orphan-Calf">orphaned calves</a> (beef cow-calf)</li>\r\n<li>Herd health management including vaccination/deworming schedules (all sectors)</li>\r\n<li><a title="Feed Cattle" href="http://www.wikihow.com/Feed-Cattle">Feeds, feeding</a> and <a title="Determine How Many Head of Cattle Per Acre Are Required for Your Pastures" href="http://www.wikihow.com/Determine-How-Many-Head-of-Cattle-Per-Acre-Are-Required-for-Your-Pastures">pasture management</a> (all sectors)</li>\r\n<li>Handling and disposal of deadstock (all sectors)</li>\r\n<li>Crop and/or hay production (all sectors)</li>\r\n<li>Human resource management (primarily dairy and feedlot, some beef cow-calf especially with cattle ranches)</li>\r\n<li>Capital and assets including fences, machinery, equipment and buildings in terms of maintenance, repairing and building new (all sectors)</li>\r\n<li>Goals and objectives for future improvements (all sectors)</li>\r\n<li>Succession and dispersal of herd and/or farm (all sectors)</li>\r\n</ul>\r\n<p><strong>Keep up with feeding and/or pasture management.</strong> You cannot raise cattle if you have nothing to feed them or no pasture for them to graze on. Make sure you have the feed available before you have purchased your animals or adequate pasture. Cattle eat grass, hay, silage and grain, and tend to be raised best on the first two or three.</p>\r\n<p>What type of feeds you wish to feed your animals depends on what type of cattle you''re raising, your goals and your location. For instance, you can easily raise a beef cow-calf herd on just grass and hay or raise some backgrounder/stocker calves on grass for the summer. Fattening cattle the conventional way primarily requires silage and grain, and feeding dairy cattle requires that plus moist hay in the form of haylage.</p>\r\n<p>Some dairy cattle may also be allowed to graze for part of the year or most of the year as well, depending on whether the operation is an organic grass-fed dairy or not.</p>\r\n<p>For <a title="Graze Cattle on Pasture" href="http://www.wikihow.com/Graze-Cattle-on-Pasture">pasture</a>, make sure you have an adequate <a title="Calculate Stocking Rates for Your Pastures" href="http://www.wikihow.com/Calculate-Stocking-Rates-for-Your-Pastures">stocking rate</a> or stocking density so you avoid overgrazing. Ideally you should try to <a title="Manage Pastures Using Rotational or Management Intensive Grazing" href="http://www.wikihow.com/Manage-Pastures-Using-Rotational-or-Management-Intensive-Grazing">rotationally or manage-intensive graze</a> your pastures as much as you can.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Maintain a good herd health program.</strong> This especially so if it''s needed. A herd health program is especially imperative if you are purchasing cattle and bringing them into your herd, because these new cattle could be carriers of disease that may affect your current herd. It''s also important if you are raising them in an area where disease and illness tends to be prevalent, such as confined in a barn or out on a dirt lot, or feeding them feed, like grain, that tends to cause problems.</p>\r\n<p>A herd health program is not just about what products are available to use to vaccinate, deworm/delice or treat animals, it''s all about prevention as well, and what you can do to prevent illnesses and diseases from occurring. Prevention steps include and are not unlimited to vaccinations, quarantine periods, avoiding doing activities with cattle during certain times, ensuring adequate feed and minerals are available, and maintaining a good strict culling program.</p>\r\n<p>You must also know and have certain items on hand in case of an emergency. Items such as <a title="Help a Cow Give Birth" href="http://www.wikihow.com/Help-a-Cow-Give-Birth">calving chains, calf puller</a>, epinephrine, dexamethazone, trocar and canola, mineral oil, esophageal tube with frick tube, rope (lariat and/or cotton or poly rope), latex gloves, shoulder-length gloves, extra needles and syringes, Dettol (or a similar disinfectant), 70% alcohol solution, among many others should be in an emergency kit (items ultimately depend on what type of cattle you have) in case anything goes wrong and a veterinarian is not able to arrive on time.</p>\r\n<p>You may eventually have to face the hard truth that some animals cannot be cured, and you may have to euthanize it yourself. Most producers use a gun to put an animal down, simply by putting a bullet in the middle of the forehead just above the eyes. It is the quickest and most humane way to put a suffering animal out of its misery instead of simply letting it die a slow and painful death on its own.</p>\r\n<p><strong>Know how to deal with deadstock.</strong> With raising livestock it''s entirely expected that you may end up having a dead animal (or more) on your hands to deal with. Research your local livestock disposal laws to determine what is best to dispose of a dead animal''s carcass.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Know when, where and how to market or sell your animals.</strong> There are five main routes of selling cattle: salebarn/auction mart, private-treaty, direct sales, purebred sales and dispersal sales.</p>\r\n<p>The majority of cattle are sold through the sale barn or auction mart. Emphasis is placed on cull cattle, weaned calves, and fats (cattle ready for slaughter). Usually it is hear where "problem cattle" get dropped off to go to the kill pen or be sold for slaughter, and weaned calves change hands from the ranch where they were born to a feedlot or farm that backgrounds them and readies them for slaughter. Usually replacement stock are not purchased here, unless the prices are very good and producers are willing to get rid of more than their fair share of cattle, no matter if they have problems or not. Cattle can be sold through live internet auction or simply hauling them in the trailer to the nearest auction mart to you. Both beef and dairy cattle are sold this way.</p>\r\n<p>Private treaty is where you negotiate sales or purchases of livestock between the buyer or seller, which ever you and the other person happen to be. You can sell cattle in an advertisement posted in the local newspaper, magazine or an Internet classified site such as Craigslist or Kijiji. People who read your ad may want to contact you for information or out of interest in the cattle you have up for sale. Private treaty sales may also come about from word-of-mouth, and not from reading newspaper or Internet advertisements at all.</p>\r\n<p>Direct sales would also work in the same way as private-treaty, except you are mostly selling beef, not live cattle, directly to a consumer interested in your product. Direct sales happen through word-of-mouth, an advertisement posted on your website marketing your product as "nothing but the best," or a little ad in a local newspaper. It also occurs when selling your product at a stand at a farmer''s market.</p>\r\n<p>Purebred sales are only for those with purebred seedstock or cow-calf herds and are marketing live, purebred cattle for other producers, purebred or commercial themselves, to purchase. Yearling bulls and heifers are primarily sold this way, either through auction on-farm, or through advertisements to encourage private-treaty sales.</p>\r\n<p>Dispersal sales are sales where you can sell a whole herd or most of your herd of cattle to other interested buyers, be they meat packers or other producers. Dispersal sales are only for the purpose of selling almost your whole cow-calf herd, not if you were selling you''re year''s worth of stocker cattle you purchased several months ago.</p>\r\n<p><strong>Manage other enterprises such as crops, hay and silage.</strong> If you are a producer that prefers to make their own feed rather than purchase it, this is one of the most important enterprises for your operation. You may be an operation that focuses on all three, just one, or any of the two. That all depends on what kind of cattle you run and whether you aim to be more conventional (graze in the summer, confine and feed in winter), or low-cost natural (graze all year round, grass-only, no grain or silage to feed). Whatever you choose, these enterprises must be managed in such a way that they give back to you in being good-quality feed for your livestock.</p>\r\n<p>Crops must be seeded and harvested on time.</p>\r\n<p>Silage must be harvested at the right stage, neither too late or too soon.</p>\r\n<p>Hay must be done properly to ensure no spoilage occurs, nor potential for combustion. Cut at the right time, allow it to dry, then rake and bale. Store bales as necessary, especially squares, since they''re more prone to spoilage than round bales.</p>\r\n<p>Machinery for any and all enterprises must be kept in good working order. They do not have to be brand new, but they must be greased, oiled, maintained and broken parts repaired in order for them to keep working smoothly and efficiently.</p>\r\n<p><strong>Maintain good records of your operation.</strong> Anything goes here, with simple paper records to highly detailed computerized worksheets. Regardless of the type of records you keep, be consistent about keeping up to date with all records as you go along.</p>\r\n<p>Records for raising cattle include, but are not limited to:</p>\r\n<p>Health records (which cattle were sick, illness ID, treatment, vaccinations, deworming, etc.)</p>\r\n<p>Breeding records (which cow/heifer was bred to which bull, when they were bred, which females turned up open after breeding season, etc.)</p>\r\n<p>Calving records (which female had which calf, calving troubles, when which cow calved, sex of calf born, etc.)</p>\r\n<p>Financial records (expenses, loans, rent, utility bills, income, etc.)</p>\r\n<p><strong>Always know where you stand financially by keeping up with bank statements, cash flow, balance sheets and income statements.</strong> This is a good way to tell if you are making money or losing money. Don''t panic if you see you are losing money if you are in the process of starting up a cattle operation, but you should be worried if you''re still losing money if you''re operating ten years down the road. If you''re breaking even or even gaining a little income, give yourself a pat on the back for a job well-done.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Enjoy it.</strong> You won''t make much money from it; so if you''re in it for the money you''re in the wrong business. Raising cattle has became and remained more of a way of life than a money-making enterprise, and thus is one that requires more of a want to raise cattle than a need due to the want for more money. You''ll find it a challenge and a difficulty at times, sometimes asking yourself why you wanted to get involved in raising these critters in the first place, but you''ll just keep loving it and keep wanting to do it.</p>\r\n<p>&nbsp;</p>\r\n<h2>Tips</h2>\r\n<ul>\r\n<li>There are a vast number of breeds and breed crosses that you can use and implement into your herd. Anything you choose from the more heritage-type cattle to the most popular, commercial breeds should be ones that fit into your operation and goals.</li>\r\n<li>Be flexible in how you manage things. You won''t be able to go far if you are unwilling to change or bend in face of challenging situations.</li>\r\n<li>Be aware of what kind of cattle your markets are demanding, especially if you plan on selling through the auction.</li>\r\n<li>Be willing to learn something new every day.</li>\r\n</ul>\r\n<h2>Warnings</h2>\r\n<ul>\r\n<li>Cattle are large animals and deserve to be treated as large animals, not small cats and dogs. Never spoil a bovine, otherwise that will make them think they''re always the boss and never you.</li>\r\n</ul>\r\n<h1><a href="http://www.wikihow.com/Raise-Rabbits">How to Raise Rabbits</a></h1>\r\n<p>Rabbits are lovely pets to have; they are tame and playful, and they are social. However, it does take a lot of work to take care of a rabbit. Read on so you will know the correct way of caring for this wonderful pet.</p>\r\n<p><strong>Make sure that the rabbit has a clean, safe hutch to live in and enough room to move around.</strong> If it lives outside, it should have a waterproof roof, and in the summer, the hutch should be placed in the shade so that the rabbit doesn''t get too hot. The best hutches to buy are those with two ''rooms'', one with a secure wire window and a private room for the rabbits to sleep. The hutch should have a good lock so that the rabbit cannot escape or run off.</p>\r\n<p><strong>Have a run for your rabbit so it can get daily exercise.</strong> It would be best if the run was attached to the hutch, but if this isn''t possible, just put a run in your garden. The run should be spacious, but it should be secure in case the rabbit or rabbits try to escape. If its warm, keep the run in the shade and supply water.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Clean the cage if you want a healthy and clean rabbit.</strong> Eventually, you should find out where your rabbit goes to use the toilet, and you could put some newspaper down here, so that you can just remove the paper when it comes to cleaning the cage out. Soiled bedding, food that is not in the bowl or fruit or beg that hasn''t been eaten should be removed daily. Clean the hutch out when the rabbit is in the run, so that it can also be getting exercise. Clean out the food bowl and change the food daily.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Make sure you have a water bottle for your rabbit.</strong> The best kind are those that are placed on the side of the cage on the outside and face into the cage.This is better because the rabbit can not knock it over. The bottle should be cleaned out and fresh water should be supplied every day.</p>\r\n<p><strong>Feed your rabbit fresh fruit and veggies and pellets daily and make sure it always has a lot of fresh hay.</strong> Feed alfalfa hay for growing bunnies and timothy hay for adults</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Grooming your rabbit is also important.</strong> If you have a short haired rabbit, brush it every week. Try and find a brush specifically for rabbits and be gentle when you are brushing them. If you have a long haired rabbit, grooming should be done daily. You should trim the rabbits hair or get a groomer to do it so that it does not grow too long. Long haired rabbits should be brushed daily so that their fur does not get matted.</p>\r\n<h2>Tips</h2>\r\n<ul>\r\n<li>When you clean out your rabbits water bottle, make sure to clean the nozzle well with warm water to prevent anything growing in it.</li>\r\n<li>Find some sticks in your yard and make a perch. Your rabbit(s) probably won''t sit on it, but the sticks will be good for chewing.</li>\r\n<li>Buy a cage that has easy access to make it easier for yourself to clean.</li>\r\n<li>If you buy a cage with a wire floor, it could irritate the rabbits feet after a period of time.</li>\r\n<li>If your rabbits begin developing hocks (their feet) sores from the wire, you can buy wire plastic protectors at any TSC store, also many pet stores.</li>\r\n<li>If your rabbit is in its run, it is safe to feed them dandelions or for them to eat dandelions (if they do not have pesticides on them).</li>\r\n<li>You can buy wood sticks (dowels) at the nearest home improvement store or any store with a large hobby department.</li>\r\n<li>Get a book on keeping rabbits.</li>\r\n</ul>\r\n<h2>Warnings</h2>\r\n<ul>\r\n<li>Do not give your rabbit too much fruit or vegetables as it can give them diarrhea.</li>\r\n<li>Rabbits don''t need baths, they can find this stressful.</li>\r\n<li><strong>Never feed rabbits chocolate</strong> because they''ll just want more, and it can be <strong>deadly if given in large amounts.</strong> If you must share some, only feed a piece the size of your smallest toe-nail.</li>\r\n<li><strong>Never</strong> cut your rabbits hair, unless it''s an Angora. If you''re afraid to give your Angora a hair-cut, have a breeder who''s experienced, do it for you. You can learn from them as well, and they can teach you as they do it.</li>\r\n</ul>\r\n<h1><a href="http://www.wikihow.com/Start-a-Cattle-Farm">How to Start a Cattle Farm</a></h1>\r\n<p>There are various reasons why a person might want to raise cattle. Some raise large herds to sell, others, in the case of dairy, raise them to sell their milk. Many raise cattle to show in fairs and other local events. In today''s economy, many families are deciding to raise cattle for their personal use. Whether you want to have a few head for your family''s needs or raise a herd to sell, there are a few basics about how to raise cattle; from purchasing land to selecting the cattle you want to raise.</p>\r\n<p><a title="Write a Business Plan" href="http://www.wikihow.com/Write-a-Business-Plan"><strong>Make a business plan</strong></a><strong>.</strong> Do a SWOT analysis of yourself and the cattle industry you will be entering. Plan what kind of cows you want without looking at any breeds, and what kind of farm you wish to operate.</p>\r\n<p><strong><em>Keep in mind to start small.</em></strong> Don''t spend your money in the first 2 years after buying or inheriting the farm or ranch. If things need repairs, repair only the fencing or facilities that are top priority over other things, such as renovating the barn or the house, or redoing the handling facilities to what you plan on doing. Buy machinery at an auction, not brand new. Buy the equipment and other items that you need right now, not what you want. You will get what you want over the next 5 to 10 years as you grow your new operation.</p>\r\n<p>Try and aim for being a low-cost producer, as that is the surest way to make money, and the best way to start if you don''t have much to begin with!</p>\r\n<p><strong>Locate the area where you want to raise cattle for the next 10 to 30 or more years.</strong> This is important because you need to find a location that you are used to or really like and are confident you can raise your animals in.</p>\r\n<p>Location can range from as far north as Alberta, Canada, to as far south as Uruguay, South America. Factors such as climate, seasonal variances, markets, vegetation and topography differ for every location that you may choose.</p>\r\n<p><strong>Once you''ve made a decision where you want to start up, find land that is up for sale.</strong> Keep in mind that you may need to invest in a down-payment, <a title="Category:Mortgages and Loans" href="http://www.wikihow.com/Category:Mortgages-and-Loans">a loan, or a mortgage</a> for the land you wish to buy, if you do not have enough money to pay it off within the year you buy it.</p>\r\n<p>Land prices tend to increase in areas where there is a higher population, or land is in higher demand than in other areas.</p>\r\n<p>Try to buy a farm or ranch that already has the facilities and fencing laid out for cattle, rather than buying a farm that needs to be converted for cattle.</p>\r\n<p><strong>Find out more about the land location you are interested in.</strong> Contact the local extension office for that county to get more information on previous use, soil type, vegetation, stocking rates and carrying capacity for pastures (tame grassland) or rangelands (native grassland), cattle market demands, etc. Visit the neighbors that are in the area you wish to start farming/ranching in, and talk with them.</p>\r\n<p>Often the neighbors will provide you with more information than what a government agency office can give you.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Research then purchase the type of facilities, equipment and machinery necessary for the type of cattle you have chosen to raise.</strong> Analyze your operation and your financial situation to see what you <strong><em>need</em></strong> (not what you <em>want</em>) for current facilities, equipment and machinery. Fencing, watering facilities, feed bunks/troughs or bale feeders is priority above all other assets needed. A tractor, haying equipment, trailer, handling facilities and other buildings are also important.</p>\r\n<p>If you have chosen a dairy operation, you will need multiple buildings and a milking parlour with stanchions to be able to run your operation, in addition to calving facilities, a calf barn, and a barn to hold cows when they''re not being milked.</p>\r\n<p>When deciding upon the type of stanchion to use for milking, there are several items to consider: first, have the cows been milked before and what are they used to? It is best to keep the same type of stanchion. If you will be raising them yourself, research the different types to determine what would work best in your situation.</p>\r\n<p>With beef cattle, quite often fencing, some sheds and water sources are all you need, especially if you are wanting to raise a <a title="Start up a Beef Cow Calf Operation" href="http://www.wikihow.com/Start-up-a-Beef-Cow-Calf-Operation">grass-based beef operation</a>, be it finishing beefers on grass or a cow-calf operation. The exceptions are if you are willing to spend extra money on winter feeding costs and supplementing your cows with grain, or if you are wanting to run a feedlot.</p>\r\n<p><strong>Determine the type of cattle you want to raise according to your budget and goals.</strong> The most popular choices are <a title="Start a Dairy Farm" href="http://www.wikihow.com/Start-a-Dairy-Farm">dairy</a> or beef. Keep in mind that starting up with and raising dairy cattle is much more time consuming and costly than with beef cattle, and there will be more equipment requirements for dairy than beef as mandated by government regulations.</p>\r\n<p><strong>Research the various </strong><a title="Identify Cattle Breeds" href="http://www.wikihow.com/Identify-Cattle-Breeds"><strong>breeds</strong></a><strong> that you can or wish to raise.</strong> Determine the type of breeds you want according to your goals for your farm or ranch are, not what you like and what you are willing to do to work around the fall-backs of a particular breed.</p>\r\n<p>If you are into beef production start with a breed that is known for good temperament and is not labour intensive. <a title="Identify Hereford Cattle" href="http://www.wikihow.com/Identify-Hereford-Cattle">Herefords</a>, <a title="Identify Red Poll Cattle" href="http://www.wikihow.com/Identify-Red-Poll-Cattle">Red Polls</a>, <a title="Identify Shorthorn Cattle" href="http://www.wikihow.com/Identify-Shorthorn-Cattle">Shorthorns</a>, <a title="Identify Galloway Cattle" href="http://www.wikihow.com/Identify-Galloway-Cattle">Galloways</a> and <a title="Identify British White Cattle" href="http://www.wikihow.com/Identify-British-White-Cattle">British White</a> are such breeds that are renowned for their docility.</p>\r\n<p>If you are insistent of raising <a title="Identify Black Angus Cattle" href="http://www.wikihow.com/Identify-Black-Angus-Cattle">Angus</a> cattle because of what the markets in your area are demanding, please be <em>very</em> careful in selecting the type of cattle you want. See <a title="Raise Black Angus Cattle" href="http://www.wikihow.com/Raise-Black-Angus-Cattle">How to Raise Black Angus Cattle</a> for further information.</p>\r\n<p>If you are into dairy production though, the most best and most popular breeds for dairy are <a title="Identify Holstein Cattle" href="http://www.wikihow.com/Identify-Holstein-Cattle">Holstein</a>, <a title="Identify Jersey Cattle" href="http://www.wikihow.com/Identify-Jersey-Cattle">Jersey</a> and <a title="Identify Brown Swiss Cattle" href="http://www.wikihow.com/Identify-Brown-Swiss-Cattle">Brown Swiss</a>. <a title="Identify Guernsey Cattle" href="http://www.wikihow.com/Identify-Guernsey-Cattle">Guernseys</a> and <a title="Identify Ayrshire Cattle" href="http://www.wikihow.com/Identify-Ayrshire-Cattle">Ayrshires</a> may also be popular for you if you are not located in North America.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Start off with a handful of cows.</strong> Don''t go whole-hog and buy as many cows as you can stock on the land you bought for a whole year. Buy <strong>good</strong> cows, ones that have <a title="Judge Conformation in Cattle" href="http://www.wikihow.com/Judge-Conformation-in-Cattle">great conformation</a>, temperament, mothering ability and forage convertibility (among other things), and avoid those that look thin and are close to breaking-down. Heifers may be an option if you wish to wait for 2 years until you sell their calves; 3-fers/3-in-1''s or bred cow with calf at side is another option, since you can sell the calf in a month or two, and wait for another few months before the cow calves out. Experienced cows tend to be easier to manage and handle than heifers.</p>\r\n<p>Avoid buying a bull if you only have 4 or 5 females; buy a bull only if you have at least 10 cows, or do not wish to use <a title="Artificially Inseminate Cows and Heifers" href="http://www.wikihow.com/Artificially-Inseminate-Cows-and-Heifers">AI (artificial insemination)</a> any longer. If you have only 2 or 5 cows, AI is the cheapest and best (but not always the most effective) option for breeding all your cows. If you don''t want to use AI, then rent a bull or find another cattle producer that will agree to keep your cows for a couple months to have his bull breed them for you.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Determine the amount of pasture that will be required for the breed of cattle that you have selected.</strong> Decide whether the land you already own is sufficient or if you will need to purchase or rent additional pasture.</p>\r\n<p>Determine whether you will be growing hay for the cattle yourself or purchasing it. Makesure that you use only the highest quality hay that you can afford.</p>\r\n<p>Keep in mind that <a title="Feed Cattle" href="http://www.wikihow.com/Feed-Cattle">feed costs</a> comprise almost 26% of the cost of raising cattle. Having sufficient acreage in the summer months for the cattle to graze on reduces those costs immensely, as does raising higher quality hay. Also keep in mind your plans for grazing, such as winter grazing if you don''t want to get caught up in buying or making hay all the time. Winter grazing plans differ from area to area, so be aware of your options.</p>\r\n<p><strong>Start keeping good records of finances, breeding/calving, health/vaccinations, purchases/sales, and assets in your operation.</strong> The most important records are your financial records, because these records determine whether your operation is giving you net income or loss. In Canada, it is mandatory that you have records of all the animals on your farm in addition to RFID tag information for each and every animal that is bought, sold or born on your farm.</p>\r\n<p><strong>Most of all, have fun!</strong> It''s a stressful and demanding lifestyle, but you will forever be learning lots and be kept busy with feeding and maintaining the health of your cowherd.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h2>Tips</h2>\r\n<p>Fences, water, and feed are priority, and should be operational before you buy your cattle. Use the types of waterers that are best for your area: for example, areas where winter predominates for 4 to 6 months of the year, automatic waterers with heating elements in the bowl are the best for wintering cows.</p>\r\n<p>Be sure that cattle have access to water at all times. In winter, check water several times per day for icing over.</p>\r\n<p>Talk with the local vet about herd health programs and incentives for your cowherd. This should be done right after you''ve bought your animals.</p>\r\n<p>Buy more hay than what you will need. There''s no such thing as having too much hay.</p>\r\n<p>There is no best breed to own. <a title="Identify Cattle Breeds" href="http://www.wikihow.com/Identify-Cattle-Breeds">Buy the breed you are most attracted to or you believe will give you the most in terms of profit.</a> Angus may be good if you live in areas where markets demand Angus and Angus-crossbred cattle. Brahman may be best if you live in areas where heat, humidity and insects are a common occurrence.</p>\r\n<p>Keep in mind the standards set by organizations such as the FFA (Future Farmers of America) when selecting and purchasing cattle. Look for the healthiest animals in the group if you are buying private-treaty (one-on-one buyer to seller), or the healthiest and best-behaved groups of cattle at an auction mart. Consider such things as conformation, alertness, balance and desirable characteristics specific to the breed[s] of your choice.</p>\r\n<p>Buy what you <strong>need</strong>, not what you <em>want</em>.</p>\r\n<p>Test your feed for nutritional value. Know the times when your cows will be at their peak nutritional needs and when they will be at their lowest.</p>\r\n<p>Start small. Start off with only a few cows or heifers, then build your herd from there once you''ve gotten more experience with the cattle you currently have.</p>\r\n<p>Try to keep your operation as low-cost as possible; try to implement a year-round grazing program, if possible, to keep the cows out of the drylot and keep them on pasture all year.</p>\r\n<p>Keep good records, from <a title="Breed Beef Cattle" href="http://www.wikihow.com/Breed-Beef-Cattle">breeding</a> and <a title="Tell if a Cow or Heifer Is About to Give Birth" href="http://www.wikihow.com/Tell-if-a-Cow-or-Heifer-Is-About-to-Give-Birth">calving</a> to health and financial records.</p>\r\n<p>Avoid getting a bull as much as possible. AI has been invented for the purpose of avoiding the costs and dangers of caring for and looking after a bull.</p>\r\n<p>Visit local yard sales for used equipment. Check the bulletin boards in feed stores and other area stores for good deals.</p>\r\n<p>&nbsp;Ask questions, and have the local large animal veterinarian on speed-dial in case any health concerns or emergencies come up that you cannot handle on your own.</p>\r\n<p>Don''t keep any calves from your first-calf heifers. They will be less thrifty and not as good as calves that are kept from older cows.</p>\r\n<p>&nbsp;PLAN, plan plan! Plan what kind of cattle you are looking for <em>without</em> looking at ANY breeds, what kind of farm or ranch you want and how you want to operate it, and write about your strengths, weaknesses, opportunities and threats, from what you are capable of doing to the cattle industry as a whole.</p>\r\n<p>&nbsp;</p>\r\n<h2>Tips</h2>\r\n<p>Fences, water, and feed are priority, and should be operational before you buy your cattle. Use the types of waterers that are best for your area: for example, areas where winter predominates for 4 to 6 months of the year, automatic waterers with heating elements in the bowl are the best for wintering cows.</p>\r\n<p>Be sure that cattle have access to water at all times. In winter, check water several times per day for icing over.</p>\r\n<p>Talk with the local vet about herd health programs and incentives for your cowherd. This should be done right after you''ve bought your animals.</p>\r\n<p>Buy more hay than what you will need. There''s no such thing as having too much hay.</p>\r\n<p>There is no best breed to own. <a title="Identify Cattle Breeds" href="http://www.wikihow.com/Identify-Cattle-Breeds">Buy the breed you are most attracted to or you believe will give you the most in terms of profit.</a> Angus may be good if you live in areas where markets demand Angus and Angus-crossbred cattle. Brahman may be best if you live in areas where heat, humidity and insects are a common occurrence.</p>\r\n<p>Keep in mind the standards set by organizations such as the FFA (Future Farmers of America) when selecting and purchasing cattle. Look for the healthiest animals in the group if you are buying private-treaty (one-on-one buyer to seller), or the healthiest and best-behaved groups of cattle at an auction mart. Consider such things as conformation, alertness, balance and desirable characteristics specific to the breed[s] of your choice.</p>\r\n<p>Buy what you <strong>need</strong>, not what you <em>want</em>.</p>\r\n<p>Test your feed for nutritional value. Know the times when your cows will be at their peak nutritional needs and when they will be at their lowest.</p>\r\n<p>Start small. Start off with only a few cows or heifers, then build your herd from there once you''ve gotten more experience with the cattle you currently have.</p>\r\n<p>Try to keep your operation as low-cost as possible; try to implement a year-round grazing program, if possible, to keep the cows out of the drylot and keep them on pasture all year.</p>\r\n<p>Keep good records, from <a title="Breed Beef Cattle" href="http://www.wikihow.com/Breed-Beef-Cattle">breeding</a> and <a title="Tell if a Cow or Heifer Is About to Give Birth" href="http://www.wikihow.com/Tell-if-a-Cow-or-Heifer-Is-About-to-Give-Birth">calving</a> to health and financial records.</p>\r\n<p>Avoid getting a bull as much as possible. AI has been invented for the purpose of avoiding the costs and dangers of caring for and looking after a bull.</p>\r\n<p>Visit local yard sales for used equipment. Check the bulletin boards in feed stores and other area stores for good deals.</p>\r\n<p>Ask questions, and have the local large animal veterinarian on speed-dial in case any health concerns or emergencies come up that you cannot handle on your own.</p>\r\n<p>Don''t keep any calves from your first-calf heifers. They will be less thrifty and not as good as calves that are kept from older cows.</p>\r\n<p>PLAN, plan plan! Plan what kind of cattle you are looking for <em>without</em> looking at ANY breeds, what kind of farm or ranch you want and how you want to operate it, and write about your strengths, weaknesses, opportunities and threats, from what you are capable of doing to the cattle industry as a whole.</p>\r\n<h2>Warnings</h2>\r\n<p>Always keep your eye out for trouble when working with cows and bulls. <a title="Understand Bovine Behaviour" href="http://www.wikihow.com/Understand-Bovine-Behaviour">Know the signs</a>.</p>\r\n<p>Remember Murphy''s Law: Anything that can go wrong, will.</p>\r\n<p>Don''t get into something you think or know you can''t do nor handle.</p>\r\n<p>Raising cattle can be a tough, rough, tiring job at times. It can be very stressful, you will be spilling blood, sweat and tears, and there will be times when you regret getting into raising cattle.</p>\r\n<p>Never get complacent around nor trust a bull, no matter how docile he may seem to be.</p>\r\n<p>Raising cattle is not a 9-5 week-day-only job. It''s a 24/7/365 day job. Cows and cattle never know when statutory holidays occur, when you should take a two-week holiday, nor even when Christmas holidays begin; nor will they ever care.</p>\r\n<p>Cattle are much faster and stronger than you are. Cows can be very dangerous when protecting a new calf; bulls can be unpredictable if you don''t see the warning signs or don''t know what to look for. Bulls tend to be most dangerous when in amongst a herd of cows and when it''s breeding season because they may see you as a potential rival wanting to take over their harem.</p>\r\n<p>Avoid sick, emaciated, and all-around unhealthy animals on your first purchases, even if you feel sorry for them and feel the need to "rescue" them. There''s a reason that they''re being sold for slaughter, most of the time the reasons are that they cannot be saved at all.</p>\r\n<p>Don''t spend all your money in the first two years on the newest farm equipment or the most expensive handling facilities. You will go broke sooner than you think.</p>\r\n<p>In other words: Try to keep out of debt as much as possible.</p>\r\n<h1><a href="http://www.wikihow.com/Care-for-Sheep">How to Care for Sheep</a></h1>\r\n<p>Sheep are grazing mammals often kept as livestock on farms. Sheep can be used for meat, wool and milk. Sheep generally have a lifespan of 6 to 14 years. When well cared for, sheep can live for 20 years. Sheep are adaptable to many climates and can be found throughout the world. There are over 200 breeds of sheep, each of which thrive under particular conditions. If you plan to purchase sheep, you will need to purchase a breed appropriate for your geography and living conditions. You will also need to know how to care for sheep.</p>\r\n<h3>Providing the Right Environment</h3>\r\n<p><strong>Provide year-round shelter.</strong> Your sheep need a shelter that protects them from all the elements, year round. These elements include sun, wind, and rain. While a barn is a great, it''s not necessary. A three-sided structure works just as well.<a href="http://www.wikihow.com/Care-for-Sheep#_note-1"><sup>[1]</sup></a></p>\r\n<p>The nice thing about having a barn with stalls is that you can separate sick or pregnant sheep from the rest of the flock.</p>\r\n<p>A shaded area outside is a good idea, so that the sheep can be outside in the warm weather, but have somewhere cool to graze. This could be anything from an overhang off the barn, or a clump of trees.</p>\r\n<p><strong>Give them straw bedding.</strong> How much bedding you have should depend on how much time the sheep spend in their shelter. For colder climates it''s best to give them a good, thick bedding of hay. This will keep them clean and warm.<a href="http://www.wikihow.com/Care-for-Sheep#_note-2"><sup>[2]</sup></a></p>\r\n<p>Don&rsquo;t use sawdust as this will ruin their wool and is also not very absorbent.</p>\r\n<p>Some people consider pine shavings to be better than hay, because of its absorbency, but that simply depends on your personal preference. Pine shavings do cling to a sheep''s coat, which can make it more difficult come shearing time.</p>\r\n<p>You can sprinkle PDZ in each stall and under the overhang outside about once a month to neutralize urine.</p>\r\n<p><strong>Make sure that your pasture supports the number of sheep you choose.</strong> Sheep will spend about 7 hours a day grazing. An estimated 2 acres of pasture is needed for 6 sheep. The exact acreage needed will depend on the climate and the pasture''s condition.<a href="http://www.wikihow.com/Care-for-Sheep#_note-3"><sup>[3]</sup></a></p>\r\n<p>A good rule of thumb is that a pasture that supports one large grazing animal (like a cow) should support about six or seven commercial sheep.</p>\r\n<p>Pasture sizes vary based on locale, climate, maintenance, type of planting, and rainfall. For example: dry rocky conditions will need more pastureland to provide more grass.</p>\r\n<p><strong>Keep the airflow moving.</strong> Install a fan, and keep the doors to the shelter open. This is especially important if you live in a hotter climate, or have hot summers. There should be airflow all throughout the year, even in the cooler times, although you don''t necessarily want to have the fan going in winter.</p>\r\n<p>A fan and open doors will cool the shelter on hot days, as well as keep the flies away from the sheep.</p>\r\n<p><strong>Set up fencing.</strong> Fencing is incredibly important for keeping the sheep in and the predators out. A five foot (1.5 m) tall fence should be enough to keep the sheep in the pasture. Higher fences are needed to keep predators out.</p>\r\n<p>Make sure you have portable panels to enclose sick sheep, especially if you''re also got stalls. You''ll need to keep them away from the healthy sheep.</p>\r\n<p>You can also electrify your fence. Even with a tall seven foot (2 m) tall fence, predators can dig under the fence and attack your sheep. Electrifying your fence will deter predators as soon as they touch the fence. Don''t count on it keeping your sheep in, though. With heavy coats, sheep are less likely to feel the bolts of electricity.</p>\r\n<h3>Feeding Your Sheep</h3>\r\n<p><strong>Have pasture or hay make up most of their diet.</strong> Sheep naturally eat pasture plants such as grass and clover. If the pasture is large enough and stays in bloom all year, you do not need to provide supplemental food for the sheep.<a href="http://www.wikihow.com/Care-for-Sheep#_note-4"><sup>[4]</sup></a></p>\r\n<p>The amount of pastureland needed will depend on your climate and how fertile the pasture is. In an average climate you can again follow the estimated standard of 2 acres of green pasture for 6 sheep. Climates with hot summers or cold winters that kill the grass will have less fertile pastures.</p>\r\n<p>The amount of hay needed will depend on the quality and quantity of your grass. Sheep will eat around 1.5 lbs. (0.5 kg) of hay for every 100 lbs. (45kg) of their own weight.</p>\r\n<p>Hay is basically cut, dried, and baled forage. It tends to be a grass or legume (like alfalfa or clover). The later the cutting the better the feed quality of the hay, typically.</p>\r\n<p>Alfalfa and clover hays tend to be more nutritious and preferred by most animals. They are more expensive, though, and aren&rsquo;t imperative for sheep.</p>\r\n<p>Keep in mind that some clovers may contain a substance similar to estrogen which can work as birth-control in sheep, so avoid that if you&rsquo;re trying to breed your ewes.</p>\r\n<p><strong>Avoid over-feeding your sheep grain.</strong> Grain isn''t actually that great for sheep, except in a few specific cases, because these mixes tend to contain too much copper for a sheep''s diet. If you do need to supplement your sheep''s diet with grain try and get a mix that is specially formulated for sheep.</p>\r\n<p>Eating too much grain can also cause your sheep to bloat, and potentially die. So really avoid over-feeding grain.</p>\r\n<p>A basic mix with corn/soy/oats, or specially formulated sheep/goat chow from your local feed mill should work if they need a little extra supplement. Ones that may need some grain added to their diet typically are young, lactating, or elderly sheep.</p>\r\n<p>Goat or cow mixes are better than horse mixes if you can&rsquo;t find one that is formulated specially for sheep. Again, sheep are sensitive to copper, so avoid all-purpose mixes.</p>\r\n<p><strong>Avoid storing feed for more than one month.</strong> This is true for both baled hay and for grain mixtures. Storing feed too far in advance can cause it to mold and become toxic to sheep. So make sure that you''re getting fresh food for them, if they need something beyond what''s in the pasture.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>Make sure your sheep have access to salt.</strong> Sheep need the minerals that come with salt. Make sure that you''re getting minerals that are specially made for goats, because while they need copper too much copper can make them ill or kill them.</p>\r\n<p>Salt blocks can be good, but they also don''t last all that long and might not get enough minerals just from licking it.</p>\r\n<p>Loose mineral salt tends to be less expensive than salt blocks and you can place it in a feeder in the shelter.</p>\r\n<p><strong>Provide them with fresh, clean water.</strong> Sheep need access to fresh, clean water. Sheep will consume a couple gallons of water each day, and more when it is hot and it needs to be clean (free of algae and so on).</p>\r\n<p>You can use an automatic waterer if you don''t want to have to carry a bunch of buckets every day. The tub automatically fills when the animals drink. All you have to do is scrub it clean once a week.</p>\r\n<h3>Keeping Your Sheep Healthy</h3>\r\n<p><strong>Maintain their hooves properly.</strong> You want to provide a dry surface for your sheep to walk on the majority of the time and helps to avoid things like foot rot. If it isn''t possible for your sheep to spend time on dry surfaces you''ll need to cut or pare away any excess horn (which is what their hooves are made out of).<a href="http://www.wikihow.com/Care-for-Sheep#_note-5"><sup>[5]</sup></a></p>\r\n<p>Make sure that when you do cut at the dead horn that you don''t cut deep into sensitive tissue. This can cause bleeding and infection in the sheep.</p>\r\n<p>In dry weather you want to trim their hooves every six weeks or so, more in wet weather. Start by digging out dirt from the toes. Trim away excess nail parallel to the lines of hoof growth. Pare the heels to the same level as the soles of the toes. Take away excess nail tissue around each toe. With a wood rasp, make the hoof flat from the sole of the foot forward.</p>\r\n<p>Foot rot is a problem specific to sheep and goats. It''s more frequent with animals who walk on damp or wet ground. Their hooves soften which makes it easier for bacteria to get in. Foot rot can cause severe pain and lameness and usually stays in the pasture around 12 days. Separate infected sheep from the flock (you''ll notice a foul smell). Pare the hoof to remove excess horn, and apply antiseptic agents.</p>\r\n<p><strong>Shear them at least once a year.</strong> Sheep with longer fleeces will need to be sheared twice a year. Consider shearing your sheep before the onset of warmer weather and avoid shearing before cold weather.</p>\r\n<p>You want your sheep to be comfortable during the shearing, so keep your sheep off the pasture for at least ten hours before shearing. This will allow their stomachs to empty out.</p>\r\n<p>Shearing wet sheep can cause health problems, so avoid doing that. Not shearing sheep and allowing their fleece to get waterlogged can make them more prone to flystrike.</p>\r\n<p><strong>Perform preventative health care.</strong> While you can''t anticipate everything that might happen to a sheep (know your local veterinarian), there are some things you can do to care for your sheep. Performing these extra steps can help keep the sheep from certain sicknesses and problems.</p>\r\n<p>Crutching means trimming the wool around the crutch of the sheep (the area immediately around and below the tail, down the hind legs and halfway to the underside of the body). Urine and feces can soil this area, so keeping it clean can prevent things like flystrike.</p>\r\n<p>Dagging removes all the dirty wool around the rear end and belly of your sheep. Dags are basically the clumps of soft or hard fecal (or mud) material that''s become bound into the wool of the sheep. Dags can attract blowflies, so try and remove the dags as soon as possible while they''re still soft and the blowflies haven''t found them yet. Use hand shears or digging shears.</p>\r\n<p><strong>Keep an eye on general health.</strong> You''ll know when your sheep is sick, basically they''ll be doing things that are unusual or lethargic, and so on. Keeping an eye on their basic health can alert you to problems more quickly so that it doesn''t spread to the rest of the flock.</p>\r\n<p>A nasal discharge may be one of the first signs of a respiratory infection.</p>\r\n<p>Diarrhea in sheep is about the consistency of dog stool. Diarrhea can be caused by all manner of issues, so it''s a good thing to get a veterinarian in quickly.</p>\r\n<p>Check the coat frequently for any external parasites such as mites or lice. They''ll need to be treated immediately.</p>\r\n<p><strong>De-worm your sheep.</strong> You''ll need to have your veterinarian occasionally check your sheep''s stool to see if they have worms. If they do you''ll need to rotate between ivermectin with fenbendazole or albendazole. No one product will destroy all types of parasites, unfortunately, so you should seek your veterinarian''s help in determining what will be best for your sheep.<a href="http://www.wikihow.com/Care-for-Sheep#_note-6"><sup>[6]</sup></a></p>\r\n<p>Medication (dewormers) come in types: bolus (large pill), paste, liquid, pour on, and injectable. There is no one type that works most effectively.</p>\r\n<p>Paste or liquid forms tend to be the easiest to use, but otherwise are no more effective than any other type.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h2>Tips</h2>\r\n<p>Don&rsquo;t worry too much about eradicating your pasture of poisonous plants. Sheep tend toavoid them unless there is nothing else available, so make sure that they have plenty of grazing material.</p>\r\n<p>Have a livestock guardian such as a dog, llama or donkey. These animals can ward off common predators such as wild dogs and coyotes.</p>\r\n<p>Provide free choice baking soda in your sheep shelter. This way if one of the animals has an upset stomach they can go to the baking soda for relief.</p>\r\n<h2>Warnings</h2>\r\n<p>Depending on the number of sheep you have it&rsquo;s a good idea to have more than one sheepdog. Coyotes can decoy the first dog, while another coyote circles around behind it and gets the sheep.</p>\r\n<h1><a href="http://www.wikihow.com/Get-Started-in-Raising-Sheep">How to Get Started in Raising Sheep</a></h1>\r\n<p>Raising sheep is rewarding - whether it be for one''s livelihood, as a source of homegrown food or as a hobby. But success in raising sheep requires good planning in advance and solid, continual management of the sheep farm. Here are some starting pointers to help the beginner who is starting out with sheep raising. More complex topics on sheep raising will be added over the course of time. for reasons of hobby farming to obtain organic homegrown meat and for their other products; for vegetation control; or to be a pet. Some people even like to raise sheep as a replacement for empty nest syndrome. It is important to understand from the outset that you cannot try to do everything with this multi-purpose animal because different breeds are more suited to one aspect or other and the pasture, feed and production practices will vary according to what you want the sheep for. Unless you have the necessary time, appropriate experience, adequate resources and appropriate pasture, don''t over-extend</p>\r\n<p><strong>Consider if you have the financial resources and time resources to raise sheep.</strong> Finances involved in setting up a sheep-breeding operation include the cost of the sheep, the cost of fencing, any feed required, vaccinations and vet checks and transportation costs. In addition, any requirement to stockpile food and provide a shelter for lambing and very poor weather needs to be taken into accout.</p>\r\n<p><strong>Decide how many sheep you will purchase.</strong> Where you are and the productivity of your land will determine how many sheep you are able to sustain. Additionally, if you are seeking to make a profit from the sheep, you will need to factor in the market prices and the likely returns. In many places, it is very hard to make a profit from sheep raising on a small scale. It becomes even more difficult when the environment includes a harsh winter and additional feed and shelter must be provided for the sheep.</p>\r\n<p><strong>Create a suitable environment for the sheep.</strong> Determine how much land you have available for your sheep. A rough rule of thumb is 5 ewes per acre.</p>\r\n<p><strong>Some organic sheep breeders believe it is possible to run as many as 18 sheep per hectare.</strong><a href="http://www.wikihow.com/Get-Started-in-Raising-Sheep#_note-2"><sup>[2]</sup></a> The pasture must also be productive. Provide adequate fencing around the area to prevent wandering and to prevent dog (tame and feral) or other animal attacks. Provide some form of simple shelter for the sheep - adult sheep are fairly hardy provided you have selected the right type for the weather in your region.</p>\r\n<p><strong>Order your chosen breed from a certified breeder.</strong> Purchase sheep breeds from recognized breeders. There should be a local or national sheep breeder''s association that can assist you to find the names of breeders. Check online or in phone directories.</p>\r\n<p><strong>Bring your sheep home.</strong> If you can have the sheep delivered, this is obviously easier. If you must collect them yourself, hire or purchase a suitable sheep trailer for safe transportation. If you need to make several trips, make sure the breeder is not too far away from you or you may need to make arrangements for overnight accommodation for you and the sheep.</p>\r\n<p><strong>Feed them when required.</strong> The key to feeding sheep is to ensure good quality pasture. Poorer pasture should be supplemented with hay, specialized pellet feed and salt lick blocks. When sheep are unable to graze, such as during winter when snow is on the ground or during a drought when pasture is poor or non-existent, you will be obliged to feed the sheep daily. This is a time-consuming process, so consider this possibility if you are not farming full-time.</p>\r\n<p><strong>Make sure there is always fresh water.</strong> Ensure a steady supply of water, usually in the form of a long trough accessible by many sheep at once. Check regularly that the water is being recycled daily (if electrically driven by pump) or ensure to change the water by hand daily. If you don''t they will get sick.</p>\r\n<p><strong>Comb them and wash the sheep regularly.</strong> If you are raising sheep for wool, showing, or as a pet, regular grooming ensures a healthy and tidy fleece.</p>\r\n<p><strong>Keep the sheep wormed and healthy.</strong> Ensure that the sheep are wormed regularly with a commercial worming paste suitable for sheep. Other considerations include dipping sheep to prevent pest infestation and in some places, tails are docked as a precaution against fly-blown disease. If you are in an area subject to foot-and-mouth disease outbreaks, take appropriate precautions to protect your sheep. Seek veterinarian advice on the best and most humane procedures for protecting your sheep against disease.</p>\r\n<p>&nbsp;</p>\r\n<h2>Warnings</h2>\r\n<ul>\r\n<li>Always have fresh water for your sheep to drink.</li>\r\n<li>Dogs and foxes are number one enemies of lambs. Make sure that adequate precautions are taken ahead of lambing to keep predators out of the birthing area.</li>\r\n<li>Make sure you are in a position to care for the sheep for a while.</li>\r\n<li>Know the price of hay; and see if it works in your budget.</li>\r\n<li>Make sure that you are permitted to raise sheep where you are.</li>\r\n<li>Order only from a certified breeder.</li>\r\n</ul>', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(120) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `phone` varchar(13) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `last_login` datetime DEFAULT '0000-00-00 00:00:00',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `fa_id` tinytext NOT NULL,
  `fa_dis` tinytext NOT NULL,
  `picture` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `password`, `email`, `phone`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`, `fa_id`, `fa_dis`, `picture`) VALUES
(4, 'albert', 'albert', '6c5bc43b443975b806740d8e41146479', 'bams@gmail.com', '0781657478', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2017-05-09 04:14:26', NULL, 'F17050958J', 'DIS15170424J', ''),
(5, 'bamwine2', 'katamba', '123932521c75934258001feb8582d2ef', 'jken40@hushmail.com', '4444444', 1, 0, NULL, NULL, NULL, '', NULL, '127.0.0.1', '2017-04-11 16:15:01', '2014-03-17 05:42:01', '2017-05-27 12:28:37', 'FA17042496J', 'DIS15170424J', 'images_009.jpg'),
(6, 'Katamba Ronald', 'karts18', 'ed2b596575c4db9c52f726f68eedcb14', 'katambaronald@gmail.com', '0785856863', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '2017-05-27 05:49:52', NULL, 'F17052784J', 'DIS94170424J', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `fname` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `lname` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `fname`, `lname`, `picture`) VALUES
(1, 1, 'Martin', 'Ojambo', '614fa75e677d572304bd1a645b72fc79.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `veternary`
--

CREATE TABLE IF NOT EXISTS `veternary` (
  `vet_id` int(100) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `activated` int(100) NOT NULL DEFAULT '0',
  `proffesion` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`vet_id`),
  KEY `vet_id` (`vet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `veternary`
--

INSERT INTO `veternary` (`vet_id`, `full_name`, `username`, `password`, `email`, `phone`, `activated`, `proffesion`, `District`, `date_added`) VALUES
(1, 'Rugumayo', 'bamwine', 'e5bea9a864d5b94d76ebdaaf43d66f4d', 'bamwine@gmail.com', '', 0, 'cat and  dogs', '', '2017-05-08 11:22:40');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
