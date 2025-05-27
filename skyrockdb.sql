-- Active: 1748246424675@@localhost@3306@skyrock_db


DROP TABLE IF EXISTS category;
CREATE TABLE category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS publication;
CREATE TABLE publication (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    img_url VARCHAR(255),
    content TEXT ,
    category_id INT NOT NULL,
    Foreign Key (category_id) REFERENCES category(id)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS comment;
CREATE TABLE comment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_name TEXT NOT NULL,
    content TEXT NOT NULL,
    publication_id INT NOT NULL,
    Foreign Key (publication_id) REFERENCES publication(id)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS reaction;
CREATE TABLE reaction (
    id INT PRIMARY KEY AUTO_INCREMENT,
    img_url VARCHAR(255) NOT NULL,
    name VARCHAR(20) NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS comment_reaction;
CREATE TABLE comment_reaction (
    id INT PRIMARY KEY AUTO_INCREMENT,
    comment_id INT NOT NULL,
    reaction_id INT NOT NULL,
    Foreign Key (comment_id) REFERENCES comment(id),
    Foreign Key (reaction_id) REFERENCES reaction(id)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS publication_reaction;
CREATE TABLE publication_reaction (
    id INT PRIMARY KEY AUTO_INCREMENT,
    publication_id INT NOT NULL,
    reaction_id INT NOT NULL,
    Foreign Key (publication_id) REFERENCES publication(id),
    Foreign Key (reaction_id) REFERENCES reaction(id)
)ENGINE=INNODB DEFAULT CHARSET=utf8;
