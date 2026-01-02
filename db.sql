create table categorey (
    id int primary key AUTO_INCREMENT,
    cate_name varchar(100) not null UNIQUE
);
CREATE TABLE pdfs(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(200) not null,
    pdf varchar(200) not null,
    image varchar(200) not null,
    cate_name varchar(100) not null,
    created_at timestamp default current_timestamp,
    FOREIGN KEY (cate_name) REFERENCES categorey(cate_name)

);
create table email (
    id int primary key AUTO_INCREMENT,
    nom varchar(100) not null ,
    email varchar(100) not null 
);
create table Article_categorey (
    id int primary key AUTO_INCREMENT,
    articlecat varchar(100) not null UNIQUE
);
create table article (
    id int primary key AUTO_INCREMENT,
    title varchar(100) not null ,
    text1 varchar(100) not null ,
    text2 varchar(100) not null ,
    image varchar(200) not null,
    articlecat varchar(100) not null,
    created_at timestamp default current_timestamp,
    FOREIGN KEY (articlecat) REFERENCES Article_categorey(articlecat)

);
CREATE Table subscribe(
    id int PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR5(200) NOT NULL,
)

CREATE Table comments(
    id int PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR5(200) NOT NULL,
    comment VARCHAR5(200) NOT NULL,
    idarticle int(200) NOT NULL,
    CONSTRAINT fk FOREIGN KEY (idarticle) REFERENCES article(id)
)