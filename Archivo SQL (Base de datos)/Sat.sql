-- Crear Base de datos del inventario del SAT
CREATE DATABASE invesat;

-- Usar base de datos para la creación de las tablas
use invesat;

--
-- Estructura de tabla para la tabla `Marcas`
--

CREATE TABLE IF NOT EXISTS marcas (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(120) NOT NULL,
  `activo_marca` bit(2) NOT NULL DEFAULT '0',
  `estado_marca` bit(2) NOT NULL DEFAULT '0'
); 

--
-- Estructura de tabla para la tabla `Categorias`
--

CREATE TABLE IF NOT EXISTS categorias (
  `id_categorias` int(11) NOT NULL,
  `nombre_categorias` varchar(255) NOT NULL,
  `activo_categorias` int(11) NOT NULL DEFAULT '0',
  `estado_categorias` int(11) NOT NULL DEFAULT '0'
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS productos (
  `id_productos` int(11) NOT NULL,
  `nombre_productos` varchar(255) NOT NULL,
  `imagen_productos` text NOT NULL,
  `id_marca` int(11) NOT NULL,
  `id_categorias`` int(11) NOT NULL,
  `cantidad` varchar(255) NOT NULL,
  `precio` varchar(255) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '0',
  `estado` int(11) NOT NULL DEFAULT '0'
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS usuarios (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL
);


--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categorias`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_productos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

