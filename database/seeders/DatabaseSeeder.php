<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usuarios por defecto
        DB::table('usuarios')->insert([
            [
                'nombre'       => 'Admin',
                'apellido'     => 'Sistema',
                'gmail'        => 'admin@elViejoHogar.com',
                'nacionalidad' => 'Argentina',
                'ciudad'       => 'Córdoba',
                'password'     => Hash::make('12345'),
                'rol'          => 'admin',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
            [
                'nombre'       => 'Cliente',
                'apellido'     => 'Demo',
                'gmail'        => 'cliente@gmail.com',
                'nacionalidad' => 'Argentina',
                'ciudad'       => 'Córdoba',
                'password'     => Hash::make('12345'),
                'rol'          => 'cliente',
                'created_at'   => now(),
                'updated_at'   => now(),
            ],
        ]);

        // Locales
        $locales = [
            ['nombre' => 'Sucursal Centro (Córdoba)', 'ciudad' => 'Córdoba', 'calle' => 'Av. Colón 1230', 'telefono' => '+54 351 456-7890', 'medios_pago' => 'Visa, Mastercard, Débito, Mercado Pago, MODO, Cuenta DNI, Efectivo', 'costo_envio' => 1200],
            ['nombre' => 'Sucursal Nueva Córdoba', 'ciudad' => 'Córdoba', 'calle' => 'Bv. Chacabuco 780', 'telefono' => '+54 351 512-3456', 'medios_pago' => 'Visa, Mastercard, Débito, Mercado Pago, Ualá, Efectivo', 'costo_envio' => 1100],
            ['nombre' => 'Sucursal Güemes', 'ciudad' => 'Córdoba', 'calle' => 'Calle Belgrano 680', 'telefono' => '+54 351 678-9012', 'medios_pago' => 'Todas las tarjetas, Mercado Pago, MODO, Efectivo', 'costo_envio' => 1300],
            ['nombre' => 'Sucursal General Paz', 'ciudad' => 'Córdoba', 'calle' => '24 de Septiembre 910', 'telefono' => '+54 351 489-0123', 'medios_pago' => 'Visa, Mastercard, Cabal, Mercado Pago, Cuenta DNI, Efectivo', 'costo_envio' => 1250],
            ['nombre' => 'Sucursal Palermo', 'ciudad' => 'Buenos Aires', 'calle' => 'Av. Santa Fe 3420', 'telefono' => '+54 11 4771-2345', 'medios_pago' => 'Visa, Mastercard, American Express, Mercado Pago, MODO, Ualá, Efectivo', 'costo_envio' => 1800],
            ['nombre' => 'Sucursal San Telmo', 'ciudad' => 'Buenos Aires', 'calle' => 'Calle Defensa 850', 'telefono' => '+54 11 4361-9876', 'medios_pago' => 'Visa, Mastercard, Débito, Mercado Pago, MODO, Efectivo', 'costo_envio' => 1650],
            ['nombre' => 'Sucursal Puerto Madero', 'ciudad' => 'Buenos Aires', 'calle' => 'Av. Alicia Moreau de Justo 1050', 'telefono' => '+54 11 4312-3456', 'medios_pago' => 'Tarjetas Internacionales, Mercado Pago, MODO, Efectivo', 'costo_envio' => 2100],
            ['nombre' => 'Sucursal Palermo Soho', 'ciudad' => 'Buenos Aires', 'calle' => 'Calle Honduras 4850', 'telefono' => '+54 11 4833-5678', 'medios_pago' => 'Visa, Mastercard, Mercado Pago, Personal Pay, Efectivo', 'costo_envio' => 1750],
            ['nombre' => 'Sucursal Belgrano', 'ciudad' => 'Buenos Aires', 'calle' => 'Av. Juramento 2350', 'telefono' => '+54 11 4786-4321', 'medios_pago' => 'Visa, Mastercard, Débito, Mercado Pago, Efectivo', 'costo_envio' => 1600],
            ['nombre' => 'Sucursal Recoleta', 'ciudad' => 'Buenos Aires', 'calle' => 'Calle Junín 1740', 'telefono' => '+54 11 4823-6789', 'medios_pago' => 'Todas las tarjetas, Mercado Pago, MODO, Ualá, Efectivo', 'costo_envio' => 1900],
            ['nombre' => 'Sucursal Pichincha', 'ciudad' => 'Rosario', 'calle' => 'Calle Alvear 210', 'telefono' => '+54 341 456-7890', 'medios_pago' => 'Visa, Mastercard, Débito, Mercado Pago, Efectivo', 'costo_envio' => 1300],
            ['nombre' => 'Sucursal Costanera', 'ciudad' => 'Rosario', 'calle' => 'Av. Belgrano 540', 'telefono' => '+54 341 512-3456', 'medios_pago' => 'Visa, Mastercard, Mercado Pago, Efectivo', 'costo_envio' => 1400],
            ['nombre' => 'Sucursal Pellegrini', 'ciudad' => 'Rosario', 'calle' => 'Av. Pellegrini 1430', 'telefono' => '+54 341 678-9012', 'medios_pago' => 'Todas las tarjetas, Mercado Pago, Efectivo', 'costo_envio' => 1200],
            ['nombre' => 'Sucursal Centro (Rosario)', 'ciudad' => 'Rosario', 'calle' => 'Calle Córdoba 1640', 'telefono' => '+54 341 489-0123', 'medios_pago' => 'Visa, Mastercard, Débito, Mercado Pago, MODO, Efectivo', 'costo_envio' => 1350],
            ['nombre' => 'Sucursal Arístides', 'ciudad' => 'Mendoza', 'calle' => 'Av. Arístides Villanueva 420', 'telefono' => '+54 261 456-7890', 'medios_pago' => 'Visa, Mastercard, Mercado Pago, Ualá, Efectivo', 'costo_envio' => 1150],
            ['nombre' => 'Sucursal Centro (Mendoza)', 'ciudad' => 'Mendoza', 'calle' => 'Av. San Martín 1120', 'telefono' => '+54 261 512-3456', 'medios_pago' => 'Todas las tarjetas, Mercado Pago, Efectivo', 'costo_envio' => 1200],
        ];

        foreach ($locales as $local) {
            DB::table('locales')->insert(array_merge($local, ['created_at' => now(), 'updated_at' => now()]));
        }

        // Platillos
        $platillos = [
            // ARGENTINA
            ['nombre' => 'Asado Criollo con Guarnición', 'pais' => 'Argentina', 'bandera' => '🇦🇷', 'precio' => 14500, 'ciudad' => 'Córdoba', 'local' => 'Sucursal Centro', 'calle' => 'Av. Colón 1230', 'descripcion' => 'Cortes seleccionados de carne vacuna a las brasas de leña, acompañados de papas rústicas y chimichurri casero.', 'imagen' => ''],
            ['nombre' => 'Empanadas Salteñas al Horno', 'pais' => 'Argentina', 'bandera' => '🇦🇷', 'precio' => 7200, 'ciudad' => 'Córdoba', 'local' => 'Sucursal Nueva Córdoba', 'calle' => 'Bv. Chacabuco 780', 'descripcion' => 'Docena de empanadas tradicionales cortadas a cuchillo, jugosas, con papa, huevo duro y especias autóctonas.', 'imagen' => ''],
            ['nombre' => 'Milanesa Napolitana con Fritas', 'pais' => 'Argentina', 'bandera' => '🇦🇷', 'precio' => 11800, 'ciudad' => 'Buenos Aires', 'local' => 'Sucursal Palermo', 'calle' => 'Av. Santa Fe 3420', 'descripcion' => 'Suprema o carne empanizada crujiente, cubierta con salsa de tomate artesanal, jamón cocido y abundante queso mozzarella gratinado.', 'imagen' => ''],
            ['nombre' => 'Locro Criollo Tradicional', 'pais' => 'Argentina', 'bandera' => '🇦🇷', 'precio' => 9500, 'ciudad' => 'Rosario', 'local' => 'Sucursal Pichincha', 'calle' => 'Calle Alvear 210', 'descripcion' => 'Guiso espeso tradicional a base de maíz blanco, zapallo, porotos, panceta, chorizo colorado y salsa picante de verdeo.', 'imagen' => ''],
            ['nombre' => 'Pastel de Papa Casero', 'pais' => 'Argentina', 'bandera' => '🇦🇷', 'precio' => 8900, 'ciudad' => 'Buenos Aires', 'local' => 'Sucursal San Telmo', 'calle' => 'Calle Defensa 850', 'descripcion' => 'Capas de puré de papas suave y cremoso gratinado, relleno de carne vacuna condimentada, aceitunas y huevo duro.', 'imagen' => ''],
            // ESPAÑA
            ['nombre' => 'Paella Marinera Valenciana', 'pais' => 'España', 'bandera' => '🇪🇸', 'precio' => 16200, 'ciudad' => 'Buenos Aires', 'local' => 'Sucursal Puerto Madero', 'calle' => 'Av. Alicia Moreau de Justo 1050', 'descripcion' => 'Arroz bomba cocido a fuego lento con azafrán español, langostinos frescos, calamares, mejillones y pimientos asados.', 'imagen' => ''],
            ['nombre' => 'Tortilla Española de Patatas', 'pais' => 'España', 'bandera' => '🇪🇸', 'precio' => 8400, 'ciudad' => 'Córdoba', 'local' => 'Sucursal Centro', 'calle' => 'Av. Colón 1230', 'descripcion' => 'Clásica tortilla jugosa elaborada con patatas pochadas en aceite de oliva virgen extra, cebolla caramelizada y huevos de campo.', 'imagen' => ''],
            ['nombre' => 'Pulpo a la Gallega', 'pais' => 'España', 'bandera' => '🇪🇸', 'precio' => 18500, 'ciudad' => 'Rosario', 'local' => 'Sucursal Costanera', 'calle' => 'Av. Belgrano 540', 'descripcion' => 'Tiernas rodajas de pulpo sobre base de patatas cocidas al vapor, aderezadas con pimentón dulce de La Vera y sal marina gruesa.', 'imagen' => ''],
            ['nombre' => 'Croquetas de Jamón Ibérico', 'pais' => 'España', 'bandera' => '🇪🇸', 'precio' => 7800, 'ciudad' => 'Mendoza', 'local' => 'Sucursal Arístides', 'calle' => 'Av. Arístides Villanueva 420', 'descripcion' => 'Seis unidades de croquetas con bechamel súper cremosa y trozos de jamón ibérico de bellota, con rebozado dorado y crujiente.', 'imagen' => ''],
            ['nombre' => 'Gazpacho Andaluz Tradicional', 'pais' => 'España', 'bandera' => '🇪🇸', 'precio' => 6900, 'ciudad' => 'Córdoba', 'local' => 'Sucursal General Paz', 'calle' => '24 de Septiembre 910', 'descripcion' => 'Sopa fría y refrescante de tomates maduros, pepino, pimiento verde, ajo y aceite de oliva virgen extra con picatostes.', 'imagen' => ''],
            // MÉXICO
            ['nombre' => 'Tacos al Pastor con Piña', 'pais' => 'México', 'bandera' => '🇲🇽', 'precio' => 8600, 'ciudad' => 'Buenos Aires', 'local' => 'Sucursal Palermo Soho', 'calle' => 'Calle Honduras 4850', 'descripcion' => 'Tres tacos en tortilla de maíz nixtamalizado con cerdo adobado en achiote, trozos de piña asada, cilantro y cebolla morada.', 'imagen' => ''],
            ['nombre' => 'Enchiladas Verdes Suizas', 'pais' => 'México', 'bandera' => '🇲🇽', 'precio' => 9400, 'ciudad' => 'Córdoba', 'local' => 'Sucursal Güemes', 'calle' => 'Calle Belgrano 680', 'descripcion' => 'Tortillas rellenas de pollo deshebrado, bañadas en salsa verde de tomatillo con crema ácida y gratinadas con queso manchego.', 'imagen' => ''],
            ['nombre' => 'Chiles en Nogada', 'pais' => 'México', 'bandera' => '🇲🇽', 'precio' => 12800, 'ciudad' => 'Mendoza', 'local' => 'Sucursal Centro', 'calle' => 'Av. San Martín 1120', 'descripcion' => 'Chile poblano relleno de picadillo agridulce con frutos secos, bañado en salsa de nuez de Castilla y granos de granada fresca.', 'imagen' => ''],
            ['nombre' => 'Guacamole Rústico con Totopos', 'pais' => 'México', 'bandera' => '🇲🇽', 'precio' => 6500, 'ciudad' => 'Rosario', 'local' => 'Sucursal Pellegrini', 'calle' => 'Av. Pellegrini 1430', 'descripcion' => 'Aguacate mexicano machacado en molcajete con jugo de lima, cilantro fresco, cebolla blanca y totopos crocantes de maíz.', 'imagen' => ''],
            ['nombre' => 'Pozole Rojo Tradicional', 'pais' => 'México', 'bandera' => '🇲🇽', 'precio' => 10200, 'ciudad' => 'Buenos Aires', 'local' => 'Sucursal Belgrano', 'calle' => 'Av. Juramento 2350', 'descripcion' => 'Caldo reconfortante de maíz cacahuazintle con carne de cerdo en salsa de chiles guajillo y ancho, con rábanos y orégano.', 'imagen' => ''],
            // CHINA
            ['nombre' => 'Arroz Chaufa al Wok Especial', 'pais' => 'China', 'bandera' => '🇨🇳', 'precio' => 8200, 'ciudad' => 'Buenos Aires', 'local' => 'Sucursal Barrio Chino', 'calle' => 'Calle Arribeños 2150', 'descripcion' => 'Arroz salteado a fuego vivo al wok con pollo, panceta, cebollita china, huevo revuelto y toques aromáticos de aceite de sésamo.', 'imagen' => ''],
            ['nombre' => 'Dumplings / Dim Sum al Vapor', 'pais' => 'China', 'bandera' => '🇨🇳', 'precio' => 7900, 'ciudad' => 'Córdoba', 'local' => 'Sucursal Centro', 'calle' => 'Av. Colón 1230', 'descripcion' => 'Ocho unidades de empanaditas chinas artesanales rellenas de cerdo especiado y jengibre, servidas con salsa de soja y sésamo.', 'imagen' => ''],
            ['nombre' => 'Pollo Kung Pao con Maní', 'pais' => 'China', 'bandera' => '🇨🇳', 'precio' => 10500, 'ciudad' => 'Rosario', 'local' => 'Sucursal Centro', 'calle' => 'Calle Córdoba 1640', 'descripcion' => 'Cubos tiernos de pollo marinados y salteados con chiles secos de Sichuan, maní tostado, pimientos verdes y salsa agridulce picante.', 'imagen' => ''],
            ['nombre' => 'Cerdo Agridulce Tradicional', 'pais' => 'China', 'bandera' => '🇨🇳', 'precio' => 11200, 'ciudad' => 'Buenos Aires', 'local' => 'Sucursal Recoleta', 'calle' => 'Calle Junín 1740', 'descripcion' => 'Trocitos de cerdo rebozados y dorados, salteados con trozos de piña, pimientos tricolores y la clásica salsa agridulce cantonesa.', 'imagen' => ''],
            ['nombre' => 'Fideos Chow Mein Salteados', 'pais' => 'China', 'bandera' => '🇨🇳', 'precio' => 8800, 'ciudad' => 'Mendoza', 'local' => 'Sucursal Arístides', 'calle' => 'Av. Arístides Villanueva 420', 'descripcion' => 'Fideos de trigo salteados al wok con verduras crujientes de estación, brotes de soja, carne de ternera y salsa de ostras.', 'imagen' => ''],
            // PLATILLOS ADICIONALES (Pruebas_usuario.html)
            ['nombre' => 'Pollo al horno', 'pais' => 'Argentina', 'bandera' => '🇦🇷', 'precio' => 8500, 'ciudad' => 'Córdoba', 'local' => 'Sucursal Centro', 'calle' => 'Av. Colón 1230', 'descripcion' => 'Pollo dorado al horno acompañado con papas y verduras de estación.', 'imagen' => 'Otros/20200731162901pollo-asado.jpg'],
            ['nombre' => 'Pasta casera', 'pais' => 'Italia', 'bandera' => '🇮🇹', 'precio' => 7200, 'ciudad' => 'Córdoba', 'local' => 'Sucursal Nueva Córdoba', 'calle' => 'Bv. Chacabuco 780', 'descripcion' => 'Pasta artesanal acompañada con salsa de tomate y queso rallado.', 'imagen' => ''],
            ['nombre' => 'Asado tradicional', 'pais' => 'Argentina', 'bandera' => '🇦🇷', 'precio' => 12500, 'ciudad' => 'Córdoba', 'local' => 'Sucursal Güemes', 'calle' => 'Calle Belgrano 680', 'descripcion' => 'Corte de carne a la parrilla acompañado de papas rústicas.', 'imagen' => ''],
            ['nombre' => 'Milanesa con papas', 'pais' => 'Argentina', 'bandera' => '🇦🇷', 'precio' => 7800, 'ciudad' => 'Buenos Aires', 'local' => 'Sucursal Palermo', 'calle' => 'Av. Santa Fe 3420', 'descripcion' => 'Milanesa casera acompañada con papas fritas crocantes.', 'imagen' => ''],
            ['nombre' => 'Empanadas caseras', 'pais' => 'Argentina', 'bandera' => '🇦🇷', 'precio' => 5500, 'ciudad' => 'Córdoba', 'local' => 'Sucursal General Paz', 'calle' => '24 de Septiembre 910', 'descripcion' => 'Empanadas artesanales rellenas de carne, cebolla y especias.', 'imagen' => ''],
            ['nombre' => 'Estofado de carne', 'pais' => 'Argentina', 'bandera' => '🇦🇷', 'precio' => 9300, 'ciudad' => 'Rosario', 'local' => 'Sucursal Pichincha', 'calle' => 'Calle Alvear 210', 'descripcion' => 'Carne cocida lentamente con verduras y salsa de la casa.', 'imagen' => ''],
            ['nombre' => 'Ravioles de la casa', 'pais' => 'Italia', 'bandera' => '🇮🇹', 'precio' => 8900, 'ciudad' => 'Buenos Aires', 'local' => 'Sucursal Recoleta', 'calle' => 'Calle Junín 1740', 'descripcion' => 'Ravioles rellenos con carne y queso acompañados con salsa casera.', 'imagen' => ''],
            ['nombre' => 'Postre de la casa', 'pais' => 'Argentina', 'bandera' => '🇦🇷', 'precio' => 4500, 'ciudad' => 'Córdoba', 'local' => 'Sucursal Centro', 'calle' => 'Av. Colón 1230', 'descripcion' => 'Delicioso postre casero de dulce de leche perfecto para terminar la comida.', 'imagen' => ''],
        ];

        foreach ($platillos as $platillo) {
            DB::table('platillos')->insert(array_merge($platillo, ['created_at' => now(), 'updated_at' => now()]));
        }

        // Pedidos de prueba
        $pedidos = [
            [
                'codigo'            => 'PED-7821',
                'cliente_nombre'    => 'Carlos Mendoza',
                'cliente_email'     => 'carlos@gmail.com',
                'ciudad_entrega'    => 'Córdoba',
                'direccion_entrega' => 'Av. Colón 1450, Piso 3B',
                'metodo_pago'       => 'efectivo',
                'billetera'         => null,
                'subtotal'          => 14500,
                'costo_envio'       => 1200,
                'total'             => 15700,
                'estado'            => 'En preparación',
                'items'             => json_encode([
                    ['nombre' => 'Asado Criollo con Guarnición', 'precio' => 14500, 'cantidad' => 1]
                ]),
                'created_at'        => now()->subMinutes(15),
                'updated_at'        => now()->subMinutes(15),
            ],
            [
                'codigo'            => 'PED-7822',
                'cliente_nombre'    => 'Mariana Gómez',
                'cliente_email'     => 'mariana@gmail.com',
                'ciudad_entrega'    => 'Córdoba',
                'direccion_entrega' => 'Bv. Chacabuco 620, Dpto 8A',
                'metodo_pago'       => 'transferencia',
                'billetera'         => 'Mercado Pago',
                'subtotal'          => 14400,
                'costo_envio'       => 1100,
                'total'             => 15500,
                'estado'            => 'En camino',
                'items'             => json_encode([
                    ['nombre' => 'Empanadas Salteñas al Horno', 'precio' => 7200, 'cantidad' => 2]
                ]),
                'created_at'        => now()->subMinutes(45),
                'updated_at'        => now()->subMinutes(20),
            ],
            [
                'codigo'            => 'PED-7820',
                'cliente_nombre'    => 'Roberto Díaz',
                'cliente_email'     => 'roberto@gmail.com',
                'ciudad_entrega'    => 'Buenos Aires',
                'direccion_entrega' => 'Av. Santa Fe 3100, PB 2',
                'metodo_pago'       => 'efectivo',
                'billetera'         => null,
                'subtotal'          => 20400,
                'costo_envio'       => 1800,
                'total'             => 22200,
                'estado'            => 'Entregado',
                'items'             => json_encode([
                    ['nombre' => 'Milanesa Napolitana con Fritas', 'precio' => 11800, 'cantidad' => 1],
                    ['nombre' => 'Tacos al Pastor con Piña', 'precio' => 8600, 'cantidad' => 1]
                ]),
                'created_at'        => now()->subHours(2),
                'updated_at'        => now()->subHours(1),
            ],
        ];

        foreach ($pedidos as $pedido) {
            DB::table('pedidos')->insert($pedido);
        }
    }
}
