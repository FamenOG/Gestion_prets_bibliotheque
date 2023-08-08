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

CREATE VIEW v_librarian AS 
SELECT *
FROM user
WHERE role_id = 2;

CREATE VIEW v_book_available AS 
SELECT *
FROM books
WHERE status = 0;

CREATE VIEW v_book_loaned AS
SELECT b.*, l.loan_date, l.back_date, l.client_id, l.id as loan_id, c.name
FROM loans l
    JOIN books b ON l.book_id=b.id
    JOIN v_librarian c ON c.id=l.librarian_id
WHERE status = 10;