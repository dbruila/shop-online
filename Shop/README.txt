	Sklep internetowy.

Wykaz realizowanych zdań:
	1. Tworzenie strony glównej (mainPage.php);
	2. Twozenie stron do logowania, rejestracji;
	3. Tworzenie strony ze wszystkimi produktami;
	4. Tworzenie strony koszyka;
	5. Tworzenie strony konta klienta;
	6. Tworzenie stron do edycji danych i adresa;
	7. Tworzenie strony do złożenia zamówienia;
	8. Tworzenie strony do platności online;
	9. Tworzenie bazy danych sklepu;
folder img:
	Zdjęcia wykorzystywane w projekcie.
folder styles:
	Pliki przechowują styli do stron php.
cookie.php
	Plik w którym są cookie.
daneDost.php
	Strona do wpisania adresu dostawy.
ePlatnosc.php
	Strona do wpisania danych karty platniczej.
edycjaAdresa.php
	Strona  do edycji adresu klienta.
edycjaAdresaWys.php
	Plik do zmiany adresu dostawy w bazie danych.
edycjaAdresa_action.php
	Plik do zmiany adresu klienta w bazie danych.
edycjaKonta.php
	Strona do zmiany danych kontaktowych klienta.
edycjaKonta_action.php
	Plik do zmiany danych kontaktowych klienta w bazie danych.
elementKosz.php
	Plik do dodania wybranego towaru do koszyka.
eplatn_action.php
	Plik do zapisywania danych karty platniczej klienta w bazę danych.
header.php
	Strona przechowująca napisy oraz ikony górne (są identyczne dla wszystkich stron).
kobietaTow.php
	Strona do wyświetlenia towarów z bazy danych. 
konto.php
	Strona konta klienta z osobową informacją.
kosz.php
	Strona koszyka klienta.
logowanie.php
	Strona do logowania.
logowanie_action.php
	Plik do pobrania danych logującego klienta z bazy danych.
mainPage.php
	Glówna strona sklepu.
wyborDost.php
	Strona do wyboru metody dostawy.
wyborDost_action.php
	Plik do zapisywania metody dostawy w bazę danych.
wyloguj.php
	Plik do wylogowania klienta.
zarejestruj.php
	Strona do rejestracji nowego klienta.
zarejestruj_action.php
	Plik do zapisywania danych klienta w bazę danych.

Opis sposobu instalacji
	1. Należy ściągnąć wszyskie pliki z shop;
	2. Na komputerze musi być zainstalowano środowisko XAMPP Control Panel;
	3. W środowisku XAMPP Control Panel uruchomić Apache i MySQL;
	4. Dalej z folderu bazaDanych importujemy plik sklep.sql do
	http://localhost/phpmyadmin/index.php?lang=pl ;
	5. Umieszczamy folder z projektem w C:\xampp\htdocs;
	6. Wchodzimy na stronę http://localhost/Shop/mainPage.php