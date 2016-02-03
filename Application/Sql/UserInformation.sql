create table UserInformation(
  Id int not null primary key auto_increment,
  UserId int not null,
  Content varchar(32767),
  SortOrder int,
  Foreign key(UserId) references User(Id)
);

