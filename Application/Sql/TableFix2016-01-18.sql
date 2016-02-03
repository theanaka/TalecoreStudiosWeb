alter table newspost add column ImageId int null;
alter table newspost add foreign key (ImageId) references Image(Id);
alter table userinformation add column Title varchar(512);