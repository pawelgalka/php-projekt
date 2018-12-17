\echo <html>
\echo <body>
\H
\T
SELECT idczekoladki, nazwa, masa, koszt FROM czekoladki WHERE masa
BETWEEN 15 AND 24 UNION SELECT idczekoladki, nazwa, masa, koszt FROM
czekoladki WHERE koszt BETWEEN 0.15 AND 0.24;
\echo </body>
\echo </html>
