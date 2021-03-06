# Dokumentation

## Installationsanleitung mit XAMPP

[XAMPP](https://www.apachefriends.org/de/index.html) installieren

Das hosts file von Windows anpassen unter ``` C:\Windows\System32\drivers\etc\hosts ```
```
# [...]

127.0.0.1    dracos.local
```

Jetzt die VHosts von Apache konfigurieren. Die Datei dazu findet man unter ``` C:\xampp\apache\conf\extra\httpd-vhosts.conf ```.

```
# [...]

# Wird benötigt um VirtualHosts für alle Requests auf Port 80 zu aktivieren
NameVirtualHost *:80

# [...]

# Eigentliche VHost Konfiguration
<VirtualHost 127.0.0.1>
    # DNS Name auf den der VHost hören soll
    ServerName dracos.local

    # Ort an dem Das Projekt zu finden ist
    DocumentRoot "c:/www/dracos-webseite/public"

    # Nochmals
    <Directory "c:/www/dracos-webseite/public">
        Options Indexes FollowSymLinks
        Options +Includes
        AllowOverride All
        Order allow,deny
        Require all granted
        Allow from All
        DirectoryIndex index.php
    </Directory>
</VirtualHost>
```

Jetzt Apache über XAMPP neustarten und danach über ``` http://dracos.local ``` auf die Seite zugreifen.

Eine [Anleitung](http://devarticles.in/linux/creating-new-virtual-host-while-using-xampp-in-ubuntu-linux/) für Ubuntu.

XAMPP starten: ``` sudo /opt/lampp/lampp start ```

# Erstellung Datenbank mit Tabellen

Erstelle auf der Seite [phpmyadmin](http://localhost/phpmyadmin) eine Datenbank mit dem Namen "dracos".
Danach musst du den Text aus dem File dump.sql kopieren und unter SQL einfügen.
Wenn du auf Go klickst werden alle Tabellen erstellt.
