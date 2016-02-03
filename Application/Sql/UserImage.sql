create table UserImage(
  Id int primary key not null auto_increment,
  UserId int not null,
  ImageId int null,
  foreign key(UserId) references User(Id),
  foreign key(ImageId) references Image(Id)
);
    