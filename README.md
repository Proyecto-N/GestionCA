# Gestión CA
### _Guía de instalación de Gestión CA_

## Requerimientos
- Node >= v18.16.0
- npm >= 9.6.4
- Docker

## Instalación
1. Descargue una plantilla de proyecto de laravel con docker sail. Esto descargará todas las imágenes necesarias para que laravel pueda ejecutarse
```sh
curl -s https://laravel.build/example-app?with=mysql | bash 
```
2. Clona este repositorio
```sh
git clone https://github.com/Proyecto-N/GestionCA.git
cd GestionCA
```
3. Instala todas las dependencias del proyecto
```sh
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
4. Dirígite a tu archivo `~/.bashrc` y pega lo siguiente:
Esto creará un alias para el comando `vendor/bin/sail`
```sh
alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'
```
5. Por último, cierra y abre la terminal o ejecuta el comando
```sh
source ~/.bashrc
```
## Ejecutar proyecto
### Iniciar servidor
Una vez instaladas todas las depedencias puede iniciar el servidor de laravel con el comando :
```sh
sail up
```
o con la opción `-d` para ejecutarlo en modo detach
```sh
sail up -d
```
Ahora puede dirigirse a `http://localhost` para ver el proyecto en ejecución.

### Instalar depedencias
Hay dos tipos de depencias para este proyecto, las dependencias de node.js y las dependencias de composer. Para instalar las de npm usa:
```sh
sail npm install
```

Y para las de composer usa:
```sh
sail composer install
```

### Estilos
Para hacer uso de estilos o scripts y que estos funcionen correctamente debe ejecutar el siguiente comando. Esto ejecutará un servidor de node.js y se mantendrá a la escucha de cambios, lo cual refrescará la página cada vez que se detecte un guardado.
```sh
sail npm run dev
```

### Base de datos
Para poder aplicar las migraciones debes ingresar el comando:
```sh
sail artisan migrate
```
luego ejecuta el comando:
```sh
sail mysql -u sail -p -h mysql-P 3306 -D gestionca < /var/www/html/scripts/create_users.sql
```
También puede acceder a la consola de mysql con:
```sh
sail mysql
```

### Detener servicios
Para detener el servidor de laravel ejecute el comando:
```sh
sail stop
```
Y para detener el servidor de node.js simplemente precione `ctrl+c` en la terminal donde inicio el servidor.
