CREATE vista_convenios_nacionales AS select `sc`.`nom_carrera` AS `nom_carrera`, `sc`.`image_url` AS `image_url`,count(`tabla1`.`nombre_convenio`) AS `convenios` from (`relaciones`.`sic_carrera` `sc` left join (select `scc`.`id_carrera` AS `id_carrera`,`scon`.`nombre_convenio` AS `nombre_convenio` from ((`relaciones`.`sic_convenio` `scon` join `relaciones`.`sic_tipo_convenio` `stc` on((`scon`.`id_tipo_convenio` = `stc`.`id_tipo_convenio`))) join `relaciones`.`sic_convenio_carrera` `scc` on((`scc`.`id_convenios` = `scon`.`id_convenios`))) where ((`stc`.`nombre_tipo_convenio` = 'Nacionales') and (`scon`.`estado` = 'Activo'))) `tabla1` on((`tabla1`.`id_carrera` = `sc`.`id_carrera`))) group by `sc`.`nom_carrera`, `sc`.`image_url`;
ALTER TABLE relaciones.sic_carrera MODIFY image_url TEXT(200)     COMMENT 'imagenes de la carrera con su logo';
DELETE from sic_carrera where id_carrera = 8;
UPDATE sic_carrera SET image_url = '/carreras_logo/ingenieria_sistemas.png' WHERE id_carrera = 1;
UPDATE sic_carrera SET image_url = '/carreras_logo/ing_electrica.jpg' WHERE id_carrera = 2;
UPDATE sic_carrera SET image_url = '/carreras_logo/ing_textil.jpg' WHERE id_carrera = 3;
UPDATE sic_carrera SET image_url = '/carreras_logo/ingenieria_civil.jpg' WHERE id_carrera = 4;
UPDATE sic_carrera SET image_url = '/carreras_logo/trabajo_social.jpg' WHERE id_carrera = 7;
UPDATE sic_carrera SET image_url = '/carreras_logo/ingenieria_ambiental.jpg' WHERE id_carrera = 8;
UPDATE sic_carrera SET image_url = '/carreras_logo/derecho.jpg' WHERE id_carrera = 9;
UPDATE sic_carrera SET image_url = '/carreras_logo/upea.png' WHERE id_carrera = 10;
UPDATE sic_carrera SET image_url = '/carreras_logo/arquitectura.jpg' WHERE id_carrera = 11;
UPDATE sic_carrera SET image_url = '/carreras_logo/medicina.jpg' WHERE id_carrera = 14;
UPDATE sic_carrera SET image_url = '/carreras_logo/ciencias_pecuarias.jpg' WHERE id_carrera = 15;
UPDATE sic_carrera SET image_url = '/carreras_logo/administracion_empresas.jpg' WHERE id_carrera = 16;
UPDATE sic_carrera SET image_url = '/carreras_logo/upea.png' WHERE id_carrera = 17;
UPDATE sic_carrera SET image_url = '/carreras_logo/contaduria.jpg' WHERE id_carrera = 18;
UPDATE sic_carrera SET image_url = '/carreras_logo/agronomia.jpg' WHERE id_carrera = 19;
UPDATE sic_carrera SET image_url = '/carreras_logo/derecho.jpg' WHERE id_carrera = 20;
UPDATE sic_carrera SET image_url = '/carreras_logo/comunicacion_social.png' WHERE id_carrera = 21;
UPDATE sic_carrera SET image_url = '/carreras_logo/economia.png' WHERE id_carrera = 22;
UPDATE sic_carrera SET image_url = '/carreras_logo/ingenieria_ambiental.jpg' WHERE id_carrera = 23;
UPDATE sic_carrera SET image_url = '/carreras_logo/medicina_veterinaria.jpg' WHERE id_carrera = 24;
UPDATE sic_carrera SET image_url = '/carreras_logo/ingenieria_zootecnia.jpg' WHERE id_carrera = 25;
UPDATE sic_carrera SET image_url = '/carreras_logo/ciencias_salud.jpg' WHERE id_carrera = 26;
UPDATE sic_carrera SET image_url = '/carreras_logo/arquitectura.jpg' WHERE id_carrera = 27;
UPDATE sic_carrera SET image_url = '/carreras_logo/enfermeria.jpg' WHERE id_carrera = 28;


#17 de marzo SIE 
CREATE VIEW vista_convenios_internacionales AS select `sc`.`id_carrera`, `sc`.`nom_carrera` AS `nom_carrera`, `sc`.`image_url` AS `image_url`,count(`tabla1`.`nombre_convenio`) AS `convenios` from (`relaciones`.`sic_carrera` `sc` left join (select `scc`.`id_carrera` AS `id_carrera`,`scon`.`nombre_convenio` AS `nombre_convenio` from ((`relaciones`.`sic_convenio` `scon` join `relaciones`.`sic_tipo_convenio` `stc` on((`scon`.`id_tipo_convenio` = `stc`.`id_tipo_convenio`))) join `relaciones`.`sic_convenio_carrera` `scc` on((`scc`.`id_convenios` = `scon`.`id_convenios`))) where ((`stc`.`nombre_tipo_convenio` = 'Internacionales') and (`scon`.`estado` = 'Activo'))) `tabla1` on((`tabla1`.`id_carrera` = `sc`.`id_carrera`))) group by `sc`.`id_carrera`, `sc`.`nom_carrera`, `sc`.`image_url`;
#editar la vista de nacionales
CREATE vista_convenios_nacionales AS select `sc`.`id_carrera`,`sc`.`nom_carrera` AS `nom_carrera`, `sc`.`image_url` AS `image_url`,count(`tabla1`.`nombre_convenio`) AS `convenios` from (`relaciones`.`sic_carrera` `sc` left join (select `scc`.`id_carrera` AS `id_carrera`,`scon`.`nombre_convenio` AS `nombre_convenio` from ((`relaciones`.`sic_convenio` `scon` join `relaciones`.`sic_tipo_convenio` `stc` on((`scon`.`id_tipo_convenio` = `stc`.`id_tipo_convenio`))) join `relaciones`.`sic_convenio_carrera` `scc` on((`scc`.`id_convenios` = `scon`.`id_convenios`))) where ((`stc`.`nombre_tipo_convenio` = 'Nacionales') and (`scon`.`estado` = 'Activo'))) `tabla1` on((`tabla1`.`id_carrera` = `sc`.`id_carrera`))) group by `sc`.`id_carrera`, `sc`.`nom_carrera`, `sc`.`image_url`

#14 de Abril agregando nueva columna de token 
ALTER TABLE relaciones.sic_usuario ADD login_token TEXT;

#17 DE ABRIL, se modifica la columna de password a texto
ALTER TABLE relaciones.sic_usuario MODIFY password TEXT;


#9 de mayo
ALTER TABLE relaciones.sic_convenio ADD correlativo VARCHAR(50);

#14 de mayo
ALTER TABLE relaciones.sic_usuario ADD ultima_vez DATETIME;