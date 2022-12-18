CREATE DATABASE  IF NOT EXISTS `pets` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pets`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: pets
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administrador` (
  `Documento` varchar(15) NOT NULL,
  `PrimerNombre` varchar(20) NOT NULL,
  `SegundoNombre` varchar(20) DEFAULT NULL,
  `PrimerApellido` varchar(20) NOT NULL,
  `SegundoApellido` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`Documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cita_medica`
--

DROP TABLE IF EXISTS `cita_medica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cita_medica` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `FK_CodHistoriaClinica` int NOT NULL,
  `FK_CodFormulaMedica` int DEFAULT NULL,
  `FK_CodMedico` varchar(15) NOT NULL,
  `FK_CodEstado` int NOT NULL,
  `Fecha` date NOT NULL,
  `FK_CodTipoCita` int NOT NULL,
  `Oidos` varchar(25) DEFAULT NULL,
  `Frec_Cardiaca` varchar(25) DEFAULT NULL,
  `Ojos` varchar(25) DEFAULT NULL,
  `Mucosas` varchar(25) DEFAULT NULL,
  `Peso` char(8) DEFAULT NULL,
  `Tilc` varchar(25) DEFAULT NULL,
  `Ganglios` varchar(25) DEFAULT NULL,
  `Palpitacion` varchar(25) DEFAULT NULL,
  `Cav_Oral` varchar(25) DEFAULT NULL,
  `Nervioso` varchar(25) DEFAULT NULL,
  `Temperatura` varchar(25) DEFAULT NULL,
  `Tegumento` varchar(25) DEFAULT NULL,
  `Observaciones` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `citamedica_historiaclinica` (`FK_CodHistoriaClinica`),
  KEY `citamedica_formulamedica` (`FK_CodFormulaMedica`),
  KEY `citamedica_medico` (`FK_CodMedico`),
  KEY `citamediCa_estado` (`FK_CodEstado`),
  KEY `citamedica_tipocita` (`FK_CodTipoCita`),
  CONSTRAINT `citamediCa_estado` FOREIGN KEY (`FK_CodEstado`) REFERENCES `estado` (`Codigo`),
  CONSTRAINT `citamedica_formulamedica` FOREIGN KEY (`FK_CodFormulaMedica`) REFERENCES `formula_medica` (`Codigo`),
  CONSTRAINT `citamedica_historiaclinica` FOREIGN KEY (`FK_CodHistoriaClinica`) REFERENCES `historia_clinica` (`Codigo`),
  CONSTRAINT `citamedica_medico` FOREIGN KEY (`FK_CodMedico`) REFERENCES `medico` (`Documento`) ON UPDATE CASCADE,
  CONSTRAINT `citamedica_tipocita` FOREIGN KEY (`FK_CodTipoCita`) REFERENCES `tipo_cita` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cita_medica`
--

LOCK TABLES `cita_medica` WRITE;
/*!40000 ALTER TABLE `cita_medica` DISABLE KEYS */;
/*!40000 ALTER TABLE `cita_medica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `control_vacunacion`
--

DROP TABLE IF EXISTS `control_vacunacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `control_vacunacion` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `FK_CodMascota` int NOT NULL,
  `Categoria` varchar(15) NOT NULL,
  `Fecha` date NOT NULL,
  `Observaciones` varchar(255) DEFAULT NULL,
  `ParacitosControlados` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `controlvacunacion_mascota` (`FK_CodMascota`),
  CONSTRAINT `controlvacunacion_mascota` FOREIGN KEY (`FK_CodMascota`) REFERENCES `mascota` (`Codigo`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `control_vacunacion`
--

LOCK TABLES `control_vacunacion` WRITE;
/*!40000 ALTER TABLE `control_vacunacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `control_vacunacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `controlvacunacion_medicamento`
--

DROP TABLE IF EXISTS `controlvacunacion_medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `controlvacunacion_medicamento` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `FK_CodControlVacunacion` int NOT NULL,
  `FK_CodMedicamento` int NOT NULL,
  `Dosis` varchar(10) NOT NULL,
  `CantidadDias` char(2) NOT NULL,
  `FrecuenciaHoras` char(2) NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `medicamento_contvacunacion` (`FK_CodControlVacunacion`),
  CONSTRAINT `contvacunacion_medicamento` FOREIGN KEY (`FK_CodControlVacunacion`) REFERENCES `control_vacunacion` (`Codigo`),
  CONSTRAINT `medicamento_contvacunacion` FOREIGN KEY (`FK_CodControlVacunacion`) REFERENCES `medicamento` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `controlvacunacion_medicamento`
--

LOCK TABLES `controlvacunacion_medicamento` WRITE;
/*!40000 ALTER TABLE `controlvacunacion_medicamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `controlvacunacion_medicamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta`
--

DROP TABLE IF EXISTS `cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuenta` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `FK_CodUsuario` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Contrasena` varchar(20) NOT NULL,
  `FK_CodRol` int NOT NULL,
  `FK_CodEstado` int NOT NULL,
  PRIMARY KEY (`Codigo`),
  UNIQUE KEY `Usuario` (`email`),
  KEY `cuenta_administrador` (`FK_CodUsuario`),
  KEY `cuenta_estado` (`FK_CodEstado`),
  KEY `cuenta_rol` (`FK_CodRol`),
  CONSTRAINT `cuenta_estado` FOREIGN KEY (`FK_CodEstado`) REFERENCES `estado` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cuenta_medico` FOREIGN KEY (`FK_CodUsuario`) REFERENCES `medico` (`Documento`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cuenta_rol` FOREIGN KEY (`FK_CodRol`) REFERENCES `rol` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta`
--

LOCK TABLES `cuenta` WRITE;
/*!40000 ALTER TABLE `cuenta` DISABLE KEYS */;
INSERT INTO `cuenta` VALUES (33,'1032492720','dm1236789@gmail.com','1111',12,12),(34,'1234567489','pepito123@gmail.com','1111',11,12),(35,'12344444','prueba123@gmail.com','2222',12,11);
/*!40000 ALTER TABLE `cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especie`
--

DROP TABLE IF EXISTS `especie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `especie` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `nombre_especie` varchar(20) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especie`
--

LOCK TABLES `especie` WRITE;
/*!40000 ALTER TABLE `especie` DISABLE KEYS */;
INSERT INTO `especie` VALUES (1,'Canino'),(2,'Felino'),(3,'Ave'),(4,'Bobino'),(5,'Roedor'),(6,'Equino'),(7,'Otros');
/*!40000 ALTER TABLE `especie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estado` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `Estado` varchar(30) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (11,'Inactivo'),(12,'Activo');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formula_medica`
--

DROP TABLE IF EXISTS `formula_medica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formula_medica` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `FK_CodMedico` varchar(15) NOT NULL,
  `Fecha` date NOT NULL,
  `Observacion` varchar(255) NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `formulamedica_medico` (`FK_CodMedico`),
  CONSTRAINT `formulamedica_medico` FOREIGN KEY (`FK_CodMedico`) REFERENCES `medico` (`Documento`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formula_medica`
--

LOCK TABLES `formula_medica` WRITE;
/*!40000 ALTER TABLE `formula_medica` DISABLE KEYS */;
/*!40000 ALTER TABLE `formula_medica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formulamedica_medicamento`
--

DROP TABLE IF EXISTS `formulamedica_medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formulamedica_medicamento` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `FK_CodFormulaMedica` int NOT NULL,
  `FK_CodMedicamento` int NOT NULL,
  `Dosis` varchar(10) NOT NULL,
  `CantidadDias` char(2) NOT NULL,
  `FrecuenciaHoras` char(2) NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `formmedica_medicamento` (`FK_CodFormulaMedica`),
  KEY `medicamento_formmedica` (`FK_CodMedicamento`),
  CONSTRAINT `formmedica_medicamento` FOREIGN KEY (`FK_CodFormulaMedica`) REFERENCES `formula_medica` (`Codigo`),
  CONSTRAINT `medicamento_formmedica` FOREIGN KEY (`FK_CodMedicamento`) REFERENCES `medicamento` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formulamedica_medicamento`
--

LOCK TABLES `formulamedica_medicamento` WRITE;
/*!40000 ALTER TABLE `formulamedica_medicamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `formulamedica_medicamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historia_clinica`
--

DROP TABLE IF EXISTS `historia_clinica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `historia_clinica` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `FK_CodMedico` varchar(15) NOT NULL,
  `FK_CodMascota` int NOT NULL,
  `FK_CodEstado` int NOT NULL,
  `Fecha_Creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Codigo`),
  KEY `historiaclinica_medico` (`FK_CodMedico`),
  KEY `historiaclinica_mascota` (`FK_CodMascota`),
  KEY `historiaclinica_estado` (`FK_CodEstado`),
  CONSTRAINT `historiaclinica_estado` FOREIGN KEY (`FK_CodEstado`) REFERENCES `estado` (`Codigo`),
  CONSTRAINT `historiaclinica_mascota` FOREIGN KEY (`FK_CodMascota`) REFERENCES `mascota` (`Codigo`),
  CONSTRAINT `historiaclinica_medico` FOREIGN KEY (`FK_CodMedico`) REFERENCES `medico` (`Documento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historia_clinica`
--

LOCK TABLES `historia_clinica` WRITE;
/*!40000 ALTER TABLE `historia_clinica` DISABLE KEYS */;
INSERT INTO `historia_clinica` VALUES (1,'1032492720',3,12,'2022-12-15 19:51:06'),(2,'1032492720',4,12,'2022-12-15 20:42:10'),(3,'1032492720',5,12,'2022-12-15 20:44:29');
/*!40000 ALTER TABLE `historia_clinica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mascota`
--

DROP TABLE IF EXISTS `mascota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mascota` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `FK_CodPropietario` varchar(15) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Edad` int NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `FK_CodRaza` int NOT NULL,
  `FK_CodEspecie` int NOT NULL,
  `Color` varchar(30) NOT NULL,
  `Observaciones` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `mascota_raza` (`FK_CodRaza`),
  KEY `mascota_especie` (`FK_CodEspecie`),
  KEY `mascota_propietario_idx` (`FK_CodPropietario`),
  CONSTRAINT `mascota_especie` FOREIGN KEY (`FK_CodEspecie`) REFERENCES `especie` (`Codigo`),
  CONSTRAINT `mascota_propietario` FOREIGN KEY (`FK_CodPropietario`) REFERENCES `propietario` (`Documento`) ON UPDATE CASCADE,
  CONSTRAINT `mascota_raza` FOREIGN KEY (`FK_CodRaza`) REFERENCES `raza` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mascota`
--

LOCK TABLES `mascota` WRITE;
/*!40000 ALTER TABLE `mascota` DISABLE KEYS */;
INSERT INTO `mascota` VALUES (1,'1032492720','Manuela',10,'Hembra',3,3,'Rojo','Pruebas'),(2,'1032492720','Manuela',12,'Hembra',4,4,'Negro','Es enorme'),(3,'1032492720','Manuelita',15,'Masculino',5,1,'Negro y blanco','Esta viejito'),(4,'123456','Patrick',15,'Femenino',6,6,'Cafe Oscuro','Tienen manchas en la piel'),(5,'1032492720','Juana',15,'Femenino',5,1,'Cafe con Negro','Esta viejita');
/*!40000 ALTER TABLE `mascota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medicamento`
--

DROP TABLE IF EXISTS `medicamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medicamento` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Concentracion` varchar(30) NOT NULL,
  `Presentacion` varchar(30) NOT NULL,
  `Administracion` varchar(30) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medicamento`
--

LOCK TABLES `medicamento` WRITE;
/*!40000 ALTER TABLE `medicamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `medicamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico`
--

DROP TABLE IF EXISTS `medico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medico` (
  `Documento` varchar(15) NOT NULL,
  `PrimerNombre` varchar(20) NOT NULL,
  `SegundoNombre` varchar(20) DEFAULT NULL,
  `PrimerApellido` varchar(20) NOT NULL,
  `SegundoApellido` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`Documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico`
--

LOCK TABLES `medico` WRITE;
/*!40000 ALTER TABLE `medico` DISABLE KEYS */;
INSERT INTO `medico` VALUES ('1032492720','David','Fernando','Miranda','Diaz','dm1236789@gmail.com','3187254236','6757925'),('12344444','Manuel','','Andres','','prueba123@gmail.com','3187254236','6757925'),('1234567489','Pepito','','Miranda','','pepito123@gmail.com','3187254236','6757925');
/*!40000 ALTER TABLE `medico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medico_controlvacunacion`
--

DROP TABLE IF EXISTS `medico_controlvacunacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `medico_controlvacunacion` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `FK_CodMedico` varchar(15) NOT NULL,
  `FK_CodControlVacunacion` int NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `medico_contvacunacion` (`FK_CodMedico`),
  KEY `contvacunacion_medico` (`FK_CodControlVacunacion`),
  CONSTRAINT `contvacunacion_medico` FOREIGN KEY (`FK_CodControlVacunacion`) REFERENCES `control_vacunacion` (`Codigo`),
  CONSTRAINT `medico_contvacunacion` FOREIGN KEY (`FK_CodMedico`) REFERENCES `medico` (`Documento`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medico_controlvacunacion`
--

LOCK TABLES `medico_controlvacunacion` WRITE;
/*!40000 ALTER TABLE `medico_controlvacunacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `medico_controlvacunacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propietario`
--

DROP TABLE IF EXISTS `propietario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `propietario` (
  `Documento` varchar(15) NOT NULL,
  `PrimerNombre` varchar(20) NOT NULL,
  `SegundoNombre` varchar(20) DEFAULT NULL,
  `PrimerApellido` varchar(20) NOT NULL,
  `SegundoApellido` varchar(20) DEFAULT NULL,
  `Direccion` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`Documento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propietario`
--

LOCK TABLES `propietario` WRITE;
/*!40000 ALTER TABLE `propietario` DISABLE KEYS */;
INSERT INTO `propietario` VALUES ('1032492720','Alvaro','Fernando','Miranda','Diaz','Calle93#60A-45','pepito123@gmail.com','3187254236','6757925'),('123456','Sandra','','Molina','','Tv63#40-43','dm1236789@gmail.com','3115556666','456633113');
/*!40000 ALTER TABLE `propietario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `raza`
--

DROP TABLE IF EXISTS `raza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `raza` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `nombre_raza` varchar(20) NOT NULL,
  `FK_CodEspecie` int NOT NULL,
  PRIMARY KEY (`Codigo`),
  UNIQUE KEY `nombre_raza` (`nombre_raza`),
  KEY `raza_especie_idx` (`FK_CodEspecie`),
  CONSTRAINT `raza_especie` FOREIGN KEY (`FK_CodEspecie`) REFERENCES `especie` (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raza`
--

LOCK TABLES `raza` WRITE;
/*!40000 ALTER TABLE `raza` DISABLE KEYS */;
INSERT INTO `raza` VALUES (1,'Persa',2),(2,'Pitbull',1),(3,'Carpintero',3),(4,'Angus',4),(5,'Pequines',1),(6,'Pura Sange Ingles',6);
/*!40000 ALTER TABLE `raza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset_contrasena`
--

DROP TABLE IF EXISTS `reset_contrasena`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reset_contrasena` (
  `id_codigo` int NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) NOT NULL,
  `token` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_contrasena`
--

LOCK TABLES `reset_contrasena` WRITE;
/*!40000 ALTER TABLE `reset_contrasena` DISABLE KEYS */;
INSERT INTO `reset_contrasena` VALUES (1,'dm1236789@gmail.com','8cfde8619c','2022-12-07 03:04:08'),(2,'dm1236789@gmail.com','612cb32324','2022-12-07 03:05:20'),(3,'dm1236789@gmail.com','6687d7f446','2022-12-07 03:08:32'),(4,'dm1236789@gmail.com','e101fac326','2022-12-07 03:16:59'),(5,'dm1236789@gmail.com','8b6f31dd92','2022-12-07 05:03:20'),(6,'dm1236789@gmail.com','c2645af891','2022-12-07 05:19:22');
/*!40000 ALTER TABLE `reset_contrasena` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `Nombre_Rol` varchar(15) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (11,'Administrador'),(12,'Medico');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_cita`
--

DROP TABLE IF EXISTS `tipo_cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_cita` (
  `Codigo` int NOT NULL AUTO_INCREMENT,
  `Tipo_Cita` varchar(25) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_cita`
--

LOCK TABLES `tipo_cita` WRITE;
/*!40000 ALTER TABLE `tipo_cita` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_cita` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-15 18:00:21
