create table GameImage(
	Id int not null primary key auto_increment,
	GameId int not null,
	ImageId int not null,
	Foreign Key(GameId) references Game(id),
	Foreign Key(ImageId) references Image(Id)
);
