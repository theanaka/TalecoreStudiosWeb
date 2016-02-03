create table GameYoutubeLink(
	Id int not null primary key auto_increment,
	YoutubeLink varchar(512),
	DisplayName varchar(512),
	ImageId int not null,
	GameId int not null,
	Foreign key(ImageId) references Image(Id),
	Foreign key(GameId) references Game(Id)
);