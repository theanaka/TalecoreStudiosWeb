create table SlideshowImage(
  Id int not null primary key auto_increment,
  ImageId int not null,
  SortOrder int not null,
  Foreign key(ImageId) references Image(Id)
);