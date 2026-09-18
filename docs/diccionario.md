# Diccionario de Datos - Paraíso Distribuciones S.A.S.

## Tabla: categories

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id | BIGINT | PK, autoincremental |
| nombre | VARCHAR(100) | Nombre de la categoría |
| descripcion | TEXT | Descripción (nullable) |
| activo | BOOLEAN | Estado (default: true) |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

## Tabla: products

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id_producto | BIGINT | PK, autoincremental |
| identificacion | VARCHAR(255) | Código único del producto |
| nombre | VARCHAR(255) | Nombre del producto |
| precio | DECIMAL(10,2) | Precio de venta |
| stock | INTEGER | Cantidad en inventario |
| id_categoria | BIGINT | FK → categories.id |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

## Tabla: clients

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id_cliente | BIGINT | PK, autoincremental |
| identificacion | VARCHAR(255) | Cédula o NIT (único) |
| nombre | VARCHAR(255) | Nombre o razón social |
| telefono | VARCHAR(255) | Teléfono (nullable) |
| ubicacion | VARCHAR(255) | Dirección (nullable) |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

## Tabla: sales

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id_venta | BIGINT | PK, autoincremental |
| id_cliente | BIGINT | FK → clients.id_cliente |
| id_usuario | BIGINT | FK → users.id (nullable) |
| fecha | DATE | Fecha de la venta |
| total | DECIMAL(10,2) | Total de la venta |
| estado_pago | VARCHAR(50) | pagado, pendiente, anulado |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

## Tabla: sale_details

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id | BIGINT | PK, autoincremental |
| id_venta | BIGINT | FK → sales.id_venta |
| id_producto | BIGINT | FK → products.id_producto |
| cantidad | INTEGER | Cantidad vendida |
| precio_unt | DECIMAL(10,2) | Precio unitario al momento |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

## Tabla: providers

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id_proveedor | BIGINT | PK, autoincremental |
| nombre | VARCHAR(255) | Nombre del proveedor |
| telefono | VARCHAR(255) | Teléfono (nullable) |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

## Tabla: purchases

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id_compra | BIGINT | PK, autoincremental |
| id_proveedor | BIGINT | FK → providers.id_proveedor |
| fecha | DATE | Fecha de la compra |
| total | DECIMAL(10,2) | Total de la compra |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

## Tabla: purchase_details

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id | BIGINT | PK, autoincremental |
| id_compra | BIGINT | FK → purchases.id_compra |
| id_producto | BIGINT | FK → products.id_producto |
| cantidad | INTEGER | Cantidad comprada |
| precio_unt | DECIMAL(10,2) | Precio unitario al momento |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |

## Tabla: users

| Campo | Tipo | Descripción |
| :--- | :--- | :--- |
| id | BIGINT | PK, autoincremental |
| name | VARCHAR(255) | Nombre del usuario |
| email | VARCHAR(255) | Email (único) |
| password | VARCHAR(255) | Contraseña hasheada |
| created_at | TIMESTAMP | Fecha de creación |
| updated_at | TIMESTAMP | Fecha de actualización |