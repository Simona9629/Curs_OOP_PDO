CREATE DATABASE academie;
USE academie;

CREATE OR REPLACE TABLE curs(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nume VARCHAR(100) NOT NULL,
    data_incepere DATE NOT NULL,
    sala TINYINT NOT NULL
);

SELECT * FROM curs;

INSERT INTO curs VALUES
(NULL, 'C++ Fundamentals', '2022-02-23', 6),
(NULL, 'Baze de date SQL', '2022-03-01', 2);

