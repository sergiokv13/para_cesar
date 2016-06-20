CREATE DATABASE IF NOT EXISTS examenFinalDB;

USE examenFinalDB;


CREATE TABLE `users` (
 `id` integer NOT NULL AUTO_INCREMENT,
 `username` varchar(20) NOT NULL,
 `name` varchar(20) NOT NULL,
 `lastname` varchar(20) NOT NULL,
 `rol` integer NOT NULL,
 `password` varchar(100) NOT NULL,
 `active` boolean NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `days` (
 `id` integer NOT NULL AUTO_INCREMENT,
 `date` date NOT NULL,
 `finished` boolean NOT NULL,
 `deadline` boolean NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `tasks` (
 `id` integer NOT NULL AUTO_INCREMENT,
 `name` varchar(20) NOT NULL,
 `day_id` integer NOT NULL,
 `user_id` integer NOT NULL,
 `percentage` integer NOT NULL,
 `finished` boolean NOT NULL,
 `start` boolean NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE `sub_tasks` (
 `id` integer NOT NULL AUTO_INCREMENT,
 `name` varchar(20) NOT NULL,
 `task_id` integer NOT NULL,
 `finished` boolean NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `notes` (
 `id` integer NOT NULL AUTO_INCREMENT,
 `note` varchar(1000) NOT NULL,
 `task_id` integer NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE `task_times` (
 `id` integer NOT NULL AUTO_INCREMENT,
 `task_id` integer NOT NULL,
 `start` boolean NOT NULL,
 `time` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


/*USUARIOS*/
insert into users (username,name,lastname,active,password,rol) values ('steve','steve','rogers', '1', MD5('supersecret'),2);
insert into users (username,name,lastname,active,password,rol) values ('mike','mike','tyson', '1', MD5('supersecret'),2);
insert into users (username,name,lastname,active,password,rol) values ('colds','ice','cold', '1', MD5('supersecret'),2);
insert into users (username,name,lastname,active,password,rol) values ('bob','bob','sinclair','1',  MD5('supersecret'),1);


/*DIAS*/
insert into days (date,finished,deadline) values ('16-06-08 10:34:09 AM','1','0');
insert into days (date,finished,deadline) values ('16-06-07 10:34:09 AM','1','0');
insert into days (date,finished,deadline) values ('16-06-06 10:34:09 AM','1','0');
insert into days (date,finished,deadline) values ('16-06-05 10:34:09 AM','1','0');
insert into days (date,finished,deadline) values ('16-06-04 10:34:09 AM','1','0');
insert into days (date,finished,deadline) values ('16-06-03 10:34:09 AM','1','0');

/*TAREAS*/
	/*STEVE*/
		/*Tasks*/
		insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day8','1','1','100','1','0');
		insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day8','1','1','100','1','0');

		insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day7','2','1','100','1','0');
		insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day7','2','1','100','1','0');
		
		insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day5','4','1','100','1','0');
		insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day5','4','1','100','1','0');
	
		insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day4','5','1','100','1','0');
		insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day4','5','1','100','1','0');

		insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day3','6','1','100','1','0');
		insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day3','6','1','100','1','0');
			/*Notes*/
			insert into notes (note,task_id) values ('Note','1');
			insert into notes (note,task_id) values ('Note','2');

			insert into notes (note,task_id) values ('Note','3');
			insert into notes (note,task_id) values ('Note','4');
			
			insert into notes (note,task_id) values ('Note','5');
			insert into notes (note,task_id) values ('Note','6');
		
			insert into notes (note,task_id) values ('Note','7');
			insert into notes (note,task_id) values ('Note','8');

			insert into notes (note,task_id) values ('Note','9');
			insert into notes (note,task_id) values ('Note','10');
			/*SubTasks*/
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','1','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','1','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','2','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','2','1');
		
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','3','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','3','1');
	
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','4','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','4','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','5','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','5','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','6','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','6','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','7','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','7','1');
		
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','8','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','8','1');
	
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','9','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','9','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','10','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','10','1');


				/*Timing*/
				insert into task_times(task_id,start,time) values('1','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('1','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('2','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('2','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('3','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('3','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('4','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('4','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('5','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('5','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('6','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('6','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('7','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('7','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('8','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('8','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('9','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('9','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('10','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('10','0','16-06-08 11:00:35 AM');
	/*MIKE*/
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day8','1','2','100','1','0');
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day8','1','2','100','1','0');
	
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day7','2','2','100','1','0');
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day7','2','2','100','1','0');

	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day5','4','2','100','1','0');
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day5','4','2','100','1','0');

	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day4','5','2','100','1','0');
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day4','5','2','100','1','0');

	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day3','6','2','100','1','0');
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day3','6','2','100','1','0');
			/*Notes*/
			insert into notes (note,task_id) values ('Note','11');
			insert into notes (note,task_id) values ('Note','12');

			insert into notes (note,task_id) values ('Note','13');
			insert into notes (note,task_id) values ('Note','14');
			
			insert into notes (note,task_id) values ('Note','15');
			insert into notes (note,task_id) values ('Note','16');
		
			insert into notes (note,task_id) values ('Note','17');
			insert into notes (note,task_id) values ('Note','18');

			insert into notes (note,task_id) values ('Note','19');
			insert into notes (note,task_id) values ('Note','20');
			/*SubTasks*/
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','11','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','11','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','12','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','12','1');
		
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','13','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','13','1');
	
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','14','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','14','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','15','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','15','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','16','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','16','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','17','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','17','1');
		
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','18','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','18','1');
	
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','19','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','19','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','20','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','20','1');

			/*Timing*/
				insert into task_times(task_id,start,time) values('11','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('11','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('12','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('12','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('13','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('13','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('14','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('14','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('15','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('15','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('16','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('16','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('17','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('17','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('18','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('18','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('19','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('19','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('20','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('20','0','16-06-08 11:00:35 AM');

	/*COLDS*/
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day8','1','3','100','1','0');
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day8','1','3','100','1','0');
	
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day7','2','3','100','1','0');
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day7','2','3','100','1','0');

	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day6','3','3','100','1','0');
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day6','3','3','100','1','0');
	
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day4','4','3','100','1','0');
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day4','4','3','100','1','0');

	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task1Day3','5','3','100','1','0');
	insert into tasks (name,day_id,user_id,percentage,finished,start) values ('Task2Day3','5','3','100','1','0');
			/*Notes*/
			insert into notes (note,task_id) values ('Note','21');
			insert into notes (note,task_id) values ('Note','22');

			insert into notes (note,task_id) values ('Note','23');
			insert into notes (note,task_id) values ('Note','24');
			
			insert into notes (note,task_id) values ('Note','25');
			insert into notes (note,task_id) values ('Note','26');
		
			insert into notes (note,task_id) values ('Note','27');
			insert into notes (note,task_id) values ('Note','28');

			insert into notes (note,task_id) values ('Note','29');
			insert into notes (note,task_id) values ('Note','30');
			/*SubTasks*/

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','21','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','21','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','22','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','22','1');
		
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','23','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','23','1');
	
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','24','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','24','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','25','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','25','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','26','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','26','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','27','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','27','1');
		
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','28','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','28','1');
	
			insert into sub_tasks (name,task_id,finished) values ('SubTask1','29','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','29','1');

			insert into sub_tasks (name,task_id,finished) values ('SubTask1','30','1');
			insert into sub_tasks (name,task_id,finished) values ('SubTask2','30','1');

				/*Timing*/
				insert into task_times(task_id,start,time) values('21','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('21','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('22','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('22','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('23','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('23','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('24','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('24','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('25','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('25','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('26','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('26','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('27','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('27','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('28','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('28','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('29','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('29','0','16-06-08 11:00:35 AM');

				insert into task_times(task_id,start,time) values('30','1','16-06-08 10:30:00 AM');
				insert into task_times(task_id,start,time) values('30','0','16-06-08 11:00:35 AM');




