# Diccionario de Datos - Paraíso Distribuciones S.A.S.

## Tabla: categories

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id | BIGINT | PK, autoincremental |
| nombre | VARCHAR(100) | Nombre de la categoría |

## Tabla: products

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id_producto | BIGINT | PK, autoincremental |
| nombre | VARCHAR(255) | Nombre del producto |
| precio | DECIMAL(10,2) | Precio de venta |
| stock | INTEGER | Cantidad en inventario |
| id_categoria | BIGINT | FK → categories.id |

## Tabla: clients

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id_cliente | BIGINT | PK, autoincremental |
| nombre | VARCHAR(255) | Nombre o razón social |
| telefono | VARCHAR(255) | Teléfono (nullable) |
| ubicacion | VARCHAR(255) | Dirección (nullable) |

## Tabla: sales

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id_venta | BIGINT | PK, autoincremental |
| id_cliente | BIGINT | FK → clients.id_cliente |
| id_usuario | BIGINT | FK → users.id (nullable) |
| fecha | DATE | Fecha de la venta |
| total | DECIMAL(10,2) | Total de la venta |
| estado_pago | VARCHAR(50) | pagado, pendiente, anulado |

## Tabla: providers

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id_proveedor | BIGINT | PK, autoincremental |
| nombre | VARCHAR(255) | Nombre del proveedor |
| telefono | VARCHAR(255) | Teléfono (nullable) |

## Tabla: purchases

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id_compra | BIGINT | PK, autoincremental |
| id_proveedor | BIGINT | FK → providers.id_proveedor |
| id_usuario | BIGINT | FK → users.id (nullable) |
| fecha | DATE | Fecha de la compra |
| total | DECIMAL(10,2) | Total de la compra |

## Tabla: users

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id | BIGINT | PK, autoincremental |
| name | VARCHAR(255) | Nombre del usuario |
| rol | VARCHAR(255) | cargo |
| password | VARCHAR(255) | Contraseña hasheada |