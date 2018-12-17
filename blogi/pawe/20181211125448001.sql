
begin;

create table historia (
	idzamowienia integer primary key,
	idklienta varchar(10) not null,
	idkompozycji char(5) not null,
	cena numeric(7,2) not null,
	termin date not null
);

create table klienci (
	idklienta varchar(10) primary key,
	haslo varchar(10) check (LENgth(haslo)>=4),
	nazwa varchar(40) not null,
	miasto varchar(40) not null,
	kod char(6) not null,
	adres varchar(40) not null,
	email varchar(40),
	telefon	varchar(16) not null,
	fax varchar(16),	
	nip char(16),
	regon char(9)
);

create table kompozycje (
	idkompozycji char(5) primary key,
	nazwa varchar(40) not null,
	opis varchar(100),
	cena numeric(10,2) check (cena>=40.00),
	minimum integer,
	stan integer
);

create table odbiorcy (
	idodbiorcy serial primary key,
	nazwa varchar(40) not null,
	miasto varchar(40) not null,
	kod char(6) not null,
	adres varchar(40) not null
);

create table zamowienia (
	idzamowienia integer primary key,
	idklienta varchar(10) not null references klienci,
	idodbiorcy integer not null references odbiorcy,
	idkompozycji char(5) not null references kompozycje,
	termin date not null,
	cena  numeric(7,2),
	zaplacone bit, 
	uwagi varchar(200)
);

create table zapotrzebowanie (
	idkompozycji char(5),
	data date,	
	primary key(idkompozycji),
	foreign key(idkompozycji) references kompozycje
);

