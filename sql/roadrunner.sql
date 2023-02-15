-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2023 a las 13:13:15
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `roadrunner`
--
CREATE DATABASE IF NOT EXISTS `roadrunner` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `roadrunner`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

DROP TABLE IF EXISTS `rutas`;
CREATE TABLE IF NOT EXISTS `rutas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_name` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `distance` int(11) NOT NULL,
  `slope` int(11) NOT NULL,
  `circular` tinyint(1) NOT NULL,
  `start_lat` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `start_lon` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `user` int(11) DEFAULT NULL,
  `desc` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `intensity` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `activity` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `gpx` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk1` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `rutas`
--

INSERT INTO `rutas` (`id`, `route_name`, `distance`, `slope`, `circular`, `start_lat`, `start_lon`, `user`, `desc`, `intensity`, `activity`, `gpx`) VALUES
(1, 'Ferral del Bernesga - Venta de la Cruz', 25722, 258, 1, '42.614648', '-5.660264', 1, 'En los inicios de la primavera nos desplazamos a Ferral del Bernesga, localidad muy cercana a Leon, de la que parten dos rutas homologadas por la FEDME, la ruta de \"La Jana\" y la de \"La Venta de la Cruz\" de mayor extension, que es la que recorremos.<br><br>Iniciamos la ruta en el bar Ronro, donde dejamos aparcado el coche. Continuamos por la carretera nacional que va en direccion a Montejos un par de kilometros, pasando la rotonda que se desvia para entrar en la base militar Conde de Gazola, donde esta la UME. A pocos metros nos desviamos a la derecha, siguiendo el curso del arroyo Valdeaguila tomando una senda estrecha.<br><br>Vamos rodeando esta base militar por un camino que bordea sus terrenos alambrados.<br><br>Ascenderemos por el pinar paralelos a la A-66 la cual no veremos durante la ruta pero los ruidos derivados de esta no se pierden. Estaremos caminando por los caminos del \"Cordel de las Merinas\" utilizado antano por los pastores trashumantes que partian de Babia hasta Extremadura en busca de nuevos pastos.<br><br>El trayecto circula por una amplia pista en ligero ascenso entre los limites municipales de San Andres del Rabanedo y Cuadros con unas bonitas vistas de la Montana Central asi como del macizo de Las Ubinas.<br><br>Llegaremos a \"La Venta de la Cruz\" un antiguo asentamiento de paso de caballerias, que cerro hace mas de 50 anos y del que solo quedan algunos restos. Actualmente es un cruce de pistas forestales donde figura un cartel de coto de caza intensiva.<br><br>Volveremos por una pista muy utilizada como ruta cicloturista verde que esta senalizada por el Ayuntamiento de San Andres del Rabanedo, y que supone un suave descenso hasta llegar al Ferral. La ruta finaliza en el fronton de Ferral del Bernesga donde encontramos el panel de informacion con todo lo relevante sobre la ruta.<br><br>Se trata de un recorrido con enormes atractivos que discurre por una pista forestal entre sebes y pinares de repoblacion. Es una buena opcion para dar un paseo a pie.', '2', 'Senderismo', '../gpx/1676140337.gpx'),
(2, 'Geras - Paradilla (Senda del Celorio)', 5895, 296, 1, '42.887479', '-5.761923', 1, 'El inicio de la ruta se encuentra poco antes de llegar a la localidad de Geras, en la curva anterior a la ermita del Santo Cristo, proxima a la localidad, accediendo desde La Pola de Gordon, y que da acceso a una granja. Aqui existe una zona para poder dejar el vehiculo y donde esta el cartel indicador de la Senda del Celorio.<br><br>Nada mas empezar, tomaremos un desvio a la derecha, comenzando un ligero ascenso a lo largo del arroyo de Valdegrillo. Un poco mas adelante encontraremos el primer panel que nos va a ir desgranando el relato. Continuando iremos apreciando las vistas al valle y a las montanas circunstantes y segun avanzamos tambien merece la pena echar la vista atras de vez en cuando.<br><br>Si ha llovido recientemente o estamos en epoca de deshielo encontraremos bastante agua y barro en el camino, pero facilmente sorteables.<br><br>Tras encontrar tres paneles mas, que nos van metiendo en la historia, llegaremos a una pradera donde se encuentra la escultura de una mano saliendo de la tierra y que trata de alcanzar las estrellas del cielo de Paradilla de Gordon. Es obra del escultor Amancio Gonzalez y esta hecha en marmol negro, de tonelada y media de peso.<br><br>Siguiendo las senalizaciones y antes de llegar a Paradilla, nos encontraremos con otros tres paneles mas que casi nos van a dar el final de la historia.<br><br>En Paradilla, visitaremos la iglesia parroquial de estilo romanico, donde han habilitado una zona de descanso y donde encontramos el ultimo panel del relato que no pone fin a esta bella historia mientras contemplamos las hermosas montanas que rodean a este paraje. No podemos abandonar Paradilla sin visitar, si estan abiertas, las antiguas Escuelas de la localidad, y que se han convertido en el teleclub La Abubilla de la localidad, una construccion que se ha rehabilitado gracias al esfuerzo de personas que todavia reivindican la existencia de estos parajes y de mantener la memoria de estos pueblos y especialmente del Pedaneo de Paradilla por su empeno en ello y en la creacion de la Senda del Celorio. Aqui podremos tomar un refrigerio o un cafe, a la par de escuchar historias de la localidad.<br><br>Finalizada nuestra estancia en Paradilla, saldremos de la localidad por la carretera por donde hemos accedido y casi frente a la senda por la que hemos llegado, sale el camino que continua con la Senda (existe poste indicador) y que nos llevara en descenso, a encontrarnos en poco espacio con el Trasgu de Paradilla (aunque esta ubicado en altura, hay un cartel metalico indicador, pero puede pasarse), otro atractivo de la ruta colocado mas recientemente<br><br>Visitado el Trasgu, continuamos en descenso por la senda (aunque podriamos hacerlo por la carretera), hasta que lleguemos a la carretera LE-473 (la que nos ha llevado a Geras para iniciar esta ruta). Frente a nosotros hay un puente sobre el rio Casares, que cruzaremos (hay otro panel con un breve relato...) y siguiendo la senda, paralelos al rio y a la carretera, y tras atravesar un avellanedo y algun que otro prado, llegaremos a la altura de la senda que accede al hayedo de la Boyeriza, cruzaremos el arroyo de Meleros que nos encontramos (hay que buscar un buen lugar de paso ya que segun la epoca del ano puede traer mucha agua) y giramos a la derecha, para pasar a traves de otro puente y acceder nuevamente a la carretera LE-473 donde tras unos 500 m. llegaremos al punto de inicio de la ruta.', '0', 'Senderismo', '../gpx/1676141053.gpx'),
(3, 'Faedo de Cinera', 5638, 174, 1, '42.884099', '-5.636277', 1, 'El camino es muy sencillo de caminar y llano. Durante la mayor parte del recorrido, disfrutaremos de la compania del pico Los Casetones (1.434 m.) que se eleva sobre el Faedo de Cinera<br>Algo mas adelante, encontraremos una bocamina que ha sido reconvertida en una especie de museo con objetos tipicos del interior de las minas y donde ocupa un lugar preferente Santa Barbara.<br>Sin salirnos del camino principal comenzamos a ver las primeras hayas a nuestra derecha.<br>Tras algo mas de 2 kilometros desde el polideportivo encontraremos la entrada al Faedo de Cinera y nos adentraremos en un mundo magico.<br>En el Faedo de Cinera hay un haya centenaria que cuenta con mas de 500 anos de vida. Este ser extraordinario forma parte del catalogo de arboles singulares de Castilla y Leon<br>Pero aun hay mas. Si el Faedo de Cinera nos ha sabido a poco, podemos seguir disfrutando del entorno. Al acabar el hayedo viene un tramo de saltos de agua y pozas que en la zona se llama Las Marmitas del Gigante.<br>Se accede a traves de un angosto paso que esta muy bien acondicionado.<br>Despues, nos encontraremos los saltos de agua.<br>El paraje es bellisimo, no solo por las marmitas que ha creado de forma natural el agua, si no por toda la foz en si.<br>Toca regresar, lo haremos por el mismo camino. Aunque si queremos continuar la ruta podremos hacerlo siguiendo el camino hasta el pueblo de Villar del Puerto habiendo opciones para hacer la ruta circular.', '1', 'Senderismo', '../gpx/1676141656.gpx'),
(4, 'Mascarriel - Pena Negra -Teleno - El Sestil ', 17506, 1198, 1, '42.32863', '-6.424522', 1, 'Se inicia la ruta en el Porton del Arenal, hay que pasar entre escobas por una zona con el camino poco marcado o sin camino, hasta llegar al cortafuegos por el que se sube sin problemas hasta los Llanos de Mascariel. Luego continua una senda.<br><br>Cuando se incrementa el desnivel es facil perder el sendero entre la vegetacion y las piedras. Cuando se retoma, luego se sigue mas facilmente hasta llegar al collado del Teleno.<br><br>En la zona del Teleno, incluso en la zona mas elevada, aparecen numerosos vestigios que denotan una intensa explotacion de oro durante la epoca romana, lo que ha transformado parcialmente la morfologia de este entorno, siendo visibles restos de balsas, canales, zanjas y escombreras generadas como consecuencia de la explotacion minera.<br><br>En el cordal se sigue por la derecha para subir al primer dosmil, el Mascariel de 2171 metros. Es en realidad un monton de piedras. Se continua bajando y encontramos otro pico, es otro dosmil de 2116 metros que no tiene nombre y que esta sobre la Bajada de los Heros.<br><br>Tanto en la bajada anterior como la de ahora no es facil seguir el camino, se puede andar campo a traves alternando el ir por piedras con pisar vegetacion rastrera.<br><br>Antes de llegar al collado del Llano de los Heros, donde estan las balsas, hay un pantanal o marjal saturado de agua y con pequenas charcas. No es demasiado complicado pasarlo buscando el sitio mas accesible.<br><br>La subida a Pena Negra vuelve a ser un campo de piedras entre 0,5 y 2 metros que van aumentando de tamano segun se sube. Al llegar a la primera cima, se ve que hay dos mas altas detras. Ya no habia muchas ganas de seguir trepando.<br><br>Se vuelve al collado que hay entre el Teleno y Mascariel. Esta vez subiendo un poco mas a la derecha se encontraron mas hitos para seguir el camino. Aun asi, se perdia con facilidad.<br><br>La subida al Teleno, de nuevo por un campo de piedras. En la cima el hito geodesico y otros elementos tipicos de cumbres. En la vertiente norte se mantiene algo de nieve y a sus pies los curiosos circulos de piedra.<br><br>Se continua por el cordal, se vuelve a encontrar hitos para seguir el camino y durante un pequeno espacio se pisa tierra hasta el siguiente dosmil, un pico sin nombre de 2031 metros. Desde su cima se percibe claramente el circo glaciar donde se formo una corta lengua glaciar que tiene morrenas laterales bien conservadas. Esta morrena fue explotada por los romanos para obtener oro, generando un paisaje muy singular.<br><br>Se baja por la cuerda de Sestil, otro campo de piedras. Finalmente se retoma el camino y los hitos. En una pradera hay que dejar la senda y tomar la que baja por la izquierda. Esta bajada esta suficientemente marcada con hitos, es paralela al camino del Palo (que esta demasiado invadido por la vegetacion, por lo que continuamos por esta senda hasta la carretera. Esto supone aumentar la ruta prevista en un par de km, pero se agradece descansar de tanta pedrera y de vegetacion invasiva.', '3', 'Senderismo', '../gpx/1676141895.gpx'),
(5, 'Puerto del Ponton - Llavaris', 12573, 574, 1, '43.099962', '-5.018311', 1, 'Salida del aparcamiento que hay en el Puerto del Ponton recorriendo el hayedo de la zona hasta salir a la carretera que va desde el puerto del Ponton hasta el puerto de Panderrueda en la zona de Llavaris, a partir de ahi el recorrido es todo por carretera (aproximadamente tres kilometros).<br>Es precioso el hayedo y una zona ideal para desconectar ya que por el lugar es muy raro encontrar a alguien.<br>ENLACE AL VIDEO RESUMEN DE LA PRIMERA PARTE DE LA RUTA.<br>https://youtu.be/gagmlcLeT3g<br>ENLACE AL VIDEO RESUMEN DE LA SEGUNDA PARTE DE LA RUTA.<br>https://youtu.be/hPcGknd1wq0', '4', 'Alpinismo', '../gpx/1676142293.gpx'),
(6, 'Ruta Running Carril Bici Ciudad de Leon', 15838, 283, 1, '42.613336', '-5.547762', 1, 'Ruta para entrenamiento de running a la vera del carril Bici de la Ciudad de Leon a su paso por el parque de la Granja, parque de la Candamia, Ribera del Rio Bernesga(coto escolar, Hispanico, San Marcos), subida hasta los depositos de agua junto a la carretera Asturias y enlazar con el carril bici de zona de la Universidad', '2', 'Correr', '../gpx/1676142599.gpx'),
(7, 'Vega de Gordon Pista forestal', 23108, 1895, 1, '42.868768', '-5.664516', 1, 'Union del Reto Senen Challengue de los meses de Enero y Febrero. Ruta exigente, muy bonita, que pasa desde hermosos bosques de hayas y robles hasta la escarpada cima del Cuento San Mateo con hermosas vistas, para enlazar con la segunda parte y recorrer el tramo de Santa Lucia con desniveles tecnicos y exigentes por el cansancio acumulado. Agradecer a los promotores del Reto, por su labor de balizaje y hacernos conocedores del entorno de Gordon.', '3', 'Correr', '../gpx/1676142801.gpx'),
(8, 'Robledal de la Cerra', 11901, 291, 1, '42.578642', '-5.81159', 2, 'Ruta divertida para correr por senderos a traves del robledal de la Cerra.<br>Es la mejor zona cerca de Carrizo para hacer un poco de desnivel.<br>Se alternan pistas de parcelaria, con bonitos senderos.', '1', 'Correr', '../gpx/1676142978.gpx'),
(9, 'Lumajo-Muxiven-Cornon', 19584, 1586, 1, '42.982905', '-6.257473', 2, 'Lumajo es una localidad y pedania perteneciente al municipio de Villablino, situado en la comarca de Laciana. Esta situado en la LE-492, siendo el ultimo pueblo de esta carretera.<br><br>En medio del planeta de branas, puertos y penas que es Laciana y Babia, se asienta una aldea a 1.360 metros de altitud, como a caballo entre las dos comarcas, llamada Lumajo , el cual guarda en su enorme valle de la Almozarra unas buenas joyas para deleite de andarines y seguidores incondicionales de la madre naturaleza: el pico Muxiven y el Cornon.<br>La figura imponente del Muxiven lo domina todo, es una montana atrayente, oscura pero bella, con formas varias segun la posicion donde se vea.<br>El Pico Muxiven, el titan cuarcitico de 2.032 metros que se levanta sobre el mismo pueblo.Una excursion de dificultad media que nos llevara a conocer los antiguos valles glaciares desembocantes en el padre Sil a vista de pajaro, palpando cada detalle de este terreno que en epocas como otono, desprende cierta perfeccion en el paisaje.<br><br>Lumajo y su largo valle son tambien zona de transicion entre Babia y Laciana. El paisaje calizo y de monte bajo que Babia ofrece a la vista se ve representado en la parte derecha del valle de la Almozarra, mientras que en su parte opuesta, la cuarcitas del Muxiven imponen el reinado que ya no acabara hasta el final de la cordillera en Galicia.<br><br>El Cornon pero tambien el Muxiven, dos grandes torres que superan los dos mil metros de altura para convertirse en el techo de la comarca minera y tambien del verde Somiedo .<br><br>El Cornon de Penarrubia (2.188 metros), maxima altura de la cordillera cantabrica desde Pena Orniz hasta el oceano Atlantico.<br><br>El Cornon es un pico abatido y erosionado por el aire, el hielo y la nieve. Y tambien el sol. Lo chupa todo, vamos. Las humedades asturianas y los gelidos aires leoneses. Cumbre emblema de esta montana occidental que es vista desde varios puntos cardinales.<br><br>Bajo nuestros pies, hacia el sur, se deslizan los antiguos glaciares que conformaron la cuenca de Laciana (dicen que fue la mayor lengua glaciar de Espana). El valle de Sousas, de San Miguel, de Orallo... todos ellos suben hasta estas laderas del Cornon, con varios bosques en sus principios que luego dan paso a largos pastos, branas, cascadas y lagunas.', '4', 'Correr', '../gpx/1676143149.gpx'),
(10, 'Castrocontrigo - Ruta de las Murias', 8574, 599, 1, '42.189323', '-6.189061', 2, 'La ruta de las Murias es un entretenido paseo, yo hoy lo hice corriendo mas bien despacio, por lo que hace unos xx siglos fuera una activa mina de oro romana .<br>Un recorrido circular por senderos entre pinos y brezos. 95% sendero y el resto algo de pista y cortafuegos . Transita por los parajes conocidos como las Murias, el Vallico la Escoba, Muria de la Isabelica; si echamos un vistazo al track que nos aparece en pantalla, se puede comprobar de lo que estoy hablando.', '2', 'Correr', '../gpx/1676143480.gpx'),
(11, ' Leon - La Laguna - Valle Gamones - El Ferral', 36016, 591, 1, '42.611374', '-5.583899', 2, 'Ruta realizada entorno al Valle del Arroyo de los Gamones, subiendo desde Leon hasta las proximidades de la Base militar Conde de Gazola por la ladera/collada izquierda y bajando por la ladera/collada derecha.<br><br>El recorrido, practicamente en su totalidad (excepto tramos urbanos), es por caminos y senderos (muchas sendas).<br><br>Este track une algunas (muchas) de la gran cantidad de senderos/sendas que existen por la zona.<br><br>El desnivel que indica wikiloc puede ser enganoso, el GPS indico 685 m en ascenso, pues hay tramos con un continuo sube y baja.<br><br>El tiempo indicado por wikiloc para la realizacion de la ruta no es muy representativo, pues ser realizaron muchas paradas a lo largo del recorrido mientras se realizo el recorrido ', '2', 'Ciclismo', '../gpx/1676144919.gpx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fullname` varchar(70) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pass` varchar(250) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `height` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `weight` varchar(5) COLLATE utf8mb4_spanish_ci NOT NULL,
  `birthday` date NOT NULL,
  `activities` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `fullname`, `pass`, `email`, `height`, `weight`, `birthday`, `activities`) VALUES
(1, 'llagui', 'Yago Nieto Garrido', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'yago@gmail.es', '184', '80', '2002-09-26', 'senderismo,montañismo,ciclismo,'),
(2, 'mercadona', 'Mario Blasco Carrión', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'mario@gmail.com', '170', '66', '2003-05-22', ',,ciclismo,correr');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rutas`
--
ALTER TABLE `rutas`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`user`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
