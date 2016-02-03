create table Image(
	Id int primary key auto_increment,
	`Name` varchar(512),
	Path varchar(512),
	Alt varchar(512),
	FileName varchar(512),
	`Timestamp` varchar(64),
	MimeType varchar(512),
	IsDeleted int(1)
);