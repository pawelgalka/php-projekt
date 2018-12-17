echo <!DOCTYPE html> >> w.html
\echo <html> >> w.html
\echo <body> >> w.html
\echo <h1>Zad 3.7</h1> >> w.html
\H
\T
\pset border 2
select idmeczu, (gospodarze[1]+gospodarze[2]+gospodarze[3]+gospodarze[4]+gospodarze[5]) as gosp, (goscie[1]+goscie[2]+goscie[3]+goscie[4]+goscie[5]) as gosc from statystyki where  (gospodarze[1]+gospodarze[2]+gospodarze[3]+gospodarze[4]+gospodarze[5])+(goscie[1]+goscie[2]+goscie[3]+goscie[4]+goscie[5]) >29;

\echo </body> >> w.html
\echo </html> >> w.html

