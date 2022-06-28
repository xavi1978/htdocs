### Nom del projecte:

**Top-ten.**

### Enllaços a documentació

[Entrega 1](./doc/entrega1/)
[Entrega 2](./doc/entrega2/)

### Enllaç a la llicència

[LICENSE](./LICENSE)

### Descripció del projecte

Lloc web amb voluntat divulgativa basat en llistes classificatòries tipus 'top-ten'
ordenades per categoria temàtica i editables de forma col·laborativa pels usuaris.

### Descripció de les característiques

El lloc web conté llistes classificatòries tipus 'top-ten' com a llistes ordenades
editables via formulari i categoritzades temàticament.

### Punts forts del projecte

El projecte té una amplia base d'usuaris potencials, integrada per qualsevol persona que sàpiga fer servir bàsicament un ordinador, amb inquietud informativa a l'hora de consultar-lo i/o voluntat divulgativa en editar-lo.

A més la seva escalabilitat és beneficia d'una base d'usuaris editors suficient per
augmentar de forma simple el contingut del lloc web.

### Documentació técnica

#### Base de dades

Maria DB 10.4.24 a [db.sql](./db.sql)

#### Base

El projecte consisteix en cinc pàgines visibles, 3 fitxers HTML, un full d'estil CSS, 3 fitxers de codi JavaScript i 6 fitxers de codi PHP.

- [index.html](./src/index.html) Pàgina principal. Mostra camp i selector de cerca de llista, botó de registre i d'inici de sessió.
- [login.html](./src/login.html) Pàgina d'inici de sessió d'usuari editor. Mostra formulari.
- [registrarse.html](./src/registrarse.html) Pàgina de registre d'usuari editor. Mostra formulari.
- [editlist.php](./src/editlist.php) Pàgina d'edició de llista. Mostra formulari.
- [searchlist.php](./src/searchlist.php) Pàgina de resultat de cerca de llista.

#### Eines

S'ha utilitzat:

- **HTML**, **CSS** , **JavaScript**, **Ajax** i **JQuery** per a programar el lloc web.

- **GitHub** per a portar el control de versions.

- La web **freemysqlhosting.net** per a tenir una base de dades **MySQL** externalitzada.

- **Heroku** com a servidor PHP.

- **Composer** per a mantenir les llibreries actualitzades.

- **PHPMailer** per a l'enviament de correu.

- **Recaptcha** de Google per a verificar el registre i l'inici de sessió.

#### Diagrama de Gantt

Enllaçat en un fitxer apart: [gantt.xlsx](./gantt.xlsx)

### Casos d'ús

- Registrar usuari.

- Iniciar sessió usuari.

- Crear llista.

- Cercar llista.

- Consultar llista.

- Editar llista.

#### Explicació dels casos d'ús

_Registrar usuari_

L'usuari pot registrar-se com a editor a una base de dades externa, amb un formulari que requereix nom, e-mail, telèfon i contrasenya. El registre està verificat via 'captcha' i confirmat per correu electrònic.

_Iniciar sessió_

És possible l'inici de sessió com a editor registrat contra una base de dades externa, introduint e-mail i contrasenya en un formulari. L'inici de sessió
està verificat per 'captcha'.

_Crear llista_

L'usuari registrat i acreditat pot afegir una llista mitjançant un formulari amb un selector per a la categoria temàtica, un camp de text per al títol i 10 camps de text per a cadascun dels elements que componen la llista.

_Cercar llista_

L'usuari pot cercar una llista per a consultar o, en cas que estigui acreditat, editar, a través d'un formulari integrat per un selector de temàtica i un camp de text de cerca de títol.

_Consultar llista_

L'usuari pot consultar una llista fent clic sobre el títol d'aquesta presentat com a resultat d'una cerca.

_Editar llista_

L'usuari registrat i acreditat pot editar una llista mitjançant un formulari pre-poblat amb un selector per a la categoria temàtica, un camp de text per al títol i 10 camps de text per a cadascun dels elements que componen la llista.
