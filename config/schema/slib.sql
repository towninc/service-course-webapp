USE slib;

CREATE TABLE libraries(
    id INT NOT NULL,
    name VARCHAR(20) NOT NULL,
    category VARCHAR(20) NOT NULL,
    address VARCHAR(100) NOT NULL,
    latitude FLOAT NOT NULL,
    longitude FLOAT NOT NULL,
    PRIMARY KEY (id)
);