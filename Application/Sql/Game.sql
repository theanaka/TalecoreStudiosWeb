create table Game(
	Id int not null auto_increment primary key,
	Title varchar(512),
	NavigationTitle varchar(512),
	Content varchar(32768),
	ImageId int,
	IsActive int(1),
	IsDeleted int(1),
	Foreign key(ImageId) references Image(Id)
);
