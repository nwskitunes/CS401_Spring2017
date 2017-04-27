CREATE TABLE users(
    email VARCHAR(80) NOT NULL PRIMARY KEY,
    password VARCHAR(60) NOT NULL,
    access INTEGER(1)
);

CREATE TABLE venue(
    name VARCHAR(60) NOT NULL,
    address VARCHAR(60) NOT NULL,
    zipcode MEDIUMINT(8) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    venue VARCHAR(80) NOT NULL PRIMARY KEY
);

CREATE TABLE event(
    venue VARCHAR(80) NOT NULL PRIMARY KEY
    eventName VARCHAR(140) NOT NULL,
    time TIME NOT NULL,
    date DATE NOT NULL,
    venueName VARCHAR(60)
);
