#!/bin/sh
echo "Building CSS"
postcss ./src/css/styles.css -o ./www/assets/css/styles.css