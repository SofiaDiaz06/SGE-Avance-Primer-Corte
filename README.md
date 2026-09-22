Se eligió a **Paraíso Distribuciones**, una empresa dedicada a la distribución y comercialización de artículos de papelería, útiles escolares y suministros de oficina.

**Se uso **el entorno de trabajo con d**ocker** mediante l**aravel sail para** la portabilidad del proyecto y mantener un entorno de base de datos MySQL aislado.

Se inicializó el proyecto en laravel con la arquitectura **MVC (Modelo-Vista-Controlador)**.

Se hicieron y ejecutaron las migraciones de la base de datos para estructurar las tablas relacionales del ERP que son:

* users (con campos personalizados como cédula y rol).

- categories (para la clasificación de inventario con llave primaria personalizada id_categoria).

* products (vinculada a categorías mediante claves foráneas).

- Tablas transaccionales y de gestión complementarias como clients, providers, purchases, purchase_details, sales y sale_details.

Se crearon los modelos como category, client, product, provider, purchase, purchaseDetail, cale, saledetail y user) configurando las llaves primarias y los arreglos $fillable para la asignación masiva de datos.

Se hicieron los tipos de relaciones como:

* Relaciones **hasMany** y **belongsTo** (una categoría tiene muchos productos, y un producto pertenece a una categoría).

- Relaciones **belongsToMany** utilizando tablas para los detalles de compras y ventas (sale_details y purchase_details).

* Se usaron s**copes** reutilizables en los modelos (por ejemplo, scopeConStock y scopeStockBajo) para optimizar el filtrado de productos.

Se hizo el c**ontrolador resource** (productcontroller) para gestionar de forma limpia y modular las operaciones del CRUD principal de productos.

Se configuraron las rutas del sistema utilizando el método estandarizado Route::resource en el archivo de web.php.

Se hicieron las vistas principales con b**lade con** componentes de diseño responsivo:

* **index.blade.php**: Para la visualización del inventario.

- **create.blade.php**: Formulario para agregar nuevos productos.

* **edit.blade.php**: Formulario precargado con los datos actuales del producto mediante directivas old() y el método HTTP @method('PUT') para actualizaciones seguras.
