-- Active: 1748684265432@@localhost@3306


DROP TABLE IF EXISTS category;
CREATE TABLE category (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL
)ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO category (name) VALUES  ("music"),("tecktonik"),("skate");

DROP TABLE IF EXISTS publication;
CREATE TABLE publication (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    img_url VARCHAR(255),
    content TEXT ,
    category_id INT NOT NULL,
    Foreign Key (category_id) REFERENCES category(id)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO publication (title,img_url,content,category_id) VALUES
("musikemo","assets/publications_img/punkette.jpg","Mwa chui Faustine une émo trop dark kisifrot6pik",1),
("tkkiller","assets/publications_img/tecktonik-ravelations.jpg","KI veu vnir battle avec ns les pd",2),
("sk8 4 life","assets/publications_img/emo-skater.jpg","Ma vi c le sk8 et sourir à la mor",3);

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
