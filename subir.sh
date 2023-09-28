#/bin/bash
echo "-----------------------------"
echo "Actualizando respositorio PHP"
echo "-----------------------------"

echo "Paso 1: Acutalizar carpeta local."
git pull

echo "Paso 2: Añadimos archivos locales."
git add .

echo "Paso 3: Descripcion de la subida."
read -p "Escribe el mensaje de subida: " mensaje
git commit -m "$mensaje" .

echo "Paso 4: Realizar subida"
git push
