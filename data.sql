INSERT INTO role VALUES 
    (1, 'Client'),
    (2, 'Librarian');

INSERT INTO categories VALUES
    (1, 'Frisson'),
    (2, 'Drame');

INSERT INTO book_category VALUES
    (1, 1)
    (1, 2);


CREATE VIEW v_client AS 
SELECT *
FROM user
WHERE role_id = 1;