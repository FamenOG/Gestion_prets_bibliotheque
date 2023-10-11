INSERT INTO role VALUES (1, 'Client'), (2, 'Librarian');


INSERT INTO types (name) VALUES ('Lost'), ('Late');


CREATE VIEW v_client AS SELECT * FROM user WHERE role_id = 1;

CREATE VIEW v_librarian AS SELECT * FROM user WHERE role_id = 2;

CREATE VIEW v_book_available AS
SELECT *
FROM books
WHERE status = 0;

CREATE VIEW v_loan_no_back AS
SELECT l.*
FROM loans l
    LEFT JOIN backs b ON l.id = b.loan_id
WHERE b.id is NULL;

CREATE VIEW v_book_loaned AS
SELECT
    b.*,
    l.loan_date,
    l.back_date,
    l.client_id,
    l.id as loan_id,
    c.name as librarian
FROM v_loan_no_back l
    JOIN books b ON l.book_id = b.id
    JOIN v_librarian c ON c.id = l.librarian_id
WHERE status = 10;

SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE penalties;

TRUNCATE backs;

SET FOREIGN_KEY_CHECKS = 1;

SET FOREIGN_KEY_CHECKS = 0;

TRUNCATE backs;

TRUNCATE loans;

SET FOREIGN_KEY_CHECKS = 1;