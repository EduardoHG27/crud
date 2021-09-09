DROP TABLE dat_acu; CREATE TABLE `dat_acu` (
  `ID_COMP_ACU` int(11) NOT NULL,
  `NO_CUENTA_ACU` int(11) NOT NULL,
  `USOSOL_ACU` varchar(1) DEFAULT NULL,
  `TIPO_DOCTO_ACU` varchar(3) NOT NULL,
  `NO_RECIBO_ACU` int(11) NOT NULL,
  `IMPORTE_TOTAL_ACU` decimal(15,2) NOT NULL,
  `IMPORTE_VENCIDO_ACU` decimal(15,2) DEFAULT NULL,
  `IMPORTE_MES_ACU` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`ID_COMP_ACU`,`NO_CUENTA_ACU`,`TIPO_DOCTO_ACU`,`NO_RECIBO_ACU`,`IMPORTE_TOTAL_ACU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; INSERT INTO dat_acu VALUES("1","0","S","FAC","6","716.00","0.00","716.00"); 
 INSERT INTO dat_acu VALUES("1","0","S","FAC","8","811.00","0.00","811.00"); 
 INSERT INTO dat_acu VALUES("1","0","S","FAC","9","976.00","0.00","976.00"); 
 INSERT INTO dat_acu VALUES("1","2","S","FAC","7","31.00","0.00","31.00"); 
 INSERT INTO dat_acu VALUES("1","2","S","FAC","8","61.00","0.00","61.00"); 
 INSERT INTO dat_acu VALUES("1","2","S","FAC","9","900.00","0.00","900.00"); 
 INSERT INTO dat_acu VALUES("1","3","S","FAC","10","870.00","0.00","870.00"); 
 INSERT INTO dat_acu VALUES("1","3","S","FAC","11","333.00","0.00","333.00"); 
 INSERT INTO dat_acu VALUES("1","7","S","FAC","14","3100.00","0.00","3100.00"); 
 INSERT INTO dat_acu VALUES("1","9","S","FAC","4","1835.00","0.00","1835.00"); 
 INSERT INTO dat_acu VALUES("1","9","S","FAC","5","1575.00","0.00","1575.00"); 
 INSERT INTO dat_acu VALUES("1","9","S","FAC","10","717.00","0.00","717.00"); 
 INSERT INTO dat_acu VALUES("1","9","S","FAC","11","300.00","0.00","300.00"); 
 INSERT INTO dat_acu VALUES("1","28","S","FAC","12","413.00","0.00","413.00"); 
 INSERT INTO dat_acu VALUES("1","28","S","FAC","13","6.00","0.00","6.00"); 
 INSERT INTO dat_acu VALUES("1","28","S","FAC","14","168.00","0.00","168.00"); 
 INSERT INTO dat_acu VALUES("1","29","S","FAC","15","1150.00","0.00","1150.00"); 
 INSERT INTO dat_acu VALUES("1","30","S","FAC","16","850.00","0.00","850.00"); 
 INSERT INTO dat_acu VALUES("1","31","S","FAC","17","850.00","0.00","850.00"); 
 INSERT INTO dat_acu VALUES("1","32","S","FAC","18","301.00","0.00","301.00"); 
 
DROP TABLE dat_padron; CREATE TABLE `dat_padron` (
  `ID_COMP1` int(11) NOT NULL,
  `NO_CUENTA_USUARIO` int(11) NOT NULL,
  `NO_SOLICITUD_USUARIO` int(11) DEFAULT NULL,
  `ID_STATUS_USUARIO` varchar(1) DEFAULT NULL,
  `BAN_USU_CLIE` varchar(1) DEFAULT NULL,
  `ID_TARIFA_USUARIO` int(11) DEFAULT NULL,
  `DESC_TARIFA_USUARIO` varchar(15) DEFAULT NULL,
  `ID_SERVICIO_USUARIO` varchar(7) DEFAULT NULL,
  `ID_TIPO_FACTURACION` varchar(1) DEFAULT NULL,
  `ID_GIRO_VIV_USUARIO` int(11) DEFAULT NULL,
  `DESC_GIRO_VIV_USUARIO` varchar(50) DEFAULT NULL,
  `ID_SUBSIDIO_USUARIO` int(11) DEFAULT NULL,
  `DESC_SUBSIDIO_USUARIO` varchar(70) DEFAULT NULL,
  `NOMBRE_USUARIO` varchar(70) DEFAULT NULL,
  `RAZON_SOCIAL_USUARIO` varchar(256) DEFAULT NULL,
  `REPRES_LEGAL_USUARIO` varchar(60) DEFAULT NULL,
  `DOMICILIO_USUARIO` varchar(80) DEFAULT NULL,
  `PAIS_USUARIO` varchar(50) DEFAULT NULL,
  `ESTADO_USUARIO` varchar(50) DEFAULT NULL,
  `MUNICIPIO_USUARIO` varchar(50) DEFAULT NULL,
  `COMOLOCAL_USUARIO` varchar(50) DEFAULT NULL,
  `COLONIA_USUARIO` varchar(60) DEFAULT NULL,
  `CALLE_USUARIO` varchar(60) DEFAULT NULL,
  `COD_POS_USUARIO` int(11) DEFAULT NULL,
  `LATITUD_USUARIO` varchar(21) DEFAULT NULL,
  `LONGITUD_USUARIO` varchar(21) DEFAULT NULL,
  `REFERENCIA_DOMICILIO_USUARIO` varchar(60) DEFAULT NULL,
  `FECHA_SOLICITUD_USUARIO` date DEFAULT NULL,
  `FECHA_ALTA_USUARIO` date DEFAULT NULL,
  `FECHA_BAJA_USUARIO` date DEFAULT NULL,
  `RFC_USUARIO` varchar(15) DEFAULT NULL,
  `CURP_USUARIO` varchar(20) DEFAULT NULL,
  `EMAIL_USUARIO` varchar(25) DEFAULT NULL,
  `TELEFONO1_USUARIO` varchar(25) DEFAULT NULL,
  `TELEFONO2_USUARIO` varchar(25) DEFAULT NULL,
  `SECTOR_LECTURA` int(11) DEFAULT NULL,
  `ID_RUTA_LECTURA_USUARIO` int(11) DEFAULT NULL,
  `FOLIO_LECTURA_USUARIO` int(11) DEFAULT NULL,
  `ID_DIAMETRO_TOMA` int(11) DEFAULT NULL,
  `DESC_DIAMETRO_TOMA` varchar(10) DEFAULT NULL,
  `ID_MARCA_MEDIOR_USUARIO` int(11) DEFAULT NULL,
  `DESC_MARCA_MEDIDOR_USUARIO` varchar(20) DEFAULT NULL,
  `NO_SERIE_MEDIDOR` varchar(10) DEFAULT NULL,
  `NO_DIGIT_MEDIDOR` int(11) DEFAULT NULL,
  `USUAR_CONFIDENCIAL` varchar(1) DEFAULT NULL,
  `FACT_OTRO` varchar(1) DEFAULT NULL,
  `CON_FRACC` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`ID_COMP1`,`NO_CUENTA_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4; INSERT INTO dat_padron VALUES("1","1","1","A","U","1","Prueba","Prueba","A","1","Prueba_Giro","1","Prueba_SUBSIDIO_USUARIO","Eduardo","Prueba_Razon","Prueba_Legal","Prueba_Domicilio","Prueba_Pais","Prueba_Estado","Prueba_Municipio","Prueba_Com_Loc","Prueba_Usuario","Prueba_Calle","43612","Prueba_lat","Prueba_lon","Prueba_Domicilio","2020-10-01","2020-10-02","2020-10-03","Prueba_RFC","Prueba_CURP","Prueba_EMAIL","7717003488","7717113438","1","1","1","1","prueba_dia","1","prueba_medidor","1","1","1","1","1"); 
 INSERT INTO dat_padron VALUES("1","3","7","B","U","1","31","","","32","33","0","","Adios","","","","","Jalisco","Unión de Tula","Adios8","","Adios6","0","","","","0000-00-00","0000-00-00","0000-00-00","Adios4","Adios3","Adios5","","","0","0","0","0","","0","","","0","","",""); 
 INSERT INTO dat_padron VALUES("1","10","9","A","C","1","2","","","3","4","0","","Eduardo","","","","","Hidalgo","Tulancingo de Bravo","Tulancingo","","Centro","0","","","","0000-00-00","0000-00-00","0000-00-00","EHG221292","EHG221292","eduardo@gmail.com","","","0","0","0","0","","0","","","0","","",""); 
 INSERT INTO dat_padron VALUES("1","11","9","A","C","1","2","","","3","4","0","","Eduardo","","","","","Hidalgo","Tulancingo de Bravo","Tulancingo","","Centro","0","","","","0000-00-00","0000-00-00","0000-00-00","EHG221292","EHG221292","eduardo@gmail.com","","","0","0","0","0","","0","","","0","","",""); 
 INSERT INTO dat_padron VALUES("1","13","28","B","C","2","77","","","77","77","0","","77","","","","","Distrito Federal","Coyoacán","77","","77","77","","","","0000-00-00","0000-00-00","0000-00-00","77","77","77","","","0","0","0","0","","0","","","0","","",""); 
 INSERT INTO dat_padron VALUES("1","16","29","A","C","2","20","","","20","20","0","","Mario","","","","","Hidalgo","Tulancingo de Bravo","Tulancingo","","Hidalgo","43612","","","","0000-00-00","0000-00-00","0000-00-00","NMJDH451245","NMJDH451245HHGRT20","marsamto@gmail.com","","","0","0","0","0","","0","","","0","","",""); 
 INSERT INTO dat_padron VALUES("1","17","30","A","U","2","10","","","20","20","0","","Rodrigo","","","","","Hidalgo","Tulancingo de Bravo","Tulancingo","","Marcopolo","43612","","","","0000-00-00","0000-00-00","0000-00-00","HGDHSY4251","HGDHSY4251","rodrigo","","","0","0","0","0","","0","","","0","","",""); 
 INSERT INTO dat_padron VALUES("1","18","31","A","U","3","20","","","30","40","0","","Ricardo","","","","","Hidalgo","Pachuca de Soto","Pachuca","","Av. de los cisnes","42083","","","","0000-00-00","0000-00-00","0000-00-00","HHGDHS","HHGDHS56212","ricardp@hotmail.com","","","0","0","0","0","","0","","","0","","",""); 
 INSERT INTO dat_padron VALUES("1","24","32","A","C","3","12","","","12","12","0","","Pablo","","","","","Distrito Federal","Coyoacán","D.F.","","Churubusco","4200","","","","0000-00-00","2020-12-14","0000-00-00","HGSHAJ85854","HGSHAJ85854hfh","pablo3jo@gmail.com","","","0","0","0","0","","0","","","0","","",""); 
 INSERT INTO dat_padron VALUES("1","25","31","A","U","3","20","","","30","40","","","Ricardo","","","","","Hidalgo","Pachuca de Soto","Pachuca","","Av. de los cisnes","42083","","","","","2020-12-17","","HHGDHS","HHGDHS56212","ricardp@hotmail.com","","","","","","","","","","","","","",""); 
 
