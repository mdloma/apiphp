
DROP TABLE IF EXISTS `tareas`;

CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `descripcion` varchar(250) NOT NULL DEFAULT '',
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`),
   
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



LOCK TABLES `tareas` WRITE;

INSERT INTO `tareas` VALUES (6, 'TAREA 1','General','Alta usuario','2022-10-19 11:45:26'),(8,'TAREA 8','General','2022-10-19 11:45:26')(9,'TAREA 9', 'Confirmacion usuarios','2022-10-19 12:03:30');

UNLOCK TABLES;



