# Análisis de la Empresa

## 1. Datos Generales
- **Nombre:** Paraiso Distribuciones S.A.S.
- **Giro del negocio:** Distribución y comercialización de artículos de papelería, escolares y suministros de oficina.
- **Tamaño:** Pequeña empresa.
- **Clientes:** Personas naturales (estudiantes y particulares) y empresas (colegios, oficinas y papelerías).

## 2. Procesos Clave
- **Ventas:** Cotización → Pedido → Facturación → Entrega.
- **Compras:** Solicitud → Orden de compra → Recepción en bodega → Registro de pago.
- **Inventario:** Entradas, salidas y ajustes de inventario.

## 3. Entidades Identificadas (Tablas)
- Categorías
- Productos
- Compras
- Ventas
- Informacion_compra
- Informacion_venta
- Proveedores
- Usuarios
- Clientes

## 4. Preguntas Clave
- **¿Qué información se guarda de un cliente?** Se guarda identificación (cédula o NIT), nombre, teléfono y ubicación.
- **¿Qué información se guarda de un producto?** Se guarda identificación, nombre, precio y stock.
- **¿Cómo se relaciona una venta con el inventario?** Cuando se registra una venta, el sistema busca los productos y resta la cantidad al stock.

## 5. Proceso de Desarrollo y Enfoque Técnico
- **Entorno de Desarrollo:** Implementación sobre Laravel usando Docker con **Laravel Sail**, asegurando portabilidad y un entorno aislado de base de datos MySQL.
- **Arquitectura:** Patrón MVC (Modelo-Vista-Controlador).
- **Optimización de Consultas:** Implementación de *Eager Loading* con `with('category')` en los controladores para resolver el $N+1$ en consultas SQL.
- **Modularidad y Escalabilidad:** Rutas estandarizadas con `Route::resource` y controladores de recursos para un flujo CRUD mantenible.

## 6. Diagrama ER
El diagrama arquitectónico que modela las relaciones `belongsTo`, `hasMany` y `belongsToMany`.