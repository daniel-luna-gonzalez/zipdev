CREATE TABLE IF NOT EXISTS zipdev(
            id int not null AUTO_INCREMENT,
            names VARCHAR(45) NOT NULL,
            surnames VARCHAR(45) NOT NULL,
            phones JSON,
            emails JSON,
            photoPath TEXT,
        ) ENGINE = MYISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
