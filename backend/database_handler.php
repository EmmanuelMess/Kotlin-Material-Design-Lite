<?php
class DatabaseHandler {
    public static $WEAPONS_TABLE = "weapons";
    public static $ID_COLUMN = "id";
    public static $LINK_COLUMN = "link";
    public static $NAME_COLUMN = "name";
    public static $DESCRIPTION_COLUMN = "description";

    public static function createConnection() {
        $dbopts = parse_url(getenv('DATABASE_URL'));
        $app->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
                       array(
                        'pdo.server' => array(
                           'driver'   => 'pgsql',
                           'user' => $dbopts["user"],
                           'password' => $dbopts["pass"],
                           'host' => $dbopts["host"],
                           'port' => $dbopts["port"],
                           'dbname' => ltrim($dbopts["path"],'/')
                           )
                       )
        );

        DatabaseHandler::buildDatabase();
    }

    private static function buildDatabase() {
        $app->get('/db/', function() use($app) {
          $st = $app['pdo']->prepare("CREATE TABLE IF NOT EXISTS ".DatabaseHandler::$WEAPONS_TABLE." (".
              DatabaseHandler::$ID_COLUMN." INT PRIMARY KEY, ".
              DatabaseHandler::$LINK_COLUMN." text NOT NULL, ".
              DatabaseHandler::$NAME_COLUMN." text NOT NULL, ".
              DatabaseHandler::$DESCRIPTION_COLUMN." text NOT NULL".
              ") ");
          $st->execute();
        });
    }

    public static function getWeapon(int $id) {
        //TODO run query
        return new WeaponDTO($id, "frontend/assets/images/weapons/".$id.".jpg", "Título", "Algo descriptívo");
    }

    private static $UPDATE_QUERY = "
    (32, 'CARABINA SAVAGE AXIS INOX CAL 30-06', 'Peso       0.5 kg\r\nPais de origen        \r\nEstados Unidos\r\n\r\nMarca \r\nSAVAGE\r\n\r\nModelo        \r\nAXIS\r\n\r\nArmas: Sistema  \r\nRepetición\r\n\r\nArmas: Longitud Caño      \r\n22\\"\r\n\r\nArmas: Calibre  \r\n30-06\r\n$32,110'),
