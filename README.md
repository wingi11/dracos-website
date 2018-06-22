# Dokumentation

## Installationsanleitung mit XAMPP

Das hosts file von Windows anpassen unter ``` C:\Windows\System32\drivers\etc\hosts ```
```
# [...]

127.0.0.1    my-project.local
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
    ServerName my-project.local

    # Ort an dem Das Projekt zu finden ist
    DocumentRoot "c:/dev/my-project/public"

    # Nochmals
    <Directory "c:/dev/my-project/public">
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

Jetzt Apache über XAMPP neustarten und danach über http://my-project.local auf die Seite zugreifen.
