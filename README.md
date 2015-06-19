<h1> Lo siguiente es de laravel4.2 actualizar </h1>
aca hay conflictos
<h1>Login PHP(+ blade) + Laravel</h1>

Para desarrollar en esta aplicación, es necesario tener instalado el FW Laravel. 

Laravel necesita php>4. Actualizarlo de ser necesario.

<h3> Instalar composer para poder instalar todas las dependencias necesarias para tener un proyecto Laravel. </h3> <br> 
<strong>$curl -sS https://getcomposer.org/installer | php </strong>

<h4>Instalar curl de ser necesario:</h4> <br>

<strong>$php -r "eval('?>'.file_get_contents('https://getcomposer.org/installer'));"</strong> 

<h3>2) Probar la instalación:</h3> <br> 
<strong>$php composer.phar </strong>

<h3>3) composer global</h3>
Esto es altamente recomendable para poder usarlo desde cualquier lado. Para eso hay que renombrar composer.phar (posiblemente instalado en /home/user/ o en la ruta en la que se relizaron las acciones anteriores). Le cambiamos el nombre a composer y lo copiamos en /usr/local/bin. Parándose en el directorio donde este el archivo composer:
<strong>$sudo cp composer /usr/local/bin </strong>

<h3>probar que composer esta instalado en todos lados:</h3> <strong> $composer</strong>

<h5> Problemas con Mcrypt </h5>

Recently on Ubuntu when you run sudo apt-get install php5-mcrypt it doesn't actually install the extension into the mods-available. You'll need to symlink it.

sudo apt-get install php5-mcrypt

sudo ln -s /etc/php5/conf.d/mcrypt.ini /etc/php5/mods-available/mcrypt.ini

Then enable the extension and restart Apache.

sudo php5enmod mcrypt
sudo service apache2 restart

<h3>Clonar proyecto login:</h3>
<strong>
git clone http.../fed90/login/ <br>
cd login <br>
composer install  <br>
</strong>
<h5>Nota, es posible que se tenga problemas al navegar por la aplicacion. Si dice que la pag no existe.</h5>

1)<strong> $sudo nano a2enmod rewrite </strong> <br>
2)<strong> $sudo service apache2 restart</strong> <br>
3)<strong> $sudo nano /etc/apache2/sites-available/000-default.conf </strong> <br>
4)Buscar “DocumentRoot /var/www/html” agregar las siguientes lineas abajo de todo:

Directory "/var/www/html" /
    AllowOverride All
/Directory/



Listo

3)<strong> $cd /etc/apache2/</strong> <br>
4)<strong> $sudo nano default</strong> <br>
5)<strong> Modificar AllowOverride a All (en la sección /var/www o donde coloques los proyectos php)</strong><br>
6)<strong>$sudo service apache2 restart</strong> <br>
