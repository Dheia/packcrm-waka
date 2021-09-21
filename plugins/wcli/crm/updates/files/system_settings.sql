-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage des données de la table fooga.system_settings : ~2 rows (environ)
/*!40000 ALTER TABLE `system_settings` DISABLE KEYS */;
INSERT INTO `system_settings` (`id`, `item`, `value`) VALUES
	(1, 'waka_utils_settings', '{"start_imports":["clients","contacts","gammes","commercials"],"start_file":"\\/start_data2.xlsx","activate_dashboard":"0","activate_cms":"0","activate_builder":"0","activate_task_btn":"0","activate_user_btn":"0","activate_media_btn":"0"}'),
	(2, 'wcli_crm_settings', '{"time_programmation":"2021-09-22 08:00:00","tvas":[{"name":"Normal","calcul":"1.2"},{"name":"Int\\u00e9rm\\u00e9diaire","calcul":"1.1"},{"name":"R\\u00e9duit","calcul":"1.055"},{"name":"Particulier","calcul":"1.021"},{"name":"Non assujetti","calcul":"1"}],"projetState":[{"code":"Brouillon"},{"code":"En Proposition"},{"code":"Valid\\u00e9"},{"code":"Gel\\u00e9"},{"code":"Perdu"}]}');
/*!40000 ALTER TABLE `system_settings` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
