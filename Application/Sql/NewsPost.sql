create table NewsPost(
	Id int not null primary key auto_increment,
	Title varchar(512),
	Content varchar(32767),
	PostTimeStamp dateTime,
	AuthorId int,
	Foreign key(AuthorId) references User(Id)
);