CREATE TABLE db_perpus.tbl_kategori (
    id int auto_increment NOT NULL PRIMARY key,
    name varchar(100) NOT NULL,
    `desc` varchar(100) NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

CREATE UNIQUE INDEX tbl_kategori_id_IDX USING BTREE ON db_perpus.tbl_kategori (id);

CREATE TABLE db_perpus.tbl_penerbit (
    id int auto_increment NOT NULL PRIMARY KEY,
    title varchar(100) NOT NULL,
    pub_year DATE NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;

CREATE TABLE db_perpus.tbl_buku (
    id int NOT NULL AUTO_INCREMENT PRIMARY key,
    title varchar(255) NOT NULL,
    pub_year varchar(6) NOT NULL,
    category_id int NOT NULL,
    publisher_id int NOT NULL,
    isbn varchar(255) NOT NULL,
    writer varchar(255) NOT NULL,
    FOREIGN KEY (category_id) REFERENCES tbl_kategori(id),
    FOREIGN KEY (publisher_id) REFERENCES tbl_penerbit(id)
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_swedish_ci;