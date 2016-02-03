create table User (
	Id int primary key auto_increment,
	Username varchar(256),
	PasswordHash varchar(256),
	PasswordSalt varchar(256),
	DisplayName varchar(256),
	UserLevel int,
	ImageId int null,
	IsInactive int(1),
	IsDeleted int(1)
);

