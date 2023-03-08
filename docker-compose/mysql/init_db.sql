USE qaapi;
CREATE TABLE `answer`
(
    `idAnswer`      int         NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `ansContent`    text        NOT NULL,
    `ansAuthor`     varchar(50) NOT NULL,
    `ansCreated_at` timestamp   NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE `question`
(
    `idQuestion`    int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `queContent`    varchar(255) NOT NULL,
    `queAuthor`     varchar(50)  NOT NULL,
    `queCreated_at` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `idAnswer`      int          NULL,

    FOREIGN KEY (idAnswer) REFERENCES answer(idAnswer)
);
