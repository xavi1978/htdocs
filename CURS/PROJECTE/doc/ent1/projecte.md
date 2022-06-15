### Nom del projecte:

Top-ten.

### Explicació previa

La intenció és crear una web de temàtica original i finalitat divulgativa, editable col·laborativament pels usuaris.

### Pluja d'idees:

#### 1- Botiga

Botiga en línia amb catàleg de productes, carret de compra i passarel.la de pagament.

Descartada per la seva complexitat.

#### 2- Terminal de gestió de vols

Terminal de gestió de vols virtual amb registre d'embarcament i base de dades de vols programats.

Descartada per desinterès.

#### 3- Cartellera

Cartellera amb informació i tràilers sobre pel·lícules
en cartell i cinemes i horaris on es projecten.

Descartada per la seva simplicitat.

#### 4- Blog notícies

Blog noticies amb portada, seccions informatives i articles.

Descartada per desinterès.

#### 5- Receptari

Blog cuina amb seccions de receptes, fotografies i ingredients dels plats.

Descartada per la seva simplicitat.

#### 6- Biblioteca

Biblioteca virtual amb base de dades de llibres, catàleg del fons i lector integrat de PDF.

Descartada per desinterès.

#### 7- Enciclopèdia

Enciclopèdia multimèdia en línia amb articles i contingut audiovisual.

Descartada per la seva magnitud.

#### 8- Enquestes

Lloc web d'enquestes via formulari i classificades per seccions.

Descartada per la seva simplicitat.

#### 9- Xarxa social

Xarxa social amb pàgines personals i intercanvi de missatges i fotografies entre usuaris.

Descartada per la seva complexitat.

#### 10- Web valoracions

Lloc web de valoració de productes amb fil de comentaris i sistema de puntuació.

Descartada per la seva simplicitat.

#### 11- Mailing

Client de correu amb enviament de missatges
entre usuaris amb editor integrat i llibreta virtual de contactes.

Descartada per la seva complexitat.

#### 12- Lloc web de llistes top ten

Lloc web divulgatiu amb llistes 'top-ten' classificades per temàtica editable
col·laborativament pels usuaris.

Escullo aquesta idea per la seva originalitat.

### Descripció del projecte

Lloc web amb voluntat divulgativa basat en llistes classificatòries tipus 'top-ten'
ordenades per categoria temàtica i editables pels usuaris de forma col·laborativa
pels usuaris.

### Descripció de les característiques

El lloc web contindrà llistes classificatòries tipus 'top-ten' com a llistes ordenades
editables via formulari i categoritzades temàticament.

### Viabilitat

El projecte és factible tècnicament i la seva viabilitat és assolible.

### Usuaris potencials

Els usuaris potencials del lloc web són qualsevol persona amb inquietud informativa a l'hora
de consultar-lo i/o voluntat divulgativa a l'hora d'editar-lo.

### Mercat a cobrir

El mercat a cobrir pel projecte és el públic general com a audiència consultiva i un sector més
reduït com a agents editors amb finalitat divulgativa.

### Documentació técnica

#### Base

El projecte consistirà en sis pàgines HTML, un full d'estil CSS, 3 fitxers de codi JavaScript i 3 fitxers de codi PHP.

- `index.html` Pàgina principal. Mostra botó de registre i d'inici de sessió.
- `login.html` Pàgina d'inici de sessió d'usuari editor. Mostra formulari.
- `login.js`
- `login.php`
- `new_user.php`
- `registrarse.html` Pàgina de registre d'usuari editor. Mostra formulari.
- `registrarse.js`
- `registrarse.php`
- `introlist.html` Pàgina d'introducció de llista. Mostra formulari.
- `editlist.html` Pàgina d'edició de llista. Mostra formulari.
- `searchlist.html` Pàgina de cerca de llista. Mostra formulari.

#### Eines

S'utilitzarà Git per a portar el control de versions, la web freemysqlhosting.net per a tenir una base de dades a Internet 24/7, Heroku com a servidor PHP, Composer per a mantenir les llibreries actualitzades, Recaptcha de Google per a verificar el registre i l'inici de sessió.

#### Diagrama de Gantt

#### Wireframes

#### Paths

#### Mockups

### Casos d'ús

- Registrar usuari.

- Iniciar sessió usuari.

- Introduir llista.

- Cercar llista.

- Consultar llista.

- Editar llista.

#### Explicació dels casos d'ús

_Registrar usuari_

L'usuari podrà registrar-se com a editor a una base de dades externa, amb un formulari que requerirà nom, e-mail, telèfon i contrasenya. El registre estarà verificat via 'captcha' i confirmat per correu electrònic.

_Iniciar sessió_

Serà possible l'inici de sessió com a editor registrat contra una base de dades externa, introduint e-mail i contrasenya en un formulari. L'inici de sessió
estarà verificat per 'captcha'. L'inici de sessió autoritzat activarà el mode edició de la interficie web.

_Introduir llista_

L'usuari registrat i acreditat podrà afegir una llista mitjançant un formulari amb un selector per a la categoria temàtica, un camp de text per al títol i 10 camps de text per a cadascun dels elements que componen la llista.

_Cercar llista_

L'usuari podrà cercar una llista per a consultar o, en cas que estigui acreditat, editar, a través d'un formulari integrat per un selector de temàtica i un camp de text de cerca de títol.

_Consultar llista_

L'usuari podrà consultar una llista fent clic sobre el títol d'aquesta presentat com a resultat d'una cerca.

_Editar llista_

L'usuari registrat i acreditat podrà editar una llista mitjançant un formulari amb un selector per a la categoria temàtica, un camp de text per al títol i 10 camps de text per a cadascun dels elements que componen la llista.