-- Active: 1748684265432@@localhost@3306@skyrock_db


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
    creation_date DATETIME NOT NULL,
    last_update_time DATETIME ,
    comment_count INT,
    category_id INT NOT NULL,
    Foreign Key (category_id) REFERENCES category(id)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO publication (title,img_url,content,creation_date,comment_count,category_id) VALUES
("musikemo","assets/publications_img/punkette.jpg","Mwa chui Faustine une émo trop dark kisifrot6pik",NOW(),0,1),
("tckiller","assets/publications_img/tecktonik-ravelations.jpg","On fout la mrd en battle mais osef on est des tck killers",NOW(),0,2),
("sk8 4 life","assets/publications_img/emo-skater.jpg","Ma vi c le sk8 et sourir à la mor",NOW(),0,3);

DROP TABLE IF EXISTS comment;
CREATE TABLE comment (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_name TEXT NOT NULL,
    content TEXT NOT NULL,
    creation_date DATETIME NOT NULL,
    publication_id INT NOT NULL,
    Foreign Key (publication_id) REFERENCES publication(id)
)ENGINE=INNODB DEFAULT CHARSET=utf8;


