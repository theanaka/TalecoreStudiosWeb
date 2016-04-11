create table coverimage (
  Id int primary key auto_increment,
  Identifier varchar(512),
  ImageId int not null,
  foreign key(ImageId) references Image(Id)
);