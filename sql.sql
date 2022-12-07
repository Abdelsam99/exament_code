create TABLE localite(
    codelocalite CHAR(3),
    nomlocalite VARCHAR(25),
    primary key (codelocalite)
);
create TABLE projet(
    codeprojet CHAR(3),
    nomprojet VARCHAR(25) NOT NULL,
    datelancement DATE not NULL,
    duree VARCHAR(10),
    codelocalite char(5) not null,
    primary key (codeprojet),
    foreign key(codelocalite) references localite(codelocalite)
);
create TABLE suivi(
    numsuivi int AUTO_INCREMENT PRIMARY KEY,
    datesuivi DATE NOT NULL,
    pourcentage CHAR(5) not NULL,
    codeprojet CHAR(3) NOT NULL,
    foreign key(codeprojet) references projet(codeprojet)
);