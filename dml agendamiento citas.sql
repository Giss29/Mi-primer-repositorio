select *from paciente;
select *from medico;
select *from especialidades;
select *from categoria_cita;
select *from medico_especialidad;
select *from citas;

insert into paciente 
values
(12345,"maria","perez",2121212121,"maria@gmail.com","O+","femenino"),
(67891,"juan","castro",3232323232,"juan@gmail.com","A-","masculino"),
(23456,"valentina","suarez",4545454545,"valentina@gmail.com","O-","femenino");

insert into medico
values
(30204,"julian","velez","masculino",5757575757,"julian@hotmail.com"),
(46753,"sara","soto","femenino",8787878787,"sara@hotmail.com"),
(30105,"sofia","jimenez","femenino",9898989898,"sofia@hotmail.com");

insert into especialidades
values
(87096,"analisis clinico"),
(40648,"Cirugía oral y maxilofacial"),
(98765,"aplicar inyecciones");

insert into categoria_cita
values
(87096,"medicina general","dar diagnosticos y tratamientos"),
(40648,"odontologia","operar dientes"),
(98765,"enfermeria","ayudar a mejorarse");

insert into medico_especialidad
values
(30204,87096),
(46753,40648),
(30204,98765);

insert into citas
values
(78654,"2020-10-09","10:30",87096,12345,30204),
(67549,"2030-08-30","1:30",40648,67891,46753),
(98504,"2011-12-25","3:50",98765,23456,30204);

select *from paciente where celular_paciente > 31437374;
select *from paciente where celular_paciente < 3121273281;
select *from paciente where celular_paciente = 4545454545;

select *from citas where day(fecha_cita) between 09 and 25;
select *from citas where month(fecha_cita) =10;
select *from citas where year(fecha_cita) > 2000;

SELECT
    m.id_medico,
    m.nombre_medico,
    m.apellido_medico,
    m.genero_medico,
    m.celular_medico,
    m.email_medico,
    e.nombre_especialidad AS especialidad
FROM medico m
INNER JOIN medico_especialidad me ON m.id_medico = me.iden_medic
INNER JOIN especialidades e ON me.iden_especiali = e.id_especialidad;

select *from paciente;
call insert_paciente(56789,"Laura","Ramirez",3142687873,"A+","Femenino");
call select_paciente(3133108647);   
call update_paciente(89876,3142687873);

select *from medico;
call insert_medico(67986,"carlos","paez","masculino",3245676893,"carlos@gmail.com");
call select_medico("femenino");
call update_medico(67986,"felipe@gmail.com");
