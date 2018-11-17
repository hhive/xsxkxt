CREATE TABLE Student(
    sno varchar(20) not null PRIMARY KEY,
    sname varchar(20) not null,
    spassword varchar(20) NOT null,
    sage varchar(20),
    ssex varchar(20)
    pro varchar(20))default charset = utf8;
 CREATE TABLE Teacher( tno varchar(20) not null PRIMARY KEY, tname varchar(20) not null, tpassword varchar(20) NOT null, tage varchar(20), tsex varchar(20))default charset = utf8;
 CREATE TABLE Course(cno varchar(20) not null PRIMARY KEY, cname varchar(20) not null, position varchar(20) NOT null, tno varchar(20), time varchar(20),FOREIGN KEY(tno) REFERENCES teacher(tno))default charset = utf8;
 CREATE TABLE CCourse(sno varchar(20) not null ,cno varchar(20) not null , PRIMARY KEY(sno,cno),FOREIGN KEY(sno) REFERENCES student(sno),FOREIGN KEY(cno) REFERENCES course(cno))default charset = utf8;
 CREATE TABLE Score(sno varchar(20) not null ,cno varchar(20) not null , grade varchar(20)not null, PRIMARY KEY(sno,cno),FOREIGN KEY(sno) REFERENCES student(sno),FOREIGN KEY(cno) REFERENCES course(cno))default charset = utf8;
 
 insert into student (sno,sname,spassword,sage,ssex,pro) values('001','li1','123','20','男','计算机');
 insert into student (sno,sname,spassword,sage,ssex,pro) values('002','li2','123','21','男','计算机');
 insert into student (sno,sname,spassword,sage,ssex,pro) values('003','li2','123','21','女','计算机');
 	INSERT INTO `teacher` (`tno`, `tname`, `tpassword`, `tage`, `tsex`) VALUES ('101', 'w1', '123', '42', '女'), ('102', 'w2', '123', '30', '男');
 	INSERT INTO `score` (`sno`, `cno`, `grade`) VALUES ('001', '01', '85'), ('002', '02', '92'), ('003', '01', '86');
 	