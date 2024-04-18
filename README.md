# simplePHPMVC

## LABORATORIO KUBERNETES

Dada la aplicación https://drive.google.com/file/d/1Jz1LbE8eNxVZkZQM73buAL8edcFIyghb/view?usp=suplicacionero PHP simple:

Requiere una base de datos Mysql con nombre "nw201402" y la estructura y datos de la carpeta "recursos"
La configuración de la base de datos se encuentra en "dao/dao.php"
Requiere PHP 8 o superior con soporte para Mysql

Configure el despliegue en kubernetes bajo los siguientes pasos

    - Crear la imagen docker de la aplicación php
    - Publicar la imagen en el repositorio publico 
    - Crear el despliegue en kubernetes
    - Deployment con almacenamiento persistente de la base de datos
    - Servicio al puerto 80
    - Ingress para acceso externo mediante el dominio examen.app
    - Aplicación en funcionamiento (captura de pantalla)

Envié un archivo PDF con:

    - La dirección del repositorio de la imagen
    - Los archivos yaml utilizados
    - La captura de pantalla de la aplicación desplegada

## DOCKER

### Instrucciones para crear Dockerfile

- CD a la carpeta del proyecto.
- Correr 
```bash 
docker build -t borispacex/simplephpmvc .
docker run -d -p 8080:80 --name servidorweb borispacex/simplephpmvc
```
- Publicar imagen

```bash 
docker login

docker push borispacex/simplephpmvc:latest
```
### Instrucciones para correr localmente
---------------------------------------------
- CD a la carpeta del proyecto.
- Abra docker-compose.yml e ingrese las variables de entorno deseadas
- Correr 
```bash 
docker compose up -d
```
- Abra el navegador y visite localhost:3000
