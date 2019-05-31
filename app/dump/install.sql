CREATE TABLE IF NOT EXISTS phoneBook(
            id int AUTO_INCREMENT,
            names VARCHAR(45) NOT NULL,
            surnames VARCHAR(45) NOT NULL,
            phones JSON,
            emails JSON,
            photoPath TEXT,
            full TEXT,
            created_at timestamp,
            updated_at timestamp,
            PRIMARY KEY (id)
            ) ENGINE = MYISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