(33, 'CARABINA SAVAGE AXIS CAL 308 + MIRA', 'Peso       0.5 kg\r\nPais de origen        \r\nEstados Unidos\r\n\r\nMarca \r\nSAVAGE\r\n\r\nModelo        \r\nAXIS\r\n\r\nArmas: Sistema  \r\nRepetición\r\n\r\nArmas: Calibre    \r\n308 – 7.62\r\n$30,710'),
(34, 'ESCOPETA LEGEND S19 Cal 36 / 410', 'SKU: 41099Disponibilidad: Producto fuera de stockCARACTERÍSTICASEscopeta Legend modelo S19\r\nSuperpuesta.\r\nCulata de madera de Nogal.\r\nChoques intercambiables internos.\r\nDoble banda ventilada.\r\nCañón de 71 cm.\r\nExtractor automático.\r\nMonogatillo.\r\nSelector de tiro.\r\nOrigen Turquía.\r\n$18,250'),
(35, 'ESCOPETA LEGEND MK35L12/70', 'SKU: 43457Disponibilidad: Producto fuera de stockCARACTERÍSTICASEscopeta semiautomática Legend.\r\nCalibre: 12/76\r\nLargo de caño: 71cm.\r\nCapacidad: 7+1.\r\nCulata de madera.\r\nChoques intercambiables externos.\r\nBanda ventilada.\r\nSistema por recuperación de gases.\r\nPeso: 3,4kg.\r\nOrigen: Turquia.\r\n$13,310'),
(36, 'Escopeta Hatsan Escort MP 12/70\r\n', 'SKU: 38311Disponibilidad: Producto fuera de stockCARACTERÍSTICASCalibre 12.\r\nAcción a repetición.\r\nRecámara de 3\\"\r\nLargo del cañón de 20\\" con protección contra el calor y freno de boca.\r\nCapacidad de 7+1 cartuchos.\r\nAparato de puntería regulable.\r\nCon riel Picatinny para montar accesorios.\r\nCulata de polímero color negro con alojamiento para 2 cartuchos.\r\nEmpuñadura de pistola integrada.\r\nChimaza ergonométrica.\r\nCon porta láser.$16,990'),
(37, 'Escopeta Beretta Cal 20 A400 Xplor Action', 'SKU: 38708Disponibilidad: Producto fuera de stock\r\nCARACTERÍSTICAS\r\nSistema de reducción de retroceso Kick off\r\nBanda Ventilada\r\nCapacidad 3+1\r\nCañon 71cm$59,400'),
(38, 'ESCOPETA AKKAR kARATAY TACTICAL 12/70', 'SKU: 38183Disponibilidad: Producto en stockCARACTERÍSTICASCalibre 12/76.\r\nSintética.\r\nCañón de 47 cm.\r\nFolding Stock & Pistol Grip.\r\nMira trasera ajustable.\r\nDe 6+1.\r\nPeso 3,05 kg\r\n$10,970'),
(39, 'CARABINA MOSSBERG 270W PATRIOT', 'CARACTERÍSTICASCapacidad de 4 disparos\r\nCargador extraible\r\n$16,540'),
(40, 'CARABINA MARLIN XT-17VSL 17HMR', 'SKU: 47134Disponibilidad: Producto fuera de stock\r\nCARACTERÍSTICASCalibre 17HMR\r\nCañon pavonado Bull Barrel de 22\\" (56 cm)\r\nCargador desmontable de 7 tiros$20,800'),
(41, 'Remington 700 ADL Varmint camo', 'SKU: 47433Disponibilidad: Producto fuera de stockCARACTERÍSTICASCalibre .308 Win. Acción a cerrojo. Cañón Bull Barrel de 24\\". Culata sintética camuflada. Terminación pavonado. Capacidad de 5 disparos.$28,560'),
(42, 'MOSSBERG 308W', 'SKU: 46236Disponibilidad: Producto fuera de stock\r\nCARACTERÍSTICAS\r\nPeso     0.5 kg\r\nPais de origen        \r\nEstados Unidos\r\n\r\nMarca \r\nMOSSBERG\r\n\r\nModelo      \r\nPATRIOT\r\n\r\nArmas: Sistema       \r\nRepetición\r\n\r\nArmas: Longitud Caño      \r\n22\\"\r\n\r\nArmas: Calibre  \r\n308 – 7.62\r\n$22,000'),
(43, 'FUSIL SABATTI STR DESERT', 'SKU: 47831Disponibilidad: Producto en stockCARACTERÍSTICASSe diseñó principalmente para el tiro al blanco de la precisión, el STR se ha creado para las aplicaciones tácticas del “campo” donde se requiere una exactitud superior.Principales características del STR: Barrel Twist 1 en 12\r\nTema: 5/8 x 24 hilos\r\nCapacidad de 7 rondas\r\nAcción: Se adapta a todas las existencias de estilo M4\r\nTope ajustable\r\nAcciones plegables\r\nEmpuñadura antideslizante\r\n20 MOA Tren Picatinny\r\nPunto de transporte fácil\r\nGuardia de mano\r\nCarril izquierdo y derecho picatinny\r\nRifling radial múltiple (ver arriba)h\r\nHecho en Italia$87,490'),
(44, 'FUSIL STEYR MANNLICHER CARBON SSG08', 'SKU: 46580Disponibilidad: Producto en stockCARACTERÍSTICASModelo: SSG Carbon\r\nObjetivo: Tiro al blanco de largo alcance, táctico\r\nFuncionamiento: Repetición de la acción de pernos\r\nCalibre: .308 Winchester\r\nTipo / capacidad del compartimiento: Caja desmontable de la doble-pila del polímero / 10 vueltas\r\nMaterial de la acción: acero 25CrMo4\r\nBarril: barril pesado forjado a martillo frío de 20 y 22,4 pulgadas\r\nRifling: 4 ranuras, 1:10 RH Twist (.308, .300)\r\nLugares de interés: 20-MOA Picatinny rail\r\nAcabado: Mannox®\r\nSeguridad: Posición 3 + 1 Seguridad\r\nTipo de disparo: de una sola etapa\r\nPeso del tirón: 3 libras, 8 onzas (ajustable por el usuario)\r\nLongitud de la tracción: 14,25 pulgadas min. (Inserciones de 0,33 pulgadas disponibles)\r\nAjuste del peine: 2.25 pulgadas de ajuste vertical\r\nCaída en el talón: ajuste vertical de +1.07 a -3.8 pulgadas\r\nRecubrimiento: Elastómero; 0.8 pulgadas de espesor\r\nEmpuñadura de pistola: Polímero con insertos de goma intercambiables\r\nPeso, vacío: 11 libras, 2 onzas\r\nLongitud total: 43.4 pulgadas\r\nAccesorios incluidos: Manual de instrucciones, estuche de viaje duro$162,020'),
(45, 'FUSIL SABATTI STR', 'SKU: 46956Disponibilidad: Producto en stock\r\nCARACTERÍSTICASSe diseñó principalmente para el tiro al blanco de la precisión, el STR se ha creado para las aplicaciones tácticas del \"campo\" donde se requiere una exactitud superior.Principales características del STR: Barrel Twist 1 en 12\r\nTema: 5/8 x 24 hilos\r\nCapacidad de 7 rondas\r\nAcción: Se adapta a todas las existencias de estilo M4\r\nTope ajustable\r\nAcciones plegables\r\nEmpuñadura antideslizante\r\n20 MOA Tren Picatinny\r\nPunto de transporte fácil\r\nGuardia de mano\r\nCarril izquierdo y derecho picatinny\r\nRifling radial múltiple\r\nHecho en Italia$79,970'),
(46, 'CARABINA CZ 550 30-06 FULL STOCK', 'SKU: 40258Disponibilidad: Producto en stock\r\nCARACTERÍSTICASEstilo Mannlicher\r\nCargador Desmontable\r\nRiel de 19mm para montaje de mira\r\nCantonera de Caucho ventilada\r\nGatillo al pelo\r\n$46,500'),
(47, 'CARABINA CZ 550 .308 FULL STOCK', 'SKU: 38860Disponibilidad: Producto en stockCARACTERÍSTICASEstilo Mannlicher\r\nCargador Desmontable\r\nRiel de 19mm para montaje de mira\r\nCantonera de Caucho ventilada\r\nGatillo al pelo$49,200'),
(48, 'Arco Crosman Wildhorn + Acces.', 'SKU: 45561Disponibilidad: Producto en stock\r\nCARACTERÍSTICASArco de fibra de vidrio semi reforzado\r\nPotencia de 29lbs\r\nIncluye: dos flechas de fibra de vidrio, carcaj porta flechas para adherir al arco, tab(protector de dedos) y protector de brazos\r\nMango de Grip anatómico c/mira y rest apoya flecha $3,030'),
(49, 'COLT NEW FRONTIER 45 LONG COLT 5.5\" MARMOLADO', 'SKU: 45217Disponibilidad: Producto fuera de stockCARACTERÍSTICASLa leyenda continúa con el New Frontier, Single Action Army.\r\nDe 1890 a 1989 Colt fabricó una variación del venerable SA Army con una única variante: el \"Flattop Target Model\". Consistía en una alza ajustable junto con un guión de mayor perfil• Alza regulable\r\n• Extractor de vainas.\r\n• Acción simple\r\n• Terminación pavonado marmolado.$109,000'),
(50, 'CARABINA RUGER 308 GUNSITE SCOUT', 'SKU: 47150Disponibilidad: Producto fuera de stockCARACTERÍSTICASEl riel Picatinny montado en la parte delantera permite el montaje de ópticas modernas, como un alcance de alivio intermedio de los ojos (no incluido), para una visibilidad de \"ambos ojos abiertos\" y una adquisición de objetivo súper rápido.\r\nTambién ofrece un sistema incorporado, de la observación exacto con la mirada ajustable de la abertura trasera del anillo del fantasma y una vista delantera de la lámina , protegida.\r\nAlmacén de caja desmontable con liberación del cargador delantero justo delante del protector del gatillo.\r\nLos montajes integrados patentados del alcance, mecanizados directamente en el receptor de acero sólido, proporcionan una superficie de montaje estable para los anillos del alcance, eliminando una fuente potencial de flojedad e inexactitud en el campo$55,520');";

}


